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
        <a href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="bi bi-list text-light fs-2 me-2"></i>
        </a>
        <div class="d-flex flex-row gap-4 navbar-nav">
            <a class="nav-link active" aria-current="page" href="?page=Bhaskara">Bhaskara</a>
            <a class="nav-link active" aria-current="page" href="?page=Fibonacci">Fibonacci</a>
            <a class="nav-link active" aria-current="page" href="?page=Torricelli">Torricelli</a>
        </div>
        <a href="https://github.com/YoungC0DE" target="_blank">
            <i class="bi bi-github text-light fs-2 me-2"></i>
        </a>
    </div>
    <div class="offcanvas offcanvas-start bg-dark text-light" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
            <button type="button" class="btn-close bg-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            
        </div>
    </div>
</nav>