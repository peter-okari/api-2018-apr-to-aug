## Webservices

![](resources/chirp.jpg)
[@source](https://images.reference.com/reference-production-images/question/aq/700px-394px/can-birds-stop-chirping_c2b2adb0c4a22e64.jpg)

Historically, every time there’s been a need for two systems to communicate, a new
protocol has been created (for example, SMTP for sending mail, POP3 for receiving
mail, and the numerous protocols that database clients and servers use). The idea of
web services is to remove the need to create new protocols by providing a standardized
mechanism for remote procedure calls, based on XML and HTTP.

Web services make it easy to integrate heterogeneous systems. Say you’re writing a web
interface to a library system that already exists. It has a complex system of database
tables, and lots of business logic embedded in the program code that manipulates those
tables. And it’s written in C++. You could reimplement the business logic in PHP,
writing a lot of code to manipulate tables in the correct way, or you could write a little
code in C++ to expose the library operations (e.g., check out a book to a user, see when
this book is due back, see what the overdue fines are for this user) as a web service.
Now your PHP code simply has to handle the web frontend; it can use the library service
to do all the heavy lifting.

#### 👉 [Webservices explained [8:13]](https://www.linkedin.com/learning/programming-foundations-web-services/what-is-a-web-service) 👉 Watch 👈 👍

##### @TODO : Tizi 🤔
1. What is a webservice?
2. What message formats are used in webservices?
3. What are the advantages and disadvantages of using webservices?
4. What is a service oriented architecture?
5. Distinguish webservice message formats and webservice standards.

### [Understanding REST - How it works ](https://spring.io/understanding/REST) 😃 😃

### Consuming REST
1. AJAX (Asynchronous Javascript  and XML)

  AJAX allows web pages to be updated asynchronously by exchanging data with a web server behind the scenes. This means that it is possible to update parts of a web page, without reloading the whole page.

  How ajax works
![  ](resources/ajax.gif)


1  |  An event occurs in a web page (the page is loaded, a button is clicked)
--|--
2  |  An XMLHttpRequest object is created by JavaScript
3  |  The XMLHttpRequest object sends a request to a web server
4  |  The server processes the request
5  |  The server sends a response back to the web page
6  |  The response is read by JavaScript
7  |   Proper action (like page update) is performed by JavaScript

[@source](https://www.w3schools.com/xml/ajax_intro.asp)

##### @TODO : Tizi 🤔

1. Consider the following REST endpoint;
  1. [https://jsonplaceholder.typicode.com/posts](https://jsonplaceholder.typicode.com/posts) - Returns all posts
2. Write a simple ajax code that consumes the above RESTful API and displays the total number of posts as an alert.
3. Rewrite the above using jQuery Ajax.

##### Kumbushaa

> Send SMS reminders
(Africas Talking API) of events
based on your google calendar
event (dates only) to your best
friend.

1. Register for an account on [Africas Talking](https://africastalking.com/)
2. Create a [sandbox api_key](https://account.africastalking.com/apps/sandbox/settings/key)
3. [Set 'things' up on Google](https://developers.google.com/api-client-library/php/start/get_started)
4. Start coding 😃

We will continue developing the laravel app
- First, once a user signs in, we can send them a notification(Ideally this would be a code- consider 2-factor authentication)
- We will then proceed to use our google calendar events(filtered) to send a reminder to our best friend. 😃 😃

### References

- [Programming PHP. Kevin Tatroe, Peter MacIntyre and Rasmus Lerdorf (2013)](http://shop.oreilly.com/product/0636920012443.do)

>_"" ✍ ✍
