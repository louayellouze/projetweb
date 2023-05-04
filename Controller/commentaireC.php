<?php 
    require_once "../../config1.php";
    class commentaireC{
       

        
        public function afficher_commentaires(){
            $db = getConnexion();
            try{
                $query= $db->prepare('SELECT * FROM commentaire');
                $query->execute();
                return $query->fetchAll();
            }catch(PDOException $e){
                $e->getMessage();
            }
        }

        public function afficher_commentaires_par_publication($id){
            $db = getConnexion();
            try{
                $query= $db->prepare('SELECT * FROM commentaire where id_publication =:id');
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetchAll();
            }catch(PDOException $e){
                $e->getMessage();
            }
        }

        public function chercher_utilisateur_par_id($id)
        {
                $pdo = getConnexion();

            try{

                $query = $pdo->prepare(
                    'SELECT * FROM utilisateur WHERE Id_utilisateur = :id' );
                    $query->bindValue(':id',$id);
                    
                    $query->execute();
                    $result = $query->fetchAll();
                }
                catch (PDOExeption $e){ 
                $e->getMessage();
                
                  }
                  foreach ($result as $res) {
                    $fullname = $res["FirstName"] .  " " . $res["LastName"];
                  }
                  return $fullname;
                        
        }

        public function chercher_utilisateur_par_email($email)
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

        public function ajouter_commentaire($commentaire){
                try{
                    $db = getConnexion();
                    $query = $db->prepare(
                        'INSERT INTO commentaire ( contenu ,date , id_user, id_publication)
                        VALUES ( :contenu,:date ,:id_user, :id_publication)'
                    );
                    $query->execute([
                        'contenu' => $commentaire->getcontenu(),
                        'date'=>$commentaire->getdate(),
                        'id_user'=>$commentaire->getid_user(),
                        'id_publication'=>$commentaire->getid_publication()
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
                    'id_user' => $publication->getid_user(),
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
    public function supprimer_commentaire($id)
        {              
                $pdo = getConnexion();

            try{
                $query = $pdo->prepare('DELETE FROM commentaire WHERE id = :id');
                $query->bindValue(':id',$id);
                
                $query->execute();
                
            }
            catch (PDOExeption $e){ 
                $e->getMessage();
                
            }
        }

    public function modifier_commentaire($id_publication,$id_user,$contenue,$date,$id_commentaire)
    {
        $pdo = getConnexion();

        try{
            $query = $pdo->prepare('UPDATE commentaire SET contenu=:contenue , date=:datee WHERE id_publication =:id_p AND id_user=:id_u AND id=:id_c');
            /*$query->bindValue(':contenue',$contenue);
            $query->bindValue(':id_publication',$id_publication);
            $query->bindValue(':id_user',$id_user);
            $query->bindValue(':datee',$date);
            $query->bindValue(':id',$id_commentaire);

            */
            $val=intval($id_publication); 
            
            $query->execute([
            ':contenue'=>$contenue,
            ':id_p'=>$val,
            ':id_u'=> $id_user,
            ':datee'=>$date,
            ':id_c'=>$id_commentaire

            ]);
            
        }
        catch (PDOExeption $e){ 
            $e->getMessage();
            
        }

    }
        
        

  

    }
?>