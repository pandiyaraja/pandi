<div class="col-md-12"></div>
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
$("#blog_add .form-control").blur(function () {
						com_fun.v($(this), "top: 8px;right: 8px;", false);
				});
			blog_display(5);
		});

function blog_display(end)
		{
             $.post('../data/data.php',{action:"display_blog",status:$("#choose").val(),end:end},function(r){
				var user='';
				var check='';
                var count=0;
				if(!r[0].bck_status){
				if(r.length > 0)
				{
		 
				
				for(var i=0;i<r.length;i++)
				{
				
				var params=r[i];
				
				var status=((params.status=='active')?'<a  style="cursor: pointer;" onclick="status(\'deactive\','+params.blog_id+')" > Deactive</a>':'<a  style="cursor: pointer;margin:-46px;" onclick="status(\'active\','+params.blog_id+')"> Active</a>');
				user+='<tr><td>'+(i+1)+'</td><td>'+params.blog_title+'</td><td>'+params.blog_des+'</td><td>'+params.ts+'</td><td>'+status+'<button class="pull-left btn btn-primary" onclick="edit_blog('+params.blog_id+')" style="margin-top:36px;">Edit </button> </td></tr>';
				count++;
				}
				
				
				if(count==end)
				{
				end=end+5;
				user+='<tr class="more_click"><td colspan="7" onclick="blog_display('+end+')"><center> More</center></td></tr>'
				
				}
				 
				 
				$("#in_blog").html(user);
				
				}
				
				}
				else
				{
				$("#in_blog").html('<tr><td colspan="7" ><center>Data  Not Found</center></td></tr>');
				
				}
				},'JSON');
			 
}

function status(status,id)
{
 
bootbox.confirm("Are you sure to "+status+" ?", function(result) {
	if(result==true){
				$.post("../data/data.php",{action:"blog_status",status:status,b_id:id},function(r){
					
					
						
					},'JSON')
		} 
		else {
		 
			}
      blog_display(10);
	
	});
}

	
function submit_blog()
{

$("#blog_add .form-control").each(function () {
						com_fun.v($(this), "top: 8px;right: 8px;", false);
				});
				var err = ($("#blog_add").find('.error_indicator[data-error="true"]').length == 0) ? "" : "a";
				 if (err == ""){
	bootbox.confirm("Are You Sure To Post ?",function(result){
			if(result==true){
       
			$("#blog_add").ajaxSubmit(function(r){

			});
}

});
}
}
	
	
	
	
	
	
 
	 
 
 

function add_blog()
{

var add='<div class="col-md-12">'+
						'<form id="blog_add" action="../data/data.php" method="post" enctype="multipart/form-data">'+
						'<div class="col-md-12">'+
						'<div class="col-md-3" style="font-size: 20px;color:orange"><b>Title</b></div>'+
						'<div class="col-md-9">'+
						'	<input class="form-control" data-valid="user_sell_title" type="text" id="title" name="b_title" placeholder="Type your Title"/>'+
						'	</div>'+
						'	</div>'+
						'	<div class="col-md-12">'+
						'	<div class="col-md-3" style="margin-top: 28px;font-size: 20px;color:orange"><b>Description</b></div>'+
						'	<div class="col-md-9">'+
						'	<textarea class="form-control" data-valid="v_set_des" name="b_des" id="txtarea" style="height:140px;margin-top: 28px;" placeholder="Description here"></textarea>'+
						'	</div>'+
						'	</div>'+
						'	<div class="col-md-12">'+
						'<div class="col-md-3" style="font-size: 20px;color:orange;margin-top: 28px;"><b>Image</b></div>'+
						'<div class="col-md-9" style="margin-top: 28px;">'+
							'<input class="form-control"  type="file" id="file_add" name="b_image"/>'+
							'</div>'+
						'</div>'+
							'<input class="btn btn-warning pull-right" value="POST" type="button" onclick="submit_blog()" id="postdes" style="margin-right: 30px;margin-top: 25px;margin-bottom: 20px;"/>'+
							'<input type="hidden" name="action" value="add_blog" />'+
						'</form>'+
						'</div>';
						$("#inner_blog").html(add);
$("#blog_clk").hide();
$("#data_hide").hide();
$("#show_blog").show();
}

function back_hide()
{
$("#data_hide").show();
$("#show_blog").hide();
$("#blog_clk").show();

						
}

function edit_blog(blog_id)
{


$.post('../data/data.php',{action:"display_one_blog",blog_id:blog_id},function(r){
 
				if(r.length > 0)
				{

var edit='<div class="col-md-12">'+
						'<form id="blog_edit" action="../data/data.php" method="post" enctype="multipart/form-data">'+
						'<div class="col-md-12">'+
						'<div class="col-md-3" style="font-size: 20px;color:orange"><b>Title</b></div>'+
						'<div class="col-md-9">'+
						'	<input class="form-control" type="text" id="title" name="blog_edit_title" value="'+r[0].blog_title+'" > </input>'+
						'	</div>'+
						'	</div>'+
						'	<div class="col-md-12">'+
						'	<div class="col-md-3" style="margin-top: 28px;font-size: 20px;color:orange"><b>Description</b></div>'+
						'	<div class="col-md-9">'+
						'	<textarea class="form-control"  name="blog_edit_des" id="txtarea" style="height:140px;margin-top: 28px;"  >'+r[0].blog_des+'</textarea>'+
						'	</div>'+
						'	</div>'+
						'	<div class="col-md-12" id="edit_comment"></div>'+
						
							'<input class="btn btn-warning pull-right" value="Save" type="button" onclick="edit_post_sub()"  style="margin-right: 30px;margin-top: 25px;margin-bottom: 20px;"/>'+
							'<input type="hidden" name="action" value="blog_update" />'+
							'<input type="hidden" name="b_id" value="'+blog_id+'" />'+
						'</form>'+
						'</div>';



			}


			$("#inner_blog").html(edit);
			blog_edit_comment(blog_id);
	},'JSON');

 
$("#blog_clk").hide();
$("#data_hide").hide();
$("#show_blog").show();

}

