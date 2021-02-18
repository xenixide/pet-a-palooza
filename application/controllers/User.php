<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
        $this->load->model('UserModel');
        $this->load->model('AnimalModel');
        $this->load->model('AdminModel');
        $this->load->model('CalendarModel');
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->library('upload');
	}

    public function index()
    {
        if($_SESSION['isUser'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }
        
        $id = $this->session->id;
        $user_id = $this->session->userdata('id');
        $data['appform'] = $this->UserModel->getUserForm($user_id);

        $petid = $this->uri->segment(3);
        $data['animals'] = $this->AnimalModel->getPet($petid);
        $count_user_id = $this->session->userdata('id');
        $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
        $data['user'] = $this->UserModel->getUser($id);
        $data['announcement']= $this->UserModel->getAllAnnounce();
        $this->load->view('include/usernavbar',$data);
        if($data['appform'] == NULL)
        {
            $data['appform'] = $this->UserModel->getUserForm($user_id);
            $this->load->view('user/Loggedin/User/Profile',$data);
        }
        else
        {
            $data['appform'] = $this->UserModel->getUserForm($user_id);
            $this->load->view('user/Loggedin/User/hasProfile',$data);
        }
    }
  
    public function volunteer()
    {
        if($_SESSION['isUser'] == 0){
            session_destroy();
            redirect(base_url());
        }

        $count_user_id = $this->session->userdata('id');
        $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
        $data['events'] = $this->AdminModel->getAdminEvents();
        $data['rescues'] = $this->UserModel->getAllRescue();
        $this->load->view('include/usernavbar', $data);
        $this->load->view('user/volunteer',$data);
    }

    public function goEvent()
    {
        if($_SESSION['isUser'] == 0){
            session_destroy();
            redirect(base_url());
        }

        $event_id = $this->uri->segment(3);
        $event_total_respondents = $this->uri->segment(4);
        $name = $this->session->userdata('fname').' '.$this->session->userdata('lname');
        
        $incrementRespondents = array(
            'total_respondents' => $event_total_respondents + 1,
        );

        $respondent = array(
            'user_id' => $this->session->userdata('id'),
            'event_id' => $event_id,
            'name' => $name,
        );

        $notif = array(
            'message' => $name.' responded going to an event',
            'type' => 0,
        );

        $this->AdminModel->notifyAdmin($notif);
        $this->UserModel->goEvent($respondent);
        $this->UserModel->incementRespond($event_id, $incrementRespondents);
        redirect('user/volunteer');
    }

    public function cancelEvent()
    {
        if($_SESSION['isUser'] == 0){
            session_destroy();
            redirect(base_url());
        }

        $event_id = $this->uri->segment(3);
        $event_total_respondents = $this->uri->segment(4);
        $name = $this->session->userdata('fname').' '.$this->session->userdata('lname');

        $decrementRespondents = array(
            'total_respondents' => $event_total_respondents - 1,
        );

        $cancelRespond = array(
            'user_id' => $this->session->userdata('id'),
            'event_id' => $event_id,
        );

        $notif = array(
            'message' => $name.' cancelled a respond on one event',
            'type' => 0,
        );

        $this->AdminModel->notifyAdmin($notif);
        $this->UserModel->decrementRespond($event_id, $decrementRespondents);
        $this->UserModel->cancelRespond($cancelRespond);
        redirect('user/volunteer');
    }
    
    public function volunteersee()
    {
        if($_SESSION['isUser'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

        $count_user_id = $this->session->userdata('id');
        $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
	    $id = $this->uri->segment(3);
        $data['rescues'] = $this->UserModel->getRescue($id);
        $this->load->view('include/usernavbar', $data);
        $this->load->view('user/rescueview', $data);
    }

    //ELDON CODE
    public function volunteeraccept()
    {
        $id = $this->uri->segment(3);
        $status = array(
            'status' => 'Ongoing',
            'user_id' => $this->session->userdata('id'),   
        );
        $this->UserModel->volunteerAccept($id,$status);
        redirect('user/volunteer');
    }

    public function rescuesuccess()
    {
        $id = $this->uri->segment(3);
        $status = array(
            'status' => 'Success',
            'rescuer' => $this->session->userdata('fname'),
        );
        $this->UserModel->rescueSuccess($id,$status);
        redirect('user/volunteer');
    }

    public function rescuefailed()
    {
        $id = $this->uri->segment(3);
        $status = array(
            'status' => 'Failed',
        );
        $this->UserModel->rescueFailed($id,$status);
        redirect('user/volunteer');
    }

    public function bevolunteer()
    {
        $id = $this->uri->segment(3);
        $status = array(
            'volunteer' => 'yes',
        );
        $this->UserModel->beVolunteer($id,$status);
        redirect('user/volunteer');
    }

    public function dlmoto($file)
    {
        $this->load->helper('download');
        $name = $file;
        $dir = base_url().'assets/'.$file;
        $data = file_get_contents($dir); 
        force_download($name, $data); 
        redirect('user/pet','refresh');
    }

    public function myreservations()
    {
        $data['reservations'] = $this->UserModel->myReservations();
        $count_user_id = $this->session->userdata('id');
        $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
        $this->load->view('include/toppage');
        $this->load->view('include/usernavbar', $data);
        $this->load->view('user/myreservation', $data);
    }

    public function cancelAppointment()
    {
        $id = $this->uri->segment(3);
        $appform_id = $this->uri->segment(4);
        $this->UserModel->cancelBook($appform_id);
        $this->UserModel->cancelAppointment($id);
        redirect('user/myreservations', 'refresh');
    }
    // END OF ELDON CODE

   public function pet(){

    if($_SESSION['isUser']==0){
      session_destroy();
      redirect(base_url());
    }
        $config['base_url'] = base_url().'user/pet';
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
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['items'] = $this->AnimalModel->getItems($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        $count_user_id = $this->session->userdata('id');
        $data['notifs'] = $this->UserModel->countNotifs($count_user_id);

        $data['appform']= $this->UserModel->getUserForm();

        $this->load->view("include/usernavbar", $data);
        $this->load->view("user/Loggedin/UserCarousel", $data);
    }


    public function results()
    {
        $breed = $_GET['petbreed'];
        $color = $_GET['petcolor'];

        if($breed == 'any' && $color == 'any')
        {
            $data['ids'] = $this->UserModel->getPetIds();
            $data['anim'] = $this->AnimalModel->allanimal();
            echo json_encode($data);
        }
        else
        {
            $data['ids'] = $this->UserModel->getPetIds();
            $data['anim'] = $this->AnimalModel->getMatchmaking($breed, $color);
            echo json_encode($data);
        }
    }

    public function AnimalView()
    {
        $id = $_GET['id'];
        $data['animals'] = $this->AnimalModel->getPet($id);
        echo json_encode($data);
    }

    public function articleView()
    {
        $article_id = $this->uri->segment(3);
        $data['article'] = $this->UserModel->getSingleArticle($article_id);
        $count_user_id = $this->session->userdata('id');
        $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
        $this->load->view('include/usernavbar', $data);
        $this->load->view('user/singleArticle', $data);
    }

    public function articleLike()
    {
        $article_id = $this->uri->segment(3);
        $article_like_count = $this->uri->segment(4);

        $like = array(
            'user_id' => $this->session->userdata('id'),
            'article_id' => $article_id,
        );

        $article_like = array(
            'likes' => $article_like_count + 1,
        );

        $this->UserModel->likeArticle($like);
        $this->UserModel->incrementLike($article_id, $article_like);
        redirect('user/articleview/'.$article_id);
    }

    public function articleDislike()
    {
        $article_id = $this->uri->segment(3);
        $article_like_count = $this->uri->segment(4);

        $dislike = array(
            'user_id' => $this->session->userdata('id'),
            'article_id' => $article_id,
        );

        $article_dislike = array(
            'likes' => $article_like_count - 1,
        );

        $this->UserModel->dislikeArticle($dislike);
        $this->UserModel->decrementLike($article_id, $article_dislike);
        redirect('user/articleview/'.$article_id);
    }

    public function articleLike1()
    {
        $like = array(
            'user_id' => $this->session->userdata('id'),
            'article_id' => $_POST['id'],
        );

        $this->UserModel->likeArticle($like);
        $this->UserModel->incrementLike($_POST['id']);

        $data  = $this->UserModel->countArticleLike($_POST['id']);
        echo json_encode($data);
    }

    public function articleDislike1()
    {
        $dislike = array(
            'user_id' => $this->session->userdata('id'),
            'article_id' => $_POST['id'],
        );

        $this->UserModel->dislikeArticle($dislike);
        $this->UserModel->decrementLike($_POST['id']);
        $data  = $this->UserModel->countArticleLike($_POST['id']);
        echo json_encode($data);
    }

    public function notif()
    {
        if($_SESSION['isUser'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

        $count_user_id = $this->session->userdata('id');
        $this->UserModel->changeStatusNotif($count_user_id);
        
        $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
        $data['updates'] = $this->CalendarModel->getupdate($count_user_id);
        $this->load->view("include/usernavbar",$data);
        $this->load->view("user/notif", $data);
    }

    public function Article()
    {
        if($_SESSION['isUser'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

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

        $count_user_id = $this->session->userdata('id');
        $data['notifs'] = $this->UserModel->countNotifs($count_user_id);

      	$this->load->view('include/toppage');
        $this->load->view("include/usernavbar",$data);
        $this->load->view("user/Article", $data);
    }
	
    public function addappoint()
    {
        $purpose = $_POST['purpose'];
        list($pet_name, $appform_id) = explode('|', "$purpose|");
        $this->AnimalModel->appFormBook($appform_id);
        $end_time = date('G:ia', strtotime($this->input->post('time'))+7200);
        $appoint = array(
            'resrve_fname' => $this->session->fname,
            'reserve_lname' => $this->session->lname,
            'user_id' => $this->session->id, 
            'purpose' => $pet_name,
            'date' => $this->input->post('date'),
            'time' => $this->input->post('time'),
            'end_time' => $end_time,
            'status' => "Pending",
            'appform_id' => $appform_id,
        );

        $date = date('F d, Y', strtotime($this->input->post('date')));

        $name = $this->session->userdata('fname').' '.$this->session->userdata('lname');
        $notif = array(
            'message' => $name.' reserved a date on '.$date,
            'type' => 2,
        );

        $this->AdminModel->notifyAdmin($notif);
        $this->CalendarModel->addappoint($appoint);
        $this->session->set_flashdata('success_msg', 'Appointment has been requested. Just wait for updates');
        redirect('user/viewReservePage','refresh');
    }

    public function LostPet()
    {
        if($_SESSION['isUser'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

        $data['lost'] = $this->UserModel->getAllLostPet();
        $count_user_id = $this->session->userdata('id');
        $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
        $this->load->view("include/usernavbar",$data);
        $this->load->view("user/LostPet/pet", $data);
    }

    public function addLostPet(){
        $lost = array(
            'lost_title' => $this->input->post('lost_title'),
            'lost_name' => $this->input->post('lost_name'),
            'lost_breed' => $this->input->post('lost_breed'),
            'lost_desc' => $this->input->post('lost_desc'),
            'lost_seen' => $this->input->post('lost_seen'),
            'lost_cname' => $this->input->post('lost_cname'),
            'lost_contact' => $this->input->post('lost_contact'),
            'lost_uname' => $_SESSION['fname']. " ".$_SESSION['lname'],

        );

        $this->form_validation->set_rules('lost_title', 'lost_title', 'required|min_length[5]');
        $this->form_validation->set_rules('lost_name', 'lost_name', 'required|min_length[3]');
        $this->form_validation->set_rules('lost_breed', 'lost_breed', 'required|min_length[5]');
        $this->form_validation->set_rules('lost_desc', 'lost_desc', 'required|min_length[8]');
        $this->form_validation->set_rules('lost_seen', 'lost_seen', 'required|min_length[8]');
        $this->form_validation->set_rules('lost_cname', 'lost_cname', 'required|min_length[8]');
        $this->form_validation->set_rules('lost_contact', 'lost_contact', 'required|min_length[8]');

        if ($this->form_validation->run() == FALSE) {
            $count_user_id = $this->session->userdata('id');
            $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
            $this->load->view('include/toppage');
            $this->load->view('include/usernavbar',$data);
            $this->load->view("user/LostPet/Pet"); //add form for article
        } else {

            $this->UserModel->insertLostPet($lost);
            redirect('user/LostPet');
        }
    }

    public function addBio()
    {
        $id = $this->session->id;
        $bio = array(
            'bio' => $this->input->post('bio'),
        );
        $this->UserModel->insertBio($id,$bio);
        echo "<script>alert('BIO has been changed!');</script>";
        redirect('user/index','refresh');
    }

    public function Forum()
    {
        if($_SESSION['isUser'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

        $count_user_id = $this->session->userdata('id');
        $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
        $this->load->view('include/toppage');
        $this->load->view("include/usernavbar",$data);
        $this->load->view("user/Forum");
    }

    public function Adopt() 
    {
        if($_SESSION['isUser'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

        $pet_id = $_POST['petid'];
        $pet_name = $_POST['petname'];
        $user_id = $this->session->userdata('id');
        $user_name = $this->session->userdata('fname').' '.$this->session->userdata('lname');

        $details = array(
            'user_id' => $user_id,
            'user_name' => $user_name,
            'pet_id' => $pet_id,
            'pet_name' => $pet_name,
        );
        $this->UserModel->adoptPet($details);

        $name = $this->session->userdata('fname').' '.$this->session->userdata('lname');

        $notif = array(
            // 'user_id' => $this->session->userdata('id'),
            'message' => $name.' sent an adoption for '.$pet_name,
            'type' => 0,
        );
        $this->AdminModel->notifyAdmin($notif);
        echo json_encode($pet_name);
    }

    public function adoptCancel()
    {
        $pet_id = $_POST['petid'];
        $user_id = $this->session->userdata('id');
        
        $details = array(
            'user_id' => $user_id,
            'pet_id' => $pet_id,
        );
        $this->UserModel->adoptCancel($details);
        echo json_encode($pet_id);
    }

    public function updateForm()
    {
        if($_SESSION['isUser'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }
        
        $user_id = $this->uri->segment(3);
        $has_form = $this->UserModel->hasForm($user_id);

        if($has_form == 0)
        {
            $priority = 0;
            $home = 0;
            $apartment = 0;
            $checkTownhouse = 0;
            $checkCondo = 0;
            $checkDorm = 0;
            $allergy = 0;
            $support = 0;
            $checkMyself = 0;
            $checkChildren = 0;
            $checkRelatives = 0;
            $checkOthers = 0;
            $checkEmployed = 0;
            $checkSelfEmp = 0;
            $checkNone = 0;
            $adopted = 0;
            $gift = 0;
            $atDay = 0;
            $atNight = 0;
            $leftDuration = 0;
            $vet = 0;
            $rentown = 0;
            
            // 1
            if(isset($_POST['checkHome'])){
                $home = 10;
            }
            if(isset($_POST['checkApartment'])){
                $apartment = 6;
            }
            if(isset($_POST['checkTownhouse'])){
                $checkTownhouse = 8;
            }
            if(isset($_POST['checkCondo'])){
                $checkCondo = 4;
            }
            if(isset($_POST['checkDorm'])){
                $checkDorm = 1;
            }
    
            $num_one = $home + $apartment + $checkTownhouse + $checkCondo + $checkDorm;
    
            // 2
            if(isset($_POST['allergy']) == 'No'){
                $allergy = 10;
            }else{
                $allergy = 1;
            }
    
            if(isset($_POST['support']) == 'Yes'){
                $support = 8;
            }else{
                $support = 2;
            }
            
            $num_two = $allergy + $support;
    
            // 3
            if(isset($_POST['checkMyself'])){
                $checkMyself = 10;
            }
            if(isset($_POST['checkChildren'])){
                $checkChildren = 3;
            }
            if(isset($_POST['checkRelatives'])){
                $checkRelatives = 7;
            }
            if(isset($_POST['checkOthers'])){
                $checkOthers = 1;
            }
    
            $num_three = $checkMyself + $checkChildren + $checkTownhouse + $checkRelatives;
    
            // 4
            if(isset($_POST['checkEmployed'])){
                $checkEmployed = 8;
            }
            if(isset($_POST['checkSelfEmp'])){
                $checkSelfEmp = 10;
            }
            if(isset($_POST['checkNone'])){
                $checkNone = 0;
            }
    
            $num_four = $checkEmployed + $checkSelfEmp + $checkNone;
    
            // 5
            if(isset($_POST['adopted']) == 'Yes'){
                $adopted = 5;
            }else{
                $adopted = 1;
            }
    
            // 6
            if(isset($_POST['gift']) == 'Yes'){
                $gift = 2;
            }else{
                $gift = 5;
            }
    
            // 7
            if(isset($_POST['atDay']) == 'Indoors'){
                $atDay = 8;
            }elseif(isset($_POST['atDay']) == 'In/Out'){
                $atDay = 3;
            }elseif(isset($_POST['atDay']) == 'Patio'){
                $atDay = 5;
            }else{
                $atDay = 6;
            }
    
            if(isset($_POST['atNight']) == 'Indoors'){
                $atNight = 8;
            }elseif(isset($_POST['atNight']) == 'In/Out'){
                $atNight = 3;
            }elseif(isset($_POST['atNight']) == 'Patio'){
                $atNight = 5;
            }else{
                $atNight = 6;
            }
    
            $num_seven = $atDay + $atNight;
    
            // 8
            if(isset($_POST['leftDuration']) == '0'){
                $leftDuration = 10;
            }elseif(isset($_POST['leftDuration']) == '1-3'){
                $leftDuration = 6;
            }elseif(isset($_POST['leftDuration']) == '3-6'){
                $leftDuration = 3;
            }else{
                $leftDuration = 1;
            }
    
            // 9
            if(isset($_POST['vet']) == 'Yes'){
                $vet = 8;
            }else{
                $vet = 3;
            }
    
            // 10
            if(isset($_POST['rentown']) == 'Own'){
                $rentown = 8;
            }else{
                $rentown = 4;
            }
    
            $priority = $num_one + $num_two + $num_three + $num_four + $adopted + $gift + $num_seven + $leftDuration + $vet + $rentown;
            
            $details = array(
                'user_id' => $this->session->userdata('id'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'work' => $this->input->post('work'),
                'cellphone' => $this->input->post('cellphone'),        
                'telephone' => $this->input->post('telephone'),
                'checkHome' => $this->input->post('checkHome'),
                'checkApartment' => $this->input->post('checkApartment'),
                'checkTownhouse' => $this->input->post('checkTownhouse'),
                'checkCondo' => $this->input->post('checkCondo'),
                'checkDorm' => $this->input->post('checkDorm'),
                'rentown' => $this->input->post('rentown'),
                'living' => $this->input->post('living'),
                'howlong' => $this->input->post('howlong'),
                'adults' => $this->input->post('adults'),
                'childrens' => $this->input->post('childrens'),
                'allergy' => $this->input->post('allergy'),
                'specifyallergy' => $this->input->post('specifyallergy'),
                'support' => $this->input->post('support'),
                'move' => $this->input->post('move'),
                'moveDate' => $this->input->post('moveDate'),
                'checkMyself' => $this->input->post('checkMyself'),
                'checkChildren' => $this->input->post('checkChildren'),
                'checkRelatives' => $this->input->post('checkRelatives'),
                'checkOthers' => $this->input->post('checkOthers'),
                'checkEmployed' => $this->input->post('checkEmployed'),
                'checkSelfEmp' => $this->input->post('checkSelfEmp'),
                'checkNone' => $this->input->post('checkNone'),
                'adopted' => $this->input->post('adopted'),
                'gift' => $this->input->post('gift'),
                'giftToWhom' => $this->input->post('giftToWhom'),
                'atDay' => $this->input->post('atDay'),
                'atNight' => $this->input->post('atNight'),
                'listown' => $this->input->post('listown'),
                'leftDuration' => $this->input->post('leftDuration'),
                'food' => $this->input->post('food'),
                'vet' => $this->input->post('vet'),
                'fenceHeight' => $this->input->post('fenceHeight'),
                'pastExp' => $this->input->post('pastExp'),
                'reason' => $this->input->post('reason'),
                'priority' => $priority
            );
    
            $this->form_validation->set_rules('address', 'Address', 'required|max_length[120]');
            $this->form_validation->set_rules('work', 'Work', 'required|max_length[100]');
            $this->form_validation->set_rules('cellphone', 'Cellphone', 'required|numeric');
            $this->form_validation->set_rules('telephone', 'telephone', 'required|numeric');
            $this->form_validation->set_rules('checkHome', 'checkHome', '');
            $this->form_validation->set_rules('checkApartment', 'checkApartment', '');
            $this->form_validation->set_rules('checkTownhouse', 'checkTownhouse', '');
            $this->form_validation->set_rules('checkCondo', 'checkCondo', '');
            $this->form_validation->set_rules('checkDorm', 'checkDorm', '');
            $this->form_validation->set_rules('rentown', 'rentown', '');
            $this->form_validation->set_rules('living', 'living', '');
            $this->form_validation->set_rules('howlong', 'howlong', 'max_length[30]');
            $this->form_validation->set_rules('adults', 'adults', 'numeric');
            $this->form_validation->set_rules('childrens', 'childrens', 'numeric');
            $this->form_validation->set_rules('allergy', 'allergy', '');
            $this->form_validation->set_rules('specifyallergy', 'specifyallergy', 'max_length[120]');
            $this->form_validation->set_rules('support', 'support', '');
            $this->form_validation->set_rules('checkMyself', 'checkMyself', '');
            $this->form_validation->set_rules('checkChildren', 'checkChildren', '');
            $this->form_validation->set_rules('checkRelatives', 'checkRelatives', '');
            $this->form_validation->set_rules('checkOthers', 'checkOthers', '');
            $this->form_validation->set_rules('checkEmployed', 'checkEmployed', '');
            $this->form_validation->set_rules('checkSelfEmp', 'checkSelfEmp', '');
            $this->form_validation->set_rules('checkNone', 'checkNone', '');
            $this->form_validation->set_rules('adopted', 'adopted', '');
            $this->form_validation->set_rules('gift', 'gift', '');
            $this->form_validation->set_rules('atDay', 'atDay', '');
            $this->form_validation->set_rules('atNight', 'atNight', '');
            $this->form_validation->set_rules('leftDuration', 'leftDuration', '');
            $this->form_validation->set_rules('food', 'food', '');
            $this->form_validation->set_rules('vet', 'vet', '');
            $this->form_validation->set_rules('pastExp', 'pastExp', 'max_length[500]');
            $this->form_validation->set_rules('reason', 'reason', 'max_length[500]');
    
            if ($this->form_validation->run() == FALSE)
            {
                $id = $this->session->id;
            
                $petid = $this->uri->segment(3);
                $data['animals'] = $this->AnimalModel->getPet($petid);
                $data['user'] = $this->UserModel->getUser($id);
                $data['announcement']= $this->UserModel->getAllAnnounce();
                $data['appform'] = $this->UserModel->getUserForm($user_id);
                $count_user_id = $this->session->userdata('id');
                $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
                $this->load->view('include/usernavbar',$data);
                $this->load->view('user/Loggedin/User/Profile', $data);
            }
            else
            {
                $this->UserModel->insertAppform($details);
                redirect('user/index');
            }
        }
        else
        {
            $priority = 0;
            $home = 0;
            $apartment = 0;
            $checkTownhouse = 0;
            $checkCondo = 0;
            $checkDorm = 0;
            $allergy = 0;
            $support = 0;
            $checkMyself = 0;
            $checkChildren = 0;
            $checkRelatives = 0;
            $checkOthers = 0;
            $checkEmployed = 0;
            $checkSelfEmp = 0;
            $checkNone = 0;
            $adopted = 0;
            $gift = 0;
            $atDay = 0;
            $atNight = 0;
            $leftDuration = 0;
            $vet = 0;
            $rentown = 0;
            
            // 1
            if(isset($_POST['checkHome'])){
                $home = 10;
            }
            if(isset($_POST['checkApartment'])){
                $apartment = 6;
            }
            if(isset($_POST['checkTownhouse'])){
                $checkTownhouse = 8;
            }
            if(isset($_POST['checkCondo'])){
                $checkCondo = 4;
            }
            if(isset($_POST['checkDorm'])){
                $checkDorm = 1;
            }
    
            $num_one = $home + $apartment + $checkTownhouse + $checkCondo + $checkDorm;
    
            // 2
            if(isset($_POST['allergy']) == 'No'){
                $allergy = 10;
            }else{
                $allergy = 1;
            }
    
            if(isset($_POST['support']) == 'Yes'){
                $support = 8;
            }else{
                $support = 2;
            }
            
            $num_two = $allergy + $support;
    
            // 3
            if(isset($_POST['checkMyself'])){
                $checkMyself = 10;
            }
            if(isset($_POST['checkChildren'])){
                $checkChildren = 3;
            }
            if(isset($_POST['checkRelatives'])){
                $checkRelatives = 7;
            }
            if(isset($_POST['checkOthers'])){
                $checkOthers = 1;
            }
    
            $num_three = $checkMyself + $checkChildren + $checkTownhouse + $checkRelatives;
    
            // 4
            if(isset($_POST['checkEmployed'])){
                $checkEmployed = 8;
            }
            if(isset($_POST['checkSelfEmp'])){
                $checkSelfEmp = 10;
            }
            if(isset($_POST['checkNone'])){
                $checkNone = 0;
            }
    
            $num_four = $checkEmployed + $checkSelfEmp + $checkNone;
    
            // 5
            if(isset($_POST['adopted']) == 'Yes'){
                $adopted = 5;
            }else{
                $adopted = 1;
            }
    
            // 6
            if(isset($_POST['gift']) == 'Yes'){
                $gift = 2;
            }else{
                $gift = 5;
            }
    
            // 7
            if($_POST['atDay'] == 'Indoors'){
                $atDay = 8;
            }elseif($_POST['atDay'] == 'In/Out'){
                $atDay = 3;
            }elseif($_POST['atDay'] == 'Patio'){
                $atDay = 5;
            }else{
                $atDay = 6;
            }
    
            if($_POST['atNight'] == 'Indoors'){
                $atNight = 8;
            }elseif($_POST['atNight'] == 'In/Out'){
                $atNight = 3;
            }elseif($_POST['atNight'] == 'Patio'){
                $atNight = 5;
            }else{
                $atNight = 6;
            }
    
            $num_seven = $atDay + $atNight;
    
            // 8
            if(isset($_POST['leftDuration']) == '0'){
                $leftDuration = 10;
            }elseif(isset($_POST['leftDuration']) == '1-3'){
                $leftDuration = 6;
            }elseif(isset($_POST['leftDuration']) == '3-6'){
                $leftDuration = 3;
            }else{
                $leftDuration = 1;
            }
    
            // 9
            if(isset($_POST['vet']) == 'Yes'){
                $vet = 8;
            }else{
                $vet = 3;
            }
    
            // 10
            if(isset($_POST['rentown']) == 'Own'){
                $rentown = 8;
            }else{
                $rentown = 4;
            }
    
            $priority = $num_one + $num_two + $num_three + $num_four + $adopted + $gift + $num_seven + $leftDuration + $vet + $rentown;
            
            $details = array(
                'user_id' => $this->session->userdata('id'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'work' => $this->input->post('work'),
                'cellphone' => $this->input->post('cellphone'),        
                'telephone' => $this->input->post('telephone'),
                'checkHome' => $this->input->post('checkHome'),
                'checkApartment' => $this->input->post('checkApartment'),
                'checkTownhouse' => $this->input->post('checkTownhouse'),
                'checkCondo' => $this->input->post('checkCondo'),
                'checkDorm' => $this->input->post('checkDorm'),
                'rentown' => $this->input->post('rentown'),
                'living' => $this->input->post('living'),
                'howlong' => $this->input->post('howlong'),
                'adults' => $this->input->post('adults'),
                'childrens' => $this->input->post('childrens'),
                'allergy' => $this->input->post('allergy'),
                'specifyallergy' => $this->input->post('specifyallergy'),
                'support' => $this->input->post('support'),
                'move' => $this->input->post('move'),
                'moveDate' => $this->input->post('moveDate'),
                'checkMyself' => $this->input->post('checkMyself'),
                'checkChildren' => $this->input->post('checkChildren'),
                'checkRelatives' => $this->input->post('checkRelatives'),
                'checkOthers' => $this->input->post('checkOthers'),
                'checkEmployed' => $this->input->post('checkEmployed'),
                'checkSelfEmp' => $this->input->post('checkSelfEmp'),
                'checkNone' => $this->input->post('checkNone'),
                'adopted' => $this->input->post('adopted'),
                'gift' => $this->input->post('gift'),
                'giftToWhom' => $this->input->post('giftToWhom'),
                'atDay' => $this->input->post('atDay'),
                'atNight' => $this->input->post('atNight'),
                'listown' => $this->input->post('listown'),
                'leftDuration' => $this->input->post('leftDuration'),
                'food' => $this->input->post('food'),
                'vet' => $this->input->post('vet'),
                'fenceHeight' => $this->input->post('fenceHeight'),
                'pastExp' => $this->input->post('pastExp'),
                'reason' => $this->input->post('reason'),
                'priority' => $priority
            );
    
            $this->form_validation->set_rules('address', 'Address', 'required|max_length[120]');
            $this->form_validation->set_rules('work', 'Work', 'required|max_length[100]');
            $this->form_validation->set_rules('cellphone', 'Cellphone', 'required|numeric');
            $this->form_validation->set_rules('telephone', 'telephone', 'required|numeric');
            $this->form_validation->set_rules('checkHome', 'checkHome', '');
            $this->form_validation->set_rules('checkApartment', 'checkApartment', '');
            $this->form_validation->set_rules('checkTownhouse', 'checkTownhouse', '');
            $this->form_validation->set_rules('checkCondo', 'checkCondo', '');
            $this->form_validation->set_rules('checkDorm', 'checkDorm', '');
            $this->form_validation->set_rules('rentown', 'rentown', '');
            $this->form_validation->set_rules('living', 'living', '');
            $this->form_validation->set_rules('howlong', 'howlong', 'max_length[30]');
            $this->form_validation->set_rules('adults', 'adults', 'numeric');
            $this->form_validation->set_rules('childrens', 'childrens', 'numeric');
            $this->form_validation->set_rules('allergy', 'allergy', '');
            $this->form_validation->set_rules('specifyallergy', 'specifyallergy', 'max_length[120]');
            $this->form_validation->set_rules('support', 'support', '');
            $this->form_validation->set_rules('checkMyself', 'checkMyself', '');
            $this->form_validation->set_rules('checkChildren', 'checkChildren', '');
            $this->form_validation->set_rules('checkRelatives', 'checkRelatives', '');
            $this->form_validation->set_rules('checkOthers', 'checkOthers', '');
            $this->form_validation->set_rules('checkEmployed', 'checkEmployed', '');
            $this->form_validation->set_rules('checkSelfEmp', 'checkSelfEmp', '');
            $this->form_validation->set_rules('checkNone', 'checkNone', '');
            $this->form_validation->set_rules('adopted', 'adopted', '');
            $this->form_validation->set_rules('gift', 'gift', '');
            $this->form_validation->set_rules('atDay', 'atDay', '');
            $this->form_validation->set_rules('atNight', 'atNight', '');
            $this->form_validation->set_rules('leftDuration', 'leftDuration', '');
            $this->form_validation->set_rules('food', 'food', '');
            $this->form_validation->set_rules('vet', 'vet', '');
            $this->form_validation->set_rules('pastExp', 'pastExp', 'max_length[500]');
            $this->form_validation->set_rules('reason', 'reason', 'max_length[500]');
    
            if ($this->form_validation->run() == FALSE)
            {
                $id = $this->session->id;
            
                $petid = $this->uri->segment(3);
                $data['animals'] = $this->AnimalModel->getPet($petid);
                $data['user'] = $this->UserModel->getUser($id);
                $data['announcement']= $this->UserModel->getAllAnnounce();
                $data['appform'] = $this->UserModel->getUserForm($user_id);
                $count_user_id = $this->session->userdata('id');
                $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
                $this->load->view('include/usernavbar',$data);
                $this->load->view('user/Loggedin/User/Profile', $data);
            }
            else
            {
                $this->UserModel->updateAppForm($user_id, $details);
                redirect('user/index');
            }
        }
    }

    public function viewReservePage()
    {
        $data['days'] = $this->AdminModel->getDisableDays();
        $data['events'] = $this->CalendarModel->getevents();
        $count_user_id = $this->session->userdata('id');
        $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
        $data['approved'] = $this->AnimalModel->countApprovedAdoption();
        $data['approves'] = $this->AnimalModel->getAllApproveForm();
        $this->load->view("include/usernavbar", $data);
        $this->load->view("user/reservation", $data);
    }

    public function viewadoption()
    {
        $id = $this->session->userdata('id');
        $data['adoptions'] = $this->AnimalModel->getAdoption($id);
        $count_user_id = $this->session->userdata('id');
        $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
        $this->load->view('include/toppage');
        $this->load->view("include/usernavbar", $data);
        $this->load->view('user/Adopt/adoption',$data);
    }

    public function canceladopt()
    {
        $id = $this->uri->segment(3);
        $pet_name = $this->uri->segment(4);
        $name = $this->session->userdata('fname').' '.$this->session->userdata('lname');
        
        $notif = array(
            'message' => $name.' cancelled the adoption for '.$pet_name,
            'type' => 0,
        );

        $this->AdminModel->notifyAdmin($notif);
        $this->AnimalModel->canceladoption($id);
        redirect('user/viewadoption','refresh');
    }

    public function Donation()
    {
        $count_user_id = $this->session->userdata('id');
        $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
        $this->load->view("include/usernavbar",$data);
        $this->load->view("user/Donation/Donation");
    }
	
    public function submitDonation()
    {
        $config['upload_path']   = './assets/donation_img/'; 
        $config['allowed_types'] = 'jpg|png|JPG|PNG'; 
        $config['max_size']      = 3000;
        $config['file_name'] = time();
        
        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        if(!$this->upload->do_upload('donation_img'))
        {
            $error = array('error' => $this->upload->display_errors()); 
            $this->session->set_flashdata('error',$error['error']);
            $count_user_id = $this->session->userdata('id');
            $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
            $this->load->view("include/usernavbar",$data);
            redirect('user/Donation/','refresh');
            return FALSE;
        }

        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
        $file_name = $upload_data['file_name'];

        $name = $this->session->userdata('fname').' '.$this->session->userdata('lname');

        $donation = array(
            'name' => $this->input->post('name'),
            'donation_type' => $this->input->post('donation_type'),
            'donation_img' => $file_name,
        );

        $notif = array(
            'message' => $name.' sent donation for the shelter',
            'type' => 3,
        );

        $this->AdminModel->notifyAdmin($notif);
        $this->UserModel->sendDonation($donation);
        $this->session->set_flashdata('success_msg', 'You have successfully donated. Thank you for your Kindness.');
        redirect('user/Donation', 'refresh');
    }

    public function Message()
    {
        $id = $this->session->id;

        $data['user'] = $this->UserModel->getUsers($id);
        $data['mail'] = $this->UserModel->getmail();
        $data['countmail'] = $this->UserModel->countmail();
        $count_user_id = $this->session->userdata('id');
        $data['notifs'] = $this->UserModel->countNotifs($count_user_id);

        $this->load->view('include/toppage');
        $this->load->view("include/usernavbar",$data);
        $this->load->view('user/Loggedin/User/Message',$data);
    }


    public function EditProfile()
    {
        if($_SESSION['isUser'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

        $id = $this->session->userdata('id');
        $count_user_id = $this->session->userdata('id');
        $data['user'] = $this->UserModel->getUser($id);
        $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
        $this->load->view("include/usernavbar",$data);
        $this->load->view("user/Loggedin/User/EditProfile",$data);
    }

    //Edit Profile
    public function update()
    {
        if($_SESSION['isUser'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }
        $id = $this->session->userdata('id');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $id = $this->session->userdata('id');
            $count_user_id = $this->session->userdata('id');
            $data['user'] = $this->UserModel->getUser($id);
            $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
            $this->load->view("include/usernavbar",$data);
            $this->load->view("user/Loggedin/User/EditProfile",$data);
        } 
        else
        {
            $config['upload_path']   = './assets/user_img/'; 
            $config['allowed_types'] = 'jpg|png'; 
            $config['max_size']      = 3000;
            $config['file_name'] = time();
           
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

            if(!$this->upload->do_upload('user_img'))
            {
                $error = array('error' => $this->upload->display_errors()); 
                $this->session->set_flashdata('error',$error['error']);
                $this->load->view('include/usernavbar');
                redirect('user/EditProfile/', 'refresh');
                return FALSE;
            }

            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $file_name = $upload_data['file_name'];

            $user = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'picpath' => $file_name,
            );

            $this->UserModel->updateUser($id,$user);
            redirect('user/index',$data);
        }

    }

    public function updates(){
        $result = $this->UserModel->update();
        if($result){
            $this->session->set_flashdata('success_msg', 'Information updated successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Fail to update information');
        }
        redirect(base_url('user/Profile'));
    }

    public function Home() 
    {
        if($_SESSION['isUser'] == 0)
        {
        session_destroy();
        redirect(base_url());
        }

        $count_user_id = $this->session->userdata('id');
        $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
        $data['article'] = $this->AdminModel->getAllArticle();
        $this->load->view("include/usernavbar",$data);
        $this->load->view("user/Loggedin/UserIntro",$data);
        $this->load->view("user/Home",$data);
        $this->load->view("user/About",$data);
    }

    public function Community()
    {
        if($_SESSION['isUser'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

        $data['posts'] = $this->UserModel->getAllPost();
        $data['rescues'] = $this->AdminModel->getAllRescue();

        $count_user_id = $this->session->userdata('id');
        $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
        $this->load->view('include/usernavbar',$data);
        $this->load->view('user/Loggedin/Community/Community', $data);
    }

    public function addPost()
    {
        if($_SESSION['isUser'] == 0)
        {
            session_destroy();
            redirect(base_url());
        }

        $this->form_validation->set_rules('caption', 'caption', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['posts'] = $this->UserModel->getAllPost();
            $data['rescues'] = $this->AdminModel->getAllRescue();
            $count_user_id = $this->session->userdata('id');
            $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
            $this->load->view('include/usernavbar',$data);
            $this->load->view('user/loggedin/community/Community', $data);
        }
        else
        {
            $config['upload_path']   = './assets/community_img/';
            $config['allowed_types'] = 'jpg|png|JPG|PNG|JPEG|jpeg'; 
            $config['max_size']      = 3000;
            $config['file_name'] = time();

            $this->load->library('upload',$config);
            $this->upload->initialize($config);

            if(!$this->upload->do_upload('uploadimage'))
            {
                $error = array('error' => $this->upload->display_errors()); 
                $this->session->set_flashdata('error',$error['error']);
                $count_user_id = $this->session->userdata('id');
                $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
                $this->load->view("include/usernavbar",$data);
                redirect('user/community/','refresh');
            }


            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $file_name = $upload_data['file_name'];

            $posts = array(
                'caption' => $this->input->post('caption'),
                'post_name' => $_SESSION['fname']. " ".$_SESSION['lname'],
                'user_id' => $_SESSION['id'],
                'pic_loc' => $file_name,
            );

            $this->UserModel->insertPost($posts);
            redirect('user/community');
        }
    }
	
    public function addComment()
    {
		$comment = array(
			"user_id" => $_SESSION['id'],
			"post_id" => $_POST['post_id'],
			"comment_name" => $_SESSION['fname'] ." ". $_SESSION['lname'],
			"caption" => $_POST['comment']

		);
	
		$this->form_validation->set_rules('comment', 'Comment', 'required');
    
		if ($this->form_validation->run() == FALSE) {
            $count_user_id = $this->session->userdata('id');
            $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
            $this->load->view('include/usernavbar',$datta);
            $this->load->view('user/loggedin/community/Community'); 
        } else {
            $count_user_id = $this->session->userdata('id');
            $data['notifs'] = $this->UserModel->countNotifs($count_user_id);
            $this->UserModel->insertComment($comment);
            $this->load->view('include/usernavbar',$data);
            redirect('user/community');
        }
	}

    public function logout()
    {
        session_destroy();
        redirect('login/login', 'Logged out');
    }
}
