![logo](logo.png)
# Pack our products!
## The problem

 The world needs our products to fight the boredom that many of us experience, but how are we supposed to deliver these to our customers? In boxes, of course!

 Partyking needs your help in evaluating whether or not our products will fit in our Boxes. Simple, right?

## The assignment

Create a simple webform with one input field and a button. The input field expects an article number (5-7 characters). 

Upon submitting the form, the User should be notified whether or not the Product (distinguished by article number) fits inside one of the 2 pre-defined Boxes.

All measurements for a product can be fetched from:

    https://www.partykungen.se/{{articleNumber}}.json
See example:
https://www.partykungen.se/40165.json


To evaluate whether or not the product fits inside our boxes, we want you to use the following package ("Packer"): [https://www.boxpacker.io/en/stable/](https://www.boxpacker.io/en/stable/)

  

These are our box-sizes:

| Box        	| Width         | Length  	|  Depth  	| Max_weight  	|
| ------------- |:-------------:| --------:	|---------:	| -------------:|
| XS 	| 120 			| 180 		|  80 		| 5000 		|
| XXL 	| 600			| 600 		| 600 		| 20000 		|

We also want you to style the page using TailwindCSS (https://tailwindcss.com/), since this is what we're using for our website. :)

## The technical

There are only two steps to run the website:

1.  Download the project to the desired directory on your computer
2.  Run  `php -S localhost:8080`  in your terminal. Navigate to  [http://localhost:8080](http://localhost:8080/)  to see the site.
3.  Solve your first problem ;)

In short, we want you to do the following:

1. Prepare routes in PHP to act as an API, serving the front-end with an answer to whether or not the product fits in the box. 
   Evaluation should be done using the BoxPacker-package with information fetched from Partykungen.se.
2. Fetch data through a JavaScript request towards the API.
3. Present the data to the user using TailwindCSS, notifying them whether or not the Product fits in any of our boxes - and if so, which box.

**Finally** (and optionally), we'd be intrigued to learn what **YOU** can do with our product data!

Tap into your creativity and implement something that utilizes the data that you are fetching and blow our minds!

### Good luck, fighter of boredom!

#### Psst!
_Feel free to include any additional libraries of your own. Maybe you want to pimp the front-end by including something cool? Or make your HttpRequests through some framework? Go right ahead!_
