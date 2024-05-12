<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/header.css'); ?>">
        <title><?php echo $title ?? 'Default Title'; ?></title>
        <header class="main-header">
            <div class="container">
                
                    <a href="<?php echo base_url('home'); ?>"><img class="logo-image" src="<?php echo base_url('assets/images/logo.png'); ?>" alt="logo Image"></a>
                
                <nav class="main-nav">
                    <ul>
                        <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
                        <?php if ($this->session->userdata('logged_in')): ?>
                            <li><a href="<?php echo base_url('auth/logout'); ?>">Logout</a></li>
                            <li><a href="<?php echo base_url('user/profile'); ?>"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i></a></li>
                        <?php else: ?>
                            <li><a href="<?php echo base_url('auth/login'); ?>">Login</a></li>
                            <li><a href="<?php echo base_url('auth/signup'); ?>">Sign Up</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </header>
    </head>
</html>
