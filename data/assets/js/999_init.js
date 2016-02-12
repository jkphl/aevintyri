$(document).ready(function(){
	
	// Init foundation
	$(document).foundation();
	
	// BaseURL
	if (!window.location.origin)
	     window.location.origin = window.location.protocol + '//' + window.location.host;
	
	// Datepicker @ https://github.com/xdan/datetimepicker
    var $datetimepickers 	= $('input.datetimepicker');
    if($datetimepickers.length) {
    	$datetimepickers.datetimepicker({
		  format: 			'd.m.Y H:i',
		  dayOfWeekStart:	1,
		  lang: 			'en',
		  step: 			30,
		  mask: 			false,
		  validateOnBlur: 	true,
		  todayButton:		true
    	});
    }
    
    $('tr[data-onclick]').each(function() {
    	var that			= $(this);
    	that.click(function() {
    		document.location	= that.attr('data-onclick');
    	});
    });
    
    $('a[data-confirm]').each(function() {
    	var that			= $(this);
    	this.onclick		= function() { return confirm(that.attr('data-confirm')); }
    });
});