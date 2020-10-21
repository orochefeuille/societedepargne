# Société d'épargne

## "Développeur Web et Web Mobile" - week 8 project

A project based on Bootstrap4, DOM manipulation with JS, AJAX, JSON and API.

### Background: 
    You are a junior developer in the IT department of a major banking company. Until now, the core target group of this bank has been older savers, who do not use the internet very much. It now wants to diversify its customer base, enter the digital age and offer its users a renewed online banking service in order to attract new users. However, banking is a business of trust and it is the security of users that must come first.  
    As such, you need to create an application that allows the user to create and manage bank accounts.

### Functional specifications :
    - On the site's home page, the user sees all his bank accounts by default 
    - When he arrives at the home page, a layer is displayed over the entire page and reminds him of the essential security rules on a website. The security rules are stored in a file and retrieved by HTTP (AJAX) request 
    - On a statistics page the user accesses banking information such as loan rates, stock market price, etc... This information is retrieved from a file via HTTP request and presented in table form. This information is stored in a file in JSON format. 
    - A blog page, which will display articles retrieved from the following API: https://oc-jswebsrv.herokuapp.com/api/articles
    
    *Optionnel*
    
    - On a dedicated page, a form allows him to create a new bank account with a minimum of one type of account (current, livretA, PEL etc...). ) and a default sum of more than 50 euros
    - For each account, the user can click on a link that will allow him to delete the account
    - For each account, the user can, via a form, make a deposit of money
    - For each account, the user can, via a form, make a withdrawal of money
    - On a dedicated page, using a form, the user can make a transfer from one account to another. He can select an A account to debit, indicate an amount and select the B account to credit. He can only select his own accounts.

### Technical specifications :
    - HTML5
    - CSS3
    - Framework Boostrap4
    - Base Boilerplate
    - JavaScript with respect to the ES6 standards
    - You have produced simple wireframe models for at least one of the pages
    - You have produced a functional tree structure of the application with the possible use cases of the page
    - Your wireframes are accessible in a DOC folder
    - Your interface is responsive on all media
    - You respect the DRY principle
    - Your code is commented
    - Your code is hosted on GitHub
    - You have used a versioning software
    - Your site is hosted via a GH-page


## "Développeur Web et Web Mobile" - week 12 project * Part 2

### Project to be returned: 
    Boosting the thread projectThe board of directors was very satisfied with the first draft of your application and finds it interesting. It therefore gave the IT department the green light to continue the project. 
    Your scrum master, after having discussed it with the product owner, came back to you and now asks you to start making the application more dynamic using a back-end language so that he can integrate a database later on. He would like to integrate the following functionalities first.

### Functional specifications:
    - In order to improve maintainability, the template is no longer duplicated on all pages. It is now broken down into header.php, nav.php, footer.php etc. files loaded on each page.
    - The data for displaying the bank accounts on the home page is now stored in a table (see attached external file), and a loop displays all the accounts. These are no longer hard-coded in HTML 
    - When you click on a bank account, you are taken to a specific page dedicated to the account, which displays only the information for that account. This feature uses data transmission via URL
    - When the user fills in the account creation form and submits the form, the account is created next to the form with the information entered by the user
    
### Technical specifications:
    - PHP 7- Apache2 server
    - Boilerplate base

    The rendering will be done via Teams in the rendering folder you will drop a txt file in your name with the link to your GitHub repository
    
### To go further:
    - Embedding an embryo login form, in fact later you will need to be able to manage the users of the application. Add a login page with a form asking for a login and a password. The login and mdp entered are compared to a login and mdp stored in the file and if they are identical the user is redirected to the application.
    - When creating a bank account apply security checks. For example, check that the type of account is an authorised account type (current, pel, passbook a, perp...). Also check that the minimum amount when opening an account is at least 50 euros.

Translated with www.DeepL.com/Translator (free version)


## "Développeur Web et Web Mobile" - week 13 project * Part 3

Over the course of its iterations, your banking application project grows in size. The application gets structured and starts to exploit data in files. Your scrum master believes that it is now time to integrate a database into the application and thus ensure the persistence but also the integrity of the data.you will have a one-week sprint to design and implement a database. To do this you need to understand how the minimum version of the application will work.

