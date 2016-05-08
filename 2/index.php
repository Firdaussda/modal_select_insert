<?php
	include('custom.js');
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

		<table class="table table-bordered table-striped table-condensed">
			<tr>
				<th>SL</th>
				<th>Employee Name</th>
				<th>Employee Salary</th>
				<th>Bonus</th>
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
					<?php
						if($row['comment'] > 0)
						{
							echo $row['comment'];
						}else{
							?>
					
					<!--<button type="button" class="btn btn-info btn-lg getUniqueId" value="<?php echo $row['employee_salary'];?>" data-toggle="modal" data-target="#myModal">Add</button>-->
					<a id="Inbox" class="ModalTitle getUniqueId" data-id="<? echo $row['id']; ?>" data-target="#myModal" data-toggle="modal" href="javascript:;">
	                add
					</a>
				<?php }?>
				</td>
			</tr>
			<? } ?>
		</table>
					
	</div>
	
	
	
	<!--<div class="modal fade" id="myModal" role="dialog">-->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<!-- <div class="modal-dialog"> --> <!-- medium size --> <!-- define margin and width -->
			<!-- <div class="modal-dialog modal-lg"> --> <!-- large size -->
			<div class="modal-dialog modal-sm"> <!-- small size -->
		
				<!-- Modal content-->
				<div class="modal-content"> <!-- define contente arear and background -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Bonus</h4>
					</div>
					<div class="modal-body">
						<div id="ModalBody"></div>
						<div id="Body"></div>
					</div>
					<!--<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>-->
				</div>
		  
			</div>
		</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<script>
		
		$(document).on('click','.getUniqueId',function() {
			//alert();
			var dataid=($(this).attr('data-id'));
			//alert(dataid);
			
			//Modal Body
			$.post("ajax/test.php",
			{
			  dataid:dataid
			},
			function(data,status){
			  document.getElementById("ModalBody").innerHTML=data;
			});
			
		});
		
		$(document).on('click','.Save',function() {
			var comment= ($("#comment").val());
			var uniqueid= ($("#uniqueid").val());
			//alert(uniqueid);
			
			$.post("ajax/update.php",
			{
			  comment:comment,
			  uniqueid:uniqueid
			},
			function(data,status){
			  document.getElementById("Body").innerHTML=data;
			});
			
		});	
	</script>
</body>
</html>


