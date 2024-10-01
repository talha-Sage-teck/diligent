<div class="card">
	<h5 class="card-header">Service <?php echo $counter?></h5>

	<div class="card-body border-top">
		<div class="form-group">
			<textarea class="form-control form-control-sm" name="services[]" rows="1"></textarea>
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