<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sell</title>
  <link rel="stylesheet" href="Sell-page.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;600;800&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet" />
  <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png" />
  <link rel="icon" href="favicon/favicon.ico" />
  <link rel="manifest" href="favicon/site.webmanifest" />
  <script src="https://kit.fontawesome.com/6a4151cb09.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <div class="nav">
      <div class="top-section">
        <div class="logo" id="landing">
          <a href="#" class="logo">
            <img src="logo/eduMarket.svg" alt="site name" width="200" height="100" />
          </a>
        </div>
        <div class="container">
          <div class="search_wrap search_wrap_1">
            <div class="search_box">
              <input type="text" class="input" placeholder="search for products and categories" />
              <div class="btn btn_common">
                <i class="fa-solid fa-magnifying-glass"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="top-icons">
          <div class="top-right-icons">
            <a href="#">
              <i class="fa-regular fa-heart"></i>
              <p>Wishlist</p>
            </a>
          </div>
          <div class="top-right-icons">
            <a href="#">
              <i class="fa-regular fa-user"></i>
              <p>Account</p>
            </a>
          </div>
        </div>
      </div>
      <div class="bottom-section">
        <div class="left-navbar">
          <ul class="navbar1">
            <li><a href="#">Top Sellers</a></li>
            <li><a href="#">Electronics</a></li>
            <li><a href="#">Appliances</a></li>
            <li><a href="#">Furniture</a></li>
            <li><a href="#">Books</a></li>
            <li><a href="#">other</a></li>
          </ul>
        </div>
        <div class="right-navbar">
          <ul class="navbar2">
            <li><a href="#">Chats</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <section class="selling-page">
    <div class="selling-heading">
      <h2 class="head">Product Information</h2>
    </div>
    <div class="selling-main">
      <div class="right-side">
        <form method="post" action="php/process-sell.php" enctype="multipart/form-data">
          <div class="form-field">
            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productName" />
          </div>
          <div class="form-field">
            <label for="price">Price:</label>
            <input type="text" id="price" name="productprice" />
          </div>
          <div class="form-field">
            <label for="condition">Condition:</label>
            <input type="text" id="condition" name="productcondition" />
          </div>
          <div class="form-field">
            <label for="category">Category:</label>
            <select id="category" name="productcategory">
              <option value="Appliances">Appliances</option>
              <option value="Electronics">Electronics</option>
              <option value="Furniture">Furniture</option>
              <option value="Books">Books</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="form-textarea">
            <label for="description">Description:</label>
            <textarea id="description" name="productdescription" rows="5"></textarea>
          </div>
          <div class="image_section">
            <h2 class="selling">Product Image</h2>
          </div>
          <div class="image-field">
            <input type="file" id="image" name="image" accept="image/*" class="image-style" title="choose File" />
          </div>
          <div class="bottom_submit">
            <input type="submit" name="sell_product" value="Add Product" class="submit-button" />
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>