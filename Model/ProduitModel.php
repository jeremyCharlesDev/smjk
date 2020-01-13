<?php

class ProduitModel extends Model
{
    //######################################################
    /**
     * Récupération d'un produit de la table produit
     *
     * @return $produit
     ******************************************************/
    public function getProduit()
    {
        $id = $_GET['id'];
        $requete = $this->connexion->prepare("SELECT * FROM produit WHERE id=:id");
        $requete->bindParam(':id', $id);
        $resultat = $requete->execute();
        $produit = $requete->fetch(PDO::FETCH_ASSOC);
        return $produit;
    }
    //######################################################
    /**
     * Récupération de la table produit
     *
     * @return $listeProduit
     ******************************************************/
    public function getProduits()
    {
        $requete = "SELECT *
        FROM produit
        ";
        $resultat = $this->connexion->query($requete);
        $listeProduit = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $listeProduit;
    }
    //######################################################
    /**
     * Ajout dans la DB
     *
     * @return void
     ******************************************************/
    public function addDB()
    {
        $libelle = $_POST['libelle'];
        $prix_ht = $_POST['prix_ht'];
        $caract = $_POST['caract'];

        $requete = $this->connexion->prepare("INSERT INTO produit
            VALUES (NULL,:libelle, :prix_ht, :caract)");
        $requete->bindParam(':libelle', $libelle);
        $requete->bindParam(':prix_ht', $prix_ht);
        $requete->bindParam(':caract', $caract);
        $resultat = $requete->execute();
    }
    //######################################################
    /**
     * Suppression dans la DB
     *
     * @return void
     ******************************************************/
    public function delDB()
    {
        $id = $_GET['id'];
        $requete = $this->connexion->prepare("DELETE FROM produit WHERE id=:id");
        $requete->bindParam(':id', $id);
        $resultat = $requete->execute();
    }
    //######################################################
    /**
     * Modification de l'élément dans la DB
     *
     * @return void
     ******************************************************/
    public function editDB()
    {
        $id = $_POST['id'];
        $libelle = $_POST['libelle'];
        $prix_ht = $_POST['prix_ht'];
        $caract = $_POST['caract'];

        $requete = $this->connexion->prepare("UPDATE produit 
            SET libelle=:libelle,prix_ht=:prix_ht, caract=:caract
            WHERE id=:id");
        $requete->bindParam(':id', $id);
        $requete->bindParam(':libelle', $libelle);
        $requete->bindParam(':prix_ht', $prix_ht);
        $requete->bindParam(':caract', $caract);
        $resultat = $requete->execute();
    }
}
