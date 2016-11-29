<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class School extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('main_model');
        $this->load->database();
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('school/login');
    }

    public function dashboard() {
        $this->load->view('school/dashboard');
    }

    public function login() {

        $loginuser = $this->main_model->getStaffLoginDetails($this->input->post('loginusername'), md5($this->input->post('loginpassword')));
        if (!empty($loginuser)) {


            $data = array(
                'username' => $loginuser[0]['username'],
                'othername' => $loginuser[0]['othername'],
                'firstname' => $loginuser[0]['firstname'],
                'lastname' => $loginuser[0]['lastname'],
                'staff_id' => $loginuser[0]['staff_id'],
                'file' => $loginuser[0]['file'],
                'role' => $loginuser[0]['role']
            );

            $this->session->set_userdata($data);
            $data = $this->session->set_flashdata('message', 'Successfully Logged inn');
            redirect('school/dashboard', 'refresh', $data);
        } else {
            $data = $this->session->set_flashdata('message', 'Invalid login Details. Please Try Again');
            redirect('school/', 'refresh', $data);
        }
    }

    public function logout() {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        $this->session->set_flashdata('flashSuccess', 'logged_out');
        $this->session->set_flashdata('flashSuccess', 'You have logged out.');
        $data['flashSuccess'] = $this->session->flashdata('flashSuccess');
        redirect(base_url() . 'index.php/school', 'refresh', $data);
    }

    public function schooldescription() {
        $this->load->view('school/schooldescription');
    }

//Update school details
    public function schoolEdit() {
        $data['address'] = ucfirst($this->input->post('address'));
        $data['phonenumber'] = $this->input->post('phonenumber');
        $data['town'] = ucfirst($this->input->post('town'));
        $this->db->where('school_id', $this->input->post('school_id'));
        $this->db->update('schooldescription', $data);
        $data['flashSuccess'] = $this->session->flashdata('message', 'successfully updated');
        redirect(base_url() . 'index.php/school/schooldescription', 'refresh', $data);
    }

    /*     * ***********************************************START OF STAFFS************************************************************ */

    public function staffregistration() {
        $data['dashboard'] = "Administratioin";
        $data['subdashboard'] = "Staff Registration";
        $this->load->view('school/managestaffs.php', $data);
    }

    public function staffEdit($id, $action) {
        $data['staff_id'] = $id;
        $data['action'] = $action;
        $this->load->view('school/staffreg', $data);
    }

    public function staffAdd() {
        $this->load->view('school/staffreg');
    }

    public function getStaffUsername($username) {
        $usernames = $this->main_model->getStaffUsername($username);
        if (!empty($usernames)) {
            echo 'Sorry the Username is Taken , Kindly get anothe username';
        } else {
            
        }
    }

//inserting staffs details to database
    public function staffreg() {
        if (($_POST['submit'] == 'Save')) {
            $data['firstname'] = ucfirst($this->input->post('firstname'));
            $data['lastname'] = ucfirst($this->input->post('lastname'));
            $data['othername'] = ucfirst($this->input->post('othername'));
            $data['gender'] = ucfirst($this->input->post('gender'));
            $data['idnumber'] = $this->input->post('idnumber');
            $data['phonenumber'] = $this->input->post('phonenumber');
            $data['email'] = $this->input->post('email');
            $data['username'] = $this->input->post('username');
            $data['role'] = $this->input->post('role');
            $data['password'] = md5($this->input->post('password'));
            $insert = $this->db->insert('staffs', $data);
            $id = mysql_insert_id();
            $staff['dashboard'] = "Administratioin";
            $staff['subdashboard'] = "Staff Registration";
            //check if uploaded or not
            if (empty($_FILES["fileToUpload"]["name"])) {
                redirect('school/staffregistration/', 'refresh');
            } else {
                //$this->do_upload($id);
                $config['upload_path'] = 'thumbs/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '100';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';
                $config['file_name'] = mt_rand() . 'staff' . $id . $_FILES["fileToUpload"]["name"];
                $this->load->library('upload', $config);
                // re-initialize upload library
                $this->upload->initialize($config);
                ;
                $this->upload->do_upload('fileToUpload');
                $data['file'] = $config['file_name'];
                $this->db->where('staff_id', $id);
                $this->db->update('staffs', $data);
            }
            if ($insert) {
                $data = $this->session->set_flashdata('message', 'Staff Successfully Saved');
                redirect('school/staffregistration/', 'refresh', $data);
            } else {
                $data = $this->session->set_flashdata('message', 'Not Saved');
                redirect('school/staffregistration/', 'refresh', $data);
            }
        } elseif ($_POST['submit'] == 'Edit') {
            $data['firstname'] = ucfirst($this->input->post('firstname'));
            $data['lastname'] = ucfirst($this->input->post('lastname'));
            $data['othername'] = ucfirst($this->input->post('othername'));
            $data['gender'] = ucfirst($this->input->post('gender'));
            $data['idnumber'] = $this->input->post('idnumber');
            $data['phonenumber'] = $this->input->post('phonenumber');
            $data['email'] = $this->input->post('email');
            $data['username'] = $this->input->post('username');
            $data['role'] = $this->input->post('role');
            $data['password'] = md5($this->input->post('password'));
            //check if uploaded or not
            if (empty($_FILES["fileToUpload"]["name"])) {
                $this->db->where('staff_id', $this->input->post('staff_id'));
                $this->db->update('staffs', $data);
                $data = $this->session->set_flashdata('message', 'Staff Successfully Updated');
                redirect('school/staffregistration/', 'refresh', $data);
            } else {
                $config['upload_path'] = 'thumbs/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = mt_rand() . 'staff' . $this->input->post('staff_id') . $_FILES["fileToUpload"]["name"];
                $this->load->library('upload', $config);
                // re-initialize upload library
                $this->upload->initialize($config);
                ;
                $this->upload->do_upload('fileToUpload');
                $data['file'] = $config['file_name'];
                $this->db->where('staff_id', $this->input->post('staff_id'));
                $this->db->update('staffs', $data);
            }
            $error = array('error' => $this->upload->display_errors());
            $data = $this->session->set_flashdata('message', $error);
            redirect('school/staffregistration/', 'refresh', $data);
        } elseif ($_POST['submit'] == 'Delete') {
            $data['firstname'] = ucfirst($this->input->post('firstname'));
            $data['lastname'] = ucfirst($this->input->post('lastname'));
            $data['othername'] = ucfirst($this->input->post('othername'));
            $data['gender'] = ucfirst($this->input->post('gender'));
            $data['idnumber'] = $this->input->post('idnumber');
            $data['phonenumber'] = $this->input->post('phonenumber');
            $data['email'] = $this->input->post('email');
            $data['username'] = $this->input->post('username');
            $data['role'] = $this->input->post('role');
            $data['password'] = md5($this->input->post('password'));
            $data['deleted'] = 1;
            $this->db->where('staff_id', $this->input->post('staff_id'));
            $this->db->update('staffs', $data);
            $data = $this->session->set_flashdata('message', 'Staff Successfully Deleted');
            redirect('school/staffregistration/', 'refresh', $data);
        }
    }

//get Staffs by Role - (Ajax Listing)
    public function getStaffs() {
        $this->load->view("school/getStaffs");
    }

//manage Staffs rights
    public function manageRights() {
        $this->load->view("school/managerights");
    }

//manage Staffs rights
    public function manageRightsAction($right_id, $action) {
        $data['right_id'] = $right_id;
        $data['action'] = $action;
        $this->load->view("school/managerights", $data);
    }

//save role rights
    public function rightsAdd() {

        if ($_POST['submit'] == 'Save') {
            $data['role'] = $this->input->post('role');
            foreach ($this->input->post('module') as $module) {
                $data['module'] = $module;
                $this->db->insert('rights', $data);
            }
            $data = $this->session->set_flashdata('message', ' Successfully Saved');
            redirect('school/managerights/', 'refresh', $data);
        } else if ($_POST['submit'] == 'Edit') {
            $data['role'] = $this->input->post('role');
            foreach ($this->input->post('module') as $module) {
                $data['module'] = $module;
                $this->db->where('right_id', $this->input->post('right_id'));
                $this->db->update('rights', $data);
            }
            $data = $this->session->set_flashdata('message', ' Successfully Updated');
            redirect('school/managerights/', 'refresh', $data);
        } else if ($_POST['submit'] == 'Delete') {
            $data['deleted'] = 1;
            $this->db->where('right_id', $this->input->post('right_id'));
            $this->db->update('rights', $data);
            $data = $this->session->set_flashdata('message', ' Successfully Deleted');
            redirect('school/managerights/', 'refresh', $data);
        }
    }

    /*     * ***********************************************END OF STAFFS************************************************************ */



    /*     * ***********************************************SCHOOL CLASSES*********************************************************** */

    //School classes home page
    public function manageclass() {
        $this->load->view('school/schoolclass');
    }

    public function manageClassWithId($id, $action) {
        $data['class_id'] = $id;
        $data['action'] = $action;
        $this->load->view('school/schoolclass', $data);
    }

