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
	<script>
		document.addEventListener('change', function(event) {
			// Check if the changed element is a select dropdown with class 'item-select'
			if (event.target && event.target.classList.contains('item-select')) {
				var selectElement = event.target;
				var selectId = selectElement.id.split('-')[1];  // Extract the unique id from select element

				// Find the associated custom input field using the extracted id
				var customInput = document.getElementById('custom-' + selectId);

				// Check if 'Custom' is selected
				if (selectElement.value === 'custom') {
					customInput.style.display = "block";  // Show the custom input
					customInput.setAttribute("name", "items[]");  // Update name for form submission
					selectElement.removeAttribute("name");  // Remove name from select to avoid conflicts
				} else {
					customInput.style.display = "none";  // Hide the custom input
					customInput.removeAttribute("name");  // Remove name from custom input
					selectElement.setAttribute("name", "items[]");  // Reapply name to select
				}
			}
		});
	</script>
		<div class="form-group">
			<label for="rate" class="col-form-label">Rate</label>
			<input id="rate-<?=$uniqid?>" name="rate[]" type="number" class="form-control inv_rate">
		</div>
		<div class="form-group">
			<label for="sqty" class="col-form-label">Quantity</label>
			<input id="sqty-<?=$uniqid?>" name="qty[]" value="1" type="number" class="form-control inv_qty" min="1">
		</div>
		<div class="form-group">
			<label for="tax_amount" class="col-form-label">Tax Amount</label>
			<div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text"><?php echo VAT_TEXT?></span></span>
				<input type="hidden" class="tax_value" value="<?php echo VAT_VALUE?>">
				<input id="tax_amount-<?=$uniqid?>" name="tax_amount[]" type="number" class="form-control inv_tax_amount">
			</div>


		</div>
		<div class="form-group">
			<label for="total_amount" class="col-form-label">Amount</label>
			<input id="total_amount-<?=$uniqid?>" name="total_amount[]" type="number" readonly class="form-control inv_total_amount">
		</div>
	</div>
</div>