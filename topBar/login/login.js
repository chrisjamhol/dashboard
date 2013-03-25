$('#loginTrigger').unbind('click').click(function(){
	if($('#loginHelper').is(":visible")){$('#loginHelper').hide();}else{$('#loginHelper').show();}
});