<?php

header("Content-type: text/xml");

        $this->db->select('*');
        $this->db->from('group_order');
        $this->db->join('group_order_conn', 'group_order_conn.group_order_id = group_order.group_order_id');
        $this->db->join('order', 'order.order_id = group_order_conn.order_id');
        $this->db->join('users', 'users.user_id = group_order.rider_id');
        $this->db->where('order.vendor_id',$user_id);
        $this->db->group_by('group_order.group_order_id');
        $this->db->where('order.order_status_id !=',4);
        $rows = $this->db->get()->result();

        $dom = new DOMDocument("1.0");
        $node = $dom->createElement("markers");
        $parnode = $dom->appendChild($node);

        foreach ($rows as $row) {

            // Add to XML document node
            $node = $dom->createElement("marker");
            $newnode = $parnode->appendChild($node);

            $newnode->setAttribute("id",$row->user_id);
            $newnode->setAttribute("lat", $row->latitude);
            $newnode->setAttribute("lng", $row->longitude);
        }

        echo $dom->saveXML();
   
?>