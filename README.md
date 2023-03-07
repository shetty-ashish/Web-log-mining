Requirements:
WampServer

Instructions:

1. If Wamp server not installed,
Install Wamp server  http://sourceforge.net/projects/wampserver/files/WampServer%202/WampServer%202.2/wampserver2.2e/wampserver2.2e-php5.3.13-httpd2.2.22-mysql5.5.24-32b.exe/download by default install in "c:\wamp"

2. Copy "Apriori " Folder to "c:\Wamp\WWW"

3. Start -> Programs-> start WampServer

4. In Internet Explorer,visit "http://localhost/phpmyadmin/" 
	4.1 Create Database named "apriori" and click create
	4.2 Find "Import" option on the top of page
	4.3 Click "Choose File" button and locate "apriori.sql" file  "C:\wamp\www\Apriori\apriori.sql"
	4.4 Click "GO" button  at the bottom right corner of the page
	
5. Modify the config.php file "C:\wamp\www\Apriori\config.php"
	5.1 Replace 
				mysql_connect("localhost","root","root") or die(mysql_error());
				by
				mysql_connect("localhost","root","") or die(mysql_error());
				if the password is blank
				
6. visit "http://localhost/apriori/"
