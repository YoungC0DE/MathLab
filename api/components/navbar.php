<style>
    .navbar-nav a {
        position: relative;
    }

    .nav-link::after {
        content: '';
        background-color: #ffffff;
        height: 3px;
        width: 0%;
        left: 0;
        bottom: 0;
        position: absolute;
        transition: .3s;
    }

    .nav-link:hover::after {
        width: 100%;
    }
</style>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="#">
            <i class="bi bi-grid-3x3-gap text-light fs-2 ms-2"></i>
        </a>
        <div class="d-flex flex-row gap-4 navbar-nav">
            <a class="nav-link active" aria-current="page" href="?page=Bhaskara">Bhaskara</a>
            <a class="nav-link active" aria-current="page" href="?page=Fibonacci">Fibonacci</a>
            <a class="nav-link active" aria-current="page" href="?page=MMC">MMC</a>
        </div>
        <a href="https://github.com/YoungC0DE" target="_blank">
            <i class="bi bi-github text-light fs-2 me-2"></i>
        </a>
    </div>
</nav>