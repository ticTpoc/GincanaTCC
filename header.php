<div class="cabeca">
<?php

echo "<header>";


if(empty($_SESSION['user'])){
echo "<div id='corpo-principal'>";

    echo "<a href='login_usuario.php' > Login </p></a>";
    echo "<a href='loja.php'> loja </a>";

echo "</div>";

}


else{ 
    
    $rm = $_SESSION['rm'] ?? 0;
$q="select rm,usuario, coin from usuarios where $rm=rm";
  $busca=$banco->query($q);
  $reg = $busca->fetch_object();
    echo ' '. $_SESSION['nome'];

    echo "<div id ='corpo-princ-login'>";

    echo " <a href ='edit_form_usuario.php' > Meus dados </a>|";
    echo " <a href ='loja.php' > Loja </a>|";
    echo " <a href ='inventario.php' > Inventário </a>|";
    echo " <a href='farm.php?coin=$reg->coin'> Dungeon </a><br>";

    if(admin()){
     
        echo "<a href='usuarios.php'> usuarios </a> |";

        echo "<a href='skins.php'> skins </a> |";
        
        echo "<a href='novo_usuario.php'> novo usuário </a> |";
        
        echo "<a href='novo_form_skin.php'> add skin </a> |";
      
    }
    echo " <br><br><a href='logout_usuario.php'  style='text-align:left;'> Sair </a> ";
    echo "</div>";
}


echo "</header>";


?>
</div>