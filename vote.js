function vote()
{
  id = $('input[name=vote]:checked').val();

  if(id)
  {
    $.ajax({
      url: 'vote.php',
      type: 'POST',
      data: {
        id: id
      },
      success: function(data)
      {
        $("#vote").hide();
        $("#anketaFeedback").html("<i class='fa fa-spin fa-cog'><i>");
        setInterval(function () {

        $("#anketaFeedback").html(data);
      }, 400);
      },
      error: function(xhr)
      {
        $("#anketaFeedback").html(xhr.responseText);
      }
    });


  }
  else {
    $("#anketaFeedback").html("<p class='text-danger'>You must choose an option. </p>");
  }

}
