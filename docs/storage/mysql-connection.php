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