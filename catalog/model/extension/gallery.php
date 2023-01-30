<?php
class ModelExtensionGallery extends Model{
	public function getgallerys($data = array()){
		$sql = "SELECT * FROM " . DB_PREFIX . "album a LEFT JOIN " . DB_PREFIX . "album_description ad ON(a.album_id = ad.album_id) WHERE ad.language_id = '" .(int)$this->config->get('config_language_id')."' AND a.status=1";

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}
		
		$query = $this->db->query($sql);
		return $query->rows;
	}
	
	public function getgalleres($album_id){
		$sql = "SELECT * FROM " . DB_PREFIX . "album a LEFT JOIN " . DB_PREFIX . "album_description ad ON(a.album_id = ad.album_id) WHERE a.album_id = '" . (int)$album_id . "' AND ad.language_id = ".(int)$this->config->get('config_language_id')." AND a.status=1";	
		$query = $this->db->query($sql);
	
		return $query->row;
	}
	
	public function getgallery($album_id){
		$sql = "SELECT * FROM " . DB_PREFIX . "album a LEFT JOIN " . DB_PREFIX . "album_description ad ON(a.album_id = ad.album_id) WHERE a.album_id = '" . (int)$album_id . "' AND ad.language_id = ".(int)$this->config->get('config_language_id')." AND a.status=1";	
		$query = $this->db->query($sql);
	
		return $query->rows;
	}
	
	public function getphotos($data = array()){
		 $sql = "SELECT * FROM " . DB_PREFIX . "album_photos ap LEFT JOIN " . DB_PREFIX . "album_photo_description apd ON(ap.album_photos_id = apd.album_photos_id) WHERE ap.album_id = '".(int)$data['album_id']."'  AND apd.language_id = '".(int)$this->config->get('config_language_id')."' ORDER BY ap.sort_order";
		
		if(isset($data['start']) || isset($data['limit'])){
				if ($data['start'] < 0) {
					$data['start'] = 0;
				}				

				if ($data['limit'] < 1) {
					$data['limit'] = 20;
				}	
			 
				$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}
			
		$query = $this->db->query($sql);
			
		return $query->rows;
	}

	public function getPTS($data,$album_id){
		 $sql = "SELECT * FROM " . DB_PREFIX . "album_photos ap LEFT JOIN " . DB_PREFIX . "album_photo_description apd ON(ap.album_photos_id = apd.album_photos_id) WHERE ap.album_id = '".(int)$album_id."'  AND apd.language_id = '".(int)$this->config->get('config_language_id')."' ORDER BY ap.sort_order";
		
			if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$query = $this->db->query($sql);
			
		return $query->rows;
	}
	
	public function countImage($album_id){
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "album_photos WHERE album_id = '".(int)$album_id."'");
		return $query->row['total'];
	}
	
	public function getMainImage($album_photos_id){
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "album_photos WHERE album_photos_id = '". (int)$album_photos_id ."' ORDER BY sort_order ASC LIMIT 0,1");
		return $query->row;
	}
	
	public function countalbumView($album_id) {
		 $this->db->query("UPDATE " . DB_PREFIX . "album SET viewed = (viewed + 1) WHERE album_id = '" . (int)$album_id . "'");
	}

	public function getTmdCategories($parent_id = 0) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "album a LEFT JOIN " . DB_PREFIX . "album_description ad ON (a.album_id = ad.album_id) WHERE a.parent_id = '" . (int)$parent_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "'");
		
		return $query->rows;
	}

}
?>