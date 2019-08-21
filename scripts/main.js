// @license magnet:?xt=urn:btih:0b31508aeb0634b347b8270c7bee4d411b5d4109&dn=agpl-3.0.txt AGPL-v3-only

window.addEventListener("load", function(){
	
	// Show/Hide player
	var playercontainer = document.getElementById("playercontainer");
	
	var hide_button = document.getElementById("hideplayer");
	var show_button = document.getElementById("showplayer");

	// display: none; by default to hide button to users with JS disabled.
	hide_button.style.display = "block";
	document.getElementById("playbackinformation").style.display = "block";
	document.getElementById("noscriptwarning").style.display = "none";
	
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
	
	function getSongInfo(source_id=0) {
		var request = new XMLHttpRequest();
		request.open('GET', window.location.href + "media/song_raw.php?source_id=" + source_id, true);
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
	
	if (!Array.prototype.forEach)
	{
	  Array.prototype.forEach = function(fun)
	  {
		var len = this.length;
		if (typeof fun != "function")
		  throw new TypeError();

		var thisp = arguments[1];
		for (var i = 0; i < len; i++)
		{
		  if (i in this)
			fun.call(thisp, this[i], i, this);
		}
	  };
	}
	
	/* Multiple streams */
	document.getElementById("stream-0").style.display = "inline-block";
	document.getElementById("streamswitcher-0").style.background = "black";
	
	var tabs = document.getElementsByClassName("switchstream");
	var streams = document.getElementsByClassName("player");
	
	[].forEach.call(tabs, function(tab){
	
		tab.addEventListener("click", function(){
		
			[].forEach.call(tabs, function(t){ t.style.background = "#333333"; });
			tab.style.background = "black";
			[].forEach.call(streams, function(s){ s.style.display = "none"; });
			stream_id = tab.getAttribute("id").slice(-1);
			document.getElementById("stream-" + stream_id).style.display = "inline-block";
			getSongInfo(stream_id);
		
		}, false);
	
	});
	
}, false);

// @license-end
