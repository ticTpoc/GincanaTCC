<?php

function thumb($arq){
    $caminho = "imagens/$arq";
    if(is_null($arq) || !file_exists($caminho)){
        return "imagens/erro.jpg";

    }else{
        return $caminho;
    }


}

function voltar(){
    return "<a href='index.php'><span class='material-icons'>exit_to_app</span></a>";
 }


function sucesso($m){

    $resp ="<div class='sucesso'><span class='material-icons'>check_circle</span> $m </div>";
    return $resp;
}

function aviso($m){
    $resp ="<div class='aviso'><span class='material-icons'>warning_amber</span> $m </div>";
    return $resp;
}

function erro($m){
    $resp ="<div class='erro'><span class='material-icons'>gpp_bad</span> $m </div>";
    return $resp;
}

<<<<<<< Updated upstream
=======
function algoritmo($rigor){

    $qtdmobs = 9;
    //itens raros sempre nos extremos do array
    $mobs = Array('unicornio', 
                    'dragao',
                    'ogro',
                    'anao',
                    'goblin',
                    'elfo',
                    'orc',
                    'poseidon',
                    'marcella'
                );
                
    //armazena a quantidade sorteada de cada item
    $numeros = array();
    //controla o rigor de sorteio. quanto maior o numero, mais raros se tornam os itens das extremidades
    
    //total de premios que serao sorteados
    $totalmobs = 1;
    //zera o vetor de quantidade para garantir que nao tenha nada.
    for($i = 0; $i < $qtdmobs; $i++){
        $numeros[$i] = 0;
    }
    //inicia o sorteio 
    for($i = 0; $i < $totalmobs; $i++){
        //variavel que armazenará qual premio será sorteado
        $n = 0;
        //estrutura de repeticao que fará o controle da raridade dos extremos do array de premios
        for($j = 0; $j < $rigor; $j++){
            $n += mt_rand(0 , ($qtdmobs-1) ) / $rigor;
        }

        $numeros[ $n ]++;
    }

    $key = array_search(1, $numeros); 
    $newmob = $mobs[$key];
   
   return $newmob;

 
  

    
}

function mobarray($vezes){
     // $key = array_search(1, $numeros); 
    //$newmob = $mobs[$key];
$mobarray=array();

$i=0;
while($i<$vezes){
    $mob = algoritmo(5); 
    $mobarray[$i]= $mob;
    $i++;
   
}
$comma_separated = implode(",", $mobarray);
>>>>>>> Stashed changes

print $comma_separated;

}

?>