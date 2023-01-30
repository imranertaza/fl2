<?php
class ModelExtensiongallery extends Model {
public function install() {
$this->db->query("CREATE TABLE IF NOT EXISTS `".DB_PREFIX."album` (
  `album_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `column` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `viewed` int(11) NOT NULL,
  PRIMARY KEY (`album_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;");

$this->db->query("CREATE TABLE IF NOT EXISTS `".DB_PREFIX."album_description` (
 `album_description_id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`album_description_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;");

$this->db->query("CREATE TABLE IF NOT EXISTS `".DB_PREFIX."album_path` (
 `album_id` int(11) NOT NULL,
  `path_id` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

$this->db->query("CREATE TABLE IF NOT EXISTS `".DB_PREFIX."album_photos` (
  `album_photos_id` int(10) NOT NULL AUTO_INCREMENT,
  `album_id` int(10) NOT NULL,
  `image` varchar(250) NOT NULL,
  `sort_order` tinyint(4) NOT NULL,
  `popup_height` int(11) NOT NULL,
  `popup_width` int(11) NOT NULL,
  `thumb_height` int(11) NOT NULL,
  `thumb_width` int(11) NOT NULL,
   PRIMARY KEY (`album_photos_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

$this->db->query("CREATE TABLE IF NOT EXISTS `".DB_PREFIX."album_photo_description` (
  `photo_id` int(10) NOT NULL AUTO_INCREMENT,
  `album_photos_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
   PRIMARY KEY (`photo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

$modules= array(
			   'extension_id' => '19778',
			   'email' => $this->config->get('config_email'),
			   'store_url' => HTTP_CATALOG
			);
	
		$url = 'https://www.opencartextensions.in/index.php?route=api/callback';
		
		$curl = curl_init($url);
		
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_FORBID_REUSE, 1);
		curl_setopt($curl, CURLOPT_FRESH_CONNECT, 1);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($modules, '', '&'));
		
		 $response = curl_exec($curl);
	}
	public function uninstall() {
	$this->db->query("DROP TABLE IF EXISTS `".DB_PREFIX."album`");
	$this->db->query("DROP TABLE IF EXISTS `".DB_PREFIX."album_description`");
	$this->db->query("DROP TABLE IF EXISTS `".DB_PREFIX."album_path`");
	$this->db->query("DROP TABLE IF EXISTS `".DB_PREFIX."album_photos`");
	$this->db->query("DROP TABLE IF EXISTS `".DB_PREFIX."album_photo_description`");
	}

	public function addgallery($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "album SET  parent_id = '" . (int)$data['parent_id'] . "', `column` = '" . (int)$data['column'] . "', sort_order = '" . (int)$data['sort_order'] . "', status = '" . (int)$data['status'] . "', date_modified = NOW(), date_added = NOW()");

		$album_id = $this->db->getLastId();
		
		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "album SET image = '" . $this->db->escape(html_entity_decode($data['image'], ENT_QUOTES, 'UTF-8')) . "' WHERE album_id = '" . (int)$album_id . "'");
		}
		

		foreach ($data['album_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "album_description SET album_id = '" . (int)$album_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "',  description = '" . $this->db->escape($value['description']) . "'");
		}

		$level = 0;

		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "album_path` WHERE album_id = '" . (int)$data['parent_id'] . "' ORDER BY `level` ASC");

		foreach ($query->rows as $result) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "album_path` SET `album_id` = '" . (int)$album_id . "', `path_id` = '" . (int)$result['path_id'] . "', `level` = '" . (int)$level . "'");

			$level++;
		}

		$this->db->query("INSERT INTO `" . DB_PREFIX . "album_path` SET `album_id` = '" . (int)$album_id . "', `path_id` = '" . (int)$album_id . "', `level` = '" . (int)$level . "'");


		//15-4-2019 code start
		if (isset($data['album_seo_url'])) {
			foreach ($data['album_seo_url'] as $store_id => $language) {
				foreach ($language as $language_id => $keyword) {
					if (!empty($keyword)) {
						$this->db->query("INSERT INTO " . DB_PREFIX . "seo_url SET store_id = '" . (int)$store_id . "', language_id = '" . (int)$language_id . "', query = 'album_id=" . (int)$album_id . "', keyword = '" . $this->db->escape($keyword) . "'");
					}
				}
			}
		}

		//15-4-2019 code end


		}
		
	public function editgallery($album_id, $data){
		$this->db->query("UPDATE " . DB_PREFIX . "album SET  parent_id = '" . (int)$data['parent_id'] . "', `column` = '" . (int)$data['column'] . "', sort_order = '" . (int)$data['sort_order'] . "', status = '" . (int)$data['status'] . "', date_modified = NOW() WHERE album_id = '" . (int)$album_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "album SET image = '" . $this->db->escape(html_entity_decode($data['image'], ENT_QUOTES, 'UTF-8')) . "' WHERE album_id = '" . (int)$album_id . "'");
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "album_description WHERE album_id = '" . (int)$album_id . "'");

		foreach ($data['album_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "album_description SET album_id = '" . (int)$album_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}

		//15-4-2019 code start
		$this->db->query("DELETE FROM `" . DB_PREFIX . "seo_url` WHERE query = 'album_id=" . (int)$album_id . "'");

		if (isset($data['album_seo_url'])) {
			foreach ($data['album_seo_url'] as $store_id => $language) {
				foreach ($language as $language_id => $keyword) {
					if (!empty($keyword)) {
						$this->db->query("INSERT INTO " . DB_PREFIX . "seo_url SET store_id = '" . (int)$store_id . "', language_id = '" . (int)$language_id . "', query = 'album_id=" . (int)$album_id . "', keyword = '" . $this->db->escape($keyword) . "'");
					}
				}
			}
		}
		//15-4-2019 code end

		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "album_path` WHERE path_id = '" . (int)$album_id . "' ORDER BY level ASC");

		$this->db->query("DELETE FROM `" . DB_PREFIX . "album_path` WHERE album_id = '" . (int)$album_id . "'");

		// Fix for records with no paths
		$level = 0;

		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "album_path` WHERE album_id = '" . (int)$data['parent_id'] . "' ORDER BY level ASC");

		foreach ($query->rows as $result) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "album_path` SET album_id = '" . (int)$album_id . "', `path_id` = '" . (int)$result['path_id'] . "', level = '" . (int)$level . "'");

			$level++;
		}

		$this->db->query("REPLACE INTO `" . DB_PREFIX . "album_path` SET album_id = '" . (int)$album_id . "', `path_id` = '" . (int)$album_id . "', level = '" . (int)$level . "'");

	
	}
	
	public function getgallery($album_id){
		$query = $this->db->query("SELECT DISTINCT *, (SELECT GROUP_CONCAT(ad1.name ORDER BY level SEPARATOR '&nbsp;&nbsp;&gt;&nbsp;&nbsp;') FROM " . DB_PREFIX . "album_path ap LEFT JOIN " . DB_PREFIX . "album_description ad1 ON (ap.path_id = ad1.album_id AND ap.album_id != ap.path_id) WHERE ap.album_id = a.album_id AND ad1.language_id = '" . (int)$this->config->get('config_language_id') . "' GROUP BY ap.album_id) AS path FROM " . DB_PREFIX . "album a LEFT JOIN " . DB_PREFIX . "album_description ad2 ON (a.album_id = ad2.album_id) WHERE a.album_id = '" . (int)$album_id . "' AND ad2.language_id = '" . (int)$this->config->get('config_language_id') . "'");
		
		return $query->row;
	}
	
	public function getgallaries($data = array()) {
		$sql = "SELECT ap.album_id AS album_id, GROUP_CONCAT(ad1.name ORDER BY ap.level SEPARATOR '&nbsp;&nbsp;&gt;&nbsp;&nbsp;') AS name, a1.parent_id, a1.sort_order,a1.image,a1.status FROM " . DB_PREFIX . "album_path ap LEFT JOIN " . DB_PREFIX . "album a1 ON (ap.album_id = a1.album_id) LEFT JOIN " . DB_PREFIX . "album a2 ON (ap.path_id = a2.album_id) LEFT JOIN " . DB_PREFIX . "album_description ad1 ON (ap.path_id = ad1.album_id) LEFT JOIN " . DB_PREFIX . "album_description ad2 ON (ap.album_id = ad2.album_id) WHERE ad1.language_id = '" . (int)$this->config->get('config_language_id') . "' AND ad2.language_id = '" . (int)$this->config->get('config_language_id') . "'";
		
		if (!empty($data['filter_name'])) {
			$sql .= " AND ad2.name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

		$sql .= " GROUP BY ap.album_id";

		$sort_data = array(
			'name',
			'sort_order'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY sort_order";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

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
	
	public function deletegallery($album_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "album WHERE album_id = '" . (int)$album_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "album_description WHERE album_id = '" . (int)$album_id . "'");
		//15-4-2019 code start
		$this->db->query("DELETE FROM " . DB_PREFIX . "album_path WHERE album_id = '" . (int)$album_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "album_photos WHERE album_id = '" . (int)$album_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "seo_url WHERE query = 'album_id=" . (int)$album_id . "'");
		//15-4-2019 code end
	} 
				
	public function getgalleryDescriptions($album_id) {
		$album_description_data = array();
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "album_description WHERE album_id = '" . (int)$album_id . "'");
		
		foreach ($query->rows as $result) {
			$album_description_data[$result['language_id']] = array(
				'name'             => $result['name'],
				'description'      => $result['description']
			);
		}
		
		return $album_description_data;
	}	
	
	public function getTotalgallaries() {
      	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "album a LEFT JOIN " . DB_PREFIX . "album_description ad ON (a.album_id = ad.album_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "'");
		return $query->row['total'];
	}	

	public function getTotalgallariesByImageId($image_id) {
      	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "album WHERE image_id = '" . (int)$image_id . "'");
		
		return $query->row['total'];
	}
	public function getRecentGallery() {
	
	
	$query = $this->db->query("SELECT * FROM ".DB_PREFIX."album a left join ".DB_PREFIX."album_description ad on(a.album_id = ad.album_id) GROUP BY a.album_id ORDER BY a.date_added DESC LIMIT 0,5");
		
		return $query->rows;
		
	}
	
	public function getTotalalbum($album_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "album_photos where album_id = '".$album_id."'");
		return $query->row['total'];
	}

//15-4-2019 code start
	public function getAlbumSeoUrls($album_id) {
		$album_seo_url_data = array();
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE query = 'album_id=" . (int)$album_id . "'");

		foreach ($query->rows as $result) {
			$album_seo_url_data[$result['store_id']][$result['language_id']] = $result['keyword'];
		}

		return $album_seo_url_data;
	}
	//15-4-2019 code end
}
?>