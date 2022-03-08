<?php
    include 'employee.php';

    class EmployeeManager {

        private $Connection = null;

        private function getConnection(){
            if(is_null($this->Connection)){
                $this->Connection = mysqli_connect('localhost', 'oussama', '678dhHQ)oQZVte!H', 'demo1');

                if(!$this->Connection){
                    $message = 'Connection Error: ' .mysqli_connect_error();
                    throw new Exception($message);
                }
            }
            return $this->Connection;
        }

        
        public function getAllEmployees(){
            $sqlGetData = 'SELECT * FROM employee';
            $result = mysqli_query($this->getConnection() ,$sqlGetData);
            $employeesList = mysqli_fetch_all($result, MYSQLI_ASSOC);

            $employees = array();
            foreach($employeesList as $employee_list){
                $employee = new Employee();
                $employee->setId($employee_list['id']);
                $employee->setmatricule($employee_list['matricule']);
                $employee->setnom($employee_list['nom']);
                $employee->setprenom($employee_list['prenom']);
                $employee->setdate_de_naissance($employee_list['date_de_naissance']);
                $employee->setdépartement($employee_list['departement']);
                $employee->setfonction($employee_list['fonction']);
                $employee->setsalaire($employee_list['salaire']);
                $employee->setphoto($employee_list['photo']);
                

                array_push($employees, $employee);
            }

            return $employees;
        }


        public function insertEmployee($employee){
            $matricule = $employee->getmatricule ();
            $nom = $employee->getnom ();
            $prenom = $employee->getprenom();
            $date_de_naissance  = $employee->getdate_de_naissance();
            $département  = $employee->getdépartement();
            $fonction = $employee->getfonction();
            $salaire = $employee->getsalaire();
            $photo = $employee->getphoto();
                 // sql insert query
        $sqlInsertQuery = "INSERT INTO employee(matricule,nom, prenom,  date_de_naissance ,  departement , fonction , salaire ,photo) 
                            VALUES( '$matricule',
                                    '$nom', 
                                    '$prenom',
                                    '$date_de_naissance',
                                    '$département',
                                    '$fonction',
                                    '$salaire',
                                    '$photo'
                                    )";

        mysqli_query($this->getConnection(), $sqlInsertQuery);
        }

    

        public function upload_photo($ficher, $tempname){

            $folder = './images/'.$ficher;
            // Now let's move the uploaded image into the folder: image
            move_uploaded_file($tempname, $folder);
        }

        public function deleteEmployee($id){
            $sqlDeleteQuery = "DELETE FROM employee WHERE id= '$id'";

            mysqli_query($this->getConnection(), $sqlDeleteQuery);
        }


        public function editEmployee($employee,$id){
            $matricule = $employee->getmatricule ();
            $nom = $employee->getnom();
            $prenom = $employee->getprenom();
            $date_de_naissance = $employee->getdate_de_naissance();
            $département = $employee->getdépartement ();
            $fonction = $employee->getfonction();
            $salaire = $employee->getsalaire();
            $photo = $employee->getphoto();
     
            // Update query
            $sqlUpdateQuery = "UPDATE employee SET 
                         matricule='$matricule',
                         nom='$nom', 
                         prenom='$prenom', 
                         date_de_naissance='$date_de_naissance',
                         departement = '$département',
                         fonction = '$fonction',
                         salaire = '$salaire',
                         photo = '$photo'
                         WHERE id=$id";
     
             // Make query 
             mysqli_query($this->getConnection(), $sqlUpdateQuery);

             
       
        }
       

       
      public function getEmployee($id){
        $sqlGetQuery = "SELECT * FROM employee WHERE id= $id";
    
        // get result
        $result = mysqli_query($this->getConnection(), $sqlGetQuery);
    
        // fetch to array
        $employee_data = mysqli_fetch_assoc($result);

        $employee = new Employee();

        $employee->setId($employee_data['id']);
        $employee->setmatricule($employee_data['matricule']);
        $employee->setnom($employee_data['nom']);
        $employee->setprenom($employee_data['prenom']);
        $employee->setdate_de_naissance($employee_data['date_de_naissance']);
        $employee->setdépartement($employee_data['departement']);
        $employee->setfonction($employee_data['fonction']);
        $employee->setsalaire($employee_data['salaire']);
        $employee->setphoto($employee_data['photo']);
        return $employee;
    }  

    public function RechercheParInput($cherchInput){

        $selectedRow = "SELECT * FROM `employee`  WHERE `matricule`= '$cherchInput' OR `nom` = '$cherchInput' OR `prenom` = '$cherchInput'" ;
        $query = mysqli_query($this->getConnection(), $selectedRow);
        $data = mysqli_fetch_all($query ,MYSQLI_ASSOC);
        
        $employeeArray = array();
        foreach($data as $searchedEmployee){

            $employee = new Employee();
            $employee->setmatricule($searchedEmployee['matricule']);
            $employee->setphoto($searchedEmployee['photo']);
            $employee->setnom($searchedEmployee['nom']);
            $employee->setprenom($searchedEmployee['prenom']);
            $employee->setdate_de_naissance($searchedEmployee['date_de_naissance']);
            $employee->setdépartement($searchedEmployee['departement']);
            $employee->setfonction($searchedEmployee['fonction']);
            $employee->setsalaire($searchedEmployee['salaire']);
            array_Push($employeeArray, $employee);

        }   

        return $employeeArray;

    }
    


    
    }
    ?>