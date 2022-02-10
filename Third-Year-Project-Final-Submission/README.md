# IndividualProject_2020_Jack-Wearn
# Running the Web Applicaiton
Within this portion of the report, the documentation will be produced to give a better understanding of the project and how it is run. 
This will give a brief but better understanding of the project. Firstly, should the link to the [Heroku](https://aonblocator-final-year-project.herokuapp.com/) site:
```bash
https://aonblocator-final-year-project.herokuapp.com/
```
which is running this application not work or not yet be available (as it will only be accessible from the ...) 
the project can be run through the localhost of the machine being used.

In order for the application to run, because of the use of PHP, it will need to be run via the Localhost. 
There are a number of ways to do this dependant on the Operating Systems (OS) being used. 
Personally, this was all done using MacOS which has an easy way of setting up the Localhost. 
However, this portion will briefly explain how to do it on a number of different OS with links that may give more details on this. For MacOS, 
you would firstly need to create a new folder (if you haven’t already) named Sites and should be within the user section of finder 
(the part which says the name of the user). You would then need to turn on the Apache server. This is done in the terminal using the following command: 
```bash
sudo apachectl start
```
For this project, PHP will also need to be turned on. This is done through the terminal once again using the following command: 
```bash
sudo nano /etc/apache2/httpd.conf 
```
Once this has opened, you will need to search for php using ```bash CTRL+W``` 
Then all that is required is to remove the hashtag from the following: 
```bash
#LoadModule php7_module libexec/apache2/libphp7.so
```
All of the code from this project can then be added to the Sites folder and navigated to on Google Chrome with the path: ```Localhost/AONBLocator/index.php```
A good site that outlines this in more details is by [Website Beaver](https://websitebeaver.com/set-up-localhost-on-macos-high-sierra-apache-mysql-and-php-7-with-sslhttps). 

To do this on Windows there are four steps that can be followed, which come from a tutorial by [Jim Cambell at Techwalla](https://www.techwalla.com/articles/how-to-install-a-localhost-server-on-windows). 
The steps show that the localhost can be setup by first opening control panel and navigating to the programs link. 
You should then be able to ```Turn Windows Features On or Off``` and check the box which is labelled as ```Internet Information Services```. 
Once the computer is reboot you should then have the localhost running. Another tool would be needed which is either XAMPP or WAMP, 
which allows for the configuration of the localhost server. Once this has been followed, you should be able to navigate to the site using the following URL:
```127.0.0.1 /NameOfSite/Index.php``` 
The steps for setting up the MySQL database would then need to be followed. Another great tutorial for this is from [Pankaj Sood at Code Briefly](https://codebriefly.com/how-to-setup-apache-php-mysql-on-windows-10/). 
Just like with Windows, a great tutorial on how to setup the required stacks for running the web application on Linux can be found [Mark Drake at Digital Ocean](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-ubuntu-18-04), 
which go through the steps of setting up ```apache, PHP and MySQL``` for web development. 

This project also requires a MySQL database be created. Again [Website Beaver](https://websitebeaver.com/set-up-localhost-on-macos-high-sierra-apache-mysql-and-php-7-with-sslhttps) 
outlines how to do this for MacOS, in which case you will need MySQL downloaded onto the machine and you can use the following code to get into the terminal 
MySQL window: 
```bash
sudo /usr/local/mysql/bin/mysql -u root -p
```
You will then need to create the Database and the tables required for this project. These are outline within the above sections, but the following code will create the database and the two required tables:

## Creating the Database
```sql
CREATE DATABASE finalproduct;
```

## Creating the Comments Table
```sql
CREATE TABLE IF NOT EXISTS `comments` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`page_id` int(11) NOT NULL,
	`parent_id` int(11) NOT NULL DEFAULT '-1',
	`name` varchar(255) NOT NULL,
	`content` text NOT NULL,
	`submit_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
```
## Creating the Users Table
```sql
CREATE TABLE IF NOT EXISTS `users` (
	`user_id` int(11) NOT NULL AUTO_INCREMENT,
	`user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
	`user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	`user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
	PRIMARY KEY (`user_id`),
	UNIQUE KEY `user_name` (`user_name`),
	UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
```
## Structure of the Directory
There are three main folders within this submission. 
The final report folder which houses:
```
Third Year Project Final Report in PDF and Doc format
```

The final_product folder is the final submission of the finished product  

The Proof_of_Concept folder contains:
```

All Proof-of-Concept programs from both term one and term two. 
The prototype/demo application from first term
```