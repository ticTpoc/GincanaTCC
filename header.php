<div class="cabeca">
<?php


echo "<header>";
if(empty($_SESSION['user'])){

    echo "<a href='novo_usuario.php'> Cadastro </a> ";
    echo "<a href='login_usuario.php' ><p style='font-size:20px;'> Login </p></a>";
    echo "<a href='loja.php'> loja </a>";

}else{
    echo 'olá '. $_SESSION['nome'];
    require_once "includes/bd.php";
    require_once "includes/funcao.php";
    require_once "includes/login.php";
    
    $rm = $_SESSION['rm'] ?? 0;
    $q="select rm,usuario,coin from usuarios where $rm=rm";
      $busca=$banco->query($q);
    $reg = $busca->fetch_object();
    echo " <a href ='edit_form_usuario.php' > Meus dados </a>|";
    
    echo " <a href ='loja.php' > Loja </a>|";
    echo " <a href ='inventario.php' > Inventário </a>|";
    echo " <a href ='jogos.php' > Jogos </a>|";
    
    
    if(admin()){
     
        echo "<a href='usuarios.php'> usuarios </a> |";
        
        echo "<a href='banidos.php'> banidos </a> |";

        echo "<a href='skins.php'> skins </a> |";
        
       
        
        echo "<a href='novo_form_skin.php'> add skin </a> |";

       
      
    }
    echo " <br><br><a href='logout_usuario.php'  style='text-align:left;'> Sair </a> ";
}
echo "</header>";

?>
</div>