//get class description
    public function manageClassDescWithId($id, $action) {
        $data['schoolclassdesc_id'] = $id;
        $data['action'] = $action;
        $this->load->view('school/schoolclass', $data);
    }

//get class Teacher
    public function manageClassTeacherWithId($id, $action) {
        $data['schoolclassteacher_id'] = $id;
        $data['action'] = $action;
        $this->load->view('school/schoolclass', $data);
    }

//Save SchoolClass  to database
    public function schoolClassdescriptionAdd() {
        if ($_POST['submit'] == 'Save') {
            $data['schoolclassdesc'] = strtoupper($this->input->post('schoolclassdesc'));
            $save = $this->db->insert('schoolclassdescription', $data);
            if ($save) {
                $data = $this->session->set_flashdata('message', 'Successfully Saved');
                redirect('school/manageclass/', 'refresh', $data);
            } else {

                $data = $this->session->set_flashdata('message', 'Try Again');
                redirect('school/manageclass/', 'refresh', $data);
            }
        } else if ($_POST['submit'] == 'Edit') {
            $data['schoolclassdesc'] = strtoupper($this->input->post('schoolclassdesc'));
            $data['schoolclassdesc_id'] = $this->input->post('schoolclassdesc_id');
            $this->db->where('schoolclassdesc_id', $this->input->post('schoolclassdesc_id'));
            $this->db->update('schoolclassdescription', $data);
            $data = $this->session->set_flashdata('message', 'Successfully Update');
            redirect('school/manageclass/', 'refresh', $data);
        } else if ($_POST['submit'] == 'Delete') {
            $data['schoolclassdesc'] = $this->input->post('schoolclassdesc');
            $data['schoolclassdesc_id'] = $this->input->post('schoolclassdesc_id');
            $data['deleted'] = 1;
            $this->db->where('schoolclassdesc_id', $this->input->post('schoolclassdesc_id'));
            $this->db->update('schoolclassdescription', $data);
            $data = $this->session->set_flashdata('message', 'Successfully Deleted');
            redirect('school/manageclass/', 'refresh', $data);
        } else {
            redirect('school/manageclass/', 'refresh');
        }
    }

//Save class Stream to database	
    public function schoolclassadd() {
        if ($_POST['submit'] == 'Save') {
            $classname = $this->input->post('classname') . '  ' . $this->input->post('streamname');
            $data['classname'] = strtoupper($classname);
            $data['streamname'] = strtoupper($this->input->post('streamname'));
            $data['schoolclassdesc'] = strtoupper($this->input->post('classname'));

            $save = $this->db->insert('schoolclass', $data);
            if ($save) {
                $data = $this->session->set_flashdata('message', 'Successfully Saved');
                redirect('school/manageclass/', 'refresh', $data);
            } else {

                $data = $this->session->set_flashdata('message', 'Try Again');
                redirect('school/manageclass/', 'refresh', $data);
            }
        } else if ($_POST['submit'] == 'Edit') {
            $classname = $this->input->post('classname') . '  ' . $this->input->post('streamname');
            $data['classname'] = strtoupper($classname);
            $data['streamname'] = strtoupper($this->input->post('streamname'));
            $data['description'] = strtoupper($this->input->post('classname'));
            $this->db->where('class_id', $this->input->post('class_id'));
            $this->db->update('schoolclass', $data);
            $data = $this->session->set_flashdata('message', 'Successfully Update');
            redirect('school/manageclass/', 'refresh', $data);
        } else if ($_POST['submit'] == 'Delete') {
            $classname = $this->input->post('classname') . '  ' . $this->input->post('streamname');
            $data['classname'] = $classname;
            $data['streamname'] = $this->input->post('streamname');
            $data['description'] = $this->input->post('classname');
            $data['deleted'] = 1;
            $this->db->where('class_id', $this->input->post('class_id'));
            $this->db->update('schoolclass', $data);
            $data = $this->session->set_flashdata('message', 'Successfully Deleted');
            redirect('school/manageclass/', 'refresh', $data);
        } else {
            redirect('school/manageclass/', 'refresh');
        }
    }

//Save class Stream to database
    public function classTeacherAdd() {
        if ($_POST['submit'] == 'Save') {

            $data['class_id'] = $this->input->post('class_id');
            $data['staff_id'] = $this->input->post('staff_id');
            $data['academicyear_id'] = $this->input->post('academicyear_id');
            $save = $this->db->insert('schoolclassteacher', $data);
            if ($save) {
                $data = $this->session->set_flashdata('message', 'Successfully Saved');
                redirect('school/manageclass/', 'refresh', $data);
            } else {

                $data = $this->session->set_flashdata('message', 'Try Again');
                redirect('school/manageclass/', 'refresh', $data);
            }
        } else if ($_POST['submit'] == 'Edit') {
            $data['class_id'] = $this->input->post('class_id');
            $data['staff_id'] = $this->input->post('staff_id');
            $data['academicyear_id'] = $this->input->post('academicyear_id');
            $data['schoolclassteacher_id'] = $this->input->post('schoolclassteacher_id');

            $this->db->where('schoolclassteacher_id', $this->input->post('schoolclassteacher_id'));
            $this->db->update('schoolclassteacher', $data);

            $data = $this->session->set_flashdata('message', 'Successfully Update');
            redirect('school/manageclass/', 'refresh', $data);
        } else if ($_POST['submit'] == 'Delete') {
            $data['deleted'] = 1;
            $data['schoolclassteacher_id'] = $this->input->post('schoolclassteacher_id');
            $this->db->where('schoolclassteacher_id', $this->input->post('schoolclassteacher_id'));
            $this->db->update('schoolclassteacher', $data);
            $data = $this->session->set_flashdata('message', 'Successfully Deleted');
            redirect('school/manageclass/', 'refresh', $data);
        } else {
            redirect('school/manageclass/', 'refresh');
        }
    }

    /*     * **********************************************END OF SCHOOL CLASSES*********************************************************** */
    /*     * ******************start : School Stream ******** */
    /*
     * School Streams
     * add stream
     * assign to class
     */

//Save Stream  to database
    public function streamAdd() {
        if ($_POST['submit'] == 'Save') {
            $data['streamname'] = strtoupper($this->input->post('streamname'));
            $save = $this->db->insert('stream', $data);
            if ($save) {
                $data = $this->session->set_flashdata('message', 'Successfully Saved');
                redirect('school/manageclass/', 'refresh', $data);
            } else {

                $data = $this->session->set_flashdata('message', 'Try Again');
                redirect('school/manageclass/', 'refresh', $data);
            }
        } else if ($_POST['submit'] == 'Edit') {
            $data['streamname'] = strtoupper($this->input->post('streamname'));
            $data['stream_id'] = $this->input->post('stream_id');
            $this->db->where('stream_id', $this->input->post('stream_id'));
            $this->db->update('stream', $data);
            $data = $this->session->set_flashdata('message', 'Successfully Update');
            redirect('school/manageclass/', 'refresh', $data);
        } else if ($_POST['submit'] == 'Delete') {
            $data['streamname'] = $this->input->post('streamname');
            $data['stream_id'] = $this->input->post('stream_id');
            $data['deleted'] = 1;
            $this->db->where('stream_id', $this->input->post('stream_id'));
            $this->db->update('stream', $data);
            $data = $this->session->set_flashdata('message', 'Successfully Deleted');
            redirect('school/manageclass/', 'refresh', $data);
        } else {
            redirect('school/manageclass/', 'refresh');
        }
    }

    public function manageStreamWithId($id, $action) {
        $data['stream_id'] = $id;
        $data['action'] = $action;
        $this->load->view('school/schoolclass', $data);
    }

    /*     * ***************end : Streams ****************** */
    /*     * ***********************************************ACADEMIC YEARS********************************************************* */

    //academicyears home page
    public function academicyear() {
        $this->load->view('school/academicyear');
    }

