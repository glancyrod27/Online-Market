<html>
    <head>
        <title>Online Market Index</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
      <div class="w3-card-4">
        <div class="w3-container w3-brown">
        <h2>Welcome to Online Market</h2>
      </div>
            <form action="products.php" method="POST">
              <p>
              <label class="w3-text-brown"><b>Enter Username:</b></label>
              <input class="w3-input w3-border w3-sand" name="username" type="text" required></p>
              <p>
              <label class="w3-text-brown"><b>Enter keyword:</b></label>
              <input class="w3-input w3-border w3-sand" type="text" name="keyword"/> </p>

                <input type="hidden" name="parameter" value="First_Page">
                <p><input class="w3-btn w3-brown" type="submit" value="Search"/></p>
            </form>
          </div>
    </body>
</html>
