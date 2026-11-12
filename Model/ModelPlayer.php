<?php 
class ModelPlayer extends Model {
      private int $id;
      private string $pseudo;
      private int $score;
      private string $team;
      private int $idTeam;
      

      public function getId(): int {
            return $this->id;
      }

      public function setId(int $id): self {
            $this->id = $id;
            return $this;
      }

      public function getPseudo(): string {
            return $this->pseudo;
      }

      public function setPseudo(string $pseudo): self {
            $this->pseudo = $pseudo;
            return $this;
      }

      public function getScore(): int {
            return $this->score;
      }

      public function setScore(int $score): self {
            $this->score = $score;
            return $this;
      }

      public function getTeam(): string {
            return $this->team;
      }

      public function setTeam(string $team): self {
            $this->team = $team;
            return $this;
      }

      public function getIdTeam(): int {
            return $this->idTeam;
      }

      public function setIdTeam(int $idTeam): self {
            $this->idTeam = $idTeam;
            return $this;
      }

     
      public function setId_team(int $idTeam): self {
            return $this->setIdTeam($idTeam);
      }

      public function findAll(): array {
        try {
            $request = $this->getPdo()->prepare('SELECT p.id_player, p.pseudo, p.score, t.team FROM player p INNER JOIN team t ON p.id_team = t.id_team');

            
            $request->execute();
            
            $results = $request->fetchAll(PDO::FETCH_ASSOC);
            return $results !== false ? $results : [];

        } catch(Exception $error) {
            die($error->getMessage());
        }
    }

    public function findByPseudo(): array | bool {
        try {
            $request = $this->getPdo()->prepare('SELECT p.id_player, p.pseudo, p.score FROM player p WHERE p.pseudo = ?');
            $request->bindParam(1, $this->pseudo, PDO::PARAM_STR);
            $request->execute();

            return $request->fetch(PDO::FETCH_ASSOC);
        } catch(Exception $error) {
            die($error->getMessage());
        }
    }

    public function addUser(): void {
        try {
            $request = $this->getPdo()->prepare('INSERT INTO player (pseudo, score, id_team) VALUES(?, ?, ?)');

            $request->bindParam(1, $this->pseudo, PDO::PARAM_STR);
            $request->bindParam(2, $this->score, PDO::PARAM_INT);
            $request->bindParam(3, $this->idTeam, PDO::PARAM_INT);

            $request->execute();
        } catch(Exception $error) {
            die($error->getMessage());
        }
    }

    public function delete(): void {
        try {
            $request = $this->getPdo()->prepare('DELETE FROM player WHERE id_player = ?');
            $request->bindParam(1, $this->id, PDO::PARAM_INT);
            $request->execute();
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }

    public function update(): void {
        try {
            $request = $this->getPdo()->prepare('UPDATE player SET pseudo = ?, score = ?, id_team = ? WHERE id_player = ?');
            
            $request->bindParam(1, $this->pseudo, PDO::PARAM_STR);
            $request->bindParam(2, $this->score, PDO::PARAM_INT);
            $request->bindParam(3, $this->idTeam, PDO::PARAM_INT);
            $request->bindParam(4, $this->id, PDO::PARAM_INT);

            $request->execute();
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }
}