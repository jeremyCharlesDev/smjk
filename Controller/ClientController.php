<?php

include 'Model/ClientModel.php';
include 'View/ClientView.php';

class ClientController extends Controller
{


    public function __construct()
    {
        $this->view = new ClientView();
        $this->model = new ClientModel();
    }
    //######################################################
    /**
     * Construction de la page d'accueil
     * Liste des informations
     * @return void
     ******************************************************/
    public function start()
    {
        $model = new ClientModel();
        $this->view->displayHome();
    }
}