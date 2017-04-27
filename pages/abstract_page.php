<?php 

	// Write your script up here
	// save important data to variables 

    require_once('../class.paper.php');



	$q = $_GET["query"];
    $t = $_GET["search_type"];
    $n = $_GET["num_articles"];
    $w = $_GET["word"];




?>

<html>
    <head>
        <title> Test </title>
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

 
			<div id="wordCloudPage">
			    
			    <h1 id="wordCloudTitle"> <?= $q ?> </h1>
			    <h2 id="paperTitle"> Abstract </h2>
			    
				<div id="abstractText">
					<p id="abstractText"> </p>
			    </div>
			    
				<div id="downloadControls">
                    <a id="download" download="abstract.pdf"> <button type="button" class="button"> Download PDF </button></a>    
			        
			    </div>
			    
			</div>

	</body>

	<style>
        .highlight {
            background-color: yellow;
        }
	
	</style>


	<script>

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
            if (json[key].title.toLowerCase() == "<?= $q ?>".toLowerCase()) {
                document.getElementById("abstractText").innerHTML = json[key].abstract;
                break;
            }
        }
        word = "<?= $w ?>";
        var highlightedAbstract = (document.getElementById("abstractText").innerHTML).replace(regexForWord(word), function(match) {	
		return "<span class='highlight'>" + match + "</span>";
	});
	$("#abstractText").html(highlightedAbstract);
        


			
	</script>
</html>