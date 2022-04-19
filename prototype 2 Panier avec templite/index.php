<?php
session_start();

if(isset($_SESSION["paniers"]["produits"])){
    $compteur = count($_SESSION["paniers"]["produits"]) ;}

if(isset($_POST['ajouter au panier'])){
    if(isset($_SESSION['paniers'])){

    }else{
        $session_array = array(
            'id' => $_GET['id'],
            "Nom" => $_POST['Nom'],

        );
        $_SESSION['panier'][] = $session_array;
    }
}

?>

<!-- CSS only -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>prototype 2</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Acueile</a></li> 
                    </ul>
                    <form action="panier.php"method="POST" class="d-flex">
                        <button   class="btn btn-outline-dark" type="submit">
                         <i class="bi-cart-fill me-1" ></i>
                           Panier
                            <span class="badge bg-dark text-white ms-1 rounded-pill">
                        <?php 
                        echo $compteur
                        ?>
                        </span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">LES IMAGE</h1>
                    <p class="lead fw-normal text-white-50 mb-0"></p>
                </div>
            </div>
            
        </header>
        <aside>
            
        <div class="text-center"></div>
        <?php
         function getAllProducts(){
            $SelctRow = "SELECT * FROM product INNER JOIN categorie ON product.categorie_product = categorie.idCategorie ";
                                            
            $query = mysqli_query($this->getConnection() ,$SelctRow);
            $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
            $TableData = array();
            foreach ( $produits_data as $value_Data) {
                      
                        
                        $product = new Product();
                        $product->setId($value_Data['id_product']);
                        $product->setName($value_Data['Nom_product']);
                        $product->setPrice($value_Data['prix']);
                        $product->setDescription($value_Data['description']);
                        $product->setDateOfExpiration($value_Data["date"]);
                        $product->setQuantity($value_Data['quantite']);
                        $product->setCategory($value_Data['categorie_product']); 
                        $product->setImage($value_Data["photo"]);   
                        array_push($TableData, $product);
                       
                    }
                 
                 
                       return $TableData;
        }
         
        ?>
        </aside>
        <!-- Section-->
        <?php 
include 'gestionProduit.php';
$gestionProduit = new GestionProduit();
$data= $gestionProduit->afficher();

?>

        <section class="py-5">
       
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
        foreach($data as $value){

          ?>
                <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <?php
                            $bdd = new PDO('mysql:host=localhost;dbname=site-e-commerce;charset=utf8','root','');
                            $req = $bdd->query('SELECT img,nom From produits'  );
                            while($donnees = $req->fetch()){
                                echo('<img styles ="width:50px;hight:50px;border-radius;:500px;" src ="'.$donnees['img'].'"/><br>' );
                                
                            }
                            ?>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $value->getNom();?></h5>
                                    <!-- Product price-->
                                </div>
                                <div class="text-center"><a href="detail de produit.php?id=<?= $value->getId();?>"class="btn btn-outline-dark mt-auto" href="#">ajouter</a></div>
                            </div>
                            <!-- Product actions-->
                               
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                   </section>
                      
                           
    
    </body>
</html>





