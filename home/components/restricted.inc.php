<style>
    body {
      background-color: #f8f9fa;
    }
    .restricted-page {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
</style>
<div class="restricted-page">
    <div class="text-center">
        <h1 class="display-4 text-danger">403 - Access Denied</h1>
        <p class="lead">You do not have permission to view this page.</p>
        <a href="<?= $root ?>" class="btn btn-warning mt-3">Return to Home</a>
    </div>
</div>