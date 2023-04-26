<?php
include '../config.php';


class Utilisateur
{
    public function listUtilisateurs()
    {
        $sql = "SELECT * FROM utilisateur";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
  
  }

  function deleteUtilisateur($id)
  {
      $sql = "DELETE FROM utilisateur WHERE ID= :id";
      $db = config::getConnexion();
      $req = $db->prepare($sql);
      $req->bindValue(':id', $id);
  
      try {
          $req->execute();
      } catch (Exception $e) {
          die('Error:' . $e->getMessage());
      }
  }

  function addUtilisateur($utilisateur)
  {
      $sql = "INSERT INTO utilisateur  
      VALUES (NULL, :nom,:prenom, :mdp,:email, :r)";
      $db = config::getConnexion();
      try {
          $query = $db->prepare($sql);
          $query->execute([
            'nom' => $utilisateur->getNom(),
            'prenom' => $utilisateur-> getPrenom(), 
            'mdp' => md5($utilisateur-> getMDP()),
            'email' => $utilisateur->getEmail(),
            'r' => $utilisateur->getRole()
          ]);
      } catch (Exception $e) {
          echo 'Error: ' . $e->getMessage();
      }
  }

  

  function updateUtilisateur($utilisateur, $id)
  {
      try {
          $db = config::getConnexion();
          $query = $db->prepare(
              'UPDATE utilisateur SET 
                  Nom = :Nom, 
                  Prénom = :Prénom, 
                  MDP = :MDP, 
                  Email = :Email,
                  Role = :Role
              WHERE ID= :ID'
          );
          $query->execute([
              'ID' => $id,
              'Nom' => $utilisateur->getNom(),
              'Prénom' => $utilisateur->getPrenom(),
              'MDP' => md5($utilisateur-> getMDP()),
              'Email' => $utilisateur->getEmail(),
              'Role' => $utilisateur->getRole()
          ]);
          echo $query->rowCount() . " records UPDATED successfully <br>";
      } catch (PDOException $e) {
          $e->getMessage();
      }
  }

  function showUtilisateur($id)
  {
      $sql = "SELECT * from utilisateur where ID= $id";
      $db = config::getConnexion();
      try {
          $query = $db->prepare($sql);
          $query->execute();

          $utilisateur = $query->fetch();
          return $utilisateur;
      } catch (Exception $e) {
          die('Error: ' . $e->getMessage());
      }
  }

  function checkUserExist($Email, $MDP)
  {
      $sql = "SELECT * from utilisateur where Email=:email and MDP=:mdp and Role='admin'";
      $db = config::getConnexion();
      try {
          $query = $db->prepare($sql);
          $query->execute([
            'mdp' => md5($MDP),
            'email' => $Email
          ]);

          if (($row = $query->fetch(PDO::FETCH_ASSOC)) !== false) {
            return  $row["Nom"]. " " . $row["Prénom"] . PHP_EOL;
        } else {
            return "";
        }

        



/*

          if (!empty ($utilisateur))
          {
            return true;
          }
          else
          {
            return false;
          }*/
      } catch (Exception $e) {
          die('Error: ' . $e->getMessage());
      }
  }







}





















?>