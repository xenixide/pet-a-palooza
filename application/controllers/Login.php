<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));
        $this->load->model('UserModel');
        $this->load->library('form_validation');
	}

//pinaka index base_url
	public function login()
	{
		$data['title'] = 'Shelter of Bacoor';

		$this->load->view('include/toppage', $data);
		$this->load->view('include/defaultnavbar', $data);
		$this->load->view('user/login',$data);
	}

    public function resetpassword(){

		$header['title'] = 'Reset Password | Email Confirmation';
		$this->load->view('include/defaultnavbar',$header);
		$this->load->view('auth/resetpasswordemailform');
	}    

    public function sendemailreset(){
		$this->load->helper('string');
		$email = $this->input->post('email');
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() == FALSE)
		{
				$this->resetpassword();
		}else{
		$random_word = random_string('alnum',64);
		$checkexistingemail = $this->UserModel->checkexistingemailsent($email);

		if($checkexistingemail > 0){
			$this->UserModel->updatetokenfrompasswordreset($random_word, $email);

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
			$this->email->from('shelterofbacoortest@gmail.com','Shelter of Bacoor');
			$this->email->to($email); 
			$this->email->subject('Password Reset');
			$data['title']	= 'ITWSPEC6';
			$data['link'] = base_url(). 'login/passwordresetform/'. $random_word.'/'.random_string('alnum',25);
			$body = $this->load->view('email/paswordreset', $data,TRUE);
			$this->email->message($body); 
			if($this->email->send())
             {
              
             }
             else
            {
             show_error($this->email->print_debugger());
            }
		  redirect(base_url().'login/login');
		}else{
			$this->UserModel->inserttopasswordreset($email,$random_word);
			
					$config = Array(
						'protocol' => 'smtp',
						'smtp_host' => 'ssl://smtp.googlemail.com',
						'smtp_port' => "465",
						'smtp_user' => 'marcharrison2424@gmail.com',
						'smtp_pass' => '201410084',
						'mailtype'  => 'html', 
						'charset'   => 'iso-8859-1'
					);
					
					$this->load->library('email', $config);
					$this->email->set_newline("\r\n");
			
					$this->email->from('Sheltef of Bacoor');
					$this->email->to($email); 
					$this->email->subject('Password Reset');
					$data['title']	= 'Shelter of Bacoor';
					$data['link'] = base_url(). 'login/passwordresetform/'. $random_word.'/'.random_string('alnum',25);
					$body = $this->load->view('email/paswordreset', $data,TRUE);
					$this->email->message($body); 
					$result = $this->email->send();
				    redirect(base_url().'login/login');
		}
	  }
	}

	public function passwordresetform(){
		$data['token'] = $this->uri->segment(3,0);
		$header['title'] = 'Password Reset Form | Enter Your New Password';
		$this->load->view('include/defaultnavbar', $header);
		$this->load->view('auth/passwordresetform',$data);
	}

	public function passwordresetprocess(){
		$newpassword = $this->input->post('newpassword');
		$confirmpassword = $this->input->post('confirmpassword');
		$token = $this->input->post('token');
		$this->form_validation->set_rules('newpassword', 'New Password', 'required');
		$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required|matches[newpassword]');
		if ($this->form_validation->run() == FALSE)
		{
				$this->passwordresetform();
		}
		else
		{
			$info = $this->UserModel->checkfromtoken($token);
			$this->UserModel->changepassword($info->email, $newpassword);
			$this->UserModel->deleteresettoken($token);
			redirect(base_url()."login/login");
		}
	}
}