function edit_post_sub()
{

	$("#blog_edit").ajaxSubmit(function(r){
		bootbox.alert("Blog Successfully Updated...!");
	blog_display(10);
	});
	

	}


function blog_edit_comment(blog_id)
		{
		
		$.post('../data/data.php',{action:"display_single_blog",blog_id:blog_id},function(r){
		 	
		if (r.length > 0)
            {
		 
		for(i=0;i<r.length;i++)
							{
							add =' <div class="col-md-12" id="count" style="margin-top: 15px;padding: 8px;padding-bottom: 2px;"></div>'+
							
							' <div class="col-md-12" style="margin-top: 15px;padding: 8px;padding-bottom: 2px;">'+
							'<div class="col-md-10"></div><div class="col-md-2 "><a onclick="del_comment('+blog_id+','+r[i].blog_com+')" class="pull right"><i class="fa fa-times"></i> &nbsp;Remove</a></div>'+
								'<span class="col-md-6" style="background: rgb(209, 219, 221);">Name:&nbsp;<b>'+r[i].name+'</b></span>'+
								'<span class="col-md-6" style="background: rgb(210, 202, 215);">Email:&nbsp;<b>'+r[i].email+'</b></span>'+
							  
							  '<label name="blog_message" id="blog_message"   class="form-control col-md-12" rows="2"  ><b>'+r[i].comment+'</b></label>'+
							  '<span class="col-md-12" style="background: rgb(210, 202, 215);">Date & time:&nbsp;<b>'+r[i].bc_ts+'</b></span>'+
							'</div>'+
						'</div>';
							
							$("#edit_comment").append(add);
							
							 $('#count').html(''+r.length+': Comments');
							
							}
			}	
else
{
add =' <div class="col-md-12" id="count" style="margin-top: 15px;padding: 8px;padding-bottom: 2px;">no comments</div>';
$("#edit_comment").html(add);

}			
		},'JSON');
		
		}

function del_comment(blog_id,com_id)
{
$.post("../data/data.php",{action:"del_comment",blog_id:blog_id,blog_com:com_id},function(r){



});

edit_blog(9);
}
		
		
		
		
</script>
<div class="col-md-12" id="blog_clk" style=" ">

<button class="pull-right btn btn-primary" onclick="add_blog()"  style="margin-right: 60px;" >Add Blog</button></div>
  <div id="contact-page"  class="container" style=" ">
      <div class="bg">
	   
        <div class="col-md-12" id="data_hide" style="margin-bottom: 30px;margin-top: 20px;">
          <div class="row" style="background-image: url('../Upload/image/floor.jpg');">
            <h2 class="title text" style="background: #FE980F;border-radius: 5px;padding: 5px;color: #FFFFFF;height: 30px;margin-bottom:0;"><span style="text-transform: none;">Blog List</span>
          
                <div class="col-md-2" style="float:right;">
                  <select  id="choose" onchange="blog_display(5)" style="background: rgb(253, 247, 242);margin-top: -4px;height: 28px;font-size: 16px;">
                    <option value="active" >Activated</option>
                    <option value="deactive" >De-Activated</option>
                  </select>
               
              </div>
            </h2>
            <div id="blog_display">
			
			<table class="table table-striped"><tr> <th>Sl No.</th><th>Title</th><th>Description</th><th>Date of Post</th><th>Action</th></tr>
					<tbody id="in_blog"></tbody>
					</table>
			
			</div>
          </div>
        </div>
      </div>
	  
	  <div id="show_blog" style="display:none;">
			
    	<div class="bg" style="margin-top: 50px;">
	        	<h2 class="title text" style="background: #FE980F;border-radius: 5px;padding: 5px;color: #FFFFFF;height: 30px;margin:0px;"><span style="text-transform: none;">Blog Post</span></h2>
    		<div class="row" style="background: #f9f9f9;border: 1px solid rgb(237, 233, 228);margin-bottom: 35px;padding-top: 30px;margin-left: 0px;">  	
	    		 <div class="col-md-12">
				 
					<div class="col-md-2" style="margin-top: -8px;margin-left: 24px;">
						<button class=" pull-left btn btn-success pull-right"  onclick="back_hide()"><i class="fa fa-reply"></i> Back </button>
					</div>
					<div class="col-md-8" id="inner_blog" style="margin-top:35px;">
						
					</div>
					<div class="col-md-2"></div>
					
				</div>
	    	</div>  
    		
    </div>
	  </div>
    </div>
	
	
	
	
	
	
