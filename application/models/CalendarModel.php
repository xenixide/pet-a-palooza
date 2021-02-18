<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CalendarModel extends CI_Model {
   
    public function getevents(){
		$q = $this->db->get('calendar');
		return $q->result();
    }
    
    public function addevent($event){
        $q = $this->db->insert('calendar',$event);
    }

    public function addnotif($notif){
        $q = $this->db->insert('notification',$notif);
        
    }

    public function getupdate($user_id){
        $q = $this->db->order_by('id', 'desc')->get_where('notification',array('user_id'=>$user_id));
        return $q->result();
    }

    public function addappoint($appoint){
        $q = $this->db->insert('reservation',$appoint);
        
    }

    public function cancelappoints($user_id, $reserve_id){
        $this->db->delete('reservation',array('user_id'=>$user_id, 'reserve_id' => $reserve_id));
        $this->db->delete('calendar',array('id'=>$user_id));
    }

    public function getAppoints(){
        $q = $this->db->get('reservation');
		return $q->result();
    }

    public function updateAppoints($id,$status){
        $this->db->where('reserve_id', $id);
        $this->db->update('reservation', $status);
    }

} 
