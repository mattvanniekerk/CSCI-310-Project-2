<?php 

	// Write your script up here
	// save important data to variables 


	$q = $_GET["query"];

	// get data and save it in $papers
	$papers = [
		"paper1" => [
			"name"=> "Networks",
			"author"=> "Halfond"
		],
		"paper2" => [
			"name"=> "Compilers",
			"author"=> "Shindler"
		]
	];

?>

<html>
    <head>
        <title>IEEE Cloud</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="scripts/helper.js"></script>
        <script src="scripts/postImageToFacebook.js"></script>
        <script src="https://d3js.org/d3.v4.min.js"></script>
        <script src="scripts/d3.layout.cloud.js"></script>
        <script type="text/javascript" src="http://canvg.github.io/canvg/rgbcolor.js"></script> 
        <script type="text/javascript" src="http://canvg.github.io/canvg/StackBlur.js"></script>
        <script type="text/javascript" src="http://canvg.github.io/canvg/canvg.js"></script> 
        <script>
			window.papers = <?= json_encode($papers) ?>
		</script>

    </head>
    <body>
        <div id="page">
 
			<div id="wordCloudPage">
			    
			    <h1 id="wordCloudTitle">Word Cloud Page for <?= $q ?></h1>
			    <ul>
			    	<?php for ($i=1; $i <= 10; $i++) { ?>
			    		<li><a href="/project/pages/paper_list.php?query=<?= $q ?>&word=word<?= $i ?>">word<?= $i ?></a></li>
			    	<?php } ?>
			    </ul>
				<div id="wordCloud">
					<div id="wordCloudLoading" style="display:none"><img src="components/loading.gif" width=100 height=100></div>
					<svg id="wordCloudSVG"></svg>
					<canvas id="lyricsCloudCanvas" width="1200" height="500" style="display:none"></canvas>
			    </div>
			    
				<div id="searchControls">
					<div id="paperSearchBar"></div>
					
					<input type="button" id="search" class="button"  value="Search"  disabled="true" />
					
					<input type="button" id="add"  class="button" value="Add" disabled="true" />
					
					<input type="button" id="share" class="button" value="Share" disabled="true" />
			       
			        <input type="button" id="download" class="button" value="Download Image" />
			    </div>
			    
			</div>
		</div>
	</body>

	<style>

	#wordCloudPage {
		text-align: center;
		margin: auto;
		margin-top: 50px;
	}

	#wordCloud {
		margin: auto;
		width: 1200;
		height: 500;
		border: 2px black solid;
		background-color: white;

		display: table
	}

	#wordCloudLoading {

		vertical-align: middle;
		display: table-cell;
	}

	#searchControls {
		width: 33%;
		margin: auto;
		padding: 1em;
	}

	#search {
		float: left;
		width: 32%;
	}

	#add {
		width: 32%;
	}

	#share {
		float: right;
		width: 32%;
	}

	</style>


	<script>
			
		///
		//FUNCTIONS:
		///		
		
		// if the word is usable, return a standardized (lowercase) verison of it
		// if not, return false
		function validateWord(word) {
			word = word.toLowerCase();
			if (word.length < 3) {
				return false;
			}
			
			//exclude commonly used words
			
			var common = ["the", "be", "to", "of", "and", "a", "in", "not", 
				"that", "it", "for", "on", "as", "do", "at", "this", 
				"but", "by", "from", "or", "an", "so", "if", "into", 
				"its", "it's", "about", "there", "their", "i'm", "i'll", 
				"you", "you're", "are", "am", "i", "my", "your", "that's", 
				"is", "than", "then", "what", "when", "was", "did", 
				"too", "there's", "hey", "ooh", "who", "been", "i've", 
				"you'll", "we'll", "she'll", "he'll", "she's", "he's", 
				"you've", "have", "with", "that's", "yeah", "ooh", "aah", 
				"we're", "she", "he", "they", "we", "gonna", "wanna", 
				"just", "hah", "i'd", "you'd", "our", "your", "because", 
				"cuz", "has", "br", "quot", "amp"];		

			if(common.indexOf(word) > -1) {
				return false;
			}

			
			return word;
		}
		
		// Generate a lyrics cloud from the 'songs' variable.
		// Update the SVG and Canvas
		function generateLyricsCloud() {
					
			// count words
			var words = {};
			$.each(songs, function(index, song) { // foreach song
				var songWords = song.lyrics.match(/\b[a-zA-Z']+\b/g);
				$.each(songWords, function(index, word) { // foreach word
					word = validateWord(word);
					if (word) { // if this is a word to include
						words[word] = words[word] ? words[word] + 1 : 1;
					}
				});
			});
			
			
			words = Object.keys(words).map(function(word) {
				return {text: word, size: words[word]};
			});
				
			// sort words
			words = words.sort(function(a, b) {
				return b.size - a.size;
			});
			
			// only want 250 most frequent words
			words = words.slice(0, 250);
			
			var maxSize = 60;
			var minSize = 14;
			
			var currentMax = words[0].size;
			var currentMin = words[words.length-1].size;

			$.each(words, function(key, word) {
				// scale the sizes between maxSize and minSize;
				words[key].size = (word.size - currentMin) / (currentMax - currentMin) * (maxSize - minSize) + minSize;
			});
			
			// these colors will be chosen from randomly
			var colors = ["red", "blue", "green", "orange", "purple"];
			
		    d3.layout.cloud().size([1200, 500])
			  .words(words)
			  .padding(5) //padding between words
			  .rotate(function() { return 0; }) //no word rotation
			  .spiral("rectangular") //rectangular shape
			  .fontSize(function(d) { return d.size; }) //font size
			  .on("end", function (words) { //when the cloud is layed out:
			  
					// draw in the svg tag
					  d3.select("#wordCloudSVG")
						.attr("width", 1200)
						.attr("height", 500)
					  .append("g")
						.attr("transform", "translate(600,250)")
					  .selectAll("text")
						.data(words)
					  .enter().append("text")
						.style("font-size", function(d) { return d.size + "px"; })
						.style("font-family", "serif")
						.style("fill", function(d, i) { return colors[Math.floor(Math.random() * colors.length)]; })
						.attr("text-anchor", "middle")
						.attr("transform", function(d) {
						  return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
						})
						.text(function(d) { return d.text; })
						.on("click", function(d, i) {
							word = d.text;
							loadPage("paperList");
						});

					$("#wordCloudLoading").hide(0);
					$("#wordCloudSVG").show(0);
			
					// draw in the canvas tag
					canvg('lyricsCloudCanvas', $("#wordCloudSVG").html());
			
					$("#share").removeProp("disabled");
			  })
			  .start();
		}
		
		// call this function when the page first loads, then whenever the artist list changes
		function setTitle() {
			// Set the title (of document and header)
			var title = ""
			$.each(artists, function(index, artist) {
				title += ", " + artist.name;
			});
			title = title.substring(2);
			
			document.title = title;
			$("#wordCloudTitle").text(title);
		}
		
		// Call this function when the page first loads and then whenever an artist is searched/added
		function queryArtists(artistsToQuery) {
		
			setTitle();
			
			$("#wordCloudSVG").hide(0);
			$("#wordCloudSVG").html("");
			$("#wordCloudLoading").show(0);
			$("#share").attr("disabled", true);

			// Make the parameter object
					
			var ids = [];
			$.each(artistsToQuery, function(key, value) {
				ids.push(value.chartLyricsID);
			})
				
			// Load the lyrics and generate the word cloud
			$.ajax({ // Load artist lyrics
				url: "ajax/artistSongs.php",
				data: {ids: ids},
				dataType: "json",
				success: function(data) {
					
					// save the results
					$.each(data, function(index, song) {
						songs.push(song);
					})
					
					generateLyricsCloud()
				}
			});
		}
		
		// Call this function when the page first loads and then whenever an artist searched
		function searchArtists(a) {
			
			artists = a;
			songs = [];
			
			queryArtists(a);
		}

		// Call this function whenever an artist is added
		function addArtist(a) {
		
			// Don't add an artist that we already have
			if ($.inArray(a, artists) >= 0) {
				return;
			}
		
			artists.push(a);
			
			queryArtists([a]);
		}
		
		//
		// Post the image to Facebook!
		//
		// @param authToken: the FB authToken to use
		//
		function shareWordCloud(authToken) {
			
			var c = document.getElementById('lyricsCloudCanvas').toDataURL('image/png');
			var encodedPng = c.substring(c.indexOf(',')+1,c.length);
			var imageData = Base64Binary.decode(encodedPng);
			
			var caption = 'I used Lyrics Cloud to make this cloud for the artist(s): ' + $("#wordCloudTitle").text() + "!";
			
			postImageToFacebook(authToken, 'lyricsCloud.png', 'image/png', caption, imageData);
			
			FB.logout(); // log the app out of Facebook
		}
		
		///
		//ON LOAD:
		///
		
		// Initialize the lyrics cloud
		if (songs.length > 0) { // we're coming back to this page
			setTitle();
			generateLyricsCloud();
		} else { // first time to this page
			searchArtists(artists);
		}
		
		// Set up the Artist Search Bar
		$("#paperSearchBar")
			.load("components/paperSearchBar.html")
			.on("yesSelection", function() {		
				$("#search").removeProp("disabled");
				$("#add").removeProp("disabled");
			})
			.on("noSelection", function() {
				$("#search").attr("disabled", true);
				$("#add").attr("disabled", true);
			});

		// Set up the Search Button
		$('#search').click(function() {
			
			$("#paperSearchBar").trigger('clear');
			
			var artistID = $("#paperSearchBar").attr("value");
			searchArtists([allArtists[artistID]]);
		});
		
		// Set up the Add Button
		$('#add').click(function() {
			
			$("#paperSearchBar").trigger('clear');
			
			var artistID = $("#paperSearchBar").attr("value");
			addArtist(allArtists[artistID]);
		});

		
		// Set up the Share Button
		$("#share").click(function() {
					
			FB.getLoginStatus(function(response) { // Check if the user is already logged in
				 			 
				 if (response.status === 'connected') {
					shareWordCloud(response.authResponse.accessToken);
				 } else {
					FB.login(function(response) { // Prompt Facebook login
						FB.getLoginStatus(function(response) { // Check if the user successfully logged in
							 
							 if (response.status === 'connected') {
								shareWordCloud(response.authResponse.accessToken);
							 }
							 
							 // If the user didn't log in, then forget about it!
						});
					}, {scope: 'public_profile,email,publish_actions'});
				}
			});
			
		});
			
	</script>
</html>