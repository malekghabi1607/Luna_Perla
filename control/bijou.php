<?php
$racine_path = '../';
$titre = 'Détail du bijou';

$products = [
    [
        "id" => 1,
        "name" => "Collier Sautoir - JOANA",
        "price" => "26€",
        "images" => [
            "images/collier-joana-1.jpg",
            "images/collier-joana-2.jpg",
            "images/collier-joana-3.jpg",
            "images/collier-joana-4.jpg"
        ],
        "description" => "Un collier élégant avec une chaîne fine de 45 cm en métal doré, ornée de petits pendentifs circulaires (diamètre : 1 cm) en métal doré. Ce bijou délicat et raffiné s'accorde parfaitement avec une tenue casual ou habillée, ajoutant une touche sophistiquée à n'importe quelle occasion. La finition lisse et brillante du métal doré assure une longue durée d'utilisation."
    ],
    [
        "id" => 2,
        "name" => "Bague - INES",
        "price" => "19€",
        "images" => [
            "images/bague-ines-1.jpg",
            "images/bague-ines-2.jpg",
            "images/bague-ines-3.jpg",
            "images/bague-ines-4.jpg"
        ],
        "description" => "Bague en argent 925 de haute qualité, ornée d'une pierre précieuse (diamètre de la pierre : 3 mm) sertie avec précision. Cette bague intemporelle présente un design moderne et minimaliste. Sa taille ajustable (disponible de la taille 50 à 60) permet de l’adapter parfaitement à la plupart des doigts, offrant ainsi un confort optimal tout au long de la journée. Elle est idéale pour un usage quotidien ou pour un look élégant lors de sorties spéciales."
    ],
    [
        "id" => 4,
        "name" => "Bague Élégante",
        "price" => "19,99€",
        "images" => [
            "images/bague-elegante.jpg"
        ],
        "description" => "Cette bague élégante est fabriquée en plaqué or 18 carats, avec une finition brillante qui lui confère une allure sophistiquée et intemporelle. Son design épuré est agrémenté d'une fine bande légèrement texturée, offrant un contraste subtil et raffiné. Idéale pour être portée seule ou en accumulation avec d'autres bagues, elle s'adapte parfaitement à toutes les occasions. Son alliage de haute qualité garantit une durabilité exceptionnelle, résistant à l’oxydation et conservant son éclat au fil du temps. Une pièce indispensable pour compléter votre collection de bijoux."
    ],
    [
        "id" => 5,
        "name" => "Collier Raffiné",
        "price" => "22,99€",
        "images" => [
            "images/collier-raffine.jpg"
        ],
        "description" => "Le Collier Raffiné est une pièce délicate et sophistiquée, composée d'une chaîne en argent 925 rhodié, résistante aux ternissures. Son pendentif minimaliste, orné d'un zircon scintillant de 5 mm de diamètre, apporte une touche lumineuse à votre cou. La longueur du collier est ajustable entre 40 et 45 cm, offrant un port confortable et adaptable à toutes les morphologies. Ce bijou s’accorde aussi bien avec une tenue de soirée qu’avec un style plus décontracté, faisant de lui un indispensable de votre collection."
    ],
    [
        "id" => 6,
        "name" => "Bracelet Chic",
        "price" => "19,99€",
        "images" => [
            "images/bracelet-chic.jpg"
        ],
        "description" => "Ce bracelet chic est conçu en acier inoxydable doré, garantissant une grande résistance à l'usure et une tenue impeccable dans le temps. Son design raffiné est composé d'une chaîne fine et de petits maillons entrelacés, offrant une élégance subtile et moderne. Il est doté d’un fermoir ajustable permettant de l’adapter parfaitement à votre poignet, avec une extension de 3 cm pour un confort optimal. Ce bijou est idéal pour rehausser une tenue simple ou compléter une parure sophistiquée."
    ]
];
// Récupérer l'id depuis l'URL
$id = $_GET['id'] ?? null;
$bijou = null;

// Trouver le bijou correspondant
foreach ($products as $product) {
    if ($product['id'] == $id) {
        $bijou = $product;
        break;
    }
}

// Si le bijou n'existe pas, rediriger vers la collection
if (!$bijou) {
    header('Location: collection.php');
    exit;
}

// Inclure le header
include($racine_path . 'templates/front/header.php');

// Afficher les détails
include($racine_path . 'templates/front/bijou.php');

// Inclure le footer
include($racine_path . 'templates/front/footer.php');
