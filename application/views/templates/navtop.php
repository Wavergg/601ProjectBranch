<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo base_Url(); ?>index.php/home">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topnavbarSupportedContent" aria-controls="topnavbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="topnavbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      
      <?php if($userType == 'anyone'): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_Url(); ?>index.php/register">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_Url(); ?>index.php/login">Login</a>
      </li>
<?php else: ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_Url(); ?>index.php/personcenter/">Personal Center</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_Url(); ?>index.php/login/logout">Logout</a>
      </li>

      <?php endif; ?>
      

    </ul>
  </div>
</nav>