<?php
include('header_admin.php');
?>
<script>
		$(function(){
			query_display(10);
		});
		
		function query_display(end)
		{
			$(".more_click").remove();
				var query='';
				var count=0;				
		$.post('../data/data.php',{action:"display_query",status:$("#choose").val(),end:end},function(r){
		if(!r[0].bck_status){
				if(r.length > 0)
				{
			
				for(var i=0;i<r.length;i++)
				{
				var params=r[i];
				query+='<tr><td>'+(i+1)+'</td><td>'+params.userName+'</td><td>'+params.mobile+'</td><td>'+params.emailId+'</td><td>'+params.subject+'</td><td>'+params.ts+'</td><td><a  style="cursor: pointer;" onclick="popup('+params.queryId+')"> View</a></td></tr>';
				count++;
				}
				 
				if(count==end)
				{
				end=end+10;
				query+='<tr  class="more_click"><td colspan="7" onclick="query_display('+end+')"><center> More </center></td></tr>'
				
				}
				 
				$("#query_dis").html(query);
 
				}
				}
				else
			{
				$("#query_dis").html('<tr><td colspan="7" ><center>Data Not Found</center></td></tr>');
				}
			
			},'JSON');
			
		}
		
		function popup(qid)
		{
			$.post('../data/data.php',{action:"query_details",q_id:qid},function(r){
				var create = '<div>'+
			'<div class="row" style="padding: 2px;background: rgb(226, 226, 226);">'+
			'<div class="col-md-12" style="margin-bottom:10px;margin-top: 10px;">'+
				 '<select id="status"  style="background:rgb(250, 243, 230);width:16%;" class="pull-right"> '+
				'<option  value="active" >Active</option>'+
				'<option value="deactive">Deactive</option>'+
				'</select>'+
			'</div>'+
			
				 '<div class="col-md-12" style="margin-bottom: 10px;">'+
				 '<div class="col-md-1"></div>'+
						'<div class="col-md-5">'+
						'User Name<br><b>'+r[0].userName+'</b>'+
						'</div>'+
						'<div class="col-md-5">'+
						'Email Address<br><b>'+r[0].emailId+'</b>'+
						'</div>'+
				'<div class="col-md-1"></div>'+
					'</div>'+
			
				
		
					
					'<div class="col-md-12" style="margin-bottom:10px">'+
					'<div class="col-md-1"></div>'+
						'<div class="col-md-5">'+
						'Mobile<br><b>'+r[0].mobile+'</b>'+
						'</div>'+
						'<div class="col-md-5">'+
						'Subject<br><b>'+r[0].subject+'</b>'+
						'</div>'+
						'<div class="col-md-1"></div>'+
						'</div>'+
			
					

				
					

						'<div class="col-md-12" style="margin-bottom:10px">'+
						'<div class="col-md-1"></div>'+
						'<div class="col-md-10">'+
						'Description<br><b>'+r[0].queryInfo+'</b>'+
						'</div>'+
						'<div class="col-md-1"></div>'+
						'</div>'+
				
	
					
					'<div class="col-md-12" style="margin-bottom:10px">'+
					'<button  value="submit" onclick="change_status('+r[0].queryId+')" style="margin-top:0px" value="submit"  class="btn btn-primary pull-right">Submit</button>'+
					'</div>'+
			
				'</div>'+
				'<div>'+
				 
				 
				'</div>'+
'</div>';       
			   ssPopUp.open(create,'User Queries');
			},'JSON');
			
		}
		
		function change_status(id)
		{
			
			$.post("../data/data.php",{action:"change_status_query",status:$("#status option:selected").val(),id:id},function(r){
						console.log("Change status succesfully");
						
				},'JSON');
			query_display(10);
			
			}

		
		

    </script>

<!--/#contact-page-->
<div id="contact-page" class="container" style=" ">
  <div class="bg">
    <div class="col-md-12" style="margin-bottom: 30px;margin-top: 30px;">
      <div class="row" style="background-image: url('../Upload/image/floor.jpg');">
	  
        <h2 class="title text" style="background: #FE980F;border-radius: 5px;padding: 5px;color: #FFFFFF;height: 30px;margin-bottom:0;"><span style="text-transform: none;">User Queries</span>
    
		  <div class="col-md-12 " >
		 
            <div class="col-md-2" style="float:right;">
			
              <select onchange="query_display(10)" id="choose" style="background: rgb(253, 247, 242);margin-top: -23px;height: 28px;font-size: 16px;">
                
                <option value="active" >UnSeen</option>
                <option value="deactive" >Seen</option>
              </select>
            </div>
          </div>
        </h2>
        <div id="query_display">
		<table class="table table-striped"><tr> <th>Sl No.</th><th>User Name</th><th>Mobile No.</th><th>Email Address</th><th>Subject</th><th>Date of Post</th><th>Action</th></tr>
				<tbody id="query_dis"></tbody></table>
		</div>
      </div>
    </div>
  </div>
</div>
<style>
.alert-rev-info {
	background: #676A73;
	color: #d9edf7;
}
.soc-popup-overlay {
	 
	position: fixed;
	background: url('../img/black-dot.png');
	height: 100%;
	width: 100%;
	top: 0;
	left: 0;
	z-index: 1020;
	background: rgba(10, 9, 5, 0.4);
}
.soc-popup {
	position: fixed;
	background: #fff;  
	top: 30% !important ;
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
		width: 600px !important;
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

<!--/#footer-bottom-->
