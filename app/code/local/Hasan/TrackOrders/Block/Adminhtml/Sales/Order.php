<?php
 
class Hasan_TrackOrders_Block_Adminhtml_Sales_Order extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'hasan_trackorders';
        $this->_controller = 'adminhtml_sales_order';
        $this->_headerText = Mage::helper('hasan_trackorders')->__('Track Orders');
 
        parent::__construct();
        $this->_removeButton('add');
    }
}