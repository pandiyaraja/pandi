<div class="col-md-12"></div>
<?php
include('header_admin.php');
?>
<script>
		$(function(){
			query_display();
		});
		
		function query_display()
		{
			
				var query='';
						
		$.post('../data/data.php',{action:"visitor_info"},function(r){
		if(!r[0].bck_status){
				if(r.length > 0)
				{
			
				for(var i=0;i < r.length;i++)
				{
				var params=r[i];
				query='<tr><td>'+(i+1)+'</td><td>'+params.user_name+'</td><td>'+params.mobile+'</td><td>'+params.email_id+'</td><td>'+params.message+'</td><td>'+params.ts+'</td></tr>';
				
				}
				console.log(query);
				$("#infovis_dis").html(query);
 
				}
				}
				else
				{
				$("#infovis_dis").html('<tr><td colspan="8"><center>Data Not Found</center></td></tr>');
				}
				
			},'JSON');
			
		}
		
		
		
		

		
		

    </script>

<!--/#contact-page-->
<div id="contact-page" class="container" style=" ">
  <div class="bg">
    <div class="col-md-12" style="margin-bottom: 30px;margin-top: 30px;">
      <div class="row" style="background-image: url('../Upload/image/floor.jpg');">
	  
        <h2 class="title text" style="background: #FE980F;border-radius: 5px;padding: 5px;color: #FFFFFF;height: 30px;margin-bottom:0;"><span style="text-transform: none;">User Queries</span>
    
		  
        </h2>
        <div id="query_display">
		<table class="table table-striped"><tr> <th>Sl No.</th><th>User Name</th><th>Mobile No.</th><th>Email Address</th><th>Messsage</th><th>Date of Post</th></tr>
				<tbody id="infovis_dis"></tbody></table>
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
