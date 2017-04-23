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
    <script>

function Paper(){
    this.title = "";
    this.authors = [];
    this.conference = "";
    this.link = "";
    this.abstract = ""; 
    this.content = "";
    this.bibtex = "";

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






var td = new Array();
var tr = new Array();
var tempPapers = new Array();
var tempfrequencies = new Array();

    for (i = 0; i <10; i++) {


        //tempfrequencies [i] = Math.random();
        tempPapers[i] = new Paper();
        tempPapers[i].setTitle("paper" + i );
        tempPapers[i].setAuthors("Author" + i );
        tempPapers[i].setConference("Conference" + i );
        tempPapers[i].setLink("https://www.youtube.com/");
        tempPapers[i].setBibtex("Bibtext" + i );

}

   var myTable = document.getElementById("paperListTable");
         for (i=0; i < 10; i++) { 
            var tr = document.createElement('TR');
            
            td.push(Math.floor(Math.random() * 15) + 1 );
            td.push(tempPapers[i].getTitle());
            td.push(tempPapers[i].getAuthors());
            td.push(tempPapers[i].getConference());
            td.push(tempPapers[i].getLink());
            td.push(tempPapers[i].getBibtex());




                for(p = 0; p<td.length; p++){
                tdd = document.createElement('TD');
                tdd.appendChild(document.createTextNode(td[p]));
                tr.appendChild(tdd);

                
            }

                
            td = [];
            myTable.appendChild(tr);
            


}

    </script>

    </table>
   
    </div>

    <!-- <div id="welcomeDiv"  style="display:none;" class="answer_list" > WELCOME</div>
    <input type="button" name="answer" value="Show Div" onclick="showDiv()" /> -->

    <button id = "downloadAsPDF" onClick = "HTMLtoPDF()"> Download List (PDF)</button>
    <button id = "downloadAsTXT" onClick="HTMLtoTXT()"> Download List (TXT)</button>
    <button id = "backToCloud"> Back to Cloud Page</button>
    <br>
    <button id = "RunIt" onClick="RunProgram()"> Run Program</button>
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



var fileName =  'tags.html';

function HTMLtoTXT(){
   
    downloadInnerHtml(fileName, 'HTMLtoPDF','text/html');

}


function  RunProgram(){
    document.getElementById('myHeader').innerHTML = "HELLO";
}
function FillDataUp(){
    
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