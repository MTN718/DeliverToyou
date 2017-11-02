#Follow the steps shown below to initialize the system
1. Check the folder with the name sql
2. Import the SQL files using phpmyadmin or command line

#Configure database
1. Open application/config/database.php file
2. Set the following required fields
	'username' => '******',
	'password' => '******',
	'database' => '******',

Note:- No need to set base Url

3. Admin panel 

	'username' => 'admin',
	'password' => 'admin',

4. Frontend 

	'username' => 'vendor',
	'password' => 'vendor',