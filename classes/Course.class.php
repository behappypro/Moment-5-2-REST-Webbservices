<?php 

class Course{
    // Variabel för att enklare komma åt tabellen i databasen
    private $db_table = "coursecollection";
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    // Funktion för att hämta alla kurser
    public function getCourses(){
            // SQL-fråga
            $sql = $this->conn->prepare("SELECT * FROM " . $this->db_table . "");
            $sql->execute();
        
            /* Hämtar alla rader från databasen */
            return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            }
    // Funktion för att hämta en specifik kurs
    public function getSpecifikCourse($id){
            // SQL-fråga
            $sql = $this->conn->prepare("SELECT * FROM " . $this->db_table ." WHERE id = $id");
            $sql->execute();
        
            /* Hämtar specifik rad från databasen*/
            return $result = $sql->fetch(PDO::FETCH_ASSOC);  
    }
    // Funktion för att lägga till en kurs
    public function addCourse($code, $name, $progression, $course_syllabus){
        /*
        $data = [
            'code' => 'test',
            'name' => 'test',
            'progression' => 'A',
            'course_syllabus' => 'test',
        ];
        */
        // SQL-fråga som skriver till databasen med värden
        $sql = "INSERT INTO coursecollection (code, name, progression, course_syllabus)
        VALUES ('$code', '$name', '$progression','$course_syllabus')";
        // use exec() because no results are returned
        $this->conn->exec($sql);
    }

    // Funktion för att uppdatera en kurs
    public function updateCourse($id, $code, $name, $progression, $course_syllabus){
        // SQL-fråga som uppdaterar kurs genom att skicka med nya värden
        $sql = "UPDATE coursecollection SET code = '$code', name = '$name', progression = '$progression', course_syllabus = '$course_syllabus' WHERE id = $id";
        $this->conn->exec($sql);

    }

    // Funktion för att radera en kurs
    public function deleteCourse($id){
        // SQL-fråga för att radera en kurs med specifikt id
        $sql = "DELETE FROM ". $this->db_table." WHERE id = $id";
        $this->conn->exec($sql);
    }

    

    






}

?>