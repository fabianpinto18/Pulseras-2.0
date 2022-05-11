$(document).ready(function () {
// tabla();
$("#actualizar").hide();
      
  });

$(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

});
function actualizar(categoriaId){
  // $("#registrar").hide();
  // $("#actualizar").show();

  let nueva = categoriaId;
    datos = "id="+nueva; 
    
    datos2 = {
        "id": categoriaId,
    }
$.ajax({
    type:"GET",
    dataType:"JSON",
    data: datos,
    url:"andres.php",
    success:function(respuesta){
        let id=categoriaId-1;
        // $("#idInput")
       
        $("#id").val(respuesta[id].id)
        $("#nombre").val(respuesta[id].nombre)
        $("#precio").val(respuesta[id].id)
        $("#imagen").val(respuesta[id].nombre)
       $("#registrar").hide();
       $("#actualizar").show();
        
    },
    error:function(error){
        console.log("error");
    }

})
}
// function registro(){
//     let nombre = $("#nombre").val();
//     let precio = $("#precio").val();
//     let imagen = $("#imagen").val();
//     let categoria = $("#categoria").val();
//     // datos = "nombre="+nombre+"precio="+precio+"&imagen="+imagen+"&categoria="+categoria; 
//     datos={
//         "nombre" : nombre,
//         "precio" : precio,
//         "imagen" : imagen,
//         "categoria" : categoria,
//     }
//     // datos = "nombre="+nombre; 
//     console.log(datos);
//     $.ajax({
//     type:"POST",
//     url:"ejemplos.php",
//     data:datos,
//     success:function(respuesta){
//         // $("#nombre").val("");tabla()
//         console.log("exito");
//     },
//     error:function(error){console.log("Error pibe")},
//     complete:function(otroError){$("#nombre").val("")},
//     });


// };

// function pasarDatos(categoriaId){
//     let nueva = categoriaId;
//     datos = "id="+nueva; 
    
//     datos2 = {
//         "id": categoriaId,
//     }
// $.ajax({
//     type:"GET",
//     dataType:"JSON",
//     data: datos2,
//     url:"andres.php",
//     success:function(respuesta){
//         let id=categoriaId-1;
//         // $("#idInput")
       
//         $("#id").val(respuesta[id].id)
//         $("#nombre").val(respuesta[id].nombre)
//        $("#registrar").hide();
//        $("#actualizar").show();
        
//     },
//     error:function(error){
//         console.log("error");
//     }

// })

// }
// function actual(){
//     let nueva = $("#id").val();
//     let nuevo = $("#nombre").val();
//     datos = "nombre="+nuevo+"&id="+nueva; 
    
//     $.ajax({
//     type:"POST",
//     url:"andres.php",
//     data:datos,
//     success:function(respuesta){
//     $("#nombre").val("");
//     $("#tabla").empty();
//     tabla();
//     console.log(respuesta)
//     },
//     error:function(error){console.log("Error pibe")},
//     complete:function(otroError){$("#nombre").val("");
//     $("#id").val("");
//     $("#registrar").show();
//     $("#actualizar").hide();

//     },
//     });


// }
