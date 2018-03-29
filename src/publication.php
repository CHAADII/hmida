<?php
if(isset($_GET['id'])){
require "../vendor/autoload.php";
include( 'config.php');
      $filter=["_id"=> new  MongoDB\BSON\ObjectID($_GET['id'])];
      
       $cursor=$c->find($filter);
       $res=iterator_to_array($cursor);
}

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Scinces News</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="../css/blog-home.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
      <div class="container">
        <a class="navbar-brand" href="../">Scinces<b>News</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a href="login.php" class="btn btn-danger"><b>Log-In</b></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container col-md-11">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <br>
        <div class="jumbotron" style="text-align: center;">
        <b><h1 class="my-4">Titre  : <?php echo $res[0]->title;?>
            <!--<small>Secondary Text</small>-->
          </h1></b>
         <p class="card-text"><?php echo $res[0]->abstract ?></p>
        </div>
          
          
      
          <!-- Blog Post -->
        <div class="row">
          <div class="col-md-6">
            <div class="card">
            <div class="card-header" >
        <a class="card-link" data-toggle="collapse" href="#collapseOne">
          Liste des Auteurs
          <span class="fa fa-list pull-right"></span>
        </a>
      </div>
          <div id="collapseOne" class="collapse ">
        <div class="card-body">
          <table class="table table-striped">
               <thead>
                    <tr>
                            <th>Nom</th>
                            <th>Laboratoire</th>
                    </tr>
                </thead>
          <tbody>
 
        <?php
        foreach ($res[0]->authors as $aut ) {
          echo '<tr>
        <td>'.$aut->nom.'</td>
        <td>'.$aut->labo.'</td>
      </tr>';
        }
        ?>
           </tbody>
  </table>
      </div>
    </div>
  </div>
      </div>
      <div class="col-md-6">
          <div class="card">
            <div class="card-header" >
        <a class="card-link" >
          Année de publication : <?php echo $res[0]->year ;?>
        </a>
      </div>
    </div>
          
      </div>
      <div class="col-md-12"></div>
      <br>
          <?php
          if ($res[0]->type=="these") {?>
              <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card">
                          <div class="card-header" >
                          <a class="card-link" data-toggle="collapse" href="#Jury">
                            Jury
                            <span class="fa fa-list pull-right"></span>
                          </a>
                        </div>
                            <div id="Jury" class="collapse ">
                          <div class="card-body">
                            <table class="table table-striped">
                                 <thead>
                                      <tr>
                                              <th>Nom</th>
                                              <th>Grade</th>
                                              <th>Lieu</th>
                                      </tr>
                                  </thead>
                            <tbody>
                   
                          <?php
                          foreach ($res[0]->these->Jury as $jur ) {
                            echo '<tr>
                          <td>'.$jur->name.'</td>
                          <td>'.$jur->grade.'</td>
                          <td>'.$jur->lieu.'</td>
                        </tr>';
                          }
                          ?>
                             </tbody>
                    </table>
                        </div>
                      </div>
                  </div>
      </div>
          <?php
        }
        if($res[0]->type=="article") {

            ?>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" >
                      <a class="card-link">
                        <b>BOOKTITLE</b> : <?php echo $res[0]->article->booktitle ;?>
                      </a>
                    </div>
                    </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                    <div class="card-header" >
                      <a class="card-link">
                        <b>Page Start/End</b>  : <?php echo $res[0]->article->pages->start." To ".$res[0]->article->pages->end ;?>
                      </a>
                    </div>
                    </div>
            </div>                  
      <?php
          }if($res[0]->type=="livre") {

            ?>
            <div class="col-md-6">
               <div class="card">
                    <div class="card-header" >
                      <a class="card-link">
                        <b>Publisher</b> : <?php echo $res[0]->livre->publisher->name ;?>
                      </a>
                    </div>
                    </div>
                </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" >
                      <a class="card-link">
                        <b>ISBN</b> : <?php echo $res[0]->livre->publisher->ISBN ;?>
                      </a>
                    </div>
                    </div>
                </div>                  
      <?php
          }
          if($res[0]->type=="conference") {

            ?>
            <div class="col-md-6">
              <div class="card">
                    <div class="card-header" >
                      <a class="card-link">
                        <b>Pays</b> : <?php echo $res[0]->conference->country ;?>
                      </a>
                    </div>
                    </div>
                </div>
            <div class="col-md-6">
              <div class="card">
                    <div class="card-header" >
                      <a class="card-link">
                        <b>Ville</b>  : <?php echo $res[0]->conference->city ;?>
                      </a>
                    </div>
                    </div>
                </div>              
                <div class="col-md-12"></div>    
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <br>
                 <div class="card">
                    <div class="card-header" >
                      <a class="card-link">
                        <b>Date</b>  : <?php echo $res[0]->conference->date ;?>
                      </a>
                    </div>
                    </div>
                </div>                  
      <?php
          }
          ?>

         
          
        </div>
        </div>
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card text-white bg-info my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <form method="POST" action="recherche.php">
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
                      <a href="statistiques.php?type=article" class="text-white">Articles</a>
                    </li>
                    <li>
                      <a href="statistiques.php?type=conference" class="text-white">Conférences</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="statistiques.php?type=these" class="text-white">Théses</a>
                    </li>
                    <li>
                      <a href="statistiques.php?type=livre" class="text-white">Livres</a>
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

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Science<b>News</b> 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- modal -->
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
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <h3 id="type">Type : </h3>
        <p id="abstract"></p>
        <h5 id="booktitle"></h5>
        <a href="">Accéder à l'article</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="text" name="a" id="a">
      </div>
    </div>

  </div>
</div>
<!------- modal rech perso --->
    <!----- modal -->
    <form method="POST" action="recherche.php">
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
