<div class="col-md-12">
<?php
include('header_admin.php');
?>
<style>
.modal-footer .btn+.btn{
margin-bottom:14px;
}


</style>
	<script>

$(function(){
			user_display(10);
		});

function user_display(end)
		{
				$(".more_click").remove();
				var user='';
				var check='';
                var count=0;
             $.post('../data/data.php',{action:"register_user",visible:$("#choose").val(),end:end},function(r){
			
						if(!r[0].bck_status){		
				if(r.length > 0)
				{
				
				for(var i=0;i<r.length;i++)
				{
				var params=r[i];
				var status=((params.visible=='true')?'<a  style="cursor: pointer;"  onclick="status(\'false\','+params.loginId+')"> Deactive</a>':'<a  style="cursor: pointer;"  onclick="status(\'true\','+params.loginId+')"> Active</a>');
				user+='<tr><td>'+(i+1)+'</td><td>'+params.userName+'</td><td>'+params.mobile+'</td><td>'+params.emailId+'</td><td>'+params.address+'</td><td>'+status+'</td></tr>';
				count++;
				}
				if(count==end)
				{
				end=end+10;
				user+='<tr  class="more_click"><td colspan="8"><div onclick="user_display('+end+')"><center> more</center></div></td></tr>'
				
				}
				$("#user_dis").html(user);
			
				}
				}
			else
			{
				$("#user_dis").html('<tr><td colspan="8"><center>Data Not Found</center></td></tr>');
				}
			
			},'JSON');
}

function status(visible,id)
{
	var state;
	if(visible=="true")
	{
		state="active";
	}
	else{
	  state="deactive";
	}
	
	/*var r = confirm("Are you sure you want to "+state+" ?");
    if (r == true) {*/
	
	bootbox.confirm("Are you sure to "+state+" ?", function(result) {
	if(result==true)
	{
	$.post("../data/data.php",{action:"user_status",visible:visible,id:id},function(r){

	
		},'JSON');
			
} else{
	
}
user_display(10);	
		}); 
	}



</script>



<div id="contact-page" class="container" style=" ">
  <div class="bg">
    <div class="col-md-12" style="margin-bottom: 30px;margin-top: 30px;">
      <div class="row" style="background-image: url('../Upload/image/floor.jpg');">
	  
        <h2 class="title text" style="background: #FE980F;border-radius: 5px;padding: 5px;color: #FFFFFF;height: 30px;margin-bottom:0;"><span style="text-transform: none;">Register Users</span>
		  
            <div class="col-md-2" style="float:right;">
              <select onchange="user_display(10)" id="choose" style="background: rgb(253, 247, 242);margin-top: -4px;height: 28px;font-size: 16px;">
                <option value="true" >Activated</option>
                <option value="false" >De-Activated</option>
              </select>
  
          </div>
        </h2>
        <div id="user_display">
		<table class="table table-striped"><tr> <th>Sl No.</th><th>User Name</th><th>Mobile No.</th><th>Email Address</th><th>Address</th><th>Action</th></tr>
		<tbody id="user_dis"></tbody>
		</table>
		</div>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>
