 <?php 
 $host = "localhost";
 $dbname = "tasks";
 $user = "root";
 $pass = "";
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
?>