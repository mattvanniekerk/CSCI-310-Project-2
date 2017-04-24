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
        
        
        
    </head>
    <body>
        <div id="page">
        
            <div id="ieeeSearchPage">
            	<h1>IEEE Cloud</h1>

                <form id="userInput" action="/project/pages/word_cloud.php" method="GET">
            
                	<div id="ieeeSearchBar">
                        <input type="text" name="query" id="ieeeSearchTextField" />   
                    </div>

                	<input type="submit" id="search" name="search_type" class="button" value="Search by keyword"/>
                	<input type="submit" id="authorSearch" name="search_type" class="button" value="Search by author"/>
                	
                	<div id="articlesInput">
                	<h6>How many articles would you like to include?</h6>
                	<input id="numArticlesField" name="num_articles" type="number">
                    </div>
                </form>
             
            </div>

        </div>
    </body>

</html>

<script>
    $("#userInput").validate({
        rules: {
            ieeeSearchTextField: {
                required: true
            },
            numArticlesField: {
            required: true
            }
        }
    });

    
    
    
	/*(function() {
        $("form > input").keyup(function() {
            var empty = false;
            $("form > input").each(function() {
                if ($(this).val() == "") {
                    empty = true;
                }
            });
            if (empty) {
                $("#search").attr("disabled", "disabled");
                $("#authorSearch").attr("disabled", "disabled");
            } else{
                $("#search").removeProp("disabled");
                $("#authorSearch").removeProp("disabled");
            }
        });
    })()*/
    

</script>

<style>

#ieeeSearchPage {
    text-align: center;
    margin: auto;
    
    vertical-align: middle;
    display: table-cell;
    padding-bottom: 20%;
}

#ieeeSearchBar {
    width: 33%;
    padding: 1em;
}

#numberArticlesBar {
    width: 16%;
    padding: 1em;
}
    


</style>