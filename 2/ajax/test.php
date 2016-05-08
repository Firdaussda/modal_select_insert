<?php
include("../custom.js");
$id=$_REQUEST['dataid'];
//echo $dataid;
//exit;
?>

<form class="form-horizontal" role="form">
	<div class="form-group">
		
		<div class="col-sm-10">
			<textarea class="form-control" id="comment" cols="10"></textarea>
			<input type="hidden" id="uniqueid" value="<?php echo $id;?>">
		</div>
	</div>
	<div class="form-group">        
		<div class="col-sm-offset-2 col-sm-10">
			<button type="button" class="btn btn-default Save">Submit</button>
		</div>
	</div>
</form>