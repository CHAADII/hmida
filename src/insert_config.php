<?php
require "../vendor/autoload.php";
include('config.php');
$collection=$mongo->projet->Publication;
//require "fonction.php";
//$client=new MongoDB\Client;
//$companydb=$client->companydb;
if (isset($_POST["insert_file"])) {
    
    $url="../DB/".$_POST['filename'];

    $data = fopen($url, "r");
    while(($line = fgets($data)) !== false) {
        $json = json_decode($line, true);
        $c=$collection->insertOne($json);
        
        }
    echo '<script type="text/javascript">
        var element=document.getElementById("ok");
        element.style.display="block";
          setTimeout(function(){
           
           element.style.display="none";
            },3000);

            </script>';
    
    fclose($data);
    
}
if (isset($_POST['insert_article'])){
try 
{
    if ($_POST["start"]!="") {
        $start=(int)$_POST["start"];
    }
    else
         echo "<script>alert(\"entrer la page de depart\")</script>";
     if ($_POST["end"]!="") {
        $end=(int)$_POST["end"];
    }
    else
         echo "<script>alert(\"entrer la page de depart\")</script>";
    if ($_POST["labo"]!="") {
        $labo=$_POST["labo"];
    }
    else
        echo "<script>alert(\"entrer le labo\")</script>";
    if ($_POST["nom"]!="") {
        $nom=$_POST["nom"];
    }
    else
        echo "<script>alert(\"entrer le nom de l'auteur\")</script>";
    if ($_POST["url"]!="") {
        $url=$_POST["url"];
    }
    else
        echo "<script>alert(\"entrer l'url\")</script>";
    if ($_POST["booktitle"]!="") {
        $booktitle=$_POST["booktitle"];
    }
    else 
        echo "<script>alert(\"entrer le titre de l'article\")</script>";
    if ($_POST["abstract"]!="") {
        $abstract=$_POST["abstract"];
    }
    else 
        echo "<script>alert(\"entrer l'abstract\")</script>";
    if ($_POST["year"]!="") {
        $year=(int)$_POST["year"];
    }
    else
        echo "<script>alert(\"entrer l'année\")</script>";
    $type="article";
    if ($_POST["title"]!="") {
    	$title=$_POST["title"];
    }
    else 
        echo "<script>alert(\"entrer le titre de la publication\")</script>";
    if (isset($_POST["labo"])) {
        $authors=array();

        for ($i=0; $i <count($nom) ; $i++) { 
             array_push($authors, ["nom"=>$nom[$i],"labo"=>$labo[$i]]); 
        }   
   $document =array( 
      "title" => $title, 
      "abstract" => $abstract,
      "type" => $type,
      "year" => $year,
      "article" => (object)array( "booktitle" => $booktitle, "url" => $url, "pages" => (object)array( "start" => $start, "end" => $end))
   );
   $document+=["authors"=>$authors];
   
   $c=$collection->insertOne($document);
    }
}
catch (MongoDB\Driver\Exception\ConnectionTimeoutException $e)
{
    // PHP cannot find a MongoDB server using the MongoDB connection string specified
    // do something here
    echo "hola";
}
echo '<script type="text/javascript">
        var element=document.getElementById("ok");
        element.style.display="block";
          setTimeout(function(){
           
           element.style.display="none";
            },3000);
            </script>';
}
if (isset($_POST['insert_livre'])){
try 
{
    if ($_POST["ISBN"]!="") {
        $ISBN=$_POST["ISBN"];
    }
    else
         echo "<script>alert(\"entrer l'ISBN du livre\")</script>";
     if ($_POST["name"]!="") {
        $name=$_POST["name"];
    }
    else
         echo "<script>alert(\"entrer le nom du livre\")</script>";
    if ($_POST["labo"]!="") {
        $labo=$_POST["labo"];
    }
    else
        echo "<script>alert(\"entrer le labo\")</script>";
    if ($_POST["nom"]!="") {
        $nom=$_POST["nom"];
    }
    else
        echo "<script>alert(\"entrer le nom de l'auteur\")</script>";
    if ($_POST["abstract"]!="") {
        $abstract=$_POST["abstract"];
    }
    else 
        echo "<script>alert(\"entrer l'abstract\")</script>";
    if ($_POST["year"]!="") {
        $year=(int)$_POST["year"];
    }
    else
        echo "<script>alert(\"entrer l'année\")</script>";
    $type="livre";
    if ($_POST["title"]!="") {
        $title=$_POST["title"];
    }
    else 
        echo "<script>alert(\"entrer le titre de la publication\")</script>";
    if (isset($_POST["title"])) {
        $authors=array();

        for ($i=0; $i <count($nom) ; $i++) { 
             array_push($authors, ["nom"=>$nom[$i],"labo"=>$labo[$i]]); 
        }
    $document =array( 
      "title" => $title, 
      "abstract" => $abstract,
      "type" => $type,
      "year" => $year,
      "livre" => (object)array( "publisher"=>(object)array( "name" => $name, "ISBN" => $ISBN))
   );
    $document+=["authors"=>$authors];
    $c=$collection->insertOne($document);
    }
}
catch (MongoDB\Driver\Exception\ConnectionTimeoutException $e)
{
    // PHP cannot find a MongoDB server using the MongoDB connection string specified
    // do something here
}
echo '<script type="text/javascript">
        var element=document.getElementById("ok");
        element.style.display="block";
          setTimeout(function(){
           
           element.style.display="none";
            },3000);
            </script>';
}
if (isset($_POST['insert_conference'])){
try 
{
    
    if ($_POST["date"]!="") {
        $date=$_POST["date"];
    }
    else
         echo "<script>alert(\"entrer la date de la communication\")</script>";
     if ($_POST["ville"]!="") {
        $city=$_POST["ville"];
    }
    else
         echo "<script>alert(\"entrer la ville \")</script>";
    if ($_POST["country"]!="") {
        $country=$_POST["country"];
    }
    else
         echo "<script>alert(\"entrer le pays de la communication\")</script>";
    if ($_POST["labo"]!="") {
        $labo=$_POST["labo"];
    }
    else
        echo "<script>alert(\"entrer le labo\")</script>";
    if ($_POST["nom"]!="") {
        $nom=$_POST["nom"];
    }
    else
        echo "<script>alert(\"entrer le nom de l'auteur\")</script>";
    if ($_POST["abstract"]!="") {
        $abstract=$_POST["abstract"];
    }
    else 
        echo "<script>alert(\"entrer l'abstract\")</script>";
    if ($_POST["year"]!="") {
        $year=(int)$_POST["year"];
    }
    else
        echo "<script>alert(\"entrer l'année\")</script>";
    $type="conference";
    if ($_POST["title"]!="") {
        $title=$_POST["title"];
    }
    else 
        echo "<script>alert(\"entrer le titre de la publication\")</script>";
    if (isset($_POST["title"])) {
        $authors=array();

        for ($i=0; $i <count($nom) ; $i++) { 
             array_push($authors, ["nom"=>$nom[$i],"labo"=>$labo[$i]]); 
        }
    $document =array( 
      "title" => $title, 
      "abstract" => $abstract,
      "type" => $type,
      "year" => $year,
      "conference" => (object)array( "date"=>$date ,"city" => $city, "country" => $country)
   );
    $document+=["authors"=>$authors];
   
    $c=$collection->insertOne($document);
   
    }
}
catch (MongoDB\Driver\Exception\ConnectionTimeoutException $e)
{
    // PHP cannot find a MongoDB server using the MongoDB connection string specified
    // do something here
    echo "hola";
}
echo '<script type="text/javascript">
        var element=document.getElementById("ok");
        element.style.display="block";
          setTimeout(function(){
           
           element.style.display="none";
            },3000);
        
            </script>';

}
if (isset($_POST['insert_these'])){
try 
{
    if ($_POST["grade"]!="") {
        $grade=$_POST["grade"];
    }
    else
         echo "<script>alert(\"entrer le grade\")</script>";
     if ($_POST["lieu"]!="") {
        $lieu=$_POST["lieu"];
    }
    else
         echo "<script>alert(\"entrer le lieu \")</script>";
    if ($_POST["name"]!="") {
        $name=$_POST["name"];
    }
    else
         echo "<script>alert(\"entrer le nom du jury\")</script>";
    if ($_POST["labo"]!="") {
        $labo=$_POST["labo"];
    }
    else
        echo "<script>alert(\"entrer le labo\")</script>";
    if ($_POST["nom"]!="") {
        $nom=$_POST["nom"];
    }
    else
        echo "<script>alert(\"entrer le nom de l'auteur\")</script>";
    if ($_POST["url"]!="") {
        $url=$_POST["url"];
    }
    else
        echo "<script>alert(\"entrer l'url\")</script>";
    if ($_POST["abstract"]!="") {
        $abstract=$_POST["abstract"];
    }
    else 
        echo "<script>alert(\"entrer l'abstract\")</script>";
    if ($_POST["year"]!="") {
        $year=(int)$_POST["year"];
    }
    $type="these";
    if ($_POST["title"]!="") {
        $title=$_POST["title"];
    }
    else 
        echo "<script>alert(\"entrer le titre de la publication\")</script>";
    if (isset($_POST["title"])) {
         $authors=array();

        for ($i=0; $i <count($nom) ; $i++) { 
             array_push($authors, ["nom"=>$nom[$i],"labo"=>$labo[$i]]); 
        }
        $jury=array();

        for ($i=0; $i <count($nom) ; $i++) { 
             array_push($jury, ["name"=>$name[$i],"grade"=>$grade[$i],"lieu"=>$lieu[$i]]); 
        }
    $document =array( 
      "title" => $title, 
      "abstract" => $abstract,
      "type" => $type,
      "year" => $year,
   );
    $thesare=array();
    $thesare+=["jury"=>$jury];
    $document+=["authors"=>$authors];
    $document+=["these"=>$thesare];
    $c=$collection->insertOne($document);
    }
}
catch (MongoDB\Driver\Exception\ConnectionTimeoutException $e)
{
    // PHP cannot find a MongoDB server using the MongoDB connection string specified
    // do something here
    echo "hola";
}
echo '<script type="text/javascript">
        var element=document.getElementById("ok");
        element.style.display="block";
          setTimeout(function(){
           
           element.style.display="none";
            },3000);
        
            </script>';
}

?>