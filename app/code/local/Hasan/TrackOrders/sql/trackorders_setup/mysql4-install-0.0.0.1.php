<?php
$installer=$this;
$installer->startSetup();
$installer->run("
-- DROP TABLE IF EXISTS {$this->getTable('trackorders')};
CREATE TABLE {$this->getTable('trackorders')} (
 `track_id` int(11) unsigned NOT NULL auto_increment,
 `order_id` varchar(11) NOT NULL ,
 `created_at` datetime NOT NULL,
 `order_status` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  PRIMARY KEY (`track_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 "); 
$installer->endSetup(); 
?>