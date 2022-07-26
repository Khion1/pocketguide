<?php
    include('../settings.php');
    
    if(isset($_POST['register'])){
        $email  = $_POST['email'];
        $fname  = $_POST['fname'];
        $pwd    = $_POST['pwd'];
        register($email, $fname, $pwd, $pdo);
    }else if(isset($_POST['login'])){
        $email  = $_POST['email'];
        $pwd    = $_POST['pwd'];
        login($email, $pwd, $pdo);
    }else{
        header('location: ../index.php?error_occured');
    }
   
    function register($email, $fname, $pwd, $pdo)
    {
        $stmt = $pdo->prepare('INSERT INTO user_accounts (`email`, `fullname`, `password`, `user_type`)
        VALUES (:email, :fullname, :pwd, :user_type)');
        
        $stmt->execute([
            'email' => $email,
            'fullname' => $fname,
            'pwd' => $pwd,
            'user_type' => '1',
        ]);

        header('location: ../index.php');
    }

    function login($email, $pwd, $pdo)
    {
        $stmt=$pdo->prepare('SELECT * FROM user_accounts WHERE email=:email AND password=:password');
        $stmt->execute([
            'email' => $email,
            'password' => $pwd,
        ]);
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0){
            session_start();
            $_SESSION['uid'] = $row['uid'];
            header('location: ../index.php');
        }else{
            header('location: ../index.php?loginfailed=1');
        }
    }

   
    
?>