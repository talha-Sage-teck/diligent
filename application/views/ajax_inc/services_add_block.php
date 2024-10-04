<div class="card">
    <h5 class="card-header">Item <?php echo $counter ?></h5>

    <div class="card-body border-top">
        <div class="form-group">
            <label for="item_input" class="col-form-label">Items</label>
            <input type="text" id="item_input_<?php echo $counter ?>" class="form-control form-control-sm" placeholder="Type or select an item" oninput="filterOptions(<?php echo $counter ?>)">
            <select id="item_dropdown_<?php echo $counter ?>" class="form-control form-control-sm" name="items[]" size="5" style="display: none;">
                <option value="">Select an item</option>
                <?php foreach ($items as $id => $title): ?>
                    <option value="<?= $title ?>"><?= $title ?></option> <!-- Change value to title -->
                <?php endforeach; ?>
            </select>
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

<script>
    function filterOptions(counter) {
        const input = document.getElementById('item_input_' + counter);
        const dropdown = document.getElementById('item_dropdown_' + counter);
        const filter = input.value.toLowerCase();
        const options = dropdown.options;

        // Show dropdown only if there are matching items
        let hasMatches = false;

        for (let i = 1; i < options.length; i++) { // Start from 1 to skip the placeholder option
            const optionText = options[i].text.toLowerCase();
            if (optionText.includes(filter)) {
                options[i].style.display = ''; // Show matching option
                hasMatches = true;
            } else {
                options[i].style.display = 'none'; // Hide non-matching option
            }
        }

        dropdown.style.display = hasMatches ? 'block' : 'none'; // Show dropdown if matches exist
    }

    // Event listeners to show/hide dropdown
    document.querySelectorAll('[id^="item_input_"]').forEach(input => {
        input.addEventListener('focus', function() {
            const counter = this.id.split('_')[2];
            document.getElementById('item_dropdown_' + counter).style.display = 'block'; // Show dropdown on input focus
        });

        input.addEventListener('blur', function() {
            const counter = this.id.split('_')[2];
            setTimeout(() => {
                document.getElementById('item_dropdown_' + counter).style.display = 'none'; // Hide dropdown after losing focus
            }, 100);
        });
    });

    // Set input value when an option is selected
    document.querySelectorAll('[id^="item_dropdown_"]').forEach(dropdown => {
        dropdown.addEventListener('change', function() {
            const counter = this.id.split('_')[2];
            const input = document.getElementById('item_input_' + counter);
            input.value = this.options[this.selectedIndex].value; // Set input value to selected option value
        });
    });
</script>
