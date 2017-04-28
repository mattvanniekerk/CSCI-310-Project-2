function clickConference(z) {
    var paper1Array = [];
    var paper2Array= [];
    var sortedArray = [];
    var conference0 = "2016 International Conference Radio Electronics & Info Communications (UkrMiCo)";
    var conference1 = "2016 International Conference on 3D Imaging (IC3D)";
    paper1Array.push("paper1Frequency");
    paper1Array.push("paper1Title");
    paper1Array.push("paper1Authors");
    paper1Array.push(conference0);
    paper2Array.push("paper2Frequency");
    paper2Array.push("paper2Title");
    paper2Array.push("paper2Authors");
    paper2Array.push(conference1);
    sortedArray.push(paper1Array);
    sortedArray.push(paper2Array);
    //tdd = document.createElement('TD');
    //var link = document.createElement("a");
    var param = encodeURIComponent(sortedArray[z][3]);
    //link.setAttribute("href", "paper_list.php?search_type=conference&num=<?= $n ?>&conference="+param+"&query=<?= $q ?>");
    var linkText = document.createTextNode(sortedArray[z][3]);
    //link.appendChild(linkText);
    //tdd.appendChild(link);
    //tr.appendChild(tdd);
    return param;
}