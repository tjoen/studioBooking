$(document).ready(function(){
	$('.button').click(function(){
		$.post("ajax.php", {
			user: 'Martin',
			room: 'Studio1',
			startTime: '2012-11-20 ' + $('#startTime').val(),
			endTime: '2012-11-20 ' + $('#endTime').val(),
			stage: $(this).attr('value')
		},
		function(data) {
			alert(data);
		});
	})
})