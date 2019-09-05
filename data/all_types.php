<br />
<?php 
require_once('../class/Laundry.php');
$types = $laundry->get_all_laundry();
 ?>

<div class="table-responsive">
        <table id="myTable-type" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Laundry Type Description</th>
                    <th><center>Price / Kg</center></th>
                    <th><center>Action</center></th>
                </tr>
            </thead>
            <tbody>
            	<?php foreach($types as $t): ?>
	                <tr align="center">
	                    <td align="left"><?= $t['laun_type_desc']; ?></td>
	                    <td><?= '₱ '.number_format($t['laun_type_price'], 2); ?></td>
	                    <td>
                            <button onclick="editType('<?= $t['laun_type_id']; ?>');" type="button" class="btn btn-warning btn-xs">Edit
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
        $('#myTable-type').DataTable();
    });
</script>

<?php $laundry->Disconnect(); ?>