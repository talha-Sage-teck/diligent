<?php $uniqid = uniqid()?>
<div class="card" id="<?=$uniqid?>">
	<h5 class="card-header">Service <?php echo $counter?></h5>

	<div class="card-body border-top">
		<div class="form-group">
			<textarea class="form-control form-control-sm" name="services[]" rows="1"></textarea>
		</div>
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