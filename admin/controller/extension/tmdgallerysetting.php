<?php
class ControllerExtensiontmdgallerysetting extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/tmdgallerysetting');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['heading_title'] = $this->language->get('heading_title');

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_setting_setting->editSetting('gallerysetting', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/tmdgallerysetting', 'user_token=' . $this->session->data['user_token'], true));
		}
		
		
		$data['text_none'] = $this->language->get('text_none');
		$data['text_default'] = $this->language->get('text_default');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['entry_limtofgallery'] = $this->language->get('entry_limtofgallery');
		$data['entry_image_popup'] = $this->language->get('entry_image_popup');
		$data['entry_width'] = $this->language->get('entry_width');
		$data['entry_height'] = $this->language->get('entry_height');
		$data['entry_thumb_popup'] = $this->language->get('entry_thumb_popup');
		$data['entry_gallery_popup'] = $this->language->get('entry_gallery_popup');

		$data['entry_namecolor'] = $this->language->get('entry_namecolor');
		$data['entry_desccolor'] = $this->language->get('entry_desccolor');
		$data['entry_totalphotocolor'] = $this->language->get('entry_totalphotocolor');
		
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		
		$data['tab_setting'] = $this->language->get('tab_setting');
		$data['tab_color'] = $this->language->get('tab_color');
		$data['tab_designing'] = $this->language->get('tab_designing');
		
		
		$data['dashmenu'] = $this->load->controller('extension/dashmenu');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		if (isset($this->error['error_keynotfound'])) {
				$data['error_keynotfound'] = $this->error['error_keynotfound'];
			} else {
				$data['error_keynotfound'] = '';
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
			'href' => $this->url->link('extension/blogdashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/tmdgallerysetting', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);
		
		$data['action'] = $this->url->link('extension/tmdgallerysetting', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('extension/tmdgallerysetting', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$data['user_token'] = $this->session->data['user_token'];
		
		
			if (isset($this->request->post['gallerysetting_popup_height'])) {
				$data['gallerysetting_popup_height'] = $this->request->post['gallerysetting_popup_height'];
			} else {
				$data['gallerysetting_popup_height'] = $this->config->get('gallerysetting_popup_height');
			}
			if (isset($this->request->post['gallerysetting_popup_width'])) {
				$data['gallerysetting_popup_width'] = $this->request->post['gallerysetting_popup_width'];
			} else {
				$data['gallerysetting_popup_width'] = $this->config->get('gallerysetting_popup_width');
			}
			
			if (isset($this->request->post['gallerysetting_thumb_width'])) {
				$data['gallerysetting_thumb_width'] = $this->request->post['gallerysetting_thumb_width'];
			} else {
				$data['gallerysetting_thumb_width'] = $this->config->get('gallerysetting_thumb_width');
			}

			if (isset($this->request->post['gallerysetting_gallery_width'])) {
				$data['gallerysetting_gallery_width'] = $this->request->post['gallerysetting_gallery_width'];
			} else {
				$data['gallerysetting_gallery_width'] = $this->config->get('gallerysetting_gallery_width');
			}
			if (isset($this->request->post['gallerysetting_limtofgallery'])) {
				$data['gallerysetting_limtofgallery'] = $this->request->post['gallerysetting_limtofgallery'];
			} else {
				$data['gallerysetting_limtofgallery'] = $this->config->get('gallerysetting_limtofgallery');
			}
			if (isset($this->request->post['gallerysetting_thumb_height'])) {
				$data['gallerysetting_thumb_height'] = $this->request->post['gallerysetting_thumb_height'];
			} else {
				$data['gallerysetting_thumb_height'] = $this->config->get('gallerysetting_thumb_height');
			}

			if (isset($this->request->post['gallerysetting_gallery_height'])) {
				$data['gallerysetting_gallery_height'] = $this->request->post['gallerysetting_gallery_height'];
			} else {
				$data['gallerysetting_gallery_height'] = $this->config->get('gallerysetting_gallery_height');
			}
			
			if (isset($this->request->post['gallerysetting_namecolor'])) {
				$data['gallerysetting_namecolor'] = $this->request->post['gallerysetting_namecolor'];
			} else {
				$data['gallerysetting_namecolor'] = $this->config->get('gallerysetting_namecolor');
			}
			if (isset($this->request->post['gallerysetting_desccolor'])) {
				$data['gallerysetting_desccolor'] = $this->request->post['gallerysetting_desccolor'];
			} else {
				$data['gallerysetting_desccolor'] = $this->config->get('gallerysetting_desccolor');
			}
			
			if (isset($this->request->post['gallerysetting_totalphotocolor'])) {
				$data['gallerysetting_totalphotocolor'] = $this->request->post['gallerysetting_totalphotocolor'];
			} else {
				$data['gallerysetting_totalphotocolor'] = $this->config->get('gallerysetting_totalphotocolor');
			}

			if (isset($this->request->post['gallerysetting_gallerylayout'])) {
				$data['gallerysetting_gallerylayout'] = $this->request->post['gallerysetting_gallerylayout'];
			} else {
				$data['gallerysetting_gallerylayout'] = $this->config->get('gallerysetting_gallerylayout');
			}
	
	
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/tmdgallerysetting_form', $data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'extension/tmdgallerysetting')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		$key=$this->config->get('moduledata_photogallery_key');
			if (empty(trim($key))) {			
				 $this->error['warning'] ='Module will Work after add License key!';
			}

		return !$this->error;
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'gallery/tmdgallerysetting')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}