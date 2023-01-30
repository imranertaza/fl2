<?php
class ModelExtensionModuleUnusedImage extends Model {

	public function install() {
		$sql  = "CREATE TABLE `".DB_PREFIX."module_unused_image` (";
		$sql .= "  `unused_image_id` int(11) NOT NULL,";
		$sql .= "  `file` varchar(512) NOT NULL";
		$sql .= ") ENGINE=MyISAM DEFAULT CHARSET=utf8;";
		$this->db->query( $sql );

		$sql  = "ALTER TABLE `".DB_PREFIX."module_unused_image`";
		$sql .= "  ADD PRIMARY KEY (`unused_image_id`);";
		$this->db->query( $sql );

		$sql  = "ALTER TABLE `".DB_PREFIX."module_unused_image`";
		$sql .= "  MODIFY `unused_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";
		$this->db->query( $sql );
	}


	public function uninstall() {
		$sql = "DROP TABLE IF EXISTS `".DB_PREFIX."module_unused_image`";
		$this->db->query( $sql );
	}
}
?>