<?php 
    $q = $_GET["query"];
    $au = $_GET["au"];
    $n = $_GET["num"];
    $t = $_GET["search_type"];
    $c = $_GET["conference"];
    $k = $_GET["keyQuery"];
    $s = $_GET["sort"];

    /*
    I just noticed this isn't consistent between pages. Other pages e.g. word_cloud have num_articles (should be num_pages
    but whatever) while parameters to this page are all num. WTF is this? This needs to be fixed
    */
?>

<!DOCTYPE html>
<html>




<head>
    <title>CSCI310</title>
  
    <h1 id="myHeader">  Papers matching "<?= $q ?>" </h1>
    <script type = "text/javascript" src="../tableExport.jquery.plugin-master/jquery.js"></script>
    <script type = "text/javascript" src="../js/jspdf.js"></script>
    <script type = "text/javascript" src="../js/jquery-2.1.3.js"></script>
    <script type = "text/javascript" src="../js/pdfFromHTML.js"></script>
    <script type = "text/javascript" src="../tableExport.jquery.plugin-master/jquery.base64.js"></script>
    <script type = "text/javascript" src="../tableExport.jquery.plugin-master/tableExport.js"></script>
    <script type = "text/javascript" src="../tableExport.jquery.plugin-master/html2canvas.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
 
</head>

<body>

     <div id = "HTMLtoPDF">
    <table id = "paperListTable" border="1">
    <tr>
        <th id = "paperCheckbox" style="padding:0 15px 0 15px;"> </th>
        <th id = "paperFrequency" style="padding:0 15px 0 15px;">  Frequency</th>
        <th id = "paperTitle" style="padding:0 15px 0 15px;"> Title</th>
        <th id = "paperAuthor" style="padding:0 15px 0 15px;"> Author</th>
        <th id = "paperConference" style="padding:0 15px 0 15px;"> Conference</th>
        <th id = "paperDownloadLink" style="padding:0 15px 0 15px;"> Download Link</th>
        <th id = "paperBibtex" style="padding:0 15px 0 15px;"> Bibtex</th>


    </tr>
    <script>

    function Paper(){
        this.title = "";
        this.authors = [];
        this.conference = "";
        this.link = "";
        this.abstract = "";
        this.content = "";
        this.bibtex = "";
        this.keywords = [];

        this.getKeywords = function getKeywords(){
            return this.keywords;
        }
        this.setKeywords = function setKeywords(arg){
            keywords = arg;
        }

        this.getTitle = function getTitle(){
            return this.title;
        }
        this.setTitle = function setTitle(arg){
            this.title = arg;
        }
        this.getAuthors = function getAuthors(){
            return this.authors;
        }
        this.setAuthors = function setAuthors(arg){
             this.authors = arg;
        }
        this.getConference = function getConference(){
            return this.conference;
        }
        this.setConference = function setConference(arg){
            this.conference = arg;
        }
        this.getContent = function getContent(){
            return this.content;
        }
        this.setContent = function setContent(arg){
             this.content = arg;
        }
        this.getAbstract = function getAbstract(){
            return this.abstract;
        }
        this.setAbstract = function setAbstract(arg){
            this.abstract;
        }
        this.setLink = function setLink(arg){
            this.link = arg;
        }
        this.getLink = function getLink(){
            return this.link;
        }
        this.setBibtex = function setBibtex(arg){
            this.bibtex = arg;
        }
        this.getBibtex = function getBibtex(){
            return this.bibtex;
        }

    }

        
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


var papersUsed = new Array();
var frequencies = new Array();
    
