<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>    
    <?php 
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";
?>  
 <?php
     $rm = $_SESSION['rm'] ?? 0;
$q="select * from usuarios where $rm=rm";
$busca = $banco->query($q); 
?>
  <?php
 
  $id = $_GET['id'] ?? 0;
  $k="select * from skins where $id=id";
  $busca2=$banco->query($k);
  ?> 
 <div id="pedido"> 
  <?php
$reg = $busca->fetch_object();
$reg2 = $busca2->fetch_object();
$rm=$_POST['rm'] ?? null;

if($rm==null){
    echo "<form action='pedido.php?id=$id' method='post'>";
    echo "<table>";
    echo " <tr><td> Insira seu RM <td><input type='text' name='rm' id='rm' size='6' maxlength='6' required>";
    echo "<tr><td><input type='submit' value='Finalizar pedido'>";
    echo "</table></form>";
}else{
    if(!($rm==$reg->rm)){
        echo aviso("RM incorreto, pare de sacanagem >:c");
    }else{
        $novacoin= $reg->coin - $reg2->preco;
        $novonivel= $reg->nivel + 1;
        $novavida = $reg->vida + $reg2->valor;
        
        echo "<br>";
        echo "$reg->nivel<br>";
        echo $reg->vida;
           
       
        if($novacoin<0){
          
          echo erro ("moedas insuficientes :(");
            echo aviso ("vai trabalhar >:(");

        }else{
            


            switch($reg2->nome){

case 'armadura':

    $q="
    update usuarios
    set coin='$novacoin'
    where rm='$rm';
                 ";
     $banco->query($q);
         $k="
               update usuarios
             set vida='$novavida'
               where rm='$rm';
                         ";
            $banco->query($k);
            break;
case'chave':
    $q="
    update usuarios
    set coin='$novacoin'
    where rm='$rm';
                 ";
     $banco->query($q);
     
     $j="
        update usuarios
        set nivel='$novonivel'
        where rm='$rm';
                     ";
                     $banco->query($j);
    break;
        default:
        $q="INSERT INTO COMPRAS(usuarios_rm,skins_id) VALUES 
        ('$rm','$id');";
        if($banco->query($q)){

           echo sucesso(" Compra feita com sucesso :D");
           echo '<br>';
           echo '<br>';
           echo "dinheiro seu $reg->coin";
           echo '<br>';
           echo "preço $reg2->preco";
           echo '<br>';
           echo '<br>';

           $q="
           update usuarios
           set coin='$novacoin'
           where rm='$rm';
                        ";
                        $banco->query($q);
                        $k="
                       update compras
                       set estagio='$quantidade'
                       where rm='$rm';
                                    ";
            $banco->query($k);
        }
            }
          
            }

            
        }
       

}


 



 


?>
    


     
     <?php  include_once "footer.php"; ?>

</div>  
</body>

</html>