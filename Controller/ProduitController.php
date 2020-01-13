<?php

include 'Model/ProduitModel.php';
include 'View/ProduitView.php';

class ProduitController extends Controller
{


    public function __construct()
    {
        $this->view = new ProduitView();
        $this->model = new ProduitModel();
    }
    //######################################################
    /**
     * Construction de la page d'accueil
     * Liste des informations
     * @return void
     ******************************************************/
    public function start()
    {
        $model = new ProduitModel();
        $listeProduit = $model->getProduits();
        $this->view->displayHome($listeProduit);
    }
}