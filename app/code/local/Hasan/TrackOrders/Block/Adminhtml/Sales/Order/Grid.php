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
        $collection =  Mage::getResourceModel('sales/order_collection')
            ->addExpressionFieldToSelect(
                'fullname',
                'CONCAT({{customer_firstname}}, \' \', {{customer_lastname}})',
                array('customer_firstname' => 'main_table.customer_firstname', 'customer_lastname' => 'main_table.customer_lastname'));

 
        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }
 
    protected function _prepareColumns()
    {
        $helper = Mage::helper('hasan_trackorders');
 
        $this->addColumn('increment_id', array(
            'header' => $helper->__('Order #'),
            'index'  => 'increment_id'
        ));
 
        $this->addColumn('purchased_on', array(
            'header' => $helper->__('Created at'),
            'type'   => 'datetime_stamp',
            'index'  => 'created_at'
        ));
 
        $this->addColumn('order_status', array(
            'header'  => $helper->__('Order Status'),
            'index'   => 'status',
            'type'    => 'options',
            'options' => Mage::getSingleton('sales/order_config')->getStatuses()
        ));

       $this->addColumn('created_by', array(
            'header'       => $helper->__('Username'),
            'index'        => 'fullname',
            'filter_index' => 'CONCAT(customer_firstname, \' \', customer_lastname)'
        ));
 
 
        return parent::_prepareColumns();
    }
 
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}