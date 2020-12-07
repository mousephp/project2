
<?php
if (isset($_SESSION['loged'])) { ?>
 <div class="alert alert-danger text-center">
    <?php
    echo $_SESSION['loged'];
    unset($_SESSION['loged']);
} ?>
</div>



<?php if (isset($_SESSION['success'])): ?>
  <div class="alert alert-success">
    <?php
    echo $_SESSION['success'];
    unset($_SESSION['success']);
    ?>
</div>
<?php endif ?>

<?php if (isset($_SESSION['error'])): ?>
  <div class="alert alert-error">
    <?php
    echo $_SESSION['error'];
    unset($_SESSION['error']);
    ?>
</div>
<?php endif ?>

<?php if (isset($this->error)
&& !empty($this->error)): ?>
<div class="alert alert-danger text-center">
    <?php
    echo $this->error;
    ?>
</div>
<?php endif ?>
