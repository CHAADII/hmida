<!DOCTYPE html>
<?php 
include("securite_admin.php");
require "../vendor/autoload.php";
include("config.php");
$username=$_SESSION["user"];
$filtr=["username"=>$username];
$cu=$c1->find($filtr);
$result=iterator_to_array($cu);
 ?>
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
  <link href="../css/AdminLTE.min.css" rel="stylesheet">
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
            <a class="nav-link" href="#">Insertion
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"><span class="fa fa-user"></span><b> <?php echo $result[0]->name; ?></b></a>
          </li>
          <li class="nav-item">
            <form action="login.php" method="GET">
              <button type="submit" name="decon" value="decon" class="btn btn-danger"><span class="fa fa-log-out"></span><b> Deconnecter</b></button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="alert alert-success" id='ok' style="display: none;">
     <strong><i class="fa fa-check"></i> </strong>  Ajouté avec succes.
  </div>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Insertion des Publications
          <!--<small>Secondary Text</small>-->
        </h1>
        <div class="row">
          <!-- Blog Post -->
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?php 
                  $Query = array('type' => 'article');
                  $ci=$c->find($Query);
                  $num= count(iterator_to_array($ci));
                  echo $num;
                 ?></h3>

                <h4>Articles</h4>
              </div>
              <div class="icon">
                <i class="fa fa-newspaper-o"></i>
              </div>
              <a href="#" class="small-box-footer" id="modelbtn" data-toggle="modal" data-target="#modal-1">Insert  <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-gray">
              <div class="inner">
                <h3><?php 
                  $Query = array('type' => 'conference');
                  $ci=$c->find($Query);
                  $num= count(iterator_to_array($ci));
                  echo $num;
                 ?></h3>

                <h4>Conferences</h4>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-2">Insert  <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-light-blue">
              <div class="inner">
                <h3><?php 
                  $Query = array('type' => 'these');
                  $ci=$c->find($Query);
                  $num= count(iterator_to_array($ci));
                  echo $num;
                 ?></h3>

                <h4>Théses</h4>
              </div>
              <div class="icon">
                <i class="fa fa-graduation-cap"></i>
              </div>
              <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-3">Insert  <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php 
                  $Query = array('type' => 'livre');
                  $ci=$c->find($Query);
                  $num= count(iterator_to_array($ci));
                  echo $num;
                 ?></h3>

                <h4>Livres</h4>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-4">Insert  <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="jumbotron col-md-12">
            <h1 class="display-4">Insertion par Fichier .JSON <span class="fa fa-file"></span></h1>
            <p class="lead">Veuillez selectioner une fichier JSON.</p>
            <hr class="my-4">
            <p class="lead"> </p>
            <form method="POST" action="">
              <div>
                <input type="file" name="filename" id="filename" class="input-large form-control">
              </div>
              <hr class="my-4">
              <div class="">
                <button class="btn btn-info btn-lg btn-block" name="insert_file" type="submit">Valider</button>
              </div>
            </form>  
          </div>
        </div>
      </div>
      <div class="modal fade bd-example-modal-sm" id="modal-1">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
           <div class="modal-header">
            <h3 class="modal-title">Ajouter des articles</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form class="well" action="" method="POST" name="" enctype="multipart/form-data">
              <div class="form-group">
                <label>Titre</label>
                <input type="text" name="title" id="title" class="input-large form-control">
              </div>
              <div class="form-group">
                <label>Abstract</label>
                <textarea name="abstract" id="abstract" class="input-large form-control"></textarea>
              </div>
              <div class="form-group">
                <label>Année</label>
                <select class="custom-select" name="year"  id="year0" required>
                  <option>Selectioner une année</option>              
                </select>
              </div>
              <div class="form-group">
                <label>Auteurs</label>
                <table class="table table-bordered table-hover" name="tabl" id="tabl">
                 <thead>
                  <tr >
                   <th class="text-center">
                     Nom Auteur
                   </th>
                   <th class="text-center">
                    Labo
                  </th>
                </tr>
              </thead>
              <tbody id="tbody">
                <tr id='addr0'>
                  <td>
                    <input type="text" name='nom[]'  placeholder='Nom Auteur' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='labo[]'  placeholder='Labo' class="form-control"/>
                  </td>
                </tr>
              </tbody>
            </table>
            <a id="add_row" onclick="addrow()" class="btn btn-info"><span class="fa fa-plus-square"></span> Add Row</a>
          </div>
          <div class="form-group">
            <label>Booktitle</label>
            <input type="text" name="booktitle" id="booktitle" class="input-large form-control">
          </div>
          <div class="form-group">
            <label>URL</label>
            <input type="text" name="url" id="url" class="input-large form-control">
          </div>
          <div class="form-group">
            <label>Pagination</label>
            <div class="input-group">
              <input type="text" name="start" id="start" placeholder="Page début" class="input-small form-control">
              <input type="text" name="end" id="end" placeholder="Page fin" class="input-small form-control">
            </div>
          </div>
        
         </div>

         <div class="modal-footer">
         <button type="submit" name="insert_article" class="btn-next btn btn-primary">Valider</button>
          <a href="" class="btn btn-default" data-dismiss="modal">Annuler</a>
       </div>
       </form>
       </div>
        </div>
      </div>
      <div class="modal fade bd-example-modal-sm" id="modal-2">
 <div class="modal-dialog modal-md">
  <div class="modal-content">
   <div class="modal-header">
    <h3 class="modal-title">Ajouter des Conférences</h3>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>
  <div class="modal-body">
    <form class="well" action="#" method="post" name="authors" enctype="multipart/form-data">
      <div class="form-group">
        <label>Titre</label>
        <input type="text" name="title" id="title" class="input-large form-control">
      </div>
      <div class="form-group">
        <label>Abstract</label>
        <textarea name="abstract" id="abstract" class="input-large form-control"></textarea>
      </div>
      <div class="form-group">
        <label>Année</label>
        <select class="custom-select"  name="year" id="year4" required>
          <option>Selectioner une année</option>              
        </select>
      </div>
      <div class="form-group">
          <label>Auteurs</label>
          <table class="table table-bordered table-hover" id="tab_logic">
           <thead>
            <tr >
             <th class="text-center">
               Nom Auteur
             </th>
             <th class="text-center">
              Labo
            </th>
          </tr>
          </thead>
         <tbody id="tbody3">
          <tr id='addr0'>
             <td>
              <input type="text" name='nom[]'  placeholder='Nom Auteur' class="form-control"/>
            </td>
            <td>
              <input type="text" name='labo[]'  placeholder='Labo' class="form-control"/>
            </td>
          </tr>
           </tbody>
          </table>
              <a id="add_row" onclick="addrow3()" class="btn btn-info"><span class="fa fa-plus-square"></span> Add Row</a>
         </div>
      <div>
        <label>Date</label>
        <input type="text" name="date" class="form-control" placeholder="dd-mm-yyyy">
      </div>
      <div class="form-group">
        <label>Ville</label>
        <select class="custom-select" name="ville">
          <option value="Agadir">Agadir</option>
          <option value="El Jadida">El Jadida</option>
          <option value="Marrakech">Marrakech</option>
        </select>
      </div>
      <div class="form-group">
        <label>Pays</label>
        <select class="custom-select" name="country">
          <option value="">Country...</option>
          <option value="Morocco">Morocco</option>
          <option value="Afghanistan">Afghanistan</option>
          <option value="Albania">Albania</option>
          <option value="Algeria">Algeria</option>
          <option value="American Samoa">American Samoa</option>
          <option value="Andorra">Andorra</option>
          <option value="Angola">Angola</option>
          <option value="Cambodia">Cambodia</option>
          <option value="Cameroon">Cameroon</option>
          <option value="Canada">Canada</option>
          <option value="Kyrgyzstan">Kyrgyzstan</option>
          <option value="Laos">Laos</option>
          <option value="Latvia">Latvia</option>
          <option value="Lebanon">Lebanon</option>
        </select>
      </div>
    
  </div>

  <div class="modal-footer">
    <button type="submit" name="insert_conference" class="btn-next btn btn-primary">Valider</button>
    <a href="" class="btn btn-default" data-dismiss="modal">Annuler</a>
  </div>
  </form>
  </div>
  </div>
      </div>
      <div class="modal fade bd-example-modal-sm" id="modal-3">
  <div class="modal-dialog modal-md">
   <div class="modal-content">
     <div class="modal-header">
      <h3 class="modal-title">Ajouter des Théses</h3>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <form class="well" action="#" method="post" name="authors" enctype="multipart/form-data">
        <div class="form-group">
          <label>Titre</label>
          <input type="text" name="title" id="title" class="input-large form-control">
        </div>
        <div class="form-group">
          <label>Abstract</label>
          <textarea name="abstract" id="abstract" class="input-large form-control"></textarea>
        </div>
        <div class="form-group">
          <label>Année</label>
          <select class="custom-select" name="year"  id="year3" required>
            <option>Selectioner une année</option>              
          </select>
        </div>
        <div class="form-group">
          <label>Auteurs</label>
          <table class="table table-bordered table-hover" id="tab_logic">
           <thead>
            <tr >
             <th class="text-center">
               Nom Auteur
             </th>
             <th class="text-center">
              Labo
            </th>
          </tr>
          </thead>
         <tbody id="tbody1">
          <tr id='addr0'>
             <td>
              <input type="text" name='nom[]'  placeholder='Nom Auteur' class="form-control"/>
            </td>
            <td>
              <input type="text" name='labo[]'  placeholder='Labo' class="form-control"/>
            </td>
          </tr>
           </tbody>
          </table>
              <a id="add_row" onclick="addrow1()" class="btn btn-info"><span class="fa fa-plus-square"></span> Add Row</a>
         </div>
    <div class="form-group">
      <label>Jury</label>
      <table class="table table-bordered table-hover" id="tabl">
           <thead>
            <tr >
             <th class="text-center">
               Nom professeur
             </th>
             <th class="text-center">
               Grade
            </th>
            <th class="text-center">
               Lieu
             </th>
          </tr>
        </thead>
        <tbody id="tbody2">
          <tr id='addr0'>
            <td>
              <input type="text" name='name[]'  placeholder='Nom du professeur' class="form-control"/>
            </td>
            <td>
              <input type="text" name='grade[]'  placeholder='Grade' class="form-control"/>
            </td>
            <td>
              <input type="text" name='lieu[]'  placeholder='Lieu' class="form-control"/>
            </td>
          </tr>
        </tbody>
      </table>
      <a id="add_row" onclick="addrow2()" class="btn btn-info"><span class="fa fa-plus-square"></span> Add Row</a>
    </div>
    <div class="form-group">
      <label>URL</label>
      <input type="text" name="url" id="url" class="input-large form-control">
    </div>
  
    </div>

    <div class="modal-footer">
     <button type="submit" name="insert_these" class="btn-next btn btn-primary">Valider</button>
     <a href="" class="btn btn-default" data-dismiss="modal">Annuler</a>
    </div>
    </div>
    </form>
  </div>
      </div>
      <div class="modal fade bd-example-modal-sm" id="modal-4">
          <div class="modal-dialog modal-md">
             <div class="modal-content">
   <div class="modal-header">
    <h3 class="modal-title">Ajouter des Livres</h3>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        <div class="modal-body">
         <form class="well" action="#" method="post" name="authors" enctype="multipart/form-data">
          <div class="form-group">
          <label>Titre</label>
         <input type="text" name="title" id="title" class="input-large form-control">
        </div>
        <div class="form-group">
        <label>Abstract</label>
        <textarea name="abstract" id="abstract" class="input-large form-control"></textarea>
        </div>
        <div class="form-group">
          <label>Année</label>
          <select class="custom-select" name="year"  id="year1" required>
            <option>Selectioner une année</option>              
          </select>
        </div>
        <div class="form-group">
          <label>Auteurs</label>
          <table class="table table-bordered table-hover" id="tab_logic">
           <thead>
            <tr >
             <th class="text-center">
               Nom Auteur
             </th>
             <th class="text-center">
              Labo
            </th>
          </tr>
          </thead>
         <tbody id="tbody5">
          <tr id='addr0'>
            <td>
              <input type="text" name='nom[]'  placeholder='Nom Auteur' class="form-control"/>
            </td>
            <td>
              <input type="text" name='labo[]'  placeholder='Labo' class="form-control"/>
            </td>
          </tr>
           </tbody>
          </table>
              <a id="add_row" onclick="addrow5()" class="btn btn-info"><span class="fa fa-plus-square"></span> Add Row</a>
         </div>
          <div class="form-group">
          <table>
            <thead>
              <tr>
                <th>Publisher name</th>
                <th>ISBN</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <input type="text" name="name" class="form-control" placeholder="Publisher name...">
                </td>
                <td>
                  <input type="text" name="ISBN" class="form-control" placeholder="ISBN...">
                </td>
              </tr>
            </tbody>
          </table>
          </div>
         <div>
        </div>
    
        </div>

        <div class="modal-footer">
        <button type="submit" name="insert_livre" class="btn-next btn btn-primary">Valider</button>
        <a href="" class="btn btn-default" data-dismiss="modal">Annuler</a>
        </div>
        </div>
        </form>
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
<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
<?php 
require "insert_config.php";
 ?>
