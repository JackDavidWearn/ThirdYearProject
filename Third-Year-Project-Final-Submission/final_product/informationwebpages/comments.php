<!-- Code within this file is adapted from the Tutorial from David Adams on CodeShack, available at https://codeshack.io/commenting-system-php-mysql-ajax/ -->
<?php

// Below is the variables used to connect to the database
$DATABASE_HOST = 'eu-cdbr-west-03.cleardb.net';
$DATABASE_USER = 'b6f6a7991d767b';
$DATABASE_PASS = 'b3594c72';
$DATABASE_NAME = 'heroku_c4f5318a5d371e5';

// This is a try-catch loop which checks whether a connection to the database can be established
try {
    $pdo = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
} catch (PDOException $exception) {
    exit('Failed to connect to database!');
}

/* 
    This function time_elapsed_string() is used to take the current timestamp which is in the form date-time and convert it
    into a time elapsed string. This is so that it will show 1 hour ago, 2 days ago, etc... rather than the date and time
    of the comment
*/
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    $string = array('y' => 'year', 'm' => 'month', 'w' => 'week', 'd' => 'day', 'h' => 'hour', 'i' => 'minute', 's' => 'second');
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

/* 
    This function will populate the comments and comments replies using a loop
    The function show_comments() is used to populate both the comments and any replies to the comments that are being 
    displayed onto the screen for the user. This is done using a foreach loop
*/
function show_comments($comments, $parent_id = -1) {
    $html = '';
    if ($parent_id != -1) {
        // If the comments are replies sort them by the "submit_date" column
        array_multisort(array_column($comments, 'submit_date'), SORT_ASC, $comments);
    }
    // Iterate the comments using the foreach loop
    foreach ($comments as $comment) {
        if ($comment['parent_id'] == $parent_id) {
            // Add the comment to the $html variable
            $html .= '
            <div class="comment">
                <div>
                    <h3 class="name">' . htmlspecialchars($comment['name'], ENT_QUOTES) . '</h3>
                    <span class="date">' . time_elapsed_string($comment['submit_date']) . '</span>
                </div>
                <p class="content">' . nl2br(htmlspecialchars($comment['content'], ENT_QUOTES)) . '</p>
                <a class="reply_comment_btn" href="#" data-comment-id="' . $comment['id'] . '">Reply</a>
                ' . show_write_comment_form($comment['id']) . '
                <div class="replies">
                ' . show_comments($comments, $comment['id']) . '
                </div>
            </div>
            ';
        }
    }
    return $html;
}

// This function is the template for the write comment form
function show_write_comment_form($parent_id = -1) {        
            $html = '
    <div class="write_comment" data-comment-id="' . $parent_id . '">
        <form>
            <input name="parent_id" type="hidden" value="' . $parent_id . '">
            <input name="name" type="text" placeholder="Username">
            <textarea name="content" placeholder="Leave a comment about your thoughts!" required></textarea>
            <button type="submit">Submit Comment</button>
        </form>
    </div>
    ';
    return $html;
    
}

// Page ID needs to exist, this is used to determine which comments are for which page
if (isset($_GET['page_id'])) {
    // Check if the submitted form variables exist
    if (isset($_POST['name'], $_POST['content'])) {
        // POST variables exist, insert a new comment into the MySQL comments table (user submitted form)
        $stmt = $pdo->prepare('INSERT INTO comments (page_id, parent_id, name, content, submit_date) VALUES (?,?,?,?,NOW())');
        $stmt->execute([ $_GET['page_id'], $_POST['parent_id'], $_POST['name'], $_POST['content'] ]);
        exit('Your comment has been submitted!');
    }
    // Get all comments by the Page ID ordered by the submit date
    $stmt = $pdo->prepare('SELECT * FROM comments WHERE page_id = ? ORDER BY submit_date DESC');
    $stmt->execute([ $_GET['page_id'] ]);
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Get the total number of comments
    $stmt = $pdo->prepare('SELECT COUNT(*) AS total_comments FROM comments WHERE page_id = ?');
    $stmt->execute([ $_GET['page_id'] ]);
    $comments_info = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    exit('No page ID specified!');
}
?>

<!-- Used for displaying the comments header which has the total number of comments and the write comment button -->
<div class="comment_header">
    <span class="total"><?=$comments_info['total_comments']?> comments</span>
    <a href="#" class="write_comment_btn" data-comment-id="-1">Write Comment</a>
</div>

<?=show_write_comment_form()?>

<?=show_comments($comments)?>
