<?php
	$con=mysqli_connect("localhost","root","","employee");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	// Perform queries
	$query="SELECT * FROM salary";
	$query_result=mysqli_query($con,$query);
	//exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">

</head>
<body>

	<div class="container">
		<h2>Modal Example</h2>
		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

		<!-- Modal -->
		<!--<div class="modal fade" id="myModal" role="dialog">-->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog"> <!-- medium size --> <!-- define margin and width -->
			<!-- <div class="modal-dialog modal-lg"> --> <!-- large size -->
			<!-- <div class="modal-dialog modal-lg"> --> <!-- small size -->
		
				<!-- Modal content-->
				<div class="modal-content"> <!-- define contente arear and background -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Salary Management</h4>
					</div>
					<div class="modal-body">
						<table class="table table-bordered table-striped table-condensed">
							<tr>
								<th>SL</th>
								<th>Employee Name</th>
								<th>Employee Salary</th>
								<th>Salary Range</th>
							</tr>
							<?
								$i=1;
								while($row=mysqli_fetch_array($query_result)){
									//print_r($row);
							?>
							<tr>
								<td><?php echo $i++;?></td>
								<td><?php echo $row['employee_name'];?></td>
								<td><?php echo $row['employee_salary'];?></td>
								<td>
									<form action="" method="post"> 
										<textarea class="form-control comment" name="comment.<?php echo $row['id'];?>." cols="10"></textarea>
										<input type="hidden" name="uniqueid" value="<?php echo $row['id'];?>">
										<!--<button type="button" name="my_btn" id="my_btn">Save</button>-->
										<input type="submit" name="submit" value="Submit" />
									</form>
								</td>
							</tr>
							<? } ?>
						</table>
					</div>
					<!--<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>-->
				</div>
		  
			</div>
		</div>
	  
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>

<script>
	$(document).on('click','#my_btn',function() {
		var comment = ($(".comment").val());
		
		<input type='text' id='comment"+i+"' name='comment"+i+"' class='form-control' />
		alert(comment);
	});
</script>

<?php
	if(isset($_POST['Submit'])){
		echo 'ok';
		
	}
?>
