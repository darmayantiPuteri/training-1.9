
<?php
class Hasan_TrackOrders_Block_Adminhtml_Sales_Order_Grid_Renderer_Username extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $user_id=  $row->getData($this->getColumn()->getIndex());
		$user_name = Mage::getModel('admin/user')->load($user_id)->getName();
        return $user_name;
    }
}