var td = new Array();
var arrayOfArrays = new Array();
var tr = new Array();
        

        
        
        
if ("<?= $au ?>" != "") { //if an author search
    //var allWords = "";
    var counter = 0;
    for (var key in json) {
        if (papersUsed.length < "<?= $n ?>") {
            for (k = 0; k < json[key].authors.length; k++) {
                if (json[key].authors[k].toLowerCase() == "<?= $au ?>".toLowerCase()) {
                    //see if word shows up in this particular paper; if so, proceed as normal
                    var paperContent = json[key].content.split(" ");
                    for (j = 0; j < paperContent.length; j++) {
                        if (paperContent[j].toLowerCase() == "<?= $q ?>".toLowerCase()) {
                            frequencies[counter] = frequencies[counter] ? frequencies[counter] + 1 : 1;
                        }
                    }
                    if (frequencies[counter] > 0) {
                        papersUsed[counter] = new Paper();
                        papersUsed[counter].setTitle(json[key].title);
                        papersUsed[counter].setAuthors(json[key].authors);
                        papersUsed[counter].setConference(json[key].conference);
                        papersUsed[counter].setLink(json[key].link);
                        papersUsed[counter].setBibtex(json[key].bibtex);
                        papersUsed[counter].setContent(json[key].content);
                        papersUsed[counter].setAbstract(json[key].abstract);
                        papersUsed[counter].setKeywords(json[key].keywords);
                        //determineFrequency("", counter);
                        counter++;
                    }
                }
            }
        }
    }
    var sortTitleLink = "Title";
    document.getElementById("paperTitle").innerHTML = sortTitleLink.link("http://localhost/project/pages/paper_list.php?query=<?= $q ?>&au=<?= $au ?>&num=<?= $n ?>&sort=title");
    
    var sortFrequencyLink = "Frequency";
    document.getElementById("paperFrequency").innerHTML = sortFrequencyLink.link("http://localhost/project/pages/paper_list.php?query=<?= $q ?>&au=<?= $au ?>&num=<?= $n ?>&sort=frequency");
    
    /*var sortAuthorLink = "Author";
    document.getElementById("paperAuthor").innerHTML = sortAuthorLink.link("http://localhost/project/pages/paper_list.php?query=<?= $q ?>&au=<?= $au ?>&num=<?= $n ?>&sort=author");*/
    
    var sortConferenceLink = "Conference";
    document.getElementById("paperConference").innerHTML = sortConferenceLink.link("http://localhost/project/pages/paper_list.php?query=<?= $q ?>&au=<?= $au ?>&num=<?= $n ?>&sort=conference");

    
} else if ("<?= $t ?>" == "subset") { //if a subset search
    console.log("this is a subset search");
    var counter = 0;
    var subParams = <?php
                $subQ = $_GET["qpaper"];
                echo json_encode($subQ);
        ?>;

    for (var key in json) { //for each paper
        if (papersUsed.length < "<?= $n ?>") { //if we haven't hit the paper max defined by user
            for (k = 0; k < subParams.length; k++) {
                if (json[key].title.toLowerCase() == subParams[k].toLowerCase()) {
                    //if we found a matching paper, proceed as normal and count frequencies
                    var paperContent = json[key].content.split(" ");
                    for (j = 0; j < paperContent.length; j++) {
                        if (paperContent[j].toLowerCase() == "<?= $q ?>".toLowerCase()) {
                            frequencies[counter] = frequencies[counter] ? frequencies[counter] + 1 : 1;
                        }
                    }
                    if (frequencies[counter] > 0) {
                        papersUsed[counter] = new Paper();
                        papersUsed[counter].setTitle(json[key].title);
                        papersUsed[counter].setAuthors(json[key].authors);
                        papersUsed[counter].setConference(json[key].conference);
                        papersUsed[counter].setLink(json[key].link);
                        papersUsed[counter].setBibtex(json[key].bibtex);
                        papersUsed[counter].setContent(json[key].content);
                        papersUsed[counter].setAbstract(json[key].abstract);
                        papersUsed[counter].setKeywords(json[key].keywords);
                        counter++;
                    }
                }
            }
            
        }
    }
    var sortTitleLink = "Title";
    var subsetParams = "http://localhost/project/pages/paper_list.php?search_type=<?= $t ?>&num=<?= $n ?>&query=<?= $q ?>";
    for (i = 0; i < subParams.length; i++) {
        subsetParams += "&qpaper[]="+subParams[i];
    }
    document.getElementById("paperTitle").innerHTML = sortTitleLink.link(subsetParams+"&sort=title");

    
    var sortFrequencyLink = "Frequency";
    document.getElementById("paperFrequency").innerHTML = sortFrequencyLink.link(subsetParams+"&sort=frequency");
    
    var sortConferenceLink = "Conference";
    document.getElementById("paperConference").innerHTML = sortConferenceLink.link(subsetParams+"&sort=conference");
} else if ("<?= $t ?>" == "conference") { //conference search
    console.log("<?= $c ?>");
    var counter = 0;
    for (var key in json) { //for each paper
        console.log("<?= $n ?>");
        if (papersUsed.length < "<?= $n ?>") { //if we haven't hit the paper max defined by user
            if (json[key].conference.toLowerCase() == ("<?= $c ?>").toLowerCase()) {
                var paperContent = json[key].content.split(" ");
                for (j = 0; j < paperContent.length; j++) {
                    if (paperContent[j].toLowerCase() == "<?= $q ?>".toLowerCase()) {
                        frequencies[counter] = frequencies[counter] ? frequencies[counter] + 1 : 1;
                    }
                }
                if (frequencies[counter] > 0) {
                    papersUsed[counter] = new Paper();
                    papersUsed[counter].setTitle(json[key].title);
                    papersUsed[counter].setAuthors(json[key].authors);
                    papersUsed[counter].setConference(json[key].conference);
                    papersUsed[counter].setLink(json[key].link);
                    papersUsed[counter].setBibtex(json[key].bibtex);
                    papersUsed[counter].setContent(json[key].content);
                    papersUsed[counter].setAbstract(json[key].abstract);
                    papersUsed[counter].setKeywords(json[key].keywords);
                    counter++;
                }
            }
        }
    }
    var sortTitleLink = "Title";
    var sortConferenceParam = encodeURIComponent("<?= $c ?>");
    var subsetParams = "http://localhost/project/pages/paper_list.php?search_type=<?= $t ?>&num=<?= $n ?>&query=<?= $q ?>&conference=";
    document.getElementById("paperTitle").innerHTML = sortTitleLink.link(subsetParams + sortConferenceParam + "&sort=title");
    
    var sortFrequencyLink = "Frequency";
    document.getElementById("paperFrequency").innerHTML = sortFrequencyLink.link(subsetParams + sortConferenceParam + "&sort=frequency");
    
    var sortConferenceLink = "Conference";
    document.getElementById("paperConference").innerHTML = sortConferenceLink.link(subsetParams + sortConferenceParam + "&sort=conference");
} else { //keyword search    
    var counter = 0;
    for (var key in json) { //for each paper
        if (papersUsed.length < "<?= $n ?>") { //if we haven't hit the number article max defined by user
            for (i = 0; i < json[key].keywords.length; i++) {
                if (json[key].keywords[i].toLowerCase() == "<?= $k ?>".toLowerCase()) {
                    //if paper's keywords contain the keyword search term
                    var paperContent = json[key].content.split(" ");
                    for (j = 0; j < paperContent.length; j++) {
                        if (paperContent[j].toLowerCase() == "<?= $q ?>".toLowerCase()) {
                            frequencies[counter] = frequencies[counter] ? frequencies[counter] + 1 : 1;
                        }
                    }
                    if (frequencies[counter] > 0) {
                        papersUsed[counter] = new Paper();
                        papersUsed[counter].setTitle(json[key].title);
                        papersUsed[counter].setAuthors(json[key].authors);
                        papersUsed[counter].setConference(json[key].conference);
                        papersUsed[counter].setLink(json[key].link);
                        papersUsed[counter].setBibtex(json[key].bibtex);
                        papersUsed[counter].setContent(json[key].content);
                        papersUsed[counter].setAbstract(json[key].abstract);
                        papersUsed[counter].setKeywords(json[key].keywords);
                        counter++;
                    }
                }
            }
        }

    }
    var sortTitleLink = "Title";
    document.getElementById("paperTitle").innerHTML = sortTitleLink.link("http://localhost/project/pages/paper_list.php?query=<?= $q ?>&num=<?= $n ?>&keyQuery=<?= $k ?>&sort=title");
    
    var sortFrequencyLink = "Frequency";
    document.getElementById("paperFrequency").innerHTML = sortFrequencyLink.link("http://localhost/project/pages/paper_list.php?query=<?= $q ?>&num=<?= $n ?>&keyQuery=<?= $k ?>&sort=frequency");

    var sortConferenceLink = "Conference";
    document.getElementById("paperConference").innerHTML = sortConferenceLink.link("http://localhost/project/pages/paper_list.php?query=<?= $q ?>&num=<?= $n ?>&keyQuery=<?= $k ?>&sort=conference");
}


    var sortedArray = new Array()

   var myTable = document.getElementById("paperListTable");
         for (i = 0; i < papersUsed.length; i++) {
            //var tr = document.createElement('TR');
            td.push(frequencies[i]);
            td.push(papersUsed[i].getTitle());
            td.push(papersUsed[i].getAuthors());
            td.push(papersUsed[i].getConference());
            td.push(papersUsed[i].getLink());
            td.push("Bibtex");
            arrayOfArrays.push(td);
            td = [];
            }
            var max  = 0;
            counter = 0;
    if ("<?= $s ?>" == "title") {
        while(arrayOfArrays.length > 0) { //while still unsorted elements
            var currentIndex = 0;
            for (i = 0; i < arrayOfArrays.length; i++) { //find "smallest" title, e.g. first alphabetically
                if(arrayOfArrays[i][1] < arrayOfArrays[currentIndex][1]) { //if title comes before currentIndex's title
                    currentIndex = i;
                }
            }
            sortedArray.push(arrayOfArrays[currentIndex]);
            arrayOfArrays.splice(currentIndex, 1);
        }
    } else if ("<?= $q ?>" == "conference") {
        while (arrayOfArrays.length > 0) {
            var currentIndex = 0;
            for (i = 0; i < arrayOfArrays.length; i++) {
                if(arrayOfArrays[i][3] < arrayOfArrays[currentIndex][3]) {
                    currentIndex = i;
                }
            }
            sortedArray.push(arrayOfArrays[currentIndex]);
            arrayofArrays.splice(currentIndex, 1);
        }
    } else { //frequency sort
        while(arrayOfArrays.length > 0){//while we have elements in the US array
            max = 0;
            for(j = 0; j<arrayOfArrays.length; j++){//find the element with the greatest frequency
                if(arrayOfArrays[j][0] > arrayOfArrays[max][0]){
                    max = j;
                }
            }
            sortedArray.push(arrayOfArrays[max]);
            arrayOfArrays.splice(max,1);
            counter++;

        }
    }
         

            for(z= 0; z < sortedArray.length; z++){
                 var tr = document.createElement('TR');
                var checkbox = document.createElement("input");
                checkbox.type = "checkbox";
                checkbox.name = sortedArray[z][1];
                checkbox.value = sortedArray[z][1];
                checkbox.id = (sortedArray[z][1]+" box");
                for(p = 0; p<sortedArray[z].length; p++){
                    if (p == 0) {
                        //adding it to a cell first centers the checkbox to the middle of the cell
                        var checkboxCell = document.createElement("TD");
                        checkboxCell.appendChild(checkbox);
                        tr.appendChild(checkboxCell);
                        /* Haha so this is totally unintended but apparently having this here and then
                        letting the loop evaluate as normal means that I was able to add the checkbox
                        column without touching the rest of the loop and figuring out how to
                        get it to append the nodes in the right spot : ^)
                        */
                    }
                    //I feel like these should be in order but I'm too lazy to do it. Maybe later. It works as it is
                    if (p == 4) { //change link text to an actual link to find paper in IEEE database
                        tdd = document.createElement('TD');
                        var link = document.createElement("a");
                        link.setAttribute("href", sortedArray[z][4]);
                        var linkText = document.createTextNode(sortedArray[z][4]);
                        link.appendChild(linkText);
                        tdd.appendChild(link);
                        tr.appendChild(tdd);
                    } 
                    else if (p == 3) { //change conference text to link listing other papers in that conference
                        tdd = document.createElement('TD');
                        var link = document.createElement("a");
                        var param = encodeURIComponent(sortedArray[z][3]);
                        //link.setAttribute("href", "word_cloud.php?search_type=conference&num_articles=<?= $n ?>&query="+param, "_self", false);
                        link.setAttribute("href", "paper_list.php?search_type=conference&num=<?= $n ?>&conference="+param+"&query=<?= $q ?>");
                        var linkText = document.createTextNode(sortedArray[z][3]);
                        link.appendChild(linkText);
                        tdd.appendChild(link);
                        tr.appendChild(tdd);
                    }
                    else if (p == 1) { //change title text to a link that shows abstract with words highlighted
                        tdd = document.createElement('TD');
                        var link = document.createElement("a");
                        link.setAttribute("href", "abstract_page.php?word=<?= $q ?>&query="+sortedArray[z][1], "_self", false);
                        var linkText = document.createTextNode(sortedArray[z][1]);
                        link.appendChild(linkText);
                        tdd.appendChild(link);
                        tr.appendChild(tdd);
                    } else if (p == 2) {

                        var cellTable = document.createElement("TABLE");
                        cellTable.setAttribute("id", "authorTable");
                        var cellToAdd = document.createElement("TD");
                        for (i = 0; i < sortedArray[z][p].length; i++) { //for each author
                            tdd = document.createElement('TD');
                            var link = document.createElement("a");
                            link.setAttribute("href", "word_cloud.php?query="+sortedArray[z][p][i]+"&search_type=Search by+author&num_articles=<?= $n ?>", "_self", false);
                            if (i == (sortedArray[z][p].length-1)) {
                                var linkText = document.createTextNode(sortedArray[z][p][i]);
                            }
                            else {
                                var linkText = document.createTextNode(sortedArray[z][p][i]+", ");
                            }
                            link.appendChild(linkText);
                            tdd.appendChild(link);
                            //docFrag.appendChild(tdd);
                            var newRow = document.createElement("TR");
                            newRow.appendChild(tdd);
                            cellTable.appendChild(newRow);
                        }


                        cellToAdd.appendChild(cellTable);
                        tr.appendChild(cellToAdd);
                    } else if (p == 5) {
                        tdd = document.createElement('TD');
                        var link = document.createElement("a");
                        link.setAttribute("href", "bibtex_page.php?query="+sortedArray[z][1], "_self", false);
                        var linkText = document.createTextNode(sortedArray[z][5]);
                        link.appendChild(linkText);
                        tdd.appendChild(link);
                        tr.appendChild(tdd);
                    }
                        else{
                        tdd = document.createElement('TD');
                        tdd.appendChild(document.createTextNode(sortedArray[z][p]));
                        tr.appendChild(tdd);
                    }
                }
                
                myTable.appendChild(tr);
            }


               
          
            

    </script>

    </table>
  
    </div>

    <!-- <div id="welcomeDiv"  style="display:none;" class="answer_list" > WELCOME</div>
    <input type="button" name="answer" value="Show Div" onclick="showDiv()" /> -->

    <button id = "downloadAsPDF" onClick = "HTMLtoPDF()"> Download List (PDF)</button>
    <button id = "downloadAsTXT" onClick="HTMLtoTXT()"> Download List (TXT)</button>
    <button id = "generateSubsetCloud" onClick= "generateSubsetCloud()"> Generate Cloud from Selected Papers</button>


    

    <button id = "backToCloud" onClick = "toCloudPage()" > Back to Cloud Page</button>
