<?php
    class Db{

        public static function connect(){

            $host = 'localhost';
            $db = 'test';
            $charset = 'utf8';
            $username = 'root';
            $passwd = '';

            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

            $pdo = new PDO($dsn, $username, $passwd);

            return $pdo;
        }
        
        public static function selectData(){
            
            $pdo = self::connect();
            
            $status = 1;
            $sql = 'SELECT goods.id_g, goods.name, goods.cat_id, goods.description, goods.price, category.id, category.name_cat FROM goods, category WHERE goods.status = :status AND goods.cat_id = category.id ORDER BY goods.id_g ASC';
            $result = $pdo->prepare($sql);
           
            $result->bindParam(':status', $status, PDO::PARAM_INT);
            $result->execute();
            
            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                    $goods[] = $row;
            }
            
            return $goods;
        }
        
         public static function selectCategories(){
            
            $pdo = self::connect();
            
            $sql = 'SELECT id, name_cat FROM category';
            $result = $pdo->prepare($sql);
           
            $result->execute();
            
            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                    $categories[] = $row;
            }
            
            return $categories;
        }
        
        public static function selectOneData($id){
            
            $pdo = self::connect();
            
            $status = 1;
            
            $sql = 'SELECT goods.id_g, goods.name, goods.cat_id, goods.description, goods.price, goods.status, category.id, category.name_cat FROM goods, category WHERE goods.status = :status AND goods.id_g = :id AND goods.cat_id = category.id';
            $result = $pdo->prepare($sql);
           
            $result->bindParam(':status', $status, PDO::PARAM_INT);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->execute();
            
            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                    $one_goods[] = $row;
            }
            
            return $one_goods;
        }
        
        public static function updateData($id, $name, $price, $status, $description, $cat_id){
            
            $pdo = self::connect();
            
            $sql = 'UPDATE goods SET name = :name, price = :price, status = :status, description = :description, cat_id = :cat_id WHERE id_g = :id';
            $result = $pdo->prepare($sql);
            
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->bindParam(':price', $price, PDO::PARAM_INT);
            $result->bindParam(':status', $status, PDO::PARAM_INT);
            $result->bindParam(':description', $description, PDO::PARAM_STR);
            $result->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
            return $result->execute();
        
        }
        
        public static function deleteData($id){
            
            $pdo = self::connect();
            
            $sql = 'DELETE FROM goods WHERE id_g = :id';
            $result = $pdo->prepare($sql);
            
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            return $result->execute();
        }
        
        public static function saveData($name, $price, $description, $status, $cat_id){
            
            $pdo = self::connect();
            
            $sql = 'INSERT INTO goods (name, price, description, status, cat_id) VALUES (:name, :price, :description, :status, :cat_id)';
            $result = $pdo->prepare($sql);
            
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->bindParam(':price', $price, PDO::PARAM_INT);
            $result->bindParam(':description', $description, PDO::PARAM_STR);
            $result->bindParam(':status', $status, PDO::PARAM_INT);
            $result->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
            
            return $result->execute();
        }
            
    }
?>