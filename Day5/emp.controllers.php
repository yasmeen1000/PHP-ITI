<?php
if(isset($_POST['login'])) {
    try {
        $db = new db(); 

        $stm = $db->get_connection()->prepare("SELECT * FROM employees WHERE username=? AND pass=? ");

       
        $stm->execute([$_POST['username'], $_POST['password']]);

      
        $data = $stm->fetch(PDO::FETCH_ASSOC);

        if($data) {
            session_start();
            $_SESSION['firstName'] = $data['firstName'];
            $_SESSION['lastName'] = $data['lastName'];
            $_SESSION['username'] = $data['username'];
            header("Location:list.php");
        } else {
            header("Location:login.php?error=1");
        }
    } catch(PDOException $exc) {
        echo $exc->getMessage();
    }
} elseif(isset($_POST['register'])) {
    $db = new db();

    $firstName = validate($_POST['firstName']);
    $lastName = validate($_POST['lastName']);
    $address = validate($_POST['address']);
    $gender = validate($_POST['gender']);
    $password = validate($_POST['password']);
    $username = validate($_POST['username']);
    $country = validate($_POST['country']);

    $errors = [];

    if(strlen($firstName) < 3) {
        $errors['firstName'] = "First Name must be more than 3 characters";
    }

    if(strlen($lastName) < 3) {
        $errors['lastName'] = "Last Name must be more than 3 characters";
    }

    if(strlen($username) < 3) {
        $errors['username'] = "Username must be more than 3 characters";
    }

    if(!preg_match("#[a-zA-Z0-9]{3,}#", $password)) {
        $errors['password'] = "Your Password must be more than 3 characters and can contain numbers or characters";
    }

    if(count($errors) > 0) {
        header("Location:form.php?errors=".json_encode($errors));
    } else {
        $from = $_FILES['emp_img']['tmp_name'];
        $img = $_FILES['emp_img']['name'];
        move_uploaded_file($from, "./img/".$img);

        try {
            $db = new db();


            $stm = $db->get_connection()->prepare("INSERT INTO employees (firstName, lastName, address, gendre, pass, username, country, img) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

           
            $stm->execute([$firstName, $lastName, $address, $gender, $password, $username, $country, $img]);

            header("Location:list.php");
        } catch(PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}

function validate($data) {
    $data = trim($data);
    $data = addslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>