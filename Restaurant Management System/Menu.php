<!DOCTYPE html>
<html>
    <head>
        <style>
            header {
			      background-color: #e1eced;
			      padding: 20px;
			      box-shadow: 0 2px 5px rgba(24, 7, 175, 0.1);
			      font-family:Verdana, Geneva, Tahoma, sans-serif;
            text-align:center;
            width:100%;
          }
    nav {
			display: flex;
			justify-content: center;
			align-items: center;
			background-color: #20024b8b;
			padding: 10px;
      width:1515px;
			margin:0px 0px;
		}
		nav a {
			color: #fff;
			text-decoration: none;
			padding: 10px 20px;
      font-family:Verdana, Geneva, Tahoma, sans-serif;
			margin: 0 10px;
			font-size: 18px;
		}
		nav a:hover {
			background-color: #eae8ebf6;
			color: #3a042f;
			border-radius: 5px;
		}
    .menu {
       width: 1500px;
       margin: 10px 20px;
       text-align: center; 
       font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
    }
    .food-catalog {
       display: flex;
       flex-wrap:wrap;
       justify-content:space-between;
     }
    .food-item {
       width: 20%;
       margin-top:10px;
       margin-bottom: 20px;
       background-color: #f2f2f2bd;
       border: 1px solid #ccc;
       border-radius: 8px;;
       padding: 20px;
      }
      .food-item img {
         width: 100%;
         height: auto;
         margin-bottom: 20px;
        } 
      .food-item h3 {
        font-size: 25px;
        margin-bottom: 10px;
       }
      .food-item .description {
        font-size: 18px;
        margin-bottom: 30px;
        }
      .food-item .price {
         font-size: 20px;
       }
       .food-item p{
            font-size:15px;
       }
      button{
        margin:5px;
        text-align:center;
        padding:10px;
        background-color:rgb(5, 48, 57);
        color:white;
        font-family:Verdana, Geneva, Tahoma, sans-serif;
        font-size:20px;
        box-shadow: 0 2px 5px rgba(24, 7, 175, 0.1);
        border: 1px solid #ccc;
        border-radius:10px;
        width:50%;
         }
         input{
          display: none;
         }
        footer {
			background-color: #333;
			color: #fff;
      font-family:Arial, Helvetica, sans-serif;
			text-align: center;
			padding:10px;
		}
    </style>
    </head>
    <body>
        <header>
            <h1>Food Catalogue</h1>
          </header>
        <nav>
            <a href="Main.php">Home</a>
            <a href="Menu.php">Menu</a>
            <a href="#">Contact Us</a>
            <a href=ulogin.php>Logout</a>
            <a href="dele.php">Cancel Order</a>
            <a href="Update.php">Update Order</a>
        </nav>
        <div class="menu">
            <div class="food-catalog">
              <div class="food-item">
              <form method="post" action="Order.php">
                <img src="Mimg3.jpg" alt="sauage">
                <h3 id="food1">Sauage</h3>
                <input type="text" name="foodname" value="Sauage">
                <p class="description">A delicious food!! </p>
                <p id="price1">120</p>
                <input type="text" name="price" value="120">
                <button class="button" >Order</button>
               </form>
              </div>
              <div class="food-item">
              <form method="post" action="Order.php">
                <img src="Mimg7.jpg" alt="dessert">
                <h3 id="food2">Dessert</h3>
                <input type="text" name="foodname" value="Dessert">
                <p class="description">It Melts you heart</p>
                <p id="price2">150</p>
                <input type="text" name="price" value="150">
                <button class="button">Order</button>
               </form>
              </div>
              <div class="food-item">
              <form method="post" action="Order.php">
                <img src="Mimg9.jpg" alt="fish">
                <h3 id="food3">Fish</h3>
                <input type="text" name="foodname" value="Fish">
                <p class="description">A Spicy One!!!</p>
                <p id="price3">100</p>
                <input type="text" name="price" value="100">
                <button class="button">Order</button>
                </form>
              </div>
              <div class="food-item">
              <form method="post" action="Order.php">
                <img src="Mimg16.jpg" alt="mock">
                <h3 id="food4">Lemonde & Mocktail</h3>
                <input type="text" name="foodname" value="Lemonde & Mocktail">
                <p class="description">It qunch Your thirst</p>
                <p id="price4">120</p>
                <input type="text" name="price" value="120">
                <button class="button">Order</button>
                </form>
              </div>
              <div class="food-item">
              <form method="post" action="Order.php">
              <img src="Burger.jpg" alt="Pasta">
                <h3 id="food5">Burger</h3>
                <input type="text" name="foodname" value="Burger">
                <p class="description">A hearty dish of pasta served</p>
                <p id="price5">112</p>
                <input type="text" name="price" value="112">
                <button class="button">Order</button>
                </form>
              </div>
              <div class="food-item">
              <form method="post" action="Order.php">
                <img src="Mimg18.jpg" alt="Pasta">
                <h3 id="food6">Mocktail</h3>
                <input type="text" name="foodname" value="Mocktail">
                <p class="description">Yummy!!!</p>
                <p id="price6">120</p>
                <input type="text" name="price" value="120">
                <button class="button">Order</button>
                </form>
              </div>
              <div class="food-item">
              <form method="post" action="Order.php">
                <img src="Burger.jpg" alt="Pasta">
                <h3 id="food7">Cheese Burger</h3>
                <input type="text" name="foodname" value="Cheese Burger">
                <p class="description">Yummy!!!</p>
                <p id="price7">120</p>
                <input type="text" name="price" value="120">
                <button class="button">Order</button>
                </form>
              </div>
              <div class="food-item">
              <form method="post" action="Order.php">
                <img src="Chicken.jpg" alt="Pasta">
                <h3 id="food8">Chicken 65</h3>
                <input type="text" name="foodname" value="Chicken 65">
                <p class="description">Yummy!!!</p>
                <p id="price8">120</p>
                <input type="text" name="price" value="120">
                <button class="button">Order</button>
                </form>
              </div>
              <div class="food-item">
              <form method="post" action="Order.php">
                <img src="Panneer.jpg" alt="Pasta">
                <h3 id="food9">Panneer Butter Masala</h3>
                <input type="text" name="foodname" value="Panneer Butter Masala">
                <p class="description">Yummy!!!&Spicy!!!</p>
                <p id="price9">120</p>
                <input type="text" name="price" value="120">
                <button class="button">Order</button> 
                </form>
              </div>
              <div class="food-item">
              <form method="post" action="Order.php">
                <img src="Paneert.jpg" alt="Pasta">
                <h3 id="food10">Paneer Tikka Masala</h3>
                <input type="text" name="foodname" value="Naan&Paneer Tikka Masala">
                <p class="description">Cheesy!!!</p>
                <p id="price10">120</p>
                <input type="text" name="price" value="120">
                <button class="button">Order</button>
                </form>
              </div>
              <div class="food-item">
              <form method="post" action="Order.php">
                <img src="Barbeque.jpg" alt="Pasta">
                <h3 id="food11">Barbeque Chicken</h3>
                <input type="text" name="foodname" value="Barbeque Chicken">
                <p class="description"> Hot and Spicy!!!</p>
                <p id="price11">120</p>
                <input type="text" name="price" value="120">
                <button class="button">Order</button>
                </form>
              </div>
              <div class="food-item">
              <form method="post" action="Order.php">
                <img src="Chickent.jpg" alt="Pasta">
                <h3 id="food12">Chicken Tikka</h3>
                <input type="text" name="foodname" value="Chicken Tikka">
                <p class="description">Yummy!!!</p>
                <p id="price12">120</p>
                <input type="text" name="price" value="120">
                <button class="button">Order</button>
                </form>
              </div>
            </div>
          </div>
        </form>
        <footer>
		       <p>&copy; 2023 Delicious Restaurant. All rights reserved.</p>
	      </footer>
    </body>
</html>
