<?php

// This class was created based on the free tutorial from Panique and can be found at:
// https://github.com/panique/php-login-minimal
class Login
{
    // Variable for the database connection
    private $db_connection = null;

    // Variable for storing the error messages
    public $errors = array();

    // Variable for storing all other messages
    public $messages = array();

    // Construct function which starts automatically with any object of class Login
    public function __construct()
    {
        // create/read session
        session_start();
        
        // A check for if the user has clicked on the logout button
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        
        // Check for if the user has clicked the button to log them in
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

    private function dologinWithPostData()
    {
        // Performs checks to ensure all fields of the login form have been filled out
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Username field was empty.";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {

            // This creates the connection to the database, using the DB credentials
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // If there are no errors in connecting to the databse, this will run
            if (!$this->db_connection->connect_errno) {
                $user_name = $this->db_connection->real_escape_string($_POST['user_name']);

                // Querying the database to find the user based on the credentials they have entered
                // Allows for either username or email to be used to login
                $sql = "SELECT user_name, user_email, user_password_hash
                        FROM users
                        WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_name . "';";
                $result_of_login_check = $this->db_connection->query($sql);

                // if a user exists with these credentials
                if ($result_of_login_check->num_rows == 1) {

                    // get the result row as an object
                    $result_row = $result_of_login_check->fetch_object();

                    // using PHP 5.5's password_verify() function to check if the provided password fits
                    // the hash of that user's password
                    if (password_verify($_POST['user_password'], $result_row->user_password_hash)) {

                        // write user data into PHP SESSION
                        $_SESSION['user_name'] = $result_row->user_name;
                        $_SESSION['user_email'] = $result_row->user_email;
                        $_SESSION['user_login_status'] = 1;

                    // Else it will throw one of these error messages
                    } else {
                        $this->errors[] = "Wrong password. Try again.";
                    }
                } else {
                    $this->errors[] = "This user does not exist.";
                }
            } else {
                $this->errors[] = "Database connection problem.";
            }
        }
    }

    // Logout function which is run when the user attempts to logout of their account
    public function doLogout()
    {
        $_SESSION = array();
        session_destroy();
        $this->messages[] = "You have been logged out.";
    }

    // Function to return the state of the user
    // Returns true if the user is logged in or false if they are not (which is also the default value for the site)
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }
}

?>