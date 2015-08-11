<?php
class Hasan_TrackOrders_Model_Resource_Trackorders extends Mage_Core_Model_Resource_Db_Abstract{
    protected function _construct()
    {
        $this->_init('hasan_trackorders/trackorders', 'track_id');
    }
}