//Set new  Academic Years.
//Setting Start and Ending Years/Months
    public function academicyearset() {

        $data['monthfrom'] = strtoupper($this->input->post('startmonth'));
        $data['monthto'] = strtoupper($this->input->post('endmonth'));
        $data['yearfrom'] = $this->input->post('startyear');
        $data['yearto'] = $this->input->post('endyear');
        $this->db->insert('academicyear', $data);
        $success['success'] = "Academic Year Successfully Added";
        $this->load->view('school/academicyear', $success);
    }

//Add Academic Years.
//Starting n Ending Years/Months
    public function academicyearadd() {
        $lastAcademicYear = $this->main_model->getLastAcademicYear();
        if (empty($lastAcademicYear)) {
            $data['success'] = "Please Set Academic Year First";
            $this->load->view('school/academicyear', $data);
        }
        $data['monthfrom'] = $lastAcademicYear[0]['monthfrom'];
        $data['monthto'] = $lastAcademicYear[0]['monthto'];
        $data['yearfrom'] = $lastAcademicYear[0]['yearfrom'] + 1;
        $data['yearto'] = $lastAcademicYear[0]['yearto'] + 1;
        $this->db->insert('academicyear', $data);
        $success['success'] = "Academic Year Successfully Added";
        $this->load->view('school/academicyear', $success);
    }

    /*     * **********************************************END OF ACADEMIC YEAR*********************************************************** */

    /*     * ******************start: MANAGE SUBJECTS************************************************** */

    public function managesubjects() {
        $this->load->view('school/managesubjects');
    }

    /*     * ****CRUD subject*******
     * Create/add new subjects
     * Edit subject
     * Delete subject
     * *********************** */

    public function subjectAdd() {
        if ($_POST['submit'] == 'Save') {
            $data['subjectname'] = strtoupper($this->input->post('subjectname'));
            $save = $this->db->insert('subjects', $data);
            if ($save) {
                $data = $this->session->set_flashdata('message', 'Successfully Saved - Check manage Subjects Tab');
                redirect('school/managesubjects/', 'refresh', $data);
            } else {

                $data = $this->session->set_flashdata('message', 'Did Not Save Please Try Again');
                redirect('school/managesubjects/', 'refresh', $data);
            }
        } elseif ($_POST['submit'] == 'Edit') {
            $data['subjectname'] = strtoupper($this->input->post('subjectname'));
            $this->db->where('subject_id', $this->input->post('subject_id'));
            $this->db->update('subjects', $data);
            $data = $this->session->set_flashdata('message', 'Successfully Updated - Check Manage Subjects Tab');
            redirect('school/managesubjects/', 'refresh', $data);
        } elseif ($_POST['submit'] == 'Delete') {
            $data['deleted'] = 1;
            $this->db->where('subject_id', $this->input->post('subject_id'));
            $this->db->update('subjects', $data);
            $data = $this->session->set_flashdata('message', 'Successfully Saved - Check Mnaage Subjects Tab');
            redirect('school/managesubjects/', 'refresh', $data);
        }
    }

    public function subjectGroupAdd() {
        foreach ($this->input->post('subject_id') as $subject_id)
            $check = $this->main_model->getSubjectGroupById($subject_id); {
            $data['subject_id'] = $subject_id;
            $data['description'] = strtoupper($this->input->post('description'));
            if (empty($check)) {
                $save = $this->db->insert('subjectgroup', $data);
            } else {
                
            }

            $data = $this->session->set_flashdata('message', 'Successfully Saved - Check Subject Group Tab');
            redirect('school/managesubjects/', 'refresh', $data);
        }
    }

    public function subjectClassesAdd() {
        foreach ($this->input->post('subject_id') as $subject_id) {
            $checkexist = $this->main_model->getSubjectClassSubjectByID($this->input->post('class_id'), $subject_id);
            if (empty($checkexist)) {
                $data['class_id'] = $this->input->post('class_id');
                $data['subject_id'] = $subject_id;
                $this->db->insert('subjectclass', $data);
            } else {
                
            }
        }
        $data = $this->session->set_flashdata('message', 'Successfully Saved - Check Subject Classes Tab');
        redirect('school/managesubjects/', 'refresh', $data);
    }

//dete SubjectClass Row
//deleted is set to 1(To Mark its deleted)
    public function subjectClassDelete() {
        $data['deleted'] = 1;
        $this->db->where('subjectclass_id', $this->input->post('subjectclass_id'));
        $this->db->update('subjectclass', $data);
        $data = $this->session->set_flashdata('message', 'Successfully Deleted - Check Subject Classes Tab');
        redirect('school/managesubjects/', 'refresh', $data);
    }

//deleted is set to 1(To Mark its deleted)
    public function subjectGroupDelete() {
        $data['deleted'] = 1;
        $this->db->where('subjectgroup_id', $this->input->post('subjectgroup_id'));
        $this->db->update('subjectgroup', $data);
        $data = $this->session->set_flashdata('message', 'Successfully Deleted - Check Subject Group Tab');
        redirect('school/managesubjects/', 'refresh', $data);
    }

//get classes by ajax
    public function subjectTeacherAdd() {

        if ($_POST['submit'] == 'Save') {
            $check = $this->main_model->getSubjectClassSubjectStaffByYear($this->input->post('subjectclass_id'), $this->input->post('staff_id'), $this->input->post('academicyear_id'));
            $data['subjectclass_id'] = $this->input->post('subjectclass_id');
            $data['staff_id'] = $this->input->post('staff_id');
            $data['academicyear_id'] = $this->input->post('academicyear_id');
            if (empty($check)) {
                $this->db->insert("subjectteachers", $data);
            } else {
                
            }
            $data = $this->session->set_flashdata('message', 'Successfully Saved - Check Subject Teachers Tab');
            redirect('school/managesubjects/', 'refresh', $data);
        } elseif ($_POST['submit'] == 'Edit') {
            
        } elseif ($_POST['submit'] == 'Delete') {
            $data['deleted'] = 1;
            $this->db->where('subjectteacher_id', $this->input->post('subjectteacher_id'));
            $this->db->update('subjectteachers', $data);
            $data = $this->session->set_flashdata('message', 'Successfully Deleted - Check Subject Teachers Tab');
            redirect('school/managesubjects/', 'refresh', $data);
        }
    }

    /*     * ******************end : MANAGE SUBJECTS************************************************** */
    /*     * ******************start : MANAGE EXAMINATION MODULE ************************************* */

//examination home page
    public function manageexamination() {
        $this->load->view('school/manageexamination');
    }

//Marks home page
    public function managemarks() {
        $this->load->view('school/managemarks');
    }

    public function examAdd() {
        if ($_POST['submit'] == 'Save') {
            $data['examdesc'] = strtoupper($this->input->post('examname'));
            $data['examtotal'] = $this->input->post('examtotal');
            $termname = $this->main_model->getSchoolTermById($this->input->post('term_id'));
            $data['examname'] = $this->input->post('examname') . ' ' . $termname[0]['term'];
            $data['term_id'] = $this->input->post('term_id');
            $this->db->insert('exam', $data);
            redirect('school/manageexamination/', 'refresh');
        } elseif ($_POST['submit'] == 'Edit') {
            $data['examdesc'] = strtoupper($this->input->post('examname'));
            $data['examtotal'] = $this->input->post('examtotal');
            $termname = $this->main_model->getSchoolTermById($this->input->post('term_id'));
            $data['examname'] = strtoupper($this->input->post('examname')) . ' ' . $termname[0]['term'];
            $data['term_id'] = $this->input->post('term_id');
            $this->db->where('exam_id', $this->input->post('exam_id'));
            $this->db->update('exam', $data);
            redirect('school/manageexamination/', 'refresh');
        } elseif ($_POST['submit'] == 'Delete') {
            $data['deleted'] = 1;
            $this->db->where('exam_id', $this->input->post('exam_id'));
            $this->db->update('exam', $data);
            redirect('school/manageexamination/', 'refresh');
        }
    }

    public function exam($id, $action) {
        $data['exam_id'] = $id;
        $data['action'] = $action;
        $this->load->view("school/manageexamination", $data);
    }

//examination Grade page
    public function managegrades() {
        $this->load->view('school/managegrades');
    }

