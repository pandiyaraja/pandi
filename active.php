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
			all_post(10);
			
		});
		
		function all_post(end)
		{
		       $(".more_click").remove();
				var query='';
				var check='';
                var count=0;
			$.post('../data/data.php',{action:"all_post_admin",visible:$("#choose").val(),end:end},function(r){
			if(!r[0].bck_status){
				if(r.length > 0)
				{
				for(var i=0;i<r.length;i++)
				{
				var params=r[i];
				query+='<tr><td>'+(i+1)+'</td><td>'+params.userName+'</td><td>'+params.address+'</td><td>'+params.propertyType+'</td><td>'+params.amount+'</td><td>'+params.ts+'</td><td><a  style="cursor: pointer;" onclick="post_dis('+params.proId+',1)" > View</a></td></tr>';
				count++;
				}
				if(count==end)
				{
				end=end+10;
				query+='<tr  class="more_click"><td colspan="7" onclick="all_post('+end+')"><center>  More</center></td></tr>'
				
				}
				 
				$("#post_admin").html(query);
	 
			
			}
			
			}
			else
			{
			$("#post_admin").html('<tr><td colspan="7" ><center>Data Not Found</center></td></tr>');
			
			}
			},'JSON');
			}
			
			 
			  
	function post_hide()
	{
		$("#table_pop").hide();
		$("#table_hide").show();
		
	}	
		
		
