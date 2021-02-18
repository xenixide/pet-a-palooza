<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnimalModel extends CI_Model {
    
    public function getItems($limit, $start){
        $this->db->limit($limit, $start);
        $query = $this->db->get_where('tblanimal', array('status'=> NULL));

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
        return $data;
        }
        return false;
    }

    public function getAllAdopted()
    {
        $this->db->from('tblanimal');
        $this->db->where('status', 'Adopted');
        $this->db->order_by('date_adopted', 'desc');
        $q = $this->db->get();
        return $q->result();
    }

    public function getAllUnadopted()
    {
        $this->db->from('tblanimal');
        $this->db->where('status', NULL);
        $q = $this->db->get();
        return $q->result();
    }

    public function countApprovedAdoption()
    {
        $this->db->from('real_adopt');
        return $this->db->where('already_adopted', $this->session->userdata('id'))->count_all_results();
    }

    public function getAllApproveForm()
    {
        $this->db->from('real_adopt');
        $this->db->where('booked', 0);
        $this->db->where('already_adopted', $this->session->userdata('id'));
        $q = $this->db->get();
        return $q->result();
    }

    public function appFormBook($appform_id)
    {
        $this->db->where('id', $appform_id);
        $this->db->update('real_adopt', array('booked' => 1));
    }

    ////////////////////////////////////
    public function animalcolorany($breed){
        $q = $this->db->get_where('tblanimal',array('petbreed'=>$breed));
        return $q->result();
    }
//////////////////////////////////
    public function animalbreedany($color){
        $q = $this->db->get_where('tblanimal',array('petcolor'=>$color));
        return $q->result();
    }