<!--    <br>
    <button id = "RunIt" onClick="sortTable()"> Run Program</button>
    <br>
    <button id = "fillUpData" onClick = "FillDataUp()"> Fill Up Data </button>-->




</body>




<script>

/* <!--
document.write(Number.MAX_VALUE));
--> */
var searchedWord = "";
var pageTitle = "";
var pageFrequency = "";
var pageContent = "";
var pageAuthors = [];
var pageBibtex = "";
var pageLink = ""; 



var fileName =  'tags.html';
    
    
function generateSubsetCloud() {
    var paramsToPass = "?search_type=subset&num_articles=<?= $n ?>";
    for (i = 0; i < sortedArray.length; i++) {
        var result = document.getElementById(sortedArray[i][1]+" box").checked;
        //console.log(result);
        if (result) { //if box was checked
            //TODO: pass papers to be used in new word cloud to word_cloud.php
            //Figure out how to pass in multiple parameters with the same name i.e. ?title=something&title=something&title...
            //Then append to the if(authorSearch) else if (keywordSearch) conditional to include else if (arrayOfPapers)
            //Then generate word cloud from paper content
            paramsToPass += "&query[]="+sortedArray[i][1];
            //adds title of paper to parameters to be searched
        }
    }
    window.open("word_cloud.php"+paramsToPass, "_self", false);
}
    
