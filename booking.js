$(document).ready(function(){
	$('#addBooking').click(function(){
		$.post("ajax.php", {
			user: 'Martin',
			room: 'Studio1',
			startTime: '2012-11-20 ' + $('#startTime').val(),
			endTime: '2012-11-20 ' + $('#endTime').val(),
		},
		function(data) {
			alert(data);
		});
	})
})
