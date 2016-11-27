<!DOCTYPE html>
<html>
<head><title>PRG Pattern Demonstration</title>

<body>
    <?php echo $_POST['shout'] ?>
    <form action="echochamber.php" method="POST">
        <input type="text" name="shout" value="" />
    </form>
</body>
</html>