function toCloudPage() {
    if ("<?= $t ?>" == "Search by author") {
        var paramsToPass = "?query=<?= $au ?>&search_type=Search+by+author&num_articles=<?= $n ?>";
        window.open("word_cloud.php"+paramsToPass, "_self", false);
    } else if ("<?= $t ?>" == "Search by keyword") {
        var paramsToPass = "?query=<?= $q ?>&search_type=Search+by+keyword&num_articles=<?= $n ?>";
        window.open("word_cloud.php"+paramsToPass, "_self", false);    
    } else if ("<?= $t ?>" == "conference") {
        var conf = encodeURIComponent("<?= $c ?>");
        var paramsToPass = "?query=<?= $q ?>&search_type=conference&num_articles=<?= $n ?>&conference="+conf;
        window.open("word_cloud.php"+paramsToPass, "_self", false);
    } else if ("<?= $t ?>" == "subset") {
        var paramsToPass = "?search_type=subset&num_articles=<?= $n ?>";
        var subParams = <?php
            $subQ = $_GET["qpaper"];
            echo json_encode($subQ);
        ?>;
        for (i = 0; i < subParams.length; i++) {
            paramsToPass += "&query[]=" + subParams[i];
        }
        window.open("word_cloud.php"+paramsToPass, "_self", false);
    }
}


