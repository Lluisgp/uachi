<?php
class Media_model extends CI_model
{
    public function register_media($media)
    {
        $this->db->insert('media', $media);
    }
    public function detail_media($media_id)
    {
    
        $this->db->select('*');
        $this->db->from('media');
        $this->db->where('id', $media_id);
  
        if ($query=$this->db->get()) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function search_media($media)
    {
    
        log_message("error", "search_media form:".$media['media_title_en']);
        $this->db->select('*');
        $this->db->from('media');
        if (strlen($media['media_address'])>0) {
            $this->db->or_where('media_address', $media['media_address']);
        }
        if (strlen($media['media_title_en'])>0) {
            $this->db->or_where('media_title_en', $media['media_title_en']);
        }
        if (strlen($media['media_title_es'])>0) {
            $this->db->or_where('media_title_es', $media['media_title_es']);
        }
        if (strlen($media['media_title_ca'])>0) {
            $this->db->or_where('media_title_ca', $media['media_title_ca']);
        }
        if (strlen($media['media_tags'])>0) {
            $this->db->or_like('media_tags', $media['media_tags']);
        }
        if (strlen($media['media_description_en'])>0) {
            $this->db->or_like('media_description_en', $media['media_description_en']);
        }
        if (strlen($media['media_description_es'])>0) {
            $this->db->or_like('media_description_es', $media['media_description_es']);
        }
        if (strlen($media['media_description_ca'])>0) {
            $this->db->or_like('media_description_ca', $media['media_description_ca']);
        }
 
        $res = $this->db->get();
     
        if ($res->num_rows() > 0) {
            log_message("error", "search_media > 0");
            return $res->result("array");
        }
        log_message("error", "search_media 0 ");
        return array();
    }

    public function search_word_media($word)
    {    
        $this->db->select('*');
        $this->db->from('media');
        $this->db->or_like('media_title_en', $word);
        $this->db->or_like('media_title_es', $word);
        $this->db->or_like('media_title_ca', $word);
        $this->db->or_like('media_tags', $word);
        
        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            log_message("error", "search_word_media_ > 0");
            return $res->result("array");
        }
        log_message("error", "search_word_media 0 ");
        return array();
    }

    public function search_last_media()
    {

        $query ="select * from media order by media_date DESC limit 10";
    
         $res = $this->db->query($query);
    
        if ($res->num_rows() > 0) {
            log_message("error", "last media > 0");
            return $res->result("array");
        }
        log_message("error", "last media ");
        return array();
    }

    public function list_media()
    {
    
        $this->db->select('*');
        $this->db->from('media');
  
        if ($query=$this->db->get()) {
            return $query->row_array();
        } else {
            return false;
        }
    }
}
