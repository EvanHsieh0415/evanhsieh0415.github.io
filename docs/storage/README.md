# 儲存庫

## MySQL 連線

### C#

[`mysql-connection.cs`](https://raw.githubusercontent.com/EvanHsieh0415/evanhsieh0415.github.io/main/data/mysql-connection/mysql-connection.cs)

<details><summary>程式碼</summary>

```cs
using System;
using MySql.Data.MySqlClient;  // 安裝套件 NuGet -> MySql.Data

namespace mysql_connection
{
    class Program
    {
        static void Main(string[] args)
        {
            string host = "localhost";
            string user = "admin";
            string password = "123456";
            string database_name = "new_database";

            string connectString = $"Server={host}; Database={database_name}; Uid={user}; Pwd={password};";
            try
            {
                using (MySqlConnection connection = new MySqlConnection(connectString))
                {
                    Console.WriteLine("開啟連線中...");
                    connection.Open();
                    Console.WriteLine("連線成功");

                    MySqlCommand command = new MySqlCommand("SELECT * FROM `new_table`", connection);
                    MySqlDataReader data = command.ExecuteReader();

                    Console.WriteLine($"| {"Name",-10} | {"Score",-10} |");
                    while (data.Read())
                    {
                        Console.WriteLine($"| {data["name"],-10} | {data["score"],-10} |");
                    }

                    connection.Close();
                    Console.WriteLine("關閉連線");
                }
            }
            catch (MySqlException exception)
            {
                Console.WriteLine("連線失敗: " + exception.Message);
            }
        }
    }
}
```
</details>

### PHP

[`mysql-connection.php`](https://raw.githubusercontent.com/EvanHsieh0415/evanhsieh0415.github.io/main/data/mysql-connection/mysql-connection.php)

<details><summary>程式碼</summary>

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My SQL Connection</title>
    <style>
        table {
            text-align: left;
            border-collapse: collapse;
            border: 2px solid rgb(140 140 140);
            font-family: monospace;
            letter-spacing: 1px;
            }
        thead, tfoot {
            background-color: rgb(228 240 245);
        }
        th, td {
            border: 1px solid rgb(160 160 160);
            padding: 8px 10px;
        }
        tbody > tr:nth-of-type(even) {
            background-color: rgb(237 238 242);
        }
    </style>
</head>
<body>
    <div align="center">
    <?php
    $url = "localhost";
    $account = "admin";
    $password = "123456";
    $database_name = "new_database";

    $connection = mysqli_connect($url, $account, $password, $database_name);

    print "連線狀態：";
    if ($connection) {
        print "<span style=\"color:green\">Success</span><hr>";
        
        print "<table><thead><tr><th>name</th><td>score</td></tr></thead><tbody>";
        $select_result = $connection -> query("SELECT * FROM `new_table`");
        while ($row = $select_result -> fetch_assoc()) {
            print "<tr><th>" . $row["name"] . "</th><td>" . $row["score"] . "</td></tr>";
        }
        print "</tbody></table><hr>";

        $connection -> close();
        print "連線已關閉";
    } else {
        print "<span style=\"color:red\">Failed</span>";
    }
    ?></div>
</body>
</html>
```
</details>

### Python

[`mysql-connection.py`](https://raw.githubusercontent.com/EvanHsieh0415/evanhsieh0415.github.io/main/data/mysql-connection/mysql-connection.py)

<details><summary>程式碼</summary>

```py
import pymysql
from rich.console import Console
from rich.table import Table

console = Console()

CONFIG = {
    "host": "localhost",
    "user": "admin",
    "password": "123456",
    "database": "new_database",
}

database_connection = pymysql.connect(**CONFIG)

if database_connection.open:
    console.log("連線狀態：[green]Success[/green]")
    cursor = database_connection.cursor()
    cursor.execute("SELECT * FROM `new_table`")
    select_result = cursor.fetchall()

    table = Table(show_header=True, header_style="bold magenta")
    table.add_column("Name", style="bold")
    table.add_column("Score")
    for data in select_result:
        table.add_row(*map(str, data))
    console.log(table)

    database_connection.close()
    console.log("關閉連線")
else:
    console.log("連線狀態：[red]Failed[/red]")
```
</details>

:::tip
記得安裝[套件](https://raw.githubusercontent.com/EvanHsieh0415/evanhsieh0415.github.io/main/data/mysql-connection/requirements.txt)！

```
PyMySQL
rich
```
:::


## MySQL 增加 / 刪除

### C#

<a href="https://drive.google.com/file/d/1H0WFupu3RWrNZWW7SMifsBj2BEsHZbSP/view?usp=sharing" target="_blank">mysql-connection-vs.zip (outbound)</a>

### PHP

[index.php](https://raw.githubusercontent.com/EvanHsieh0415/evanhsieh0415.github.io/main/data/mysql-insert-delete/index.php)

<details><summary>程式碼</summary>

```php
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
```
</details>
