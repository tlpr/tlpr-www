// @license magnet:?xt=urn:btih:0b31508aeb0634b347b8270c7bee4d411b5d4109&dn=agpl-3.0.txt AGPL-v3-only
/*

	This file is a part of player module on
	The Las Pegasus Radio website.
	All code included in this file is licensed
	under the GNU AGPL-3.0-only license.
	https://github.com/tlpr/www

*/


window.addEventListener("load", function() {
	
	let player = document.getElementById("player");
	if ( player === null )
	{
		console.log("Uninitialized player, please insert <div id=\"player\"></div> somewhere first.");
		return;
	}
	
	var streams = [
	
		{
			"url": "http://127.0.0.1:8001/stream.mp3", // Stream URL
			"type": "audio/mpeg",
			"label": "Main Stream", // Tab label
			"info": "" // Currently played audio
		},
		
		{
			"url": "http://127.0.0.1:8001/main.opus", // Stream URL
			"type": "audio/mpeg",
			"label": "Secondary Stream", // Tab label
			"info": "" // Currently played audio
		}
	
	];
	
	
	
	// Tabs
	for ( i = 0; i < streams.length; i++ )
	{
	
		var tab_button = document.createElement("div");
		tab_button.setAttribute( "id", "tab-" + i ); // For JS
		tab_button.setAttribute( "class", "tab" ); // For CSS
		tab_button.appendChild( document.createTextNode(streams[i].label) ); // Set text inside
		
		tab_button.addEventListener("click", function() {
			
			if ( this.getAttribute("class") === "tab active_tab" )
				return;
			
			var id = this.getAttribute("id").split("-")[1];
			
			// Deactivate every other tab
			for ( j = 0; j < streams.length; j++ )
			{
				document.getElementById("tab-" + j).setAttribute("class", "tab");
				
				var tmp_loop_player = document.getElementById("player-" + j);
				var tmp_player_id = tmp_loop_player.getAttribute("id").split("-")[1];
				
				if ( tmp_player_id !== id )
					tmp_loop_player.style.display = "none";
			}
			
			this.setAttribute("class", "tab active_tab");
			
			document.getElementById("player-" + id).style.display = "block";
			
		});
		
		player.appendChild(tab_button);
	
	}
	
	// Streams
	for ( i = 0; i < streams.length; i++ )
	{
	
		var stream_content = document.createElement("div");
		stream_content.setAttribute( "id", "player-" + i );
		stream_content.setAttribute( "class", "playerarea" );
		stream_content.style.display = "none";
		
		var audio_element = document.createElement("audio");
		audio_element.setAttribute("controls", "yes");
		audio_element.setAttribute("preload", "none");
		audio_element.setAttribute("src", streams[i].url);
		audio_element.setAttribute("type", streams[i].type);
		audio_element.volume = "0.25";
		
		audio_element.style.display = "none";
		
		var audio_element_play_btn = document.createElement("button");
		audio_element_play_btn.setAttribute("class", "playpause_button");
		audio_element_play_btn.innerHTML = "Play";
		audio_element_play_btn.addEventListener("click", function() {
			
			if ( this.previousElementSibling.paused )
			{
				this.previousElementSibling.play();
				if ( !this.previousElementSibling.paused )
					this.innerHTML = "Pause";
			}
			else
			{
				this.previousElementSibling.pause();
				this.previousElementSibling.src = this.previousElementSibling.src;
				this.innerHTML = "Play";
			}
		
		});
		
		var audio_element_volume = document.createElement("input");
		audio_element_volume.setAttribute("type", "range");
		audio_element_volume.setAttribute("min", "1");
		audio_element_volume.setAttribute("max", "100");
		audio_element_volume.setAttribute("value", "25");
		audio_element_volume.setAttribute("class", "volume_slider");
		
		audio_element_volume.addEventListener("input", function() {
		
			var id = this.parentElement.getAttribute("id").split("-")[1];
			var audio_element = document.getElementById("player-" + id).firstChild;
			audio_element.volume = (this.value / 100);
			
		});
		
		
		stream_content.appendChild(audio_element);
		stream_content.appendChild(audio_element_play_btn);
		stream_content.appendChild(audio_element_volume);
		
		player.appendChild(stream_content);
	
	}
		 
});
