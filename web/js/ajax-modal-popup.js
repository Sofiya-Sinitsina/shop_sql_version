$(function(){

    $(document).on('click', '.showModalButton', function(){
            $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
            document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
    });
});


$(function(){
//load the current page with the conten indicated by 'value' attribute for a given button.
    $(document).on('click', '.loadMainContent', function(){
        $('#main-content').load($(this).attr('value'));
    });
});

// $('.btn-danger').on('click', function() {
//     $('#modal').modal('hide');
// });