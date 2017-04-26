Feature: req 5 access its bibtex.

In order to view the the bibtext of each paper from the paper list
As a user
I need to be able to see a bibtext link in the paper list for each paper

Scenario: each paper has a link for its full text

Given the paper list conatins a "Bibtext" column"
Then the paper list contains a "Bibtex" column
Then each paper has a link for its bibtext

