<?php

class ControllerHome extends Controller{


 public function displayPlayers(): void {

       $players = $this->getModel()->findAll();
       $this->getView()->setDatas($players);
      
    }


     public function registerPlayer(): void {

        
        if (isset($_POST['submit'])) {

            
            if (!empty($_POST['pseudo']) && !empty($_POST['score']) && !empty($_POST['id_team'])) {
                $pseudo = trim($_POST['pseudo']);
                $score = filter_var($_POST['score'], FILTER_VALIDATE_INT);
                $id_team = filter_var($_POST['id_team'], FILTER_VALIDATE_INT);

                if (!empty($pseudo) && $score !== false && $id_team !== false) {

                   $this->getModel()
                        ->setPseudo($pseudo)
                        ->setScore($score)
                        ->setId_team($id_team)
                        ->addUser();

                    
                    $this->getView()->setMessage("Le joueur {$pseudo} a bien été enregistré.");

                } else {

                    $this->getView()->setMessage("Les données saisies sont incorrectes.");
                }

            } else {
                $this->getView()->setMessage("Veuillez remplir tous les champs du formulaire.");
            }
        }
    }

}