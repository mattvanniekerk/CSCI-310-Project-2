function clickAuthor(z, p, i) {
    var paperArray = [];
    var authorArray = [];
    var sortedArray = [];
    authorArray.push("Valeriy Oborzhytskyy");
    authorArray.push("Ivan Prudyus");
    paperArray.push(authorArray);
    sortedArray.push(paperArray);
    var link = document.createElement("a");
    link.setAttribute("href", "word_cloud.php?query="+sortedArray[z][p][i]+"&search_type=Search by+author&num_articles=<?= $n ?>", "_self", false);
    if (i == 1) {
        var linkText = document.createTextNode(sortedArray[z][p][i]);
        return sortedArray[z][p][i];
    } else {
        var linkText = document.createTextNode(sortedArray[z][p][i]+", ");
        return sortedArray[z][p][i];
    }
}
