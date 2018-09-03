var main = function(){
	//Sets focus to the track input field
	$(function() {
		$("#inputTrack").focus();
	});

	//Calculates table height from window height
	var tableBody = document.getElementById('tableBody');
	console.log(tableBody.style);
	var tb = $('#tableBody');
	console.log($(window).height())
	tb.height($(window).height() - 184);
	tableBody.scrollTop = tableBody.scrollHeight;
	
	//Resizes table on window resize
	var resizeListener;
	$(window).resize(function(){
		clearTimeout(resizeListener);
		  resizeListener = setTimeout(function(){
			withResize();
		  },200);
	});

	//Disables using enter to submit
	$('.form-control, .form-check-input').on('keyup keypress', function(e) {
		var keyCode = e.keyCode || e.which;
		if (keyCode === 13) {
			e.preventDefault();
			return false;
		}
	});

	//Add a new song to the database.
	$("#trackForm").on("submit", function(event) {
		event.preventDefault();
		$(".timeLine").removeClass("unselectable");
		$(".albumLine").removeClass("unselectable");

		var inputTrack = document.getElementById('inputTrack');
		var inputArtist = document.getElementById('inputArtist');
		var inputAlbum = document.getElementById('inputAlbum');
		var checkboxx = document.getElementById('defaultCheck1');
		var checkboxxChar = '✖';
		if(checkboxx.checked) {
			checkboxxChar = '✔';
		}


		var timeStamp = new Date();
		if(inputTrack.value.toString()==="") {
			inputTrack.value = "N/A";
		};
		if(inputArtist.value.toString()==="") {
			inputArtist.value = "N/A";
		};
		if(inputAlbum.value.toString()==="") {
			inputAlbum.value = "N/A";
		};
		if(inputTrack.value==="N/A" && inputArtist.value==="N/A" && inputAlbum.value==="N/A") {
			console.log("Nothing in the fields");
		} else {
			console.log(inputArtist.value);
			html_to_insert = '<tr><td class="col-3"><span>'+inputTrack.value.toString()
				+'</span></td><td class="col-3"><span>'+inputArtist.value.toString()
				+'</span></td><td class="col-3 albumLine"><span>'+inputAlbum.value.toString()
				+'</span></td><td class="col-1"><span>'
				+checkboxxChar
				+'</span></td><td class="col-2 timeLine">'
				+timeStamp.toLocaleTimeString('en-US', { hour12: false });
				+'</td></tr>'
			document.getElementById('tableBody').insertAdjacentHTML('beforeend', html_to_insert);
			
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if(this.readyState==4 && this.status ==200) {
					//document.getElementById("playbox").innerHTML = this.responseText;
					console.log(this.responseText);
				}
			}
			
			var str = "track="+encodeURIComponent(inputTrack.value)+"&artist="+encodeURI(inputArtist.value)+"&album="+encodeURI(inputAlbum.value)+"&recent="+encodeURI(checkboxx.checked);
			
			xmlhttp.open("GET","getwords.php?"+str,true);
			xmlhttp.send();
			
			tableBody.scrollTop = tableBody.scrollHeight;
			
			$(".timeLine").removeClass("unselectable");
			
		}
		document.getElementById("trackForm").reset();
			$("#inputTrack").focus();
	});

	//Grab Rows from the DB
	document.getElementById("grabrows").addEventListener("click", function() {
		console.log("Success! grab them rowz");

		var theresponse = 0;

		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if(this.readyState==4 && this.status ==200) {
				//document.getElementById("playbox").innerHTML = this.responseText;
				console.log(this.response);
				console.log(this.response[0]["track"]);

				var date_parse = new Date(this.response[0]["ts"]);

				var checkboxxChar = '✖';
				if(this.response[0]["recent"]==="1") {
					checkboxxChar = '✔';
				}

				html_to_insert = '<tr><td class="col-3"><span>'+this.response[0]["track"]
					+'</span></td><td class="col-3"><span>'+this.response[0]["artist"]
					+'</span></td><td class="col-3 albumLine"><span>'+this.response[0]["album"]
					+'</span></td><td class="col-1"><span>'
					+checkboxxChar
					+'</span></td><td class="col-2 timeLine">'
					+date_parse.toLocaleTimeString('en-US', { hour12: false })
					+'</td></tr>';

				//html_to_insert = '';
				document.getElementById('tableBody').insertAdjacentHTML('beforeend', html_to_insert);
			}
		}

		xmlhttp.open("GET","grabrows.php",true);
		xmlhttp.responseType = 'json';
		xmlhttp.send();
	});

	//Adds popup to prevent accidental tab closure
	window.addEventListener("beforeunload", function (e) {
		var confirmationMessage = 'It looks like you have been editing something. '
								+ 'If you leave before saving, your changes will be lost.';

		(e || window.event).returnValue = confirmationMessage; //Gecko + IE
		return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
	});

	//Hide Times
	document.getElementById("showTime").addEventListener("click", function() {
		$(".timeLine").toggleClass("unselectable");
	});

	//Hide Album
	document.getElementById("showAlbum").addEventListener("click", function() {
		$(".albumLine").toggleClass("unselectable");
	});

	//Open Otto
	document.getElementById("otto").addEventListener("click", function() {
		var win = window.open("https://twitter.com/roboverlord", '_blank');
		win.focus();
	});

	//Open WHRW Website
	document.getElementById("webs").addEventListener("click", function() {
		var win = window.open("http://www.whrwfm.org/", '_blank');
		win.focus();
	});
};

var withResize = function(){
	$('#tableBody').height($(window).height() - 184);
	console.log("triggeredd");
}

$(document).ready(function() {
	console.log( "ready!" );
	main();
});