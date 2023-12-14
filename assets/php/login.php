<?php

    $myconn = new PDO("mysql:host=localhost; dbname=facebook", "root", "tchoua");
    

    if(isset($_POST['login'])){

        $password = $_POST['Password'];

        function dbconnect($conn){

            $email = $_POST['email'];
            $query = $conn->query("SELECT password from users where email = '$email' ");

            $result = $query->fetchAll();

            if($result){
                foreach($result as $data){

                    return $data[0];
                }
            }
            else{
                return "Record not found<br />";
            }
        }

        $my_result = dbconnect($myconn);
        

        if(password_verify($password, $my_result )){
            echo "Login Successful";
            header("Location: ../welcome.php");
        }
        else{
            echo "Invalid Details";
        }
    
        
    }

    
?>