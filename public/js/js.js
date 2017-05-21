$("#contact_submit").click(function(){

  var mail = $("#mail").val();
  var name = $("#name").val();
  var adress = $("#adress").val();
  var city = $("#city").val();
  var cp = $("#cp").val();
  var country = $("country").val();
  var message = $("#message").val();
  $.get({
    data:{mail:mail,name:name,adress:adress,city:city,cp:cp,country:country,message:message},
    url:"contact_exec.php",
    dataType:"html",
    success:function(reponse){
      $(".result-form").html(reponse);
    }
  });
});
