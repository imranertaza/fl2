<?php
class ControllerExtensionModuleUnusedImage extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/module/unused_image');

		$this->document->setTitle(explode(' - ',$this->language->get('heading_title'))[1]);

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('module_unused_image', $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');

		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_debug_log'] = $this->language->get('entry_debug_log');

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
			'text' => $this->language->get('text_module'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => explode(' - ',$this->language->get('heading_title'))[1],
			'href' => $this->url->link('extension/module/unused_image', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/module/unused_image', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

		if (isset($this->request->post['module_unused_image_status'])) {
			$data['module_unused_image_status'] = $this->request->post['module_unused_image_status'];
		} else {
			$data['module_unused_image_status'] = $this->config->get('module_unused_image_status');
		}

		if (isset($this->request->post['module_unused_image_debug_log'])) {
			$data['module_unused_image_debug_log'] = $this->request->post['module_unused_image_debug_log'];
		} else {
			$data['module_unused_image_debug_log'] = $this->config->get('module_unused_image_debug_log');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/unused_image', $data));
	}


	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/unused_image')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		return !$this->error;
	}


	public function install() {
		// add event handlers
		$this->load->model('setting/event');
		$code = 'module_unused_image';
		$app = 'admin/';
		$trigger = 'view/design/layout_form/before';
		$route = 'extension/module/unused_image/eventViewDesignLayoutFormBefore';
		$this->model_setting_event->addEvent( $code, $app.$trigger, $route );
		$trigger = 'view/common/column_left/before';
		$route = 'extension/module/unused_image/eventViewCommonColumnLeftBefore';
		$this->model_setting_event->addEvent( $code, $app.$trigger, $route );
		
		// add DB table
		$this->load->model('extension/module/unused_image');
		$this->model_extension_module_unused_image->install();
	}


	public function uninstall() {
		// remove event handlers
		$this->load->model('setting/event');
		$code = 'module_unused_image';
		$this->model_setting_event->deleteEventByCode( $code );
		
		// removed DB table
		$this->load->model('extension/module/unused_image');
		$this->model_extension_module_unused_image->uninstall();
	}


	// event handler for admin/view/design/layout_form/before
	public function eventViewDesignLayoutFormBefore( &$route, &$data, &$template=null ) {
		foreach ($data['extensions'] as $key=>$extension) {
			if ($extension['code'] == 'unused_image') {
				unset($data['extensions'][$key]);
			}
		}
		return null;
	}


	// event handler for admin/view/common/column_left/before
	public function eventViewCommonColumnLeftBefore( &$route, &$data, &$template=null ) {
		if (!$this->config->get('module_unused_image_status')) {
			return null;
		}
		if (!$this->user->hasPermission('access', 'extension/catalog_unused_image')) {
			return null;
		}

		// add Catalog > Unused Images menu
		$this->load->language('extension/module/unused_image');
		foreach ($data['menus'] as $key=>$menu) {
			if ($menu['id'] == 'menu-catalog') {
				$data['menus'][$key]['children'][] = array(
					'name'	   => $this->language->get('text_unused_image'),
					'href'     => $this->url->link('extension/catalog_unused_image', 'user_token=' . $this->session->data['user_token'], true),
					'children' => array()
				);
				return null;
			}
		}

		$unused_images = array(
			'name'	   => $this->language->get('text_unused_image'),
			'href'     => $this->url->link('extension/catalog_unused_image', 'user_token=' . $this->session->data['user_token'], true),
			'children' => array()		
		);
		$data['menus'][] = array(
			'id'      => 'menu-catalog',
			'icon'	   => 'fa-bar-chart-o', 
			'name'	   => $this->language->get('text_catalog'),
			'href'     => '',
			'children' => array( $unused_images )
		);

		return null;
	}

}
?>