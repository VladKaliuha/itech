$(document).ready(function(){
	$('#submit').click(function(){
		$.ajax({
			type: 'POST',
			url:'post_league_games.php',
			data:'lg='+$("#league").val(),
			success:function(msg){
				$('#result').html(msg);
			}
		});
	});
});