function HTMLtoTXT(){
    var totalCont = "Frequency"+'\t'+"Title"+'\t'+"Author"+'\t'+"Conference"+'\t'+"Download Link"+'\t'+"Bibtex"+'\n';
    var cont = "";
                for(z= 0; z < sortedArray.length; z++){
                // var tr = document.createElement('TR');
                    for(p = 0; p<sortedArray[z].length; p++){
                        cont += sortedArray[z][p] ;
                        cont += "\t";
                    }
                    cont += "\n";
                    totalCont += cont;
                    cont = "";
            }
            uri = "data:application/octet-stream," + encodeURIComponent(totalCont);

            location.href = uri;

// Build a data URI:


// Click on the file to download
// You can also do this as a button that has the href pointing to the data URI
  

    //downloadInnerHtml(fileName, 'HTMLtoPDF','text/html');

    }






</script>


</html>

<!--         <?php for ($i=1; $i <= 10; $i++) { ?>
            <tr>
                <td> <?php echo $frequencies[$i]?> </td>
                <td> <?php echo $papers[$i]->getTitle();?> </td>
                <td> <?php echo $papers[$i]->getAuthors(); ?> </td>
                <td> <?php echo $papers[$i]->getConference();?> </td>
                <td> <a href=" https://www.youtube.com/">  <?php echo $papers[$i]->getLink();?></a> </td>
                <td> <?php echo $papers[$i]->getBibtex(); ?></td>

            </tr>
         <?php } ?> -->

<!-- // /*function HTMLtoTXT() {

//         <?php
//        $s = "hey" ;
//        for ($i=1; $i <= 10; $i++) {
//         /*$s = "hi";*/
            
//                $string .=   $frequencies[$i];
//                $string .=  $papers[$i]->getTitle();
//                $string .=  $papers[$i]->getAuthors(); 
//                $string .= $papers[$i]->getConference();
//                $string .=  "https://www.youtube.com/" ;
//                $string .=$papers[$i]->getBibtex();

           
//          }
//          header("Content-Disposition: attatchment; filename = temp.txt");
//          header("Content-Type: text/plain");
        
//          echo $s; ?>
// //                  /*    $("paperListTable").tableExport({
//         type:'txt',
//         escape: 'false',
//     });
//  */ -->