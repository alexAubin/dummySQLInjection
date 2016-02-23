<html>

<head>
</head>

<body style="font-size:1.5em;">

<pre>
Hello !

This website is a supercool service where you can buy stuff and so on,
so it probably holds somewhere in a database your password and email 
and maybe your credit card number ... !

Let's just assume you wanna login and check your orders and stuff ...
Your login is "Donna Fox".
</pre>

<hr>

<form method="POST" action="./">
    I.D. : <br>
    <input type="text" name="login" placeholder="Your login"><br>
    Password : <br>
    <input type="text" name="passwd" placeholder="A password could go here" disabled><br>
    <input type="submit" value="Log me in !">
</form>

<hr>

<pre>
<?php
    
    // Get login

    $login  = isset($_POST['login']) ? $_POST['login'] : null;

    // If login is set, execute the request code
    
    if ($login)
    {
        // The database parameters
        
        $servername = "localhost";
        $username = "dummy";
        $password = "dummypassword";
        $dbname = "dummy";
        $tablename = "myTable";

        // Initialize a link to the database

        echo "\$login = ".$login."<br><br>";
        echo "Connecting to database ...<br><br>";

        $link = mysql_connect($servername, $username, $password)
              or die('Not connected : ' . mysql_error());

        $db_selected = mysql_select_db($dbname, $link)
              or die ('Can\'t use database : ' . mysql_error());

        // The actual SQL request

        $sql = "SELECT * FROM $tablename WHERE name='$login'";
        
        echo "Will execute the following SQL request :<br>$sql ...<br>";
        
        $result = mysql_query($sql, $link);
        echo mysql_error();
        $row = mysql_fetch_array($result);

        // Display result
            
        echo "<hr>";
        echo "Your are client number ". $row['id']         ."<br>";
        echo "Your name is "          . $row['name']       ."<br>";
        echo "Your email is "         . $row['email']      ."<br>";
        echo "Your credit card is "   . $row['creditCard'] ."<br>";

        // Close link

        mysql_close($link);
    }
?> 
</pre>

</body>
</html>
