<?php


if(isset($_GET['error']))
{
    echo "Invalid Email or Password";
    

}

?>



<h2>User Login Form</h2>

<form action="emp.controllers.php" method="post" >


    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    
    <br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>

    <input type="submit" value="Login" name="login">
    
</form>
