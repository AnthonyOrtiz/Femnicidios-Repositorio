$(document).ready(function() {
    $('body').on('click', '#Actualizar', function(){
        id = $(this).parents("tr").find('td:eq(0) input').val();
        nombres= $(this).parents("tr").find('td:eq(1) input').val();
        apellidos = $(this).parents("tr").find('td:eq(2) input').val();
        edad = $(this).parents("tr").find('td:eq(3) input').val();
        ocupacion = $(this).parents("tr").find('td:eq(4) input').val();
        atencedentes = $(this).parents("tr").find('td:eq(5) input').val();
        estadoAgresor = $(this).parents("tr").find('td:eq(6) input').val();
        nacionalidad = $(this).parents("tr").find('td:eq(7) select').val();
        
        $.ajax({
            url: 'http://127.0.0.1/feminicidios/control/actualizarAgresor.php',
            type: 'POST', // para obtener un valor del php que se desea 
            data:{id,nombres,apellidos,edad,ocupacion,atencedentes,estadoAgresor,nacionalidad},
            success: function(){//es la variable que retorna el archivo php al que se llame.
              swal("Agresor actualizada", "", "success");
              
            },
            error: function(xhr, status){     
              swal("Error en la actualizacion", "", "warning");

            }
        });
    });

    $('body').on('click', '#guardarAgresor', function(){
        id=$("#id").val();
        nombres=$("#nombres").val();
        apellidos=$("#apellidos").val();
        edad=$("#edad").val();
        ocupacion=$("#ocupacion").val();
        atecedentes=$("#atecedentes").val();
        nacionalidad=$("#nacionalidad").val();
        idestado=$("#idestado").val();
        concepto=$("#concepto").val();
        descripcion=$("#descripcion").val();

        $.ajax({
            url: 'http://127.0.0.1/feminicidios/control/agregarAgresor.php',
            type: 'POST', // para obtener un valor del php que se desea 
            data:{id,nombres,apellidos,edad,ocupacion,atecedentes,nacionalidad,idestado,concepto,descripcion},
            success: function($idestado,$nacionalidad){//es la variable que retorna el archivo php al que se llame.
              swal("Agresor registrado", "", "success");
            },
            error: function(xhr, status){     
              swal("Error en la agregacion", "", "warning");

            }
        });
    });

    $('body').on('click', '#Borrar', function(){
        id = $(this).parents("tr").find('td:eq(0) input').val();
        idestado = $(this).parents("tr").find('td:eq(6) #idestado').val();
        $.ajax({
            url: 'http://127.0.0.1/feminicidios/control/eleminarAgresor.php',
            type: 'POST', // para obtener un valor del php que se desea 
            data:{id,idestado},
            success: function(){//es la variable que retorna el archivo php al que se llame.
              swal("Agresor eliminada", "", "success");
             
            },
            error: function(xhr, status){     
              swal("Error en la eliminacion", "", "warning");

            }
        });
    });

});