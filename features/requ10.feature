Feature: requ 10 export paper list
In order to export the paper list as plain text and pdfs
As a user
I need to be able to  click the Export button

Scenario:Exporting the paper list as pdfs
Given the paper list is generated for exporting as pdfs
Then the  "PDF" button is clickable

Scenario:Exporting the paper as plain text
Given the paper list in generated for exporting as plain text
Then the  "txt" button is clickable