function post_dis(qid,end)
		{
			$.post('../data/data.php',{action:"all_post_admin",visible:$("#choose").val(),req_id:qid,end:end},function(r){
			var create='';
				if(r.length > 0)
				{
				var project_name=((r[0].project_type!=null)?'<div class="col-md-4"><b>'+r[0].project_type+'</b>&nbsp;Project</div>':'');
				 create = '<div class="col-md-12"  style="margin-top: -30px;margin-left:-5px;margin-right: 69px;" id="basic" style="margin-top: 20px;">'+ 
				'<h2 class="title text" style="background: #FE980F;border-radius: 5px;margin-bottom: 10px;padding: 5px;color: #FFFFFF;height: 30px;margin: 0px;"><span style="text-transform: none;">User Post Details</span></h2> '+
				'<div class="col-md-12" style="background: #f9f9f9;border: 1px solid rgb(237, 233, 228);" >'+
				'<div class="col-md-12" style="text-align: center;font-size: 18px;font-weight: 700;color: rgb(113, 101, 64);margin-top: 10px;"><button class=" pull-left btn btn-success pull-right" style="margin-top: 20px;" onclick="post_hide()">'+
				'<i class="fa fa-reply"></i> Back </button>'+r[0].title+'<span style="margin-top: 20px;" class="pull-right">'+((r[0].visible=="true")?('<button id="remove_post" onclick="change_status(\'false\','+r[0].proId+')" class="btn btn-warning">De-active</button>'):('<button id="remove_post" onclick="change_status(\'true\','+r[0].proId+')" class="btn btn-warning">Active</button>'))+'</span></div>'+
				'<div class="col-md-7" style="margin-top: 10px;">'+
				'<div class="col-md-12" style=" ">'+
				'<div class="col-md-12"> <div class="col-md-4"><hr ></div><div class="col-md-4"><h5 class="title text-center" style="color:#FE980F;">BASIC DETAILS</h5></div><div class="col-md-4"><hr></div></div>'+
				'</div><div class="col-md-12" style=" "><div class="col-md-4">Name <b><br>'+r[0].userName+'</b></div>'+
				'<div class="col-md-5"><p>Street Info<b><br>'+r[0].address+'</b></p></div>'+
				'<div class="col-md-4">Amount Deposit <br><b><i class="fa fa-inr"></i> '+r[0].amount+'</b></div>'+
				'<div class="col-md-4">Amount <br><b><i class="fa fa-inr"></i> '+r[0].rent+'</b></div><div class="col-md-4">Posted On <br><b> '+r[0].ts+'</b></div></div>'+
				'<div class="col-md-12" style="margin-top: 20px;margin-bottom: 20px;"><div class="col-md-4">SquareFeet <br><b>'+r[0].squarFeet+' Sq.ft.</b></div>'+
				'<div class="col-md-4">Property Type <br><b> '+r[0].propertyType+'</b></div><div class="col-md-4">Category <br><b> '+r[0].category+'</b></div></div>'+
				'<div class="col-md-12" style="margin-bottom: 20px;"><div class="col-md-2"><p>Description</p></div>'+
				'<div class="col-md-1"><b>:</b></div><div class="col-md-7"><b>'+r[0].description+'</b>'+
				'</div></div><div class="col-md-12"> <div class="col-md-4"><hr ></div><div class="col-md-4"><h5 class="title text-center" style="color:#FE980F;">FEATURES</h5></div><div class="col-md-4"><hr></div></div>'+
				'<div class="col-md-12" style="margin-bottom: 20px;"> <div class="col-md-4">'+
				'<b>'+r[0].rooms+'</b> &nbsp;Type</div><div class="col-md-4"><b>'+r[0].bathrooms+'</b> Bathrooms</div><div class="col-md-4"><b>'+r[0].floor+'</b> Floor'+
				'</div></div><div class="col-md-12" style="margin-bottom: 20px;"><div class="col-md-4"><b>'+r[0].furnished+'</b></div>'+
				'<div class="col-md-4"><b>'+r[0].year+'</b>&nbsp;Built-up year</div><div class="col-md-4"></div>'+project_name+'</div>'+
				'<div class="col-md-12"> <div class="col-md-4"><hr ></div><div class="col-md-4"><h5 class="title text-center" style="color:#FE980F;">AMENITIES</h5></div><div class="col-md-4"><hr></div></div><div class="col-md-12" style="margin-bottom: 20px;"> <div class="col-md-4"><b>'+((r[0].parking=="parking")?'<i class="fa fa-check" style="color:green"></i>':'<i class="fa fa-times" style="color:red"></i>')+'</b>&nbsp;Parking</div><div class="col-md-4">'+
				'<b>'+((r[0].security=="security")?'<i class="fa fa-check" style="color:green"></i>':'<i class="fa fa-times" style="color:red"></i>')+'</b> &nbsp;Security Any</div><div class="col-md-4"><b>'+((r[0].garden=="garden")?'<i class="fa fa-check" style="color:green"></i>':'<i class="fa fa-times" style="color:red"></i>')+'</b>&nbsp;Garden</div></div>'+
				'<div class="col-md-12" style="margin-bottom: 20px;"> <div class="col-md-4"><b>'+((r[0].gym=="gym")?'<i class="fa fa-check" style="color:green"></i>':'<i class="fa fa-times" style="color:red"></i>')+'</b>&nbsp;Gym</div><div class="col-md-4">'+
				''+((r[0].swimmingPool=="swimming")?'<i class="fa fa-check" style="color:green"></i>':'<i class="fa fa-times" style="color:red"></i>')+' &nbsp;Swimming Pool</div><div class="col-md-4"> &nbsp;<b>'+((r[0].lift=="lift")?'<i class="fa fa-check" style="color:green"></i>':'<i class="fa fa-times" style="color:red"></i>')+'</b> &nbsp;Lift</div></div>'+
				'<div class="col-md-12" style="margin-bottom: 20px;"><div class="col-md-4"><b>'+((r[0].play_ground=="play_ground")?'<i class="fa fa-check" style="color:green"></i>':'<i class="fa fa-times" style="color:red"></i>')+'</b>&nbsp;play_ground</div>'+
				'<div class="col-md-4"><b>'+((r[0].other=="other")?'<i class="fa fa-check" style="color:green"></i>':'<i class="fa fa-times" style="color:red"></i>')+'</b>&nbsp;other</div></div></div>'+
				'<div class="col-md-5" style="margin-top: 10px;"><div class="col-md-4 pull-right" style="margin-bottom: 15px"></div><div id="carousel-example-generic" class="pull-left carousel slide" data-ride="carousel" style="margin-top:50px; width:450px;height:300px;"><div class="carousel-inner">';
  
for(var j=1;j<r.length;j++){
  create += '<div class="item '+((j == 1)?"active":"")+'">'+
  '<img src="../Upload/image/'+r[j].image+'" style="width: 350px;height: 290px;margin-left: -50px;" alt="1"/>'+
  '<div class="carousel-caption" style="top: -11px;color: rgb(248, 248, 248);height: 45px;background-image: url(\'../Upload/image/img_back_title.png\');font-weight: 700;">'+
  ''+r[j].img_title+'</div></div>';
}

    //'<div class="item">'+
    //   '<img src="../Upload/image/'+r[i].image+'" style="width:100%;height: 250px;margin-left: -50px;" alt="2">'+
    //  '<div class="carousel-caption" style="top: -11px;color: rgb(248, 248, 248);height: 45px;background-image: url(\'../Upload/image/img_back_title.png\');font-weight: 700;">'+
    //    'Second'+
    // ' </div>'+
    //'</div>'+

    
create += ' </div>'+
  '<a class="left carousel-control" href="#carousel-example-generic" role="button" style="width: 0%;background: white;" data-slide="prev">'+
   ' <span class="glyphicon glyphicon-chevron-left" style="color: rgb(255, 255, 255);font-size: 33px;"  ></span>'+
  '</a>'+
  '<a class="right carousel-control" href="#carousel-example-generic" style="width: 0%;background: white;" role="button" data-slide="next">'+
    '<span class="glyphicon glyphicon-chevron-right" style="color: rgb(255, 255, 255);font-size: 33px;" ></span>'+
  '</a>'+
'</div></div>'+
'<div class="col-md-4"></div>'+
'<div class="col-md-4">'+
'</div></div></div></div>';
				  }
				    $("#table_hide").hide();
				    $("#table_pop").show();
				  $("#table_pop").html(create);
			},'JSON');
		}
		 
		
		function change_status(visible,id)
		{ 
			if(visible=="true"){
					var state="active";
			}else{
				var state="deactive";
			}
		bootbox.confirm("Are you sure you want to "+state+" ?",function(result){
			if (result == true) {
	
			$.post("../data/data.php",{action:"change_status_properties",status:visible,proId:id},function(r){
					
				
				},'JSON');
				$("#remove_post").hide();
				
			}
			else
			{
			
			}
			all_post(10);
			
			});
		}
		

    </script> 
