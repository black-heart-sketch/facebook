<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamborghini</title>
</head>
<style>
   body{
        margin: 0;
        padding: 0;
        font-family: montserrat;
        background: linear-gradient(120deg, #2980b9, #8e44ad);
        height: 100vh;
        overflow: hidden;
   }

   .center{
       position: absolute;
       top: 50%;
       left: 50%;
       transform: translate(-50%, -50%);
       width: 400px;
       background: white;
       border-radius: 10px;   
   }
   .center h1{
      text-align: center;
      padding: 0 0 20px 0;
      border-bottom: 1px solid silver;
   }
   .center form{
     padding: 0 40px;
     box-sizing: border-box;
   }
   form .txt_field{
      position: relative;
      border-bottom: 2px solid #adadad;
      margin: 30px 0;
   }
   .txt_field input{
     width:100%;
     padding: 0 5px;
     height: 40px;
     font-size: 16px;
     border: none;
     background: none;
     outline: none;
   }
   .txt_field label{
     position:  absolute;
     top: 50%;
     left: 5px;
     color: #adadad;
     transform: translateY(-50%);
     font-size: 16px;
     pointer-events: none;
   }
   .txt_field span::before{
    content: '';
    position: absolute;
    top: 40px;
    left: 0;
    width: 100%;
    height: 2px;
    background: #2691d9;
    transition: .5s;
   }
   .txt_field input:focus ~label,
   .txt_field input:valid ~label{
    top: -5px;
    color: #2691d9;  
   }
   .txt_field input:focus ~span::before,
   .txt_field input:valid ~span::before{
    width: 100%;
   }
   .pass{
    margin: -5px 0 20px 5px;
    color: #a6a6a6;
    cursor: pointer;
   }
   .pass-hover{
    text-decoration : underline;
   }
   input[type="submit"]{
    width: 100%;
    height: 50px;
    border: 1px solid;
    background: #2691d9;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;
   }
   input[type="submit"]:hover{
    border-color: #2691d9;
    transition: .5s;
   }
   .signup_link{
     margin: 30px 0;
     text-align: center;
     font-size: 16px;
     color: #666666;
   }
   .signup_link a{
     color: #2691d9;
     text-decoration: none;
   }
   .signup_link a:hover{
    text-decoration : underline;
   }

.custom-select {
    
  appearance: none;

  background-color: #fff;
  border: 2px solid #adadad;
  border-radius: 5px;
  padding: 10px;
  font-size: 16px;
  width: 100%;
  box-sizing: border-box;
  margin-bottom:10px;
  margin-top:-10px ;
}

.custom-select:focus {
  outline: none;
  border-color: #2691d9;
}

.custom-select option {
  background-color: #fff;
  color: #333;
}
</style>
<body>
    <div class="center">
        <h1>Sign Up</h1>
        <form action="php/register.php" method="POST" <?php echo htmlspecialchars($_SERVER['PHP_SELF'])?> onsubmit="return checkPasswordValidity();" novalidate>
          
           <div class="txt_field">
             <input type="text" name="Username" required>
               <label>Username</label>
           </div>
           <div class="txt_field">
             <input type="email" name="Email" required>
               <label>Email</label> 
              
           </div>
           <div class="txt_field">
             <input type="number" name="number" id="number" required>
               <label>number</label> 
           </div>
           <div class="txt_field">
             <input type="number" name="age" id="age" required>
               <label>age</label> 
           </div>
           <div class="txt_field">
             <input type="password" name="Password" id="password" required>
               <label>Password</label> 
           </div>
           <div class="txt_field">
             <input type="password" name="ConfirmPassword" id="confirmPassword" required>
               <label>Confirm password</label> 
           </div>
           
            
  

           <span id="passwordValidityMessage"></span>
           <input type="submit" name="register" value="Register">
           <div class="signup_link">
            Already a member? <a href="index.php">Sign in</a>
           </div>
        </form>
    </div>
    
    <script>
   
      // Function to check password validity
     function checkPasswordValidity() {
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirmPassword").value;
  var passwordValidityMessage = document.getElementById("passwordValidityMessage");

  if (password !== confirmPassword) {
    passwordValidityMessage.innerHTML = "Passwords do not match.";
    passwordValidityMessage.style.color = "red";
    return false;
  }

  if (password.length < 8) {
    passwordValidityMessage.innerHTML = "Password should be at least 8 characters long.";
    passwordValidityMessage.style.color = "red";
    return false;
  }

  passwordValidityMessage.innerHTML = "";
  return true;
}
    </script>
</body>
</html>