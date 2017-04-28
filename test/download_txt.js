function HTMLtoTXT(){
    var sortedArray = [];
    var testFrequency = "10";
    var testTitle = "Dummy Title";
    var testAuthor = "Adolf Shitler";
    var testConference = "How to ride a horse 101";
    var testLink = "Linky";
    var testBibtex = "Ayy lmao";
    var test = [];
    test.push(testFrequency);
    test.push(testTitle);
    test.push(testAuthor);
    test.push(testConference);
    test.push(testLink);
    test.push(testBibtex);
    sortedArray.push(test);
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
    return location.href;


}