Feature: REQ-4  links to download from the digital library
In order to view the the actual text of each paper from the paper list
  As a user
  I need to be able to see a donwload link in the paper list for each paper

Scenario: each paper has a link to download from the digital library

  Given the paper list conatins a "Digital Library" column"
Then the paper list contains a "Digital Library" column
Then each paper has a link for its digital library

