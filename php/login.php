<?php
   require 'connect.php';
   if(!isset($_POST['InputEmail'], $_POST['InputPassword'])) {
       exit('Please fill both the username and password!');
   }
   if($smt = $conn->prepare('SELECT * FROM `users` WHERE email = ?')) {
       $smt->bind_param('s', $_POST['InputEmail']);
       $smt->execute();
       $smt->store_result();
       if($smt->num_rows > 0) {
           $smt->bind_result($id, $email, $password, $fname, $lname);
           $smt->fetch();
           if($_POST['InputPassword'] == $password) {
               session_start();
               session_regenerate_id();
               $_SESSION['loggedin'] = TRUE;
               $_SESSION['fname'] = $fname;
               header('Location: index.php');
           } else {
               echo "Incorrect Password!";
           }
       } else {
           echo "Incorrect username or password!";
       }
       $smt->close();
   }
?>