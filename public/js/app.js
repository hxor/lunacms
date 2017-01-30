$(document).ready(function () {
    /*sweetalert confirm*/
    $(document.body).on('click', '.js-submit-confirm', function (event) {
        event.preventDefault()
        var $form = $(this).closest('form')
        var $el = $(this)
        var text = $el.data('confirm-message') ? $el.data('confirm-message') : 'You will not be able to recover this imaginary file!'
        swal({
                title: 'Are You Sure?',
                text: text,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                closeOnConfirm: true
            },
            function () {
                $form.submit()
            })
    })

    // /*Selectize to select elemnt*/
    // $('.js-selectize').selectize({
    //     sortField: 'text'
    // });
})
