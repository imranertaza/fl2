<?php
class ControllerExtensionAddphotos extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/addphotos');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('extension/addphotos');

		$this->getList();
	}

	public function add() {
		$this->load->language('extension/addphotos');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('extension/addphotos');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {

			///print_r($this->request->post);die();
			$this->model_extension_addphotos->addaddphotos($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('extension/addphotos', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	public function edit() {
		$this->load->language('extension/addphotos');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('extension/addphotos');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_extension_addphotos->editaddphotos($this->request->get['album_photos_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('extension/addphotos', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('extension/addphotos');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('extension/addphotos');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $album_photos_id) {
				$this->model_extension_addphotos->DeleteAddPhotos($album_photos_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('extension/addphotos', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getList();
	}

	protected function getList() {
		$this->load->model('tool/image');
		
		if (isset($this->request->get['filter_albumname'])) {
			$filter_albumname = $this->request->get['filter_albumname'];
		} else {
			$filter_albumname = null;
		}
		
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
		}
		
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'title';
		}
		
		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}
		
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}
		

		$url = '';
		
		if (isset($this->request->get['filter_albumname'])) {
			$url .= '&filter_albumname=' . $this->request->get['filter_albumname'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		
		$data['user_token'] = $this->session->data['user_token'];

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/addphotos', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);
		$data['dashmenu'] = $this->load->controller('extension/dashmenu');
		$data['insert'] = $this->url->link('extension/addphotos/add', 'user_token=' . $this->session->data['user_token'] . $url, true);		
		$data['delete'] = $this->url->link('extension/addphotos/delete', 'user_token=' . $this->session->data['user_token'] . $url, true);

        if(isset($data['album_photos_id'])){
			$data['album_photos_id'] =$this->request->get['album_photos_id'];
		}
		$data['addphotoss'] = array();

		$filter_data = array(
			'filter_albumname' => $filter_albumname,
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);
		
		$this->load->model('extension/gallery');
		
		$addphotos_total = $this->model_extension_addphotos->getTotaladdphotoss($filter_data);
	
		$results = $this->model_extension_addphotos->getaddphotoss($filter_data);
		foreach ($results as $result) {
			if (is_file(DIR_IMAGE . $result['image'])) {
		    	$image = $this->model_tool_image->resize($result['image'], 40, 40);
			} else {
			  $image = $this->model_tool_image->resize('no_image.png', 40, 40);
			}

			$album_id = $result['album_id']; 
			
			$resut_name = $this->model_extension_gallery->getgallery($album_id);
			
			$data['addphotoss'][] = array(
				'album_photos_id' => $result['album_photos_id'],
				'name'            => $result['name'],
				'image'		  	  => $image, 
				'adname'          => $result['adname'],
				'sort_order'      => $result['sort_order'],
				'selected'        => isset($this->request->post['selected']) && in_array($result['album_photos_id'], $this->request->post['selected']),
				'edit'        => $this->url->link('extension/addphotos/edit', 'user_token=' . $this->session->data['user_token'] . '&album_photos_id=' . $result['album_photos_id'] . $url, true)
			);
		}
		
		
		$data['albums']=array();
		$albumname =   $this->model_extension_gallery->getgallaries($filter_data);
			foreach($albumname as $name){
			$data['albums'][] = array(
			'name' => $name['name'],
			'album_id' => $name['album_id']
			);
			}

		$data['heading_title'] = $this->language->get('heading_title');
		
		$data['entry_albumname'] = $this->language->get('entry_albumname');
		
		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');
		$data['text_select'] = $this->language->get('text_select');

		$data['column_name'] = $this->language->get('column_name');
		$data['column_title'] = $this->language->get('column_title');
		$data['column_sort_order'] = $this->language->get('column_sort_order');
		$data['column_action'] = $this->language->get('column_action');		
		

		$data['button_insert'] = $this->language->get('button_insert');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['button_filter'] = $this->language->get('button_filter');
		

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}


		$url = '';
				
		if (isset($this->request->get['filter_albumname'])) {
			$url .= '&filter_albumname=' . $this->request->get['filter_albumname'];
		}
		
		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('extension/addphotos', 'user_token=' . $this->session->data['user_token'] . '&sort=name' . $url, true);
		$data['sort_title'] = $this->url->link('extension/addphotos', 'user_token=' . $this->session->data['user_token'] . '&sort=title' . $url, true);
		$data['sort_sort_order'] = $this->url->link('extension/addphotos', 'user_token=' . $this->session->data['user_token'] . '&sort=sort_order' . $url, true);
		
		$url = '';
		
		if (isset($this->request->get['filter_albumname'])) {
			$url .= '&filter_albumname=' . $this->request->get['filter_albumname'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $addphotos_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('extension/addphotos', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($addphotos_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($addphotos_total - $this->config->get('config_limit_admin'))) ? $addphotos_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $addphotos_total, ceil($addphotos_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;
		$data['filter_albumname'] = $filter_albumname;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/addphotos_list', $data));
	}

	protected function getForm() {
		$data['heading_title'] = $this->language->get('heading_title');
		
		$data['text_form'] = !isset($this->request->get['album_photos_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		
		$data['text_loading'] = $this->language->get('text_loading');
		$data['text_enabled'] = $this->language->get('text_enabled');
    	$data['text_select'] = $this->language->get('text_select');
    	$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_default'] = $this->language->get('text_default');
    	$data['text_image_manager'] = $this->language->get('text_image_manager');
		$data['text_browse'] = $this->language->get('text_browse');
		$data['text_clear'] = $this->language->get('text_clear');			
		$data['text_percent'] = $this->language->get('text_percent');
		$data['text_amount'] = $this->language->get('text_amount');

		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_title'] = $this->language->get('entry_title');
		$data['entry_description'] = $this->language->get('entry_description');
		$data['entry_store'] = $this->language->get('entry_store');
		$data['entry_keyword'] = $this->language->get('entry_keyword');
    	$data['entry_image'] = $this->language->get('entry_image');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_customer_group'] = $this->language->get('entry_customer_group'); 
		$data['entry_images'] = $this->language->get('entry_images');
		$data['entry_image_popup'] = $this->language->get('entry_image_popup');
		$data['entry_width'] = $this->language->get('entry_width');
		$data['entry_height'] = $this->language->get('entry_height');
		$data['entry_thumb_popup'] = $this->language->get('entry_thumb_popup');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['button_remove'] = $this->language->get('button_remove');
		$data['button_multiple'] = $this->language->get('button_multiple');
		
		
		$data['tab_general'] = $this->language->get('tab_general');
		$data['tab_data'] = $this->language->get('tab_data');
		$data['tab_image'] = $this->language->get('tab_image');
		
		$data['dashmenu'] = $this->load->controller('extension/dashmenu');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
						
		if (isset($this->error['album_id'])) {
			$data['error_album_id'] = $this->error['album_id'];
		} else {
			$data['error_album_id'] = '';
		}

		$url = '';
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/addphotos', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);
		
		if (!isset($this->request->get['album_photos_id'])) {
			$data['action'] = $this->url->link('extension/addphotos/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('extension/addphotos/edit', 'user_token=' . $this->session->data['user_token'] . '&album_photos_id=' . $this->request->get['album_photos_id'] . $url, true);
			
		}

		$data['cancel'] = $this->url->link('extension/addphotos', 'user_token=' . $this->session->data['user_token'] . $url, true);
		
	

		if (isset($this->request->get['album_photos_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
      		$addphotos_info = $this->model_extension_addphotos->getaddphotos($this->request->get['album_photos_id']);
			
		}
		
		$this->load->model('localisation/language');
		
		$data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->get['album_photos_id'])) {
			$data['album_photos_id'] = $this->request->get['album_photos_id'];
		} else {
			$data['album_photos_id'] = 0;
		}

		if (isset($this->request->post['photo_description'])) {
			$data['photo_description'] = $this->request->post['photo_description'];
		} elseif (isset($this->request->get['album_photos_id'])) {
			$data['photo_description'] = $this->model_extension_addphotos->getphotoDescriptions($this->request->get['album_photos_id']);
		} else {
			$data['photo_description'] = array();
		}
		
		if (isset($this->request->post['image'])) {
			$data['image'] = $this->request->post['image'];
		} elseif (!empty($addphotos_info)) {
			$data['image'] = $addphotos_info['image'];
		} else {
			$data['image'] = '';
		}

		$this->load->model('tool/image');
		if (isset($this->request->post['image']) && file_exists(DIR_IMAGE . $this->request->post['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($addphotos_info) && $addphotos_info['image'] && file_exists(DIR_IMAGE . $addphotos_info['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($addphotos_info['image'], 100, 100);
		} else {
			$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}
		
		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		
		$this->load->model('extension/gallery');
		
		$data['albums'] =   $this->model_extension_gallery->getgallaries($data);
		
    	if (isset($this->request->post['album_id'])) {
      		$data['album_id'] = $this->request->post['album_id'];
    	} elseif (!empty($addphotos_info)) {
			$data['album_id'] = $addphotos_info['album_id'];
		} else {	
      		$data['album_id'] = '';
    	}
		
		if (isset($this->request->post['sort_order'])) {
			$data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($addphotos_info)) {
			$data['sort_order'] = $addphotos_info['sort_order'];
		} else {
			$data['sort_order'] = '';
		}
		
		
		$data['multipaleupload'] = str_replace('&amp;','&',$this->url->link('extension/addphotos/upload', 'user_token=' . $this->session->data['user_token'], true));
		
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/addphotos_form', $data));
	}
	public function upload()
	{
		// HTTP headers for no cache etc
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

	// Settings
	//$targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";

	$targetDir = '../image/catalog/upload/';
		
	$cleanupTargetDir = true; // Remove old files
	$maxFileAge = 5 * 3600; // Temp file age in seconds

	// 5 minutes execution time
	@set_time_limit(5 * 60);

	// Uncomment this one to fake upload time
	// usleep(5000);

	// Get parameters
	$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
	$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
	$fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';

	// Clean the fileName for security reasons
	$fileName = preg_replace('/[^\w\._]+/', '_', $fileName);

	// Make sure the fileName is unique but only if chunking is disabled
	if ($chunks < 2 && file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName)) {
		$ext = strrpos($fileName, '.');
		$fileName_a = substr($fileName, 0, $ext);
		$fileName_b = substr($fileName, $ext);

		$count = 1;
		while (file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName_a . '_' . $count . $fileName_b))
			$count++;

		$fileName = $fileName_a . '_' . $count . $fileName_b;
	}

	$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

	// Create target dir
	if (!file_exists($targetDir))
		@mkdir($targetDir);

	// Remove old temp files	
	if ($cleanupTargetDir) {
		if (is_dir($targetDir) && ($dir = opendir($targetDir))) {
			while (($file = readdir($dir)) !== false) {
				$tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

				// Remove temp file if it is older than the max age and is not the current file
				if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge) && ($tmpfilePath != "{$filePath}.part")) {
					@unlink($tmpfilePath);
				}
			}
			closedir($dir);
		} else {
			die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
		}
	}	

	// Look for the content type header
	if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
		$contentType = $_SERVER["HTTP_CONTENT_TYPE"];

	if (isset($_SERVER["CONTENT_TYPE"]))
		$contentType = $_SERVER["CONTENT_TYPE"];

	// Handle non multipart uploads older WebKit versions didn't support multipart in HTML5
	if (strpos($contentType, "multipart") !== false) {
		if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
			// Open temp file
			$out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
			if ($out) {
				// Read binary input stream and append it to temp file
				$in = @fopen($_FILES['file']['tmp_name'], "rb");

				if ($in) {
					while ($buff = fread($in, 4096))
						fwrite($out, $buff);
				} else
					die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
				@fclose($in);
				@fclose($out);
				@unlink($_FILES['file']['tmp_name']);
			} else
				die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
		} else
			die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
	} else {
		// Open temp file
		$out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
		if ($out) {
			// Read binary input stream and append it to temp file
			$in = @fopen("php://input", "rb");

			if ($in) {
				while ($buff = fread($in, 4096))
					fwrite($out, $buff);
			} else
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');

			@fclose($in);
			@fclose($out);
		} else
			die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
	}

	// Check if file has been uploaded
	if (!$chunks || $chunk == $chunks - 1) {
		// Strip the temp .part suffix off 
		rename("{$filePath}.part", $filePath);
	}

	die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');

	}
	protected function validateForm() {
    	if (!$this->user->hasPermission('modify', 'extension/addphotos')) {
      		$this->error['warning'] = $this->language->get('error_permission');
    	}
		
		foreach ($this->request->post['photo_description'] as $language_id => $value) {
			if ((utf8_strlen($value['name']) < 2) || (utf8_strlen($value['name']) > 255)) {
				$this->error['name'][$language_id] = $this->language->get('error_title');
			}
		}

    	if ($this->request->post['album_id'] == "" ) {
      		$this->error['album_id'] = $this->language->get('error_name');
    	}
							
		if (!$this->error) {
	  		return true;
		} else {
	  		return false;
		}
  	}    

  	protected function validateDelete() {
    	if (!$this->user->hasPermission('modify', 'extension/addphotos')) {
			$this->error['warning'] = $this->language->get('error_permission');
    	}
      	
		$this->load->model('catalog/product');

		if (!$this->error) {
	  		return true;
		} else {
	  		return false;
		}  
  	}
}