
jQuery(document).ready(function($) {
    'use strict';

    // ============================================================== 
    // Notification list
    // ============================================================== 
    if ($(".notification-list").length) {

        $('.notification-list').slimScroll({
            height: '250px'
        });

    }

    // ============================================================== 
    // Menu Slim Scroll List
    // ============================================================== 


    if ($(".menu-list").length) {
        $('.menu-list').slimScroll({

        });
    }
    // ============================================================== 
    // Summernote
    // ============================================================== 
	$('#summernote').summernote({
            height: 300

        });


    // ============================================================== 
    // Sidebar scrollnavigation 
    // ============================================================== 

    if ($(".sidebar-nav-fixed a").length) {
        $('.sidebar-nav-fixed a')
            // Remove links that don't actually link to anything

            .click(function(event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top - 90
                        }, 1000, function() {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            };
                        });
                    }
                };
                $('.sidebar-nav-fixed a').each(function() {
                    $(this).removeClass('active');
                })
                $(this).addClass('active');
            });

    }

    // ============================================================== 
    // tooltip
    // ============================================================== 
    if ($('[data-toggle="tooltip"]').length) {
            
            $('[data-toggle="tooltip"]').tooltip()

        }

     // ============================================================== 
    // popover
    // ============================================================== 
       if ($('[data-toggle="popover"]').length) {
            $('[data-toggle="popover"]').popover()

    }
     // ============================================================== 
    // Chat List Slim Scroll
    // ============================================================== 
        

        if ($('.chat-list').length) {
            $('.chat-list').slimScroll({
            color: 'false',
            width: '100%'


        });
    }
	
     // ============================================================== 
    // Add services block in form
    // ============================================================== 

		$("#addservicesblock").click(function(e){
			e.preventDefault();
			
			var thisbtn = $(this);
			var ajaxurl = thisbtn.data("ajax_url");
			var counter = thisbtn.data("counter");
			
			
			$.ajax({
				type: "GET",
				dataType: "html",
				url: ajaxurl,
				data: {counter: +counter+1},
				success: function (data) {
					console.log(data);
					thisbtn.data("counter", counter+1);
					$(".services_block").append(data);
				},

			});
		});
	
	// ============================================================== 
    // Calculate Invoice price
    // ============================================================== 
	$(document).on("blur", ".inv_rate, .inv_qty", function(){
		var parentid = $(this).parents(".card").attr("id");
		
		var inv_qty = parseInt($("#rate-"+parentid).val());
		var inv_rate = parseInt($("#sqty-"+parentid).val());
		
		var tax_value_input = $("#tax_amount-"+parentid);
		var total_amount_input = $("#total_amount-"+parentid);
		var tax_percent = $(".tax_value").val();
		
		var amount = inv_qty * inv_rate;
		var tax_amount = amount * tax_percent;
		var total_amount = tax_amount + amount;
		tax_value_input.val(tax_amount);
		total_amount_input.val(total_amount);
		
		var  tot = 0;
		
		$( ".inv_total_amount" ).each(function() {
			tot = tot + parseInt($(this).val());
		});
		
		$("#grand_total").val(tot);
	});
	
	
	
	// ============================================================== 
    // Calculate Cleaning washing drops
    // ============================================================== 
		$("#cleaningdrops, #cleaningTargetDrops").blur(function () {
			var cleaningdrops = parseInt($("#cleaningdrops").val());
			var cleaningTargetDrops = parseInt($("#cleaningTargetDrops").val());
			if (cleaningTargetDrops <= cleaningdrops) {
				var totaldrops = Math.ceil(cleaningdrops / cleaningTargetDrops);

				$("#TotalcleaningDrops").val(totaldrops);
			} else {
				$("#TotalcleaningDrops").val("Target drops are greater than cleaning drops.");
			}
		});
		$("#washingdrops, #washingTargetDrops").blur(function () {
			var washingdrops = parseInt($("#washingdrops").val());
			var washingTargetDrops = parseInt($("#washingTargetDrops").val());
			if (washingTargetDrops <= washingdrops) {
				var totaldrops = Math.ceil(washingdrops / washingTargetDrops);

				$("#TotalWashingDrops").val(totaldrops);
			} else {
				$("#TotalWashingDrops").val("Target drops are greater than washing drops.");
			}
		});
	
	
    // ============================================================== 
    // jquery upload script
    // ============================================================== 	
//	$('#before-work-frm').fileupload();
	var ajaxurl = $("#beforeworkajaxurl").val();
	var reportid = $("#reportId").val();
	
	
	$("#beforeWorkUploader").uploadFile({
	url:ajaxurl,
	fileName:"beforework",
	formData: {"reportId": reportid, "type": "before"},
		returnType: "json"
	});
	
	$("#duringWorkUploader").uploadFile({
	url:ajaxurl,
	fileName:"duringwork",
	formData: {"reportId": reportid, "type": "during"},
		returnType: "json"
	});
	
	$("#afterWorkUploader").uploadFile({
	url:ajaxurl,
	fileName:"afterwork",
	formData: {"reportId": reportid, "type": "after"},
		returnType: "json"
	});
	
	$("#brokenWorkUploader").uploadFile({
	url:ajaxurl,
	fileName:"brokenwork",
	formData: {"reportId": reportid, "type": "broken"},
		returnType: "json"
	});
	
    // ============================================================== 
    // date time picker
    // ==============================================================
	   if ($("#datetimepicker7").length) {
        $(function() {
            $('#datetimepicker7').datetimepicker({
                icons: {
                    time: "far fa-clock",
                    date: "fa fa-calendar-alt",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
				format: 'L'
            });
            $('#datetimepicker8').datetimepicker({
                useCurrent: false,
                icons: {
                    time: "far fa-clock",
                    date: "fa fa-calendar-alt",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
				format: 'L'
            });
            $("#datetimepicker7").on("change.datetimepicker", function(e) {
                $('#datetimepicker8').datetimepicker('minDate', e.date);
            });
            $("#datetimepicker8").on("change.datetimepicker", function(e) {
                $('#datetimepicker7').datetimepicker('maxDate', e.date);
            });
        });
    }

	
    // ============================================================== 
    // dropzone script
    // ============================================================== 

 //     if ($('.dz-clickable').length) {
 //            $(".dz-clickable").dropzone({ url: "/file/post" });
 // }
	
	// Dropzone has been added as a global variable.
//  const dropzone = new Dropzone("div.my-dropzone", { url: "/file/post" });
//	Dropzone.options.myDropzone = {
//	};

}); // AND OF JQUERY


// $(function() {
//     "use strict";


    

   // var monkeyList = new List('test-list', {
    //    valueNames: ['name']

     // });
  // var monkeyList = new List('test-list-2', {
    //    valueNames: ['name']

   // });



   
   

// });