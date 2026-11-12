<?php 

class ViewHome extends View{
     private string $message = "";
     private array $datas =[];

     /**
      * Get the value of message
      */
     public function getMessage() {
          return $this->message;
     }

     /**
      * Set the value of message
      */
     public function setMessage($message): self {
          $this->message = $message;
          return $this;
     }

     /**
      * Get the value of datas
      */
     public function getDatas() {
          return $this->datas;
     }

     /**
      * Set the value of datas
      */
     public function setDatas($datas): self {
          $this->datas = $datas;
          return $this;
     }
     public function displayMain(): self {

         echo '<main>';
         echo '<p>' . htmlspecialchars($this->message) . '</p>';
         echo '<h2>Ajouter un joueur</h2>
              <form action="" method="post">
                  <label>Pseudo</label>
                  <input type="text" name="pseudo">
                  
                  <label>Score :</label>
                  <input type="number" name="score">

                  <label>Team :</label>
                  <select name="id_team">
                  <option value="1">Aucune</option>
                  <option value="2">TeamRocket</option>
                  <option value="3">DreamTeam</option>
                  </select>

                  <button type="submit" name="submit">Ajouter</button>
               </form>';

         /* Liste des joueurs */
         echo '<p>Liste des joueurs</p>';

         echo '<table>';

         echo '
         <tr>
         <th>Pseudo</th>
         <th>Score</th>
         <th>Team</th>
         </tr>
         ';

         foreach($this->datas as $player){

              echo '
         <tr>
         <td>' . htmlspecialchars($player["pseudo"]) . '</td>
         <td>' . htmlspecialchars((string)$player["score"]) . '</td>
         <td>' . htmlspecialchars($player["team"]) . '</td>
         </tr>
              ';
         }

         echo '</table>';

         echo '</main>';

         return $this;
     }

     public function displayAll(): void {

          $this->displayHeader();
          $this->displayMain();
          $this->displayFooter();

     }

}