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
			    <h2 id="paperTitle"> Papers in this conference: </h2>
			    
				<div id="paperList">
					<h3 id="paperList"> </h3>
			    </div>

			    
			</div>

	</body>

	<style>

	
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
        
        var counter = 0;
        var papers = "";
        for (var key in json) {
            if (json[key].conference.toLowerCase() == ("<?= $q ?>").toLowerCase()) {
                console.log(("<?= $q ?>").toLowerCase());
                papers += (counter+1) + ". "+ json[key].title + "<br>";
                counter++;
            }
        }

        document.getElementById("paperList").innerHTML = papers;


			
	</script>
</html>