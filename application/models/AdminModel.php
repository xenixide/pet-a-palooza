<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {
    
	public function getAdmin($admin){
		$q = $this->db->get_where('tbladmin', $admin);
		return $q->row();
	}
	
	public function getAllRescue(){
        $query = $this->db->get("rescue");
        if($query->num_rows() > 0)
           return $query->result();
        else
           return false;
    }

    public function getAdoptedAnimals()
    {
        $this->db->from('tblanimal');
        $this->db->where('adopter_by is NOT NULL',NULL, FALSE);
        $q = $this->db->get();

        return $q->result();
    }

    public function getForAdoptionAnimals()
    {
        $this->db->from('tblanimal');
        $this->db->where('adopter_by',NULL);
        $q = $this->db->get();

        return $q->result();
    }

    public function getVolunteers()
    {
        $this->db->from('tbluser');
        $this->db->where('volunteer', 'yes');
        $q = $this->db->get();

        return $q->result();
    }

    public function getDayEvents($date)
    {
        $this->db->from('calendar');
        $this->db->where('start', $date);
        $this->db->order_by('time', 'desc');
        $q = $this->db->get();
        return $q->result();
    }

    public function disableDay($day)
    {
        $this->db->insert('calendar', $day);
    }

    public function enableDay($day, $date)
    {
        $this->db->set($day);
        $this->db->where('disable_day', $date);
        $this->db->update('calendar');
    }

    public function getDisableDays()
    {
        $this->db->from('calendar');
        $this->db->where('name', '');
        $q = $this->db->get();
        return $q->result();
    }

    public function notifyAdmin($notif)
    {
        $this->db->insert('notif_admin', $notif);
    }

    public function countAdminNotifs()
    {
        return $this->db->where('status', 0)->from("notif_admin")->count_all_results();
    }

    public function getAdminNotifications()
    {
        $this->db->from('notif_admin');
        $this->db->order_by('date', 'desc');
        $q = $this->db->get();
        return $q->result();
    }

    public function notifSeen()
    {
        $this->db->where('status', 0);
        $this->db->update('notif_admin', array('status' => 1));
    }

	//For viewing of rescue
	public function getRescue($id){
        $q = $this->db->get_where('rescue',array('id'=>$id));
        return $q->row();
    }
	
	public function deleteRescue($id){
        $this->db->delete('rescue',array('id'=>$id));
    }


       //Get all rows in tbladmin
    public function getAllMember(){
        $query = $this->db->get("tbladmin");
        if($query->num_rows() > 0)
           return $query->result();
        else
           return false;
    }


    public function getForm($id){
        $q = $this->db->get_where('form',array('id'=>$id));
        return $q->row();     
    }

    public function insertForm($form){
        $q = $this->db->insert('form',$form);
    }

    public function insert($data = array()){
        $insert = $this->db->insert($this->tableName,$data);
    }

        public function getMember($id){
        $q = $this->db->get_where('tbladmin',array('id'=>$id));
        return $q->row();
    }

        public function insertMember($member){
        $q = $this->db->insert('tbladmin',$member);
    }

        //Update rows in tbladmin
    public function updateMember($id, $members){
        $this->db->set($members);
        $this->db->where('id', $id);
        $this->db->update('tbladmin');
    }

        //Get all rows in tblarticle
    public function getAllArticle()
    {
        $this->db->from('tblarticle');
        $this->db->order_by('likes', 'desc');
        $query = $this->db->get(); 

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function insertArticle($article){
        $q = $this->db->insert('tblarticle',$article);
    }

    public function getArticle($article_id){
        $q = $this->db->get_where('tblarticle',array('article_id'=>$article_id));
        return $q->row();
    }

            //Update rows in tblarticle
    public function updateArticle($article_id, $article){
        $this->db->set($article);
        $this->db->where('article_id', $article_id);
        $this->db->update('tblarticle');
    }

    public function deleteArticle($article_id){
        $this->db->delete('tblarticle',array('article_id'=>$article_id));
    }

    //for announcement
    public function deleteAnnouncement($announcementid){
        $this->db->delete('tblannouncement',array('announcementid'=>$announcementid));
    }

    //for member
    public function deleteAdmin($id){
        $this->db->delete('tbladmin',array('id'=>$id));
    }

    public function getFiles(){
        $q = $this->db->get('files');
		return $q->result();
    }

    public function uploadFiles($files){
        $q = $this->db->insert('files',$files);
    }

    public function deleteFiles($id){
        $this->db->delete('files',array('file_id'=>$id));
    }

    // ELDON CODE
    public function getPetAdoptions($pet_id)
    {
        $this->db->from('appforms');
        $this->db->where('pet_id', $pet_id);
        $this->db->order_by('priority', 'desc');
        $q = $this->db->get();
        return $q->result();
    }

    public function getSingleForm($adoption_id)
    {
        $q = $this->db->get_where('appforms',array('user_id'=>$adoption_id));
        return $q->row();
    }

    public function getAdminEvents()
    {
        $this->db->from('tblevents');
        $this->db->order_by('event_date', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function viewAdminEvent($event_id)
    {
        $this->db->from('tblevents');
        $this->db->where('id', $event_id);
        $q = $this->db->get();
        return $q->row();
    }

    public function getEventRespondents($event_id)
    {
        $this->db->from('event_responders');
        $this->db->where('event_id', $event_id);
        $q = $this->db->get();
        return $q->result();
    }

    public function deleteAdminEvent($event_id)
    {
        $this->db->where('id', $event_id);
        $this->db->delete('tblevents');
    }

    public function createAdminEvent($event)
    {
        $this->db->insert('tblevents', $event);
    }

    public function updateAdminEvent($event_id, $event)
    {
        $this->db->where('id', $event_id);
        $this->db->update('tblevents', $event);
    }
    // END OF ELDONS CODE

    public function getDonations()
    {
        $this->db->from('tbl_donation');
        $this->db->order_by('created_at', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDonation($donation_id)
    {
        $this->db->where('id_donation', $donation_id);
        $query = $this->db->get('tbl_donation');
        return $query->row();
    }

    public function getId($id){
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_user');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

    public function submit(){
        $field = array(
            'name'=>$this->input->post('name'),
            'donation_type'=>$this->input->post('donation_type'),
            'description'=>$this->input->post('txt_description'),
            'created_at'=>date('Y-m-d H:i:s')
            );
        $this->db->insert('tbl_donation', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function update(){
        $id_donation = $this->input->post('txt_hidden');
        $field = array(
            'name'=>$this->input->post('name'),
            'donation_type'=>$this->input->post('donation_type'),
            'description'=>$this->input->post('txt_description'),
            'updated_at'=>date('Y-m-d H:i:s')
            );
        $this->db->where('id_donation', $id_donation);
        $this->db->update('tbl_donation', $field);
        echo $this->db->last_query();extit;
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

        public function delete($id){
        $this->db->where('id_donation', $id);
        $this->db->delete('tbl_donation');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
}
