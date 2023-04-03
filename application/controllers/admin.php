<?php

class Admin extends MY_Controller
{

    public function index()
    {
        $this->load->view('admin/index');
        // $this->form_validation->set_rules();
        $this->form_validation->set_rules('uname', 'User Name', 'required|alpha');
        $this->form_validation->set_rules('pass', 'Password', 'required|max_length[12]');
        $this->form_validation->set_error_delimiters("<div class='text-danger'>", "</div>");

        if ($this->form_validation->run()) {
            $uname = $this->input->post('uname');
            $pass = $this->input->post('pass');
            $this->load->model('loginmodel');
            $login_id = $this->loginmodel->isvalidate($uname, $pass);

            if ($login_id) {
                $this->session->set_userdata('id', $login_id);
                return redirect('admin/dashboard');
            } else {

                $this->session->set_flashdata('Login_Failed', 'Innvalid Usrname/Password');
                redirect('admin/index');
            }


            // echo "Sucessfull";


        } else {
            echo validation_errors();
            // $this->load->view('users/main');


        }
        if ($this->session->userdata('id')) {
            return redirect('admin/dashboard');
        }
        // if($this->session->userdata('id'))
        //         return redirect('admin/welcome');

    }

    public function Dashboard()
    {
        $this->load->model('loginmodel');
        $data['student'] = $this->db->get("student")->num_rows();
        $data['course'] = $this->db->get("course_master")->num_rows();
        $data['fees'] = $this->db->query("SELECT SUM(amount) as amt FROM fees")->result_array();
        $this->load->view('admin/dashboard', $data);
        if (!$this->session->userdata('id')) {
            return redirect('admin/index');
            $this->load->model('loginmodel');
            $this->loginmodel->welcome();
        }
    }

    public function Register()
    {
        $this->load->view('admin/register');

        // $this->form_validation->set_rules('uname','User Name','required|alpha');
    }
    public function UserRegister()
    {
        $this->form_validation->set_rules('uname', 'User Name', 'required|alpha');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        $this->form_validation->set_rules('cpass', 'Confirm Password', 'required|matches[pass]');
        $this->form_validation->set_error_delimiters("<div class='text-danger'>", "</div>");
        if ($this->form_validation->run()) {

            $uname = $this->input->post('uname');
            $pass = $this->input->post('pass');
            $cpass = $this->input->post('cpass');
            $this->load->model('loginmodel');
            $this->loginmodel->sign($uname, $pass);
        } else {
            $this->load->view('admin/register');
        }
    }

    //    $post=$this->input->post();
    //     $this->load->model('loginmodel','user_add');
    //     if($this->user_add->add_user($post)){
    //        $this->session->set_flashdata('Login_Failed','User Added Sucessfully');
    //     //    $this->session->set_flashdata('user_class','alert-success');
    //     }
    //     else{
    //        $this->session->set_flasdata('Login_Failed','User not Added PLease try Again');
    //     //    $this->session->set_flashdata('user_class','alert-danger');


    //     }
    //     return redirect('admin/register');




    public function logout()
    {
        $this->session->unset_userdata('id');
        return redirect('admin/index');
    }

    // public function StudentDetail()
    // {
    //     $this->load->view('admin/student');
    // }
    public function AddStudent()
    {
        $this->load->view('admin/detail_student');
    }

    public function StudentForm()
    {
        // $config = [
        //     'upload_path' => './upload/',
        //     'allowed_types' => 'jpg|jpeg',
        // ];

        // $this->load->library('upload', $config);
        //  $this->form_validation->set_rules('name','Full Name','required');
        // $this->form_validation->set_rules('contact','Contact','required');
        //  $this->form_validation->set_rules('remark','Remarks','required');
        //  $this->form_validation->set_rules('screated','Created','required');
        // $this->form_validation->set_error_delimiters("<div class='text-danger'>", "</div>");
        if ($this->form_validation->run('add_student_rules')) {
            // $name=$this->input->post('name');
            // $contact=$this->input->post('contact');
            // $remark=$this->input->post('remark');
            // $created=$this->input->post('screated');


            $post = $this->input->post();
            // $data = $this->upload->data();
            // echo "<pre>";
            // print_r($data);
            // exit;
            // $image = base_url("upload/" . $data['raw_name'] . $data['file_ext']);
            // $post['captured_image_data'] = $image;
            $this->load->model('loginmodel');
            $student_details = $this->loginmodel->StudentForm($post);
            // print_r($student_details);
            if ($student_details) {
                echo 'successfull';
                // } else {
                //     echo 'Unsucess Full';
                // }
            } else {
                echo validation_errors();
            }
            //  return redirect('admin/AddStudent');
        }
    }

    public function CourseDetail()
    {
        $this->load->view('admin/course_detail');
    }

    public function CourseForm()
    {
        if ($this->form_validation->run('add_course_rules')) {
            $post = $this->input->post();
            $this->load->model('loginmodel');
            $course_detail = $this->loginmodel->Course_Form($post);
            if ($course_detail) {
                echo 'Course Added Succesfully';
            } else {
                echo 'Course Added Succesfully';
            }
        } else {
            echo validation_errors();
        }
    }

    //    public function StudentPursue(){
    //     $this->load->view('admin/student_purse');
    //    }

