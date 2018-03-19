$(".admin-panel").fancybox({
		width	: '99%',
		height	: '80%',
		padding		: 0,
		scrolling 	: 'auto',
		preload   	: true,
		fitToView	: true,
		autoSize	: true,
		closeClick	: false,
		openEasing	: 'swing',
		closeEasing	: 'swing',
		beforeClose : function (){
		    var response = confirm("Are you sure that you want to close the administrator panel window?");
		
			if(response == true){
		  		return true;
			}else{
		  		return false;
			}
			
        },
		afterClose : function (){
			window.location.reload(true);
		}
});