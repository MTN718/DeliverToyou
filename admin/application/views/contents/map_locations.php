<?php

header("Content-type: text/xml");

        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('group_order', 'group_order.rider_id = users.user_id','left');
        if(!empty($status) && $status != "all") {
            $this->db->where('users.status',$status);
        }
            $this->db->where('users.user_type','rider');
        $rows = $this->db->get()->result();

        $dom = new DOMDocument("1.0");
        $node = $dom->createElement("markers");
        $parnode = $dom->appendChild($node);

        foreach ($rows as $row) {

            // Add to XML document node
            $node = $dom->createElement("marker");
            $newnode = $parnode->appendChild($node);

            $newnode->setAttribute("id",$row->user_id);
            $newnode->setAttribute("status",$row->status);
            $newnode->setAttribute("lat", $row->latitude);
            $newnode->setAttribute("lng", $row->longitude);
        }

        echo $dom->saveXML();
   
?>