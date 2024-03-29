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
    <div class="w-100 d-flex flex-row justify-content-center align-items-center">
        <div class="d-flex flex-row gap-4 navbar-nav">
            <a class="nav-link active" aria-current="page" href="?page=Bhaskara">Bhaskara</a>
            <a class="nav-link active" aria-current="page" href="?page=Fibonacci">Fibonacci</a>
            <a class="nav-link active" aria-current="page" href="?page=Torricelli">Torricelli</a>
        </div>
    </div>
</nav>