<?php
class Media_model extends CI_model{



public function register_media($media){


$this->db->insert('media', $media);

}
public function detail_media($media_id){
    
    $this->db->select('*');
    $this->db->from('media');
    $this->db->where('id',$media_id);    
  
    if($query=$this->db->get())
    {
        return $query->row_array();
    }
    else{
      return false;
    }
  
  
  }

  public function search_media($media){
    
    $this->db->select('*');
    $this->db->from('media');    
    $this->db->where('media_address',$media['media_address']); 
    $this->db->or_where('media_title_en',$media['media_title_en']); 
    $this->db->or_where('media_title_es',$media['media_title_es']); 
    $this->db->or_where('media_title_ca',$media['media_title_ca']); 

    $tags = explode(" ", $this->input->post('media_tags'));     
          
          foreach ($tags as $valor) {
            $this->db->or_like('media_tags',$valor);                             
        }  
        
    if($query=$this->db->get())
    {
        return $query->row_array();
    }
    else{
      return false;
    }
    
  }

  public function search_word_media($word){
    
    $this->db->select('*');
    $this->db->from('media');         
    $this->db->or_like('media_title_en',$word); 
    $this->db->or_like('media_title_es',$word); 
    $this->db->or_like('media_title_ca',$word); 
    $this->db->or_like('media_tags',$word); 
        
    if($query=$this->db->get())
    {
      log_message("error", "search_word_media_con_resultados");
        return $query->row_array();
    }
    else{
      log_message("error", "search_word_media_sin_resultados ");
      return false;
    }    
  }

  public function search_last_media(){

    $query ="select * from media order by media_date ASC limit 10";
    
         $res = $this->db->query($query);
    
         if($res->num_rows() > 0) {
          log_message("error", "last media > 0");      
          return $res->result("array");                
        }
        log_message("error", "last media ");
        return array();
        }

  public function list_media(){
    
    $this->db->select('*');
    $this->db->from('media');    
  
    if($query=$this->db->get())
    {
        return $query->row_array();
    }
    else{
      return false;
    }  
  }

  //old
  // public function tag_check($tag){
    
  //   log_message("error", "tagcheck".$tag);
  //     $this->db->select('tags_id');
  //     $this->db->from('tags');
  //     $this->db->where('tags_value',$tag);
  //     $query=$this->db->get();
    
  //     if($query->num_rows()>0){        
  //       //return false;
  //       return $query;
  //     }else{
  //       //return true;
  //       $array_tag=array(
  //         'tags_value'=>$tag);
  //       return $this->db->insert('tags', $array_tag);
        
  //     }    
  //   }
}
?>
