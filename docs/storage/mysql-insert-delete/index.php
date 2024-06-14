<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>MySQL Insert / Delete</title>
  <style>
    * {
      font-family: 'Consolas';
    }

    table {
      margin-left: auto;
      margin-right: auto;
      text-align: left;
      border-collapse: collapse;
      border: 2px solid rgb(140 140 140);
      letter-spacing: 1px;
    }

    thead,
    tfoot {
      background-color: rgb(228 240 245);
    }

    th,
    td {
      border: 1px solid rgb(160 160 160);
      padding: 8px 10px;
    }

    tbody>tr:nth-of-type(even) {
      background-color: rgb(237 238 242);
    }
  </style>
</head>

<body>
  <?php // data pre defined
  $url = "localhost";
  $account = "admin";
  $password = "123456";
  $database_name = "new_database";
  ?>
  <table align="center">
    <tr>
      <td>
        <h1>MySQL Insert / Delete</h1>
        <form action="." method="post">
          <table>
            <tr>
              <td>Name:</td>
              <td><input type="text" name="Name"></td>
            </tr>
            <tr>
              <td>ID: </td>
              <td><input type="text" name="ID"></td>
            </tr>
            <tr>
              <td>Score: </td>
              <td><input type="text" name="Score"></td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <button type="submit" name="action" value="Insert">Insert</button>
                <button type="submit" name="action" value="Delete">Delete</button>
              </td>
            </tr>
          </table>
        </form>
      </td>
      <td>
        <?php
        $connection = mysqli_connect($url, $account, $password, $database_name);

        print "Connect Status: ";
        if ($connection) {
          print "<span style=\"color:green\"><u>Success</u></span><hr>";

          if (array_key_exists("action",  $_POST)) {
            if ($_POST["action"] == "Insert") {
              $name = $_POST["Name"];
              $id = $_POST["ID"];
              $score = $_POST["Score"];
              $query_result = $connection->query("INSERT INTO `new_table` (`name`, `id`, `score`) VALUES ('$name', '$id', '$score')");
            } else {
              $name = $_POST["Name"];
              $query_result = $connection->query("DELETE FROM `new_table` WHERE `name` = '$name'");
            }
            // reload without post data
            header("location:{$_SERVER['REQUEST_URI']}");
          }

          print "<table><thead><tr><th>Name</th><td>ID</td><td>Score</td></tr></thead><tbody>";
          $select_result = $connection->query("SELECT * FROM `new_table`");
          while ($row = $select_result->fetch_assoc()) {
            print "<tr><th>{$row["name"]}</th><td>{$row["id"]}</td><td>{$row["score"]}</td></tr>";
          }
          print "</tbody></table>";

          $connection->close();
        } else {
          print "<span style=\"color:red\"><i>Failed<i></span>";
        }
        ?>
      </td>
    </tr>
  </table>
</body>

</html>