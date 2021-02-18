<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('AdminModel');
		$this->load->model('UserModel');
        $this->load->model('AnimalModel');
        $this->load->model('CalendarModel');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	public function login(){

        $this->load->view('admin/login');
    }
    
    public function notif()
    {
        if($_SESSION['isAdmin'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

        $this->AdminModel->notifSeen();
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['notifications'] = $this->AdminModel->getAdminNotifications();
        $this->load->view('include/adminnavbar',$data);
        $this->load->view('admin/notifications', $data);
    }

    public function signin(){
        $cust = array(
            'username' => $this->input->post('username'),
            'password' => sha1($this->input->post('password'))
            );

        $admin = $this->AdminModel->getAdmin($cust);

        if(!$admin == null){

            if($admin->status == "active"){
                $newdata = array(
                'id' => $admin->id,
                'fname'  => $admin->fname,
                'lname'  => $admin->lname,
                'username'     => $admin->username,
                'logged_in' => TRUE,
                'isAdmin' => TRUE
                );

                $this->session->set_userdata($newdata);
                redirect('admin/members');
            }
            else{
                $data['title'] = 'Login';
                $data['message'] = 'Account not yet activated';

            $this->load->view('include/toppage', $data);
            $this->load->view('admin/login',$data);
            }
        }
        else{
            $data['title'] = 'Login';
            $data['message'] = 'Invalid username or password';

            $this->load->view('include/toppage', $data);
            $this->load->view('admin/login',$data);
        }
    }

    
    public function index()
    {
        if($_SESSION['isAdmin'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $id = $this->session->id;
        $data['id'] = $this->AdminModel->getAdmin($id);	
        $this->load->view('include/adminnavbar',$data);
        $this->load->view('admin/members',$data);
    }


    public function animals()
    {
        if($_SESSION['isAdmin'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['animals'] = $this->AnimalModel->getAll();
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('animal/animals', $data);
    }

    public function Animalsee()
    {
        if($_SESSION['isAdmin'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }
    
        $id = $this->uri->segment(3);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['animals'] = $this->AnimalModel->getAnimal($id);
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('animal/animalview', $data);
    }

     //Add animals Form
    public function animaladd()
    {
        if($_SESSION['isAdmin'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('animal/animaladd');
    }

    //Insert Animanls
    public function insert()
    {
        if($_SESSION['isAdmin'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

        $animals = array(
            'petname' => $this->input->post('petname'),
            'petage' => $this->input->post('petage'),
            'description' => $this->input->post('description'),
            'daterescue' => $this->input->post('daterescue'),
            'locationrescue' => $this->input->post('locationrescue'),
            'health' => $this->input->post('health'),
            'pettrait' => $this->input->post('pettrait'),
            'petbreed' => $this->input->post('petbreed'), 
            'petcolor' => $this->input->post('petcolor'),
            'petage' => $this->input->post('petage'),
            'agemetric' => $this->input->post('agemetric'),
            'picpath' => '45.png',
        );

        $this->form_validation->set_rules('petname', 'petname', 'min_length[3]');
        $this->form_validation->set_rules('petage', 'petage', 'numeric');
        $this->form_validation->set_rules('description', 'description', 'min_length[10]');
        $this->form_validation->set_rules('daterescue', 'daterescue');
        $this->form_validation->set_rules('locationrescue', 'locationrescue');
        $this->form_validation->set_rules('health', 'health');
       

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('animal/animaladd');
        } else {

            $this->AnimalModel->insertAnimal($animals);
            redirect('admin/animals');
        }
    }

    public function Animaledit()
    {
        if($_SESSION['isAdmin'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }
    
        $id = $this->uri->segment(3);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['animals'] = $this->AnimalModel->getAnimal($id);
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('animal/animaledit', $data);
    }

    public function editpicture()
    {
        if($_SESSION['isAdmin'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }
    
        $id = $this->uri->segment(3);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['pic'] = $this->AnimalModel->getAnimal($id);//image
        $data['animals'] = $this->AnimalModel->getAnimal($id);
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('animal/editpicture', $data);
    }

    // ELDONS CODE
    public function petAdoptions()
    {
        if($_SESSION['isAdmin'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }   
        $pet_id = $this->uri->segment(3);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['adoptions'] = $this->AdminModel->getPetAdoptions($pet_id);
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('admin/petadoptions', $data);

    }

    public function viewAppForm()
    {
        if($_SESSION['isAdmin'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }  

        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $adoption_id = $this->uri->segment(3);
        $data['appform'] = $this->AdminModel->getSingleForm($adoption_id);
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('admin/viewappform', $data);
    }

    public function addanimal()
    {
        $json = array();

        $this->form_validation->set_rules('petname', 'Pet name', 'required');
        $this->form_validation->set_rules('daterescue', 'Date Rescue', 'required');
        $this->form_validation->set_rules('locationrescue', 'Rescue of Location', 'required');
        $this->form_validation->set_rules('health', 'Health', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $json = array(
                'petname' => form_error('petname', '<p class="text-danger err">', '</p>'),
                'daterescue' => form_error('daterescue', '<p class="text-danger err">', '</p>'),
                'locationrescue' => form_error('locationrescue', '<p class="text-danger err">', '</p>'),
                'health' => form_error('health', '<p class="text-danger err">', '</p>'),
                'description' => form_error('description', '<p class="text-danger err">', '</p>'),
            );

            echo json_encode($json);
        }
        else
        {
            $animals = array(
                'petname' => $_POST['petname'],
                'daterescue' => $_POST['pettrait'],
                'locationrescue' => $_POST['locationrescue'],
                'health' => $_POST['health'],
                'description' => $_POST['description'],
                'petage' => $_POST['petage'],
                'agemetric' => $_POST['agemetric'],
                'petbreed' => $_POST['petbreed'],
                'petcolor' => $_POST['petcolor'],
                'pettrait' => $_POST['pettrait'],
                'picpath' => '45.jpg',
            );
            $rescue_id = $_POST['rescue_id'];
            $this->AnimalModel->insertAnimal($animals);
            $this->AdminModel->deleteRescue($rescue_id);
            $run = array(
                'wp' => 1,
            );
            echo json_encode($run);
        }
    }
    // END OF ELDONS CODE

    public function do_upload(){
      if($_SESSION['isAdmin'] == 0){
      session_destroy();
      redirect(base_url());
    }
        if($this->input->post('userSubmit')){


            if(!empty($_FILES['picture']['name'])){
                    $config['upload_path'] = './assets/img/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|xlsx|pptx|txt|doc|docx';
                    $config['file_name'] = $_FILES['picture']['name'];
                //print_r($this->input->post());die();
                   
                    //Load upload library and initialize configuration

                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    
                    if($this->upload->do_upload('picture')){
                        $uploadData = $this->upload->data();
                        $picture = $uploadData['file_name'];
                    }else{
                        $picture = '';
                    }
                }else{
                    $picture = '';
                }
    
                        
                $animals = array(
                 
    
        
                    'picpath' => $picture,
              
                );

                $id =  $this->input->post('id');
               // print_r($_FILES);

            
               $this->AnimalModel->updateAnimals($id, $animals);
                
                //Storing insertion status message.
              
            }
            echo "<script>
            alert('Image Updated Successfully!');
          setTimeout(function () {
            window.location.href = 'animals';
                }, 2000);
            </script>";

        }


        public function addvideo(){
            if($this->input->post('userSubmit')){
                
                            if(!empty($_FILES['file']['name'])){
                                $config['upload_path'] = './assets/videos/';
                                $config['allowed_types'] = 'mp4';
                                $config['file_name'] = $_FILES['file']['name'];
                                
                                //Load upload library and initialize configuration
                                $this->load->library('upload',$config);
                                $this->upload->initialize($config);
                                
                                if($this->upload->do_upload('file')){
                                    $uploadData = $this->upload->data();
                                    $file = $uploadData['file_name'];
                                }else{
                                    $file = '';
                                }
                            }else{
                                $file = '';
                            }
              
                                  
                          $animals = array(
                           
              
                  
                              'video' => $file,
                              'petid' => $this->uri->segment(3),
                        
                          );

                       
                                         
                         $this->AnimalModel->insertvid($animals);
                          
                          //Storing insertion status message.
                        
                      }
                      echo "<script>
                      alert('Video Uploaded Successfully!');
                      </script>";
                      redirect('admin/Animals','refresh');
        }

 
     public function update() {
      if($_SESSION['isAdmin'] == 0){
      session_destroy();
      redirect(base_url());
    }

        $id =  $this->input->post('id');
        $animals = array(
            'petname' => $this->input->post('petname'),
            'petage' => $this->input->post('petage'),
            'description' => $this->input->post('description'),
            'daterescue' => $this->input->post('daterescue'),
            'locationrescue' => $this->input->post('locationrescue'),
            'health' => $this->input->post('health'),
            'pettrait' => $this->input->post('pettrait'),
            'petcolor' => $this->input->post('petcolor'),
            'petbreed' => $this->input->post('petbreed'),
        );

        $this->form_validation->set_rules('petname', 'petname', 'required|min_length[3]');
        $this->form_validation->set_rules('petage', 'petage', 'numeric');
        $this->form_validation->set_rules('description', 'description', 'min_length[10]');
        $this->form_validation->set_rules('daterescue', 'daterescue');
        $this->form_validation->set_rules('locationrescue', 'locationrescue');
        $this->form_validation->set_rules('health', 'health');

        //print_r($animals);
        //die();

        if ($this->form_validation->run() == FALSE) {

        $data['title'] = 'Admin || Shelter of Hope';
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['animals'] = $this->AnimalModel->getAnimal($id);
        $this->load->view('include/toppage', $data);
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('animal/animaledit', $data);
 
        } else {
        $data['title'] = 'Admin || Shelter of Hope';
        $data['animals'] = $this->AnimalModel->getAnimal($id);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $this->load->view('include/toppage', $data);
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('animal/animaledit', $data);
           
        $this->AnimalModel->updateAnimal($id,$animals);
        redirect('admin/animals',$data);
        }
    }

    public function Video() {
        $data['title'] = 'Admin || Shelter of Hope';
        $data['id'] = $this->uri->segment(3);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('animal/video', $data);
    }

	public function user(){
      if($_SESSION['isAdmin'] == 0){
      session_destroy();
      redirect(base_url());
    }
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
		$data['users'] = $this->UserModel->getAll();
		$this->load->view('include/adminnavbar', $data);
        $this->load->view('animal/user', $data);
	}

	public function See() {
      if($_SESSION['isAdmin'] == 0){
      session_destroy();
      redirect(base_url());
    }

        $data['title'] = 'Admin || Shelter of Hope';
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $id = $this->uri->segment(3);
        $data['user'] = $this->UserModel->getUsers($id);
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('animal/view', $data);
    }

    public function deactivate(){
        $id = $this->uri->segment(3);
        $status = array(

            'status' => 'inactive',
        );
        $this->UserModel->deactivateUser($id,$status);
        redirect('admin/user');
    }

    public function activate(){
        $id = $this->uri->segment(3);
        $status = array(

            'status' => 'active',
        );
        $this->UserModel->deactivateUser($id,$status);
        redirect('admin/user');
    }

    public function addAnnouncement(){
      if($_SESSION['isAdmin'] == 0){
      session_destroy();
      redirect(base_url());
    }
        //print_r($_POST); //checking for the inputs
        $announcement = array(
            'announcementheader' => $this->input->post('announcementheader'),
            'announcementcaption' => $this->input->post('announcementcaption'),
        );

        $this->form_validation->set_rules('announcementheader', 'announcementheader', 'min_length[10]');
        $this->form_validation->set_rules('announcementcaption', 'announcementcaption', 'min_length[10]');

        if ($this->form_validation->run() == FALSE) {
            $data['notifs'] = $this->AdminModel->countAdminNotifs();
            $this->load->view('include/adminnavbar', $data);
            $this->load->view('animal/announcement'); //add form for announcement
        } else {
            $data['notifs'] = $this->AdminModel->countAdminNotifs();
            $this->AnimalModel->insertAnnouncement($announcement);
            $this->load->view('include/adminnavbar', $data);
            redirect('admin/announcements');
        }
    }

    public function announcements(){
      if($_SESSION['isAdmin'] == 0){
      session_destroy();
      redirect(base_url());
    }

        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['announcements'] = $this->AnimalModel->getAllAnnouncement();
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('animal/announcements', $data);
    }

    public function deleteAnnouncement() {
        $announcementid = $this->uri->segment(3);
        $this->AdminModel->deleteAnnouncement($announcementid);
        redirect('admin/Announcements');
    }

        public function deleteArticle() {
        $article_id = $this->uri->segment(3);
        $this->AdminModel->deleteArticle($article_id);
        redirect('admin/Article');
    }

    public function Article(){
      if($_SESSION['isAdmin'] == 0){
      session_destroy();
      redirect(base_url());
    }

        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['articles'] = $this->AdminModel->getAllArticle();
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('admin/article', $data);
    }
 
    public function viewAnnouncement() {
      if($_SESSION['isAdmin'] == 0){
      session_destroy();
      redirect(base_url());
    }

        $data['title'] = 'Admin || Shelter of Hope';
        $id = $this->uri->segment(3);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['announcements'] = $this->AnimalModel->getAnnouncement($id);
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('animal/announcementview', $data);
    }

    public function events()
    {
        if($_SESSION['isAdmin'] == 0){
            session_destroy();
            redirect(base_url());
        }

        $date = $this->uri->segment(3);
        $data['events'] = $this->AdminModel->getDayEvents($date);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('admin/dayevents', $data);
    }

    // ADMIN EVENTS
    public function adminEvents()
    {
        if($_SESSION['isAdmin'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['events'] = $this->AdminModel->getAdminEvents();
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('admin/event/index', $data);
    }

    public function viewAdminEvent()
    {
        if($_SESSION['isAdmin'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

        $event_id = $this->uri->segment(3);
        $data['event'] = $this->AdminModel->viewAdminEvent($event_id);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['respondents'] = $this->AdminModel->getEventRespondents($event_id);
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('admin/event/view', $data);
    }

    public function createAdminEvent()
    {
        if($_SESSION['isAdmin'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

        $event = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'event_date' => $this->input->post('event_date'),
            'respondents' => $this->input->post('respondents'),
        );

        $this->form_validation->set_rules('title', 'Event Title', 'required|max_length[120]');
        $this->form_validation->set_rules('description', 'Event Description', 'required|max_length[400]');
        $this->form_validation->set_rules('event_date', 'Event Date', 'required');
        $this->form_validation->set_rules('respondents', 'Respondents', 'required|numeric');

        if ($this->form_validation->run() == FALSE)
        {
            $data['notifs'] = $this->AdminModel->countAdminNotifs();
            $data['events'] = $this->AdminModel->getAdminEvents();
            $this->load->view('include/adminnavbar', $data);
            $this->load->view('admin/event/index', $data);
        }
        else
        {
            $this->AdminModel->createAdminEvent($event);
            redirect('admin/adminEvents');
        }
    }

    public function deleteAdminEvent()
    {
        if($_SESSION['isAdmin'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

        $event_id = $this->uri->segment(3);
        $this->AdminModel->deleteAdminEvent($event_id);
        redirect('admin/adminEvents');
    }

    public function editAdminEvent()
    {
        if($_SESSION['isAdmin'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

        $event_id = $this->uri->segment(3);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['event'] = $this->AdminModel->viewAdminEvent($event_id);
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('admin/event/edit', $data);
    }

    public function updateAdminEvent()
    {
        if($_SESSION['isAdmin'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

        $event = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'event_date' => $this->input->post('event_date'),
            'respondents' => $this->input->post('respondents'),
        );

        $this->form_validation->set_rules('title', 'Event Title', 'required|max_length[120]');
        $this->form_validation->set_rules('description', 'Event Description', 'required|max_length[400]');
        $this->form_validation->set_rules('event_date', 'Event Date', 'required');
        $this->form_validation->set_rules('respondents', 'Respondents', 'required|numeric');

        if ($this->form_validation->run() == FALSE)
        {
            $event_id = $this->uri->segment(3);
            $data['notifs'] = $this->AdminModel->countAdminNotifs();
            $data['event'] = $this->AdminModel->viewAdminEvent($event_id);
            $this->load->view('include/adminnavbar', $data);
            $this->load->view('admin/event/edit', $data);
        }
        else
        {
            $event_id = $this->uri->segment(3);
            $this->AdminModel->updateAdminEvent($event_id, $event);
            redirect('admin/adminEvents');
        }
    }
    // END OF ADMIN EVENTS

    public function animalReport()
    {
        if($_SESSION['isAdmin'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

        $data['adopted'] = $this->AnimalModel->getAllAdopted();
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['unadopted'] = $this->AnimalModel->getAllUnadopted();
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('animal/animalReport', $data);
    }

    public function disableDay()
    {
        if($_SESSION['isAdmin'] == 0){
            session_destroy();
            redirect(base_url());
        }
        $day = array(
            'disable_day' => $this->input->post('day')
        );
        $this->AdminModel->disableDay($day);
        redirect('admin/Reservation');
    }

    public function enableDay()
    {
        if($_SESSION['isAdmin'] == 0){
            session_destroy();
            redirect(base_url());
        }
        $date = $this->input->post('day');

        $day = array(
            'disable_day' => NULL
        );
        $this->AdminModel->enableDay($day, $date);
        redirect('admin/Reservation');
    }

    public function Members(){
      if($_SESSION['isAdmin'] == 0){
      session_destroy();
      redirect('admin/login','Logged out');
    }

        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['members'] = $this->AdminModel->getAllMember();
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('admin/members', $data);
    }

    public function deleteAdmin() {
        $id = $this->uri->segment(3);
        $this->AdminModel->deleteAdmin($id);
        redirect('admin/Members');
    }

    public function Reservation(){
        $data['days'] = $this->AdminModel->getDisableDays();
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['events'] = $this->CalendarModel->getevents();
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('include/calendar',$data);
        $this->load->view('admin/reservation',$data);
    }
	
	
    public function Rescue()
    {
        if($_SESSION['isAdmin'] == 0)
        {
            session_destroy();
            redirect('admin/login','Logged out');
        }

        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['rescues'] = $this->AdminModel->getAllRescue();
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('admin/rescue',$data);
       
    }
	
    public function Rescuesee()
    {
        $id = $_GET['id'];
        $data['rescue'] = $this->AdminModel->getRescue($id);
        echo json_encode($data);
    }
	
	public function deleterescue() {
        $id = $this->uri->segment(3);
        $this->AdminModel->deleteRescue($id);
        redirect('admin/Rescue');
    }

	
    public function Membersee() {
      if($_SESSION['isAdmin'] == 0){
      session_destroy();
      redirect(base_url());
    }

    
        $id = $this->uri->segment(3);
        $data['members'] = $this->AdminModel->getMember($id);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('admin/memberview', $data);
    }

    public function addMember(){
      if($_SESSION['isAdmin'] == 0){
      session_destroy();
      redirect(base_url());
    }

        //print_r($_POST); //checking for the inputs
        $member = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'username' => $this->input->post('username'),
            'password' => sha1($this->input->post('password')),


        );

        $this->form_validation->set_rules('fname', 'fname', 'required|min_length[3]');
        $this->form_validation->set_rules('lname', 'lname', 'required|min_length[2]');
        $this->form_validation->set_rules('username', 'username', 'required|is_unique[tbladmin.username]');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['notifs'] = $this->AdminModel->countAdminNotifs();
            $this->load->view('include/adminnavbar', $data);
            $this->load->view('admin/member'); //add form for member
        } else {

            $this->AdminModel->insertMember($member);
            redirect('admin/members');
        }
    }

    public function editMember() {
      if($_SESSION['isAdmin'] == 0){
      session_destroy();
      redirect(base_url());
    }

        $id = $this->uri->segment(3);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['members'] = $this->AdminModel->getMember($id);
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('admin/memberedit', $data);
    }

    public function updateMember() {
      if($_SESSION['isAdmin'] == 0){
      session_destroy();
      redirect(base_url());
    }


        $id =  $this->input->post('id');
        $members = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'username' => $this->input->post('username'),
            'password' => sha1($this->input->post('password')),
        );

        $this->form_validation->set_rules('fname', 'fname', 'required|min_length[3]');
        $this->form_validation->set_rules('lname', 'lname', 'required|min_length[2]');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        //print_r($animals);
        //die();

        if ($this->form_validation->run() == FALSE) {

        $data['title'] = 'Admin || Shelter of Hope';
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['members'] = $this->AdminModel->getMember($id);
        $this->load->view('include/toppage');
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('admin/memberedit', $data);
 
        } else {
        $data['title'] = 'Admin || Shelter of Hope';
        $data['members'] = $this->AdminModel->getMember($id);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $this->load->view('include/toppage');
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('admin/memberedit', $data);
           
            $this->AdminModel->updateMember($id,$members);
            redirect('admin/members',$data);
        }
    }

    public function Articlesee() {
      if($_SESSION['isAdmin'] == 0){
      session_destroy();
      redirect(base_url());
    }

    
        $article_id = $this->uri->segment(3);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['article'] = $this->AdminModel->getArticle($article_id);
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('admin/articleview', $data);
    }

    public function addArticle(){
      if($_SESSION['isAdmin'] == 0){
      session_destroy();
      redirect(base_url());
    }

        $this->form_validation->set_rules('article_title', 'article_title', 'required|min_length[5]');
        $this->form_validation->set_rules('article_desc', 'article_desc', 'required|min_length[8]');
        $this->form_validation->set_rules('article_date', 'article_date');

        if ($this->form_validation->run() == FALSE) 
        {
            $data['notifs'] = $this->AdminModel->countAdminNotifs();
            $this->load->view('include/adminnavbar', $data);
            $this->load->view('admin/articles'); 
        } 
        else 
        {
            $config['upload_path']   = './assets/article_img/'; 
            $config['allowed_types'] = 'gif|jpg|png'; 
            $config['max_size']      = 3000;
            $config['file_name'] = time();

            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
            if(!$this->upload->do_upload('article_img'))
            {
                $error = array('error' => $this->upload->display_errors()); 
                $data['notifs'] = $this->AdminModel->countAdminNotifs();
                $this->session->set_flashdata('error',$error['error']);
                $this->load->view('include/adminnavbar', $data);
                redirect('admin/addArticle','refresh');
                return FALSE;
            }
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $file_name = $upload_data['file_name'];

            $article = array(
                'article_title' => $this->input->post('article_title'),
                'article_desc' => $this->input->post('article_desc'),
                'article_date' => $this->input->post('article_date'),
                'article_img' => $file_name,
            );

            $this->AdminModel->insertArticle($article);
            redirect('admin/article');
        }
    }

    public function editArticle() {
    if($_SESSION['isAdmin'] == 0){
        session_destroy();
        redirect(base_url());
    }

        $article_id = $this->uri->segment(3);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['articles'] = $this->AdminModel->getArticle($article_id);
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('admin/articleedit', $data);
    }

    public function updateArticle()
    {
        if($_SESSION['isAdmin'] == 0){
            session_destroy();
            redirect(base_url());
        }

        $article_id = $this->uri->segment(3);
        $this->form_validation->set_rules('article_title', 'article_title', 'required|min_length[5]');
        $this->form_validation->set_rules('article_desc', 'article_desc', 'required|min_length[8]');
        $this->form_validation->set_rules('article_date', 'article_date');

        if ($this->form_validation->run() == FALSE)
        {
            $data['articles'] = $this->AdminModel->getArticle($article_id);
            $data['notifs'] = $this->AdminModel->countAdminNotifs();
            $this->load->view('include/toppage');
            $this->load->view('include/adminnavbar', $data);
        }
        else
        {
            $config['upload_path']   = './assets/article_img/'; 
            $config['allowed_types'] = 'jpg|png'; 
            $config['max_size']      = 3000;
            $config['file_name'] = time();
           
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

            if(!$this->upload->do_upload('article_img'))
            {
                $error = array('error' => $this->upload->display_errors()); 
                $data['notifs'] = $this->AdminModel->countAdminNotifs();
                $this->session->set_flashdata('error',$error['error']);
                $this->load->view('include/adminnavbar', $data);
                redirect('admin/editArticle/'.$article_id,'refresh');
                return FALSE;
            }

            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $file_name = $upload_data['file_name'];

            $articles = array(
                'article_title' => $this->input->post('article_title'),
                'article_desc' => $this->input->post('article_desc'),
                'article_date' => $this->input->post('article_date'),
                'article_img' => $file_name,
            );

            $data['articles'] = $this->AdminModel->getArticle($article_id);
            $this->AdminModel->updateArticle($article_id,$articles);
            redirect('admin/Article',$data);
        }
    }

    public function manageadoptions()
    {
        $data['accepted'] = $this->AnimalModel->getAcceptedAdoptions();
        $data['pending'] = $this->AnimalModel->getPendingAdoptions();
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $this->load->view('include/toppage');
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('admin/adoptions',$data);
    }

    public function canceladopt()
    {
        $adoption_id = $this->uri->segment(3);
        $this->AnimalModel->canceladoption($adoption_id);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function managereservations()
    {
        $data['appoints'] = $this->CalendarModel->getAppoints();
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $this->load->view('include/toppage');
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('admin/managereservations',$data);
    }

    public function cancelappoint()
    {
        $lname = urldecode($this->uri->segment(3));
        $user_id = $this->uri->segment(8);
        $time = $this->uri->segment(5);
        $purpose = urldecode($this->uri->segment(6));
        $fname = urldecode($this->uri->segment(9));
        $date = $this->uri->segment(4);
        $title = urldecode($this->uri->segment(6));
        $reserve_id = $this->uri->segment(10);

        $notif = array(
            'message' => 'Dear '.$lname.' '.$fname.', We regret to inform you that your reservation in '.$date.' on '.$time.' has been canceled',
            'user_id' => $user_id,
        );

        $this->CalendarModel->addnotif($notif);
        $this->CalendarModel->cancelappoints($user_id, $reserve_id);
        redirect('admin/managereservations');
    }

    public function addappoint(){  
        $lname = urldecode($this->uri->segment(3));
        $user_id = $this->uri->segment(8);
        $time = $this->uri->segment(5);
        $purpose = urldecode($this->uri->segment(6));
        $fname = urldecode($this->uri->segment(9));
        $date = $this->uri->segment(4);
        $title = urldecode($this->uri->segment(6));
        $id = $this->uri->segment(7);
        $start_time = date('g:ia', strtotime($this->uri->segment(10)));
        $end_time = date('g:ia', strtotime($this->uri->segment(11)));
        $reserve_id = $this->uri->segment(12);

        $name = $fname .' '.$lname;

        $event = array(
            'reserve_id' => $reserve_id,
            'name' => $name,
            'start' => $date,
            'title' => $title,
            'time' => $start_time,
            'end_time' => $end_time,
        );

        $status = array(
            'status' => 'Approved',
        );

        $notif = array(
            'message' => 'Dear '.$lname.' '.$fname.', your reservation in '.$date.' on '.$time.' has been approved for '.$purpose,
            'user_id' => $user_id,
        );

        $this->CalendarModel->addnotif($notif);
        $this->CalendarModel->updateAppoints($id,$status);
        $this->CalendarModel->addevent($event);
        redirect('admin/managereservations');
    }

    public function animalview(){
        $petid = $this->uri->segment(3);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['animals'] = $this->AnimalModel->getPet($petid);
        $this->load->view('include/adminnavbar', $data);
        $this->load->view('admin/animal', $data);
    }

    public function adopted()
    {
        $adoption_id = $this->uri->segment(3);
        $name = urldecode($this->uri->segment(4));
        $pet_name = urldecode($this->uri->segment(5));
        $user_id = $this->uri->segment(6);
        $pet_id = $this->uri->segment(7);
        $time = date('F d, Y');
        
        $status = array(
            'status' => 'Adoption Accepted',
        );
        
        $notif = array(
            'message' => 'Hi '.$name.'!, you are chosen as the owner of '.$pet_name.'. Reserve now the day of your visit. Thank you!',
            'user_id' => $user_id,
            'type' => 1,
        );

        $petStatus = array(
            'status' => 'Adopted',
            'date_adopted' => $time,
            'adopter_by' => $name,
        );
        
        $this->AnimalModel->changePetStatus($pet_id, $petStatus);
        $this->AnimalModel->adoptedBy($pet_id, $user_id);
        $this->AnimalModel->notGranted($pet_id, $user_id);
        $this->CalendarModel->addnotif($notif);
        $this->AnimalModel->adopted($adoption_id, $status);
        // redirect('admin/manageadoptions');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function Donation()
    {
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['donations'] = $this->AdminModel->getDonations();
        $this->load->view('include/toppage');
        $this->load->view("include/adminnavbar", $data);
        $this->load->view("admin/Donation/Donation", $data);
    }
	
    public function viewdonation()
    {
	    $donation_id = $this->uri->segment(3);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['donation'] = $this->AdminModel->getDonation($donation_id);
        $this->load->view("include/adminnavbar", $data);
        $this->load->view('admin/Donation/edit', $data);
    }

    public function delete($id){
        $result = $this->AdminModel->delete($id);
        if($result){
            $this->session->set_flashdata('success_msg', 'Record deleted successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Fail to delete record');
        }
        redirect(base_url('admin/Donation'));
    }
    public function logout()
    {
        session_destroy();
        redirect('admin/login', 'Logged out');
    }

    public function viewAdopted()
    {
        $donation_id = $this->uri->segment(3);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['animals'] = $this->AdminModel->getAdoptedAnimals();
        $this->load->view("include/adminnavbar", $data);
        $this->load->view('admin/reports/viewadopted', $data);
    }

    public function viewAdoption()
    {
        $donation_id = $this->uri->segment(3);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['animals'] = $this->AdminModel->getForAdoptionAnimals();
        $this->load->view("include/adminnavbar", $data);
        $this->load->view('admin/reports/viewadoption', $data);
    }

    public function viewVolunteers()
    {
        $donation_id = $this->uri->segment(3);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['volunteers'] = $this->AdminModel->getVolunteers();
        $this->load->view("include/adminnavbar", $data);
        $this->load->view('admin/reports/viewvolunteer', $data);
    }

    public function viewDonors()
    {
        $donation_id = $this->uri->segment(3);
        $data['notifs'] = $this->AdminModel->countAdminNotifs();
        $data['donations'] = $this->AdminModel->getDonations();
        $this->load->view("include/adminnavbar", $data);
        $this->load->view('admin/reports/viewdonor', $data);
    }

    public function pdfAdopted()
    {
        $date = date('m-d-y');
        $this->load->library('pdfgenerator');
        $data['animals'] = $this->AdminModel->getAdoptedAnimals();
        $html = $this->load->view('admin/reports/pdfadopted', $data, TRUE);
        $this->pdfgenerator->generate($html, $filename="SOB-$date-ADOPTED", $stream=TRUE, $paper = 'A4', $orientation = "portrait");
    }

    public function pdfAdoption()
    {
        $date = date('m-d-y');
        $this->load->library('pdfgenerator');
        $data['animals'] = $this->AdminModel->getForAdoptionAnimals();
        $html = $this->load->view('admin/reports/pdfadoption', $data, TRUE);
        $this->pdfgenerator->generate($html, $filename="SOB-$date-ADOPTION", $stream=TRUE, $paper = 'A4', $orientation = "portrait");
    }

    public function pdfVolunteer()
    {
        $date = date('m-d-y');
        $this->load->library('pdfgenerator');
        $data['volunteers'] = $this->AdminModel->getVolunteers();
        $html = $this->load->view('admin/reports/pdfvolunteer', $data, TRUE);
        $this->pdfgenerator->generate($html, $filename="SOB-$date-VOLUNTEER", $stream=TRUE, $paper = 'A4', $orientation = "portrait");
    }

    public function pdfDonor()
    {
        $date = date('m-d-y');
        $this->load->library('pdfgenerator');
        $data['donations'] = $this->AdminModel->getDonations();
        $html = $this->load->view('admin/reports/pdfdonor', $data, TRUE);
        $this->pdfgenerator->generate($html, $filename="SOB-$date-DONORS", $stream=TRUE, $paper = 'A4', $orientation = "portrait");
    }

    public function pdfAppForm()
    {
        $this->load->library('pdfgenerator');

        $date = date('m-d-y');
        $user_id = $this->uri->segment(3);
        $pet_id = $this->uri->segment(4);
        $data['appform'] = $this->AdminModel->getSingleForm($user_id);
        $data['animal'] = $this->AnimalModel->getAnimal($pet_id);
        $html = $this->load->view('admin/reports/viewappform', $data, TRUE);
        // $this->load->view('admin/reports/viewappform', $data);
        $this->pdfgenerator->generate($html, $filename="SOB-$date-APPFORM", $stream=TRUE, $paper = 'sra3', $orientation = "portrait");

    }
}