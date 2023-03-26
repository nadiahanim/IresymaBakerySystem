<?php

return [
    //--------------------------------------------------------------------------------------
    //LOGIN / REGISTER
    //--------------------------------------------------------------------------------------

    'login'=>  [
        'all'=> 'Please enter a valid Email Address and Password to log in to the system.',
        'error'=> 'Sorry. You are not allowed to access the system.',
        'success'=> 'Successfully logged in.',
        'email' => [
            'required' => 'Please Enter A Valid Email Address',
        ] ,
        'password' => [
            'required' => 'Pleas Enter A Valid Password',
        ],
    ],
    'register' => [
        'success'=> 'Registration success. You can log in now.',
        'error'=> 'Sorry. Registration failed.',
        'name' => [
            'required' => 'Please Enter Your Full Name',
        ],
        'phone_no' => [
            'required' => 'Please Enter Your Telephone No.',
        ],
        'address' => [
            'required' => 'Please Enter Your Home Address',
        ],
        'email' => [
            'required' => 'Please Enter Your Email Address',
            'email' => 'Please Enter A Valid Email Address',
        ] ,
        'password' => [
            'required' => 'Pleas Enter Your Password',
            'digits' => 'Password must have at least 12 characters',
            'uppercase' => 'Password must have at least one uppercase letter',
            'lowercase' => 'Password must have at least one lowercase letter',
            'number' => 'Password must have at least one number',
            'regex' => 'Password must have at least one special character [!@#$%^&*-_]',
        ],
    ],
];