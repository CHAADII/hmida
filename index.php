<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Scinces News</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Scinces<b>News</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="src/about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="src/contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a href="src/login.php" class="btn btn-danger"><b>Log-In</b></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">Home
            <!--<small>Secondary Text</small>-->
          </h1>

          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="assets/img/BIBDA.jpg" height="300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Science<b>News</b></h2>
              <p class="card-text">Scinces News est un site web dédié a simplifier l'accée au articles, conférences, livres et thése publiée par les doctorant de la faculté des sciences a El Jadida.<br>Dans ce site web on a essayé d'utiliser nous compétences et nous savoir dans les bases de données avancée en employant MongoDB. <br>Developpé par : <b>SADIQ Mohamed & IZIKI Achraf</b></p>
              <a href="src/about.php" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Administration</a>
            </div>
          </div>
          <h3><span class="badge badge-info">Last Articles</span></h3>
          <!-- Blog Post -->
        <div class="row">
        <?php
        require "vendor/autoload.php";
        include ("src/config.php");
      $filter=["type"=>'article'];
      $option=["limit"=>3];
       $cursor=$c->find($filter,$option);
       $res=iterator_to_array($cursor);
        ?>
         
          <?php
          foreach ($res as $doc) {
          ?>
         <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header">Type : <?php  echo $doc->type ?></div>
            <div class="card-body">
              <h6 class="card-title"><?php echo $doc->title ?></h6>
              <p class="card-text"><?php echo substr($doc->abstract, 0,100) ?>...</p>
              <?php
              $lien="src/publication.php?id=".$doc->_id;
              ?>
              <a href=<?php echo $lien ;?> class='btn btn-primary'>Read More &rarr;</a>
            </div>            
            <div class="card-footer text-muted">
                By
              <a href="#">
                <?php
                $i=0;
                foreach ($doc->authors as $auteur ) {
                  if ($i==0) {
                    echo $auteur->nom;
                  }else{
                    echo " & ".$auteur->nom;
                  }
                  $i++;
              }
              ?>
              </a>
                  
            </div>
          </div>
          </div>
          <?php
        }
          ?>
          <div class="col-md-12">
          <h3><span class="badge badge-info">Last Conferences</span></h3>
          </div>
          <?php
        
        $filter=["type"=>'conference'];
      $option=["limit"=>3];
       $cursor=$c->find($filter,$option);
       $res=iterator_to_array($cursor);
        ?>
         
          <?php
          foreach ($res as $doc) {
          ?>

         <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header">Type : <?php  echo $doc->type ?></div>
            <div class="card-body">
              <h6 class="card-title"><?php echo $doc->title ?></h6>
              <p class="card-text"><?php echo substr($doc->abstract, 0,100) ?>...</p>
              <?php
              $lien="src/publication.php?id=".$doc->_id;
              ?>
              <a href=<?php echo $lien ;?> class='btn btn-primary'>Read More &rarr;</a>
            </div>            
            <div class="card-footer text-muted">
                By
              <a href="#">
                <?php
                $i=0;
                foreach ($doc->authors as $auteur ) {
                  if ($i==0) {
                    echo $auteur->nom;
                  }else{
                    echo " & ".$auteur->nom;
                  }
                  $i++;
              }
              ?>
              </a>
                  
            </div>

          </div>
          </div>
          <?php
        }
          ?>
          <div class="col-md-12">
          <h3><span class="badge badge-info">Last Theses</span></h3>
          </div>
          <?php
        
        $filter=["type"=>'these'];
      $option=["limit"=>3];
       $cursor=$c->find($filter,$option);
       $res=iterator_to_array($cursor);
        ?>
         
          <?php
          foreach ($res as $doc) {
          ?>
         <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header">Type : <?php  echo $doc->type ?></div>
            <div class="card-body">
              <h6 class="card-title"><?php echo $doc->title ?></h6>
              <p class="card-text"><?php echo substr($doc->abstract, 0,100) ?>...</p>
              <?php
              $lien="src/publication.php?id=".$doc->_id;
              ?>
              <a href=<?php echo $lien ;?> class='btn btn-primary'>Read More &rarr;</a>
            </div>            
            <div class="card-footer text-muted">
                By
              <a href="#">
                <?php
                $i=0;
                foreach ($doc->authors as $auteur ) {
                  if ($i==0) {
                    echo $auteur->nom;
                  }else{
                    echo " & ".$auteur->nom;
                  }
                  $i++;
              }
              ?>
              </a>
                  
            </div>

          </div>
          </div>
          <?php
        }
          ?>
          <div class="col-md-12">
          <h3><span class="badge badge-info">Last Livres</span></h3>
          </div>
          <?php
        
        $filter=["type"=>'livre'];
      $option=["limit"=>3];
       $cursor=$c->find($filter,$option);
       $res=iterator_to_array($cursor);
        ?>
         
          <?php
          foreach ($res as $doc) {
          ?>
         <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header">Type : <?php  echo $doc->type ?></div>
            <div class="card-body">
              <h6 class="card-title"><?php echo $doc->title ?></h6>
              <p class="card-text"><?php echo substr($doc->abstract, 0,100) ?>...</p>
              <?php
              $lien="src/publication.php?id=".$doc->_id;
              ?>
              <a href=<?php echo $lien ;?> class='btn btn-primary'>Read More &rarr;</a>
            </div>            
            <div class="card-footer text-muted">
                By
              <a href="#">
                <?php
                $i=0;
                foreach ($doc->authors as $auteur ) {
                  if ($i==0) {
                    echo $auteur->nom;
                  }else{
                    echo " & ".$auteur->nom;
                  }
                  $i++;
              }
              ?>
              </a>
                  
            </div>

          </div>
          </div>
          <?php
        }
          ?>

          <!-- Pagination -->
          
        </div>
        </div>

        <!-- Sidebar Widgets Column -->
       <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card text-white bg-info my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <form method="POST" action="src/recherche.php">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for..." name="recherche">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit" name="valider">Go!</button>
                </span>
                
              </div>
              </form>
              <br>
              <center><a  class='btn btn-dark' href="#" data-toggle='modal' data-target='#rech'>recherche personalisée</a></center>
            </div>
          </div>
          <!-- Categories Widget -->
          <div class="card text-white bg-secondary my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="src/statistiques.php?type=article" class="text-white">Articles</a>
                    </li>
                    <li>
                      <a href="src/statistiques.php?type=conference" class="text-white">Conférences</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="src/statistiques.php?type=these" class="text-white">Théses</a>
                    </li>
                    <li>
                      <a href="src/statistiques.php?type=livre" class="text-white">Livres</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
  </div>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Science<b>News</b> 2018</p>
      </div>
      <!-- /.container --> 
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php
    $filter=[];
    $cur=$c->find($filter);
    $res=iterator_to_array($cur);
    $type=array();
    foreach ($res as $key) {
      if (!in_array($key->type, $type)) {
        $type[]=$key->type;
      }
    }
    sort($type);
    ?>
 