<!--features_items-->
<div id="contact-page" class="container">
  <div class="bg">
  	<a class="btn btn-primary pull-right" style="margin-right: 3%;"  href="../user/add_post.php">Add Post</a>
    <div class="col-md-12" style="margin-top: 30px;margin-bottom: 30px;">

      <div  id="table_hide" class="row" style="background-image: url('../Upload/image/floor.jpg');">
        <h2 class="title text" style="background: #FE980F;border-radius: 5px;padding: 5px;color: #FFFFFF;height: 30px;margin: 0px;"><span style="text-transform: none;">User Post Details</span>
          <div class="col-md-12 " >
            <div class="col-md-2" style="float:right;">
              <select onchange="all_post(10)" id="choose" style="background: rgb(253, 247, 242);margin-top: -23px;height: 28px;font-size: 16px;">
                <option value="true" >Activated</option>
                <option value="false" >De-Activated</option>
              </select>
            </div>
          </div>
        </h2>
        <div id="Post_requ">
		<table class="table table-striped"><tr> <th>Sl No.</th><th> Name</th><th>Address</th><th>Property Type</th><th>Amount</th><th>Date of Post</th><th>Action</th></tr>
		<tbody id="post_admin"></tbody>
		</table>
				
		
        </div>
      </div>
    </div>
    <div id="table_pop" style="display:none;">
    </div>
  </div>
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
	top: 100px;
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
