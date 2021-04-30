<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>List of Tenants With Incoming Payments Due:</b>
						
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Name</th>
									<th class="">House Rented</th>
									<th class="">Monthly Rate</th>
									<th class="">Remaining Balance</th>
									<th class="">Last Payment</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$tenant = $conn->query("SELECT t.*,concat(t.lastname,', ',t.firstname,' ',t.middlename) as name,h.house_no,h.price FROM tenants t inner join houses h on h.id = t.house_id where t.status = 1 order by h.house_no desc ");
								while($row=$tenant->fetch_assoc()):
									$months = abs(strtotime(date('Y-m-d')." 23:59:59") - strtotime($row['date_in']." 23:59:59"));
									$months = floor(($months) / (30*60*60*24));
									$payable = $row['price'] * $months;
									$paid = $conn->query("SELECT SUM(amount) as paid FROM payments where tenant_id =".$row['id']);
									$last_payment = $conn->query("SELECT * FROM payments where tenant_id =".$row['id']." order by unix_timestamp(date_created) desc limit 1");
									$paid = $paid->num_rows > 0 ? $paid->fetch_array()['paid'] : 0;
									$last_payment = $last_payment->num_rows > 0 ? date("M d, Y",strtotime($last_payment->fetch_array()['date_created'])) : 'N/A';
									$outstanding = $payable - $paid;
									$remain_month=$outstanding/$row['price'];



                                   
								?><?php if($row['price']==-$outstanding){ ?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td>
										<?php echo ucwords($row['name']) ?>
									</td>
									<td class="">
										 <p> <b><?php echo $row['house_no'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo number_format($row['price'],2) ?></b></p>
									</td>
									<td class="text-right">
										 <p> <b><?php 
                                         //if($row['price']==-$outstanding){
                                         echo number_format(-$outstanding,2) ?>&nbsp;<b>for</b>&nbsp;<?php 
                                         //if($row['price']==-$outstanding){
                                         echo number_format(-$remain_month,0) ?>&nbsp;<b>month</b></b></p>
									</td>
									<td class="">
										 <p><b><?php echo  $last_payment ?></b></p>
									</td>
									<td class="text-center">
										<!--button class="btn btn-sm btn-outline-primary view_payment" type="button" data-id="<?php echo $row['id'] ?>" >View</button-->
										<!--a href="index.php?page=sms" ><button class="btn btn-sm btn-outline-primary edit_tenant" type="button" data-id="<?php //echo $row['id'] ?>" >Message</button></a-->
										<button class="btn btn-sm btn-outline-primary edit_tenant"  type="button" data-id="<?php echo $row['id'] ?>" >Message</button>
										<!--button class="btn btn-sm btn-outline-danger delete_tenant" type="button" data-id="<?php echo $row['id'] ?>">Delete</button-->
									</td>
								</tr>   <?php } ?>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}

	.btn-primary {
		display: none;
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
	
}
.btn-secondary {
	position: absolute;
  right: 25px;
  display: none;
  
}


	.modal-footer {
		
    border-top: 0 none;
}
</style>
<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	
	
	$('.edit_tenant').click(function(){
		uni_modal("Send Message To:","sms.php?id="+$(this).attr('data-id'),"mid-large")
		
	})




	

	
	
</script>





