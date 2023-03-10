<?php
class ControllerStartupSeoUrl extends Controller {
	public function index() {
		// Add rewrite to url class
		if ($this->config->get('config_seo_url')) {
			$this->url->addRewrite($this);
		}

		// Decode URL
		if (isset($this->request->get['_route_'])) {
			$parts = explode('/', $this->request->get['_route_']);

			// remove any empty arrays from trailing
			if (utf8_strlen(end($parts)) == 0) {
				array_pop($parts);
			}

			foreach ($parts as $part) {
				$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE keyword = '" . $this->db->escape($part) . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "'");

				if ($query->num_rows) {
					$url = explode('=', $query->row['query']);

					if ($url[0] == 'product_id') {
						$this->request->get['product_id'] = $url[1];
					}


 if($url[0] == 'simple_blog_article_id') { 
 $this->request->get['simple_blog_article_id'] = $url[1];
 }
 if($url[0] == 'simple_blog_author_id') {
 $this->request->get['simple_blog_author_id'] = $url[1];
 } 
 if ($url[0] == 'simple_blog_category_id') {
 $this->request->get['simple_blog_category_id'] = $url[1];
 } 
 
					if ($url[0] == 'category_id') {
						if (!isset($this->request->get['path'])) {
							$this->request->get['path'] = $url[1];
						} else {
							$this->request->get['path'] .= '_' . $url[1];
						}
					}

					if ($url[0] == 'manufacturer_id') {
						$this->request->get['manufacturer_id'] = $url[1];
					}

					if ($url[0] == 'information_id') {
						$this->request->get['information_id'] = $url[1];
					}

					
 if ($query->row['query'] && $url[0] != 'information_id' && $url[0] != 'manufacturer_id' && $url[0] != 'category_id' && $url[0] != 'product_id' && $url[0] != 'simple_blog_article_id' && $url[0] != 'simple_blog_category_id' && $url[0] != 'simple_blog_author_id') {
 
						$this->request->get['route'] = $query->row['query'];
					}
				} else {
					
 if (($this->config->has('simple_blog_seo_keyword')) && ($this->db->escape($part) == $this->config->get('simple_blog_seo_keyword'))) {
 
 } else if($this->db->escape($part) == 'simple-blog') {
 
 } else {
 $this->request->get['route'] = 'error/not_found';
 break;
 }
 ;

					break;
				}
			}

			if (!isset($this->request->get['route'])) {
				if (isset($this->request->get['product_id'])) {
					$this->request->get['route'] = 'product/product';
				} elseif (isset($this->request->get['path'])) {
					$this->request->get['route'] = 'product/category';
				} elseif (isset($this->request->get['manufacturer_id'])) {
					$this->request->get['route'] = 'product/manufacturer/info';
				} elseif (isset($this->request->get['information_id'])) {
					
 $this->request->get['route'] = 'information/information';
 } else if (isset($this->request->get['simple_blog_article_id'])) {
 $this->request->get['route'] = 'extension/simple_blog/article/view';
 } else if (isset($this->request->get['simple_blog_author_id'])) {
 $this->request->get['route'] = 'extension/simple_blog/author';
 } else if (isset($this->request->get['simple_blog_category_id'])) {
 $this->request->get['route'] = 'extension/simple_blog/category';
 } else {
 if(($this->config->has('simple_blog_seo_keyword'))) {
 if($this->request->get['_route_'] == $this->config->get('simple_blog_seo_keyword')) {
 $this->request->get['route'] = 'extension/simple_blog/article';
 }
 }else {
 $this->request->get['route'] = 'extension/simple_blog/article';
 }
 
				}
			}
		}
	}

	public function rewrite($link) {
		$url_info = parse_url(str_replace('&amp;', '&', $link));

		$url = '';

		$data = array();

		parse_str($url_info['query'], $data);

		foreach ($data as $key => $value) {
			if (isset($data['route'])) {
				if (($data['route'] == 'product/product' && $key == 'product_id') || (($data['route'] == 'product/manufacturer/info' || $data['route'] == 'product/product') && $key == 'manufacturer_id') || ($data['route'] == 'information/information' && $key == 'information_id')) {
					$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE `query` = '" . $this->db->escape($key . '=' . (int)$value) . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "' AND language_id = '" . (int)$this->config->get('config_language_id') . "'");

					if ($query->num_rows && $query->row['keyword']) {
						$url .= '/' . $query->row['keyword'];

						unset($data[$key]);
					}
				 
 } else if($data['route'] == 'extension/simple_blog/article/view' && $key == 'simple_blog_article_id') { 
 $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE `query` = '" . $this->db->escape($key . '=' . (int)$value) . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "' AND language_id = '" . (int)$this->config->get('config_language_id') . "'");
 
 if ($query->num_rows) {
 $url .= '/' . $query->row['keyword'];
 unset($data[$key]);
 }
 } else if($data['route'] == 'extension/simple_blog/author' && $key == 'simple_blog_author_id') {
 $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE `query` = '" . $this->db->escape($key . '=' . (int)$value) . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "' AND language_id = '" . (int)$this->config->get('config_language_id') . "'");
 
 if ($query->num_rows) {
 $url .= '/' . $query->row['keyword'];
 unset($data[$key]);
 }
 } else if($data['route'] == 'extension/simple_blog/category' && $key == 'simple_blog_category_id') { 
 $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE `query` = '" . $this->db->escape($key . '=' . (int)$value) . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "' AND language_id = '" . (int)$this->config->get('config_language_id') . "'");
 
 if ($query->num_rows) {
 $url .= '/' . $query->row['keyword'];
 unset($data[$key]);
 } 
 } else if($data['route'] == 'extension/simple_blog/search') {
 if(isset($key) && ($key == 'blog_search')) {
 $url .= '/search&blog_search=' . $value;
 } 
 } else if(isset($data['route']) && $data['route'] == 'extension/simple_blog/article' && $key != 'simple_blog_article_id' && $key != 'simple_blog_author_id' && $key != 'simple_blog_category_id' && $key != 'page') { 
 if($this->config->has('simple_blog_seo_keyword')) {
 $url .= '/' . $this->config->get('simple_blog_seo_keyword');
 }
 else {
 $url .= '/simple-blog';
 } 
 } elseif ($key == 'path') {
 
 
					$categories = explode('_', $value);

					foreach ($categories as $category) {
						$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE `query` = 'category_id=" . (int)$category . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "' AND language_id = '" . (int)$this->config->get('config_language_id') . "'");

						if ($query->num_rows && $query->row['keyword']) {
							$url .= '/' . $query->row['keyword'];
						} else {
							$url = '';

							break;
						}
					}

					unset($data[$key]);
				}
			}
		}

		if ($url) {
			unset($data['route']);

			$query = '';

			if ($data) {
				foreach ($data as $key => $value) {
					$query .= '&' . rawurlencode((string)$key) . '=' . rawurlencode((is_array($value) ? http_build_query($value) : (string)$value));
				}

				if ($query) {
					$query = '?' . str_replace('&', '&amp;', trim($query, '&'));
				}
			}

			return $url_info['scheme'] . '://' . $url_info['host'] . (isset($url_info['port']) ? ':' . $url_info['port'] : '') . str_replace('/index.php', '', $url_info['path']) . $url . $query;
		} else {
			return $link;
		}
	}
}
