$(document).ready(function() {
 
		// var column_height = $(".content").height();
		// 		column_height = column_height + "px";
		// 		$(".menu-panel").css("height",column_height);
		
        // Store variables
 
        var accordion_head = $('.accordion > li > a'),
            accordion_body = $('.accordion li > .sub-menu');
 
        // Open the first tab on load
		//accordion_head.first().addClass('active').next().slideDown('normal');
		
		//Open active tab onload
		$('.accordion > li > a.active').next().slideDown('normal');
 
        // Click function
        accordion_head.on('click', function(event) {
 
            // Disable header links
 
            event.preventDefault();
 
            // Show and hide the tabs on click
 
            if ($(this).attr('class') != 'active'){
                accordion_body.slideUp('normal');
                $(this).next().stop(true,true).slideToggle('normal');
                accordion_head.removeClass('active');
                $(this).addClass('active');
            }
 
        });
 

	//Live edit for gallery
	$(".editbox").hide();
	
	$(".edit_name").click(function(){
		var ID=$(this).attr('id');
		$("#image_"+ID).hide();
		$("#image_input_"+ID).show();
	}).change(function(){
		var ID=$(this).attr('id');
		var last=$("#image_input_"+ID).val();
		var dataString = 'id='+ ID +'&name='+last;
	//$("#image_"+ID).html('edit'); // Loading image

	if(last.length > 0)
	{
		$.ajax({
			type: "POST",
			url: "/adcms/admin/images/ajax_edit",
			data: dataString,
			cache: false,
			success: function(html){
				$("#image_"+ID).html(last);
		}});
	}else{
		alert('Enter something.');
	}

	});

	// Edit input box click action
	$(".editbox").mouseup(function() 
	{
		return false
	});

	// Outside click action
	$(document).mouseup(function()
	{
		$(".editbox").hide();
		$(".text").show();
	});

});