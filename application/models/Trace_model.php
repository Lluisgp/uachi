<?php

class Trace_model extends CI_model {

    /**
     * Trace visualization info on bdd
     * @param type $media_id
     * @param type $user_id
     */
    public function trace_media($media_id, $user_id) {
        $pujat = date("Y-m-d H:i:s");
        $trace = array(
            'media_id' => $media_id,
            'user_id' => $user_id,
            'trace_date' => $pujat
        );
        $this->db->insert('trace', $trace);
    }

}
