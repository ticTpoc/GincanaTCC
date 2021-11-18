<?php

function thumb($extensao,$arq){
    $caminho = "imagens/$extensao/$arq";
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



?>