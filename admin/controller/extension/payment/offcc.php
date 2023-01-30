<?php
class ControllerExtensionPaymentOffcc extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/payment/offcc');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('payment_offcc', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['heading'])) {
			$data['error_heading'] = $this->error['heading'];
		} else {
			$data['error_heading'] = array();
		}

		if (isset($this->error['card_number'])) {
			$data['error_card_number'] = $this->error['card_number'];
		} else {
			$data['error_card_number'] = array();
		}

		if (isset($this->error['cvc'])) {
			$data['error_cvc'] = $this->error['cvc'];
		} else {
			$data['error_cvc'] = array();
		}

		if (isset($this->error['card_owner'])) {
			$data['error_card_owner'] = $this->error['card_owner'];
		} else {
			$data['error_card_owner'] = array();
		}

		if (isset($this->error['expiry_date'])) {
			$data['error_expiry_date'] = $this->error['expiry_date'];
		} else {
			$data['error_expiry_date'] = array();
		}

		if (isset($this->error['card_type'])) {
			$data['error_card_type'] = $this->error['card_type'];
		} else {
			$data['error_card_type'] = array();
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/payment/offcc', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/payment/offcc', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true);

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['payment_offcc_heading'])) {
			$data['payment_offcc_payable'] = $this->request->post['payment_offcc_heading'];
		} else {
			$data['payment_offcc_heading'] = $this->config->get('payment_offcc_heading');
		}

		if (isset($this->request->post['payment_offcc_total'])) {
			$data['payment_offcc_total'] = $this->request->post['payment_offcc_total'];
		} else {
			$data['payment_offcc_total'] = $this->config->get('payment_offcc_total');
		}

		if (isset($this->request->post['payment_offcc_order_status_id'])) {
			$data['payment_offcc_order_status_id'] = $this->request->post['payment_offcc_order_status_id'];
		} else {
			$data['payment_offcc_order_status_id'] = $this->config->get('payment_offcc_order_status_id');
		}

		$this->load->model('localisation/order_status');

		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		if (isset($this->request->post['payment_offcc_geo_zone_id'])) {
			$data['payment_offcc_geo_zone_id'] = $this->request->post['payment_offcc_geo_zone_id'];
		} else {
			$data['payment_offcc_geo_zone_id'] = $this->config->get('payment_offcc_geo_zone_id');
		}

		if (isset($this->request->post['payment_offcc_card_types'])) {
			$data['payment_offcc_card_types'] = $this->request->post['payment_offcc_card_types'];
		} else {
			$data['payment_offcc_card_types'] = $this->config->get('payment_offcc_card_types');
		}

		if (isset($this->request->post['payment_offcc'])) {
			$data['payment_offcc'] = $this->request->post['payment_offcc'];
		} else {
			$data['payment_offcc'] = $this->config->get('payment_offcc');
		}

		$this->load->model('localisation/geo_zone');

		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		if (isset($this->request->post['payment_offcc_status'])) {
			$data['payment_offcc_status'] = $this->request->post['payment_offcc_status'];
		} else {
			$data['payment_offcc_status'] = $this->config->get('payment_offcc_status');
		}

		if (isset($this->request->post['payment_offcc_sort_order'])) {
			$data['payment_offcc_sort_order'] = $this->request->post['payment_offcc_sort_order'];
		} else {
			$data['payment_offcc_sort_order'] = $this->config->get('payment_offcc_sort_order');
		}

		$this->load->model('customer/customer_group');
		$data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/payment/offcc', $data));
	}

	public function install() {
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "offcc` (
				`offcc_id` int(11) NOT NULL AUTO_INCREMENT,
				`order_id` int(11) NOT NULL DEFAULT '0',
				`card_owner` varchar(100) NOT NULL DEFAULT '',
				`card_number` varchar(250) NOT NULL DEFAULT '',
				`card_type` varchar(50) NOT NULL DEFAULT '',
				`cvc` varchar(10) NOT NULL DEFAULT '',
				`expiry_date` varchar(50) NOT NULL DEFAULT '',
				PRIMARY KEY (`offcc_id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci"
		);
	}

	public function uninstall() {
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "offcc`");
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/payment/offcc')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['payment_offcc'] as $language_id => $value) {
			if ((utf8_strlen($value['heading']) < 1) || (utf8_strlen($value['heading']) > 500)) {
				$this->error['heading'][$language_id] = $this->language->get('error_heading');
			}

			if ((utf8_strlen($value['card_number']) < 1) || (utf8_strlen($value['card_number']) > 500)) {
				$this->error['card_number'][$language_id] = $this->language->get('error_card_number');
			}

			if ((utf8_strlen($value['cvc']) < 1) || (utf8_strlen($value['cvc']) > 500)) {
				$this->error['cvc'][$language_id] = $this->language->get('error_cvc');
			}

			if ((utf8_strlen($value['card_owner']) < 1) || (utf8_strlen($value['card_owner']) > 500)) {
				$this->error['card_owner'][$language_id] = $this->language->get('error_card_owner');
			}

			if ((utf8_strlen($value['expiry_date']) < 1) || (utf8_strlen($value['expiry_date']) > 500)) {
				$this->error['expiry_date'][$language_id] = $this->language->get('error_expiry_date');
			}

			if ((utf8_strlen($value['card_type']) < 1) || (utf8_strlen($value['card_type']) > 500)) {
				$this->error['card_type'][$language_id] = $this->language->get('error_card_type');
			}
		}

		return !$this->error;
	}
}