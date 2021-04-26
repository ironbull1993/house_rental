<?php include 'db_connect.php' ?>
<?php 

$month_of = isset($_GET['month_of']) ? $_GET['month_of'] : date('Y-m');

?>
<style>
	.on-print{
		display: none;
	}
</style>
<noscript>
	<style>
		.text-center{
			text-align:center;
		}
		.text-right{
			text-align:right;
		}
		table{
			width: 100%;
			border-collapse: collapse
		}
		tr,td,th{
			border:1px solid black;
		}
	</style>
</noscript>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="col-md-12">
					<form id="filter-report">
						
                        <div class="row form-group">
							
							<b>Total maintainance report:</b>
						
						</div>
					</form>
					<hr>
						<div class="row">
							<div class="col-md-12 mb-2">
							<button class="btn btn-sm btn-block btn-success col-md-2 ml-1 float-right" type="button" id="print"><i class="fa fa-print"></i> Print</button>
							</div>
						</div>
					<div id="report">
						<div class="on-print">
							 <p><center>Monthly maintainance Report</center></p>
							 <p><center>for the Month of <b><?php echo date('F ,Y',strtotime($month_of.'-1')) ?></b></center></p>
						</div>
						<div class="row">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Date</th>
										
										<th>House #</th>
										
										<th>totalm_amount</th>
                                        
									</tr>
								</thead>
								<tbody>
									<?php 
									$i = 1;
									$tamount = 0;
                                    $tamount5 = 0;
									
									$payments  = $conn->query("SELECT * from maintains");
                                    if($payments->num_rows > 0 ):
									while($row=$payments->fetch_assoc()):
										
                                        $tamount4 = $row['e_price']+$row['f_price']+$row['d_price'];
                                        $tamount5 += $row['e_price']+$row['f_price']+$row['d_price'];

									?>
									<tr>
										<td><?php echo $i++ ?></td>
										
										<td><?php echo date('M d,Y',strtotime($row['date_created'])) ?></td>
										<td><?php echo $row['house_no'] ?></td>
										
										
                                        <td class="text-right"><?php echo number_format($tamount4,2) ?></td>
                                       
									</tr>
								<?php endwhile; ?>
								<?php else: ?>
									<tr>
										<th colspan="6"><center>No Data.</center></th>
									</tr>
								<?php endif; ?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="5">Total Amount</th>
										<th class='text-right'><?php echo number_format($tamount5,2) ?></th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('#print').click(function(){
		var _style = $('noscript').clone()
		var _content = $('#report').clone()
		var nw = window.open("","_blank","width=800,height=700");
		nw.document.write(_style.html())
		nw.document.write(_content.html())
		nw.document.close()
		nw.print()
		setTimeout(function(){
		nw.close()
		},500)
	})
	$('#filter-report').submit(function(e){
		e.preventDefault()
		location.href = 'index.php?page=maintain_report&'+$(this).serialize()
	})
</script>