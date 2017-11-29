<form action="process" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="text" name="fname"/>
    <input type="text" name="lname"/>
    <input type="submit" name="submit"/>
</form>