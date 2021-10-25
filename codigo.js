$(document).ready(function () {
tabla();

      
  });

$(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

});

function registro(){
    let nueva = $("#idInput").val();
    datos = "name="+nueva; 
    console.log(nueva);
    $.ajax({
    type:"POST",
    url:"ejemplos.php",
    data:datos,
    success:function(respuesta){$("#idInput").val("");tabla()},
    error:function(error){console.log("Error pibe")},
    complete:function(otroError){$("#idInput").val("")},
    });


};
function tabla(){
$.ajax({
type:"GET",
url:"andres.php",
dataType:"JSON",
success:function(noError){
$categorias=noError;
$categorias.forEach(categoria => {
    $("#tabla").append("<tr>");
    $("#tabla").append("<td>"+categoria.id+"</td>");
    $("#tabla").append("<td>"+categoria.nombre+"</td>");
    $("#tabla").append(  '<td ><button id="eliminar">Eliminar</button><button  id="editar">Editar</button></td> ');
});
console.log($categorias)
},
})
}