</html>
<script type="text/javascript">

  var year = 2050;
  var till = 1900;
  var options = "";
  options="<option>Selectioner une année</option>";
  for(var y=year; y>=till; y--){
    options += "<option value="+y+">"+ y +"</option>";
  }
  document.getElementById("year0").innerHTML = options;
  document.getElementById("year3").innerHTML = options;
  document.getElementById("year4").innerHTML = options;
  document.getElementById("year1").innerHTML = options;
  function addrow() {
    var  i=1;
    document.getElementById('tbody').innerHTML+='<tr id="1"><td><input name="nom[]" type="text" placeholder="Nom Auteur" class="form-control input-md"  /></td><td><input name="labo[]" type="text" placeholder="Labo" class="form-control input-md"  /></td></tr>';
    i++;
  }
  function addrow1() {
    var  i=1;
    document.getElementById('tbody1').innerHTML+='<tr id="1"><td><input name="nom[]" type="text" placeholder="Nom Auteur" class="form-control input-md"  /></td><td><input name="labo[]" type="text" placeholder="Labo" class="form-control input-md"  /></td></tr>';
    i++;
  }
  function addrow3() {
    var  i=1;
    document.getElementById('tbody3').innerHTML+='<tr id="1"><td><input name="nom[]" type="text" placeholder="Nom Auteur" class="form-control input-md"  /></td><td><input name="labo[]" type="text" placeholder="Labo" class="form-control input-md"  /></td></tr>';
    i++;
  }
  function addrow5() {
    var  i=1;
    document.getElementById('tbody5').innerHTML+='<tr id="1"><td><input name="nom[]" type="text" placeholder="Nom Auteur" class="form-control input-md"  /></td><td><input name="labo[]" type="text" placeholder="Labo" class="form-control input-md"  /></td></tr>';
    i++;
  }
  function addrow2() {
    var  i=1;
    document.getElementById('tbody2').innerHTML+='<tr id="1"><td><input name="name[]" type="text" placeholder="Nom professeur" class="form-control input-md"  /></td><td><input name="grade[]" type="text" placeholder="Grade" class="form-control input-md"  /></td><td><input name="lieu[]" type="text" placeholder="Lieu" class="form-control input-md"  /></td></tr>';
    i++;
  }
</script>
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
<?php 
?>