<!-- modal rech perso -->
    <!-- modal -->
    <form method="POST" action="src/recherche.php">
    <div id="rech" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        
        <div class="form-group col-lg-5">
        <label for="type">Type:</label>
      <select class="form-control" id="type" name="typepublication" onchange="show(this)">
        <option id="1">--</option>
        <?php
        foreach ($type as $key ) {
          echo "<option id=".$key.">".$key."</option>";
        }
        ?>
        </select></div>
        <h3 id="type">Informations Détaillé : </h3>
        <p id="typee"></p>      
      </div>
      <div class="modal-footer">
        <button type="submit" name="rechercher" class="btn btn-default">Rechercher</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        
      </div>
    </div>

  </div>
</div>
</form>
<script type="text/javascript">
  
  function show(sel) {
    if (sel.value=="article"){
      document.getElementById('typee').innerHTML=""
                document.getElementById('typee').innerHTML="<div class=\"form-group col-lg-7\"><label for=\"title\">booktitle:</label><input type=\"text\" class=\"form-control\" id=\"booktitle\" name= \"booktitle\"></div>"
                document.getElementById('typee').innerHTML+="<div class=\"form-group col-lg-7\"><label for=\"url\">URL:</label><input type=\"text\" class=\"form-control\" id=\"url\" name=\"url\"></div>"
              }else if (sel.value=="conference") {
                document.getElementById('typee').innerHTML=""
                document.getElementById('typee').innerHTML="<div class=\"form-group col-lg-7\"><label for=\"city\">Ville:</label><input type=\"text\" class=\"form-control\" id=\"city\" name=\"city\"></div>"
                document.getElementById('typee').innerHTML+="<div class=\"form-group col-lg-7\"><label for=\"country\">Pays:</label><input type=\"text\" class=\"form-control\" id=\"country\" name=\"country\"></div>"
                document.getElementById('typee').innerHTML+="<div class=\"form-group col-lg-7\"><label for=\"date\">Date:</label><input type=\"date\" class=\"form-control\" id=\"date\" name=\"date\"></div>"
              }else if (sel.value=="livre") {
                  document.getElementById('typee').innerHTML=""
                document.getElementById('typee').innerHTML="<div class=\"form-group col-lg-7\"><label for=\"publisher\">publisher:</label><input type=\"text\" class=\"form-control\" id=\"publisher\" name=\"publisher\"></div>"
              }else if (sel.value=="these") {
                  document.getElementById('typee').innerHTML=""
                document.getElementById('typee').innerHTML="<div class=\"form-group col-lg-7\"><label for=\"jury\">Jury(Nom):</label><input type=\"text\" class=\"form-control\" id=\"jury\" name=\"jury\"></div>"}
  }

</script>
  </body>

</html>
