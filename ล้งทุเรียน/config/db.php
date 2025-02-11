<?php
$serverName = "LAPTOP-3D1BJBN0";
$databaseName = "DurianSales";
$username = "sa"; // ใส่ชื่อผู้ใช้ SQL Server ของคุณ
$password = "meen6530"; // ใส่รหัสผ่าน SQL Server ของคุณ

try {
  $conn = new PDO("sqlsrv:Server=$serverName;Database=$databaseName;");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully"; // ทดสอบการเชื่อมต่อได้โดย uncomment บรรทัดนี้
} catch(PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
?>