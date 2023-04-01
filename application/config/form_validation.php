<?php

$config = [
    'add_student_rules' => [
        [
            'field' => 'name',
            'label' => 'Full Name',
            'rules' => 'required'
        ],
        [
            'field' => 'contact',
            'label' => 'Contact',
            'rules' => 'required'
        ],
        [
            'field' => 'remark',
            'label' => 'Remark',
            'rules' => 'required'
        ]


    ],

    'add_course_rules' => [
        [
            'field' => 'name',
            'label' => 'Course Name',
            'rules' => 'required'
        ],
        [
            'field' => 'fees',
            'label' => 'Course Fees',
            'rules' => 'required'
        ],
        [
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'required'
        ]
    ],

    'add_persue_rules' => [
        [
            'field' => 'student_id',
            'label' => 'Student Name',
            'rules' => 'required'
        ],
        [
            'field' => 'course_id',
            'label' => 'Student Course',
            'rules' => 'required'
        ],
        [
            'field' => 'fees',
            'label' => 'Student Fees',
            'rules' => 'required'
        ]
    ],


    'add_enquiry_rules' => [
        [
            'field' => 'name',
            'label' => 'Full Name',
            'rules' => 'required'
        ],
        [
            'field' => 'contact',
            'label' => 'Contact',
            'rules' => 'required'
        ],
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required'
        ],
        [
            'field' => 'interest_course',
            'label' => 'Course of Interest',
            'rules' => 'required'
        ],
        [
            'field' => 'remark',
            'label' => 'Remark',
            'rules' => 'required'
        ]
    ],

];
