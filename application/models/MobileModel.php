<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MobileModel extends CI_Model {
    function __construct(){
         parent::__construct();
    }
    
    public function signIn($credentials){
        $query = $this->db->get_where('tbluser', $credentials);
        return $query->row();
    }

    public function comunityPost($info){
        $q = $this->db->insert('tblpost',$info);
    }
    public function updateUser($id, $info){
        $q = $this->db->where('id', $id);
        $q = $this->db->update('tbluser', $info);
    }
    public function updatePassword($id, $info){
        $q = $this->db->where('id', $id);
        $q = $this->db->update('tbluser', $info);
    }

    public function AllArticles(){
        $query = $this->db->order_by('article_time', "DESC")->get("tblarticle");

        if($query->num_rows() > 0)
            return $query->result();
        else
           return false;
    }
    public function AllAnnouncements(){
        $query = $this->db->order_by('announcementid', "DESC")->get("tblannouncement");

        if($query->num_rows() > 0)
            return $query->result();
        else
           return false;
    }
    public function AllCommunities(){
        $query = $this->db->order_by('post_id', "DESC")->get("tblpost");
       
        if($query->num_rows() > 0){
            return $query->result();
        }
           
        else{
            return false;
        }    
    }

    public function findRescue($credentials){
        $query = $this->db->get_where('rescue', array('user_id' => $credentials));
        if($query->num_rows() > 0)
            return $query->result();
        else
       return false;
    }
    public function insertRescuePet($info){
        $q = $this->db->insert('rescue',$info);
    }
    public function deleteRescuePet($id){
        $this->db->where('id', $id);
        $this->db->delete('rescue');
    }
     public function updateRescuePet($id, $info){
    $q = $this->db->where('id', $id);
    $q = $this->db->update('rescue', $info);
    }
    public function viewRescue($credentials){
        $query = $this->db->get_where('rescue', $credentials);
        return $query->row();
    }


    public function findLost($credentials){
        $query = $this->db->get_where('tbllost', array('lost_uname' => $credentials));
        if($query->num_rows() > 0)
        return $query->result();
    else
       return false;
    }
    public function insertLostPet($info){
        $q = $this->db->insert('tbllost',$info);
    }
    public function deleteLostPet($id){
        $this->db->where('lost_id', $id);
        $this->db->delete('tbllost');
    }
    public function updateLostPet($id, $info){
    $q = $this->db->where('lost_id', $id);
    $q = $this->db->update('tbllost', $info);
    }
}