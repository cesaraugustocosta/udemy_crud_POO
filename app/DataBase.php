<?php
    class DataBase {
        private $PDO;


        public function __construct($dbname = 'cadastro-escolar')
        {           
          try{
            $this->PDO = new PDO("mysql:host=localhost;dbname={$dbname}", 'root', '');
            $this->PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          }catch (PDOException $e){
            die("Ops, houve um erro: <b>{$e->getMessage()}</b>");
          }
        }

        public function insert($sql, array $binds){
            //$sql = "SELECT nome, idade FROM usuario WHERE idade > :idade AND nome = :nome";
            $stmt = $this->PDO->prepare($sql);
            foreach($binds as $key => $value){
                $stmt->bindValue($key, $value);
            }
            //$stmt->bindValue(':idade', 18);
            //$stmt->bindValue(':nome', 'Cesar Augusto');
            $stmt->execute();
            if($stmt->rowCount() > 0){
                return true;
            }
            return false;
        }

        public function select($sql, array $binds){
            $stmt = $this->PDO->prepare($sql);
            foreach($binds as $key => $value){
                $stmt->bindValue($key, $value);
            }
            
            $stmt->execute();
            return $stmt;
        }

        public function update($sql, array $binds){
            $stmt = $this->PDO->prepare($sql);
            foreach ($binds as $key =>$value){
                $stmt->bindValue($key, $value);
            }
            $stmt->execute();
            return $stmt->rowCount();
        }

        public function delete($sql, array $binds){
            $stmt = $this->PDO->prepare($sql);
            foreach ($binds as $key =>$value){
                $stmt->bindValue($key, $value);
            }
            $stmt->execute();
            return $stmt->rowCount();
        }
    }