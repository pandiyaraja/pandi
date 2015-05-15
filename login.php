<?php


include "db.php";
include('header.php');
session_start();


// check if any valid session
		// redirect to home
// check if action = login , username and password is coming

$arr=array();
$error=''; 
if (isset($_POST['submit'])) {
   if (empty($_REQUEST['email_login']) || empty($_REQUEST['pwd_login'])) {
      $error = "Username or Password is invalid"; 
	 
  }
   else
   {
     $username=$_REQUEST['email_login'];
     $password=$_REQUEST['pwd_login'];
	$con = mysql_connect("stratvave.com","node","node");
	mysql_select_db("realestate");
    $query = mysql_query('select * from login where pwd="'.$password.'" AND emailId="'.$username.'" and visible="true"');
     
	$rows = mysql_num_rows($query);
        if ($rows == 1) {
		 while($r = mysql_fetch_assoc($query)) {
			$arr[] = $r;
		}
		$_SESSION['login_id']=$arr[0]['loginId'];
		 $_SESSION['email']=$username;
		 $_SESSION['user_name']=$arr[0]["userName"];
		 $_SESSION['mobile']=$arr[0]["mobile"];
		 $_SESSION['address']=$arr[0]["address"];
		 $_SESSION['type']=$arr[0]["type"];
		 if($arr[0]["type"]=='user')
          header("location: ../user/add_post.php");
		  else
		   header("location: ../admin/active.php");
	 }
      else {
     $error = "name or Password is invalid";
        }
	 
       
   }
}
		// do SQL query, Check login
			// if success, add session and redirect to home else show invalid username and password
// check if action = registration , check all the xcolumns,
		// insert it to sql
			// add a session and redirect to home 
			
// else show html which is written below


//print_r($_REQUEST);


?>
<style>
.modal-footer .btn+.btn{
				margin-bottom:14px;
}

</style>

<section id="form" style="margin-top: 35px;margin-bottom: 35px;"><!--form-->
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="title text-center">LOGIN / SIGN UP</h2>
      </div>
    </div>
    <div class="row" style="padding-bottom: 35px;">
      <div class="col-sm-4 col-sm-offset-1">
        <div class="login-form"><!--login form-->
          <h2 class="title text-center" style="background: #FE980F;border-radius: 5px;padding: 5px;color: #FFFFFF;">Login to your account</h2>
          <form id="login" action='' method="post" >
            <input type="text"  name="email_login" placeholder="Email Address" class="form-control" />
            <input type="password" name="pwd_login" placeholder="Password" class="form-control" />
            <span>
            <input type="checkbox" class="checkbox">
            Keep me signed in</span><span class="pull-right"><a style="cursor:pointer;"; onclick="forgot_pwd()">Forgot Password</a> </span>
            <button type="submit" name="submit" class="btn btn-default " value="Login">Login</button>
          </form>
          <span><?php echo $error; ?></span></div>
        <!--/login form-->
        <div id="password"></div>
      </div>
      <div class="col-sm-1" style="padding-top: 3%;">
        <h2 class="or">OR</h2>
      </div>
      <div class="col-sm-4">
        <div class="signup-form"><!--sign up form-->
          <h2 class="title text-center" style="background: #FE980F;border-radius: 5px;padding: 5px;color: #FFFFFF;">New User Signup!</h2>
          <form id="registration" action="../data/data.php" method="post" style="position:relative;">
            <input type="text" name="userName" data-valid="mand_f_name" placeholder="Name" class="form-control" />
            <input type="text" name="email" data-valid="mand_email_check" placeholder="Email Address" class="form-control" />
            <input type="password" name="pwd" data-valid="mand_password" placeholder="Password" class="form-control" />
            <input type="text" name="mobile" data-valid="mand_phno" maxlength="10" placeholder="Mobile number" class="form-control" />
            <textarea name="address" id="message" data-valid="mand" required="required" class="form-control" rows="4" placeholder="Your Address Here"></textarea>
            <input type="button" class="btn btn-warning pull-right" onclick="new_user()" value="SignUp" style="width: 20%;margin-top: 20px;"/>
            <input type="hidden" name="action" value="registration" />
          </form>
        </div>
        <!--/sign up form-->
      </div>
    </div>
  </div>
</section>
<!--/form-->

<script>
$(function(){
			$("#registration .form-control").blur(function () {
        com_fun.v($(this), "top:8px;right:7px;", false);
    }).focus(function () {
        $(".error_indicator." + $(this).attr('name')).remove();
    }).wrap('<span style="position:relative;"></span>');
			});
function new_user()
{
$("#registration .form-control").each(function () {
						com_fun.v($(this), "top: 8px;right: 8px;", false);
				});
				var err = ($("#registration").find('.error_indicator[data-error="true"]').length == 0) ? "" : "a";
				
				
			
        if (err == ""){
$("#registration").ajaxSubmit(function(r){
	bootbox.alert("Your Registration is Successfully. Your Account will Activated within 2-3 Days!");
$("#registration")[0].reset();
});
}


}

function forgot_pwd()
{
	var pwd='<form id="change_pwd" action="../data/data.php" method="post"><table>'+
	'<tr><td>Email Id</td><td><input type="text" data-valid="mand_email" class="form-control" name="email"/></td></tr>'+
	'<tr><td>New Password</td><td><input type="password" data-valid="mand" class="form-control" name="new_pwd"/></td></tr>'+
	'<tr><td colspan="2"><span class="pull-right"><input type="button" onclick="update_pwd()" class="btn brn-default " value="Change" /></span></td></tr>'+
	'</table><input type="hidden" name="action" value="update_pwd" /></form>';

$("#password").html(pwd);	
	
	
	}


function update_pwd()
{

			
				var err = ($("#change_pwd").find('.error_indicator[data-error="true"]').length == 0) ? "" : "a";
			
        if (err == ""){
	
	$("#change_pwd").ajaxSubmit(function(r){
		
		
		});
		}
	
	}


	</script>
<?php
include('footer.php');
?>
