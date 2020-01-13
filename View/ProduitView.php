<?php
class ProduitView extends View
{

    //######################################################
    /**
     * Affichage de la liste
     *
     * @return void
     ******************************************************/
    public function displayHome($listeProduit)
    {
            foreach ($listeProduit as $key) {
                $this->page .= $key["id"];
        }

        $this->displayPage();
    }
    
}
