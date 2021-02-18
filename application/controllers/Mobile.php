<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile extends CI_Controller {

	public function server_configuration(){
	
		echo "<pre>";
		print_r($GLOBALS);
		echo "</pre>";

	}
public function test(){
    date_default_timezone_set('Asia/Manila');
    echo date('Y-m-d h:i:s  ');
}
	public function login(){
		$this->load->helper(array('form','url', 'string'));
		$this->load->model('MobileModel');
		$cust = array(
			'email' => $this->input->post('email'),
			'password' => sha1($this->input->post('password'))
			);
				
		$user = $this->MobileModel->signIn($cust);

		if(!$user == null){

			if($user->status == "active"){
				$newdata = array();
				array_push($newdata,array(
					'id' => $user->id, 'status' => $user->status
				));
				
				echo json_encode(['result' => $newdata]);

			}else{
				echo json_encode(array("result" => array("error" => "not_active")));
			}
		}else{
			echo "fail";
		}

	}

	public function register(){
		$this->load->model('UserModel');
		$this->load->helper(array('form', 'string', 'url'));
		$this->load->library('form_validation');
	
		$user = array(
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'birth' => $this->input->post('birth'),
				'gender' => $this->input->post('gender'),
				'password' => sha1($this->input->post('password')),
				'activation_code' => random_string('alnum', 10),
				'status' => 'inactive',
				'picpath' => 'wonder.png'
        );
	
				$this->form_validation->set_rules('fname', 'First Name', 'required|min_length[3]');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbluser.email]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirmpass', 'Confirm Password', 'required|matches[password]|min_length[6]');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('birth', 'Birthday', 'required');
                  
				if ($this->form_validation->run() == FALSE){
					echo "Please check the fields";
				}else{
						$this->UserModel->insertUser($user);
						$config = Array(
							'protocol' => 'smtp',
							'smtp_host' => 'ssl://smtp.googlemail.com',
							'smtp_port' => "465",
							'smtp_user' => 'shelterofbacoortest@gmail.com',
							'smtp_pass' => '123qweQWE',
							'mailtype'  => 'html', 
							'charset'   => 'iso-8859-1'
						);

						$this->load->library('email', $config);
						$this->email->set_newline("\r\n");
						$this->email->from($this->input->post('fname'), 'Shelter of Hope Bacoor');
						$this->email->to($this->input->post('email')); 
						$this->email->subject('Email Confirmation');
						$data['title']	= 'Shelter of Hope Bacoor';
						$data['link'] = base_url(). 'registration/activate/'. $user['activation_code'];
						$data['code'] = $user['activation_code'];
						$body = $this->load->view('email/registration', $data,TRUE);
						$this->email->message($body); 
						$result = $this->email->send();  

						echo "success";
					}
	}



	public function activate(){
		$this->load->model('UserModel');
		$response = array();
		$email = $this->input->post('email');
		$email = $this->input->post('password');
		$cond = array(
			'activation_code' => $this->input->post('code')
			);
		
		if(!($this->UserModel->checkAccount($cond)==null)){
			$cust = array(
				'email' => $this->input->post('email'),
				'password' => sha1($this->input->post('password'))
				);
	
			$user = $this->UserModel->getUser($cust);
	
					$newdata = array(
					'id' => $user->id, 'fname'  => $user->fname, 'lname'  => $user->lname, 
					'birth'  => $user->birth, 'bio'  => $user->bio, 'gender'  => $user->gender,
					'email'     => $user->email, 'logged_in' => TRUE, 'isUser' => TRUE);
			
			$response = array(
				'auth' => true,
				'user' => $newdata
			);
		}else{
			$response = array(
			'auth' => false,
			'user' => false
			);
		}	
			echo json_encode(array("result" => $response));
	}

	// public function sendemailreset(){
	// 	$this->load->helper('string');
	// 	$this->load->model('MobileModel');
	// 	$email = $this->input->post('email');
		
	// 	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	// 	if ($this->form_validation->run() == FALSE)
	// 	{
	// 			$this->resetpassword();
	// 	}else{
	// 	$random_word = random_string('alnum',10);
	// 	$checkexistingemail = $this->MobileModel->checkexistingemailsent($email);

	// 	if($checkexistingemail > 0){
	// 		$this->UserModel->updatetokenfrompasswordreset($random_word, $email);

	// 		$config = Array(
	// 			'protocol' => 'smtp',
	// 			'smtp_host' => 'ssl://smtp.googlemail.com',
	// 			'smtp_port' => "465",
	// 			'smtp_user' => 'arcaparas24@gmail.com',
	// 			'smtp_pass' => 'Arcaparas24',
	// 			'mailtype'  => 'html', 
	// 			'charset'   => 'iso-8859-1'
	// 		);
	// 		$this->load->library('email', $config);
	// 		$this->email->set_newline("\r\n");
	// 		$this->email->from('Shelter of Bacoor');
	// 		$this->email->to($email); 
	// 		$this->email->subject('Password Reset');
	// 		$data['title']	= 'ITWSPEC6';
	// 		$data['link'] = base_url(). 'login/passwordresetform/'. $random_word.'/'.random_string('alnum',10);
	// 		$data['code'] = $random_word;
	// 		$body = $this->load->view('email/paswordreset', $data,TRUE);
	// 		$this->email->message($body); 
	// 		$result = $this->email->send();
	
	// 	}else{
	// 		$this->UserModel->inserttopasswordreset($email,$random_word);
			
	// 				$config = Array(
	// 					'protocol' => 'smtp',
	// 					'smtp_host' => 'ssl://smtp.googlemail.com',
	// 					'smtp_port' => "465",
	// 					'smtp_user' => 'marcharrison2424@gmail.com',
	// 					'smtp_pass' => '201410084',
	// 					'mailtype'  => 'html', 
	// 					'charset'   => 'iso-8859-1'
	// 				);
					
	// 				$this->load->library('email', $config);
	// 				$this->email->set_newline("\r\n");
			
	// 				$this->email->from('Shelter of Bacoor');
	// 				$this->email->to($email); 
	// 				$this->email->subject('Password Reset');
	// 				$data['title']	= 'Shelter of Bacoor';
	// 				$data['link'] = base_url(). 'login/passwordresetform/'. $random_word.'/'.random_string('alnum',25);
	// 				$data['code'] = $random_word;
	// 				$body = $this->load->view('email/paswordreset', $data,TRUE);
	// 				$this->email->message($body); 
	// 				$result = $this->email->send();
				    
	// 	}
	//   }
	//   echo json_encode(array('result' => array('response' => 'success')));
	// }
	
	public function MyProfile(){
		$this->load->helper(array('form','url', 'string'));
		$this->load->model('MobileModel');
		$cust = array(
			'id' => $this->input->post('userID'),
			);
				
		$user = $this->MobileModel->signIn($cust);

		if(!$user == null){

				$newdata = array();
				array_push($newdata,array(
					'FName' => $user->fname,
					'LName' => $user->lname,
					'Email' => $user->email,
					'Gender' => $user->gender,
					'Birthday' => $user->birth,
					'Biography' => $user->bio,
					'Picture' => base_url()."assets/user_img/".$user->picpath,
					//'Picture' => "192.168.254.115/SOH/assets/user_img/".$user->picpath,
				));
				
				echo json_encode(['result' => $newdata]);

		
		}else{
			echo "fail";
		}
	}
	public function UpdateProfile(){
		$this->load->helper(array('form','url', 'string'));
		$this->load->model('MobileModel');
		$this->load->library('form_validation');

		$image = base64_decode($this->input->post("image"));
		$image_name = uniqid(rand(), true);
		$filename = $image_name . '.' . 'jpg';
		$path = 'assets/user_img/';

		$info = array(
			'fname' => $this->input->post("fname"),
			'lname' => $this->input->post("lname"),
			'gender' => $this->input->post("gender"),
			'volunteer' =>$this->input->post("volunteer"),
			'birth' => $this->input->post("bday"),
			'bio' => $this->input->post("bio"),
			'picpath' => $image_name. '.jpg',
		);
		$this->form_validation->set_rules('fname', 'First Name', 'required|min_length[3]');
		$this->form_validation->set_rules('lname', 'Last Name', 'required|min_length[3]');
  	$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('bday', 'Birthday', 'required');
		$this->form_validation->set_rules('volunteer', 'Volunteer', 'required');
		$this->form_validation->set_rules('bio', 'Bio', 'required');

		if ($this->form_validation->run() == FALSE){
			echo "Please check the fields";
		}else{
			file_put_contents($path . $filename, $image);
			$user = $this->MobileModel->updateUser($this->input->post("userID"), $info);
			echo "success";
		}
	}
	public function UpdatePassword(){
		$this->load->model('MobileModel');
		$this->load->helper(array('form', 'string', 'url'));
		$this->load->library('form_validation');

		$usr = array(
			'id' => $this->input->post("userID"),
		);
		$pass = array(
			'password' => sha1($this->input->post("new")),
		);

		$user = $this->MobileModel->signIn($usr);
		$oldpass =  sha1($this->input->post('old'));
		$newpass = sha1($this->input->post('new'));
		$confirmpass = sha1($this->input->post('conf'));

		$this->form_validation->set_rules('old', 'OldPassword', 'required|min_length[3]');
		$this->form_validation->set_rules('new', 'NewPassword', 'required|min_length[3]');
		$this->form_validation->set_rules('conf', 'ConfirmPassword', 'required|min_length[3]');
			
		if ($this->form_validation->run() == FALSE){
			echo "Please check the fields";
		}else{
			if($oldpass == $user->password && $newpass == $confirmpass){
					$this->MobileModel->updatePassword($user->id, $pass);
					echo "success";

			}else if($oldpass == $newpass || $oldpass == $confirmpass){
					echo "Old Password already Taken!";
			}else{
					echo "Server Error";
			}
		}
	}

	public function Articles(){
	 $this->load->model('MobileModel');
	 $ArticleList = $this->MobileModel->AllArticles();
		$itemLists = array();

		foreach ($ArticleList as $item) {
				
				$pro = array();
				$pro['id'] = $item->article_id;
				$pro['desc'] = $item->article_desc;
				$pro['date'] = $item->article_date;
				$pro['title'] = $item->article_title;
				$pro['img'] = base_url()."assets/article_img/".$item->article_img;
				//$pro['img'] = "http://192.168.254.115/SOH/assets/article_img/".$item->article_img;
				$pro['likes'] = $item->likes;

				array_push($itemLists, $pro);
		}
		$json['result'] = $itemLists;
		echo json_encode($json);
	}
	public function Announcements(){
		$this->load->model('MobileModel');
		$AnnouncementList = $this->MobileModel->AllAnnouncements();
		 $itemLists = array();
 
		 foreach ($AnnouncementList as $item) {
				 
				 $pro = array();
			// $pro['id'] = $item->announcementid;
				 $pro['title'] = $item->announcementheader;
				 $pro['desc'] = $item->announcementcaption;
			//	 $pro['datetime'] = $item->time;
 
				 array_push($itemLists, $pro);
		 }
		 $json['result'] = $itemLists;
		 echo json_encode($json);
	}

	public function Communities(){
		$this->load->model('MobileModel');
		$CommunityList = $this->MobileModel->AllCommunities();
		 $itemLists = array();

		 foreach ($CommunityList as $item) {
				 
				 $pro = array();
			   $pro['id'] = $item->post_id;
				 $pro['title'] = $item->post_name;
				 $pro['desc'] = $item->caption;

				 $date = date_create($item->date);

				 $pro['date'] = date_format($date,"m/d/Y");
				 $pro['img'] = base_url()."assets/community_img/".$item->pic_loc;
				 //$pro['img'] = "http://192.168.254.115/SOH/assets/community_img/".$item->pic_loc;
 
				 array_push($itemLists, $pro);
		 }
		 $json['result'] = $itemLists;
		 echo json_encode($json);
	}
	public function CommunityPost(){
		$this->load->model('MobileModel');
		$this->load->helper(array('form', 'string', 'url'));
		$this->load->library('form_validation');
		$usr = array(
			'id' => $this->input->post('userID'),
		);
		$find = $this->MobileModel->signIn($usr);

		$image = base64_decode($this->input->post("image"));
		$image_name = uniqid(rand(), true);
		$filename = $image_name . '.' . 'jpg';
		$path = 'assets/community_img/';

		$user = array(
				'user_id' => $this->input->post('userID'),
				'caption' => $this->input->post('caption'),
				'post_name' => $find->fname . " " .$find->lname,
				'pic_loc' => $image_name. '.jpg',
        );

		$this->form_validation->set_rules('caption', 'Caption', 'required|min_length[3]');
			
		if ($this->form_validation->run() == FALSE){
			echo "Please check the fields";
		}else{
			file_put_contents($path . $filename, $image);
			$this->MobileModel->comunityPost($user);
			echo "Posted";
		}
	}
	public function CommunitiesComments(){
		$this->load->model('MobileModel');

	}
	public function CommunitiesPostComment(){
		$this->load->model('MobileModel');
		$this->load->helper(array('form', 'string', 'url'));
		$this->load->library('form_validation');
		
	}
	public function RescuePetList(){
		$this->load->model('MobileModel');
	
		$usr = array(
			'id' => $this->input->post('userID'),
		);

		$user = $this->MobileModel->signIn($usr);

			$RescuePet = $this->MobileModel->findRescue($user->id);
			$itemLists = array();
			$date = date_create($this->input->post('seen'));
			 foreach($RescuePet as $item) {
					 
					 $pro = array();
					 $pro['id'] = $item->id;
					 $pro['rname'] = $item->rescuer_name;
					 $pro['image'] = base_url()."assets/rescue_img/".$item->image;
					 $pro['address'] = $item->address;
					 $pro['type'] = $item->type;
					 $pro['description'] = $item->description;
					 $date = date_create($item->date);

					 $pro['date'] = date_format($date,"m d, Y");
					 //$pro['image'] = "http://192.168.254.115/SOH/assets/rescue_img/".$item->rescue_img;
					 array_push($itemLists, $pro);
			 }
			 $json['result'] = $itemLists;
			echo json_encode($json);

	}
	public function RescuePetPost(){
		$this->load->model('MobileModel');
		$this->load->helper(array('form', 'string', 'url'));
		$this->load->library('form_validation');
		$usr = array(
			'id' => $this->input->post('userID'),
		);
		$user = $this->MobileModel->signIn($usr);

		$image = base64_decode($this->input->post("image"));
		$image_name = uniqid(rand(), true);
		$filename = $image_name . '.' . 'jpg';
		$path = 'assets/rescue_img/';
		date_default_timezone_set('Asia/Manila'); # add your city to set local time zone
		$now = date('Y-m-d H:i:s');

		$rescue = array(
			'user_id' => $user->id,
			'rescuer_name' => $user->fname. " " . $user->lname,
			'address' => $this->input->post('address'),
			'type' => $this->input->post('type'),
			'description' => $this->input->post('desc'),
			'image' => $image_name. '.jpg',
			'date' => $now,
			'status' => 0,
		);

	  	$this->form_validation->set_rules('address', 'address', 'required|min_length[5]');
		  $this->form_validation->set_rules('type', 'type', 'required|min_length[3]');
		  $this->form_validation->set_rules('desc', 'desc', 'required|min_length[5]');
			
			if ($this->form_validation->run() == FALSE) {
				echo "Please fill all the blanks";
			}else{
				file_put_contents($path . $filename, $image);
				$this->MobileModel->insertRescuePet($rescue);
			  echo "success";
			}
	}
	public function RescuePetDelete(){
		$this->load->model('MobileModel');
		$this->load->helper(array('form', 'string', 'url'));

				 $this->MobileModel->deleteRescuePet($this->input->post('petID'));
				 echo "success";
	}
	public function LostPetList(){
		$this->load->model('MobileModel');
	
			$usr = array(
				'id' => $this->input->post('userID'),
			);

			$user = $this->MobileModel->signIn($usr);

			$LostPet = $this->MobileModel->findLost($user->fname. " " . $user->lname);
			$itemLists = array();
	
			 foreach($LostPet as $item) {
					 
					 $pro = array();
					 $pro['id'] = $item->lost_id;
					 $pro['title'] = $item->lost_title;
				     $pro['image'] = base_url()."assets/img/".$item->lost_pic;
					 //$pro['image'] = "http://192.168.254.115/SOH/assets/img/".$item->lost_pic;
					 $pro['breed'] = $item->lost_breed;
					 $pro['seen'] = $item->lost_seen;
					 $pro['desc'] = $item->lost_desc;
					 $pro['contact'] = $item->lost_contact;
					 $pro['status'] = $item->lost_status;

		

					 array_push($itemLists, $pro);
			 }
			 $json['result'] = $itemLists;
			echo json_encode($json);

	}
	public function LostPetPost(){
		$this->load->model('MobileModel');
		$this->load->helper(array('form', 'string', 'url'));
		$this->load->library('form_validation');
		$usr = array(
			'id' => $this->input->post('userID'),
		);
		$user = $this->MobileModel->signIn($usr);

		$date = date_create($this->input->post('seen'));

		$image = base64_decode($this->input->post("image"));
		$image_name = uniqid(rand(), true);
		$filename = $image_name . '.' . 'jpg';
		$path = 'assets/img/';

		$lost = array(
			'lost_title' => $this->input->post('title'),
			'lost_name' => $this->input->post('name'),
			'lost_breed' => $this->input->post('breed'),
			'lost_desc' => $this->input->post('desc'),
			'lost_contact' => $this->input->post('contact'),
			'lost_pic' => $image_name. '.jpg',
			'lost_seen' =>  date_format($date,"F d, Y"),
			'lost_uname' => $user->fname. " " . $user->lname,
		);

		$this->form_validation->set_rules('title', 'title', 'required|min_length[3]');
		$this->form_validation->set_rules('name', 'name', 'required|min_length[3]');
		$this->form_validation->set_rules('breed', 'breed', 'required|min_length[3]');
		$this->form_validation->set_rules('contact', 'contact', 'required|min_length[8]');
		$this->form_validation->set_rules('desc', 'desc', 'required|min_length[3]');

		if ($this->form_validation->run() == FALSE) {
			echo "Please fill all the blanks";
		}else{
			file_put_contents($path . $filename, $image);
			$this->MobileModel->insertLostPet($lost);
			echo "success";
		}
	}
	public function LostPetDelete(){
		$this->load->model('MobileModel');
		$this->load->helper(array('form', 'string', 'url'));

		$this->MobileModel->deleteLostPet($this->input->post('petID'));
		echo "success";
	}
		public function LostPetFound(){
	    $this->load->model('MobileModel');
		$this->load->helper(array('form', 'string', 'url'));

		$lost = array(
		    'lost_status' => $this->input->post('status'),
		    );
			$this->MobileModel->updateLostPet($this->input->post('petID'), $lost);
			echo "success";
		
	}
}