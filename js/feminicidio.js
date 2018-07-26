$(document).ready(function() {
    $('body').on('click', '#Actualizar', function(){
        id = $(this).parents("tr").find('td:eq(0) input').val();
        fecha= $(this).parents("tr").find('td:eq(1) #fecha').val();
        hora = $(this).parents("tr").find('td:eq(2) #hora').val();
        detalle = $(this).parents("tr").find('td:eq(3) input').val();
        tipoAsesinato = $(this).parents("tr").find('td:eq(4) select').val();
        
        $.ajax({
            url: 'http://127.0.0.1/feminicidios/control/actualizarFeminicidio.php',
            type: 'POST', // para obtener un valor del php que se desea 
            data:{id,fecha,hora,detalle,tipoAsesinato},
            success: function(){//es la variable que retorna el archivo php al que se llame.
              swal("Feminicidio actualizado", "", "success");
              
            },
            error: function(xhr, status){     
              swal("Error en la actualizacion", "", "warning");

            }
        });
    });

    $('body').on('click', '#guardarFeminicidio', function(){
        idfeminicidio=$("#idfeminicidio").val();
        fecha=$("#fecha").val();
        hora=$("#hora").val();
        detalle=$("#detalle").val();
        tipoAsesinato=$("#tipoAsesinato").val();
        iddirecccion=$("#iddirecccion").val();
        descripcion=$("#descripcion").val();
        idmunicipio=$("#idmunicipio").val();
        idvictima=$("#idvictima").val();
        idagresor=$("#idagresor").val();
        idvinculo=$("#idvinculo").val();
        tiempoRelacion=$("#tiempoRelacion").val();


        $.ajax({
            url: 'http://127.0.0.1/feminicidios/control/agregarFeminicidio.php',
            type: 'POST', // para obtener un valor del php que se desea 
            data:{idfeminicidio,fecha,hora,detalle,tipoAsesinato,iddirecccion,descripcion
                ,idmunicipio,idvictima,idagresor,idvinculo,tiempoRelacion},
            success: function(){//es la variable que retorna el archivo php al que se llame.
              swal("Feminicidio registrado", "", "success");
              
            },
            error: function(xhr, status){     
              swal("Error en la agregacion", "", "warning");

            }
        });
    });

    $('body').on('click', '#Borrar', function(){
        idfeminicidio = $(this).parents("tr").find('td:eq(0) input').val();
        iddirecccion = $(this).parents("tr").find('td:eq(0) #iddireccion').val();
        lazovictima = $(this).parents("tr").find('td:eq(0) #lazovictima').val();
        $.ajax({
            url: 'http://127.0.0.1/feminicidios/control/eliminarFeminicidio.php',
            type: 'POST', // para obtener un valor del php que se desea 
            data:{idfeminicidio,iddirecccion,lazovictima},
            success: function($idfeminicidio,$iddirecccion,$lazovictima){//es la variable que retorna el archivo php al que se llame.
              swal("Feminicidio eliminado", "", "success");
              alert($idfeminicidio,$iddirecccion,$lazovictima);
            },
            error: function(xhr, status){     
              swal("Error en la eliminacion", "", "warning");

            }
        });
    });
});