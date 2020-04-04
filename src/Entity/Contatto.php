<?php
    namespace App\Entity;

    class Contatto{
        private $nome;
        private $cognome;
        private $email;
        private $telefono;
        private $oggetto;
        private $messaggio;
        private $privacy;
        private $newsletter;

        public function getNome()
        {
                return $this->nome;
        }
        public function setNome($nome)
        {
                $this->nome = $nome;

                return $this;
        }
        public function getCognome()
        {
                return $this->cognome;
        }
        public function setCognome($cognome)
        {
                $this->cognome = $cognome;

                return $this;
        }
        public function getEmail()
        {
                return $this->email;
        }
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }
        public function getTelefono()
        {
                return $this->telefono;
        }
        public function setTelefono($telefono)
        {
                $this->telefono = $telefono;

                return $this;
        }
        public function getOggetto()
        {
                return $this->oggetto;
        }
        public function setOggetto($oggetto)
        {
                $this->oggetto = $oggetto;

                return $this;
        }
        public function getMessaggio()
        {
                return $this->messaggio;
        }
        public function setMessaggio($messaggio)
        {
                $this->messaggio = $messaggio;

                return $this;
        }
        public function getPrivacy()
        {
                return $this->privacy;
        }
        public function setPrivacy($privacy)
        {
                $this->privacy = $privacy;

                return $this;
        }
        public function getNewsletter()
        {
                return $this->newsletter;
        }
        public function setNewsletter($newsletter)
        {
                $this->newsletter = $newsletter;

                return $this;
        }
    }
?>