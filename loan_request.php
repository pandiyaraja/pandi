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
			display_loan(10);
					});
		
		function display_loan(end)
		{
		$(".more_click").remove();
				var query='';
				  var count=0;
			$.post('../data/data.php',{action:"get_home_load",status:$("#choose").val(),end:end},function(r){
		 if(!r[0].bck_status){
				if(r.length > 0)
				{					
				for(var i=0;i<r.length;i++)
				{
				var params=r[i];
				query+='<tr><td>'+(i+1)+'</td><td>'+params.name+'</td><td>'+params.mobile+'</td><td>'+params.email_id+'</td><td>'+params.p_type+'</td><td>'+params.p_area+'</td><td>'+params.ts+'</td><td><a   style="cursor: pointer;" onclick="popup('+params.loan_id+',1)"> View</a></td></tr>';
				count++;
				}
				if(count==end)
				{
				end=end+10;
				query+='<tr  class="more_click"><td colspan="8" onclick="display_loan('+end+')"><center> More </center></td></tr>'
				
				}
				
				 
				$("#c_req").html(query);
	 
				}
				}
			else
			{
				$("#c_req").html('<tr><td colspan="8" ><center>Data Not Found</center></td></tr>');
				}
			
			},'JSON');
	
			
			
			}
		
		
		
		
		
		
		function popup(qid,end)
		{
			var create='';
		 
		$.post('../data/data.php',{action:"get_home_load",status:$("#choose").val(),req_id:qid,end:end},function(r){
	 
              create = '<div >'+
			   '<div class="row">'+
			   '<div class="col-md-12">'+
			   '<div class="col-md-12">'+
			
			   '<div class="col-md-11" style="background: #f9f9f9;border: 1px solid rgb(237, 233, 228);margin-left: 53px;">'+
'<h2 class="title text" style="background: #FE980F;border-radius: 5px;margin-bottom: 10px;padding: 5px;color: #FFFFFF;height: 30px;margin: 0px;"><span style="text-transform: none;">User Loan Details</span></h2> '+  
	 
	 '<div class="col-md-12">'+

			'<div class="col-md-12" style="margin-top: 20px;">'+
				'<button class="btn btn-success" style="margin-right: 13px;margin-bottom: 15px;" onclick="back_user()"><i class="fa fa-reply"></i> back </button>'+
				''+((r[0].status=="active")?('<button onclick="change_status(\'deactive\','+r[0].loan_id+')" class="btn btn-warning pull-right">De-active</button>'):('<button onclick="change_status(\'active\','+r[0].loan_id+')" class="btn btn-warning pull-right">Active</button>'))+''+
			'</div>'+
		
		'</div>	'+
	 
	 
	 '<div class="col-md-12" style="margin-bottom:30px;">'+
	'<div class="col-md-12" style="margin-bottom: 20px;">'+
	
		'<div class="col-md-4">'+
		'User Name <br><b>'+r[0].name+'</b>'+
		'</div>'+
		
		'<div class="col-md-4">'+
		'Phone No. <br><b> '+r[0].mobile+'</b>'+
		'</div>'+
		
		'<div class="col-md-4">'+
		'Email Address <br><b> '+r[0].email_id+'</b>'+
		'</div>'+
	'</div>'+
	
	'<div class="col-md-12" style="margin-bottom: 20px;">'+
	
		'<div class="col-md-4">'+
		'Date of Birth <br><b>'+r[0].dob+'</b>'+
		'</div>'+
		
		'<div class="col-md-4">'+
		'Sex <br><b> '+r[0].gender+'</b>'+
		'</div>'+
		
		'<div class="col-md-4">'+
		'Martial Status <br><b> '+r[0].martial+'</b>'+
		'</div>'+
	'</div>'+
	
	'<div class="col-md-12" style="margin-bottom: 20px;">'+
	
		'<div class="col-md-4">'+
		'Residential Address <br><b>'+r[0].address+'</b>'+
		'</div>'+
		
		'<div class="col-md-4">'+
		'Occupation <br><b> '+r[0].occupation+'</b>'+
		'</div>'+
		
		'<div class="col-md-4">'+
		'Monthly Salary <br><b><i class="fa fa-inr"></i> '+r[0].salary+'</b>'+
		'</div>'+
	'</div>'+
	
	'<div class="col-md-12" style="margin-bottom: 20px;">'+
	
		'<div class="col-md-4">'+
		'Budget : <br>Min :<b>&nbsp;<i class="fa fa-inr"></i> '+r[0].min_price+' &nbsp;&nbsp;</b> Max :&nbsp;<b><i class="fa fa-inr"></i> '+r[0].max_price+'</b>'+
		'</div>'+
		
		'<div class="col-md-4">'+
		'Property Type <br><b> '+r[0].p_type+'</b>'+
		'</div>'+
		'<div class="col-md-4">'+
		'Built-Up area <br><b> '+r[0].p_area+'</b>'+
		'</div>'+
	'</div>'+
	
	'<div class="col-md-12" style="margin-bottom: 20px;">'+
	
		'<div class="col-md-2">'+
		'Message'+
		'</div>'+
		
		'<div class="col-md-1">'+
		':'+
		'</div>'+
		
		'<div class="col-md-8">'+
		'<b>'+r[0].message+'</b>'+
		'</div></div>'+	
		 '<div class="col-md-1"></div>'+
		  '</div></div></div></div>'+
	'</div></div>';
					 $("#bg").hide();
			   $("#contact-info").html(create);
			   $("#contact-info").show();
			   
			},'JSON');
			
		
		}
		
		function back_user()
		{
		 $("#bg").show();
		 $("#contact-info").hide();
		}
		
		function change_status(status,id)
		{
			bootbox.confirm("Are You Sure To "+status+" ?",function(result){
				if(result==true){
			$.post("../data/data.php",{action:"loan_status",status:status,id:id},function(r){
			
				
				
				
				});
				} else{
				
				}
				display_loan(10);
				
			});
			
			}
			
		
		

