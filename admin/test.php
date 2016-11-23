<?php include '../connect.php'; ?>
<?php
    $sql = "SELECT Id, FirstName, LastName FROM user";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
?> 
<!DOCTYPE html>
<html>
    <head>
        <title>PHP MySQL Query Data Demo</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div id="container">
            <h1>Employees</h1>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['Id']); ?></td>
                            <td><?php echo htmlspecialchars($row['FirstName']); ?></td>
                            <td><?php echo htmlspecialchars($row['LastName']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
    </body>
</div>
</html>