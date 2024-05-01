<?php

require_once '../configs/ConnectDatabase.php';

class StudentModel {
    public function validateStudent($studentNo, $email) {
        $db = new Database();
        $conn = $db->getConnection();
        
        $query = "SELECT * FROM tbl_students WHERE students_no = :studentNo AND email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":studentNo", $studentNo);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return true;
        }
        return false;
    }

    public function getStudentLastName($studentNo) {
        $db = new Database();
        $conn = $db->getConnection();
        
        $query = "SELECT lastname FROM tbl_students WHERE students_no = :studentNo";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":studentNo", $studentNo);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['lastname']; 
    }

    public function GetStudentScheduleByStudentNo($studentNo) {
        $db = new Database();
        $conn = $db->getConnection();
    
        $query = "SELECT 
        CONCAT(tbl_rooms.room_no, ' - ', tbl_rooms.building_name) AS Room, 
        tbl_enrollments.students_no AS Student, 
        tbl_courses.course_code, 
        tbl_courses.description AS Description, 
        tbl_sections.category AS Section, 
        tbl_schedules.class_day,
        TIME_FORMAT(tbl_schedules.start_time, '%h:%i %p') AS start_time,
        TIME_FORMAT(tbl_schedules.end_time, '%h:%i %p') AS end_time,
        tbl_courses.credits AS Credits, 
        tbl_instructors.lastname AS Instructor 
    FROM 
        tbl_enrollments 
    INNER JOIN 
        tbl_sections ON tbl_enrollments.section = tbl_sections.category 
    INNER JOIN 
        tbl_courses ON tbl_enrollments.course_code = tbl_courses.course_code 
    LEFT JOIN 
        tbl_schedules ON tbl_enrollments.course_code = tbl_schedules.course_code AND tbl_enrollments.section = tbl_schedules.section 
    LEFT JOIN 
        tbl_rooms ON tbl_schedules.room_no = tbl_rooms.room_no 
    LEFT JOIN 
        tbl_instructors ON tbl_schedules.instructor_no = tbl_instructors.instructor_no 
    WHERE 
        tbl_enrollments.students_no = :studentNo
        AND (tbl_rooms.room_no IS NOT NULL OR tbl_instructors.instructor_no IS NOT NULL OR tbl_sections.category IS NOT NULL OR tbl_courses.course_code IS NOT NULL) 
        AND tbl_instructors.lastname IS NOT NULL 
    ORDER BY 
        FIELD(tbl_schedules.class_day, 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'), 
        tbl_schedules.start_time DESC;";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(":studentNo", $studentNo);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
    } 
    
    public function GetAllSchedule(){
        $db = new Database();
        $conn = $db->getConnection();
    
        $query = "SELECT s.room_no, s.course_code, c.description AS Description, c.credits AS Credits, CONCAT(i.firstname, ' ', i.lastname) AS Instructor, s.section, s.class_day, CONCAT(TIME_FORMAT(s.start_time, '%h:%i %p'), ' - ', TIME_FORMAT(s.end_time, '%h:%i %p')) AS Time FROM tbl_schedules s LEFT JOIN tbl_instructors i ON s.instructor_no = i.instructor_no LEFT JOIN tbl_courses c ON s.course_code = c.course_code ORDER BY FIELD(s.class_day, 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'), s.start_time DESC";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $result;
    }    
}


class InstructorModel {
    public function validateInstructor($instructorNo, $email) {
        $db = new Database();
        $conn = $db->getConnection();

        $query = "SELECT * FROM tbl_instructors WHERE instructor_no = :instructorNo AND email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":instructorNo", $instructorNo);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return true;
        }
        return false;
    }

    public function getInstructorLastName($instructorNo) {
        $db = new Database();
        $conn = $db->getConnection();

        $query = "SELECT lastname FROM tbl_instructors WHERE instructor_no = :instructorNo";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":instructorNo", $instructorNo);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['lastname']; 
    }
}


?>
