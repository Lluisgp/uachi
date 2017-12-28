<?php

class Media_model extends CI_model {

    public function register_media($media) {
        $this->db->insert('media', $media);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function modify_media($media) {
        $this->db->where('media_id', $media['media_id']);
        $this->db->update('media', $media);
        $update_id = $media['media_id'];
        return $update_id;
    }

    public function detail_media($media_id) {

        $this->db->select('*');
        $this->db->from('media');
        $this->db->join('thumbnails', 'media.media_id = thumbnails.id', 'left');
        $this->db->join('video', 'media.media_id = video.id', 'left');
        $this->db->where('media_id', $media_id);

        if ($query = $this->db->get()) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function search_media($media) {
        $this->db->select('*');
        $this->db->from('media');
        $this->db->join('thumbnails', 'media.media_id = thumbnails.id', 'left');
        if (strlen($media['media_title']) > 0) {
            $this->db->or_where('media_title', $media['media_title']);
        }
        if (strlen($media['media_tags']) > 0) {
            $this->db->or_like('media_tags', $media['media_tags']);
        }
        if (strlen($media['media_description']) > 0) {
            $this->db->or_like('media_description', $media['media_description']);
        }

        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            log_message("error", "search_media > 0");
            return $res->result("array");
        }
        log_message("error", "search_media 0 ");
        return array();
    }

    public function search_word_media($word) {
        $this->db->select('*');
        $this->db->from('media');
        $this->db->join('thumbnails', 'media.media_id = thumbnails.id', 'left');
        $this->db->or_like('media_title', $word);
        $this->db->or_like('media_tags', $word);

        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            log_message("error", "search_word_media_ > 0");
            return $res->result("array");
        }
        log_message("error", "search_word_media 0 ");
        return array();
    }

    public function search_last_media() {

        $query = "select * from media left join thumbnails on media.media_id=thumbnails.id order by media_date DESC limit 10";

        $res = $this->db->query($query);

        if ($res->num_rows() > 0) {
            log_message("error", "last media > 0");
            return $res->result("array");
        }
        log_message("error", "last media ");
        return array();
    }

    public function list_media() {

        $this->db->select('*');
        $this->db->from('media');

        if ($query = $this->db->get()) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function upload_image($id, $imgdata) {
        //$imgdata = file_get_contents($imgdata['full_path']);//get the content of the image using its path          
        $data['id'] = $id;
        $data['thumbnail'] = $imgdata;
        $this->db->insert('thumbnails', $data);
    }

    public function update_image($id, $imgdata) {
        $this->db->select('*');
        $this->db->from('thumbnails');
        $this->db->where('id', $id);

        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            $this->db->where('id', $id);
            $data['thumbnail'] = $imgdata;
            $this->db->update('thumbnails', $data);
        } else {
            $this->upload_image($id, $imgdata);
        }
    }

    public function upload_video($id, $imgdata) {
        $data['id'] = $id;
        $data['videodata'] = $imgdata;
        $this->db->insert('video', $data);
    }

    public function update_video($id, $imgdata) {
        $this->db->select('*');
        $this->db->from('video');
        $this->db->where('id', $id);

        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            $this->db->where('id', $id);
            $data['videodata'] = $imgdata;
            $this->db->update('video', $data);
        } else {
            $this->upload_video($id, $imgdata);
        }
    }

    public function delete_media($id) {
        $this->db->where('media_id', $id);
        $this->db->delete('media');
        $result = $this->db->affected_rows();
        $this->delete_video($id);
        $this->delete_thumbnails($id);
        return $result;
    }

    public function delete_video($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete('video');
        return $result;
    }

    public function delete_thumbnails($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete('thumbnails');
        return $result;
    }

}
