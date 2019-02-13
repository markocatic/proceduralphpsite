function contact()
{
    var name = $('#contactName').val();
    var subject = $('#contactSubject').val();
    var email = $('#contactEmail').val();
    var message = $('#contactMessage').val();
    var errors = [];
    var reName = /^[A-z]{3,20}$/;

    if(!reName.test(name))
    {
        errors.push("<p class='text-danger'>Invalid name format!</p>");
    }

    if(message=="")
    {
        errors.push("<p class='text-danger'>Message box should not be empty!</p>");
    }
    if(errors.length>0)
    {
        $("#feedback").html(errors);
    }
    else
    {
        $.ajax({
            url: 'http://gamesfunny.byethost16.com/kontakt.php',
            type: 'POST',
            data:
                {
                    email: email,
                    subject: subject,
                    message: message,
                    name : name
                },
            success: function(data)
            {
                $("#feedback").html("<i style='position:relative;top:100%; left:50%;' class='fa fa-spin fa-5x fa-spinner'></i>");
                setTimeout(function () {
                    $("#feedback").html(data);
                }, 300);
            },
            error: function(xhr,request,error,status)
            {
                alert(xhr.responseText);
            }
        });
    }
}