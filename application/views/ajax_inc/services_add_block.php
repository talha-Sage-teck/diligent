<div class="card">
	<h5 class="card-header">Item <?php echo $counter?></h5>

	<div class="card-body border-top">
	<div class="form-group">
		<!-- Dropdown select with unique id -->
		<select class="form-control form-control-sm item-select" id="select-<?= $counter?>"  name="items[]">
			<option value="">Select an item</option>
			<?php foreach($myitems as $idx => $title): ?>
				<option value="<?= $title ?>"><?= $title ?></option>
			<?php endforeach; ?>
			<option value="custom">Custom</option> <!-- Option to trigger custom input -->
		</select>

		<!-- Custom input field with unique id -->
		<input type="text"  id="custom-<?= $counter?>" class="form-control form-control-sm custom-item"  placeholder="Enter custom value" style="display: none;">
	</div>
		<div class="form-group">
			<label for="sfrequency" class="col-form-label">Frequency</label>
			<input id="sfrequency" name="sfrequency[]" type="number" class="form-control">
		</div>
		<div class="form-group">
			<label for="sprice" class="col-form-label">Price</label>
			<input id="sprice" name="sprice[]" type="number" class="form-control">
		</div>
	</div>
</div>
<script src="<?php echo base_url('assets/libs/js/custom.js'); ?>"></script>