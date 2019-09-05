<div class="modal fade" id="modal-lau-type">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form" id="form-type">
					<input type="hidden" id="type-type" value="insert">
					<input type="hidden" id="type-id">
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Laundry Type:</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="type" placeholder="Enter laundry type description" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Price:</label>
				    <div class="col-sm-9"> 
				      <input type="number" min="1" step="any" class="form-control" id="price" placeholder="Enter price per kilo" required>
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-3 col-sm-9">
				      <button type="submit" class="btn btn-success">Save</button>
				    </div>
				  </div>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>