<?php
session_start();
require_once("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>درباره ما</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-rtl.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
</head>
<body>
<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <i class="fal fa-id-card-alt"></i>
                <a class="p-2 text-muted" href="about.php">درباره ما</a>
                <i class="fal fa-comment-alt-edit"></i>
                <a class="p-2 text-muted" href="#">تماس باما</a>
                <a href="cart.php" class="btn btn-info">سبد خرید <i
                            class="badge badge-light"><?php echo isset($_SESSION['products']) ? count($_SESSION['products']) : 0 ?></i>
                </a>
            </div>
            <div class="col-4 text-center">
                <a class="h1 blog-header-logo text-dark" href="index.php">فروشگاه مبلمان</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <div class="btn-group">
                    <?php
                    if (isset($_SESSION['email'])) { ?>
                        <p class="m-0 p-1 text-muted">خوش آمدید <span
                                    class="text-bold"><?php echo $_SESSION['name']; ?></span> عزیز </p>
                        <a class="btn btn-sm btn-outline-info" href="admin/index.php">پنل مدیریت</a>
                        <a class="btn btn-sm btn-outline-info" href="logout.php">خروج</a>
                    <?php } else { ?>
                        <a class="btn btn-sm btn-outline-info" href="register.php">عضویت</a>
                        <button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#login-modal">
                            ورود
                        </button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </header>

    <!-- login modal	-->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ورود به حساب کاربری</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: -1rem">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">ایمیل :</label>
                            <input type="text" name="email" class="form-control" id="recipient-name"
                                   placeholder="ایمیل خود را وارد کنید">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">رمز عبور :</label>
                            <input type="password" name="password" class="form-control" id="recipient-name"
                                   placeholder="رمز عبور خود را وارد کنید">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                            <button type="submit" class="btn btn-primary">ورود</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- end login modal	-->

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex">

            <a class="p-2 text-muted hov-nav" href="index.php"> <i class="fal fa-home-lg"></i> صفحه اصلی</a>
            <?php
            $q = "SELECT * FROM category ORDER BY category_id DESC LIMIT 8";
            $data = mysqli_query($conn, $q);

            while ($row_cat = mysqli_fetch_assoc($data)) {
                ?>
                <a class="p-2 text-muted hov-nav" href="index.php?cat_id=<?php echo $row_cat['category_id'] ?>"> <i
                            class="fal fa-couch"></i> <?php echo $row_cat['name'] ?></a>
            <?php } ?>

        </nav>
    </div>

</div>

<main role="main">
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card mb-4 box-shadow">
                        <div class="row">
                            <div class="offset-3 col-md-6 text-center">
                                <img class="card-img-top w-100" src="images/about.gif" style="height: 150px"
                                     alt="Card image cap">
                            </div>
                            <div class="col-md-12 pb-5">
                                <h6 class="card-text border-bottom pt-5"></h6>
                                <div class="row">
                                    <div class="col-lg-7 mr-3 mt-3">
                                        <p class="card-text d-inline-block"><i class="fal fa-browser"></i> پروژه وبسایت
                                            فروش عروسک با php</p>
                                    </div>

                                    <div class="col-lg-4 mr-3 mt-3">
                                        <h6 class="text-muted d-inline-block"><i class="fal fa-user-graduate"></i> طراحی
                                            و اجرا :</h6>
                                        <h6 class="d-inline-block">گروه فاطمه یاوری</h6>
                                    </div>

                                    <div class="col-lg-7 mr-3 mt-3">
                                        <h6 class="text-muted d-inline-block"><i class="fal fa-user-chart"></i> استاد
                                            مربوط : </h6>
                                        <h6 class="d-inline-block">استاد رجبی</h6>
                                    </div>

                                    <div class="col-lg-4 mr-3 mt-3">
                                        <h6 class="text-muted d-inline-block"><i class="fal fa-file-spreadsheet"></i>
                                            شماره دانشجویی :</h6>
                                        <h6 class="d-inline-block">4001231126</h6>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>
    </div>

</main>

<footer class="text-muted">
    <div class="container">
        <p class="float-left">
            <a href="#">برگشت به بالای صفحه <i class="fal fa-arrow-alt-square-up"
                                               style="font-size: 2rem;color: #0c5460;"></i></a>
        </p>
        <p>
            کليه حقوق محصولات و محتوای اين سایت متعلق به
            <b>فاطمه یاوری</b>
            می باشد
        </p>    </div>
</footer>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
