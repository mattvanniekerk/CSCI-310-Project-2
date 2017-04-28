function submitSearch(param, q, num) { 
    var paper1Title = "Title";
    var paper1Author = [];
    paper1Author.push("Author1");
    paper1Author.push("Author2");
    var paper1Conference = "Conference";
    var paper1Abstract = "Abstract";
    var paper1Keywords = [];
    paper1Keywords.push("Paper1Key1");
    paper1Keywords.push("Paper1Key2");
    var paper1Content = "Author search!";
    var paper1 = [];
    paper1.push(paper1Title);
    paper1.push(paper1Author);
    paper1.push(paper1Conference);
    paper1.push(paper1Abstract);
    paper1.push(paper1Keywords);
    paper1.push(paper1Content);
    
    var paper2Title = "Title";
    var paper2Author = [];
    paper2Author.push("Author1");
    paper2Author.push("Author2");
    var paper2Conference = "Conference";
    var paper2Abstract = "Abstract";
    var paper2Keywords = [];
    paper2Keywords.push("Paper2Key1");
    paper2Keywords.push("Paper2Key2");
    var paper2Content = "Keyword search!";
    var paper2 = [];
    paper2.push(paper2Title);
    paper2.push(paper2Author);
    paper2.push(paper2Conference);
    paper2.push(paper2Abstract);
    paper2.push(paper2Keywords);
    paper2.push(paper2Content);
    
    var papers = [];
    papers.push(paper1);
    papers.push(paper2);
    
    var allWords = [];
    if (param == "Search by author") {
        for (j = 0; j < papers.length; j++) {
            if (allWords.length < num) {
                for (i = 0; i < papers[j][1].length; i++) {
                    if (papers[j][1][i].toLowerCase() == q.toLowerCase()) {
                        allWords.push(papers[j][5]);
                        return papers[j][5];
                    }
                }
            }
        }

    }
    if(param == "Search by keyword") {
        for (j = 0; j < papers.length; j++) {
            if (allWords.length < num) {
                for (i = 0; i< papers[j][4].length; i++) { 
                    //for each keyword, see if it matches the query term then push to wordcloud if it does
                    if (papers[j][4][i].toLowerCase() == q.toLowerCase()) {
                        allWords.push(papers[j][5]);
                        return papers[j][5];
                    }
                }
            }
        }
    }
}