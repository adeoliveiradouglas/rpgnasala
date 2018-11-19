<?php 
    require_once APPPATH .'resources/Constants.php';
    require_once APPPATH .'resources/PageConstants.php';
    require_once APPPATH .'resources/NavigationConstants.php';
?>

<?php if(isset($logged_user) && !empty($logged_user)){

    $active_class = 'active';
    $page = basename($_SERVER['REQUEST_URI']);
?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item <?php if($page == PageConstants::HOME) { echo $active_class; }?>">
            <a class="nav-link" href="<?php echo site_url(NavigationConstants::HOME); ?>">Home<span class="sr-only"></span></a>
          </li>
          <li class="nav-item <?php if($page == PageConstants::TEAM) { echo $active_class; }?>">
            <a class="nav-link" href="<?php echo site_url(NavigationConstants::TEAM); ?>">Turmas<span class="sr-only"></span></a>
          </li>
          <li class="nav-item <?php if($page == PageConstants::USER) { echo $active_class; }?>">
            <a class="nav-link" href="<?php echo site_url(NavigationConstants::USER); ?>">Alunos<span class="sr-only"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Imagens</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contato</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url(NavigationConstants::LOGOUT); ?>">Logout</a>
          </li>
        </ul>
      </div>
       <span class="navbar-text">
       		<a href="<?php echo site_url(NavigationConstants::USER).'/'.$logged_user->id; ?>"><?php echo $logged_user->nome;?></a>          
       </span>
    </nav>
<?php }?>