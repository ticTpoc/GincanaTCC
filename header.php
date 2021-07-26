
<pre>

</pre>
<?php

echo "<header>";
if(empty($_SESSION['user'])){

    echo "<a href='login_usuario.php' ><p style='font-size:20px;'> Login </p></a>";
    echo "<a href='loja.php'> loja </a>";

}else{
    echo 'olá '. $_SESSION['nome'];

    echo " <a href ='edit_form_usuario.php' > Meus dados </a>|";
    echo " <a href ='loja.php' > Loja </a>|";
    if(admin()){
     
        echo "<a href='novo_usuario.php'> novo usuário </a> |";
        echo "<a href='novo_filme.php'> novo filme</a> |";
    }
    echo " <br><a href='logout_usuario.php'  style='text-align:left;'> Sair </a> ";
}
echo "</header>";

?>