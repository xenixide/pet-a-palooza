<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Def extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));
	    $this->load->library('form_validation');
        $this->load->model('UserModel');
        $this->load->model('AnimalModel');
        $this->load->model('AdminModel');
        $this->load->library('pagination');
	}


   public function Home(){
        $data['title'] = 'Shelter of Bacoor';

        $this->load->view('include/toppage', $data);
        $this->load->view('include/defaultnavbar', $data);
        $this->load->view('user/Home',$data);
        $this->load->view('user/About',$data);
   }


    public function results()
    {
        $breed = $_GET['petbreed'];
        $color = $_GET['petcolor'];

        if($breed == 'any' && $color == 'any')
        {
            $data['anim'] = $this->AnimalModel->allanimal();
            echo json_encode($data);
        }
        else
        {
            $data['anim'] = $this->AnimalModel->getMatchmaking($breed, $color);
            echo json_encode($data);
        }
    }

   public function pet(){
		$page = $this->uri->segment(3);

		$config = array();
        $config['base_url'] = base_url().'def/pet';
        $config['total_rows'] = $this->AnimalModel->countItems();
        $config['per_page'] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['items'] = $this->AnimalModel->getItems($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();

        $this->load->view("include/defaultnavbar");
        $this->load->view("user/defCarousel", $data);
    }

   public function AnimalView()
   {
        $petid = $this->uri->segment(3);
        $data['animals'] = $this->AnimalModel->getPet($petid);
        $this->load->view('include/defaultnavbar');
        $this->load->view('user/Animal/DefAnimal', $data);
    }

   public function Article() {
        $config['base_url'] = base_url().'user/Article';
        $config['total_rows'] = $this->UserModel->countArticles();
        $config['per_page'] = 3;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['articles'] = $this->UserModel->getArticles($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();

        $this->load->view('include/toppage');
        $this->load->view('include/defaultnavbar');
        $this->load->view("user/Article", $data);
    }

    public function Anouncement() {

       $this->load->view('include/toppage');
       $this->load->view("include/defaultnavbar");
       $this->load->view("user/Anouncement");
    }
    
    public function Forum() {
        $this->load->view('include/toppage');
        $this->load->view("include/defaultnavbar");
        $this->load->view("user/Forum");
    }
}