<?php


class Commentaire 
{
       private ?string $contenu = null ;
       private ?string $date = null;
       private ?string $id_user = null ;
       private ?string $id_publication = null ;

       function __construct (  string $contenu,string $date, string $id_user , string $id_publication  ){
            $this->date= $date;
            $this->contenu= $contenu;
            $this->id_user= $id_user; 
            $this->id_publication= $id_publication;
        }
         public function getdate (){
             return $this->date;
         }

        public function setdate (string $date) {
            $this->date = $date;
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

        public function getid_publication (){
            return $this->id_publication;
        }

        public function setid_publication (string $id_publication) {
            $this->id_publication = $id_publication;
        }



}

?>