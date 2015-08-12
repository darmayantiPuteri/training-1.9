<?php
class Hasan_TrackOrders_Model_Observer
{
   public function trackLog(Varien_Event_Observer $observer)
    {


    	$status 	= $observer->getEvent()->getOrder()->getStatus();
    	$order_id 	= $observer->getEvent()->getOrder()->getData('increment_id');
    	$adminId	= Mage::getSingleton('admin/session')->getUser()->getId();

    	$Nth = Mage::getModel('hasan_trackorders/trackorders');
        $Nth->setOrder_id($order_id);
        $Nth->setCreated_at(now());
        $Nth->setOrder_status($status);
        $Nth->setCreated_by($adminId);
        $Nth->save();

    }
}