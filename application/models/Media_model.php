<?php

class Media_model extends CI_model {

    /**
     * Insert a media on bdd
     * @param type $media
     * @return type
     */
    public function register_media($media) {
        $this->db->insert('media', $media);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    /**
     * Modify a media record
     * @param type $media
     * @return type
     */
    public function modify_media($media) {
        $this->db->where('media_id', $media['media_id']);
        $this->db->update('media', $media);
        $update_id = $media['media_id'];
        return $update_id;
    }

    /**
     * From one id return a media record with thumbnail
     * @param type $media_id
     * @return boolean
     */
    public function detail_media($media_id) {

        $this->db->select('*');
        $this->db->from('media');
        $this->db->join('thumbnails', 'media.media_id = thumbnails.id', 'left');
        $this->db->where('media_id', $media_id);

        if ($query = $this->db->get()) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    /**
     * Return media records and thumbnails with a media coincidence on title, tags or description
     * @param type $media
     * @return type
     */
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
            log_message("debug", "Media_model>search_media > 0");
            return $res->result("array");
        }
        log_message("debug", "Media_model>search_media 0 ");
        return array();
    }

    /**
     * Return media records and thumbnails with a word coincidence on title or tags
     * @param type $word
     * @return type
     */
    public function search_word_media($word) {
        $this->db->select('*');
        $this->db->from('media');
        $this->db->join('thumbnails', 'media.media_id = thumbnails.id', 'left');
        $this->db->or_like('media_title', $word);
        $this->db->or_like('media_tags', $word);

        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            log_message("debug", "Media_model>search_word_media > 0");
            return $res->result("array");
        }
        log_message("debug", "Media_model>search_word_media 0 ");
        return array();
    }

    /**
     * Show the last 10 media records with thumbnail
     * @return type
     */
    public function search_last_media() {

        $query = "select * from media left join thumbnails on media.media_id=thumbnails.id order by media_date DESC limit 10";

        $res = $this->db->query($query);

        if ($res->num_rows() > 0) {
            log_message("debug", "Media_model>search_last_media > 0");
            return $res->result("array");
        }
        log_message("debug", "Media_model>search_last_media 0 ");
        return array();
    }

    /**
     * List all media 
     * @return boolean
     */
    public function list_media() {

        $this->db->select('*');
        $this->db->from('media');

        if ($query = $this->db->get()) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    /**
     * Upload thumbnail image for a media
     * @param type $id
     * @param type $imgdata
     */
    public function upload_image($id, $imgdata) {
        $data['id'] = $id;
        $data['thumbnail'] = $imgdata;
        $this->db->insert('thumbnails', $data);
    }

    /**
     * Update thumbnail image from a media
     * @param type $id
     * @param type $imgdata
     */
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

    /**
     * Delete media resource
     * @param type $id
     * @return type
     */
    public function delete_media($id) {
        $this->db->where('media_id', $id);
        $this->db->delete('media');
        $result = $this->db->affected_rows();
        $this->delete_thumbnails($id);
        return $result;
    }

    /**
     * Delete thumbnails image
     * @param type $id
     * @return type
     */
    public function delete_thumbnails($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete('thumbnails');
        return $result;
    }

}
