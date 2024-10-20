<?php
	include("connectdb.php");
    
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <script src="../assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title></title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('images/88.jpg');
        }
        /* Other styles */
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
		 .card img {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 0.5rem; /* Rounded corners for images */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
        }
        
        .card img:hover {
            transform: scale(1.05); /* Slightly zoom on hover */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Enhanced shadow on hover */
        }

        .card-body {
            padding: 1.25rem; /* More padding for better spacing */
        }
        
        .card-title {
            font-size: 1.25rem; /* Increase title size */
            margin-bottom: 0.5rem; /* Space below title */
            color: #333; /* Darker color for better readability */
        }

        /* Additional styling for the main container */
        .album {
            margin-top: 2rem; /* Space above album section */
        }
        /* Additional styles as needed */
    </style>
</head>
<body>
    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
                id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown"
                aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#sun-fill"></use></svg>
                    Light
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
                    Dark
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#circle-half"></use></svg>
                    Auto
                </button>
            </li>
        </ul>
    </div>

    <header data-bs-theme="dark">
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
              <nav class="navbar navbar-expand-md bg-dark sticky-top">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link btn-red" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn-red" href="view_order.php" style="text-decoration: none;">ประวัติการสั่งซื้อ</a>
        </li>
    </ul>
</nav>

<style>
    .btn-red {
        display: inline-block; /* Makes the link behave like a button */
        padding: 10px 20px; /* Add padding for size */
        background-color: #dc3545; /* Red background */
        color: white; /* White text */
        border-radius: 30px; /* Rounded edges */
        text-decoration: none; /* Remove underline */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow for depth */
        transition: background-color 0.3s, transform 0.3s; /* Smooth transition */
    }

    .btn-red:hover {
        background-color: #c82333; /* Darker red on hover */
        transform: translateY(-2px); /* Lift effect on hover */
    }

    .navbar-nav {
        display: flex; /* Arrange items in a row */
        align-items: center; /* Center items vertically */
    }

    .nav-item + .nav-item {
        margin-left: 5px; /* ลดระยะห่างระหว่างไอเทม */
    }
</style>

            </div>
        </div>
    </header>

    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
              <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light" style="color: white;">I Don't Have CPU</h1>
                    <p class="lead" style="color: white;">ซื้อเลยคอมดีมีคุณภาพ</p>
                    <p>
    <li><a href="logout.php" class="btn btn-danger my-2">ออกจากระบบ</a></li>
</p>

                    <form method="post" action="">
                        ค้นหา <input type="text" name="search" autofocus>
                        <button type="submit" name="submit">OK</button>
                    </form>

                    <div class="mt-3">
                      <?php
                        include("connectdb.php");
                        $sql2 = "SELECT * FROM category ";
                        $rs2 = mysqli_query($conn, $sql2);
                        while ($data2 = mysqli_fetch_array($rs2, MYSQLI_BOTH)) {
                            ?>
                      <a href="productcom.php?pt=<?=$data2['c_id'];?>" class="btn btn-light"><?=$data2['c_name'];?></a>
                        <?php } 
						?>
                    </div>
              </div>
            </div>
        </section>

        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
					
                    @$kw = $_POST['search'];
					if(empty($_GET['pt'])){
                    $sql = "SELECT * FROM product WHERE (p_name LIKE '%{$kw}%' OR p_detail LIKE '%{$kw}%')  ";
					} else {
                    $sql = "SELECT * FROM product WHERE (p_name LIKE '%{$kw}%' OR p_detail LIKE '%{$kw}%') AND c_id='".@$_GET['pt']."' ";
						}
                    $rs = mysqli_query($conn, $sql);
                    while ($data = mysqli_fetch_array($rs)) {
                        ?>
                        <div class="col">
                            <div class="card shadow-sm">
                              <img src="jpg/<?=$data['p_id'];?>.<?=$data['p_ext'];?>" class="card-img-top" alt="<?=$data['p_name'];?>" width='100%' height="480">
                              <div class="card-body">
                                  <p class="card-text">
                                        <?=$data['p_name'];?><br>
                                        <?=$data['p_price'];?><br>
                                </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <p>
    <a href="basket.php?id=<?=$data['p_id'];?>" class="btn btn-sm btn-info">เพิ่มลงรถเข็น</a>
</p>

                                        </div>
                                    </div>
                              </div>
                          </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-body-secondary py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
        </div>
    </footer>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
