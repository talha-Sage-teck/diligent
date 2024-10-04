
        // ============================================================== 
        // Item Input Options
        // ============================================================== 


document.addEventListener('change', function(event) {
	
	if (event.target && event.target.classList.contains('item-select')) {
		var selectElement = event.target;
		var selectId = selectElement.id.split('-')[1]; 

		var customInput = document.getElementById('custom-' + selectId);

		if (selectElement.value === 'custom') {
			customInput.style.display = "block";  
			customInput.setAttribute("name", "items[]");  
			selectElement.removeAttribute("name"); 
		} else {
			customInput.style.display = "none"; 
			customInput.removeAttribute("name"); 
			selectElement.setAttribute("name", "items[]");  
		}
	}
});
