from time import sleep

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

    sleep(0.5)
    console.log("關閉連線")
else:
    console.log("連線狀態：[red]Failed[/red]")
