
<?php
if(empty($_SESSION['user'])){
    echo"<footer>";

echo "<p> Acessado por [".$_SERVER['REMOTE_ADDR']."] em |".date('d/m/y')."| ";

echo "<p>Desenvolvido por TurminhaBacana &copy; 2021</p>";

echo " </footer>";
}else{


    
$rm = $_SESSION['rm'] ?? 0;
$q="select rm,usuario,coin from usuarios where $rm=rm";
  $busca=$banco->query($q);
  


$reg = $busca->fetch_object();
echo"<footer>";
echo "<a href='farm.php?coin=$reg->coin'> Dungeon uuu</a><br>";

echo "<p> Acessado por [".$_SERVER['REMOTE_ADDR']."] em |".date('d/m/y')."| ";

echo "<p>Desenvolvido por TurminhaBacana &copy; 2021</p>";

echo " </footer>";

}


$banco->close();

?>