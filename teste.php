
<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>  
    <div id='corpo'>
        
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

     <script type="text/javascript">

     function algoritmo(){

/* quantidade de mobs, deve corresponder ao array mobs */
var qtdmobs = 9;

/* todos os mobs possiveis */
var mobs= ['unicornio','dragao','ogro','anao','goblin','elfo','orc','poseidon','marcella'];


/* algoritmo que seleciona numeros aleatórios */
var selecao = Math.round((parseInt((Math.random()*10))+parseInt((Math.random()*10)))/2);


/* caso a seleção seja igual a quantidade de mobs, pois o array conta a partir do 0 */
if(selecao===qtdmobs){
    selecao=qtdmobs-1;
}
/* adiciona a seleção na viariavel mob, a partir de mobs */
var mob = mobs[selecao];

/* caso de erro */
if(mob === null){
    alert("erro no mob");
}
/*só pra mostrar + extras */
return mob;
}


     function mobatacar(inimigo){

        var mob = new FormData();
        mob.append('mob', inimigo);

        $.ajax({
            url:'script.php',
            method: 'post',
            data: mob,
            processData: false,
            contentType:false,
            success: function(resposta){
                     var tmp = resposta.split(",");

                     var mincoin = tmp[0];
                     var maxcoin = tmp[1];
                     var dano = tmp[2];
                     var chance = tmp[3];

                     if(dado>chance){
                        if(cliques==i+1){
                         ganhar();
                         return;
                     }

                     moveToSlide(track, currentSlide, nextSlide);
                      pdateDots(currentDot, nextDot);
                      coin =parseInt( Math.random() * (maxcoin - mincoin) + mincoin) + coin;
                    document.getElementsByTagName("h5")[0].firstChild.data = "Moedas: " + coin;
                    cliques++;
                     }else{
                        vida--;
                        return vida;
                     }      
                     
                 }
        })

       
     }

    mobatacar(algoritmo());

     
     </script>
<h1 id="dano"></h1>
<h1 id="chance"></h1>
<h1 id="mincoin"></h1>
<h1 id="maxcoin"></h1>


    
</body>

</html>