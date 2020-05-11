$(document).ready(function(){
	$('#submit').click(function(){
		$.ajax({
			type: 'POST',
			url:'post_player_games.php',
			data:'plr='+$("#plr").val(),
			success:function(msg){
				var games = msg.documentElement.children;
				var result = '';
				for(var i=0; i<games.length; i++){
					var fields = games[i].children;
					for(var j=0; j<fields.length; j++){
						result+=fields[j].localName + ' : ' + fields[j].innerHTML;
						result+='<br>';
					}
					result+='<br>';
				}
				$('#result').html(result);
			}
		});
	});
});