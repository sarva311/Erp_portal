$(function(e)
{
    $(document).on("click","#btnLogout",function(ee)
    {
         $.ajax(
            {
                url:"ajaxhandler/logoutAjax.php",
                type:"POST",
                dataType:"json",
                data:{id:1},
                beforeSend:function(e){

                },
                success:function(e){
                    document.location.replace("login.php");
                },
                error:function(e){
                    alert("Something went wrong!");
                }
            }
         );
    });
})