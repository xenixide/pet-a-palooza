<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));
        $this->load->model('UserModel');
		$this->load->helper('captcha');
		$this->load->library('form_validation');
        $this->load->library('session');
	}

	public function register(){
		$data['title'] = 'Shelter of Bacoor | Registration';

		$vals = array(	
			'img_path'      => './captcha/',
			'img_url'       => base_url().'captcha/',
			'img_width'     => '150',
			'img_height'    => 30,
			'expiration'    => 7200,
			'word_length'   => 5,
			'font_size'     => 16,
			'img_id'        => 'Imageid',
			'pool'          => '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
			'colors'        => array(
			'background' => array(255, 255, 255),
			'border' => array(255, 255, 255),
			'text' => array(0, 0, 0),
			'grid' => array(255, 40, 40)
			)
		);

		$cap = create_captcha($vals);
		$data2 = array(
		        'captcha_time'  => $cap['time'],
		        'ip_address'    => $this->input->ip_address(),
		        'word'          => $cap['word']
		);

		$query = $this->db->insert_string('captcha', $data2);
		$this->db->query($query);

		$data['image'] = $cap['image'];
		$data['captchainput'] = '<input type="text" name="captcha" value="" class="form-control input-md" placeholder="Enter Captcha" />';
		
		$this->load->view('include/toppage', $data);
		$this->load->view('include/defaultnavbar', $data);
        $this->load->view('user/register', $data);
	}

   public function add(){
		$this->load->helper('string');

		$user = array(
			'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'email' => $this->input->post('email'),
            'birth' => $this->input->post('birth'),
            'gender' => $this->input->post('gender'),
            'password' => sha1($this->input->post('password')),
            'repass' => sha1($this->input->post('repass')),
            'activation_code' => random_string('alnum', 10),
            'status' => 'inactive',
			'picpath' => 'wonder.png',
			'volunteer' => $this->input->post('volunteer'),
        );

		$expiration = time() - 7200; // Two hour limit
		$this->db->where('captcha_time < ', $expiration)
		        ->delete('captcha');

		// Then see if a captcha exists:
		$sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
		$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();

        $this->form_validation->set_rules('fname', 'First Name', 'required|min_length[3]');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbluser.email]');
        $this->form_validation->set_rules('birth', 'Birthday', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('repass', 'Password Confirmation', 'required|matches[password]');
        
        unset( $user['repass'] );

        if ($this->form_validation->run() == FALSE || $row->count == 0) {
            $this->register();
        } else {
            $this->UserModel->insertUser($user);
            $data['title'] = 'Customer Login';
            $data['message'] = 'Successfully registered!';

            $this->load->view('include/toppage', $data);
            $this->load->view('include/defaultnavbar', $data);
            $this->load->view('user/login', $data);
            
			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => '465',
				'smtp_user' => 'christianraesalcedo@gmail.com', // change it to yours
				'smtp_pass' => 'vhefdryjazjxbauy', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);
      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from($this->input->post('fname'), 'Shelter of Hope Bacoor');
      $this->email->to($this->input->post('email')); 
      $this->email->subject('Email Confirmation');
      $data['title']	= 'Shelter of Hope Bacoor';
	  $data['link'] = base_url(). 'registration/activate/'. $user['activation_code'];
	  $body = $this->load->view('email/registration', $data,TRUE);
      $this->email->message($body); 
      if($this->email->send())
     {
      
     }
     else
    {
     show_error($this->email->print_debugger());
    }
        }
	}

	public function activate(){
		$cond = array(
			'activation_code' => $this->uri->segment(3)
			);
		
		if(!($this->UserModel->checkAccount($cond)==null)){
			
       $this->load->view('include/defaultnavbar');
       $this->load->view('user/login');  
		}else{
			echo 'Invalid';
		}

	}

	public function signin(){
		$credentials = array(
			'email' => $this->input->post('email'),
			'password' => sha1($this->input->post('password'))
			);

		$user = $this->UserModel->signIn($credentials);

		if(!$user == null){

			if($user->status == "active"){
				$newdata = array(
				'id' => $user->id,
                'fname'  => $user->fname,
                'lname'  => $user->lname,
                'birth'  => $user->birth,
                'bio'  => $user->bio,
                'gender'  => $user->gender,
                'email'     => $user->email,
                'logged_in' => TRUE,
				'isUser' => TRUE,
				'volunteer' => $user->volunteer,
				);

				$this->session->set_userdata($newdata);
				redirect('user/index');
			}
			else{
				$data['title'] = 'Login';
				$data['message'] = 'Account not yet activated';

		    $this->load->view('include/toppage', $data);
		    $this->load->view('include/defaultnavbar', $data);
            $this->load->view('user/login',$data);
			}
		}
		else{
			$data['title'] = 'Login';
			$data['message'] = 'Invalid email or password';

		    $this->load->view('include/toppage', $data);
		    $this->load->view('include/defaultnavbar', $data);
            $this->load->view('user/login',$data);
		}
	}
}