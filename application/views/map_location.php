<?php

header("Content-type: text/xml");

        $this->db->select('*');
        $this->db->from('order_location');
        $this->db->join('order', 'order.order_id = order_location.order_id');
        $this->db->where('order.vendor_id',$user_id);
        $this->db->where('order.order_status_id !=',5);
        $rows = $this->db->get()->result();

        $dom = new DOMDocument("1.0");
        $node = $dom->createElement("markers");
        $parnode = $dom->appendChild($node);

        foreach ($rows as $row) {

            // Add to XML document node
            $node = $dom->createElement("marker");
            $newnode = $parnode->appendChild($node);

            $newnode->setAttribute("id",$row->order_location_id);
            $newnode->setAttribute("lat", $row->latitude);
            $newnode->setAttribute("lng", $row->longitude);
        }

        echo $dom->saveXML();
   
?>