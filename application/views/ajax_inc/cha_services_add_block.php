<?php $uniqid = uniqid()?>
<div class="card" id="<?=$uniqid?>">
	<h5 class="card-header">Items <?php echo $counter?></h5>

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
			<label for="sqty" class="col-form-label">Quantity</label>
			<input id="sqty-<?=$uniqid?>" name="qty[]" value="1" type="number" class="form-control inv_qty" min="1">
		</div>
	</div>
</div>
<script src="<?php echo base_url('assets/libs/js/custom.js'); ?>"></script>