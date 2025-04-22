<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
    <div class="text-center mb-4">
      <img src="media/logo/logo.png" alt="Logo" class="img-fluid mb-2" style="max-height: 80px;">
      <h2 class="h4">Welcome to Incident Response Portal!</h2>
      <p class="text-muted mb-0">Keep your data safe!</p>
    </div>

    <?php if (!empty($message)): ?>
      <div class="alert alert-danger"><?= $message ?></div>
    <?php endif; ?>

    <form method="post" action="login.php">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>

    <div class="mt-3 text-center">
      <a href="#" class="text-decoration-none">Forgot password?</a>
    </div>

    <div class="text-center mt-2">
      <p class="mb-0">Don't have an account? <a href="register.php">Register!</a></p>
    </div>
  </div>
</div>
