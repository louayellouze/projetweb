<?php


class Publication 
{
       private ?string $titre = null;
       private ?string $contenu = null ;
       private ?string $id_user = null ;
       private ?string $nom = null ;

       function __construct ( string $titre, string $contenu, string $id_user , string $nom  ){
            $this->titre= $titre;
            $this->contenu= $contenu;
            $this->id_user= $id_user; 
            $this->nom= $nom;
        }
         public function gettitre (){
             return $this->titre;
         }

        public function settitre (string $titre) {
            $this->titre = $titre;
         }

        public function getcontenu (){
            return $this->contenu;
        }

        public function setcontenu (string $contenu) {
            $this->contenu = $contenu;
        }


        public function getid_user (){
            return $this->id_user;
        }

        public function setid_user (string $id_user) {
            $this->id_user = $id_user;
        }

        public function getNom (){
            return $this->nom;
        }

        public function setNom (string $nom) {
            $this->nom = $nom;
        }



}

?>