<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | JB Estate</title>
    <link href="../Upload/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Upload/css/font-awesome.min.css" rel="stylesheet">
    <link href="../Upload/css/prettyPhoto.css" rel="stylesheet">
    <link href="../Upload/css/price-range.css" rel="stylesheet">
    <link href="../Upload/css/animate.css" rel="stylesheet">
    <link href="../Upload/css/main.css" rel="stylesheet">
    <link href="../Upload/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
   <link rel="shortcut icon" href="../Upload/image/icon.png"/>
    <script src="../Upload/js/jquery.js"></script>
    <script src="../Upload/js/bootstrap.min.js"></script>
    <script src="../Upload/js/jquery.scrollUp.min.js"></script>
    <script src="../Upload/js/price-range.js"></script>
    <script src="../Upload/js/jquery.prettyPhoto.js"></script>
    <script src="../Upload/js/jquery.form.js"></script>
    <script src="../Upload/js/main.js"></script>
	<script src="../Upload/js/common.js"></script>
	
	<script src="../Upload/js/bootbox.js"></script>
	
    <script>
	$(function(){
var url = window.location.pathname;
var page = url.substr(url.lastIndexOf('/') + 1);

  if (page) {
    $('#menu_cls li a[href="' + page + '"]').addClass('active');
    $('.active').parents().children('li a').addClass('active');
  }
		});

	</script>
    
    
    
    
    
  <?php
session_start();
if( !isset($_SESSION['login_id']) )
{
 header("Location: ../main/index.php");
}
else if($_SESSION['type']=='user')
{
	 header("Location: ../user/add_post.php");
	}

$logout = (isset($_REQUEST["l"])?$_REQUEST["l"]:"");
if($logout == "logout"){

if(session_destroy()) // Destroying All Sessions
{
header("Location: ../main/index.php"); // Redirecting To Home Page
}
else
echo('test');

}

  ?>
  
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header-middle" style="margin-bottom:5px;margin-top: 5px;">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="logo pull-left">
                            
                                <img src="../Upload/image/logo.png" style="width: 50%;" alt="" />
                        </div>

                    </div>

                    <div class="col-sm-10">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul id="menu_cls" class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="active.php"  >Posts</a></li>
                                <li><a href="admin_query_details.php">Queries</a></li>
								<li><a href="blog.php">Blog</a></li>
                                <li><a href="contact_request.php">Contact Req</a> </li>
								<li><a href="loan_request.php">Loan Req</a></li>
								<li><a href="user_details.php">Reg Users</a></li>
								<li><a href="visitor_details.php">Visitor Details</a></li>
								
                            </ul>
                        </div>
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li></li>
                                <li>
                                     <span class="login_id" style="color:#fe980f;"> <a href="user_login.php"><i class="fa fa-user">&nbsp;</i> <?php echo $_SESSION['user_name'] ?></a></span> </li>
                                  <li>
                                     <span > <a id="logout" href="?l=logout"><i class="fa fa-power-off"></i>Logout</a></span>

                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->
    </header>
