<?php
 
class Hasan_TrackOrders_Block_Adminhtml_Sales_Order_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('hasan_order_grid');
        $this->setDefaultSort('purchased_on');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }
 
    protected function _prepareCollection()
    {
        $collection =  Mage::getModel('hasan_trackorders/trackorders')->getCollection();
 
        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }
 
    protected function _prepareColumns()
    {
        $helper = Mage::helper('hasan_trackorders');
 
        $this->addColumn('increment_id', array(
            'header' => $helper->__('Order #'),
            'index'  => 'order_id'
        ));
 
        $this->addColumn('purchased_on', array(
            'header' => $helper->__('Created at'),
            'type'   => 'datetime_stamp',
            'index'  => 'created_at'
        ));
 
        $this->addColumn('order_status', array(
            'header'  => $helper->__('Order Status'),
            'index'   => 'order_status',
            'type'    => 'options',
            'options' => Mage::getSingleton('sales/order_config')->getStatuses()
        ));

       $this->addColumn('created_by', array(
            'header'       => $helper->__('Username'),
            'index'   => 'created_by',
            'renderer' => 'Hasan_TrackOrders_Block_Adminhtml_Sales_Order_Grid_Renderer_Username',
        ));
 
 
        return parent::_prepareColumns();
    }
 
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}