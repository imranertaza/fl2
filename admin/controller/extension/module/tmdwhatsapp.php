<?php
class ControllerExtensionModuleTmdWhatsapp extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/module/tmdwhatsapp');
		//whatsappchat code start
		$this->document->setTitle($this->language->get('heading_title1'));
		//whatsappchat code end
		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('module_tmdwhatsapp', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');

		$data['text_left'] = $this->language->get('text_left');
		$data['text_right'] = $this->language->get('text_right');
		$data['text_square'] = $this->language->get('text_square');
		$data['text_round'] = $this->language->get('text_round');
		$data['text_whatsapp'] = $this->language->get('text_whatsapp');

		$data['tab_general'] = $this->language->get('tab_general');
		$data['tab_department'] = $this->language->get('tab_department');
		$data['tab_design'] = $this->language->get('tab_design');

		$data['entry_heading'] = $this->language->get('entry_heading');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_description'] = $this->language->get('entry_description');
		$data['entry_title'] = $this->language->get('entry_title');
		$data['entry_profilename'] = $this->language->get('entry_profilename');
		$data['entry_message'] = $this->language->get('entry_message');
		$data['entry_number'] = $this->language->get('entry_number');
		$data['entry_whatsappimage'] = $this->language->get('entry_whatsappimage');
		$data['entry_status2'] = $this->language->get('entry_status2');
		$data['entry_position'] = $this->language->get('entry_position');
		$data['entry_layout'] = $this->language->get('entry_layout');
		$data['entry_btncolor'] = $this->language->get('entry_btncolor');
		$data['entry_btnfontcolor'] = $this->language->get('entry_btnfontcolor');

		$data['entry_statuscolor'] 	= $this->language->get('entry_statuscolor');
		$data['entry_frontcolor'] 	= $this->language->get('entry_frontcolor');
		$data['entry_bgcolor'] 		= $this->language->get('entry_bgcolor');
		$data['entry_headercolor'] 	= $this->language->get('entry_headercolor');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');


		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/tmdwhatsapp', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/module/tmdwhatsapp', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

			$this->load->model('tool/image');

		if (isset($this->request->post['module_tmdwhatsapp_status'])) {
			$data['module_tmdwhatsapp_status'] = $this->request->post['module_tmdwhatsapp_status'];
		} else {
			$data['module_tmdwhatsapp_status'] = $this->config->get('module_tmdwhatsapp_status');
		}

		if (isset($this->request->post['module_tmdwhatsapp_description'])) {
			$data['module_tmdwhatsapp_description'] = $this->request->post['module_tmdwhatsapp_description'];
		} else {
			$data['module_tmdwhatsapp_description'] = $this->config->get('module_tmdwhatsapp_description');
		}

		if (isset($this->request->post['module_tmdwhatsapp_position'])) {
			$data['module_tmdwhatsapp_position'] = $this->request->post['module_tmdwhatsapp_position'];
		} else {
			$data['module_tmdwhatsapp_position'] = $this->config->get('module_tmdwhatsapp_position');
		}

		if (isset($this->request->post['module_tmdwhatsapp_button_layout'])) {
			$data['module_tmdwhatsapp_button_layout'] = $this->request->post['module_tmdwhatsapp_button_layout'];
		} else {
			$data['module_tmdwhatsapp_button_layout'] = $this->config->get('module_tmdwhatsapp_button_layout');
		}



		if (isset($this->request->post['module_tmdwhatsapp_button_color'])) {
			$data['module_tmdwhatsapp_button_color'] = $this->request->post['module_tmdwhatsapp_button_color'];
		} else {
			$data['module_tmdwhatsapp_button_color'] = $this->config->get('module_tmdwhatsapp_button_color');
		}

		if (isset($this->request->post['module_tmdwhatsapp_button_frontcolor'])) {
			$data['module_tmdwhatsapp_button_frontcolor'] = $this->request->post['module_tmdwhatsapp_button_frontcolor'];
		} else {
			$data['module_tmdwhatsapp_button_frontcolor'] = $this->config->get('module_tmdwhatsapp_button_frontcolor');
		}

		if (isset($this->request->post['module_tmdwhatsapp_headercolor'])) {
			$data['module_tmdwhatsapp_headercolor'] = $this->request->post['module_tmdwhatsapp_headercolor'];
		} else {
			$data['module_tmdwhatsapp_headercolor'] = $this->config->get('module_tmdwhatsapp_headercolor');
		}

		if (isset($this->request->post['module_tmdwhatsapp_btngredient'])) {
			$data['module_tmdwhatsapp_btngredient'] = $this->request->post['module_tmdwhatsapp_btngredient'];
		} else {
			$data['module_tmdwhatsapp_btngredient'] = $this->config->get('module_tmdwhatsapp_btngredient');
		}

		if (isset($this->request->post['module_tmdwhatsapp_themechoose'])) {
			$data['module_tmdwhatsapp_themechoose'] = $this->request->post['module_tmdwhatsapp_themechoose'];
		} else {
			$data['module_tmdwhatsapp_themechoose'] = $this->config->get('module_tmdwhatsapp_themechoose');
		}

		if (isset($this->request->post['module_tmdwhatsapp_image'])) {
			$data['module_tmdwhatsapp_image'] = $this->request->post['module_tmdwhatsapp_image'];
		}  else {
			$data['module_tmdwhatsapp_image'] = $this->config->get('module_tmdwhatsapp_image');;
		}

		if (isset($this->request->post['module_tmdwhatsapp_image']) && is_file(DIR_IMAGE . $this->request->post['module_tmdwhatsapp_image'])) {
			$data['module_tmdwhatsapp_pic'] = $this->model_tool_image->resize($this->request->post['module_tmdwhatsapp_image'], 100, 100);
		} elseif ($this->config->get('module_tmdwhatsapp_image') && is_file(DIR_IMAGE . $this->config->get('module_tmdwhatsapp_image'))) {
			$data['module_tmdwhatsapp_pic'] = $this->model_tool_image->resize($this->config->get('module_tmdwhatsapp_image'), 100, 100);
		} else {
			$data['module_tmdwhatsapp_pic'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);

		if (isset($this->request->post['module_tmdwhatsapp_width'])) {
			$data['module_tmdwhatsapp_width'] = $this->request->post['module_tmdwhatsapp_width'];
		} else {
			$data['module_tmdwhatsapp_width'] = $this->config->get('module_tmdwhatsapp_width');
		}

		if (isset($this->request->post['module_tmdwhatsapp_height'])) {
			$data['module_tmdwhatsapp_height'] = $this->request->post['module_tmdwhatsapp_height'];
		} else {
			$data['module_tmdwhatsapp_height'] = $this->config->get('module_tmdwhatsapp_height');
		}

		if (isset($this->request->post['module_tmdwhatsapp_pwidth'])) {
			$data['module_tmdwhatsapp_pwidth'] = $this->request->post['module_tmdwhatsapp_pwidth'];
		} else {
			$data['module_tmdwhatsapp_pwidth'] = $this->config->get('module_tmdwhatsapp_pwidth');
		}

		if (isset($this->request->post['module_tmdwhatsapp_pheight'])) {
			$data['module_tmdwhatsapp_pheight'] = $this->request->post['module_tmdwhatsapp_pheight'];
		} else {
			$data['module_tmdwhatsapp_pheight'] = $this->config->get('module_tmdwhatsapp_pheight');
		}


		$data['module_tmdwhatsapp_setting']=array();

		if (isset($this->request->post['module_tmdwhatsapp_setting'])) {
			$module_tmdwhatsapp_settings = $this->request->post['module_tmdwhatsapp_setting'];
		} elseif ($this->config->get('module_tmdwhatsapp_setting')) {
			$module_tmdwhatsapp_settings = $this->config->get('module_tmdwhatsapp_setting');
		} else {
			$module_tmdwhatsapp_settings = array();
		}

		foreach ($module_tmdwhatsapp_settings as $module_tmdwhatsapp_setting) {

			if (is_file(DIR_IMAGE . $module_tmdwhatsapp_setting['image'])) {
				$image = $module_tmdwhatsapp_setting['image'];
				$thumb = $module_tmdwhatsapp_setting['image'];
			} else {
				$image = '';
				$thumb = 'no_image.png';
			}
			$thumb=array('thumb'=>$this->model_tool_image->resize($thumb, 100, 100));
			$module_tmdwhatsapp_setting=array_merge($module_tmdwhatsapp_setting,$thumb);
			$data['module_tmdwhatsapp_setting'][] = $module_tmdwhatsapp_setting;

		}


		$data['profilestatus'][] = array(
			'name' => 'Online',
			'value' => 'online'

		);
		$data['profilestatus'][] = array(
			'name' => 'Offline',
			'value' => 'offline'

		);
		$data['profilestatus'][] = array(
			'name' => 'Hide',
			'value' => 'hide'

		);



		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);


		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/tmdwhatsapp', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/tmdwhatsapp')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}
