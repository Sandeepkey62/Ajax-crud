function fetch(){
     var outputdata="";
    $.ajax({
       type:"GET",
       url:'src/fetch.php',
       success:function(data){
        var fetchData=JSON.parse(data);
        for(i=0;i<fetchData.length;i++)
        {
          outputdata+="<tr id='deletes"+fetchData[i].id+"'><td>"
          +fetchData[i].id+"</td><td>"
          +fetchData[i].name+"</td><td>"
          +fetchData[i].address+"</td><td>"
          +fetchData[i].email+"</td><td>"
          +"<button type='button' class='btn'onclick='update("+fetchData[i].id+")'>Edit</button>"
          +"</td><td><button type='button'  class='btn' onclick='deles("+fetchData[i].id+")'>Delete</button></td></tr>";
        }
  $("#tbodyData").html(outputdata);
       }
    })
}
function updates_form(FormId){
  event.preventDefault();
    $.ajax({
       type:"POST",
       url:'src/update_form.php',
       data:$("#FormId").serialize(),
       success:function(data){
         fetch();
        var error_split=data.split(',');
      if(error_split[0]=='update')
        {
          $("#san").css({'color':'green','font-size':'30px',"text-transform":"uppercase"}).html(error_split[1]);
         }
         $("#error_msg").hide('slow');
       }
    })
}
 function update(deleid){
  $.ajax({
     type:"POST",
     url:'src/update.php',
     data:{id:deleid},
     success:function(data){
       $("#FormId").html(data);
     }
  })
 }
function deles(deleid){
    $.ajax({
       type:"POST",
       url:'src/delete.php',
       data:{dele:deleid},
       success:function(data){
        $('#deletes'+deleid).hide('slow');
           var delete_data=data.split(",");
           if(delete_data[0]=='Delete')
           {
          $("#error_msg").css({'color':'green','font-size':'30px'}).html(delete_data[1]);
           }
            $("#san").hide('slow');
       }
    })
}
function OnlineSubmit(FormId,Mode){
     event.preventDefault();
        $.ajax({
            method:"POST",
            url:'src/insert.php',
             data:$("#"+FormId).serialize()+"&mode="+Mode,
            success:function(data){
              console.log("dat");
              fetch();
               $("#FormId")[0].reset();
               var error_split=data.split(',');
      if(error_split[0]==='success')
        {
          $("#error_msg").css({'color':'green','font-size':'30px'}).html(error_split[1]);
         }
    if(error_split[0]=='Not') {
        $("#error_msg").css('color','red').html(error_split[1]);
                     }
     if(error_split[0]=='name') {
    $("#error_msg").css('color','red').html(error_split[1]);
                     }
    if(error_split[0]=='email') {
   $("#error_msg").css('color','red').html(error_split[1]);
              }
           }
        })
      }

  
