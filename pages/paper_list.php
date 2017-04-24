



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
        <th id = "paperBibtex" style="padding:0 15px 0 15px;"> Bibtext</th>


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






var td = new Array();
var arrayOfArrays = new Array();
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

    var sortedArray = new Array()

   var myTable = document.getElementById("paperListTable");
         for (i=0; i < 10; i++) { 
            //var tr = document.createElement('TR');
            
            td.push(Math.floor(Math.random() * 15) + 1 );
            td.push(tempPapers[i].getTitle());
            td.push(tempPapers[i].getAuthors());
            td.push(tempPapers[i].getConference());
            td.push(tempPapers[i].getLink());
            td.push(tempPapers[i].getBibtex());
            arrayOfArrays.push(td);
            td = [];
            }
            var max  = 0;
            var counter = 0;
    while(arrayOfArrays.length > 0){//while we have elements in the US array
        max = 0;
        for(j = 0; j<arrayOfArrays.length; j++){//find the element with the greatest frequency
            if(arrayOfArrays[j][0] > arrayOfArrays[max][0]){
                max = j;
            }
        }
        sortedArray.push(arrayOfArrays[max]);
        arrayOfArrays.splice(max,1);
        console.log(sortedArray[counter][0]);
        counter++;

    }
          

            for(z= 0; z < sortedArray.length; z++){
                 var tr = document.createElement('TR');
                for(p = 0; p<sortedArray[z].length; p++){
                tdd = document.createElement('TD');
                tdd.appendChild(document.createTextNode(sortedArray[z][p]));
                tr.appendChild(tdd);
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
    <button id = "backToCloud"> Back to Cloud Page</button>
    <br>
    <button id = "RunIt" onClick="sortTable()"> Run Program</button>
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