//add Grade
    public function gradeAdd() {
        if ($_POST['submit'] == 'Save') {
            $data['point'] = strtoupper($this->input->post('point'));
            $data['grademin'] = $this->input->post('grademin');
            $data['grademax'] = $this->input->post('grademax');
            $data['comment'] = $this->input->post('comment');
            $this->db->insert('grade', $data);
            redirect('school/managegrades/', 'refresh');
        } elseif ($_POST['submit'] == 'Edit') {
            $data['point'] = strtoupper($this->input->post('point'));
            $data['grademin'] = $this->input->post('grademin');
            $data['grademax'] = $this->input->post('grademax');
            $data['comment'] = $this->input->post('comment');
            $this->db->where('grade_id', $this->input->post('grade_id'));
            $this->db->update('grade', $data);
            redirect('school/managegrades/', 'refresh');
        } elseif ($_POST['submit'] == 'Delete') {
            $data['deleted'] = 1;
            $this->db->where('grade_id', $this->input->post('grade_id'));
            $this->db->update('grade', $data);
            redirect('school/managegrades/', 'refresh');
        }
    }

    public function grade($id, $action) {
        $data['grade_id'] = $id;
        $data['action'] = $action;
        $this->load->view("school/managegrades", $data);
    }

    public function markchoose() {
        $data['exam_id'] = $this->input->post('exam_id');
        $data['academicyear_id'] = $this->input->post('academicyear_id');
        $string = $this->input->post('subjectclass_id');
        $answer_explode = explode("@", $string);
        $data['subjectclass_id'] = trim($answer_explode[0]);
        $data['class_id'] = trim($answer_explode[1]);
        $this->load->view("school/markentry", $data);
    }

//entry of marks
    public function markentry() {
        $data['exam_id'] = $this->input->post('exam_id');
        $data['subjectclass_id'] = $this->input->post('subjectclass_id');
        $data['academicyear_id'] = $this->input->post('academicyear_id');
        $data['class_id'] = $this->input->post('class_id');
        //count number of rows
        $count = count($this->input->post('mark'));
        for ($i = 0; $i < $count; $i++) {
            $temp['student_id'] = $_POST['student_id'][$i];
            $temp['mark'] = $_POST['mark'][$i];
            $items[] = $temp;
        }
        foreach ($items as $item) {
            $data['student_id'] = $item['student_id'];
            $data['mark'] = $item['mark'];
            $checkToUpdate = $this->main_model->getMarkByStudentSubject($this->input->post('subjectclass_id'), $this->input->post('exam_id'), $this->input->post('academicyear_id'), $item['student_id']);
            if (empty($item['mark'])) {
                
            } else {
                $checkMark = $this->main_model->getMarkByStudentSubjectMark($this->input->post('subjectclass_id'), $this->input->post('exam_id'), $this->input->post('academicyear_id'), $item['student_id'], $item['mark']);
                if (empty($checkMark)) {
                    $this->db->insert('mark', $data);
                }
                if (!empty($checkToUpdate)) {
                    $this->db->where('mark_id', $checkToUpdate[0]['mark_id']);
                    $this->db->update('mark', $data);
                }
            }
        }

        $data['message'] = $this->session->set_flashdata('message', 'Successfully Saved');

        $data['class_id'] = $this->input->post('class_id');
        $this->load->view('school/markentry', $data);
    }

//entry of marks total
    public function markFinalAdd() {
        $data['exam_id'] = $this->input->post('exam_id');
        $data['academicyear_id'] = $this->input->post('academicyear_id');
        $data['class_id'] = $this->input->post('class_id');
        $data['staff_id'] = $this->session->userdata('staff_id');
        //count number of rows
        $count = count($this->input->post('student_id'));
        for ($i = 0; $i < $count; $i++) {
            $temp['student_id'] = $_POST['student_id'][$i];
            $temp['totalmark'] = $_POST['totalmark'][$i];
            $temp['position'] = $_POST['position'][$i];
            $temp['subjecttotal'] = $_POST['subjecttotal'][$i];
            $temp['gradefinal'] = $_POST['gradefinal'][$i];
            $items[] = $temp;
        }
        foreach ($items as $item) {
            $data['student_id'] = $item['student_id'];
            $data['totalmark'] = $item['totalmark'];
            $data['subjecttotal'] = $item['subjecttotal'];
            $data['position'] = $item['position'];
            $data['gradefinal'] = $item['gradefinal'];
            //if (empty($item['mark'])){ } else {
            $checkMark = $this->main_model->getMarkPositionByCategory($this->input->post('exam_id'), $this->input->post('academicyear_id'), $item['student_id'], $this->input->post('class_id'));
            if (empty($checkMark)) {
                $this->db->insert('markposition', $data);
            } else {
                foreach ($checkMark as $check) {
                    $this->db->where('markposition_id', $check['markposition_id']);
                    $this->db->update('markposition', $data);
                }
            }

            // }
        }
        $data['message'] = $this->session->set_flashdata('message', 'Successfully Saved');

        $data['class_id'] = $this->input->post('class_id');
        $this->load->view('school/examsoverall', $data);
    }

//get overall exams
    public function examsOverallChoose() {
        $this->load->view('school/examsoverallchoose');
    }

//get overall exams
    public function examsOverall() {
        $data['exam_id'] = $this->input->post('exam_id');
        $data['academicyear_id'] = $this->input->post('academicyear_id');
        $data['class_id'] = $this->input->post('class_id');

        $this->load->view('school/examsoverall', $data);
    }

// Student Report Form
    public function examsReportform() {
        $data['exam_id'] = $this->input->post('exam_id');
        $data['academicyear_id'] = $this->input->post('academicyear_id');
        $data['class_id'] = $this->input->post('class_id');
        $data['student_id'] = $this->input->post('student_id');
        $data['totalmark'] = $this->input->post('totalmark');
        $data['position'] = $this->input->post('position');
        $this->load->view('school/reportform', $data);
    }

//Report Form
    public function reportFormChoose($student_id) {
        $data['student_id'] = $student_id;
        $this->load->view('school/reportformchoose', $data);
    }

//Report Form
    public function reportForm() {
        $data['academicyear_id'] = $this->input->post('academicyear_id');
        $data['term_id'] = $this->input->post('term_id');
        $data['student_id'] = $this->input->post('student_id');
        $this->load->view('school/reportform', $data);
    }

//Report Card
    public function reportCard() {
        $this->load->view('school/reportcard');
    }

//getStudents by Ajax For Report Card
    public function getStudentsReportCard() {
        $this->load->view("school/getStudentsReportCard");
    }

//Report Card By Student
    public function reportCardStudent($student_id) {
        $data['student_id'] = $student_id;
        $this->load->view('school/reportcardstudent', $data);
    }

    //Mean scores
    //Exams meanscores
    public function examMeanscores() {
        $this->load->view('school/exammeanscore');
    }

    //Exams meanscores
    public function examMeanscoresJS($class_id) {
        $exams = $this->main_model->getExamsMeanscoresByClass($class_id);
        $reult = " <table  class='table table-striped'>
            <thead>
                <tr>	
                    <th>Sn</th>
                    <th>Academic Year</th>
                    <th> Exam Desc</th>
                    <th> Class </th>
                    <th>Mean scores </th>
                </tr>
            </thead><tbody>";
        foreach ($exams as $exam) {
            $years = $exam['yearfrom'] . ' / ' . $exam['yearto'];
            $examdesc = $exam['examdesc'];
            $classname = $exam['classname'];
            $meanscore = $exam['meanscore'];
            $reult .= "<tr>"
                    . "<td></td> "
                    . "<td> $years </td> "
                    . "<td>$examdesc</td>"
                    . "<td>$classname </td>"
                    . "<td> $meanscore </td>"
                    . "</tr>";
        }
        $reult .= "</tbody>"
                . "</table>";

        echo $reult;
    }

    //subjects Meanscores
    //Exams meanscores
    public function examSubjectsMeanscoresJS($class_id) {
        $this->graphSubjectMeanScore($class_id);
        //table foramt
        $subjects = $this->main_model->getSubjectClassById($class_id);
        foreach ($subjects as $subject) {
            $exams = $this->main_model->getExamSubjectMeanscoresByClassAndSubject($class_id, $subject['subjectclass_id']);
            $reult = " <table  class='table table-striped'>
            <thead>
                <tr>	
                    <th>Sn</th>
                    <th>Academic Year</th>
                    <th> Exam Desc</th>
                    <th> Class </th>
                    <th>Subject</th>
                    <th>Mean scores </th>
                    <th> Subject Teacher </th>
                </tr>
            </thead><tbody>";
            foreach ($exams as $exam) {
                // $subjectTeacher = $this->main_model->getSubjectClassClassStaffByYear($exam['academicyear_id'] , $subject['subjectclass_id']);
                $years = $exam['yearfrom'] . ' / ' . $exam['yearto'];
                $examdesc = $exam['examdesc'];
                $classname = $exam['classname'];
                $meanscore = $exam['meanscore'];
                $subject = $exam['subjectname'];

                $reult .= "<tr>"
                        . "<td></td> "
                        . "<td> $years </td> "
                        . "<td>$examdesc</td>"
                        . "<td>$classname </td>"
                        . "<td> $subject</td>"
                        . "<td> $meanscore </td>"
                        . "</tr>";
            }
            $reult .= "</tbody>"
                    . "</table>";
            echo $reult;
        }
    }

    public function graphSubjectMeanScore($class_id) {
        //graohical report
        include("Includes/FusionCharts.php");
        $base = base_url();
        $subjects = $this->main_model->getSubjectClassById($class_id);
        foreach ($subjects as $subject) {
            $subjectNm = $subject['subjectname'];
            //Create an XML data document in a string variable
            $strXML = "";
            $strXML .= "<graph caption='Meansore  - $subjectNm' xAxisName=' Description' yAxisName='Meanscore'
                                   decimalPrecision='0' formatNumberScale='0'>";
            $exams = $this->main_model->getExamSubjectMeanscoresByClassAndSubject($class_id, $subject['subjectclass_id']);
            foreach ($exams as $exam) {
                $years = $exam['yearfrom'] . ' / ' . $exam['yearto'];
                $examdesc = $exam['examdesc'];
                $meanscore = $exam['meanscore'];
                $subject = $exam['subjectname'];

                $strXML .= "<set name='$examdesc $years  ' value='$meanscore' colo='getFCColor()' />";
            }
            $strXML .= "</graph>";

            //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
            echo renderChartHTML("$base/FusionCharts/Column2D.swf", "", $strXML, "myNext", 850, 300);
        }
    }

    /*     * ******end::*FUSION CHARTS********* */

    /*     * ******************end : MANAGE EXAMINATION MODULE ************************************* */
    /*     * **********************8STUDENTS******************************************************** */


    /*
     * ******** CRUD*******
     * CREATE new student
     * EDIT Student
     * Delete Student
     * ********************
     */