    public function GetStudent()
    {
        //    $this->load->view('admin/student_purse');

        // $this->loginmodel->get_student_name();
        // $this->loginmodel->get_course_name();
        $this->load->model('loginmodel');
        $data['student'] = $this->db->get("student")->result_array();
        $data['courses'] = $this->db->get("course_master")->result_array();
        // $data['course'] = $this->loginmodel->get_course_name();
        // $data['course_master'] = $this->db->get("course_master")->result_array();
        $this->load->view('admin/student_purse', $data);
    }

    public function PersueForm()
    {
        if ($this->form_validation->run('add_persue_rules')) {
            $stu = $this->input->post();
            $crr = $this->input->post();
            $this->load->model('loginmodel');
            $persue = $this->loginmodel->Persue_Form($stu, $crr);
            if ($persue) {
                echo 'Student Persue Added Succesfully';
            } else {
                echo validation_errors();
            }
        }
    }

    public function Fees()
    {

        $this->load->model('loginmodel');
        $data['student'] = $this->db->get("student")->result_array();


        // $data['totalFee']=$this->db->query("SELECT fees as  total,(SELECT sum(amount) from fees where pursue_id = student_course_pursue.stu_course_id ) as remaining FROM `student_course_pursue`  WHERE stu_course_id = 1 ")->result_array();
        // $data['course']=$this->db->query("SELECT * FROM `student_course_pursue` LEFT JOIN course_master on student_course_pursue.course_id=course_master.course_id WHERE student_id")->result_array();
        $this->load->view('admin/fees', $data);
    }
    public function fetchPurseDetailByStudent($student_id)
    {

        $data = $this->db->query("SELECT * FROM `student_course_pursue` LEFT JOIN course_master on student_course_pursue.course_id=course_master.course_id WHERE student_id = $student_id");
        if ($data->num_rows() > 0) {
            $data = $data->result_array();
            echo "<option>Select</option>";
            foreach ($data as $key => $value) {
?>
<option value="<?= $value['stu_course_id'] ?>"><?= $value['name'] ?></option>";
<?php
            }
        } else {
            echo "<option>No Data</option>";
        }
    }
    public function fetchFeesByPurseId($pursue_id)
    {

        $data = $this->db->query("SELECT fees as  total,(SELECT sum(amount) from fees where pursue_id = student_course_pursue.stu_course_id ) as paid FROM `student_course_pursue`  WHERE stu_course_id = $pursue_id");
        if ($data->num_rows() > 0) {
            $data = $data->row();
            $resp = [
                "total" => 0,
                "paid" => 0,
                "remaining" => 0,
            ];

            if ($data->total) {
                $resp['total'] = $data->total;
            }
            if ($data->paid) {
                $resp['paid'] = $data->paid;
            }

            $resp['remaining'] = $resp['total'] - $resp['paid'];


            echo json_encode($resp);
        } else {
            echo 0;
        }
    }
    public function showFeeListByPurseId($pursue_id)
    {

        $data = $this->db->get_where("fees", ["pursue_id" => $pursue_id])->result_array();


        // print_r($data);

    }

    public function InsertFeeDetail()
    {
        $this->form_validation->set_rules('sname', 'Student Name', 'required');
        $this->form_validation->set_rules('pfees', 'Student Fees', 'required');
        if ($this->form_validation->run()) {

            $sname = $this->input->post('sname');
            $pfees = $this->input->post('pfees');
            $id = $this->input->post('id');
            $id = $this->session->userdata('id');
            // $cpass=$this->input->post('cpass');
            $this->load->model('loginmodel');
            $this->loginmodel->FeeDetail($sname, $pfees, $id);
        } else {
            echo validation_errors();
        }
    }

    public function StudentHistory()
    {
        $this->load->model('loginmodel');
        $data['student'] = $this->db->query("SELECT *,(select count(*) from student_course_pursue where student_course_pursue.student_id = student.id) as count FROM `student`")->result_array();
        // print_r($data);
        // $data['student']=$this->db->get('student')->result_array();
        $this->load->view('admin/student_history', $data);
    }


    public function StudentDetailed($stuid)
    {
        $this->load->model('loginmodel');
        $data['student'] = $this->db->query("SELECT * FROM student WHERE id=$stuid")->result_array();
        $data['courses'] = $this->db->query("SELECT name,student_course_pursue.fees,student_course_pursue.stu_course_id FROM `student_course_pursue` left JOIN course_master on course_master.course_id = student_course_pursue.course_id  WHERE student_id=$stuid")->result_array();
        $data['user'] = $this->db->query("SELECT createdBy,username FROM fees LEFT JOIN user ON fees.createdBy = user.id;")->result_array();
        // print_r($data);
        $this->load->view('admin/view_detail', $data);
    }

    public function StudentAdmission()
    {

        $this->load->view('admin/student_enquiry');
    }


    public function StudentEnquiryForm()
    {

        if ($this->form_validation->run('add_enquiry_rules')) {
            $post = $this->input->post();
            $this->load->model('loginmodel');
            $enquiry = $this->loginmodel->Enquiry($post);
            if ($enquiry) {
                echo 'Enquiry Added Sucessfully';
            }
        } else {
            echo validation_errors();
        }
    }

    public function WEbcam()
    {

        $this->load->view('admin/webcam');
    }

    public function img_upload()
    {

        $folderPath = 'upload/';
        $image_parts = explode(";base64,", $_POST['image']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.png';
        file_put_contents($file, $image_base64);
        echo json_encode(["Image uploaded successfully."]);
    }
}