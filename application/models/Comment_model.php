<?php

class Comment_model extends CI_Model {

    // get full tree comments based on news id
    function tree_all($ne_id) {
        $result = $this->db->query("SELECT * FROM comment where ne_id = $ne_id")->result_array();
        if ($result) {
            foreach ($result as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return array();
        }
    }

    // to get child comments by entry id and parent id and news id
    function tree_by_parent($ne_id, $in_parent) {
        $result = $this->db->query("SELECT * FROM comment where parent_id = $in_parent AND  ne_id = $ne_id")->result_array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
    }

    // to insert comments
    function add_new_comment($comment) {
        $this->db->insert('comment', $comment);
        return $comment['parent_id'];
    }

}

/* End of file comment_model.php */