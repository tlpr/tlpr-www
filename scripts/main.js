// @license magnet:?xt=urn:btih:0b31508aeb0634b347b8270c7bee4d411b5d4109&dn=agpl-3.0.txt AGPL-v3-only

window.addEventListener("load", function(){
	
	// Show/Hide player
	var playercontainer = document.getElementById("playercontainer");
	
	var hide_button = document.getElementById("hideplayer");
	var show_button = document.getElementById("showplayer");

	// display: none; by default to hide button to users with JS disabled.
	hide_button.style.display = "block";
	document.getElementById("playbackinformation").style.display = "block";
	
	hide_button.addEventListener("click", function(){ 

		playercontainer.style.display = "none";
		show_button.style.display = "block";
		player_hidden = true;

	}, false);
	
	show_button.addEventListener("click", function(){
	
			playercontainer.style.display = "block";
			show_button.style.display = "none";
			player_hidden = false;
	
	}, false);

	
	
	playback_information_div = document.getElementById("playbackinformation");
	
	function getSongInfo() {
		var request = new XMLHttpRequest();
		request.open('GET', window.location.href + "media/song_raw.php?source_id=6", true);
		request.send(null);
		request.onreadystatechange = function () {
			if (request.readyState === 4 && request.status === 200) {
				var type = request.getResponseHeader('Content-Type');
				if (type.indexOf("text") !== 1) {
					playback_information_div.innerHTML = "<P>" + request.responseText + "</P>";
				}
			}
		}
	}
	
	getSongInfo();
	
	
	
}, false);

// @license-end
