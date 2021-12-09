function guardar_profesor() {

    dni = $("#dni").val();
    nombre = $("#nombre").val();
    telefono = $("#telefono").val();
    asignatura = $("#asignatura").val();
    firma = $("#firma").val();

    var valores = {
        "dni": dni,
        "nombre": nombre,
        "telefono": telefono,
        "asignatura": asignatura,
        "firma": firma
    };



    $.ajax({

        url: "guardarProfesor.php",
        type: 'POST',
        dataType: "html",
        data: valores,

        beforeSend: function() {

        },
        success: function(data, textStatus, xhr) {
            // $("#tabla_profesores").append(data);

            html = '<tr id="' + data + '">';

            html = html + '<td>' + data + '</td><td>' + dni + '</td><td>' + '</td><td>' + nombre + '</td><td>' + '</td><td>' + telefono + '</td><td>' + asignatura + '</td><td>' + firma + '</td>';

            html = html + '<td><a href="index.php?operacion=editar&nume=' + data + '" class="btn btn-info" role="button">Modificar</a></td>';

            html = html + '<td><a href="index.php?operacion=borrar&nume=' + data + '" class="btn btn-danger" role="button">Eliminar</a></td>';

            html = html + '<td><a href="listarTest.php?idPaciente=' + data + '" class="btn btn-warning" role="button">Ver</a></td>';

            html = html + '</tr>';
            $("#tabla_profesores").append(html);

        },

        error: function(xhr, textStatus, errorThrown) {
            alert(xhr.responseText);
            alert(textStatus);
            alert(errorThrown);
            console.info(xhr.responseText);
        }

    });



    return false;

}


function modificar_profesor() {


    id = $("#id").val();
    dni = $("#dni").val();
    nombre = $("#nombre").val();
    telefono = $("#telefono").val();
    asignatura = $("#asignatura").val();
    firma = $("#firma").val();

    var valores = {
        "id": id,
        "dni": dni,
        "nombre": nombre,
        "telefono": telefono,
        "asignatura": asignatura,
        "firma": firma
    };



    $.ajax({

        url: "modificarProfesor.php",
        type: 'POST',
        dataType: "html",
        data: valores,

        beforeSend: function() {

        },
        success: function(data, textStatus, xhr) {

            fila = '#' + id;
            $(fila).append(data);

        },

        error: function(xhr, textStatus, errorThrown) {
            alert(xhr.responseText);
            alert(textStatus);
            alert(errorThrown);
            console.info(xhr.responseText);
        }

    });



    return false;

}