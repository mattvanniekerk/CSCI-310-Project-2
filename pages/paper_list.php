<?php 
    

    // Write your script up here
    // save important data to variables 
include '../PaperClass.php';


$papers = [];
$frequencies = [];

    for ($i = 0; $i <= 10; $i++) {
        $frequencies [$i] = rand(5,20);
        $papers[$i]= new Paper();
        $papers[$i]->setTitle("paper".$i );
        $papers [$i]->setAuthors("Author".$i );
        $papers[$i]->setConference("Conference".$i );
        $papers [$i]->setLink("Link".$i );
        $papers [$i]->setBibtex("Bibtext".$i );


}


?>



<!DOCTYPE html>
<html>




<head>
    <title>CSCI310</title>
   
    <h1 id="myHeader">  Hi  </h1>
   
  
</head>

<body>

     <div id = "HTMLtoPDF">
    <table id = "paperListTable" border="1">
    <tr>
        <th id = "paperFrequency" style="padding:0 15px 0 15px;">  Frequency</th>
        <th id = "paperTitle" style="padding:0 15px 0 15px;"> Title</th>
        <th id = "paperAuthor" style="padding:0 15px 0 15px;"> Author</th>
        <th id = "paperConference" style="padding:0 15px 0 15px;"> Conference</th>
        <th id = "paperDownloadLink" style="padding:0 15px 0 15px;"> Download Link</th>
        <th id = "paperBibtext" style="padding:0 15px 0 15px;"> Bibtext</th>

    </tr>
    
        <?php for ($i=1; $i <= 10; $i++) { ?>
            <tr> 
                <td> <?php echo $frequencies[$i]?> </td>
                <td> <?php echo $papers[$i]->getTitle();?> </td>
                <td> <?php echo $papers[$i]->getAuthors(); ?> </td>
                <td> <?php echo $papers[$i]->getConference();?> </td>
                <td> <a href=" https://www.youtube.com/">  <?php echo $papers[$i]->getLink();?></a> </td>
                <td> <?php echo $papers[$i]->getBibtex(); ?></td>

            </tr>
         <?php } ?>
   

    


    </table>
   
    </div>

    <!-- <div id="welcomeDiv"  style="display:none;" class="answer_list" > WELCOME</div>
    <input type="button" name="answer" value="Show Div" onclick="showDiv()" /> -->

    <button id = "downloadAsPDF" onClick = "HTMLtoPDF()"> Download List (PDF)</button>
    <button id = "downloadAsTXT" onClick="HTMLtoTXT()"> Download List (TXT)</button>
    <button id = "backToCloud"> Back to Cloud Page</button>
    <br>
    <button id = "RunIt" onclick="RunProgram()"> Run Program</button>
    <br>
    <button id = "fillUpData" onClick = "FillDataUp()"> Fill Up Data </button>


</body>
<script type = "text/javascript" src="../tableExport.jquery.plugin-master/jquery.js"></script>
<script type = "text/javascript" src="../js/jspdf.js"></script>
<script type = "text/javascript" src="../js/jquery-2.1.3.js"></script>
<script type = "text/javascript" src="../js/pdfFromHTML.js"></script>
<script type = "text/javascript" src="../tableExport.jquery.plugin-master/jquery.base64.js"></script>
<script type = "text/javascript" src="../tableExport.jquery.plugin-master/tableExport.js"></script>
<script type = "text/javascript" src="../tableExport.jquery.plugin-master/html2canvas.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
$("downloadAsTXT").click(function(){
    $("paperListTable").tableExport({
        type:'txt',
        escape:'false',
    });
});
}); 
</script>
<script>

/* <!-- 
document.write(Number.MAX_VALUE));
--> */
var searchedWord = "";
var pageTitle = "";
var pageFrequency = "";
var pageContent = "";
var pageAuthors = [];
var pageBibtext = "";
var pageLink = "";  
/* class Paper {
    
} */

/*
function HTMLtoTXT() {
    $("paperListTable").tableExport({
        type:'txt',
        escape: 'false',
    }); 
 
}

*/
var fileName =  'tags.html';

/*function HTMLtoTXT(){
   
    downloadInnerHtml(fileName, 'HTMLtoPDF','text/html');

}*/


function  RunProgram(){
    document.getElementById('myHeader').innerHTML = "HELLO";
}
function FillDataUp(){
    
}
/*function demoFromHTML() {
    var pdf = new jsPDF('p', 'pt', 'letter');

    pdf.cellInitialize();
    pdf.setFontSize(10);
    $.each( $('#paperListTable tr'), function (i, row){
        $.each( $(row).find("td, th"), function(j, cell){
            var txt = $(cell).text().trim() || " ";
            var width = (j==4) ? 40 : 70; //make 4th column smaller
            pdf.cell(10, 50, width, 30, txt, i);
        });
    });

    pdf.save('sample-file.pdf');
}*/

</script>


</html>


<!-- 
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

</style> -->

<!-- <script>

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
 -->