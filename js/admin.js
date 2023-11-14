$(document).ready(function(){
            /**Clicado**/
 //alert("Ola")

Array.from($('.eliminar')).forEach((e)=>{
  e.addEventListener('click', (el)=>{
    var IdBaixar = e.id;
    
    
      
       // alert(IdBaixar);
       $.post("cadastrar.php",
        {
            
            eliminar: IdBaixar
        }, 
        function(data, status){
            //console.log(status);
           // alert("Arquivo Elimonado");
            $("#trasdados").append(data);
        }
       );  

  })
}) 

Array.from($('.editar')).forEach((e)=>{
  e.addEventListener('click', (el)=>{
    var IdEdita = e.id;
    let imgTrabalho = document.getElementById("imgedita").files;
        //alert(IdEdita);
     /*  $.post("cadastrar.php",
        {
            
            editar_servico: IdEdita
        }, 
        function(data, status){
            //console.log(status);
            alert(data);
           // $("#trasdados").append(data);
        }
       );  */


    $.ajax({
            url:"cadastrar.php",
            method:"post",
            data:{editar_servico: IdEdita},
            dataType: "json",
            success: function(dados){
               $("#editaTrabalho").val(dados.tipo_trabalho);
               $("#descedita").val(dados.descricao_trabalho);
                $("#imgedita").append(dados.img_categoria).val();
             
             //  console.log("Sucesso")
            }
           //
        }) 

  })
}) 

});
