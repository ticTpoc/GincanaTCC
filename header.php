
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">



function sair() {

    var logout= new FormData();
   

    $.ajax({
            url:'logout_usuario.php',
            method: 'post',
            data: logout,
            processData: false,
            contentType:false,
            success: function(resposta){
                    alert("Adeus :D");
            }
    });
    window.location.href="index.php";
}
 </script>

<div class="cabeca">
<?php


echo "<header>";


if(empty($_SESSION['user'])){

    echo "<div id='corpo-principal'>";
    echo "<div id='corpo-princ-login'>";
    echo "<a href='novo_usuario.php'> Cadastro </a> ";
    echo "<a href='login_usuario.php' ><p style='font-size:20px;'> Login </p></a>";
   

}else{
   


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
    echo " <a href ='notificacoes.php' > notificações</a>|";
    echo " <a href ='jogos.php' > Jogos </a>|";
    
    

    if(admin()){
     
        echo "<a href='usuarios.php'> usuarios </a> |";

        echo "<a href='skins.php'> skins </a> |";

        echo "<a href='perguntas.php'> perguntas </a> |";
        
        echo "<a href='novo_form_skin.php'> add skin </a> |";

        echo "<a href='novo_form_pergunta.php'> add perguntas </a> |";

      
    }

    echo " <br><br><button id='sair' onclick='sair()'> Sair </button> ";
   
}

 
    

echo "</header>";


?>
</div>
