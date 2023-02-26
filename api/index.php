<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <!---->
    <title>MathLab</title>
</head>

<body class="w-100 vh-100">
    <?php include_once('components/navbar.php'); ?>

    <div class="mt-5 d-flex flex-column justify-content-center align-items-center">
        <?php
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {
                case "Bhaskara":
                    include_once('pages/Bhaskara.php');
                    break;
                case "Fibonacci":
                    include_once('pages/Fibonacci.php');
                    break;
                case "Torricelli":
                    include_once('pages/Torricelli.php');
                    break;
                default:
                    include_once('pages/Bhaskara.php');
                    break;
            }
        } else {
            include_once('pages/Bhaskara.php');
        }
        ?>
    </div>
    <footer class="d-flex flex-column justify-content-center align-items-center mt-5">
        <span>Developer by <a href="https://github.com/YoungC0DE" class="text-decoration-none">Rafael Anjos</a></span>
        <span>YoungC0DE</span>
    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>