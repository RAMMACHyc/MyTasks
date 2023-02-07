
<?php
class user{
    static public function moderat($data){
        $email = $data['email'];
       

        try {
            $query = 'SELECT * FROM users WHERE email=:email';
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":email" => $email));

            $user = $statement->fetch(PDO::FETCH_OBJ);

            return $user ;


        }catch(PDOException $ex){
            echo 'erreur' . $ex->getMessage();
        }
    }
    static public function createUser($data){
        $stmt = DB::connect()->prepare('INSERT INTO users (username,email,password)
            VALUES (:username,:email,:password)');
        $stmt->bindParam(':email',$data['email']);
        $stmt->bindParam(':username',$data['username']);
        $stmt->bindParam(':password',$data['password']);
        

        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

}
    





?>