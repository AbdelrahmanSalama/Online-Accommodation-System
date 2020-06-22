<?php
	include 'includes/header.php'; 
	session_start();
	require_once "Classes/User.php";
  	if(isset($_SESSION['Email']))
  	{
  		$masterUser2= new User();
    	$data2 = $masterUser2->getUserInfoById($_SESSION['Email']);   
    }
    else
    {
    	 header("loaction:/SW-Project/index.php");
    }  
?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
	<?php include 'includes/navbar.php'; ?>
	  <div class="content-wrapper">
	    <div class="container">
	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<div class="box box-solid">
	        			<div class="box-body">
	        				<div class="col-sm-3">
	        					<img src="images/profile.jpg" width="100%">
	        				</div>
	        				<div class="col-sm-9">
	        					<div class="row">
	        						<div class="col-sm-3">
	        							<h4>Name:</h4>
	        							<h4>Email:</h4>
	        							<h4>Member Since:</h4>
	        						</div>
	        						<div class="col-sm-9">
	        							<h4><?php echo $data2[0]['fname'].' '.$data2[0]['lname']; ?>
	        								<span class="pull-right">

	        									<a href="includes/profile_modal.php" class="btn btn-success btn-flat btn-sm" data-toggle="profile_modal"><i class="fa fa-edit"></i> Edit</a>
	        								</span>

	        								<!--button class='btn btn-success btn-sm edit btn-flat'><i class='fa fa-edit'></i> Edit</button-->
	        							</h4>
	        							<h4><?php echo $data2[0]['Email']; ?></h4>
	        							
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	    </div>
	  </div>
	  <?php include 'includes/profile_modal.php'; ?>
  	
  	<?php include 'includes/footer.php'; ?>
  	
</div>

<?php include 'includes/scripts.php'; ?>
<script>

$(function(){

  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
</script>
</body>
</html>