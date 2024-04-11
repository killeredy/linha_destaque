

window.onload = function(e){ 



    var line = document.getElementsByTagName('p');
    var tempo = 50;
    var contLine = 0;    

    changLine(0);


    function changLine(n)
    {
            line = document.getElementsByTagName('p');    
            var time ;

            if(line[n].getElementsByTagName("span") == null  || line[n].getElementsByTagName("span").length == 0){
                mudarOrdemLinha(line[0])
                return;
            }else{
                var span = line[n].getElementsByTagName("span");
            }


            for(let i = 0; i< span.length; i++ ){
                    time = i * tempo;            
                    setTimeout(function(){   

                            span[i].classList.add('show1');
                            if( span[i + 1] != null  ){
                                span[i + 1 ].classList.add('show0');
                            }

                            if( i ==  span.length - 1){
                                setTimeout(function(){
                                    mudarOrdemLinha(line[0])
                                }, time/2 )
                            }
                }, time);
            }
    }




    function mudarOrdemLinha(line)
    {
            var eElement
            var novaLinha;
            if(contLine >= 7 ){
                eElement = document.getElementById("box-texto")
                novaLinha = line.cloneNode(true);
                var spans = novaLinha.getElementsByTagName("span");
                for(let i = 0; i<spans.length; i++ ){
                    spans[i].classList.remove("show1");
                    spans[i].classList.remove("show0");
                }

                line.remove();
                eElement.insertBefore(novaLinha, eElement.lastChild);
                changLine(contLine);
            }else{
                contLine++
                changLine(contLine);
            }

    }
}

