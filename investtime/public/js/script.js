$(function(){
  $("#activitiesrows").on("click","a",function(e){ 
    var id = parseInt(e.target.id.replace("editbtn",""));
    $.get(`activity/${id}`,function(data){
        $("#activityid").val(data[0].id);
        $("#activityname").val(data[0].activityname);
        $("#timespent").val(data[0].timespent);
    });
  });
});