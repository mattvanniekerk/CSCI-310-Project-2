<?php 

	// Write your script up here
	// save important data to variables 






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
                    
        </script>
    </head>
    <body>
    <div id="songListPage">

    <a id="backToWordCloud">Back to Word Cloud</a>
    
    <h1 id="songListTitle"  >Song List Page</h1>
    
    <ul id="songList"></ul>
    
</div>

<style>

#songListPage {
    
    width: 75%;
    margin: auto;
    text-align: center;
    
    margin-top: 25px;
}

#songListTitle {
    margin-top: 25px;
}

#songList {
    line-height: 200%;
    /*
    background-color: white;
    border: 2px black solid;
    width: 800px;
    */
    margin: auto;
    padding: 10px;
}

/*
div.relative {
    position: relative;
    width: 40px;
    height: 20px;
    border: 3px solid #73AD21;
}
h1 {
    text-align: center;
    left: 0;
    line-height: 200px;
    margin: auto;
    margin-top: -100px;
    position: absolute;
    top: 30%;
    width: 100%;
}
.left {
    text-align: center;
    left: 650;
    line-height: 200px;
    margin: auto;
    margin-top: -100px;
    position: absolute;
    top: 20%;
}
*/

</style>

<script>

    // Set the title (of document and header)
    var title = word.charAt(0).toUpperCase() + word.substring(1);
    document.title = title;
    $("#songListTitle").text(title);
    
    // Set up Song List
    
    $.each(songs, function(index, song) { // count the word in each song
        
        // Count the occurances of the word
        var wordMatches = song.lyrics.match(regexForWord(word));
        song.wordCount = 0;
        if (wordMatches != null) {
            song.wordCount = wordMatches.length;
        }
    })
    
    songs.sort(function(a, b) { // sort songs by word count, descending
        return b.wordCount - a.wordCount;
    });
    
    $.each(songs, function(index, song) { // add each song to the list
        if (song.wordCount > 0) {
            $("#songList").append("<li><a class='songListLink' value='" + index + "'>" + song.title + "</a> by " + song.artist + " (" + song.wordCount + " occurances)</li>");
        }
    })
    
    // set up links
    
    $(".songListLink").click(function() {
        song = songs[$(this).attr("value")];
            
        loadPage("lyrics");
    });
    
        
    // Set up back button
    $("#backToWordCloud").click(function() {
        loadPage("wordCloud");
    });

</script>
