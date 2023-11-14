
let atualiza = function(){
    $.get("conexao/atualizaTempo.php", function(data, status){
      //  console.log(data);
    });
   // requestAnimationFrame(atualiza);
}

  //  atualiza();

    setInterval(atualiza, 1000);

   // requestAnimationFrame(atualiza);


   /**Prucurar**/
   $("#buscarChat").on("input", function(){
        let dadosPesquisa = $(this).val();
        if(dadosPesquisa == '') return;
       // console.log(dadosPesquisa);
       $.post("conexao/busca.php",
        {
            key: dadosPesquisa
        }, 
        function(data, status){
            $("#listasms").html(data);
        }
       );
   })
   /**Clicado**/
   $("#pesqChat").on("click", function(event){
        event.preventDefault();
        let dadosPesquisa = $("#buscarChat").val();
        if(dadosPesquisa == "") return;
       // console.log(dadosPesquisa);
       $.post("conexao/busca.php",
        {
            key: dadosPesquisa
        }, 
        function(data, status){
            $("#listasms").html(data);
        }
       ); 
    
   })

   /**Prucurar**/
   $("#buscarChatFree").on("input", function(){
        let dadosPesquisa = $(this).val();
        if(dadosPesquisa == '') return;
       // console.log(dadosPesquisa);
       $.post("conexao/busca.php",
        {
            free: dadosPesquisa
        }, 
        function(data, status){
            $("#listasms").html(data);
        }
       );
   })
   /**Clicado**/
   $("#pesqChatFree").on("click", function(event){
        event.preventDefault();
        let dadosPesquisa = $("#buscarChatFree").val();
        if(dadosPesquisa == "") return;
       // console.log(dadosPesquisa);
       $.post("conexao/busca.php",
        {
            free: dadosPesquisa
        }, 
        function(data, status){
            $("#listasms").html(data);
        }
       ); 
    
   })

   
   $("#mandarsms").on("click", function(event){
       event.preventDefault();
   
       let mandasms = document.getElementById("mandarsms");
       let messagem = $("#escrevesms").val();
       let receber_id = $("#idPrestador").val();
       // let messagem = document.getElementById("escrevesms").innerHTML;
   
   
       let mandarsms = mandasms.name; 
       // console.log(mandarsms);
      
       if(messagem == "") return;
    //   alert(mensagen);
   
        // console.log(receber_id);
   
      
       $.post("conexao/inserirChat.php",
           {
             mandarsms: mandarsms,
             messagem: messagem,
             receber_id: receber_id
           },
           function(data, status){
             $("#escrevesms").val("");
            
             $("#smschat").append(data);
         
               //console.log(messagem);
             roralBaixo();
           }
          );    
   
    });

   $("#smsfree").on("click", function(event){
       event.preventDefault();
   
       let mandasms = document.getElementById("smsfree");
       let messagem = $("#escrevesms").val();
       let receber_id = $("#idcliente").val();
       // let messagem = document.getElementById("escrevesms").innerHTML;
   
   
       let smsfree = mandasms.name; 
       // console.log(mandarsms);
      
       if(messagem == "") return;
    //   alert(mensagen);
   
        // console.log(receber_id);
   
      
       $.post("conexao/inserirChat.php",
           {
              smsfree: smsfree,
             messagem: messagem,
             receber_id: receber_id
           },
           function(data, status){
             $("#escrevesms").val("");
            
             $("#smschat").append(data);
         
               //console.log(messagem);
             roralBaixo();
           }
          );    
   
    });

    
      
   
    var roralBaixo = function(){
 
   // let chatBox = document.getElementById("outgoing_msg");
    let chatBox = document.getElementById("incoming_msg");

    chatBox.scrollTop = chatBox.scrollHeight;

 } 

 let bt_download = $('.like');
 //let fazBaixar = $('.gosto');
 let fazBaixar = document.querySelector(".gosto");
 //console.log(fazBaixar)

 Array.from($('.like')).forEach((e)=>{
  e.addEventListener('click', (el)=>{
    var btBaixar = $(this).text();
    var IdBaixar = e.id;
    var inputBaixados = fazBaixar.value;
    inputBaixados++; 
  //  alert(IdBaixar);
  //console.log(inputBaixados);

    $.ajax({
            url:"conexao/cadastrar.php",
            method:"post",
            data:{IdBaixar:IdBaixar,inputBaixados:inputBaixados},
         //   dataType: "json",
            success: function(dados){
               // $("#assistiu").html(dados.assistiu).text();
             //  alert(dados)
               console.log("Sucesso")
            }
           //
        }) 

  })
})










