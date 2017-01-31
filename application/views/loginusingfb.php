
<?php

//require_once __DIR__ . '/Facebook/autoload.php';
require_once($_SERVER['DOCUMENT_ROOT'].'/ci/application/third_party/Facebook/autoload.php' );


$fb = new Facebook\Facebook([
  'app_id' => '1772770293044126',
  'app_secret' => 'a9cf53e00f7379e2db948a372c0eb399',
  'default_graph_version' => 'v2.8',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // optional
	
try {
	if (isset($_SESSION['facebook_access_token'])) {
		$accessToken = $_SESSION['facebook_access_token'];
	} else {
  		$accessToken = $helper->getAccessToken();
	}
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 	// When Graph returns an error
 	echo 'Graph returned an error: ' . $e->getMessage();

  	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	exit;
 }

if (isset($accessToken)) {
	if (isset($_SESSION['facebook_access_token'])) {
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	} else {
		// getting short-lived access token
		$_SESSION['facebook_access_token'] = (string) $accessToken;

	  	// OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();

		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);

		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

		// setting default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}

	// redirect the user back to the same page if it has "code" GET variable
	if (isset($_GET['code'])) {
		header('Location: http://localhost:8888/ci/index.php/pages/login');
	}

	// getting basic info about user
	try {
		$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
		$profile = $profile_request->getGraphNode()->asArray();
        $_SESSION['name'] = $profile['name'];
        $_SESSION['first_name'] = $profile['first_name'];
        $_SESSION['last_name'] = $profile['last_name'];
        $_SESSION['email'] = $profile['email'];
        $_SESSION['userid'] = $profile['id'];
        
        
        $data = array(
            'name'      => $profile['name'],
            'first_name'    => $profile['first_name'],
            'last_name'       => $profile['last_name'],
            'email' => $profile['email'],
            'userid'      => $profile['id']
        );
         
      //  $this->load->controller('insertdata',$profile);

        header('Location: http://localhost:8888/ci/index.php/fbdefaultlogin/loginandregister');


	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
    
		session_destroy();
		// redirecting user back to app login page
		header("Location: http://localhost:8888/ci/index.php/pages/login");
        
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	
    //Setting values for tabel columns

	// printing $profile array on the screen which holds the basic info about user
	//print_r($profile);

  	// Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
} else {

 ?><table align="center" ><tr><td align="right"><?php
    // Open form and set URL for submit form
    //echo form_open('fbdefaultlogin/manuallogin');
    echo form_open('index.php/fbdefaultlogin/manuallogin', ['class' => 'form', 'method' => 'POST']);
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
    <tr><td align="right"><?php
    
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
    <tr><td align="right"><?php
    
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
        
        
        ?></td></tr><tr><td align="left" >
    
            <?php    // replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
            $loginUrl = $helper->getLoginUrl('http://localhost:8888/ci/index.php/pages/login', $permissions);
            echo '<a href="' . $loginUrl . '" style="color:black; text-decoration: underline;">Log in with Facebook!</a>';
        ?></td><td align="left">
    
            <a href="<?php echo base_url(); ?>index.php/pages/manregi" style="color:black; text-decoration: underline;">Register</a>
    
        </td></tr>
    </table><?php
    

    

}
       