<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users list</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  <div class="container">
    <header>
      <h3><b>Users list</b></h3>
    </header>
    <div class="table-wrapper">
      <table class="table-users">
        <tr>
          <th>Username</th>
          <th>Email</th>
        </tr>
        <?php
        require_once './controler/userContr.php';

        $objeto = new UserContr();
        $users = $objeto->showUsersList();
        foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['username']); ?></td>
            <td><?= htmlspecialchars($user['email']); ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>

</body>
</html>

</body>
</html>