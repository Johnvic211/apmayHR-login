<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="signup-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Registration</h2>
                    <?php
                    if(count($errors) > 0){
                            foreach($errors as $showerror){
                            }
                    }elseif(count($errors) > 1){
                            foreach($errors as $showerror){
                            }
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="text" name="fname" title="Cannot contain any special or numeric characters." pattern="[A-Za-z\s]{1,}" placeholder="First Name" required value="<?php echo $fname ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="lname" title="Cannot contain any special or numeric characters." pattern="[A-Za-z\s]{1,}" placeholder="Last Name" required value="<?php echo $lname ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email Address" required value="<?php echo $email ?>">
                        <?php
                            if(count($errors) == 1 && $showerror == "Email already exist. Please choose another email."){
                        ?>
                            <style> #email {border-color: red;}</style>
                            <span style='color: red; font-size: 12px'><?php echo $showerror ?></span>
                        <?php 
                            }
                            elseif(count($errors) > 1){
                                foreach($errors as $showerror){
                                    if($showerror == "Email already exist. Please choose another email."){
                                        
                        ?>              <style> #email {border-color: red;}</style>
                                        <span style='color: red; font-size: 12px'><?php echo $showerror ?></span>
                        <?php
                                    }
                                }
                            }
                        ?>
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control" type="text" id="bday" name="bday" onfocus="(this.type='date')" placeholder="Date of Birth" required value="<?php echo $bday ?>">

                        <?php
                            if(count($errors) == 1 && $showerror == "Only 15 yrs old and above can create an account."){
                        ?>
                            <style> #bday {border-color: red;}</style>
                            <span style='color: red; font-size: 12px'><?php echo $showerror ?></span>
                        <?php 
                            }
                            elseif(count($errors) > 1){
                                foreach($errors as $showerror){
                                    if($showerror == "Only 15 yrs old and above can create an account."){
                        ?>              <style> #bday {border-color: red;}</style>
                                        <span style='color: red; font-size: 12px'><?php echo $showerror ?></span>
                        <?php
                                    }
                                }
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="tel" name="phone" pattern="^(09|\+639)\d{9}$" title="Invalid number" placeholder="Phone Number" required value="<?php echo $phone ?>">
                    </div>
                    <div class="form-group">
                        <select name="gender" id="gender" onclick="changeColor()" class="form-control">
                            <option value="G" disabled selected>Gender</option>
                            <option value="Male" <?php if (!empty($_POST['gender']) && $_POST['gender'] == 'Male') echo 'selected="selected"'; ?>>Male</option>
                            <option value="Female" <?php if (!empty($_POST['gender']) && $_POST['gender'] == 'Female') echo 'selected="selected"'; ?>>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" id="cpassword" placeholder="Confirm password" required>
                        <?php
                            if(count($errors) == 1 && $showerror == "Passwords do not match"){
                        ?>
                            <span style='color: red; font-size: 12px'><?php echo $showerror ?></span>
                        <?php 
                            }
                            elseif(count($errors) > 1){
                                foreach($errors as $showerror){
                                    if($showerror == "Passwords do not match"){
                        ?>              <span style='color: red; font-size: 12px'><?php echo $showerror ?></span>
                        <?php
                                    }
                                }
                            }
                        ?>
                    </div>
                    <input type="checkbox" onclick="myFunction()" style="margin-bottom: 20px"> Show Password
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Create Account" onclick="validateReg()">
                    </div>
                    <div class="link login-link text-center">Already have an account? <a href="login-user.php">Login here</a></div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("password");
            var y = document.getElementById("cpassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        }

        function validateReg(){
            const addCSS = css => document.head.appendChild(document.createElement("style")).innerHTML=css;

            if(value == "G"){
                // Usage: 
                addCSS(".form-group select{border-color: red; } input:invalid{border-color: red; }")
            }else{
                // Usage:           
                addCSS("input:invalid{border-color: red; }")
            } 
        }

        function changeColor(){
            document.getElementById("gender").style.borderColor = '#D3D3D3';
        }
    </script>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</body>
</html>