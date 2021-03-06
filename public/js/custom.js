if ($('#msg')){
    //show errors or success messages and then hide them after 3 seconds
    $('#msg').delay(3000).fadeOut('slow');
}

var id;
var body;
//Editing Post
//
//get the modal body
var modalBody = $('.modal-body').find('#body');
//after clicking on edit button
$('.post').find('.edit').click(function (event){
    event.preventDefault();
    id = $(this).data('post-id');
    //get the post body from the dashboard
    body = event.target.parentNode.parentNode.parentNode.childNodes[3];
    console.log(event.target.parentNode.parentNode.parentNode.childNodes[3]);
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
            body.textContent = $('.modal-body').find('#body').val();
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


//Deleting Post

$('body').find('.delete').on('click', function (e) {
    e.preventDefault();
    if (confirm('Are you sure you want to Delete Post ?')) {
        id = $(this).data('post-id');
        $.ajax({
            method: "POST",
            url: "/deletePost",
            data: {
                "_token": token,
                "id" : id
            },
            success: function(response){
                // alert(response['msg']);
                location.reload();
            },
            error: function (response) {
                if(response.status == 424){
                    alert(response['error']);
                }
            }

        });
    } else {
        return false;
    }
});

//liking and disliking functionality
$('.buttons').click(function(e){
    var isLike = e.target.parentElement.classList.contains('liked') || e.target.classList.contains('liked');
    if (isLike){
        $(this).toggleClass('is-active-liked');
        $(e.target.parentElement.nextElementSibling).removeClass('is-active-disliked');
    }else{
        $(this).toggleClass('is-active-disliked');
        $(e.target.parentElement.previousElementSibling).removeClass('is-active-liked');
    }
    id = $(this).data('post-id');
    e.preventDefault();
    $.ajax({
        method : 'POST',
        url : '/likePost',
        data: {
            "_token": token,
            "post_id" : id,
            "isLike" : isLike
        }
    })
        .done(function(){

        });
});


