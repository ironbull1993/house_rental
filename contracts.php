

<?php 

include('db_connect.php');


    $result = $conn->query("select * from tenants");
   // $result =mysqli_query($conn,"SELECT * FROM payments full outer join tenants on tenants.id = payments.tenant_id where tenant_id = '".$_GET['id']."'");
    echo "<html>";
    echo "<body>";
    echo  "<form method='get' action='contract.php'>";
    echo "<select name='id'>";

    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['id'];
                  $name = $row['firstname']; 
                  $name1 = $row['lastname'];
                  echo '<option value="'.$id.'">'.$name.' '.$name1.'</option>';
                 
}

    echo "</select>";
    echo "<input type='submit' value='view contract'>";
	echo	"</form>";
    echo "</body>";
    echo "</html>";
?>