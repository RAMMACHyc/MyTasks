<?php 

class tasks {

    static public function getAll(){
        $stmt = DB::connect()->prepare("SELECT * FROM tasks ORDER BY date ASC");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;

    }
    static public function gettask($data)
    {
        $id = $data['id'];
        try {
            $query = "SELECT * FROM tasks WHERE id=:id";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":id" => $id));
            $task = $statement->fetch(PDO::FETCH_OBJ);
            return $task;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }


    static public function total(){
        $stmt = DB::connect()->prepare("SELECT COUNT(*) FROM tasks");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;

    }
    static public function stocktodo(){
        $stmt = DB::connect()->prepare("SELECT COUNT(*) FROM tasks WHERE situation = 1");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;

    }
    static public function stockdoing(){
        $stmt = DB::connect()->prepare("SELECT COUNT(*) FROM tasks WHERE situation = 2");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;

    }

    static public function stockdone(){
        $stmt = DB::connect()->prepare("SELECT COUNT(*) FROM tasks WHERE situation = 3");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;

    }
  
	
	static public function add($data)
    {
        
        foreach ($data as $tasks) {
            if(empty($tasks['task'])){
                echo "<script>alret('please')</script>";
                Redirect::to('index');
            }
        $stmt = DB::connect()->prepare("INSERT INTO tasks (task ,situation,date) VALUES (:task ,1,:date)");
        $stmt->bindParam(':task', $tasks['task'], PDO::PARAM_STR);
        $stmt->bindParam(':date', $tasks['date'], PDO::PARAM_STR);
        $stmt->execute();
        $stmt = null;
    }
    return 'ok';
}


	static public function update($data)
    {
        $stmt = DB::connect()->prepare("UPDATE tasks SET task = :task , situation = :situation,date =:date WHERE id = :id");

        $stmt->bindParam(':id',$data['id']);
        $stmt->bindParam(':task',$data['task']);
        $stmt->bindParam(':situation',$data['situation']);
        $stmt->bindParam(':date',$data['date']);
       
        if ($stmt->execute()) {

            return 'ok';
        } else {
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    static public function delete($data)
    {
        $id = $data['id'];
        try {
            $query = "DELETE FROM tasks WHERE id=:id";
            $statement = DB::connect()->prepare($query);
            $statement->execute(array(":id" => $id));
            if ($statement->execute()) {

                return 'ok';
            } else {
                return 'error';
            }
            $statement->close();
            $statement = null;
        } catch (PDOException $ex) {
            echo 'erreur' . $ex->getMessage();
        }
    }
    
}
                 
?>
