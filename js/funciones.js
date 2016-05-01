jQuery(function() {
    $('.userToEdit').click(function(event) {
        event.preventDefault();
        var id = $(this).data('id');
        $('.userEdit-' + id).toggleClass('hide');
    });
});