</script>



			<div id="contact-page" class="container" style=" ">
    	<div id="bg">
	        <div class="col-md-12" style="margin-bottom: 30px;margin-top: 30px;">	
                <div class="row" style="background-image: url('../Upload/image/floor.jpg');"> 
               <h2 class="title text" style="background: #FE980F;border-radius: 5px;padding: 5px;color: #FFFFFF;height: 30px;margin:0px;"><span style="text-transform: none;">User Contact List</span>
			   <div class="col-md-12 " >
		 
            <div class="col-md-2" style="float:right;">
			
              <select onchange="display_loan(10)" id="choose" style="background: rgb(253, 247, 242);margin-top: -23px;height: 28px;font-size: 16px;">
                <option value="active" >Activated</option>
                <option value="deactive" >De-Activated</option>
              </select>
            </div>
          </div>
			   </h2> 	 	
	    		 <div id="contect_req">
				 <table class="table table-striped" style="font-size: medium;"><tr> <th>Sl No.</th><th>User Name</th><th>Mobile No.</th><th>Email Address</th><th>Property Type</th><th>Area</th><th>Date of Post</th><th>Action</th></tr>
				 <tbody id="c_req"></tbody>
				 </table>
				
				 
				 
				 </div>
					</div>
                </div>
          </div>
		  
			

    </div>
	<div id="contact-info"   style="margin-top: 25px; ">
			</div>
	
	

 <style>