////////////////////////////////


    public function updateAnimals($id, $animals){
        $this->db->where('petid', $id);
        $this->db->update('tblanimal', $animals);
    }

    public function allanimal(){
        $q = $this->db->get_where('tblanimal', array('status' => NULL));
        return $q->result();
    }

    public function animaltraitany($breed,$color){
        $q = $this->db->get_where('tblanimal',array('petbreed'=>$breed,'petcolor'=>$color, 'status' => NULL));
        return $q->result();
    }

    public function animalcolortraitany($breed){
        $q = $this->db->get_where('tblanimal',array('petbreed'=>$breed, 'status' => NULL));
        return $q->result();
    }

    public function animalbreedtraitany($color){
        $q = $this->db->get_where('tblanimal',array('petcolor'=>$color, 'status' => NULL));
        return $q->result();
    }

    public function animalselected($color,$breed){
        $q = $this->db->get_where('tblanimal',array('petcolor'=>$color,'petbreed'=>$breed));
        return $q->result();
    }

    public function getMatchmaking($breed, $color)
    {
        $q = $this->db->get_where('tblanimal', array('petbreed' => $breed, 'petcolor' => $color, 'status' => NULL));
        return $q->result();
    }
 

    //For viewing pet in tblanimal
    public function getAnimal($id){
        $q = $this->db->get_where('tblanimal',array('petid'=>$id));
        return $q->row();
    }

    public function getAnimalvid($petid){
        $q = $this->db->get_where('animalvid',array('petid'=>$petid));
        return $q->result();
    }

    public function insertvid($animals){
        $q = $this->db->insert('animalvid',$animals);
    }


    //For viewing pet in tblanimal for carousel.php
    public function getPet($petid){
        $q = $this->db->get_where('tblanimal',array('petid'=>$petid));
        return $q->row();
    }

    //Update rows in tblanimal
    public function updateAnimal($id, $animals){
        $this->db->set($animals);
        $this->db->where('petid', $id);
        $this->db->update('tblanimal');
    }

    public function insertAnimal($animals){
        $q = $this->db->insert('tblanimal',$animals);
    }

    public function insertAnnouncement($announcement){
        $q = $this->db->insert('tblannouncement',$announcement);
    }

    public function getAllItems(){
        $q = $this->db->get('tblanimal');
        return $q->result();
    }
   
    //Get all rows in tblanimal
    public function getAll(){
        $query = $this->db->get("tblanimal");
        if($query->num_rows() > 0)
            return $query->result();
        else
           return false;
    }

    public function getAllAnnouncement(){
        $query = $this->db->get("tblannouncement");
        if($query->num_rows() > 0)
            return $query->result();
        else
           return false;
    }
    
    public function insertItem($item){
        $q = $this->db->insert('tblanimal',$item);
    }
    
    public function deleteItem($petid){
        $this->db->delete('tblanimal',array('petid'=>$petid));
    }
    
    public function getItem($petid){
        $q = $this->db->get_where('tblanimal',array('petid'=>$petid));
        return $q->row();
    }

    public function getAnnouncement($announcementid){
        $q = $this->db->get_where('tblannouncement',array('announcementid'=>$announcementid));
        return $q->row();
    }

    public function updateItem($petid, $animals){
        $this->db->where('petid', $petid);
        $this->db->update('tblanimal', $animals);
    }

    public function countItems(){
        // return $this->db->count_all('tblanimal');
        return $this->db->where('status', NULL)->from("tblanimal")->count_all_results();
    }

    public function countItem($item){
        $q = $this->db->get('tblanimal', $item);
        return $q->result();
    }

    public function getPets($page, $noOfRows){
        $petbreed = $this->input->get('petbreed');
        $petcolor = $this->input->get('petcolor');
        $pettrait = $this->input->get('pettrait');

        if($petbreed == 'any' && $petcolor == 'any' && $pettrait == 'any'){
            $q = $this->db->get('tblanimal',$page, $noOfRows);
        } else if ($petcolor == 'any' && $pettrait == 'any'){
            $q = $this->db->get_where('tblanimal',array('petbreed'=>$petbreed),$page, $noOfRows);
        } else if ($petbreed == 'any' && $pettrait == 'any'){
            $q = $this->db->get_where('tblanimal',array('petcolor'=>$petcolor),$page, $noOfRows);
        } else if ($petbreed == 'any' && $petcolor == 'any'){
            $q = $this->db->get_where('tblanimal',array('pettrait'=>$pettrait),$page, $noOfRows);
        } else if ($petbreed == 'any' ){
            $q = $this->db->get_where('tblanimal',array('petcolor'=>$petcolor,'pettrait'=>$pettrait),$page, $noOfRows);
        } else if ($petcolor == 'any'){
            $q = $this->db->get_where('tblanimal',array('pettrait'=>$pettrait,'petbreed'=>$petbreed),$page, $noOfRows);
        } else if ($pettrait == 'any'){
            $q = $this->db->get_where('tblanimal',array('petcolor'=>$petcolor,'petbreed'=>$petbreed),$page, $noOfRows);
        } 

    }

    public function insertAdoption($adopt){
        $this->db->insert('tbladopt',$adopt);
    }

    public function changePetStatus($pet_id,$petStatus){
        $this->db->where('petid', $pet_id);
        $this->db->update('tblanimal', $petStatus);
    }
    
    public function adoptedBy($pet_id, $user_id){
        $this->db->where('pet_id', $pet_id)->where('user_id', $user_id);
        $this->db->update('real_adopt', array('already_adopted' => $user_id));
    }
    
    public function notGranted($pet_id, $user_id){
        $this->db->where('pet_id', $pet_id)->where('user_id', $user_id)->where('already_adopted', 0);
        $this->db->update('real_adopt', array('status' => 'Not eligible', 'already_adopted' => $user_id));
    }
    
    public function getAdoption($id){
        $q = $this->db->get_where('real_adopt',array('user_id'=>$id));
        return $q->result();
    }

    public function getAcceptedAdoptions(){
        $this->db->from('real_adopt');
        $this->db->where('status', 'Adoption Accepted');
        $q = $this->db->get();
        return $q->result();
    }

    public function getPendingAdoptions()
    {
        $q = $this->db->get_where('real_adopt', array('already_adopted' => 0));
        return $q->result();
    }

    public function checkAdoption($id){
        $q = $this->db->get_where('tbladopt',array('adopt_id'=>$id));
        return $q->row();
    }

    public function canceladoption($id){
        $q = $this->db->delete('real_adopt',array('id'=>$id));
    }

    public function adopted($adoption_id,$status){
        $this->db->where('id', $adoption_id);
        $this->db->update('real_adopt', $status);
    }
}