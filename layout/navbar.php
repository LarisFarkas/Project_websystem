<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <div class="ms-4">
            <strong class=" ms-5 navbar-brand fw-bold">Incident Response Portal</strong>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <?php if (isset($_SESSION['user_id'])): ?>
                <ul class="navbar-nav align-items-center me-3">
                    <li class="nav-item text-white me-3">
                        Logged in as <strong><?= $_SESSION['user_name'] ?></strong>
                    </li>
                    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                        <li class="nav-item me-2">
                            <a href="register.php" class="btn btn-info btn-sm">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>

                <form class="d-flex me-3" role="search">
                    <input class="form-control form-control-sm me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success btn-sm" type="submit">Search</button>
                </form>


            <?php else: ?>
                <div class="d-flex gap-2">
                    <a href="login.php" class="btn btn-success btn-sm">Login</a>
                    <a href="register.php" class="btn btn-info btn-sm">Register</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>