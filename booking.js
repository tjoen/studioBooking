$(document).ready(function(){
	$('#addBooking').click(function(){
		$.post("ajax.php", {
			user: 'Martin',
			room: 'Studio1',
			startTime: '2012-11-20 ' + $('#startTime').val(),
			endTime: '2012-11-20 ' + $('#endTime').val(),
		},
		function(data) {
			if (data==0) {
				$('#addBooking').val('Confirm');
				$('input').css('background-color','green');
				$('input').css('color','white');
			} else if (data=="done") {
				alert('Entry Confirmed');
				$('input').css('background-color','white');
				$('input').css('color','green');				
				$('#addBooking').val('Verify Availability');
			} else {
				alert('Clashed with ' + data + 'Events');
				$('input').css('background-color','red');
				$('input').css('color','white');
				$('#addBooking').val('Verify Availability');
			}
		});
	})
})
