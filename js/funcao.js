

function intrandom(min,max){
    min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min)) + min;
}

function randomZero_One(){
    return Math.round(Math.random());
}

function randn_bm() {
    var u = 0, v = 0;
    while(u === 0) u = Math.random(); //Converting [0,1) to (0,1)
    while(v === 0) v = Math.random();
    return Math.sqrt( -2.0 * Math.log( u ) ) * Math.cos( 2.0 * Math.PI * v );
}

function algoritmo(min,max){

    var selecao = null;

   selecao = intrandom(min,max)+intrandom(min,max);


   return selecao;

    

}

