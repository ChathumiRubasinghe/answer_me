<?php $this->load->view('includes/header'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/register.css'); ?>">
    <title>Login</title>
</head>
<body>
<div id="loginContainer" data-url="<?php echo base_url('auth/login_process'); ?>"></div>
<script type="text/template" id="login-template">
    
    <form id="actualLoginForm">
        <div class="login-logo">
         <img class="logo" src="<?php echo base_url('assets/images/logo_1.png'); ?>" alt="Logo Image">
        </div>
            <h2 class = "auth-text">Login</h2>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter email" value="<%= email %>" />
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter password" />
            <p class="acount_acount">Don't have an account? <a href="<?php echo base_url('signup'); ?>"><b>Sign Up</b></a></p>
            <button class="submit" type="submit">Login</button>
    </form>
</script>
    <script src="<?php echo base_url('assets/js/login.js'); ?>"></script>
</body>
</html>
