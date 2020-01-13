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
        $this->page .=
            '<table class="table table-dark table-striped mb-0">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Libelle</th>
                    <th scope="col">Prix HT</th>
                    <th scope="col">Caractéristique</th>
                    <th scope="col">Action</th>
                    <th scope="col"><a href="index.php?controller=produit&action=addForm">
                    <button class="btn btn-success"><i class="fas fa-plus"></i> Ajouter</button></a></th>';
        $this->page .=
            '</tr>
                </thead>
                <tbody>
              <tr>';
        foreach ($listeProduit as $key) {
            $desc = substr($key['caract'], 0, 50) . "...";
            $this->page .='
                    <td>' . $key['id'] . '</th>
                    <td>' . $key['libelle'] . '</td>
                    <td>' . $key['prix_ht'] . '</td>
                    <td>' . $desc . '</td>
                    <td><a href="index.php?controller=produit&action=delDB&id=' . $key["id"] . '">
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Supprimer</button></a></td>
                    <td><a href="index.php?controller=produit&action=editForm&id=' . $key["id"] . '"">
                    <button class="btn btn-warning"><i class="fas fa-edit"></i> Modifier</button></a></td>
                    </tr>';
        }
        $this->page .=
            '</tbody>
        </table>';
        $this->displayPage();
    }
    //######################################################
    /**
     * Affichage du formulaire d'ajout
     *
     * @return void
     ******************************************************/
    public function addForm()
    {
        $this->page .= file_get_contents('template/formProduit.html');
        $this->page = str_replace('{action}', 'addDB', $this->page);
        $this->page = str_replace('{id}', '', $this->page);
        $this->page = str_replace('{libelle}', '', $this->page);
        $this->page = str_replace('{prix_ht}', '', $this->page);
        $this->page = str_replace('{caract}', '', $this->page);
        $this->displayPage();
    }
    //######################################################
    /**
     * Affichage du formulaire d'edition
     *
     * @return void
     ******************************************************/
    public function editForm($produit)
    {
        $this->page .= file_get_contents('template/formProduit.html');
        $this->page = str_replace('{action}', 'editDB', $this->page);
        $this->page = str_replace('{id}', $produit['id'], $this->page);
        $this->page = str_replace('{libelle}', $produit['libelle'], $this->page);
        $this->page = str_replace('{prix_ht}', $produit['prix_ht'], $this->page);
        $this->page = str_replace('{caract}', $produit['caract'], $this->page);

        $this->displayPage();
    }
}
