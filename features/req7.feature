   Feature: req 7 clicking author
   In order to do a new search
   As a user
   I need to be able to to click on an author in the "Author" list from the paper list and it shows a new word cloud based on that author

     Scenario:
     Given the paper list is already generated for clicking author
      when an author is clicked
     Then a new word cloud is dispalyed based on that author




