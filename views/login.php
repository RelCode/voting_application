<div class="container" id="main-container">
    <form action="" method="post" class="row row-block pt-5" id="form">
        <?= isset($_SESSION['validation']['id_number']) ? 
            '<div class="col-xs-12 col-md-4 offset-md-4"><span class="text text-danger">'.$_SESSION['validation']['id_number'].'</span></div>' : '' 
        ?>
        <div class="col-xs-12 col-md-4 offset-md-4 input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
            </div>
            <input type="type" name="id_number" maxlength="13" class="form-control must-fill" placeholder="Enter ID Number" value="<?= isset($_SESSION['old']['id_number']) ? $_SESSION['old']['id_number'] : '' ?>" autocomplete="off">
        </div>
        <div class="col-xs-12 col-md-4 offset-md-4 input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" name="pin" maxlength="4" class="form-control must-fill" placeholder="Enter Password">
        </div>
        <div class="col-xs-12 col-md-4 offset-md-4 input-group mb-3">
            <input type="submit" name="login" class="form-control btn btn-primary" value="Login">
        </div>
        <?= isset($_SESSION['alert']['message']) ? '<div class="col-xs-12 col-md-4 offset-md-4 text-center">
            <h5 class="text text-'.$_SESSION['alert']['class'].'">' . $_SESSION['alert']['message'] . '</h5>
        </div>' : ''; ?>
    </form>
</div>