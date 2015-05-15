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
	$("#myprofile_edit .form-control").blur(function () {
						com_fun.v($(this), "top: 8px;right: 8px;", false);
				});
		
		user_info();
	$(".verify").blur(function(){
        var uname= $("#user_name").val();
		var mobile_num= $("#mobile").val();
		var eid= $("#email_id").val();
		var mess= $("#address").val();
		$("#name").text(uname);
		$("#number").text(mobile_num);
		$("#email").text(eid);
		$("#add").text(mess);
    });
	});
	
	function user_info()
	{
		$.post("../data/data.php",{action:'user_info'},function(r){
			if(r.length>0)
			{
				$("#name").html(r[0].userName);
				$("#add").html(r[0].address);
				$("#number").html(r[0].mobile);
				$("#email").html(r[0].emailId);
				
				$("#user_name").val(r[0].userName);
				$("#address").val(r[0].address);
				$("#mobile").val(r[0].mobile);
				$("#email_id").val(r[0].emailId);
				
			}
			
			},'JSON');
		
		}
		
		
function admin_submit()
{
$("#myprofile_edit .form-control").each(function () {
						com_fun.v($(this), "top: 8px;right: 8px;", false);
				});
				var err = ($("#myprofile_edit").find('.error_indicator[data-error="true"]').length == 0) ? "" : "a";
				if (err == ""){
			
$("#myprofile_edit").ajaxSubmit(function(r){
	bootbox.alert("Your Profile Successfully Updated..!");
});

}
}
	
	
	
</script>

	 <!--/#contact-page-->
	 <div id="contact-page" class="container" style=" ">
    	<div class="bg" style="margin-top: 30px;">
	        	<h2 class="title text" style="background: #FE980F;border-radius: 5px;padding: 5px;color: #FFFFFF;height: 30px;margin:0px;"><span style="text-transform: none;">Profile Info</span></h2>
    		<div class="row" style="background: #f9f9f9;border: 1px solid rgb(237, 233, 228);margin-bottom: 35px;padding-top: 30px;margin-left: 0px;">  	
	    		 <div class="col-sm-12">
                <div class="col-sm-1"></div>	
                <div class="col-sm-5"  style="margin-bottom: 20px;">
	    			<div class="contact-info" >
	    				<h2 class="title text-center" style="padding: 4px 0 12px 20px;color: #474646;border-bottom: 1px solid gray;">My Profile</h2>

	    		<form id="myprofile" class="myprofile-form row" name="myprofile-form" method="post" style="padding: 0px 13px;" >

                          <div class="col-sm-12">
						  <div class="col-sm-12">
	    			 <div class="col-sm-6">
                         <h3 class="myproile_title" >User Name :</h3>

	    			 </div>
                         <div class="col-sm-6">
                        <h3 class="myproile_content login_id" id="name"></h3>

                     </div>
					 </div>
					 <div class="col-sm-12">
                    <div class="col-sm-6">
                         <h3 class="myproile_title" >Mobile Number :</h3>

	    			 </div>
                         <div class="col-sm-6">
                        <h3 class="myproile_content mobile_number" id="number"></h3>

                     </div>
					 </div>
					 <div class="col-sm-12">
                    <div class="col-sm-6">
                         <h3 class="myproile_title" >Email id :</h3>

	    			 </div>
                         <div class="col-sm-6">
                        <h3 class="myproile_content email_id" id="email" ></h3>

                     </div>
					 </div>
					 <div class="col-sm-12">
                    <div class="col-sm-6">
                         <h3 class="myproile_title" >Address :</h3>

	    			 </div>
                         <div class="col-sm-6">
                        <h3 class="myproile_content address" id="add" style="margin-top: 20px;"></h3>

                     </div>
					 </div>
                              </div>
                             
	    		 </form>
	    			</div>
    			</div>  
                <div class="col-sm-5" style="margin-bottom: 20px;">
	    			<div class="contact-form">
	    				<h2 class="title text-center" style="padding: 4px 0 12px 20px;color: #474646;border-bottom: 1px solid gray;">Edit Your Profile</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="myprofile_edit" action="../data/data.php" method="post" style="padding: 10px 24px;">
							<input type="text" name="name" id="user_name" data-valid="mand_f_name" placeholder="Name" class="form-control login_id verify" />
                            <input type="text" name="mobile" id="mobile" data-valid="mand_phno" maxlength="10" placeholder="Mobile number" class="form-control mobile_number verify" />
							<input type="text" name="email" id="email_id" data-valid="mand_email" placeholder="Email Address" class="form-control email_id verify" />
                            <textarea name="Address" name="address" id="address" data-valid="v_set_des" class="form-control address verify" rows="3" placeholder="Your Address Here"></textarea>
							 
                            <input type="button" class="btn btn-primary pull-right" value="Save" onclick="admin_submit()"/>
                            <input type="hidden" name="action" value="user_edit" />
						</form>
	    			</div>
	    		</div>
                <div class="col-sm-1"></div>
	    	  	</div>		 
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->

<!--/#footer-bottom-->
<!--/#footer-bottom-->



    </body>
</html>

	
	
