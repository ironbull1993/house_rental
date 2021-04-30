

<?php 

include('db_connect.php');


    $result = $conn->query("select * from tenants");
   // $result =mysqli_query($conn,"SELECT * FROM payments full outer join tenants on tenants.id = payments.tenant_id where tenant_id = '".$_GET['id']."'");
    echo "<html>";
    echo "<body>";
    echo  "<form method='get' action='contract.php'>";
    echo "<select name='id'>";

   // while ($row = $result->fetch_assoc()) {

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


                  unset($id, $name);
                  $id = $row['id'];
                  $name = $row['firstname']; 
                  $name1 = $row['lastname'];
                  echo '<option value="'.$id.'">'.$name.' '.$name1.'</option>';
                 
//}
 endwhile; 
    echo "</select>";
    echo "<input type='submit' value='view contract'>";
	echo	"</form>";
    echo "</body>";
    echo "</html>";
?>