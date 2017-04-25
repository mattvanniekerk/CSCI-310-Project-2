Feature: REQ3 Clicking on a word in the cloud
In order to view the paper list sorted in a specified order
As a user
I need to be able to sort the table by clicking on the first four column headers

Scenario: Clicking on a word in the Word Cloud return a list of papers that mention that word
Given the Word Cloud is generated
When a word in the Word Cloud is clicked
Then the paper list is displayed

Scenario: Sorting the paper list in ascending order of the "Frequency" Column
Given the paper list is generated for the "Frequency" column
When the "Frequency" column header is clicked
Then the paper list is sorted in the ascending order of the "Frequency" column

Scenario: Sorting the paper list in ascending order of the "Title" Column
Given the paper list is generated for the "Title" column
When the "Title" column header is clicked
Then the paper list is sorted in the ascending order of the "Title" column

Scenario: Sorting the paper list in ascending order of the "Author" Column
Given the paper list is generated for the "Author" column
When the "Author" column header is clicked
Then the paper list is sorted in the ascending order of the "Author" column

Scenario: Sorting the paper list in ascending order of the "Confrence" Column
Given the paper list is generated for the "Confrence" column
When the "Confrence" column header is clicked
Then the paper list is sorted in the ascending order of the "Confrence" column
