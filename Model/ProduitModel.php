<?php

class ProduitModel extends Model
{
    //######################################################
    /**
     * Affichage du contenu 
     *
     * @return void
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
}
