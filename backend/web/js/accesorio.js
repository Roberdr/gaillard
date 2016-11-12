/**
 * Created by rober on 22/10/16.
 */
$(function () {
    var nombre_ficha;
    $('#btn-nuevo').click(function (e){
        if ($('#modal-tipo_grupo').data('bs.modal').isShown) {
            $('#modal-tipo_grupo').find('#modalContent')
                .load($(this).attr('href'));
            //dynamiclly set the header for the modal
            //document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('header') + '</h4>';
        } else {
            e.preventDefault();
            //if modal isn't open; open it and load content
            $('#modal-tipo_grupo').modal('show')
                .find('#modalContent')
                .load($(this).attr('href'));
            //dynamiclly set the header for the modal
            //document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('header') + '</h4>';
        }
    });
    $('[data-toggle="tab"]').click(function (e) {
        window.localStorage.setItem('oldTab', e.target.hash);
    });
    $('body').ready(function() {
        if (window.localStorage.getItem('oldTab')) {
            $('[data-toggle="tab"], [data-toggle="pill"]').filter('[href="' + window.localStorage.getItem('oldTab') + '"]').tab('show');
        }
    });
});