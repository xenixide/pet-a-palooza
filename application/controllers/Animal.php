<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('ItemModel');
        

        //check session
       // if(!$this->session->logged_in || !$this->session->isAdmin){
            //redirect('admin/login', $data);
       // }
   }

    public function index() {

        $page = $this->uri->segment(3);

        $this->load->library('pagination');

        $config['base_url'] = base_url().'/user/Carousel';
        $config['total_rows'] = $this->ItemModel->countItems();
        $config['per_page'] = 5;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        
        $data['links'] = $this->pagination->create_links();

        $data['items'] = $this->ItemModel->getItems($page, $config['per_page']);

        $this->load->view('include/toppage', $data);
        $this->load->view('include/defaultnavbar', $data);
        $this->load->view('user/carousel', $data);
        
    }

    //Add Item
    public function add() {
        $data['title'] = 'Inventory System';

        $this->load->view('include/toppage', $data);
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('item/add');
        $this->load->view('include/bottompage');
    }

    //Insert Data
    public function insert() {
//        print_r($_POST); //checking for the inputs
        $item = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price'),
            'qty' => $this->input->post('qty'),
            'picpath' => 'item.jpg', //for static data (no input value)
        );

        $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('qty', 'Quantity', 'required|numeric');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {

            $this->ItemModel->insertItem($item);
            redirect('item/index');
        }
    }

    //delete based on thier id
    public function delete() {
        $id = $this->uri->segment(3);

        $this->ItemModel->deleteItem($id);
        redirect('item/index');
    }

    //load edit page
    public function edit() {
        $data['title'] = 'Inventory System';
        $id = $this->uri->segment(3);
        $data['item'] = $this->ItemModel->getItem($id);
        $this->load->view('include/toppage', $data);
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('item/edit', $data);
        $this->load->view('include/bottompage');
    }

    public function update() {
        $id =  $this->input->post('id');
        $item = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price'),
            'qty' => $this->input->post('qty'),
            'picpath' => 'item.jpg',
        );

        $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        $this->form_validation->set_rules('qty', 'Quantity', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
             $data['title'] = 'Item Management';
        
        
        $data['item'] = $this->ItemModel->getItem($id);
        $this->load->view('include/toppage', $data);
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('item/edit', $data);
        $this->load->view('include/bottompage');
        } else {

            $this->ItemModel->updateItem($id,$item);
            redirect('item/index');
        }
    }
    public function do_upload()
        {
                //print_r($this->input->post());die();
        $id = $this->input->post('id');
           $data['item'] = $this->ItemModel->getItem($id);
           
                $config['upload_path']          = './images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1024;
                $config['max_width']            = 1366;
                $config['max_height']           = 768;
                $config['file_name']            = $data['item']->id;
                $config['overwrite']            = TRUE;
                
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('userfile'))
                {
                        $data['error'] = $this->upload->display_errors();
                        $data['title'] = 'Item Management';
   
                        $this->load->view('include/toppage', $data);
                        $this->load->view('include/adminnavbar', $data);
                        $this->load->view('item/edit', $data);
                        $this->load->view('include/bottompage');
                }
                else
                {
                        $data = $this->upload->data();
                        $this->ItemModel->updateItem($id,array('picpath' => $data['file_name']));
                        redirect('item/index');
                }
        }

    public function View() {
        $data['title'] = 'Inventory System';
        $id = $this->uri->segment(3);
        $data['item'] = $this->ItemModel->getItem($id);
        $this->load->view('include/toppage', $data);
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('item/edit', $data);
        $this->load->view('include/bottompage');
    }
}
