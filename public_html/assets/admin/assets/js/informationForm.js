$(document).ready(function(){
	$('.note-editable').keyup(function(event) {
		$('input[name=content]').val($('.note-editable').html());
		console.log($('input[name=content]').val());
	});

	$("form").submit(function(e) {
     var self = this;
     e.preventDefault();
	$('input[name=content]').val($('.note-editable').html());
    self.submit(); 
});
});