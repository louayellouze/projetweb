<?php 
    require_once "../../config1.php";
    class publicationC{
        public function ChercherUtilisateur($email)
        {
                $pdo = getConnexion();

            try{

                $query = $pdo->prepare(
                    'SELECT * FROM utilisateur WHERE Email = :Email' );
                    $query->bindValue(':Email',$email);
                    
                    $query->execute();
                    $result = $query->fetchAll();
                }
                catch (PDOExeption $e){ 
                $e->getMessage();
                
                  }
                  foreach ($result as $res) {
                    $id = $res["Id_utilisateur"];
                  }
                  return $id;
                        
        }




        
        public function afficher_publications(){
            $db = getConnexion();
            try{
                $query= $db->prepare('SELECT * FROM publication');
                $query->execute();
                return $query->fetchAll();
            }catch(PDOException $e){
                $e->getMessage();
            }
        }

        public function ajouter_publication($publication){
                try{
                    $db = getConnexion();
                    $query = $db->prepare(
                        'INSERT INTO publication (titre, contenu, id_user, nom)
                        VALUES (:titre, :contenu, :id_user, :nom)'
                    );
                    $query->execute([
                        'titre' => $publication->gettitre(),
                        'contenu'=>$publication->getcontenu(),
                        'id_user'=>$publication->getid_user(),
                        'nom'=>$publication->getnom()
                    ]);

                }catch(PDOException $e){
                    $e->getMessage();
                }
        }

        public function modifier_publication($publication){
            try{
                $db = getConnexion();
                //UPDATE utilisateur SET Password = :Password WHERE Email = :Email
                $query = $db->prepare(
                    'UPDATE publication SET titre=:titre, contenu=:contenu,nom=:nom WHERE id=:id'
                );
                $query->execute([
                    'titre' => $publication->gettitre(),
                    'contenu'=>$publication->getcontenu(),
                    'nom'=>$publication->getnom(),
                    'id'=>$publication->getid_user()
                ]);

            }catch(PDOException $e){
                $e->getMessage();
            }
        
    }

        public function afficher_publication_utilisateur($email){
            $db = getConnexion();
            try{

                $query = $db->prepare(
                    'SELECT Id_utilisateur FROM utilisateur WHERE  Email = :Email ' );
                    $query->bindValue(':Email',$email);                    
                    $query->execute();
                    $result = $query->fetchAll();
                }
                catch (PDOExeption $e){ 
                $e->getMessage();
                
                }

                try{

                    $query = $db->prepare(
                        'SELECT * FROM publication WHERE  id_user = :id ' );
                        $query->bindValue(':id',$result);                    
                        $query->execute();
                        $publications = $query->fetchAll();
                    }
                    catch (PDOExeption $e){ 
                    $e->getMessage();
                    
                    }
                    return $publications;
    }

    public function afficher_publication_par_id($id){
        $db = getConnexion();
    
            try{

                $query = $db->prepare(
                    'SELECT * FROM publication WHERE  id = :id ' );
                    $query->bindValue(':id',$id);                    
                    $query->execute();
                    $publications = $query->fetchAll();
                }
                catch (PDOExeption $e){ 
                $e->getMessage();
                
                }
                return $publications;
    }
    public function supprimer_publication($id)
        {              
                $pdo = getConnexion();

            try{
                $query = $pdo->prepare('DELETE FROM publication WHERE id = :id');
                $query->bindValue(':id',$id);
                
                $query->execute();
                
            }
            catch (PDOExeption $e){ 
                $e->getMessage();
                
            }
        }

    


  

    }
?>