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

    public function StudentForm($array)
    {

        return $this->db->insert('student', $array);
    }
    public function Course_Form($array)
    {
        return $this->db->insert('course_master', $array);
    }

    public function Persue_Form($array)
    {
        return $this->db->insert('student_course_pursue', $array);
    }

    public function FeeDetail($persue, $amt, $id)
    {
        $array = array(
            'pursue_id' => $persue,
            'amount' => $amt,
            'createdBy' => $id
        );
        $query = $this->db->insert('fees', $array);
        // if ($query) {
        //     echo 'Student fees Added';
        // } else {
        //     echo 'Student fees not added';
        // }
    }

    public function Enquiry($array)
    {
        return $this->db->insert(' student_enquiry', $array);
    }
}