//registration new Student Home Page

    public function studentsregistration($id, $action) {
        if (empty($id) || $id == 0 || $action == "") {
            $this->load->view('school/studentsregistration');
        } else {
            $data['action'] = "$action";
            $data['student_id'] = $id;
            $this->load->view('school/studentsregistration', $data);
        }
    }

//List of current students
    public function studentList() {
        $this->load->view('school/studentslist');
    }

//List of current students
    public function searchStudent() {
        $data['student'] = $this->input->post('student');
        $this->load->view('school/students', $data);
    }

//List of Alumni students
    public function studentAlumni() {
        $this->load->view('school/studentsalumni');
    }

    //List of Alumni students
    public function studentAdmissionCard($student_id) {
        $data['student'] = $student_id;
        $data['schoolDetails'] = $this->main_model->getschooldescription();
        $data['studentDetails'] = $this->main_model->getStudentById($student_id);
        $this->load->view('school/studentadmissioncard', $data);
    }

//Gender Report students
    public function studentGenderReport() {
        $this->load->view('school/studentgenderreport');
    }

//ADD/CREATE new student
    public function studentAdd() {
        $data['firstname'] = ucfirst($this->input->post('firstname'));
        $data['middlename'] = ucfirst($this->input->post('middlename'));
        $data['lastname'] = ucfirst($this->input->post('lastname'));
        $data['gender'] = ucfirst($this->input->post('gender'));
        $data['guardianfullname'] = ucfirst($this->input->post('guardianfullname'));
        $data['guardianphone'] = $this->input->post('guardianphone');
        $data['guardianotherphone'] = $this->input->post('guardianotherphone');
        $data['guardianemail'] = $this->input->post('guardianemail');
        $data['physicaladdress'] = ucfirst($this->input->post('physicaladdress'));
        $data['pobox'] = $this->input->post('pobox');
        $data['location'] = ucfirst($this->input->post('location'));
        $data['class_id'] = $this->input->post('class_id');
        $data['academicyear_id'] = $this->input->post('academicyear_id');
        if ($_POST['submit'] == 'Save') {
            $this->db->insert('students', $data);
            //get last inserted ID
            $id = mysql_insert_id();
            //insert student clas stream
            $this->studentStreamSave($id, $this->input->post('academicyear_id'), $this->input->post('class_id'));
            //check if uploaded or not
            if (empty($_FILES["fileToUpload"]["name"])) {
                redirect('school/studentList/', 'refresh');
            } else {
                //$this->do_upload($id);
                $config['upload_path'] = 'thumbs/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '100';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';
                $config['file_name'] = mt_rand() . 'student' . $id . $_FILES["fileToUpload"]["name"];
                $this->load->library('upload', $config);
                // re-initialize upload library
                $this->upload->initialize($config);
                ;
                $this->upload->do_upload('fileToUpload');
                $data['file'] = $config['file_name'];
                $this->db->where('student_id', $id);
                $this->db->update('students', $data);
                $error = array('error' => $this->upload->display_errors());
                if ($error == "") {
                    $data = $this->session->set_flashdata('message', $error);
                } else {
                    $data = $this->session->set_flashdata('message', 'Student Successfully Saved');
                }
                redirect('school/studentList/0/0', 'refresh', $data);
            }
        } elseif ($_POST['submit'] == 'Edit') {
            if (empty($_FILES["fileToUpload"]["name"])) {
                $this->db->where('student_id', $this->input->post('student_id'));
                $this->db->update('students', $data);
                redirect('school/studentList/0/0', 'refresh');
            } else {
                //upload photo
                $config['upload_path'] = 'thumbs/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '100';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';
                $config['file_name'] = mt_rand() . 'student' . $this->input->post('student_id') . $_FILES["fileToUpload"]["name"];
                $this->load->library('upload', $config);
                // re-initialize upload library
                $this->upload->initialize($config);
                // $this->upload->do_upload('fileToUpload');
                $this->upload->do_upload('fileToUpload');
                $data['file'] = $config['file_name'];
                $this->db->where('student_id', $this->input->post('student_id'));
                $this->db->update('students', $data);
                $error = array('error' => $this->upload->display_errors());
                if ($error == "") {
                    $data = $this->session->set_flashdata('message', $error);
                } else {
                    $data = $this->session->set_flashdata('message', 'Student Successfully Update');
                }
                redirect('school/studentList/0/0', 'refresh', $data);
            }
        } elseif ($_POST['submit'] == 'Delete') {
            $data['deleted'] = 1;
            $this->db->where('student_id', $this->input->post('student_id'));
            $this->db->update('students', $data);
            $data = $this->session->set_flashdata('message', 'Successfully Deleted');
            redirect('school/studentList/0/0', 'refresh', $data);
        }
    }

    function do_upload($id) {
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);
        $this->upload->do_upload('fileToUpload');

        if (!$this->upload->do_upload('fileToUpload')) {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            var_dump($error);
        }
    }

//Upload Photo to Folder
    public function upload($id) {
        $target_dir = "uploads/";
        $filename = $_FILES["fileToUpload"]["name"];
        $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
        $file_ext = substr($filename, strripos($filename, '.')); // get file name
        // Rename file
        //name give if filename doesnt exist
        $newfilename = $id . 'student' . $file_ext;

        $target_file = $target_dir . $newfilename;
        //Check if file already exists
        //if exist - change newname to a rondomised ID
        if (file_exists($target_file)) {
            $newfilename = $id . '-' . mt_rand() . 'student' . $file_ext;
            $target_file = $target_dir . $newfilename;
        }
        //update db
        $data['file'] = $newfilename;
        $this->db->where('student_id', $id);
        $this->db->update('students', $data);


        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $this->createThumbs("uploads/", "thumbs/", 100);
            } else {
                
            }
        }
    }

//Create Thumb of uploaded file
    Public function createThumbs($pathToImages, $pathToThumbs, $thumbWidth) {
        // open the directory
        $dir = opendir($pathToImages);

        // loop through it, looking for any/all JPG files:
        while (false !== ($fname = readdir($dir))) {
            // parse path for the extension
            $info = pathinfo($pathToImages . $fname);
            // continue only if this is a JPEG image
            if (strtolower($info['extension']) == 'jpg' || 'gif' || 'png') {
                // load image and get image size
                $img = imagecreatefromjpeg("{$pathToImages}{$fname}");
                $width = imagesx($img);
                $height = imagesy($img);

                // calculate thumbnail size
                $new_width = $thumbWidth;
                $new_height = floor($height * ( $thumbWidth / $width ));

                // create a new temporary image
                $tmp_img = imagecreatetruecolor($new_width, $new_height);

                // copy and resize old image into new image
                imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

                // save thumbnail into a file
                imagejpeg($tmp_img, "{$pathToThumbs}{$fname}");
            }
        }
        // close the directory
        closedir($dir);
    }

