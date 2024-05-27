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