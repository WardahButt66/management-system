<?php
require_once 'admin.php';
$admin->check_admin();
require_once './Database-connection.php';
if(isset($_POST['Add']))
{   
    $name=$_POST['SM-Name'];
    $CNIC=$_POST['CNIC'];
    $address=$_POST['Address'];
    $contact_no = $_POST['tel_no_1'] . $_POST['tel_no_2'] . $_POST['tel_no_3'];
    $query1="SELECT * FROM `salesman-details` WHERE `CNIC` = '".$CNIC."' AND `SM-Name` = '".$name."' ";
    $res = mysql_query($query1);
    
    $row = mysql_fetch_assoc($res);
        if(!empty($row))
        {
            echo "<script>"
                ."alert('Already Registered');"
            . "</script>";
        }
        else 
        {
          $query = "INSERT INTO `salesman-details` (`SM-ID`, `SM-Name`, `CNIC`, `Address`, `Contact-no`) VALUES (null , '".$name."' , '".$CNIC."' , '".$address."' , '".$contact_no."') ";
          $rs = mysql_query($query);
          if($rs === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
        if($rs)
        {
            echo "<script>"
                ."alert('Register Successfully');"
            . "</script>";
            header("location: Sales.php");
        }
        else
        {
            echo '<div><h1>Register Fail.....</h1></div>';
        }
        }    
}
?>     
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
<?php
require_once './Assets/script.php';
?> 
    </head>
<body>
   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<?php
                        require_once './Assets/header.php';
                        require_once './Database-connection.php';
                        ?>
					<!-- //header-ends -->
						<div class="outter-wp">                                    
		<!-- /script-for sticky-nav -->               
<!--inner block start here-->
<div class="col-md-12" >
    <div class="panel panel-primary">
        <br><br>    <br><br>
        <div style="margin-top: -60px;" class="panel-heading"><i class="fa fa-user"></i> Add Salesman</div>
        <div class="panel-body"> 
            <div class="forms-inner">
            <!--/set-1-->
                  <div class="set-1">
                    <div class="col-md-6 graph-2">
                    <div class="grid-1">
                    <div class="form-body">
                        <form method="POST" action="#" class="form-horizontal">
                            <div class="form-group">
                                <label for="Salesman-Name" style="margin-top: -5px;" class="col-sm-2 control-label">Salesman:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="SM-Name" class="form-control" id="Salesman-Name" placeholder="Name">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="CNIC" style="margin-top: -5px;" class="col-sm-2 control-label">CNIC:</label> 
                                <div class="col-sm-9"> <input type="text" class="form-control" id="CNIC" name="CNIC" placeholder="CNIC">
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label for="Contact" style="margin-top: -5px;" class="col-sm-2 control-label">Contact:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control " style=" width: 50px;" name="tel_no_1" required placeholder="+92" value="" maxlength="3" />-<input type="text" class="form-control" name="tel_no_2" style=" width: 50px;" required placeholder="300" value="" maxlength="3"  />-<input type="text" style="width: 90px" class="form-control " name="tel_no_3" required placeholder="6990506" value="" maxlength="7"  />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Address" style="margin-top: -5px;" class="col-sm-2 control-label">Address:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="Address" class="form-control" id="Address" placeholder="Address"> 
                                </div>
                            </div>
                            <div class="form-group">
                            </div>
                            <div style="margin-left: 445px;" class="col-sm-offset-2">
                                <button type="submit" name="Add" class="btn btn-default">Add</button>
                            </div>
                        </form> 
                    </div>
                    </div>
                    </div>
                     <div class="clearfix"> </div>
                    </div>
                  </div>
        </div>
    </div>
    </div>
									</div>
									 <!--footer section start-->
										<?php
                                                                          require_once './Assets/footer.php';
                                                                                 ?>
									<!--footer section end-->
								</div>
							</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
                        <?php
 require_once './Assets/slidebar_menu.php';
                           ?>
				<!--/slidebar-menu-->
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<link rel="stylesheet" href="css/vroom.css">
<script type="text/javascript" src="js/vroom.js"></script>
<script type="text/javascript" src="js/TweenLite.min.js"></script>
<script type="text/javascript" src="js/CSSPlugin.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>

