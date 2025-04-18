<?php
// Namespace des classes de la base de donnée
namespace bd;
include('config.php');

// Classe GestionBD comme demandée
class GestionBD {
    public $pdo;

    /**
     * Établit une connexion à la base de données
     */
    public function connexion() {
        try {
            $this->pdo = new \PDO("pgsql:host=" . SERVERNAME . ";port=" . PORT . ";dbname=" . DBNAME, USERNAME, PWD);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            // echo "✅ Connexion réussie à la base de données.<br>";
        } catch (\PDOException $e) {
            die("❌ Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    /**
     * Récupère et liste les tables de la base
     */
    public function listTables() {
        if (!$this->pdo) {
            // echo "⚠️ Connexion non établie. Veuillez d'abord appeler connexion().";
            return;
        }

        try {
            $sql = "SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $tables = $stmt->fetchAll(\PDO::FETCH_COLUMN);

            return $tables;
            // Affichage supprimé
        } catch (\PDOException $e) {
            // echo "❌ Erreur lors de la récupération des tables : " . $e->getMessage();
        }
    }

    /**
     * Ferme la connexion à la base
     */
    public function deconnexion() {
        $this->pdo = null;
        // echo "🔌 Connexion fermée.";
    }

    public function getPDO() {
    if (!$this->pdo) {
        $this->connexion();
    }
    return $this->pdo;
}

}

$BD = new GestionBD();
$BD->connexion();
$tables = $BD->listTables();
// var_dump($tables); // Si tu veux les voir
$BD->deconnexion();

// On retourne les tables pour les afficher dans la vue
return $tables;
?>
<?php