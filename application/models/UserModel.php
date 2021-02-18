<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function updateUser($id, $user)
    {
        $this->db->set($user);
        $this->db->where('id', $id);
        $this->db->update('tbluser',$data);
    }

    public function hasForm($user_id)
    {
        return $this->db->where('user_id', $user_id)->where('status', 0)->from('appforms')->count_all_results();
    }

    public function adoptPet($details)
    {
        $this->db->insert('real_adopt', $details);
    }

    public function adoptCancel($details)
    {
        $this->db->delete('real_adopt', $details);
    }

    public function getUser($id)
    {
        $this->db->from('tbluser');
        $this->db->where('id', $this->session->userdata('id'));
        $q = $this->db->get();
        return $q->row();
    }

    public function signIn($credentials){
        $q = $this->db->get_where('tbluser', $credentials);
        return $q->row();
    }
	
	//For viewing of volunteer
	public function getRescue($id){
        $q = $this->db->get_where('rescue',array('rescue_id'=>$id));
        return $q->row();       
    }

    // ELDON CODE
	public function volunteerAccept($id, $status){
        $this->db->where('rescue_id', $id);
        $this->db->update('rescue',$status);
    }

    public function rescueSuccess($id, $status){
        $this->db->where('rescue_id', $id);
        $this->db->update('rescue',$status);
    }

    public function rescueFailed($id, $status){
        $this->db->where('rescue_id', $id);
        $this->db->update('rescue',$status);
    }

    public function beVolunteer($id,$status){
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('tbluser',$status);
    }

    public function countArticles()
    {
        return $this->db->count_all_results('tblarticle');
    }

    public function countNotifs($user_id)
    {
        return $this->db->where('user_id', $user_id)->where('status', 0)->from("notification")->count_all_results();
    }

    public function changeStatusNotif($user_id)
    {
        $this->db->where('user_id', $this->session->userdata('id'));
        $this->db->update('notification', array('status' => 1));
    }

    public function getArticles($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get('tblarticle');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
        return $data;
        }
        return false;
    }

    public function getSingleArticle($article_id)
    {
        $q = $this->db->get_where('tblarticle',array('article_id'=>$article_id));
        return $q->row();
    }

    public function countArticleLike($id)
    {
        $q = $this->db->get_where('tblarticle',array('article_id'=>$id));
        return $q->row();
    }

    public function likeArticle($like)
    {
        $this->db->insert('article_like', $like);
    }

    public function dislikeArticle($dislike)
    {
        $this->db->delete('article_like', $dislike);
    }
    
    public function incrementLike($article_id)
    {
        $this->db->set('likes', 'likes+1', FALSE);
        $this->db->where('article_id', $article_id);
        $this->db->update('tblarticle');
    }

    public function decrementLike($article_id)
    {
        $this->db->set('likes', 'likes-1', FALSE);
        $this->db->where('article_id', $article_id);
        $this->db->update('tblarticle');
    }

    public function myReservations()
    {
        $this->db->from('reservation');
        $this->db->where('user_id', $this->session->userdata('id'));
        $q = $this->db->get();
        return $q->result();
    }

    public function cancelAppointment($id)
    {
        $tables = array('calendar', 'reservation');
        $this->db->where('reserve_id', $id);
        $this->db->delete($tables);
    }

    public function cancelBook($appform_id)
    {
        $this->db->where('id', $appform_id);
        $this->db->update('real_adopt', array('booked' => 0));
    }

    public function sendDonation($donation)
    {
        $this->db->insert('tbl_donation', $donation);
    }

    public function goEvent($respondent)
    {
        $this->db->insert('event_responders', $respondent);
    }

    public function incementRespond($event_id, $incrementRespondents)
    {
        $this->db->where('id', $event_id);
        $this->db->update('tblevents', $incrementRespondents);
    }

    public function decrementRespond($event_id, $decrementRespondents)
    {
        $this->db->where('id', $event_id);
        $this->db->update('tblevents', $decrementRespondents);
    }

    public function cancelRespond($cancelRespond)
    {
        $this->db->delete('event_responders', $cancelRespond);
    }

    public function getPetIds()
    {
        $this->db->from('real_adopt');
        $this->db->where('user_id', $this->session->userdata('id'));
        $q = $this->db->get();
        return $q->result();
    }
	// END OF ELDON CODE

	
	public function getAllRescue(){
        $query = $this->db->get("rescue");
        if($query->num_rows() > 0)
           return $query->result();
        else
           return false;
    }
    
    public function deactivateUser($id,$status){
        $this->db->where('id', $id);
        $this->db->update('tbluser',$status);
    }

    public function getUsers($id){
        $q = $this->db->get_where('tbluser',array('id'=>$id));
        return $q->row();
    }

	public function insertUser($user){
        $q = $this->db->insert('tbluser',$user);
    }

    public function checkAccount($cond){
    	$this->db->where($cond);
    	$this->db->update('tbluser', array('status'=>'active'));
    	$q = $this->db->get_where('tbluser', $cond);
    	return $q->row();
    }

    public function getAll(){
        $query = $this->db->get("tbluser");
        if($query->num_rows() > 0)
            return $query->result();
        else
           return false;
    }

    public function getAllAnnounce(){
        $query = $this->db->get("tblannouncement");
        if($query->num_rows() > 0)
            return $query->result();
        else
           return false;
    }

    public function inserttopasswordreset($email,$token){
        $array = array(
            "email" => $email,
            "token" => $token
        );
        $this->db->insert('password_resets', $array);
    }

    public function checkfromtoken($token){
        $q = $this->db->get_where('password_resets', array('token' => $token));
        return $q->row();
    }
    public function changepassword($email, $newpassword){
        $this->db->set('password', sha1($newpassword));
        $this->db->where('email', $email);
        $this->db->update('tbluser');
    }

    public function deleteresettoken($token){
        $this->db->where('token', $token);
        $this->db->delete('password_resets');
    }

    public function checkexistingemailsent($email){
       $this->db->where('email',$email);
       $this->db->from("password_resets");
       return  $this->db->count_all_results();
    }

    public function updatetokenfrompasswordreset($newtoken,$email){
        $this->db->set('token', $newtoken);
        $this->db->where('email', $email);
        $this->db->update('password_resets');
    }

           //Get all rows in tblpost
    public function getAllPost(){
		$this->db->order_by('date','desc');
        $query = $this->db->get("tblpost");
        if($query->num_rows() > 0)
            return $query->result();
        else
           return false;
    }

    public function insertPost($posts){
		
        $q = $this->db->insert('tblpost',$posts);
	}
	
	public function insertComment($comment){
		$q = $this->db->insert('tblcomment', $comment);
	}
	
	public function fetchComments($post_id){
		$q = $this->db->get_where('tblcomment', array("post_id" => $post_id));
		return $q->result();
	}

    public function getAllLostPet(){
        $query = $this->db->get("tbllost");
        if($query->num_rows() > 0)
            return $query->result();
        else
           return false;
    }

    public function insertLostPet($lost){
        $q = $this->db->insert('tbllost',$lost);
    }

    public function insertAppform($details){
        $this->db->insert('appforms', $details);
    }

    public function updateAppForm($user_id, $details)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('appforms',$details);
    }

    public function getUserForm()
    {
        $this->db->from('appforms');
        $this->db->where('user_id', $this->session->userdata('id'));
        $q = $this->db->get();
        return $q->row();
    }

    public function insertmail($mail){
        $q = $this->db->insert('tblmail',$mail);
    }

    public function getmail(){
        $query = $this->db->get('tblmail');
        return $query->result();
    }

    public function countmail(){
        $to = $this->session->userdata('email');
        $query = $this->db->get_where('tblmail', array('mailto' => $to));
        return $query->num_rows();
    }


    public function insertBio($id,$bio){
        $this->db->where('id', $id);
        $this->db->update('tbluser',$bio);
    }

    public function getBlogById($id){
        $this->db->where('id', $id);
        $query = $this->db->get('tbluser');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

        public function update(){
        $id = $this->input->post('txt_hidden');
        $field = array(
            'fname'=>$this->input->post('fname'),
            'lname'=>$this->input->post('lname'),
            'email'=>$this->input->post('email')
            );

        $this->db->where('id', $id);
        $this->db->update('tbluser', $field);
        echo $this->db->last_query();exit;
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
	
	public function addrescue($rescue){
        $q = $this->db->insert('rescue',$rescue);
        
    }
}