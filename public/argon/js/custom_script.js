$(window).on('load', function () {
    console.clear()
})


$(document).ready(function () {
    $(document).on('click', '[data-toggle="modal"]', function (e) {

        var target_modal_element = $(e.currentTarget).data('content');
        var target_modal = $(e.currentTarget).attr('href');
        var modal = $(target_modal);
        var modalBody = $(target_modal + ' .modal-content');


        modalBody.load(target_modal_element);

    });


})
