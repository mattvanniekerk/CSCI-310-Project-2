<?php 

	// Write your script up here
	// save important data to variables 

    //$paper1Authors = array("Halfond", "Schindler");
    require_once('../PaperClass.php');
    $paper1 = new Paper();
    $paper1->setTitle("Test Paper 1");
    //$paper1->setAuthor($paper1Authors);
    $paper1->setConference("Conference_1");
    $paper1->setAbstract("Abstract_1");
    $paper1->setContent("I am happy to join with you today in what will go down in history as the greatest demonstration for freedom in the history of our nation. Five score years ago, a great American, in whose symbolic shadow we stand today, signed the Emancipation Proclamation. This momentous decree came as a great beacon light of hope to millions of Negro slaves who had been seared in the flames of withering injustice. It came as a joyous daybreak to end the long night of their captivity. But one hundred years later, the Negro still is not free. One hundred years later, the life of the Negro is still sadly crippled by the manacles of segregation and the chains of discrimination. One hundred years later, the Negro lives on a lonely island of poverty in the midst of a vast ocean of material prosperity. One hundred years later, the Negro is still languished in the corners of American society and finds himself an exile in his own land. And so we've come here today to dramatize a shameful condition. In a sense we've come to our nation's capital to cash a check. When the architects of our republic wrote the magnificent words of the Constitution and the Declaration of Independence, they were signing a promissory note to which every American was to fall heir. This note was a promise that all men, yes, black men as well as white men, would be guaranteed the 'unalienable Rights' of 'Life, Liberty and the pursuit of Happiness.'' It is obvious today that America has defaulted on this promissory note, insofar as her citizens of color are concerned. Instead of honoring this sacred obligation, America has given the Negro people a bad check, a check which has come back marked 'insufficient funds.'");

    $paper2 = new Paper();
    $paper2->setTitle("Test Paper 2");
    $paper2->setConference("Conference_1");
    $paper2->setAbstract("Abstract_2");
    $paper2->setContent("But we refuse to believe that the bank of justice is bankrupt. We refuse to believe that there are insufficient funds in the great vaults of opportunity of this nation. And so, we've come to cash this check, a check that will give us upon demand the riches of freedom and the security of justice. We have also come to this hallowed spot to remind America of the fierce urgency of Now. This is no time to engage in the luxury of cooling off or to take the tranquilizing drug of gradualism. Now is the time to make real the promises of democracy. Now is the time to rise from the dark and desolate valley of segregation to the sunlit path of racial justice. Now is the time to lift our nation from the quicksands of racial injustice to the solid rock of brotherhood. Now is the time to make justice a reality for all of God's children. It would be fatal for the nation to overlook the urgency of the moment. This sweltering summer of the Negro's legitimate discontent will not pass until there is an invigorating autumn of freedom and equality. Nineteen sixty-three is not an end, but a beginning. And those who hope that the Negro needed to blow off steam and will now be content will have a rude awakening if the nation returns to business as usual. And there will be neither rest nor tranquility in America until the Negro is granted his citizenship rights. The whirlwinds of revolt will continue to shake the foundations of our nation until the bright day of justice emerges.");

    $paper3 = new Paper();
    $paper3->setTitle("Test Paper 3");
    $paper3->setConference("Conference_2");
    $paper3->setAbstract("Abstract_3");
    $paper3->setContent("But there is something that I must say to my people, who stand on the warm threshold which leads into the palace of justice: In the process of gaining our rightful place, we must not be guilty of wrongful deeds. Let us not seek to satisfy our thirst for freedom by drinking from the cup of bitterness and hatred. We must forever conduct our struggle on the high plane of dignity and discipline. We must not allow our creative protest to degenerate into physical violence. Again and again, we must rise to the majestic heights of meeting physical force with soul force. The marvelous new militancy which has engulfed the Negro community must not lead us to a distrust of all white people, for many of our white brothers, as evidenced by their presence here today, have come to realize that their destiny is tied up with our destiny. And they have come to realize that their freedom is inextricably bound to our freedom. We cannot walk alone. And as we walk, we must make the pledge that we shall always march ahead. We cannot turn back.");

    $paper4 = new Paper();
    $paper4->setTitle("Test Paper 4");
    $paper4->setConference("Conference_1");
    $paper4->setAbstract("Abstract_4");
    $paper4->setContent("There are those who are asking the devotees of civil rights, 'When will you be satisfied?' We can never be satisfied as long as the Negro is the victim of the unspeakable horrors of police brutality. We can never be satisfied as long as our bodies, heavy with the fatigue of travel, cannot gain lodging in the motels of the highways and the hotels of the cities. *We cannot be satisfied as long as the negro's basic mobility is from a smaller ghetto to a larger one. We can never be satisfied as long as our children are stripped of their self-hood and robbed of their dignity by signs stating: 'For Whites Only.' We cannot be satisfied as long as a Negro in Mississippi cannot vote and a Negro in New York believes he has nothing for which to vote. No, no, we are not satisfied, and we will not be satisfied until 'justice rolls down like waters, and righteousness like a mighty stream.' I am not unmindful that some of you have come here out of great trials and tribulations. Some of you have come fresh from narrow jail cells. And some of you have come from areas where your quest -- quest for freedom left you battered by the storms of persecution and staggered by the winds of police brutality. You have been the veterans of creative suffering. Continue to work with the faith that unearned suffering is redemptive. Go back to Mississippi, go back to Alabama, go back to South Carolina, go back to Georgia, go back to Louisiana, go back to the slums and ghettos of our northern cities, knowing that somehow this situation can and will be changed. Let us not wallow in the valley of despair, I say to you today, my friends. And so even though we face the difficulties of today and tomorrow, I still have a dream. It is a dream deeply rooted in the American dream.");

    $paper5 = new Paper();
    $paper5->setTitle("Test Paper 5");
    $paper5->setConference("Conference_2");
    $paper5->setAbstract("Abstract_5");
    $paper5->setContent("I have a dream that one day this nation will rise up and live out the true meaning of its creed: 'We hold these truths to be self-evident, that all men are created equal.' I have a dream that one day on the red hills of Georgia, the sons of former slaves and the sons of former slave owners will be able to sit down together at the table of brotherhood. I have a dream that one day even the state of Mississippi, a state sweltering with the heat of injustice, sweltering with the heat of oppression, will be transformed into an oasis of freedom and justice. I have a dream that my four little children will one day live in a nation where they will not be judged by the color of their skin but by the content of their character. I have a dream today! I have a dream that one day, down in Alabama, with its vicious racists, with its governor having his lips dripping with the words of 'interposition' and 'nullification' -- one day right there in Alabama little black boys and black girls will be able to join hands with little white boys and white girls as sisters and brothers. I have a dream today! I have a dream that one day every valley shall be exalted, and every hill and mountain shall be made low, the rough places will be made plain, and the crooked places will be made straight; 'and the glory of the Lord shall be revealed and all flesh shall see it together.' This is our hope, and this is the faith that I go back to the South with. With this faith, we will be able to hew out of the mountain of despair a stone of hope. With this faith, we will be able to transform the jangling discords of our nation into a beautiful symphony of brotherhood. With this faith, we will be able to work together, to pray together, to struggle together, to go to jail together, to stand up for freedom together, knowing that we will be free one day.");

    //$papers = array($paper1, $paper2, $paper3, $paper4, $paper5);



	/*$q = $_GET["query"];

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
	];*/

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
        
        var data = 
            <?php
                $papers = [$paper1, $paper2, $paper3, $paper4, $paper5];
                $jsonArray = [];
                foreach ($papers as $paper) {
                    $jsonArray[$paper->getTitle()] =
                    [
                        "title" => $paper->getTitle(),
                        "conference" => $paper->getConference(),
                        "abstract" => $paper->getAbstract(),
                        "content" => $paper->getContent()
                    ];
                }
                echo json_encode($jsonArray);
            ?>;
      /*  for (var key in data) {
            var paper = data[key];
            document.write(paper["title"] + "<br>" + paper["conference"] + "<br>" +
                           paper["abstract"] + "<br>" + paper["content"]);
            document.write("<br>");
        }*/
        
        function generatePaperCloud() {
            var words = {};
            for (var key in data) { //for each paper
                var paper = data[key];
                var paperWords = paper["content"].split(" ");
                for (var word in paperWords) {
                    check = validateWord(paperWords[word]);
                    if (check) { //if word is valid i.e. greater than 3 letters and not common
                        //document.write(check + "<br>");
                        //document.write(paperWords[word] + "<br>");
                        words[paperWords[word]] = words[paperWords[word]] ? words[paperWords[word]] + 1 : 1;
                        //words["justice"] = words["justice"] ? words["justice"] +1 : 1;
                        //if justice is in words, increment, otherwise add it.
                        //key=>value is "justice"=>5, for instance
                    }
                }
            }
            
           // document.write("<br>"+words["happy"]+"<br>");
            words = Object.keys(words).map(function(word) {
				return {text: word, size: words[word]};
			});
            //an array of keys ["justice", "happy", "dream"]
            //perform map on it, which performs a function on each element
            //for each element, return an object with two elements, text and size
            //this new array is assigned to words
            //so words is now an object with a bunch of pairs in it, {text: "justice", size: 3}

				
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
            
            for (var key in words) {
                document.write(words[key].text + " " + words[key].size + " ");
                words[key].size = (word.size - currentMin) / (currentMax - currentMin) * (maxSize - minSize) + minSize;
                //document.write(words[key].size + "<br>");
                //why does this input NaN?
            }

			
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
        generatePaperCloud();
        
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