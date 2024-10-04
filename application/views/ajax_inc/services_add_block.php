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
			<label for="sfrequency" class="col-form-label">Frequency</label>
			<input id="sfrequency" name="sfrequency[]" type="number" class="form-control">
		</div>
		<div class="form-group">
			<label for="sprice" class="col-form-label">Price</label>
			<input id="sprice" name="sprice[]" type="number" class="form-control">
		</div>
	</div>
</div>