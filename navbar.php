
<style>

.blink_text {

animation:1s blinker linear infinite;
-webkit-animation:1s blinker linear infinite;
-moz-animation:1s blinker linear infinite;

 color: red;
}

@-moz-keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }

@-webkit-keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }

@keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }



	.collapse a{
		text-indent:10px;
	}
	nav#sidebar{
	/** 	background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>)*/
	}
</style>

<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-tachometer-alt "></i></span> Dashboard</a>
				<a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-th-list "></i></span> House Type</a>
				<a href="index.php?page=houses" class="nav-item nav-houses"><span class='icon-field'><i class="fa fa-home "></i></span> Houses</a>
				<a href="index.php?page=available_houses" class="nav-item nav-available-houses"><span class='icon-field'><i class="fa fa-home "></i></span> Available Houses</a>
				<a href="index.php?page=tenants" class="nav-item nav-tenants"><span class='icon-field'><i class="fa fa-user-friends "></i></span> Tenants</a>





				<?php 
				include 'db_connect.php';
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

								?>
                                
                                <?php if($row['price']==-$outstanding){ ?> 
                                    <!--p><b> <span class="blink_text">NOTIFICATION:</span></b></p>
                                <p><b> <span class="blink_text">You have tenants with incoming due dates navigate to Payment Due to check the list.</span></b></p-->
                                
                                <a href="index.php?page=tenants_due" class="nav-item nav-tenants_due"><span class='icon-field blink_text'><i class="fa fa-user-friends "></i></span>Payment Due</a>
                                
                                <?php break;} ?>
                                   
                                   <?php endwhile; ?>




				<!--a href="index.php?page=tenants_due" class="nav-item nav-tenants_due"><span class='icon-field'><i class="fa fa-user-friends "></i></span>Payment Due</a-->
				<a href="index.php?page=invoices" class="nav-item nav-invoices"><span class='icon-field'><i class="fa fa-file-invoice "></i></span> Payments</a>
				<a href="index.php?page=reports" class="nav-item nav-reports"><span class='icon-field'><i class="fa fa-list-alt "></i></span> Reports</a>
				<a href="index.php?page=maintainance" class="nav-item nav-maintainance"><span class='icon-field'><i class="fa fa-list-alt "></i></span> Maintainance</a>
				<a href="index.php?page=contracts" class="nav-item nav-contract"><span class='icon-field'><i class="fa fa-list-alt "></i></span> Contract</a>
				<!--a href="index.php?page=send_sms1" class="nav-item nav-reports"><span class='icon-field'><i class="fa fa-list-alt "></i></span> Messaging</a-->
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users "></i></span> Users</a>
				 <a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cogs text-danger"></i></span> System Settings</a> 
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
