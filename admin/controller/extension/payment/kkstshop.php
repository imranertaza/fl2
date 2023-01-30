<?php
class ControllerExtensionPaymentKkstshop extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/payment/kkstshop');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('payment_kkstshop', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['url'])) {
			$data['error_url'] = $this->error['url'];
		} else {
			$data['error_url'] = '';
		}
        if (isset($this->error['key'])) {
            $data['error_key'] = $this->error['key'];
        } else {
            $data['error_key'] = '';
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
			'href' => $this->url->link('extension/payment/kkstshop', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/payment/kkstshop', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true);

		if (isset($this->request->post['payment_kkstshop_url'])) {
			$data['payment_kkstshop_url'] = $this->request->post['payment_kkstshop_url'];
		} else {
			$data['payment_kkstshop_url'] = $this->config->get('payment_kkstshop_url');
		}

        if (isset($this->request->post['payment_kkstshop_key'])) {
            $data['payment_kkstshop_key'] = $this->request->post['payment_kkstshop_key'];
        } else {
            $data['payment_kkstshop_key'] = $this->config->get('payment_kkstshop_key');
        }
        if (isset($this->request->post['payment_kkstshop_mode'])) {
            $data['payment_kkstshop_mode'] = $this->request->post['payment_kkstshop_mode'];
        } else {
            $data['payment_kkstshop_mode'] = $this->config->get('payment_kkstshop_mode');
        }


        if (isset($this->request->post['payment_kkstshop_total'])) {
			$data['payment_kkstshop_total'] = $this->request->post['payment_kkstshop_total'];
		} else {
			$data['payment_kkstshop_total'] = $this->config->get('payment_kkstshop_total');
		}



		if (isset($this->request->post['payment_kkstshop_geo_zone_id'])) {
			$data['payment_kkstshop_geo_zone_id'] = $this->request->post['payment_kkstshop_geo_zone_id'];
		} else {
			$data['payment_kkstshop_geo_zone_id'] = $this->config->get('payment_kkstshop_geo_zone_id');
		}

		$this->load->model('localisation/geo_zone');

		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		if (isset($this->request->post['payment_kkstshop_status'])) {
			$data['payment_kkstshop_status'] = $this->request->post['payment_kkstshop_status'];
		} else {
			$data['payment_kkstshop_status'] = $this->config->get('payment_kkstshop_status');
		}
        if (isset($this->request->post['payment_kkstshop_order_status_id'])) {
            $data['payment_kkstshop_order_status_id'] = $this->request->post['payment_kkstshop_order_status_id'];
        } else {
            $data['payment_kkstshop_order_status_id'] = $this->config->get('payment_kkstshop_order_status_id');
        }



		if (isset($this->request->post['payment_kkstshop_sort_order'])) {
			$data['payment_kkstshop_sort_order'] = $this->request->post['payment_kkstshop_sort_order'];
		} else {
			$data['payment_kkstshop_sort_order'] = $this->config->get('payment_kkstshop_sort_order');
		}

        $this->load->model('localisation/order_status');
        $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/payment/kkstshop', $data));
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'extension/payment/kkstshop')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['payment_kkstshop_url']) {
			$this->error['url'] = '网关地址必填.';
		}
       if((strpos($this->request->post['payment_kkstshop_url'],'http://')===false &&
           strpos($this->request->post['payment_kkstshop_url'],'https://')===false)
           || substr($this->request->post['payment_kkstshop_url'],strlen($this->request->post['payment_kkstshop_url'])-1,1)=='/'){
           $this->error['url'] = '网关地址必选以http://或者https://开头,且末尾不要带/.';
       }
        if (!$this->request->post['payment_kkstshop_key']) {
            $this->error['key'] = '商户密钥必填.';
        }

		return !$this->error;
	}
}