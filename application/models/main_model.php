<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main_model extends CI_Model {

    public function __construct() {
        
    }

    /* MODULES */

    public function listmodules() {
        $query = $this->db->get('modules');
        return $query->result_array();
    }

    /* SUBMODULES */

    public function listsubmodules($id) {
        $query = $this->db->query('select * from submodules where module_id = ' . $id);
        return $query->result_array();
    }

    /* MODULES Rights */

    public function getModuleRole() {
        $query = $this->db->query('select * from rights where deleted = 0');
        return $query->result_array();
    }

    /* MODULES Rights */

    public function getModuleRoleById($right_id) {
        $query = $this->db->query("select * from rights where right_id = " . $right_id);
        return $query->result_array();
    }

    /* MODULES Rights */

    public function getModuleByRole($role) {
        $query = $this->db->query("SELECT * FROM `rights` r join modules m on (r.module = m.module) where r.role = '$role' order by module_id ASC ");
        return $query->result_array();
    }

    /* SCHOOL DESCRIPTION
     * Descripes the school details */

    public function getschooldescription() {
        $query = $this->db->get('schooldescription');
        return $query->result_array();
    }

    /* SCHOOL TERMS
     * Descripes the school Termsdetails */

    public function getSchoolTerms() {
        $query = $this->db->query('select * from  schoolterms where deleted = 0');
        return $query->result_array();
    }

//get term by ID
    public function getSchoolTermById($term_id) {
        $query = $this->db->query("select * from  schoolterms where term_id = " . $term_id);
        return $query->result_array();
    }

    /*     * ****************STAFFS********************************************************************************** */

    /* Staff Roles Table List */

    public function getSchoolRoles() {
        $query = $this->db->query('select * from roles  where deleted = 0');
        return $query->result_array();
    }

    /* Get Staffs Registered */

    public function getActiveStaffs() {
        $query = $this->db->query('select * from staffs where active = 1 and deleted = 0');
        return $query->result_array();
    }

    /* Get Staffs Registered Mnus logged in user */

    public function getActiveStaffsMinusLoggedOne() {
        $staff_id = $this->session->userdata('staff_id');
        $query = $this->db->query("select * from staffs where active = 1 and deleted = 0 and staff_id != $staff_id");
        return $query->result_array();
    }

    /* Get Staffs BYID */

    public function getStaffsById($id) {
        $query = $this->db->query('select * from staffs where staff_id = ' . $id);
        return $query->result_array();
    }

    /* Get Staffs By Roles */

    public function getActiveStaffsByRole($role) {
        $query = $this->db->query("select * from staffs where active = 1 and deleted = 0 and role = '$role' ");
        return $query->result_array();
    }

    /* Get username */

    public function getStaffUsername($user) {
        $query = $this->db->query("select * from staffs where username  = '$user' ");
        return $query->result_array();
    }

    /* Get Staffs Login Detailss */

    public function getStaffLoginDetails($username, $password) {
        $query = $this->db->query("select * from staffs where username = '$username' and password = '$password' and deleted = 0 and active  = 1");
        return $query->result_array();
    }

//get staffs who are teachers	
    public function getActiveStaffsTeacher() {
        $query = $this->db->query("select * from staffs where role  = 'Teacher' ");
        return $query->result_array();
    }

    /*     * ****************END OF STAFFS********************************************************************************** */

    /*     * ************************ACADEMIC YEAR************************************** */

    public function getLastAcademicYear() {
        $query = $this->db->query("select * from academicyear  order by academicyear_id desc limit 1");
        return $query->result_array();
    }

//get academic Years
    public function getAcademicYears() {
        $query = $this->db->query('select * from academicyear order by academicyear_id desc');
        return $query->result_array();
    }

//get academic Years BY ID
    public function getAcademicYearsById($id) {
        $query = $this->db->query('select * from academicyear where academicyear_id =' . $id);
        return $query->result_array();
    }

    /*     * *************************END OF ACADEMIC YEAR ***************************** */
    /*     * ****Manage Classes  and streams************ */

//get all school classes
    public function getAllSchoolClasses() {
        $query = $this->db->query("SELECT * FROM `schoolclass` where deleted = 0 ORDER by class_id  DESC");
        return $query->result_array();
    }

    public function getSchoolClass() {
        $query = $this->db->query("SELECT * FROM `schoolclass`  where deleted = 0  ORDER by class_id DESC ");
        return $query->result_array();
    }

    public function getSchoolclassdescription() {
        $query = $this->db->query("SELECT * FROM `schoolclassdescription`  where deleted = 0  ORDER by schoolclassdesc_id DESC ");
        return $query->result_array();
    }

    public function getSchoolclassdescriptionById($id) {
        $query = $this->db->query("SELECT * FROM `schoolclassdescription`  where schoolclassdesc_id = " . $id);
        return $query->result_array();
    }

//get classes by ID
    public function getSchoolClassById($class_id) {
        $query = $this->db->query("SELECT * FROM `schoolclass`  where class_id = $class_id ");
        return $query->result_array();
    }

//get streams
    public function getStreams() {
        $query = $this->db->query("SELECT * FROM `stream`  where deleted = 0  ORDER by stream_id  DESC");
        return $query->result_array();
    }

//get stream by ID
    public function getStreamById($id) {
        $query = $this->db->query("SELECT * FROM `stream` where stream_id = " . $id);
        return $query->result_array();
    }

//get class teachers
    public function getClassTeacher() {
        $query = $this->db->query("SELECT * FROM `schoolclassteacher` st 
                                        join staffs s on (s.staff_id = st.staff_id )
                                        join academicyear a on (a.academicyear_id = st.academicyear_id)
                                        join schoolclass sc on (sc.class_id = st.class_id)
                               WHERE st.deleted = 0");
        return $query->result_array();
    }

//get class teachers by class
    public function getClassTeacherByClassYearly($class_id) {
        $yearToday = date("Y");
        $query = $this->db->query("SELECT * FROM `schoolclassteacher` st
                                        join staffs s on (s.staff_id = st.staff_id )
                                        join academicyear a on (a.academicyear_id = st.academicyear_id)
                                        join schoolclass sc on (sc.class_id = st.class_id)
                               WHERE st.deleted = 0 and st.class_id = $class_id and a.yearto = $yearToday");
        return $query->result_array();
    }

//get stream by ID
    public function getClassTeacherById($id) {
        $query = $this->db->query("SELECT * FROM `schoolclassteacher` where schoolclassteacher_id = " . $id);
        return $query->result_array();
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /*
     * ***********MANAGE SUBJECTS*********************
     * Table : sujects
     * if record deleted, COLUMN deleted = 1 else deleted = 0
     * */
//Get all subjects
    public function getSubjects() {
        $query = $this->db->query("select * from subjects where deleted = 0");
        return $query->result_array();
    }

//Get specific  subjects
    public function getSubjectsById($subject_id) {
        $query = $this->db->query("select * from subjects where subject_id = " . $subject_id);
        return $query->result_array();
    }

//get subject classes
//subjects assigned to classes
    public function getSubjectClass() {
        $query = $this->db->query("SELECT * FROM `subjectclass` sbc join schoolclass sc on(sbc.class_id = sc.class_id) join subjects sb on(sb.subject_id = sbc.subject_id) where sbc.deleted = 0 order by classname");
        return $query->result_array();
    }

//subjects assigned to classes by classID
    public function getSubjectClassById($class_id) {
        $query = $this->db->query("SELECT * FROM `subjectclass` sbc join schoolclass sc on(sbc.class_id = sc.class_id) join subjects sb on(sb.subject_id = sbc.subject_id) where sbc.class_id = $class_id and sbc.deleted = 0");
        return $query->result_array();
    }

//counting number of subjects per class
//subjects assigned to classes by classID
    public function countSubjectClassById($class_id) {
        $query = $this->db->query("SELECT count(*) as total FROM `subjectclass` where class_id = $class_id ");
        return $query->result_array();
    }

//subjects assigned to classes by subjectclassID
    public function getSubjectClassBySubjectId($subjectclass_id) {
        $query = $this->db->query("SELECT * FROM `subjectclass` sbc join schoolclass sc on(sbc.class_id = sc.class_id) join subjects sb on(sb.subject_id = sbc.subject_id) where sbc.subjectclass_id = $subjectclass_id and sbc.deleted = 0");
        return $query->result_array();
    }

//get subjectclass by class id and subject id
//getting to see if exits
    public function getSubjectClassSubjectByID($class_id, $subject_id) {
        $query = $this->db->query("select * from subjectclass where class_id = $class_id and subject_id = $subject_id and deleted = 0");
        return $query->result_array();
    }

//get subject class by year
    public function getSubjectClassSubjectByYear($class_id, $subject_id) {
        $yearToday = date("Y");
        $query = $this->db->query("select * FROM `subjectteachers` st 
										join subjectclass sc on (sc.subjectclass_id = st.subjectclass_id) 
										join subjects s on (s.subject_id = sc.subject_id)
										join schoolclass scl on (scl.class_id = sc.class_id) 
										join staffs stf on(st.staff_id = stf.staff_id) 
										join academicyear a on (a.academicyear_id = st.academicyear_id) 
        where sc.class_id = $class_id and sc.subject_id = $subject_id  and  yearto = $yearToday  and st.deleted = 0");
        return $query->result_array();
    }

//get subject Teachers by academic years
    public function getSubjectClassClassStaff() {
        $query = $this->db->query("SELECT * FROM `subjectteachers` st 
										join subjectclass sc on (sc.subjectclass_id = st.subjectclass_id) 
										join subjects s on (s.subject_id = sc.subject_id)
										join schoolclass scl on (scl.class_id = sc.class_id) 
										join staffs stf on(st.staff_id = stf.staff_id) 
										join academicyear a on (a.academicyear_id = st.academicyear_id) 
							   WHERE st.deleted = 0  order by st.academicyear_id");
        return $query->result_array();
    }
    //get subject Teachers by academic years
    public function getSubjectClassClassStaffByYear($academicyear_id , $subjectclass_id) {
        $query = $this->db->query("SELECT * FROM `subjectteachers` st 
                                        join subjectclass sc on (sc.subjectclass_id = st.subjectclass_id) 
                                        join subjects s on (s.subject_id = sc.subject_id)
                                        join schoolclass scl on (scl.class_id = sc.class_id) 
                                        join staffs stf on(st.staff_id = stf.staff_id) 
                                        join academicyear a on (a.academicyear_id = st.academicyear_id) 
                   WHERE st.deleted = 0  and  st.subjectclass_id = $subjectclass_id and st.academicyear_id = $academicyear_id");
        return $query->result_array();
    }

//get subjectclass by subjectclass , academic year id and staff_id
//getting to see if exits
    public function getSubjectClassSubjectStaffByYear($subjectclass_id, $staff_id, $academicyear_id) {
        $query = $this->db->query("SELECT * FROM `subjectteachers` WHERE subjectclass_id = $subjectclass_id and staff_id = $staff_id and academicyear_id = $academicyear_id");
        return $query->result_array();
    }

//get subject Groupings
    public function getSubjectGroups() {
        $query = $this->db->query("SELECT * FROM `subjectgroup` sg join subjects s on (s.subject_id = sg.subject_id) where sg.deleted = 0 and s.deleted = 0");
        return $query->result_array();
    }

//getting to see if exits
    public function getSubjectGroupById($subject_id) {
        $query = $this->db->query("SELECT * FROM `subjectgroup` WHERE deleted = 0 and subject_id = " . $subject_id);
        return $query->result_array();
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /*     * *************EXAMINATION MODULE****************** */
    /*
     * CRUD
     */
//list of  Examinations
    public function getExams() {
        $query = $this->db->query("select * from exam e join schoolterms s on (s.term_id = e.term_id) where e.deleted = 0");
        return $query->result_array();
    }

//list of  Examinations By Term
    public function getExamsByTerm($term_id) {
        $query = $this->db->query("select * from exam where term_id = $term_id and deleted = 0");
        return $query->result_array();
    }

//list of  Examinations By ID
    public function getExamsById($id) {
        $query = $this->db->query("select * from exam where deleted = 0 and exam_id = $id");
        return $query->result_array();
    }

//list of  grades (Not Deleted)
    public function getGrades() {
        $query = $this->db->query("select * from grade where deleted = 0");
        return $query->result_array();
    }

//list of  Grade By ID
    public function getGradeById($id) {
        $query = $this->db->query("select * from grade where deleted = 0 and grade_id = $id");
        return $query->result_array();
    }

//get Grade Min n Max
    public function getGradesMinMax($value) {
        $query = $this->db->query("SELECT * FROM grade WHERE $value BETWEEN grademin and grademax ");
        return $query->result_array();
    }

//MARKS
//Get mark
    public function getMarkByStudentSubject($subjectclass_id, $exam_id, $academicyear_id, $student_id) {
        $query = $this->db->query("SELECT * FROM `mark` WHERE  subjectclass_id = $subjectclass_id and exam_id = $exam_id and academicyear_id = $academicyear_id and student_id = $student_id");
        return $query->result_array();
    }

//get if mark already exists
    public function getMarkByStudentSubjectMark($subjectclass_id, $exam_id, $academicyear_id, $student_id, $mark) {
        $query = $this->db->query("SELECT * FROM `mark` WHERE  subjectclass_id = $subjectclass_id and exam_id = $exam_id and academicyear_id = $academicyear_id and student_id = $student_id and mark = $mark");
        return $query->result_array();
    }

//get marks yearly
    public function getYearsMarkByStudent($student_id) {
        $query = $this->db->query("SELECT * FROM `mark` WHERE student_id = $student_id group by academicyear_id order by academicyear_id desc ");
        return $query->result_array();
    }

//get overall Exam
    public function getMarksOverallByClass($exam_id, $academicyear_id, $class_id) {
        $query = $this->db->query("SELECT sum(mark) as total, concat(s.firstname , '  ' , s.middlename ,  '  ' , s.lastname) as fullnames, m.exam_id , m.academicyear_id , m.student_id , m.subjectclass_id 
								FROM `mark` m join students s on(s.student_id = m.student_id) 
	                                                         WHERE   
								m.exam_id = $exam_id and m.academicyear_id = $academicyear_id and m.class_id = $class_id group by m.student_id order by sum(mark) desc ");
        return $query->result_array();
    }

//get all subject marks as per the exams done in an year
    public function getSubjectMarksByExamYearly($subject_id) {
        $query = $this->db->query("SELECT * 
                    FROM `mark` m
                    join exam e on (e.exam_id = m.exam_id)
                    join academicyear a on (a.academicyear_id = m.academicyear_id)
                    join schoolclass sc on (sc.class_id = m.class_id)
                    WHERE
        m.subjectclass_id = $subject_id  group by m.exam_id order by m.academicyear_id");
        return $query->result_array();
    }

//get total marks obtained by all students in a class
    public function getTotalMarksBySubject($subject_id, $exam_id, $academicyear_id, $class_id) {
        $query = $this->db->query("SELECT sum(mark) as total
                                     FROM `mark` m
                                         WHERE
                  m.subjectclass_id = $subject_id  and   m.exam_id = $exam_id and m.academicyear_id = $academicyear_id and m.class_id = $class_id ");
        return $query->result_array();
    }

//get number of students done an exam
    public function getTotalStudentsDoneExam($subject_id, $exam_id, $academicyear_id, $class_id) {
        $query = $this->db->query("SELECT count(*) as total
                                    FROM `mark` m
                                    WHERE
        m.subjectclass_id = $subject_id  and   m.exam_id = $exam_id and m.academicyear_id = $academicyear_id and m.class_id = $class_id ");
        return $query->result_array();
    }

//get Exams done for a subject in certain  year
    public function getExamsDoneForSubject($subject_id, $academicyear_id, $class_id) {
        $query = $this->db->query("SELECT * 
                                FROM `mark` m
                                WHERE
              m.subjectclass_id = $subject_id and m.academicyear_id = $academicyear_id and m.class_id = $class_id ");
        return $query->result_array();
    }

//get total marks obtained by all students in a class
    public function getTotalMarksBySubjectTotalsYearly($subject_id, $academicyear_id) {
        $query = $this->db->query("SELECT sum(mark) as total , yearfrom,yearto
                                    FROM `mark` m
                                join academicyear a on(a.academicyear_id = m.academicyear_id)
                                    WHERE
        m.subjectclass_id = $subject_id  m.academicyear_id = $academicyear_id  group by m.academicyear_id ");
        return $query->result_array();
    }

//get overall Exam By ID
    public function getMarksOverallByClassAndStudent($exam_id, $academicyear_id, $class_id, $student_id) {
        $query = $this->db->query("SELECT sum(mark) as total, concat(s.firstname , '  ' , s.middlename ,  '  ' , s.lastname) as fullnames, m.exam_id , m.academicyear_id , m.student_id , m.subjectclass_id
        FROM `mark` m join students s on(s.student_id = m.student_id)
        WHERE
        m.exam_id = $exam_id and m.academicyear_id = $academicyear_id and m.class_id = $class_id and  m.student_id  = $student_id");
        return $query->result_array();
    }

//get overall Exam By Student ID
    public function getMarksOverallByStudent($exam_id, $academicyear_id, $class_id, $student_id) {
        $query = $this->db->query("SELECT *  FROM `mark` m join students s on(s.student_id = m.student_id) 
	                                     WHERE   
								m.exam_id = $exam_id and m.academicyear_id = $academicyear_id and m.class_id = $class_id  and s.student_id = $student_id");
        return $query->result_array();
    }

//get Number of Subjects done
    public function countSubjectMark($exam_id, $academicyear_id, $class_id, $student_id) {
        $query = $this->db->query("SELECT count(*) as total FROM `mark` m WHERE m.exam_id = $exam_id and m.academicyear_id =  $academicyear_id and m.class_id = $class_id  and student_id = $student_id");
        return $query->result_array();
    }

//get mark Total and posioons
    public function getMarkPositionByCategory($exam_id, $academicyear_id, $student_id, $class_id) {
        $query = $this->db->query("SELECT * FROM `markposition` WHERE `exam_id` = $exam_id and `academicyear_id` = $academicyear_id and `student_id` = $student_id and `class_id` = $class_id");
        return $query->result_array();
    }

//get mark Total and posioons
    public function getAllMarkPositionByCategory($exam_id, $academicyear_id, $class_id) {
        $query = $this->db->query("SELECT * FROM `markposition` WHERE `exam_id` = $exam_id and `academicyear_id` = $academicyear_id and `class_id` = $class_id");
        return $query->result_array();
    }

//get all exams done by student- final marks
    public function getAllFinalMarksByStudent($student_id) {
        $query = $this->db->query("SELECT * FROM `markposition` m 
                                        join exam e on (e.exam_id = m.exam_id) 
                                        join academicyear a on (a.academicyear_id = m.academicyear_id)
                                 WHERE student_id = $student_id  order by m.academicyear_id desc");
        return $query->result_array();
    }

//get class for the student on exams done
    public function getStudentClasByExamYear($student_id, $academicyear_id) {
        $query = $this->db->query("SELECT * FROM `markposition` WHERE  `academicyear_id` = $academicyear_id and `student_id` = $student_id limit 1");
        return $query->result_array();
    }
//overrall exams meanscores
 public function getExamsMeanscores()
 {
     $query = $this->db->query("SELECT classname , sum(mark) as total, examtotal , count(student_id) as totalstudent ,  (sum(mark)  / count(student_id)) as meanscore ,  e.examdesc , a.yearfrom , a.yearto  
                                    FROM `mark` m 
                                    join academicyear a on (a.academicyear_id = m.academicyear_id)
                                    join exam e on (e.exam_id = m.exam_id)
                                    join schoolclass sc on (sc.class_id = m.class_id)
                                    group by m.exam_id , m.class_id
                                    ORDER BY m.academicyear_id desc");
      return $query->result_array();
 }
 
 //overrall exams meanscores
 public function getExamsMeanscoresByClass($class_id)
 {
     $query = $this->db->query("SELECT classname , sum(mark) as total, examtotal , count(student_id) as totalstudent ,  (sum(mark)  / count(student_id)) as meanscore ,  e.examdesc , a.yearfrom , a.yearto  
                                    FROM `mark` m 
                                    join academicyear a on (a.academicyear_id = m.academicyear_id)
                                    join exam e on (e.exam_id = m.exam_id)
                                    join schoolclass sc on (sc.class_id = m.class_id)
                                    where m.class_id = $class_id
                                    group by m.exam_id
                                    ORDER BY m.academicyear_id desc");
      return $query->result_array();
 }
 //get meanscores per subject
 public function getExamSubjectMeanscores($class_id)
 {
     $query = $this->db->query("SELECT classname , subjectname , sum(mark) as total, examtotal , count(student_id) as totalstudent ,  (sum(mark)  / count(student_id)) as meanscore ,  e.examdesc , a.yearfrom , a.yearto  
                                    FROM `mark` m 
                                    join academicyear a on (a.academicyear_id = m.academicyear_id)
                                    join exam e on (e.exam_id = m.exam_id)
                                    join schoolclass sc on (sc.class_id = m.class_id)
                                    join subjectclass subc on (m.subjectclass_id = subc.subjectclass_id)
                                    join subjects sub on (sub.subject_id = subc.subject_id)
                                    where m.class_id = $class_id
                                    group by m.exam_id , m.class_id , m.subjectclass_id
                                    ORDER BY m.academicyear_id desc");
                   return $query->result_array();
 }
 
 //get meanscores per subject
 public function getExamSubjectMeanscoresByClassAndSubject($class_id , $subject_id)
 {
     $query = $this->db->query("SELECT m.academicyear_id , classname , subjectname , sum(mark) as total, examtotal , count(student_id) as totalstudent ,  (sum(mark)  / count(student_id)) as meanscore ,  e.examdesc , a.yearfrom , a.yearto  
                                    FROM `mark` m 
                                    join academicyear a on (a.academicyear_id = m.academicyear_id)
                                    join exam e on (e.exam_id = m.exam_id)
                                    join schoolclass sc on (sc.class_id = m.class_id)
                                    join subjectclass subc on (m.subjectclass_id = subc.subjectclass_id)
                                    join subjects sub on (sub.subject_id = subc.subject_id)
                                    where m.class_id = $class_id and m.subjectclass_id = $subject_id
                                    group by m.exam_id , m.class_id , m.subjectclass_id
                                    ORDER BY m.academicyear_id desc");
                   return $query->result_array();
 }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /*     * ***************************STUDENTS MODULE*************************************** */
//list of  Students (Not Deleted)
    public function getStudents() {
        $query = $this->db->query("select * from students where deleted = 0 order by  student_id  desc");
        return $query->result_array();
    }

//get students by searching 
    public function getStudentSearch($student) {
        $query = $this->db->query("SELECT * FROM students WHERE
                        firstname LIKE '%" . $student . "%' or
                        middlename  LIKE '%" . $student . "%' or
                        lastname  LIKE '%" . $student . "%' or
                        concat_ws(' ',firstname,middlename,lastname)  like  '%" . $student . "%' or
                        concat_ws(' ',middlename,lastname)  like  '%" . $student . "%' or
                        concat_ws(' ',firstname,middlename)  like  '%" . $student . "%' or
                        concat_ws(' ',firstname,lastname)  like  '%" . $student . "%' or
                       concat_ws(' ',firstname,lastname , middlename)  like  '%" . $student . "%' or
                       concat_ws(' ',middlename , firstname,lastname)  like  '%" . $student . "%' or
                         concat_ws(' ',middlename ,lastname , firstname)  like  '%" . $student . "%' or
                        student_id LIKE '%" . $student . "%' and deleted = 0");
        return $query->result_array();
    }

//list of  Alumni Students and (Not Deleted)
    public function getAlumniStudents() {
        $query = $this->db->query("select * from students where deleted = 0 and alumni = 1");
        return $query->result_array();
    }

//list of  Students (Not Deleted) By ID
    public function getStudentById($student_id) {
        $query = $this->db->query("select * from students where deleted = 0 and  student_id = " . $student_id);
        return $query->result_array();
    }

//list of  Students (Not Deleted) By ClassID
    public function getStudentByClassId($class_id) {
        $query = $this->db->query("select * from students where deleted = 0 and  class_id = " . $class_id);
        return $query->result_array();
    }

//get total number of students in a class
    public function getStudentTotalByClassId($class_id) {
        $query = $this->db->query("select count(*) as total from students where deleted = 0 and  class_id = " . $class_id);
        return $query->result_array();
    }

//get attendance sheet done in a day in a class
    public function getAttendanceByClassByDay($class_id, $att) {
        $today = date("Y-m-d");
        $query = $this->db->query("SELECT * FROM `attendancesheet` WHERE date(date) = '$today' and class_id = $class_id and `attendancetiming` = '$att' ");
        return $query->result_array();
    }

//get gender numbers  of students per class
    public function getStudentGender() {
        $query = $this->db->query("SELECT classname , gender , COUNT(gender) as total from students s 
                                    JOIN schoolclass sc on ( sc.class_id = s.class_id ) 
                                    WHERE alumni = 0
                                 GROUP BY s.class_id ");
        return $query->result_array();
    }

//get gender numbers  of students per Super class
    public function getStudentGenderPerSuperClass() {
        $query = $this->db->query("SELECT schoolclassdesc , gender , COUNT(gender) as total from students s 
                                    JOIN schoolclass sc on ( sc.class_id = s.class_id ) 
                                    WHERE alumni = 0
                                 GROUP BY sc.schoolclassdesc ");
        return $query->result_array();
    }

//get total number  of students per class
    public function getStudentTotal() {
        $query = $this->db->query("SELECT classname , COUNT(*) as total from students s 
                                    JOIN schoolclass sc on ( sc.class_id = s.class_id ) 
                                    WHERE alumni = 0
                                 GROUP BY s.class_id ");
        return $query->result_array();
    }

//get number of students per mainclass
    public function getStudentTotalBySuperClass() {
        $query = $this->db->query("SELECT schoolclassdesc , COUNT(*) as total from students s 
                                        JOIN schoolclass sc on ( sc.class_id = s.class_id )
                                        WHERE alumni = 0 
                                GROUP BY sc.schoolclassdesc ");
        return $query->result_array();
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /*     * *********FEEs MODULE******************************************************************** */
//get fee structure
    public function getFeeStructure() {
        $query = $this->db->query("SELECT * FROM `feestructure` f
									join schoolclass c on (c.class_id = f.class_id)
									join academicyear a on (a.academicyear_id = f.academicyear_id)
									join schoolterms s on (s.term_id = f.term_id)
									WHERE f.deleted = 0");
        return $query->result_array();
    }

//TODO
//get fee structure by Class and academic Year
    public function getFeeStructureByClassAndYear($academicyear_id, $class_id, $category, $term_id) {
       
        $query = $this->db->query("SELECT * FROM `feestructure`  WHERE academicyear_id = $academicyear_id and class_id = $class_id and category = '$category' and term_id = $term_id");
        return $query->result_array();
    }

//get fee structure by Class and academic Year and feegroup
    public function getFeeStructureByClassAndYearAndGroup($academicyear_id, $class_id, $category, $term_id, $group) {
        $query = $this->db->query("SELECT * FROM `feestructure`  WHERE academicyear_id = $academicyear_id and class_id = $class_id and category = '$category' and term_id = $term_id and feegroup = '$group'");
        return $query->result_array();
    }

//get fee structure by ID
    public function getFeeStructureById($id) {
        $query = $this->db->query("SELECT * FROM `feestructure` f
									join schoolclass c on (c.class_id = f.class_id)
									WHERE f.feestructure_id = $id");
        return $query->result_array();
    }

//get fee category
    public function getFeeCategory() {
        $query = $this->db->query("select * from feecategory where deleted = 0 ");
        return $query->result_array();
    }

//get fee Description
    public function getFeeDescription() {
        $query = $this->db->query("select * from feedescription where deleted = 0 ");
        return $query->result_array();
    }

////////////////////////////////////////////////////////////////////////////////////
    /*     * ******FEEPAY*************
     * 
     */
//check inserted feepay
    public function getFeePaySaved($academicyear_id, $student_id, $class_id, $feecategory, $pay, $feestructure_id, $fixedpay, $balance, $term_id) {
        $query = $this->db->query("SELECT * FROM `feepay`
								 WHERE academicyear_id = $academicyear_id
										and  student_id = $student_id
										and class_id = $class_id
										and feecategory = '$feecategory'
										and pay = $pay
										and feestructure_id = $feestructure_id
										and fixedpay = $fixedpay
										and balance = $balance and term_id = $term_id");
        return $query->result_array();
    }
//check inserted different amount feepay
    public function getFeeAmountPaidSavedDifferent($academicyear_id, $student_id, $class_id, $feecategory, $feestructure_id, $term_id) {
        $query = $this->db->query("SELECT * FROM `feepay`
								 WHERE academicyear_id = $academicyear_id
										and  student_id = $student_id
										and class_id = $class_id
										and feecategory = '$feecategory'
										and feestructure_id = $feestructure_id
										and term_id = $term_id");
        return $query->result_array();
    }
//get Fee pay Details
    public function getFeePayDetails($academicyear_id, $student_id, $class_id, $feecategory, $feestructure_id) {
        $query = $this->db->query("SELECT f.academicyear_id , f.student_id , f.class_id  , f.feecategory , f.feestructure_id  , fc.amount ,  f.receipt , f.staff_id , f.term_id , f.pay , f.feepay_id , (fc.amount - f.pay) as balance FROM `feepay` f
                                       JOIN feestructure fc ON(fc.feestructure_id = f.feestructure_id)
                                  WHERE f.academicyear_id = $academicyear_id
                                        and  f.student_id = $student_id
                                        and f.class_id = $class_id
                                        and f.feecategory = '$feecategory'
                                        and f.feestructure_id = $feestructure_id");
        return $query->result_array();
    }

//get feepay
    public function getFeePayDetailsWithoutFeeStructure($academicyear_id, $student_id, $class_id, $feecategory, $term_id) {
        $query = $this->db->query("SELECT * FROM `feepay`
								 WHERE academicyear_id = $academicyear_id
										and  student_id = $student_id
										and class_id = $class_id
										and feecategory = '$feecategory'
										and term_id = $term_id
										");
        return $query->result_array();
    }

    public function getFeeByStudent($student_id, $academicyear_id, $term_id) {
        $query = $this->db->query("SELECT * FROM `feepay` f
									join academicyear a on (a.academicyear_id = f.academicyear_id)
								    join schoolclass c on (c.class_id = f.class_id)
								    join feestructure fs on (fs.feestructure_id = f.feestructure_id)
								    join schoolterms t on (t.term_id = f.term_id)
							WHERE f.student_id = $student_id and f.academicyear_id =  $academicyear_id  and f.term_id = $term_id");
        return $query->result_array();
    }

//get FeeDues for student()
//Student balances  by student ID
    public function getFeeByStudentBalances($student_id, $academicyear_id, $term_id) {
        $query = $this->db->query("SELECT  sum((fs.amount - f.pay)) as balance FROM `feepay` f
								  join academicyear a on (a.academicyear_id = f.academicyear_id)
								    join schoolclass c on (c.class_id = f.class_id)
								    join feestructure fs on (fs.feestructure_id = f.feestructure_id)
								    join schoolterms t on (t.term_id = f.term_id)
							WHERE f.student_id = $student_id and f.academicyear_id =  $academicyear_id  and f.term_id = $term_id ");
        return $query->result_array();
    }
    
    //get total balance compulsory paid
      public function getFeeCompulsoryByStudentBalances($student_id, $academicyear_id, $term_id) {
        $query = $this->db->query("SELECT  sum(amount) as totalamount , sum((fs.amount - f.pay)) as totalbalance , (sum(amount) - sum((fs.amount - f.pay))) as totalpaid 
                                                    FROM `feepay` f
								  join academicyear a on (a.academicyear_id = f.academicyear_id)
								    join schoolclass c on (c.class_id = f.class_id)
								    join feestructure fs on (fs.feestructure_id = f.feestructure_id)
								    join schoolterms t on (t.term_id = f.term_id)
							WHERE f.student_id = $student_id and f.academicyear_id =  $academicyear_id  and f.term_id = $term_id  and fs.feegroup = 'Compulsory'");
        return $query->result_array(); 
    }


//get total cash collected per student
    public function getFeeByStudentPaid($student_id, $academicyear_id, $term_id) {
        $query = $this->db->query("SELECT sum(pay) as total , f.feecategory FROM `feepay` f
        join academicyear a on (a.academicyear_id = f.academicyear_id)
        join schoolclass c on (c.class_id = f.class_id)
        join feestructure fs on (fs.feestructure_id = f.feestructure_id)
        join schoolterms t on (t.term_id = f.term_id)
        WHERE f.student_id = $student_id and f.academicyear_id =  $academicyear_id  and f.term_id = $term_id ");
        return $query->result_array();
    }

//get total sum FeePay to students
    public function getFeePayByStudentTotal($student_id) {
        $query = $this->db->query("SELECT feepay_id ,  sum(pay) as sumpay, f.term_id , f.academicyear_id , t.term , yearfrom , yearto ,  concat(a.monthfrom  , ' ' ,   a.yearfrom   , ' / ' ,  a.monthto   , '  ' ,  a.yearto) as years  FROM `feepay` f join academicyear a on (a.academicyear_id = f.academicyear_id) join schoolclass c on (c.class_id = f.class_id) join feestructure fs on (fs.feestructure_id = f.feestructure_id) join schoolterms t on (t.term_id = f.term_id) WHERE student_id = $student_id group by f.term_id ");
        return $query->result_array();
    }

//get students fee balances
    public function getFeePayStudentsWithBalances() {
        $query = $this->db->query("SELECT sum((fs.amount - f.pay)) as balance , f.student_id ,  concat( firstname , '  ' ,  middlename , '  ' , lastname ) as studentname , guardianphone , guardianotherphone , guardianemail FROM `feepay` f join students stud on (stud.student_id = f.student_id)  join academicyear a on (a.academicyear_id = f.academicyear_id) join schoolclass c on (c.class_id = f.class_id) join feestructure fs on (fs.feestructure_id = f.feestructure_id) join schoolterms t on (t.term_id = f.term_id)  group by f.student_id");
        return $query->result_array();
    }

//get students fee balances By Id
    public function getFeePayStudentByIdWithBalances($student_id) {
        $query = $this->db->query("SELECT sum((fs.amount - f.pay)) as balance , f.student_id ,  concat( firstname , '  ' ,  middlename , '  ' , lastname ) as studentname , guardianphone , guardianotherphone , guardianemail FROM `feepay` f join students stud on (stud.student_id = f.student_id)  join academicyear a on (a.academicyear_id = f.academicyear_id) join schoolclass c on (c.class_id = f.class_id) join feestructure fs on (fs.feestructure_id = f.feestructure_id) join schoolterms t on (t.term_id = f.term_id) where balance <> 0  and balance > 0 and f.student_id = " . $student_id);
        return $query->result_array();
    }

//getFee 
    public function getFeePayByStudentAcademicYears($student_id, $academicyear_id, $term_id) {
        $query = $this->db->query("SELECT sum((fs.amount - f.pay)) as balance , f.student_id,fs.description,f.pay,f.date,f.receipt,f.feepay_id,fs.category, fs.amount as fixedpay,
                        a.academicyear_id , a.yearfrom,a.yearto ,
                        c.class_id , c.classname,
                        fs.feestructure_id , fs.amount,
                        t.term_id , t.term
                        FROM `feepay` f 
                  join academicyear a on (a.academicyear_id = f.academicyear_id) 
                  join schoolclass c on (c.class_id = f.class_id) 
                  join feestructure fs on (fs.feestructure_id = f.feestructure_id) 
                  join schoolterms t on (t.term_id = f.term_id)
                  
                  WHERE f.student_id = $student_id 
                     and f.academicyear_id =  $academicyear_id and f.term_id = $term_id GROUP by fs.description");
        return $query->result_array();
    }

//get Pay Fee History
public function getFeeHistory($feepay_id, $feestructure_id, $student_id) {
        $query = $this->db->query("SELECT fh.feepay_id , fh.feestructure_id , fh.student_id , (fs.amount - fh.payhistory) as balancehistory , feepayhistory_id ,fh.date,fh.payhistory
            FROM `feepayhistory` fh join feestructure fs on (fh.feestructure_id = fs.feestructure_id)
                WHERE feepay_id = $feepay_id and fh.feestructure_id = $feestructure_id and student_id = $student_id");
        return $query->result_array();
    }
    
    public function getTotalFeeCompulsoryByClass($class_id , $academicyear_id , $term_id)
    {
        $query = $this->db->query("SELECT sum(amount)  as totalcompulsory FROM `feestructure`
                WHERE feegroup = 'Compulsory' and class_id = $class_id  and academicyear_id =  $academicyear_id  and term_id = $term_id");
        return $query->result_array();
    }
    //get Total Money Collected per Term in an Year respective of feeDescription
    public function getTotalFeeCollectionPerYearTermly($academicyear_id , $term_id )
    {
        $query = $this->db->query("SELECT fs.description , sum(pay) as total  FROM `feepay` f
                                        join schoolclass sc on (f.class_id = f.class_id)
                                        join feestructure fs on (fs.feestructure_id = f.feestructure_id)
                                        where f.academicyear_id = $academicyear_id  and f.term_id = $term_id
                                        group by fs.description");
         return $query->result_array();
    }
     
     //get Total Money Collected Current Year 
    public function getTotalFeeCollectionCurrentYear($term_id )
    {
        $query = $this->db->query("SELECT fs.description , sum(pay) as total  FROM `feepay` f
                                        join schoolclass sc on (f.class_id = f.class_id)
                                        join feestructure fs on (fs.feestructure_id = f.feestructure_id)
                                        join academicyear a on (a.academicyear_id = f.academicyear_id)
                                        where f.term_id = $term_id and  year(now()) >= yearfrom and year(now()) <= yearto 
                                         group by fs.description");
         return $query->result_array();
    }

    /*     * ************************************************************************************************ */

    /*     * **********DOCUMENT MANAGER********************* */

    public function getDocuments() {
        $query = $this->db->query("select * from documents where deleted = 0");
        return $query->result_array();
    }

    /*     * ****end: Document Manager************ */

    /*     * **start: Attendance Timings*********** */

    public function getAttendanceTiming() {
        $query = $this->db->query("select * from attendancetiming where deleted = 0");
        return $query->result_array();
    }

    /*     * **end: Attendance Timings*********** */
    /*     * *Atendance sheet */

    public function getAttendanceSheet($attendancetiming, $student_id, $description, $date) {
        $query = $this->db->query("select * from attendancesheet where attendancetiming = '$attendancetiming'  and student_id = $student_id  and description = '$description' and    DATE(date) = '$date'");
        return $query->result_array();
    }

//get attendance sheet
    public function getAttendanceSheetRecordsByDate() {
        $date = date('Y-m-d');
        $query = $this->db->query("SELECT * FROM `attendancesheet` a join students s on (s.student_id = a.student_id) where DATE(date) = '$date'");
        return $query->result_array();
    }

//get attendance sheet today by student
    public function getAttendanceSheetRecordsByDateByStudent($student_id) {
        $date = date('Y-m-d');
        $query = $this->db->query("SELECT * FROM `attendancesheet` a join students s on (s.student_id = a.student_id) where a.student_id = $student_id and  DATE(date) = '$date'");
        return $query->result_array();
    }

//get history os student of days present yearly
    public function getAttendanceStudentAbsentYearly($student_id) {
        $query = $this->db->query("SELECT count(*) as total , year(date) as years FROM `attendancesheet` WHERE student_id = $student_id and description = 'absent' group by year(date)");
        return $query->result_array();
    }

    /*     * end: Attendance sheet * */

    /*     * ***********start:  events**************** */

    public function getEvents() {
        $query = $this->db->query("select * from events where deleted = 0");
        return $query->result_array();
    }

    public function getEventsYearToday() {
        $yeartoday = date("Y");
        $query = $this->db->query("select * from events where year(datefrom) = $yeartoday and deleted = 0");
        return $query->result_array();
    }

    public function getEventsYearArchived() {
        $yeartoday = date("Y");
        $query = $this->db->query("select * from events where year(datefrom) < $yeartoday and deleted = 0");
        return $query->result_array();
    }

    /*     * *end;Events************ */
    /*     * **start Messages ********** */

//fetch all messages
//--------------------------------------------------------------------------
    public function getMessages($id) {
        $me = $this->session->userdata('staff_id');
        //$date = date("Y-m-d");
        //$query = $this->db->query("SELECT * FROM messages WHERE (`messagefrom` = $id or `messageto` = $id) and (`messageto` = $id or `messagefrom` = $id ) order by date desc"); 
        $query = $this->db->query(" SELECT * FROM messages WHERE `messagefrom` = $me and `messageto` = $id or messageto = $me and messagefrom = $id order by date desc ");
        return $query->result_array();
    }

//fetch total messages unread
    public function getTotalUnreadMessages() {
        $query = $this->db->query(" SELECT count(*) as total  FROM messages WHERE  messageread = 0 and  `messageto` = " . $this->session->userdata('staff_id'));
        return $query->result_array();
    }

//fetch  messages unread
    public function getUnreadMessages() {
        $query = $this->db->query(" SELECT *  FROM messages WHERE  messageread = 0 and  `messageto` = " . $this->session->userdata('staff_id'));
        return $query->result_array();
    }

//update messages
    public function updateToReadMessages($id) {
        $query = $this->db->query("update messages set messageread = 1 where messagefrom = $id and messageto = " . $this->session->userdata('staff_id'));
        return $query->result_array();
    }

    /*     * ****end Messages *********** */
    /*     * *******ACCOUNTS******** */

    public function getCoa() {
        $query = $this->db->query("select * from coa where deleted = 0");
        return $query->result_array();
    }

//get coa classifications
    public function getCoaClassification() {
        $query = $this->db->query("SELECT * FROM `coaclassification` cs join coa c on (c.coa_id = cs.coa_id) WHERE cs.deleted = 0 ");
        return $query->result_array();
    }

//get coa classifications by coa ID
    public function getCoaClassificationByCoaId($id) {
        $query = $this->db->query("SELECT * FROM `coaclassification` cs join coa c on (c.coa_id = cs.coa_id) WHERE cs.deleted = 0  and cs.coa_id = $id");
        return $query->result_array();
    }

//get coa funds
    public function getCoaFunds() {
        $query = $this->db->query("SELECT * FROM `coafunds` cf join coaclassification cs on (cs.classification_id = cf.`classification_id`) join coa c on (c.coa_id = cs.coa_id) join staffs s on (s.staff_id = cf.staff_id) join academicyear a on (a.academicyear_id = cf.`academicyear_id`) join schoolterms t on (t.term_id = cf.term_id) WHERE cf.deleted = 0 ");
        return $query->result_array();
    }
    //get coa report
    public function getCoaFundsReport($term_id)
    {
        $query = $this->db->query("SELECT yearfrom , yearto , sum(amount) as total , coa , term_id 
                                        FROM `coafunds` cf join coa c on (cf.coa_id = c.coa_id) 
                                        join coaclassification cc on (cc.classification_id = cf.classification_id) 
                                        join academicyear a on (a.academicyear_id = cf.academicyear_id) 
                                        where cf.term_id = $term_id and  year(now()) >= yearfrom and year(now()) <= yearto 
                                        group by coa");
         return $query->result_array();
    }
        //get coa report vs FeeDescription/VoteHead
    public function getCoaFundsWithVoteHeadsReport($term_id)
    {
        $query = $this->db->query("SELECT yearfrom , yearto , sum(amount) as total , coa , term_id , feedescription 
                                        FROM `coafunds` cf join coa c on (cf.coa_id = c.coa_id) 
                                        join coaclassification cc on (cc.classification_id = cf.classification_id) 
                                        join academicyear a on (a.academicyear_id = cf.academicyear_id) 
                                        join feedescription fd on (fd.feedescription_id = cf.feedescription_id)
                                        where cf.term_id = $term_id and  year(now()) >= yearfrom and year(now()) <= yearto 
                                        group by feedescription");
         return $query->result_array();
    }

}

?>
