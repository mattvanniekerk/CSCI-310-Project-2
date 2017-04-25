<?php 

	// Write your script up here
	// save important data to variables 

    require_once('../class.paper.php');



	$q = $_GET["query"];
    $t = $_GET["search_type"];
    $n = $_GET["num_articles"];




?>

<html>
    <head>
        <title>IEEE Cloud</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../scripts/helper.js"></script>
        <script src="../scripts/postImageToFacebook.js"></script>
        <script src="https://d3js.org/d3.v4.min.js"></script>
        <script src="../scripts/d3.layout.cloud.js"></script>
        <script type="text/javascript" src="http://canvg.github.io/canvg/rgbcolor.js"></script> 
        <script type="text/javascript" src="http://canvg.github.io/canvg/StackBlur.js"></script>
        <script type="text/javascript" src="http://canvg.github.io/canvg/canvg.js"></script> 
        <script src="../cache/papers.json"> </script>


    </head>
    <body>
    	<div id="myProgress">
  			<div id="myBar">10%</div>
		</div>
        <div id="page">
 
			<div id="wordCloudPage">
			    
			    <h1 id="wordCloudTitle">Word Cloud Page for <?= $q ?></h1>
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
             
                    <a id="download" download="wordCloud.png"> <button type="button" class="button"> Download Image </button></a>    
			        
			    </div>
			    
			</div>
		</div>

	</body>

	<style>
	#myProgress {
    width: 50%;
    background-color: grey;
	}
	#myBar {
		width: 10%;
		height: 30%
	    width: 1%;
	    height: 30px;
	    text-align: center; /* To center it horizontally (if you want) */
    	line-height: 30px;
	    background-color: red;
	}

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
        
       /* $.getJSON("../cache/papers.json", function(json) {
            console.log(json);

        });*/
        //progression bar
        function move() {
			    var elem = document.getElementById("myBar");
			    var width = 10;
			    var id = setInterval(frame, 10);
			    function frame() {
			        if (width >= 100) {
			            clearInterval(id);
			        } else {
			            width = width + 10;
			            elem.style.width = width + '%';
	            		elem.innerHTML = width * 1 + '%';
			        }
	    		}
		}	
        $(window).load(function() {
    		move();
		});

        var json = {};
        $.ajax({ 
            url: "../cache/papers.json",
            async: false,
            dataType: "json",
            success:function(data) {
                json = data;
                console.log(data);
            }
         });
        
        for (var key in json) {
            console.log(json[key].authors[0]);
        }

        var allWords = [];
        if ("<?= $t ?>" == "Search by author") {
            //var allWords = "";
            for (var key in json) {
                if (allWords.length < "<?= $n ?>") {
                    for (i = 0; i < json[key].authors.length; i++) {
                        if (json[key].authors[i].toLowerCase() == "<?= $q ?>".toLowerCase()) {
                            console.log("laskdjf");
                            allWords.push(json[key].content);
                        }
                    }
                }
            }
            
        }
        if("<?= $t ?>" == "Search by keyword") {
            for (var key in json) {
                if (allWords.length < "<?= $n ?>") {
                    if (json[key].content.includes("<?= $q ?>")) {
                        allWords.push(json[key].content);
                        continue;
                    }
                    /*if keyword appears in content, add to word cloud. This method of adding words to the
                    word cloud allows users to either search for an arbitrary term or phrase,
                    or to search for a paper that explicitly defines it as a keyword.
                    Content "if" check accounts for the arbitrary term scenario, while we
                    keep the keyword search loop just in case a search term is a keyword
                    but not explicitly stated in the paper content
                    */
                    for (i = 0; i< json[key].keywords.length; i++) {
                        if (json[key].keywords[i].toLowerCase() == "<?= $q ?>".toLowerCase()) {
                            allWords.push(json[key].content)
                            break; //if keyword matches, add content and move to next paper
                        }
                    }
                }
            }
        }
        
      

            //xhr.open("GET", "http://ieeexplore.ieee.org/gateway/ipsSearch.jsp?querytext=<?= q ?>&hc=<?= n ?>", true);
        
        /*xhr.onload = function() {
            if (xhr.readystate == xhr.DONE) {
                if (xhr.status == 200 && xhr.readyState == 4) {
                    console.log(xhr.response);
                    console.log(xhr.responseXML);
                }
            }
        }*/
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

        
        function generatePaperCloud() {
            var words = {};
            var paperWords = [];
            for (i = 0; i < allWords.length; i++) {
                var temp = allWords[i].split(" ");
                for (j = 0; j < temp.length; j++) {
                    paperWords.push(temp[j]);
                }
            }
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
                            if ("<?= $t ?>" == "Search by author") { //this leaves a space in the author name! Fix later
                                window.open("paper_list.php?query="+word+"&au=<?= $q ?>&num=<?= $n ?>", "_self", false);
                            } else {
                                window.open("paper_list.php?query="+word+"&num=<?= $n ?>", "_self", false);
                            }
							//loadPage("paperList");
                            
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
		//move();
		
		// Set up the Artist Search Bar
		/*$("#paperSearchBar")
			.load("components/paperSearchBar.html")
			.on("yesSelection", function() {		
				$("#search").removeProp("disabled");
				$("#add").removeProp("disabled");
			})
			.on("noSelection", function() {
				$("#search").attr("disabled", true);
				$("#add").attr("disabled", true);
			});*/

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
        
        $("#download").click(function() {
            var dl = document.getElementById("download");
            var img = document.getElementById("lyricsCloudCanvas").toDataURL("image/png")
                    .replace("image/png", "image/octet-stream");
			  dl.setAttribute("href", img);
        });
        
       


        

			
	</script>
</html>