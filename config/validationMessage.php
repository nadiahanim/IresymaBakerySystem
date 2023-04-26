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
    //--------------------------------------------------------------------------------------
    //PROFILE
    //--------------------------------------------------------------------------------------
    'profile'=>  [
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
        ],
    ],

    //--------------------------------------------------------------------------------------
    //BAKERY
    //--------------------------------------------------------------------------------------
    'bakery'=>  [
        'name' => [
            'required' => 'Please Enter Your Bakery Name',
        ],
        'phone_no' => [
            'required' => 'Please Enter Your Bakery Telephone No.',
        ],
        'location' => [
            'required' => 'Please Enter Your Bakery Address',
        ],
        'description' => [
            'required' => 'Please Enter A Description',           
        ],
    ],

    //--------------------------------------------------------------------------------------
    //PRODUCT
    //--------------------------------------------------------------------------------------
    'product'=>  [
        'product_img' => [
            'required' => 'Please choose an image',
            'filemaxmegabytes' => 'Maximum size : 2MB',
            'filemimetypes' => 'Picture format allowed : jpeg | jpg| png'
        ],
        'name' => [
            'required' => 'Please Enter Product Name',
        ],
        'type' => [
            'required' => 'Please Select Product Type',
        ],
        'brand' => [
            'required' => 'Please Enter Product Brand',
        ],
        'description' => [
            'required' => 'Please Enter A Description',           
        ],
        'ingredients' => [
            'required' => 'Please Enter Product Ingredients',           
        ],
        'allergen' => [
            'required' => 'Please Enter Product Allergens',           
        ],
        'price' => [
            'required' => 'Please Enter Product Price',           
        ],
    ],

    //--------------------------------------------------------------------------------------
    //SERVICE
    //--------------------------------------------------------------------------------------
    'service'=>  [
        'name' => [
            'required' => 'Please Enter Service Name',
        ],
        'category' => [
            'required' => 'Please Select Service Category',
        ],
        'price' => [
            'required' => 'Please Enter Service Price',           
        ],
    ],

    //--------------------------------------------------------------------------------------
    //CAKE
    //--------------------------------------------------------------------------------------
    'cake'=>  [
        'cake_img' => [
            'required' => 'Please choose an image',
            'filemaxmegabytes' => 'Maximum size : 2MB',
            'filemimetypes' => 'Picture format allowed : jpeg | jpg| png'
        ],
        'name' => [
            'required' => 'Please Enter Cake Name',
        ],
        'description' => [
            'required' => 'Please Enter Description',
        ],
        'shape' => [
            'required' => 'Please Select Cake Shape',
        ],
        'flavour' => [
            'required' => 'Please Select Cake Flavour',
        ],
        'cream' => [
            'required' => 'Please Select Cream Flavour',
        ],
        'size' => [
            'required' => 'Please Select Cake Size',
        ],
        'tier' => [
            'required' => 'Please Select No. of Tier',
        ],
        'deco' => [
            'required' => 'Please Select Cake Decoration',
        ],
        
    ],

    //--------------------------------------------------------------------------------------
    //RECIPE
    //--------------------------------------------------------------------------------------
    'recipe'=>  [
        'title' => [
            'required' => 'Please Enter Title',
        ],       
    ],

];