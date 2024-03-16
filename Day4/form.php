<?php


$errors = [];

if(isset($_GET['errors']))
{
    $errors=json_decode($_GET['errors'],true);


}

?>

<h2>User Information Form</h2>

<form action="emp.controllers.php" method="post" enctype="multipart/form-data">
    <label for="First Name">First Name:</label>
    <input type="text" id="firstName" name="firstName" required>
    <?php
    if(isset($errors['firstName']))
    {
        echo $errors['firstName'];
    }

    ?>
    <br>

    <label for="Last Name">Last Name:</label>
    <input type="text" id="lastName" name="lastName" required>
    <?php
    if(isset($errors['lastName']))
    {
        echo $errors['lastName'];
    }

    ?>
    <br>

    <label for="address">Address:</label>
    <textarea id="address" name="address" rows="4" cols="50" required></textarea><br>

    <label for="country">Country:</label>
    <select id="country" name="country">
        <option value="Egypt">Egypt</option>
        <option value="Canada">Canada</option>
        <option value="Moroco">Moroco</option>
    </select><br>

    <label>Gender:</label>
    <label for="male">Male</label>
    <input type="radio" id="male" name="gender" value="male">
    <label for="female">Female</label>
    <input type="radio" id="female" name="gender" value="female"><br>

    <label >Skills:</label>
    <label for="html">HTML</label>
    <input type="checkbox" id="html" name="skills[]" value="html">
    <label for="css">CSS</label>
    <input type="checkbox" id="css" name="skills[]" value="css">
    <label for="js">JavaScript</label>
    <input type="checkbox" id="js" name="skills[]" value="js">
    <label for="python">Python</label>
    <input type="checkbox" id="python" name="skills[]" value="python"><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <?php
    if(isset($errors['password']))
    {
        echo $errors['password'];
    }

    ?>
    <br>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <?php
    if(isset($errors['username']))
    {
        echo $errors['username'];
    }

    ?>
    <br>

    <label for="department">Department:</label>
    <input type="text" id="department" name="department" value="Open Source" disabled><br>
    <input type="file" name="emp_img"><br>

    <input type="submit" value="Submit" name="register">
    <input type="reset" value="Reset">
</form>



