<?php
$host = 'db';
$db = 'app_db';
$user = 'root';
$pass = 'root';

$dsn = "mysql:host=$host;dbname=$db;";

try {
    // エラーハンドリングを強化
    $dbh = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    // エラーが発生した場合、エラーメッセージを表示
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// SQLの実行
$sql = "SELECT * FROM users";
$stmt = $dbh->prepare($sql);
$stmt->execute();

// 結果を取得
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 結果がない場合の処理
if (empty($result)) {
    echo "No data found";
} else {
    // 結果を表示
    foreach ($result as $item) {
        echo "<h1>" . htmlspecialchars($item['name']) . "</h1>";
    }
}

// データベース接続の切断
$dbh = null;
?>
