<?php
session_start();
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
    <title>Product example · Bootstrap v5.3</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/product/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bg-custom {
            background-image: url('images/65.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 5rem 0;
        }

        .card img {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card img:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .card-body {
            padding: 1.25rem;
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .album {
            margin-top: 2rem;
        }
    </style>

    <link href="product.css" rel="stylesheet">
</head>
<body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <!-- SVG definitions... -->
    </svg>

    <nav class="navbar navbar-expand-md bg-dark sticky-top border-bottom" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand d-md-none" href="#">Aperture</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasLabel">Aperture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav flex-grow-1 justify-content-center">
                    <li class="nav-item">
    <div class="dropdown">
        <a href="#" class="nav-link dropdown-toggle btn-blue" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">เข้าสู่ระบบ</a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
            <li><a class="dropdown-item" href="signin1.php">เข้าสู่ระบบลูกค้า</a></li>
            <li><a class="dropdown-item" href="signin.php">เข้าสู่ระบบ Admin</a></li>
            <li ><a class="dropdown-item" href="logout.php">ออกจากระบบ</a> </li>
             <li ><a class="dropdown-item" href="memberedit.php?id=2" >แก้ไขข้อมูลลูกค้า</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link btn-blue" href="productcom.php">คอมพิวเตอร์</a>
</li>
<li class="nav-item">
    <a class="nav-link btn-blue" href="tidtor.php">ติดต่อเรา</a>
</li>
<li class="nav-item">
    <a class="nav-link btn-blue" href="member.php">สมัครสมาชิก</a>
</li>

<style>
    .btn-blue {
        display: inline-block; /* Makes the link behave like a button */
        padding: 10px 20px; /* Add padding for size */
        background-color: #007bff; /* Blue background */
        color: white; /* White text */
        border-radius: 30px; /* Rounded edges */
        text-decoration: none; /* Remove underline */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow for depth */
        transition: background-color 0.3s, transform 0.3s; /* Smooth transition */
    }

    .btn-blue:hover {
        background-color: #0056b3; /* Darker blue on hover */
        transform: translateY(-2px); /* Lift effect on hover */
    }

    .dropdown-menu {
        padding: 0; /* Remove padding for dropdown items */
    }

    .dropdown-item {
        padding: 10px 20px; /* Add padding for dropdown items */
    }
</style>

                    <li class="nav-item d-flex align-items-right">
                        <span class="navbar-text text-white mx-3" style="text-align: center; width: 100%;">
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo "ชื่อผู้ใช้งาน: " . htmlspecialchars($_SESSION['username']);
                            } else {
                                echo "ชื่อผู้ใช้งาน: ";
                            }
                            ?>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

    </span>
</li>

                                            </span>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </nav>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-custom">
            <div class="col-md-6 p-lg-5 mx-auto my-5">
                <h1 class="display-3 fw-bold">ร้าน I DON'T HAVE CPU</h1>
                <h3 class="fw-normal text-muted mb-3" style="color:#F3C;"></h3>

                <div class="d-flex gap-3 justify-content-center lead fw-normal">
                    <a class="icon-link" href="#">
                        
                        <svg class="bi"><use xlink:href="#chevron-right"/></svg>
                    </a>
                    <a class="icon-link" href="#">
                        
                        <svg class="bi"><use xlink:href="#chevron-right"/></svg>
                    </a>
                </div>
            </div>
            <div class="album py-5 bg-body-tertiary">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-3">
                                <?php
                                    @$kw = $_POST['search'];
                                    $sql = "SELECT * FROM `product` WHERE (p_name LIKE '%{$kw}%' OR p_detail LIKE '%{$kw}%')";
                                    $rs = mysqli_query($conn, $sql);
                                    while ($data = mysqli_fetch_array($rs)) {
                                ?>
                                <div class="col d-flex justify-content-center">
                                    <div class="card text-center" style="width: 22rem; height: 100%;">
                                        <img src="jpg/<?=$data['p_id'];?>.<?=$data['p_ext'];?>"
                                             class="card-img-top"
                                             onClick="window.location='detail.php?id=<?= $data['p_id']; ?>';"
                                             style="height: 480px; object-fit: cover;">
                                        <div class="card-body">
                                            <h5 class="card-title" onClick="window.location='detail.php?id=<?= $data['p_id']; ?>';">
                                                <?= htmlspecialchars($data['p_name']); ?>
                                            </h5>
                                            <p>ราคา <?= $data['p_price']; ?> บาท</p>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3"></div>
        </div>
    </main>

    <footer class="container py-5">
        <div class="row">
            <div class="col-12 col-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
                <small class="d-block mb-3 text-body-secondary"></small>
            </div>
        </div>
    </footer>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
