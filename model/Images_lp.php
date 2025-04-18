<?php 
namespace bd ;

include("../class/Images_lp.php");
use \PDO;

require_once(__DIR__ . '/../class/Images_lp.php');
require_once(__DIR__ . '/GestionBD.php');
use bd\GestionBD;
class ImagesProduitLP{


    public function fetchByProduitId($produit_id) {
        $db = new GestionBD();
        $db->connexion();
        
        $sql = 'SELECT * FROM images_produit_lp WHERE produit_id = :produit_id';
        $stat = $db->pdo->prepare($sql);
        $stat->bindParam(':produit_id', $produit_id, PDO::PARAM_INT);
        $stat->execute();
        
        // Récupération des résultats en tableau associatif
        $imagesData = $stat->fetchAll(PDO::FETCH_ASSOC);
        $db->deconnexion();
    
        // Création manuelle des objets
        $images = [];
        foreach ($imagesData as $row) {
            $image = new ImagesProduitLP(); // Sans paramètre
            $image->id = $row['id'];
            $image->produit_id = $row['produit_id'];
            $image->image_path = $row['image_path'];
            $images[] = $image;
        }
    
        return $images;
    }
    
}