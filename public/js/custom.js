if ($('#msg')){
    //show errors or success messages and then hide them after 3 seconds
    $('#msg').delay(3000).fadeOut('slow');
}

var id;
var body;
//get the modal body
var modalBody = $('.modal-body').find('#body');
//after clicking on edit button
$('.post').find('.edit').click(function (event){
    event.preventDefault();
    id = $(this).data('post-id');
    //get the post body from the dashboard
    body = event.target.parentNode.parentNode.childNodes[3];
    modalBody.val(body.textContent.trim());
    $('#modal').modal();
})

//after submiting the changes
$('.modal-footer').find('button').click(function (){
    //send an ajax reqeuest to the controller
    $.ajax({
        method: 'POST',
        url: '/editPost',
        data: {
            "_token": token,
            "body": $('.modal-body').find('#body').val(),
            "id" : id
        },
        //in case of success
        success: function(response){
                body.textContent = response['body'];
                $('#modal').modal('toggle');
        },
        //in case of failure
        error: function (res) {
            if (res.status == 422) {
                modalBody.addClass("is-invalid");
                modalBody.parent().append("<div class ='alert alert-danger'>"+ res['responseJSON']['body'] + "</div>");
                console.log(res['responseJSON']);
            }
        }
    });
});
//after closing the modal
$("#modal").on("hidden.bs.modal", function () {
    modalBody.removeClass('is-invalid');
    modalBody.parent().find('.alert').hide();
});