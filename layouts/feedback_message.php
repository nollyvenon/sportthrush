<?php if(isset($message_success)|| $_SESSION['message_success']): ?>
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> <?php echo $message_success; ?>
    <strong>Success!</strong> <?php echo $_SESSION['message_success']; ?>
</div>
<?php endif ?>
<?php if(isset($message_error)||$_SESSION['message_error']): ?>
<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Oops!</strong> <?php echo $message_error; ?>
    <strong>Oops!</strong> <?php echo $_SESSION['message_error']; ?>
</div>
<?php endif;