<?php
class Hasan_TrackOrders_Model_Observer
{
   public function trackLog(Varien_Event_Observer $observer)
    {


    	$status 	= $observer->getEvent()->getOrder()->getStatus();
    	$order_id 	= $observer->getEvent()->getOrder()->getData('increment_id');
    	$adminId	= Mage::getSingleton('admin/session')->getUser()->getId();

    }
}