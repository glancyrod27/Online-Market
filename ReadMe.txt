ReadMe for online_market

1. index.php is first page where user will login and give keyword for product he is interested in buying.
  after submitting form it takes to products.php page.
2. products.php will check username user has entered on first page .
  if username not present in database then it will give error.
  based on keyword given on index page it will search for the name of products matching in database.
  if no keyword is given then it will print all products and related information.
  user can give keyword and search for product on this page as well.
  products which are discontinued or backordered are not allowed to order. System will allow to order any product whose status is not discontinued or backordered.
  after clicking on order button for particular product it will take to purchase page.
3. purchase.php will check product name in database. if it is ordered previously and status is pending then system will find current price of product from product table in database and add the current price to purchase, increment quantity by 1 and print current timestamp.
  if product is not ordered previously or ordered but status is not pending then make new entry in purchase table with current time , current price of product and quantity as 1.
  after completing database updates system will give message as successful order and ask user if he wants to view his cart.
  if user selects view cart control will be given to show_cart.php
4. show_cart.php shows all the purchases made by user who has logged in. 
