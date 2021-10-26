
<?php



 echo"<footer >";

echo "<p> Acessado por [".$_SERVER['REMOTE_ADDR']."] em |".date('d/m/y')."| ";

echo "<p>Desenvolvido por TurminhaBacana &copy; 2021</p>";

echo " </footer>";



$banco->close();

?>