<br />
<?php 
require_once('../class/Laundry.php');
$laundries = $laundry->all_laundry();
 ?>

<div class="table-responsive">
        <table id="myTable-laundry" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Customer Name</th>
                    <th><center>Priority #</center></th>
                    <th><center>Weight</center></th>
                    <th><center>Type</center></th>
                    <th><center>Date Received</center></th>
                    <th><center>Amount</center></th>
                    <th><center>Action</center></th>
                </tr>
            </thead>
            <tbody>
            	<?php
                    foreach($laundries as $l): 
                    $amount = $l['laun_weight'] * $l['laun_type_price'];
                ?>
                <tr align="center">
                    <td><input type="checkbox" name="imSlepy" value="<?= $l['laun_id']; ?>"></td>
                    <td align="left"><?= ucwords($l['customer_name']); ?></td>
                    <td><?= $l['laun_priority']; ?></td>
                    <td><?= $l['laun_weight']; ?></td>
                    <td><?= $l['laun_type_desc']; ?></td>
                    <td><?= $l['laun_date_received']; ?></td>
                    <td><?= '₱ '.number_format($amount, 2); ?></td>
                    <td>
                        <button onclick="editLaundry('<?= $l['laun_id']; ?>')" type="button" class="btn btn-warning btn-xs">
                           Edit
                           <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </button>
                    </td>
                </tr>
	            <?php endforeach; ?>
            </tbody>
        </table>
</div>


<!-- for the datatable of employee -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-laundry').DataTable();
    });
</script>

<?php $laundry->Disconnect(); ?>