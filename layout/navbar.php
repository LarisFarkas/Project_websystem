<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <div class="ms-2">
            <strong class="ms-5 navbar-brand fw-bold">Incident Response Portal</strong>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <?php if (isset($_SESSION['user_id'])): ?>
                <ul class="navbar-nav align-items-center me-3">
                    <li class="nav-item text-white me-4 d-flex align-items-center">
                    <i class="bi bi-person me-2"></i>
    
                    <span>Hello <strong><?= $_SESSION['user_name'] ?></strong></span>
                        </li>
                </ul>

                <form class="d-flex" role="search">
                    <input class="form-control form-control-md me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success btn-md d-flex align-items-center" type="submit">
                        <i class="bi bi-search me-1"></i> Search
                    </button>
                </form>


            <?php endif; ?>
        </div>
    </div>
</nav>