<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      min-height: 100vh;
      width: 100%;
      display: flex;
      gap: 2rem;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background: #1957A8;
    }

    form {
      background-color: #faf3e7;
      border-radius: 16px;
      overflow: hidden;
    }

    form>span>input {
      background: transparent;
      border: transparent;
      outline: transparent;
      padding: 12px 16px;

    }

    form>button {
      color: #1957A8;
      background: #F5B53D;
      border: none;
      padding: 12px 16px;
      border-radius: 0px 16px 16px 0px;
      padding: 12px 16px;
    }

    form>button:hover {
      background: #A87108;
      color: #faf3e7;
      cursor: pointer;
    }

    table {
      border: #e8a21f 2px solid;
    }

    th {
      background-color: #e8a21f;
    }

    tr {
      background-color: #faf3e7;
    }

    tr:nth-child(even) {
      background-color: #D6EEEE;
    }
  </style>
</head>

<body>
  <form action="actions.php" method="post">
    <span>
      <input id="url" name="url" type="text" placeholder="Type your url here to shortin">
    </span>
    <button type="submit" name="submit">Send</button>
  </form>
  <table>
    <tr>
      <th>Hash</th>
      <th>Original Link</th>
      <th>Created at</th>
    </tr>
    <?php
    $db = new PDO('sqlite:db.db', '', '', [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);

    $query = $db->query("select rowid, * from urls");
    $users = $query->fetchAll();
    foreach ($users as $key => $user) {
      echo "<tr>";
      echo "<td><a href='link.php?url=". $user->hash."'> " . $user->hash . "</a> </td>";
      echo "<td>" . $user->original_url . "</td>";
      echo "<td>" . $user->created_at . "</td>";
      echo "</tr>";
    };
    ?>
  </table>

</body>

</html>