<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" href="<?php echo base_url('assets/back/'); ?>style/style.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"></head>

   </head>
   <body>
      <div class="wrapper">
         <div class="title">
            Login Form
         </div>
         <form action="<?php echo base_url('admin/login'); ?>" method="post">
            <div class="field">
               <input type="text" name="email" required>
               <label>Name</label>
            </div>
            <div class="field">
               <input type="password" name="password" required>
               <label>Password</label>
            </div>
            <div class="field">
               <input type="submit" value="Login" name="login">
            </div>
        </form>
        <?php if($this->session->flashdata('error')){ echo "<div class='alert alert-danger'>". $this->session->flashdata('error')."</div>";} ?>
      </div>
   </body>
</html>