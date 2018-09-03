<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Song History</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/main.css" type="text/css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  </head>
  <body>
		<!-- Modal -->
	<div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">About</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			This page is designed to help you keep track of, well, tracks. Enter a track, artist, and album. Then press enter and see your entry appear at the bottom of the list! If you want to copy over what you played to a post on the website do this: Press "±Times" at the bottom of the page (And "±Albums" if you wish), drag select the entries you want to copy, press Ctrl-C, and then click in the blog textbox and press Ctrl-V. You can then toggle times back on or not. Links to the automation twitter and the website are also provided. DO NOT CLOSE THE TAB. The whole point is to leave it up so the next person can see what you played.<br><br>Developed by Robert Burton
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>

	
	<h1>Song History</h1>
	
	<div class="container-fluid">
	  <table class="table table-fixed table-striped">
		<thead>
		  <form novalidate id="trackForm">
				<tr>
				  <div class="row-eq-height">
					  <th class="col-3 myField vcenter">
						<div class="form-group">
							<input type="text" class="form-control" id="inputTrack" placeholder="Track" maxlength="60">
						</div>
					  </th>
					  <th class="col-3 myField vcenter">
						<div class="form-group">
							<input type="text" class="form-control" id="inputArtist" placeholder="Artist" maxlength="60">
						</div>
					  </th>
					  <th class="col-3 myField vcenter">
						<div class="form-group">
							<input type="text" class="form-control" id="inputAlbum" placeholder="Album" maxlength="60">
						</div>
					  </th>
					  <th class="col-2 myField vcenter">
						<div class="form-check vcenter">
					<input class="form-check-input vcenter" type="checkbox" value="" id="defaultCheck1" style="width:30px; height:30px;">
					<label class="form-check-label vcenter" style="margin-left: 18px;"for="defaultCheck1">Recent</label>
					</div>
					</th>
					  <th class="col-1 myField vcenter">
						<button type="submit" class="btn btn-primary">Enter</button>
					  </th>
				  </div>
				</tr>
		  </form>
		  <div class="row">
			  <tr class="topField">
				<th class="col-3">T r a c k</th>
				<th class="col-3">A r t i s t</th>
				<th class="col-3">A l b u m</th>
				<th class="col-1" id="playbox">Recent</th>
				<th class="col-2">T i m e</th>
			  </tr>
		  </div>
		</thead>
		<tbody id="tableBody">
		  <!--<tr>
			<td class="col-3"><span>Placeholder</span><span class="hideme"> - </span></td>
			<td class="col-3"><span>John Cage</span></td>
			<td class="col-3"><span class="hideme"> - </span><span>That Album</span></td>
			<td class="col-3"><span class="hideme"> - </span>3:00</td>
		  </tr>
		  <tr>
			<td class="col-3">Placeholder</td>
			<td class="col-3">John Cage</td>
			<td class="col-3">That Album</td>
			<td class="col-3">3:00</td>
		  </tr>-->
		
		</tbody>
	  </table>
	  <div class="span12 text-center">
		<button type="button" id="showTime" class="btn btn-success">±Times</button>
		<button type="button" id="showAlbum" class="btn btn-success">±Albums</button>
		<button type="button" id="otto" class="btn btn-success">Otto</button>
		<button type="button" id="webs" class="btn btn-success">Website</button>
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#aboutModal">
  			About
		</button>
		<button type="button" id="grabrows" class="btn btn-success">Grab Rows</button>
	  </div>
	  
	  
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/app.js"></script>
  </body>
</html>
