<?php
if (!isset($_GET['type'])) {
  $_GET['type']="article";
}

if(isset($_GET['type'])){
require "../vendor/autoload.php";
include ('config.php');
    
    $filter=['type'=>$_GET["type"]];
    $cursor=$c->find($filter);
    $res=iterator_to_array($cursor);
    $yeara=array();
    $year=array();
    foreach ($res as $key) {

      if (!in_array($key->year, $yeara)) {
        $yeara[]=$key->year;
        $filter1=$filter;
        $filter1+=["year"=>$key->year];
        $cur1=$c->find($filter1);
        $res1=iterator_to_array($cur1);  
        $a=array();
        $a=array("year"=>$key->year,"nbyear"=>count($res1));
        array_push($year, $a);
      }
    }
    sort($year);
    $auteur=array();
    $auteura=array();
    foreach ($res as $key) {
      foreach ($key->authors as $val) {
        if (!in_array($val->nom, $auteura)) {  
          $auteura[]=$val->nom;
          $filter1=$filter;
        $filter1+=["authors.nom"=>$val->nom];
        $cur1=$c->find($filter1);
        $res1=iterator_to_array($cur1);  
        $a=array();
        $a=array("nom"=>$val->nom,"nb"=>count($res1));
        array_push($auteur, $a);
        }
      }
      
    }
    sort($auteur);
    $publication=array();
    if($_GET['type']=="livre"){
      $publication=array();
    $publicationa=array();
    foreach ($res as $key) {
      $pub=$key->livre->publisher->name;
        if (!in_array($pub, $publicationa)) {  
          $publicationa[]=$pub;
          $filter1=$filter;
        $filter1+=["livre.publisher.name"=>$pub];
        $cur1=$c->find($filter1);
        $res1=iterator_to_array($cur1);  
        $a=array();
        $a=array("name"=>$pub,"nb"=>count($res1));
        array_push($publication, $a);
        }
      
      
    }
    sort($publication);
    }    
    if($_GET['type']=="conference"){
      $publication=array();
    $publicationa=array();
    foreach ($res as $key) {
      $pub=$key->conference->country;

        if (!in_array($pub, $publicationa)) {  
          $publicationa[]=$pub;
          $filter1=$filter;
        $filter1+=["conference.country"=>$pub];
        $cur1=$c->find($filter1);
        $res1=iterator_to_array($cur1);  
        $a=array();
        $a=array("name"=>$pub,"nb"=>count($res1));
        array_push($publication, $a);
        }
      
      
    }
    sort($publication);
    }

    
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

    <!-- Custom styles for this template -->
    <link href="../css/blog-home.css" rel="stylesheet">
     <script type="text/javascript" src="../vendor/jquery/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
        'packages':['geochart'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
var type= <?php echo json_encode($_GET['type']); ?>;
        if(type=="conference"){
            var conference= <?php echo json_encode($publication); ?>;
            data = new google.visualization.DataTable();
            data.addColumn('string', 'country');
            data.addColumn('number', 'Nombre publication');
        conference.forEach(function(nom) {
          data.addRows([[String(nom.name), Number(nom.nb)]]);
        })
        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }}
      // Load the Visualization API and the corechart package.
       google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      // Set a callback to run when the Google Visualization API is loaded.
      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
    var nbcandi= <?php echo json_encode($year); ?>;
    var i;
    
        // Create the data table.
        var data2 = new google.visualization.DataTable();
        data2.addColumn('string', 'Année');
        data2.addColumn('number', 'Nombre publication');
        nbcandi.forEach(function(year){
          data2.addRows([[String(year.year), Number(year.nbyear)]]);
        })
          
        
        var options = {
          title: 'Nombre de publication par Année',
          hAxis: {title: 'Année',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
          backgroundColor: '#fcfcfc'
        };
        var chart = new google.visualization.AreaChart(document.getElementById('chart'));
        chart.draw(data2, options);
        //new chart
        var auteur= <?php echo json_encode($auteur); ?>;
        var size=auteur.length;
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'auteur');
        data.addColumn('number', 'Nombre publication');
        if (size>5) {
          size=5;
        }
        for (var i = 0; i < size; i++) {
          data.addRows([[String(auteur[i].nom), Number(auteur[i].nb)]]);
        }
         
        
        var options = {
          title: 'Les top 5 auteurs',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('auteurnb'));
        chart.draw(data, options);

        var type= <?php echo json_encode($_GET['type']); ?>;
        
         
        if(type=="livre"){
            var livre= <?php echo json_encode($publication); ?>;
            size=livre.length;
            data = new google.visualization.DataTable();
            data.addColumn('string', 'publisher');
            data.addColumn('number', 'Nombre publication');
                  if (size>5) {
                      size=5;
                            }
                  for (var i = 0; i < size; i++) {
                          data.addRows([[String(livre[i].name), Number(livre[i].nb)]]);
                        }        

        var options = {
          title: 'Les top 5 publisher',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pubnb'));
        chart.draw(data, options);
        }
      }        
      
       
    </script>
  </head>

  <body onload="drawChart();drawRegionsMap()" background="img/a.jpg">

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
<div class="container">
  <div class="row">

    <!-- Page Content -->
        <?php
        if(!isset($_GET["page"])){
          $_GET["page"]=0;}

         $filter=['type'=>$_GET["type"]];
    $cursor=$c->find($filter);
    $res=iterator_to_array($cursor);
    $numero=count($res);
    $nbelementparpage=9;
    $nbpage=round(count($res)/$nbelementparpage);
    $filter=['type'=>$_GET["type"]];
    $options=['limit'=>$nbelementparpage];
    $nbskip=$_GET['page']*$nbelementparpage;
    $options+=['skip'=>$nbskip];
    $cursor=$c->find($filter,$options);
    $res=iterator_to_array($cursor);
        ?>
        <?php 
              if ($_GET['page']==$nbpage) {
                $total=$numero;
              }
              else{
                $total=(count($res)*($_GET['page']+1));
              }
             ?>
        <div class="col-md-8">
          <h4 class="my-4">Nombre <?php echo $_GET['type']." : ".$total." sur ". $numero; ?>  

            <!--<small>Secondary Text</small>-->

          </h4>
          <div class="col-md-4">
            <span class="badge badge-info"><h4><?php echo $_GET['type']; ?></h4></span>
            <br>
            <p> </p>
          </div>
        <div class="row" id="table" >
          <?php
          foreach ($res as $doc) {
          ?>
         <div class="col-md-4">
          <div class="card md-4">
            <div class="card-header">Title : <?php  echo $doc->title ?></div>
            <div class="card-body">
              <p class="h-25 card-text"><?php echo substr($doc->abstract, 0,100) ?>...</p>
              <?php
              $lien="publication.php?id=".$doc->_id;
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
          <br>
          </div>

          <?php
        }
          ?>
          
        </div> 
<div class="row">        
<div class="col-md-4 offset">
<nav aria-label="Page navigation example ">
  <ul class="pagination" >
       <?php
       $nbl=8;
       $nbj=intval($nbl/2);
       echo "<li class='page-item '><a class='page-link' href='statistiques?type=".$_GET['type']."&page=0#table'><<</a></li>";
       $disabled="";
       if ($_GET['page']==0) {
        $disabled="disabled";
       }
       echo "<li class='page-item ".$disabled."'><a class='page-link' href='statistiques?type=".$_GET['type']."&page=".($_GET['page']-1)."#table'>Precedant</a></li>";    
       if($nbpage>$nbj){
        $active="";
        if ($_GET["page"]>$nbj AND $_GET['page']<$nbpage-($nbj-1)) {
          
          for ($i=(int)$_GET["page"]-$nbj; $i <(int)$_GET["page"]+$nbj; $i++) { 
            if ($i==$_GET["page"]) {
              $active="active";
            }
            echo "<li class='page-item ".$active."'><a class='page-link' href='statistiques?type=".$_GET['type']."&page=".$i."#table'>".($i+1)."</a></li>";     
            $active="";
        }
        }else{
        if($_GET['page']<$nbj){
        for ($i=0; $i <$nbl; $i++) { 
          if ($i==$_GET["page"]) {
              $active="active";
            }
            echo "<li class='page-item ".$active."'><a class='page-link' href='statistiques?type=".$_GET['type']."&page=".$i."#table'>".($i+1)."</a></li>"; 
            $active="";   
        }
       }else{
          for ($i=$nbpage-$nbl; $i <$nbpage; $i++) { 
          if ($i==$_GET["page"]) {
              $active="active";
            }
            echo "<li class='page-item ".$active."'><a class='page-link' href='statistiques?type=".$_GET['type']."&page=".$i."#table'>".($i+1)."</a></li>"; 
            $active="";   
        }
        }}
       }else{
    for ($i=0; $i <$nbpage ; $i++) { 
      if ($i==$_GET["page"]) {
              $active="active";
            }
      echo "<li class='page-item ".$active."'><a class='page-link' href='statistiques?type=".$_GET['type']."&page=".$i."#table'>".($i+1)."</a></li>";
      $active="";
    }}
    $disabled="";
       if ($_GET['page']==$nbpage-1) {
        $disabled="disabled";
       }
       echo "<li class='page-item ".$disabled."'><a class='page-link' href='statistiques?type=".$_GET['type']."&page=".($_GET['page']+1)."#table'>Suivant</a></li>";    
       echo "<li class='page-item '><a class='page-link' href='statistiques?type=".$_GET['type']."&page=".($nbpage)."#table'>>></a></li>";
  ?>
  
  </ul>
  
</nav>
</div>
</div>
</div>
<div class="col-md-4">      

        <!-- Blog Entries Column -->
     
          
      
          <div class="col-md-12">
          <div class="card bg-secondary text-light" class="col-md-12">
          <div class="card-header"><h6>Nombre <?php echo $_GET['type']; ?> Par Année</h6></div>
          <div class="card-body" id="chart"></div>
        </div>
        </div>
      
        <!-- Sidebar Widgets Column -->
        
        <div class="col-md-12">
        <div class="card bg-secondary text-light">
        
        <div class="card-header">  <h6>Nombre <?php echo $_GET['type']; ?> Par Auteur</h6></div>
          <div class="card-body" id="auteurnb"></div>
        </div>
          </div>
      
      
       
        
          <!-- Categories Widget -->
          <div class="col-md-12">
            
            <?php
            if($_GET['type']=='livre') {
              echo'<div class="card bg-secondary text-light">
              <div class="card-header">';
              echo '<h5>Nombre de livre Par Publisher</h5></div>';
                
          
            echo'<div class="card-body">';?><div id="pubnb" ></div><?php echo'</div>';
            }
            ?>
            <?php
            if($_GET['type']=='conference') {
              echo'<div class="card bg-secondary text-light">
              <div class="card-header">';
              echo '<h6>Nombre de conference Par Pays</h6></div>';
                }
            
            echo'</div>
            <div class="card-body">';?>
            <div id="regions_div"></div>
            <?php echo '</div>'; ?>
          </div>       
        
      </div>
    </div>
</div> 
  


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

    <!----- modal -->
   

</body>

</html>
