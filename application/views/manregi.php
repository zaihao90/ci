
<center><h1>Manual Registration</h1><table><tr><td>
<?php
    echo form_open('index.php/fbdefaultlogin/manualreg', ['class' => 'form', 'method' => 'POST']);
    
    
    if(isset($_SESSION['errormessagelogin']))
    {   
        $attributes = array(
        'class' => 'class-name-yours', // external or internal css
        'style' => 'color:red;'     // or inline css, this is black color
        );
       // echo form_label(' ', $_SESSION['errormessage']);
        echo form_label($_SESSION['errormessagelogin'], 'errormsg',$attributes); 
       // echo '<span style="color:red;">'.$_SESSION['errormessage'].'</span>';
        unset($_SESSION['errormessagelogin']);
        
    }
    
    
     ?><br><br><br><?php
        // Show Name Field in View Page
        echo form_label('Email :', 'lemail');
        $logdata= array(
            'style'=>'width:200px',
            'type'=>'email',
        'name' => 'lemail',
        'placeholder' => 'Please Enter Your Email',
        'class' => 'input_box'
        );
        echo form_input($logdata);
    
    ?></td ></tr>
    <tr><td ><?php
    
    echo "<br>";
    // Show Email Field in View Page
    echo form_label('Password:', 'lpassword');
    $logdata= array(
    'style'=>'width:200px',    
    'type' => 'password',
    'name' => 'lpassword',
    'placeholder' => 'Please Enter Your Password',
    'class' => 'input_box'
    );
    echo form_input($logdata);

    ?></td></tr>
    <tr><td><?php

    echo "<br>";
    // Show Email Field in View Page
    echo form_label('Confirm Password:', 'lconpassword');
    $logdata= array(
    'style'=>'width:200px',    
    'type' => 'password',
    'name' => 'lconpassword',
    'placeholder' => 'Please Enter Your Confirm Password',
    'class' => 'input_box',
    'rules'   => 'trim|required|matches[lpassword]'
    );
    echo form_input($logdata);

    ?></td></tr>
  <tr><td ><?php
    
    echo "<br>";
    // Show Email Field in View Page
    echo form_label('First Name:', 'lfirstname');
    $logdata= array(
    'style'=>'width:200px',    
    'type' => 'text',
    'name' => 'lfirstname',
    'placeholder' => 'Please Enter Your First Name',
    'class' => 'input_box'
    );
    echo form_input($logdata);
   ?></td></tr>    
  <tr><td><?php
    
    echo "<br>";
    // Show Email Field in View Page
    echo form_label('Last Name:', 'llastname');
    $logdata= array(
    'style'=>'width:200px',    
    'type' => 'text',
    'name' => 'llastname',
    'placeholder' => 'Please Enter Your Last Name',
    'class' => 'input_box'
    );
    echo form_input($logdata);

    ?></td></tr>
  <tr><td><?php
    
    echo "<br>";
      echo form_label('Female:', 'llastname');
    echo form_radio('lgender','F',true);
      echo form_label('Male:', 'llastname');
    echo form_radio('lgender','M',true);

    ?></td></tr>
    <tr><td><?php
    
        echo "<br>";
        // Show Update Field in View Page
        
        $logdata = array(
        'type' => 'submit',
        'value'=> 'Submit',
        'class'=> 'submit'
        );
       echo form_submit($logdata);
    

    // Close Form
     echo form_close();
    
?>
    </td></tr></table>