.alert-rev-info {
	background: #3a87ad;
	color: #d9edf7;
}
.soc-popup-overlay {
	background: #333;
	position: fixed;
	background: url('../img/black-dot.png');
	height: 100%;
	width: 100%;
	top: 0;
	left: 0;
	z-index: 1020;
}
.soc-popup {
	position: fixed;
	background: #fff;
	top: 150px !important ;
	left: 100px;
	padding: 10px;
	box-shadow: 0 0 10px #333;
	border-radius: 2px;
	max-width: 90%;
	word-wrap: break-word;
}
.soc-popup > .soc-popup-container {
	overflow: auto;
	overflow-x: visible;
	width: 593px !important;
	}
}
.close-soc-popup {
	position: absolute;
	top: 11px;
	right: 11px;
	cursor: pointer;
}
.common-header > .arrow-ss, .other-offer-heading > .arrow-ss, .offer-head > .arrow-ss {
	bottom: 0px;
}
.service-head, .other-offer-head {
	width: 100%;
	padding: 7px;
	font-size: 10px;
	display: block;
	border-bottom-right-radius: 0;
	border-bottom-left-radius: 0;
	white-space: normal;
	color: #fff;
	text-overflow: ellipsis;
	font-size: 15px;
}
.arrow-ss.bottom.arrow-info > .arrow, .arrow-ss.bottom.arrow-info > .arrow:after {
	border-bottom-color: #3a87ad !important;
}
.arrow-ss {
	display: block;
	left: 20px;
	top: -9px;
	border: none;
	border-radius: none;
	padding: 0;
	z-index: 0;
}
.label {
	border: 1px solid #000;
}
.popover {
	position: absolute;
	top: 0;
	left: 0;
	z-index: 1010;
	display: none;
	max-width: 276px;
	padding: 1px;
	text-align: left;
	background-color: #ffffff;
	background-clip: padding-box;
	border: 1px solid #cccccc;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 6px;
	-webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	white-space: normal;
}
.popover.top {
	margin-top: -10px;
}
.popover.right {
	margin-left: 10px;
}
.popover.bottom {
	margin-top: 10px;
}
.popover.left {
	margin-left: -10px;
}
.popover-title {
	margin: 0;
	padding: 8px 14px;
	font-size: 14px;
	font-weight: normal;
	line-height: 18px;
	background-color: #f7f7f7;
	border-bottom: 1px solid #ebebeb;
	border-radius: 5px 5px 0 0;
}
.popover-content {
	padding: 9px 14px;
}
.popover .arrow, .popover .arrow:after {
	position: absolute;
	display: block;
	width: 0;
	height: 0;
	border-color: transparent;
	border-style: solid;
}
.popover .arrow {
	border-width: 11px;
}
.popover .arrow:after {
	border-width: 10px;
	content: "";
}
.popover.top > .arrow {
	left: 50%;
	margin-left: -11px;
	border-bottom-width: 0;
	border-top-color: #999999;
	border-top-color: rgba(0, 0, 0, 0.25);
	bottom: -11px;
}
.popover.top > .arrow:after {
	content: " ";
	bottom: 1px;
	margin-left: -10px;
	border-bottom-width: 0;
	border-top-color: #ffffff;
}
.popover.right > .arrow {
	top: 50%;
	left: -11px;
	margin-top: -11px;
	border-left-width: 0;
	border-right-color: #999999;
	border-right-color: rgba(0, 0, 0, 0.25);
}
.popover.right > .arrow:after {
	content: " ";
	left: 1px;
	bottom: -10px;
	border-left-width: 0;
	border-right-color: #ffffff;
}
.popover.bottom > .arrow {
	left: 50%;
	margin-left: -11px;
	border-top-width: 0;
	border-bottom-color: #999999;
	border-bottom-color: rgba(0, 0, 0, 0.25);
	top: -11px;
}
.popover.bottom > .arrow:after {
	content: " ";
	top: 1px;
	margin-left: -10px;
	border-top-width: 0;
	border-bottom-color: #ffffff;
}
.popover.left > .arrow {
	top: 50%;
	right: -11px;
	margin-top: -11px;
	border-right-width: 0;
	border-left-color: #999999;
	border-left-color: rgba(0, 0, 0, 0.25);
}
.popover.left > .arrow:after {
	content: " ";
	right: 1px;
	border-right-width: 0;
	border-left-color: #ffffff;
	bottom: -10px;
}
</style>

</body>
</html>


	 <!--/#contact-page-->
	 	
    

<!--/#footer-bottom-->
