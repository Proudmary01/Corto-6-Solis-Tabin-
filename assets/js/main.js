$(function(){
    $('#loadURL').on('click', function(){
        $('#latitud').val('14.605841');
        $('#longitud').val('-90.473829');
    });
    $('#loadUSAC').on('click', function(){
        $('#latitud').val('14.588188');
        $('#longitud').val('-90.551652');
    });
    $('#loadUFM').on('click', function(){
        $('#latitud').val('14.606868');
        $('#longitud').val('-90.505406');
    });
    $('#loadUVG').on('click', function(){
        $('#latitud').val('14.603762');
        $('#longitud').val('-90.489248');
	});
});



$("#envioData").on("submit", function(event) {
	event.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form);

	var dataObj = {
		lat: $("input[id='latitud']", _form).val(),
		lng: $("input[id='longitud']", _form).val()
	};

	// Assuming the code gets this far, we can start the ajax process
	_error.hide();

	$.ajax({
		type: 'POST',
		url: 'ajax/map.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is 
		if(data.redirect !== undefined) {
			window.location = data.redirect;
		} else if(data.error !== undefined) {
			_error
				.text(data.error)
				.show();
		}
	})
	.fail(function ajaxFailed(e) {
		_error
			.text("Please enter a valid lat / lng!")
			.show();
		return false;
	})
	.always(function ajaxAlwaysDoThis(data) {
		// Always do
		console.log('Always');
	})

	return false;
});
