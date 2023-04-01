<?php

class loginmodel extends CI_Model
{
    public function isvalidate($username, $password)
    {
        $q = $this->db->where(['username' => $username, 'password' => $password])
            ->get('user');
        // echo "<pre>";
        // print_r($q);
        if ($q->num_rows()) {
            return $q->row()->id;
        } else {
            return false;
        }
    }

    public function welcome()
    {
        $id = $this->session->userdata('id');
    }


    public function sign($username, $password)
    {
        $data = array(
            'username' => $username,
            'password' => $password
        );
        $query = $this->db->insert('user', $data);
        if ($query) {
            $this->session->set_flashdata('success', 'Registration successfull, Now you can login.');
            redirect('admin/index');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
            redirect('admin/register');
        }
    }

    public function StudentForm($data)
    {

        $this->db->insert('student', $data);

        // $student=array(
        //     'name'=>$name,
        //     'contact'=>$contact,
        //     // 'created_by'=>$created,
        //     'remark'=>$remark);
        //     $query=$this->db->insert('student',$student);
        //     if($query){
        //     $this->session->set_flashdata('Sucess','Deatils Add Sucessfull');
        //     }
        //     else{
        //         $this->session->set_flashdata('Error','Somthing Went Wrong');
        //     }
    }
    public function Course_Form($array)
    {
        return $this->db->insert('course_master', $array);
    }

    public function Persue_Form($array)
    {
        return $this->db->insert('student_course_pursue', $array);
    }

    // public function get_student_name()
    // {
    //     $query = $this->db->get('student');
    //     if($query){
    //         return $query->result_array();
    //     }
    // }



    // public function get_course_name()
    // {
    //     $query = $this->db->get('course_master');
    //     if($query){
    //         return $query->result();
    //     }
    // $q=$this->db->select('name')  
    //              ->from('student') 
    //              ->where(['id'=>$id)
    //              ->get();
    //              print_r($q);
    //              exit;

    // }

    // }

    // public function Fees_Form()
    // {
    //     $this->db->select("stu.	stu_course_id,stu.fees,name");
    //     $this->db->from("student_course_pursue as stu");
    //     $this->db->join("course_master as fe","stu.course_id=fe.course_id","left");
    //     $query=$this->db->get();
    //      $result=$query->result();
    //join student_course_persue=>stu_course_id match persue_id inside fees;
    // $this->db->select("stu.	stu_course_id ,	student_id,course_id");
    // $this->db->from("student_course_pursue as stu");
    // $this->db->join("fees as fe","stu.stu_course_id=fe.pursue_id","left");
    // $query=$this->db->get();
    // return $result=$query->result();
    // $this->db->select('student_course_pursue.stu_course_id,pursue_id');
    // $this->db->from('student_course_pursue');
    // $this->db->join('fees', 'fees.pursue_id = student_course_pursue.stu_course_id', 'left');
    // $query = $this->db->get();
    //   $this->db->join('fees','fees.pursue_id=student_course_pursue.stu_course_id','left');
    //   $query=$this->db->get();

    public function FeeDetail($persue, $amt, $id)
    {
        $data = array(
            'pursue_id' => $persue,
            'amount' => $amt,
            'createdBy' => $id
        );
        $query = $this->db->insert('fees', $data);
        if ($query) {
            echo 'Student fees Added';
        } else {
            echo 'student fees not added';
        }
    }

    public function Enquiry($data)
    {
        $this->db->insert(' student_enquiry', $data);
    }
    // public function Image($data)
    // {
    //     $this->db->insert('$student', $data);
    // }
}