<?php $this->load->view('includes/header'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <div id="userForm"></div>
        <script type="text/template" id="user-template">
            <form action="<?php echo base_url('auth/register'); ?>" method="post">
                <div class="signup-logo">
                <img class="logo" src="<?php echo base_url('assets/images/logo_1.png'); ?>" alt="Signup Image">
                </div>
                <div class="form-containor">
                    <h2 class = "auth-text">Sign Up</h2>
                    <label>Username: 
                    <input type="text" name="username" required><br>
                    <label>First Name: 
                    <input type="text" name="firstname" required><br>
                    <label>Last Name: 
                    <input type="text" name="lastname" required><br>
                    <label>Email: </label><input type="email" name="email" required><br>
                    <label>Password: </label><input type="password" name="password" required><br>
                    <p class="acount_acount">Already have an account? <a href="<?php echo base_url('login'); ?>"><b>Login</b></a></p>
                    <button class="submit" type="submit">Register</button>
                </div>
            </form>
        </script>

    <script src="<?php echo base_url('assets/js/user.js'); ?>"></script>
</body>
</html>