### Functional specifications:
    - The application is only accessible to logged in users 
    - When a user who is not logged in goes to the application he is redirected to a login page with a form 
    - A user logs in using an email address and a password - Once logged in, the user only sees his personal bank accounts 
    - When the user clicks on a bank account, he arrives at a page dedicated to the account where he sees the account information but also the last operations performed on the account
    
### Technical specifications: 
    - DBMS: MySQL

### You will render a SQL file called php_bank. sql. 
    This file should:
    - create a database named php_bank but also delete any pre-existing database named php_bank so that your file can always be imported without conflict 
    - create a user named php_bank and delete any pre-existing user with the same name. You are free to choose his password. This user must only have rights to the banque_php database (in other words, he does not have access to any other databases) 
    - Create the tables necessary for the application with the types of data that you feel are most relevant and efficient 
    - Insert at least 2 rows in each table 
    
    Think carefully about the information that makes up the tables (if necessary, re-read the PDF of the bank project in JS). Other information may also be necessary, for example is it interesting or legally obligatory to know the date of opening an account? Same for an operation carried out on this account... The report will be made via Teams in the report folder. 

Translated with www.DeepL.com/Translator (free version)


## "Développeur Web et Web Mobile" - week 14 project * Part 4

Now that your database is ready, you have a one-week sprint to integrate the following features:

### Functional specifications:
    - The application is accessible only to logged-in users 
    - When a non logged-in user goes to the application he is redirected to a login page with a form 
    - A user logs in with an email address and a password 
    - A logged-in user can log out
    - Once logged in, the user only sees his personal bank accounts. 
    - When the user clicks on a bank account, he or she is taken to a page dedicated to the account where he or she can see the account information and the last operations performed on the account. Once created the account appears on the home page. Please note that the account must meet the minimum requirements for account creation (right type and amount) 
    - The user can make deposits or withdrawals to the account of his choice.  

### Technical specifications:
    - PHP7
    - Using PDO to connect to the database
    - DBMS: Mysql
    - Server: Apache2
    
    You will create a functional tree structure of the site with the pages and the actions that can be performed on these pages.
    
    the rendering will be done via Teams in the folder rendered you will upload a txt file with your name and the link to your GitHub repository. 
    
    Ideally the site is also put online on a shared server
    
### To go further:
    - The user can make transfers from one account to another, which creates two new operations 
    - Error messages may be displayed on the various forms when they are filled out incorrectly 
    - The user can delete the accounts that belong to him 
    - On the home page, for each account the user sees the last operation on that account 
    - The user can access the page of his profile and update his personal information.

Translated with www.DeepL.com/Translator (free version)

## "Développeur Web et Web Mobile" - week 15 project * Part 5

    Begin to restructure this main project towards the MVC pattern and the POO paradigm 

## "Développeur Web et Web Mobile" - week 16 project * Part 5

    Now that your application is online, many bugs and enhancement requests have been reported to your product owner. The project squad is already working on their resolution but the work is more complicated than expected. It is difficult to intervene in the code but also to understand the organization of the application and the implementation of the functionalities.

So a meeting was organized with the project team by the scrum master and you decided to make the application evolve to an object oriented application organized with the MVC pattern.

No new features but your code has to be written in object oriented wherever possible and you re-invoice the application between model view and controller.

As far as SQL queries are concerned, you set up the minimum transactions on the debit and credit operation.

This means you make a class diagram. In order to manage also the progress of the code, you will continue to use the Kanban previously made and that of course you always have now up to date.

To go further :
- Integrate a new table in your application that will store the types of bank accounts allowed and use this table for everything concerning the types of accounts. 
- Among the users, integrate the role of advisor. Indeed all your users are for the moment ordinary users but normally the application would also be accessible to bankers. The bankers have a list of clients from which they can access accounts and information.
 - Offer the logged-in user the possibility to modify his profile information via a form. Some information such as age cannot be changed, but the address for example can be changed.

Translated with www.DeepL.com/Translator (free version)

