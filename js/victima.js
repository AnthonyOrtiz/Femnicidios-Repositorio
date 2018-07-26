$(document).ready(function() {
    $('body').on('click', '#Actualizar', function(){
        id = $(this).parents("tr").find('td:eq(0) input').val();
        nombres= $(this).parents("tr").find('td:eq(1) input').val();
        apellidos = $(this).parents("tr").find('td:eq(2) input').val();
        edad = $(this).parents("tr").find('td:eq(3) input').val();
        ocupacion = $(this).parents("tr").find('td:eq(4) input').val();
        nacionalidad = $(this).parents("tr").find('td:eq(5) select').val();
        
        $.ajax({
            url: 'http://127.0.0.1/feminicidios/control/actualizarVictima.php',
            type: 'POST', // para obtener un valor del php que se desea 
            data:{id,nombres,apellidos,edad,ocupacion,nacionalidad},
            success: function(){//es la variable que retorna el archivo php al que se llame.
              swal("Victima actualizada", "", "success");
              //alert($id,$nombres);
            },
            error: function(xhr, status){     
              swal("Error en la actualizacion", "", "warning");

            }
        });
    });

    $('body').on('click', '#guardarVictima', function(){
        id=$("#id").val();
        nombres=$("#nombres").val();
        apellidos=$("#apellidos").val();
        edad=$("#edad").val();
        ocupacion=$("#ocupacion").val();
        nacionalidad=$("#nacionalidad").val();

        $.ajax({
            url: 'http://127.0.0.1/feminicidios/control/agregarVictima.php',
            type: 'POST', // para obtener un valor del php que se desea 
            data:{id,nombres,apellidos,edad,ocupacion,nacionalidad},
            success: function($nacionalidad){//es la variable que retorna el archivo php al que se llame.
              
              alert($nacionalidad);
            },
            error: function(xhr, status){     
              swal("Error en la agregacion", "", "warning");

            }
        });
    });

    $('body').on('click', '#Borrar', function(){
        id = $(this).parents("tr").find('td:eq(0) input').val();
        $.ajax({
            url: 'http://127.0.0.1/feminicidios/control/eliminarVictima.php',
            type: 'POST', // para obtener un valor del php que se desea 
            data:{id},
            success: function(){//es la variable que retorna el archivo php al que se llame.
              swal("Victima eliminada", "", "success");
              //alert($id,$nombres);
            },
            error: function(xhr, status){     
              swal("Error en la eliminacion", "", "warning");

            }
        });
    });

});