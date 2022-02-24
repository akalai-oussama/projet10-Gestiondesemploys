<?php
 include 'Employe.php';
class GestionEmployes{

    private $Connection = Null;

    private function getConnection(){
      
            $this->Connection = mysqli_connect('localhost', 'oussama', '678dhHQ)oQZVte!H', 'demo');
           
         
       
        
        return $this->Connection;
        
    }
    
    public function Ajouter($employe){

        $nom = $employe->getNom();
        $prenom = $employe->getPrenom();
        $Date_de_naissance = $employe->getDate_de_naissance();
        // requête SQL
        $insertRow="INSERT INTO personnes(Nom, Prenom, Date_de_naissance) 
                                VALUES('$nom', '$prenom', '$Date_de_naissance')";

        mysqli_query($this->getConnection(), $insertRow);
    }

    

    public function afficher(){
        $SelctRow = 'SELECT id, Nom, Prenom, Date_de_naissance FROM personnes';
        $query = mysqli_query($this->getConnection() ,$SelctRow);
        $employes_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $TableData = array();
        foreach ($employes_data as $value_Data) {
            $employe = new Employe();
            $employe->setId($value_Data['id']);
            $employe->setNom($value_Data['Nom']);
            $employe->setPrenom ($value_Data['Prenom']);
            $employe->setDate_de_naissance ($value_Data['Date_de_naissance']);
            array_push($TableData, $employe);
        }
          return $TableData;
    }

// pour afficher dans input
    public function RechercherParId($id){
        $SelectRowId = "SELECT * FROM personnes WHERE id= $id";
        $result = mysqli_query($this->getConnection(),  $SelectRowId);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $employe_data = mysqli_fetch_assoc($result);
        $employe = new Employe();
        $employe->setId($employe_data['id']);
        $employe->setNom($employe_data['Nom']);
        $employe->setPrenom ($employe_data['Prenom']);
        $employe->setDate_de_naissance ($employe_data['Date_de_naissance']);
        
        return $employe;
    }

    public function Supprimer($id){
        $RowDelet = "DELETE FROM personnes WHERE id= '$id'";
        mysqli_query($this->getConnection(), $RowDelet);
    }

    public function Modifier($id,$nom,$prenom,$date_de_naissance){
        // Requête SQL
        $RowUpdate = "UPDATE personnes SET 
        Nom='$nom', Prenom='$prenom', Date_de_naissance='$date_de_naissance'
        WHERE id=$id";

        mysqli_query($this->getConnection(),$RowUpdate);

    }

}
?>