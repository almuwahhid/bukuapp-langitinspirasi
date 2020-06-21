<div class="col-sm-12">
    <div class="alert  alert-<?= $_GET['success'] == "true" ? "success":"danger"?> alert-dismissible fade show" role="alert">
        <span class="badge badge-pill badge-<?=$_GET['success'] == "true" ? "success":"danger"?>">
          <?= $_SESSION['SUCCESS_MESSAGE'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
