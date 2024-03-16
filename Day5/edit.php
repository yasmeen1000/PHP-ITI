<?php
require("db.php");

try {
    $db = new db();

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        
        
        $result = $db->get_data('employees', "id=$id");

        if($result) {
            $emp = $result->fetch(PDO::FETCH_ASSOC);
            $gender = $emp['gender'];
        } else {
            throw new Exception("Employee not found.");
        }
    } else {
        throw new Exception("Employee ID not provided.");
    }
} catch(PDOException $exc) {
    echo $exc->getMessage();
} catch(Exception $e) {
    echo $e->getMessage();
}
?>


<form action="update.php?id=<?php echo $id ?>" method="post">
    <label for="First Name">First Name:</label>
    <input type="text" id="firstName" name="firstName" required value="<?php echo $emp['firstName'] ?>"><br>

    <label for="Last Name">Last Name:</label>
    <input type="text" id="lastName" name="lastName" required value="<?php echo $emp['lastName'] ?>"><br>

    <label for="address">Address:</label>
    <textarea id="address" name="address" rows="4" cols="50" required ><?php echo $emp['address'] ?></textarea><br>

    <label for="country">Country:</label>
    <select id="country" name="country" value="<?php echo $emp['country'] ?>">
        <option value="Egypt">Egypt</option>
        <option value="Canada">Canada</option>
        <option value="Moroco">Moroco</option>
    </select><br>

    <label>Gender:</label>
    
    <label for="male">Male</label>
    <input type="radio" id="male" name="gender" value="male" <?php echo ($gender =='male')? 'checked':'' ?>>
    <label for="female">Female</label>
    <input type="radio" id="female" name="gender" value="female" <?php echo ($gender =='female')? 'checked':'' ?>><br>
<!-- 
    <label >Skills:</label>
    <label for="html">HTML</label>
    <input type="checkbox" id="html" name="skills[]" value="html">
    <label for="css">CSS</label>
    <input type="checkbox" id="css" name="skills[]" value="css">
    <label for="js">JavaScript</label>
    <input type="checkbox" id="js" name="skills[]" value="js">
    <label for="python">Python</label>
    <input type="checkbox" id="python" name="skills[]" value="python"><br> -->

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required value="<?php echo $emp['pass'] ?>"><br>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required value="<?php echo $emp['username'] ?>"><br>

    <label for="department">Department:</label>
    <input type="text" id="department" name="department" value="Open Source" disabled><br>

    <input type="submit" value="Update">
    <input type="reset" value="Reset">
</form>