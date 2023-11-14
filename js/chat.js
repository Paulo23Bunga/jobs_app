/*
$(function(){
  
  let mensagem = $("#escrevesms");
  var data=new Date();
  var hor=data.getHours();
  var min=data.getMinutes();
  var seg=data.getSeconds();

  $("#mandarsms").click(()=>{
    //alert("Ola");
    //console.log(mensagem.val());
    $("#smschat").append(`
      <div class='d-flex justify-content-end mb-4 incoming_msg' >

       <div class='msg_cotainer_send received_with­d_msg' id='tamanho1'>

             <p id="texto" class="text-light text-start">`+mensagem.val()+`</p>
             <span class="msg_time_send text-secondary">`+hor+':'+min+` , Hoje</span>
        </div>
        <div class="img_cont_msg">
          <img src="img/meio.jpg" class="rounded-circle user_img_msg">
          </div>

     </div>
   `)

    mensagem.focus();
    mensagem.val("");
    //var rol=event.target.dataset.nome;
    document.getElementById("smschat").scrollIntoView();

   
  

  })


})

*/
/*
 var roralBaixo = function(){
 
   // let chatBox = document.getElementById("outgoing_msg");
    let chatBox = document.getElementById("incoming_msg");

    chatBox.scrollTop = chatBox.scrollHeight;

 } 
*/
 
