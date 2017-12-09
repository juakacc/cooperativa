<?php if (isset($_SESSION['msg'])): ?>
    <div class="row">
        <div class="col">
            <p class="msg"><?php echo $_SESSION['msg']; ?></p>
        </div>
    </div>
    <?php unset($_SESSION['msg']); ?>
<?php endif; ?>