//save class stream
    public function studentStreamSave($srudent_id, $academicyear_id, $class_id) {
        $data['student_id'] = $srudent_id;
        $data['academicyear_id'] = $academicyear_id;
        $data['class_id'] = $class_id;
        $this->db->insert('studentstream', $data);
    }

//getStudents by Ajax
    public function getStudents() {
        $this->load->view("school/getStudents");
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /*     * ****FEE MODULE*****
     * 1.list of fee - feeStructure()
     * 2. Add new  fee - feeStructureAdd()
     */

//Fee Category
    public function feeCategory() {
        $this->load->view('school/feecategory');
    }

//Fee Description
    public function feeDescription() {
        $this->load->view('school/feedescription');
    }

//add fee category
    public function feeCategoryAdd() {
        if ($_POST['submit'] == 'Save') {
            $data['categorydescription'] = strtoupper($this->input->post('description'));
            $this->db->insert('feecategory', $data);
            $data = $this->session->set_flashdata('message', 'Category Successfully Saved');
            redirect('school/feecategory/', 'refresh', $data);
        } elseif ($_POST['submit'] == 'Edit') {
            $data['categorydescription'] = strtoupper($this->input->post('description'));
            $this->db->where('feecategory_id', $this->input->post('feecategory_id'));
            $this->db->update('feecategory', $data);
            $data = $this->session->set_flashdata('message', 'Category Successfully Updated');
            redirect('school/feecategory/', 'refresh', $data);
        } elseif ($_POST['submit'] == 'Delete') {
            $data['deleted'] = 1;
            $this->db->where('feecategory_id', $this->input->post('feecategory_id'));
            $this->db->update('feecategory', $data);
            $data = $this->session->set_flashdata('message', 'Category Successfully Deleted');
            redirect('school/feecategory/', 'refresh', $data);
        }
    }

//add fee Description
    public function feeDescriptionAdd() {
        if ($_POST['submit'] == 'Save') {
            $data['feedescription'] = strtoupper($this->input->post('feedescription'));
            $this->db->insert('feedescription', $data);
            $data = $this->session->set_flashdata('message', 'Fee Description Successfully Saved');
            redirect('school/feedescription/', 'refresh', $data);
        } elseif ($_POST['submit'] == 'Edit') {
            $data['feedescription'] = strtoupper($this->input->post('feedescription'));
            $this->db->where('feedescription_id', $this->input->post('feedescription_id'));
            $this->db->update('feedescription', $data);
            $data = $this->session->set_flashdata('message', 'Fee Description  Successfully Updated');
            redirect('school/feedescription/', 'refresh', $data);
        } elseif ($_POST['submit'] == 'Delete') {
            $data['deleted'] = 1;
            $this->db->where('feedescription_id', $this->input->post('feedescription_id'));
            $this->db->update('feedescription', $data);
            $data = $this->session->set_flashdata('message', 'Fee Description Successfully Deleted');
            redirect('school/feedescription/', 'refresh', $data);
        }
    }

//Fee structure
    public function feeStructure() {
        $this->load->view('school/feestructure');
    }

//add new fee structure page
    public function feeStructureAdd() {
        $this->load->view('school/feestructureadd');
    }

//Settings to feestructure
    public function feeStructureSettings() {
        $this->load->view('school/feestructuresettings');
    }

//add new fee structure page with ID
    public function feeStructureEdit($feestructure_id, $action) {
        $data['feestructure_id'] = $feestructure_id;
        $data['action'] = $action;
        $this->load->view('school/feestructureadd', $data);
    }

//fee structure listing
//Fee Colection
    public function feeStructureList() {
        $data['class_id'] = $this->input->post('class_id');
        $data['category'] = $this->input->post('category');
        $data['term_id'] = $this->input->post('term_id');
        $data['academicyear_id'] = $this->input->post('academicyear_id');
        $this->load->view('school/feestructurelist', $data);
    }

    public function feeStructureSave() {
        $data['category'] = $this->input->post('category');
        //$data['period'] =  $this->input->post('period');
        $data['description'] = $this->input->post('description');
        //$data['amounttotal'] =  $this->input->post('amounttotal');
        $data['specialdescription'] = $this->input->post('specialdescription');
        $data['discountpercent'] = $this->input->post('discountpercent');
        $data['discountamount'] = $this->input->post('discountamount');
        $data['academicyear_id'] = $this->input->post('academicyear_id');
        $data['term_id'] = $this->input->post('term_id');
        if ($_POST['submit'] == 'Save') {
            //count number of rows

            $count = count($this->input->post('amountadd'));
            for ($i = 0; $i < $count; $i++) {
                $temp['description'] = $_POST['description'][$i];
                $temp['amount'] = $_POST['amountadd'][$i];
                $temp['feegroup'] = $_POST['feegroup'][$i];
                $items[] = $temp;
            }
            foreach ($this->input->post('class_id') as $classes) {
                foreach ($this->input->post('term_id') as $terms) {
                    foreach ($items as $item) {
                        $data['class_id'] = $classes;
                        $data['amount'] = $item['amount'];
                        $data['description'] = $item['description'];
                        $data['feegroup'] = $item['feegroup'];
                        $data['term_id'] = $terms;
                        if (empty($item['amount'])) {
                            
                        } else {
                            $this->db->insert('feestructure', $data);
                        }
                    }
                }
            }
            $data = $this->session->set_flashdata('message', 'Fee Structure Successfully Saved');
            redirect('school/feeStructure/', 'refresh', $data);
        } elseif ($_POST['submit'] == 'Edit') {
            $data['class_id'] = $this->input->post('class_id');
            $data['term_id'] = $this->input->post('term_id');
            $data['amount'] = $this->input->post('amount');
            $data['description'] = $this->input->post('description');
            $this->db->where('feestructure_id', $this->input->post('feestructure_id'));
            $this->db->update('feestructure', $data);
            $data = $this->session->set_flashdata('message', 'Fee Structure  Successfully Updated');
            redirect('school/feeStructure/', 'refresh', $data);
        } elseif ($_POST['submit'] == 'Delete') {
            $data['class_id'] = $this->input->post('class_id');
            $data['term_id'] = $this->input->post('term_id');
            $data['amount'] = $this->input->post('amount');
            $data['description'] = $this->input->post('description');
            $data['deleted'] = 1;
            $this->db->where('feestructure_id', $this->input->post('feestructure_id'));
            $this->db->update('feestructure', $data);

            $data = $this->session->set_flashdata('message', 'Fee Structure  Successfully Deleted');
            redirect('school/feeStructure/', 'refresh', $data);
        }
    }

//Fee Colection Home Page
    public function feeCollectionHome() {
        $this->load->view('school/feecollectionhome');
    }

//Fee Colection
    public function feeCollection() {
        $data['class_id'] = $this->input->post('class_id');
        $data['category'] = $this->input->post('category');
        $data['term_id'] = $this->input->post('term_id');
        $this->load->view('school/feecollection', $data);
    }

//Fee Collection Student
    public function feeCollectionStudent() {
        $data['class_id'] = $this->input->post('class_id');
        $data['student_id'] = $this->input->post('student_id');
        $data['category'] = $this->input->post('category');
        $data['term_id'] = $this->input->post('term_id');
        $this->load->view('school/feecollectionstudent', $data);
    }

//Fee Colection   Report Home Page
    public function feeCollectionReportHome() {
        $this->load->view('school/feecollectionreporthome');
    }

//Fee Colection   Report Home Page
    public function feeCollectionReport() {
        $data['academicyear_id'] = $this->input->post('academicyear_id');
        $data['term_id'] = $this->input->post('term_id');
        $this->load->view('school/feecollectionreport', $data);
    }

////////////////////////////END FEE MODULE //////////////////////////////////////////////////////////////////////////////
    /*     * *******************FEE PAYMENTS******************************************* */
    public function feePayAdd() {
        $data['class_id'] = $this->input->post('class_id');
        $data['feestructure_id'] = $this->input->post('feestructure_id');
        $data['academicyear_id'] = $this->input->post('academicyear_id');
        $data['student_id'] = $this->input->post('student_id');
        $data['feecategory'] = $this->input->post('feecategory');
        $data['pay'] = $this->input->post('pay');
        $data['fixedpay'] = $this->input->post('fixedpay');
        $data['receipt'] = $this->input->post('receipt');
        $data['overpay'] = $this->input->post('overpay');
        $data['term_id'] = $this->input->post('term_id');
        $data['staff_id'] = $this->session->userdata('staff_id');
        ;
        if ($_POST['submit'] == 'Save') {
            //count number of rows
            $count = count($this->input->post('pay'));
            for ($i = 0; $i < $count; $i++) {
                $temp['feestructure_id'] = $_POST['feestructure_id'][$i];
                $temp['pay'] = $_POST['pay'][$i];
                $temp['feegroup'] = $_POST['feegroup'][$i];
                $temp['fixedpay'] = $_POST['fixedpay'][$i];
                $temp['balance'] = ($_POST['fixedpay'][$i] - $_POST['pay'][$i]);
                $items[] = $temp;
            }
            foreach ($items as $item) {
                $data['feestructure_id'] = $item['feestructure_id'];
                $data['pay'] = $item['pay'];
                $data['fixedpay'] = $item['fixedpay'];
                $data['balance'] = $item['balance'];
                if (empty($item['pay'])) {
                    
                } else {
                    $checkIfSaved = $this->main_model->getFeePaySaved($this->input->post('academicyear_id'), $this->input->post('student_id'), $this->input->post('class_id'), $this->input->post('feecategory'), $item['pay'], $item['feestructure_id'], $item['fixedpay'], $item['balance'], $this->input->post('term_id'));
                    $checkIfSavedDifferentAmount = $this->main_model->getFeeAmountPaidSavedDifferent($this->input->post('academicyear_id'), $this->input->post('student_id'), $this->input->post('class_id'), $this->input->post('feecategory'), $item['feestructure_id'], $this->input->post('term_id'));
                    if (empty($checkIfSaved) || empty($checkIfSavedDifferentAmount)) {
                        $this->db->insert('feepay', $data);
                        $feepay_id = mysql_insert_id();
                        $this->feePayHistorySave($this->input->post('student_id'), $feepay_id, $item['balance'], $item['pay'], $item['feestructure_id'], 0);
                    } else {
                        
                    }
                }
                if ($item['feegroup'] == 'Compulsory' || $item['pay'] = 0) {
                    $checkIfSaved = $this->main_model->getFeePaySaved($this->input->post('academicyear_id'), $this->input->post('student_id'), $this->input->post('class_id'), $this->input->post('feecategory'), $item['pay'], $item['feestructure_id'], $item['fixedpay'], $item['balance'], $this->input->post('term_id'));
                    $checkIfSavedDifferentAmount = $this->main_model->getFeeAmountPaidSavedDifferent($this->input->post('academicyear_id'), $this->input->post('student_id'), $this->input->post('class_id'), $this->input->post('feecategory'), $item['feestructure_id'], $this->input->post('term_id'));
                    if (empty($checkIfSaved) || empty($checkIfSavedDifferentAmount)) {
                        $this->db->insert('feepay', $data);
                        $feepay_id = mysql_insert_id();
                        $this->feePayHistorySave($this->input->post('student_id'), $feepay_id, $item['balance'], $item['pay'], $item['feestructure_id'], 0);
                    } else {
                        
                    }
                }
            }
            $data['category'] = $this->input->post('feecategory');
            $this->load->view('school/feecollectionstudent', $data);
        } elseif ($_POST['submit'] == 'Update') {
            $pay = $this->input->post('pay') + $this->input->post('updatebal');
            $balance = $this->input->post('balance') - $this->input->post('updatebal');
            $feestructure_id = $this->input->post('feestructure_id');
            $this->feePayHistorySave($this->input->post('student_id'), $this->input->post('feepay_id'), $balance, $this->input->post('updatebal'), $feestructure_id, 0);
            //$this->feePayHistorySave($this->input->post('student_id') , $this->input->post('feepay_id') , $balance , $pay , $feestructure_id , 1);
            $data['balance'] = $balance;
            $data['pay'] = $pay;
            $this->db->where('feepay_id', $this->input->post('feepay_id'));
            $this->db->update('feepay', $data);
            $data['category'] = $this->input->post('feecategory');
            $this->load->view('school/feecollectionstudent', $data);
        }
    }

//save Feepay History
    public function feePayHistorySave($student_id, $feepay_id, $balance, $pay, $feestructure_id, $current) {
        $data['feepay_id'] = $feepay_id;
        $data['student_id'] = $student_id;
        $data['balancehistory'] = $balance;
        $data['payhistory'] = $pay;
        $data['feestructure_id'] = $feestructure_id;
        $data['current'] = $current;
        $this->db->insert('feepayhistory', $data);
    }

//RECEIPT Fee
    public function feeStudentReceipt() {
        $data['class_id'] = $this->input->post('class_id');
        $data['feestructure_id'] = $this->input->post('feestructure_id');
        $data['academicyear_id'] = $this->input->post('academicyear_id');
        $data['student_id'] = $this->input->post('student_id');
        $data['category'] = $this->input->post('feecategory');
        $data['term_id'] = $this->input->post('term_id');
        $this->load->view('school/feestudentreceipt', $data);
    }

//Fee Dues - home
    public function feeDues() {
        $this->load->view('school/feedues');
    }

//Fee Statements - Page
    public function feeStatement($student_id, $academicyear_id, $term_id) {
        $data['academicyear_id'] = $academicyear_id;
        $data['student_id'] = $student_id;
        $data['term_id'] = $term_id;
        $this->load->view('school/feestatement', $data);
    }

//SMS
    public function manageSms() {
        $this->load->view('school/managesms');
    }

    public function feeDuesSms() {
        $data['student_id'] = $this->input->post('student_id');
        $this->load->view('school/sms', $data);
    }

    public function feeDuesSmss() {
        $this->load->view('school/sms');
    }

//sms to students
    public function studentSms() {
        $data['student_id'] = $this->input->post('student_id');
        $data['studentmessage'] = $this->input->post('studentmessage');
        $this->load->view('school/smsStudents', $data);
    }

//sms to Staffs
    public function smsStaffs() {
        $data['staff_id'] = $this->input->post('staff_id');
        $data['staffmessage'] = $this->input->post('staffmessage');
        $this->load->view('school/smsStaffs', $data);
    }

    public function smsSent() {
        $this->load->view('school/smsSent');
    }

    /*     * ******************DOCUMENT MANAGER ***************************** */

//home page 
    public function manageSchoolDocuments() {
        $this->load->view('school/manageschooldocuments');
    }

//upload document
    public function uploadDocument() {
        $config['upload_path'] = './documents/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg||pdf|doc|docx|xml|xls|xlsx|csv|ppt';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if ($_POST || $_FILES) {
            if (!$this->upload->do_upload('fileToUpload')) {
                $error = $this->upload->display_errors('<p>', '</p>');
                $data = $this->session->set_flashdata('message', $error);
                redirect('school/manageschooldocuments/', 'refresh', $data);
            } else {
                $w = $this->upload->data();
                $data['staff_id'] = $this->session->userdata('staff_id');
                $data = array(
                    'filename' => $w['file_name'],
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'staff_id' => 1,
                );
                $this->db->insert('documents', $data);
            }
        }
        $data = $this->session->set_flashdata('message', 'Document Successfully Added');
        redirect('school/manageschooldocuments/', 'refresh', $data);
    }

    //delete document
    public function documentDelete($document_id) {
        $data['deleted'] = 1;
        $this->db->where('document_id', $document_id);
        $this->db->update('documents', $data);
        $data = $this->session->set_flashdata('message', 'Document Successfully Deleted');
        redirect('school/manageschooldocuments/', 'refresh', $data);
    }

    /*     * *******FUSION CHARTS********* */

    public function FusionCharts() {
        $this->load->view('school/FusionCharts/Column3D.swf');
    }

    /*     * ******end::*FUSION CHARTS********* */
    /*     * *******ATTEDANCE MANAGEMENT********* */

    public function attendanceTimings() {
        $this->load->view('school/attendancetiming');
    }

//Add A-Timings
    public function attendanceTimingAdd() {
        if ($_POST['submit'] == 'Save') {
            $data['description'] = $this->input->post('description');
            $this->db->insert('attendancetiming', $data);
            redirect('school/attendanceTimings/', 'refresh');
        } elseif ($_POST['submit'] == 'Edit') {
            $data['description'] = $this->input->post('description');
            $this->db->where('attendancetiming_id', $this->input->post('attendancetiming_id'));
            $this->db->update('attendancetiming', $data);
            redirect('school/attendanceTimings/', 'refresh');
        } elseif ($_POST['submit'] == 'Delete') {
            $data['deleted'] = 1;
            $this->db->where('attendancetiming_id', $this->input->post('attendancetiming_id'));
            $this->db->update('attendancetiming', $data);
            $data = $this->session->set_flashdata('message', 'Attendance Timing Successfully Saved');
            redirect('school/attendanceTimings/', 'refresh', $data);
        }
    }

//attendance sheet page
    public function attendanceSheet() {
        $this->load->view('school/attendancesheet');
    }

//getStudents by Ajax
    public function getStudentsASheet() {
        $this->load->view("school/getstudentsAsheet");
    }

//history attendance home page
    public function attendanceHistory() {
        $this->load->view("school/attendancehistory");
    }

//history attendance per student
    public function attendanceHistoryStudent($student_id) {
        $data['student_id'] = $student_id;
        $this->load->view("school/attendancehistorystudent", $data);
    }

//Add Attendance shheeet
    public function attendanceSheetAdd() {
        if ($_POST['submit'] == 'Save') {
            foreach ($this->input->post('student_id') as $student_id) {
                $pp = 'present' . $student_id;
                foreach ($this->input->post($pp) as $present) {
                    $data['attendancetiming'] = $this->input->post('attendancetiming');
                    $data['class_id'] = $this->input->post('class_id');
                    $data['student_id'] = $student_id;
                    $data['staff_id'] = $this->session->userdata('staff_id');
                    $data['description'] = $present;
                    $date = date('Y-m-d');
                    $checkExistance = $this->main_model->getAttendanceSheet($this->input->post('attendancetiming'), $student_id, $present, $date);
                    if (empty($checkExistance)) {
                        $this->db->insert('attendancesheet', $data);
                    } else {
                        
                    }
                }
            }
            $data = $this->session->set_flashdata('message', 'Attendance Successfully Saved');
            redirect('school/attendanceSheet/', 'refresh', $data);
        } elseif ($_POST['submit'] == 'Edit') {
            $data['description'] = $this->input->post('present');
            $this->db->where('attendancesheet_id', $this->input->post('attendancesheet_id'));
            $this->db->update('attendancesheet', $data);
            $data = $this->session->set_flashdata('message', 'Attendance Successfully Updated');
            redirect('school/attendancesheet/', 'refresh');
        } elseif ($_POST['submit'] == 'Delete') {
            $data['deleted'] = 1;
            $this->db->where('attendancesheet_id', $this->input->post('attendancesheet_id'));
            $this->db->update('attendancesheet', $data);
            $data = $this->session->set_flashdata('message', 'Attendance Successfully Deleted');
            redirect('school/attendancesheet/', 'refresh', $data);
        }
    }

    /*     * ******end::*ATTEDANCE MANAGEMENT********* */
    /*     * *start Events Management * */

//events homepage
    public function manageEvents() {
        $this->load->view("school/manageevents");
    }

//add event
    public function eventAdd() {
        if ($_POST['submit'] == 'Save') {
            $data['description'] = $this->input->post('description');
            $data['title'] = $this->input->post('title');
            $data['dateto'] = $this->input->post('dateto');
            $data['staff_id'] = $this->session->userdata('staff_id');
            echo $this->input->post('start');
            echo $this->input->post('end');
            $this->db->insert('events', $data);
            redirect('school/manageevents/', 'refresh');
        } elseif ($_POST['submit'] == 'Edit') {
            $data['description'] = $this->input->post('description');
            $this->db->where('attendancetiming_id', $this->input->post('attendancetiming_id'));
            $this->db->update('attendancetiming', $data);
            redirect('school/attendanceTimings/', 'refresh');
        } elseif ($_POST['submit'] == 'Delete') {
            $data['deleted'] = 1;
            $this->db->where('attendancetiming_id', $this->input->post('attendancetiming_id'));
            $this->db->update('attendancetiming', $data);
            redirect('school/attendanceTimings/', 'refresh');
        }
    }

    /*     * ***end:Events Management **** */
    /*     * ***** SCHOOL MESSAGES *********************** */

//Save messages  to database
    public function messageAdd() {
        $data['message'] = $this->input->post('message');
        $data['messageto'] = $this->input->post('messageto');
        $data['messagefrom'] = $this->session->userdata('staff_id');

        $save = $this->db->insert('messages', $data);
    }

//Get messages  from  database
    public function messagesAll($id) {
        $message = $this->main_model->getMessages($id);
        $userChatting = $this->main_model->getStaffsById($id);
        $names = $userChatting[0]['othername'];
        $messagefrom = $this->session->userdata('staff_id');
        foreach ($message as $mess) {
            if ($mess['messagefrom'] == $messagefrom) {
                $feedaback = 'ME';
                $color = 'white';
            } else {
                $feedaback = $names;
                $color = '#e5e5ea';
            }
            $date = $mess['date'];
            $base = base_url();
            // $time = " <time class='timestamp' title='$date'> </time> ";
            $time = "<time class='timestamp' title='$date'></time>";

            echo "<div class='messages' style = 'background-color:$color;'>
         <li class='other'><b>  $feedaback<b></br><b>$mess[message]</b> : $mess[messageto]</li> <time class='timestamp' title='$date'></time> </div><br>";
        }
    }

//mark as read
    public function messageRead($id) {

        $this->main_model->updateToReadMessages($id);
    }

//get unread messages
    public function messageUnReadTotal() {
        $ureadNumber = $this->main_model->getUnreadMessages();
        echo $ureadNumber[0]['total'];
    }

    /*     * **** CHARTS OF ACCOUNTS******* */

//coa home
    public function coa() {
        $this->load->view("school/coa");
    }

//add coa
    public function coaAdd() {
        $data['coa'] = ucfirst($this->input->post('coa'));
        $save = $this->db->insert('coa', $data);
        $data['flashSuccess'] = $this->session->flashdata('message', 'COA Successfully Added');
        redirect(base_url() . 'index.php/school/coa', 'refresh', $data);
    }

//add coa classification
    public function coaClassificationAdd() {
        $data['classification'] = ucfirst($this->input->post('classification'));
        $data['coa_id'] = $this->input->post('coa_id');
        $save = $this->db->insert('coaclassification', $data);
        $data['flashSuccess'] = $this->session->flashdata('message', 'COA Category Successfully Added');
        redirect(base_url() . 'index.php/school/coa', 'refresh', $data);
    }

//get classified by coa ID
    public function getCoaById($id) {

        foreach ($this->main_model->getCoaClassificationByCoaId($id) as $coa) {
            $classfication = $coa['classification'];
            $classfication_id = $coa['classification_id'];

            echo "<option value = '$classfication_id'> $classfication </option><br>";
        }
    }

//add coa Income / Outcome
    public function coaAmountAdd() {
        $data['description'] = ucfirst($this->input->post('description'));
        $data['amount'] = ucfirst($this->input->post('amount'));
        $data['coa_id'] = $this->input->post('coa_id');
        $data['term_id'] = $this->input->post('term_id');
        $data['staff_id'] = $this->session->userdata('staff_id');
        $data['feedescription_id'] = $this->input->post('feedescription_id');
        $data['academicyear_id'] = $this->input->post('academicyear_id');
        $data['classification_id'] = $this->input->post('classification_id');
        $save = $this->db->insert('coafunds', $data);
        $data['flashSuccess'] = $this->session->flashdata('message', ' Successfully Added');
        redirect(base_url() . 'index.php/school/coa', 'refresh', $data);
    }

    /*
     * TCPDF
     * 
     */

    public function studentAdmissionCardPdf($student_id) {
        $data['student_id'] = $student_id;
        $data['schoolDetails'] = $this->main_model->getschooldescription();
        $data['studentDetails'] = $this->main_model->getStudentById($student_id);
        $this->load->view('school/pdf/studentAdmissionCardPdf' , $data);
    }
    public function feeStructireListPdf() {
        $data['class_id'] = $this->input->post('class_id');
        $data['category'] = $this->input->post('category');
        $data['term_id'] = $this->input->post('term_id');
        $data['academicyear_id'] = $this->input->post('academicyear_id');
       $this->load->view('school/pdf/feeStructureListPdf' , $data);
    }

//END OF CHARTS OF ACCOUNTS
    /*     * ***END************************************* */
}
