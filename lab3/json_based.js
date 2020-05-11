$(document).ready(function(){
	$('#submit').click(function(){
		$.ajax({
			type: 'POST',
			url:'post_date_games.php',
			data:{
				'startD': $("#startD").val(),
				'endD': $("#endD").val()
			},
			success:function(msg){
				$('#result').html('');
				for(var i =0;i<msg.length;i++){
					$('#result').append('id: '+msg[i].id+'<br>');
					$('#result').append('date: '+msg[i].date+'<br>');
					$('#result').append('place: '+msg[i].place+'<br>');
					$('#result').append('score: '+msg[i].score+'<br>');
					$('#result').append('team1_id: '+msg[i].team1_id+'<br>');
					$('#result').append('team2_id: '+msg[i].team2_id+'<br>');
				}
			}
		});
	});
});