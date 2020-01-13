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
    //######################################################
    /**
     * Ajout d'une info en DB
     *
     * @return void
     ******************************************************/
    public function addDB()
    {
        $this->model->addDB();
        header('location:index.php?controller=produit');
    }
    //######################################################
    /**
     * Gestion de l'affichage du formulaire d'ajout
     *
     * @return void
     ******************************************************/
    public function addForm()
    {
        $this->view->addForm();
    }
    //######################################################
    /**
     * Suppression d'une info en DB
     *
     * @return void
     ******************************************************/
    public function delDB()
    {
        $this->model->delDB();
        header('location:index.php?controller=produit');
    }
    //######################################################
    /**
     * Récupération d'une info en DB
     *
     * @return void
     ******************************************************/
    public function editForm()
    {
        $produit = $this->model->getProduit();
        $this->view->editForm($produit);
    }
    //######################################################
    //######################################################
    /**
     * Moddification d'une info en DB
     *
     * @return void
     ******************************************************/
    public function editDB()
    {
        $this->model->editDB();
        header('location:index.php?controller=produit');
    }

}