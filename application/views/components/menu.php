<?php 
    require_once APPPATH .'resources/Constants.php';
    require_once APPPATH .'resources/PageConstants.php';
    require_once APPPATH .'resources/NavigationConstants.php';
?>

<?php if(isset($nome) && !empty($nome)){?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo site_url(NavigationConstants::HOME); ?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Imagens</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contato</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url(NavigationConstants::LOGOUT); ?>">Log Out</a>
          </li>
        </ul>
      </div>
       <span class="navbar-text">
       		<a href="<?php echo site_url(NavigationConstants::USER).'/'.$id; ?>"><?php echo $nome;?></a>          
       </span>
    </nav>
<?php }?>