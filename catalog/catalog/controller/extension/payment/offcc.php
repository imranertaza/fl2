<?php

class ControllerExtensionPaymentOffcc extends Controller {

	public function index() {

		$language_id = (int)$this->config->get('config_language_id');

		

		$payment_offcc = $this->config->get('payment_offcc');

		$data['text_heading'] 		= isset($payment_offcc[$language_id]['heading']) ? $payment_offcc[$language_id]['heading'] : '';

		$data['text_card_number']	= isset($payment_offcc[$language_id]['card_number']) ? $payment_offcc[$language_id]['card_number'] : '';

		$data['text_cvc'] 			= isset($payment_offcc[$language_id]['cvc']) ? $payment_offcc[$language_id]['cvc'] : '';

		$data['text_card_owner'] 	= isset($payment_offcc[$language_id]['card_owner']) ? $payment_offcc[$language_id]['card_owner'] : '';

		$data['text_expiry_date'] 	= isset($payment_offcc[$language_id]['expiry_date']) ? $payment_offcc[$language_id]['expiry_date'] : '';

		$data['text_card_type'] 	= isset($payment_offcc[$language_id]['card_type']) ? $payment_offcc[$language_id]['card_type'] : '';

		

		if(isset($payment_offcc[$language_id]['description'])) {

			$data['description'] = html_entity_decode($payment_offcc[$language_id]['description'], ENT_QUOTES, 'UTF-8');

		} else {

			$data['description'] = '';

		}

		

		$data['text_card_type'] 	= isset($payment_offcc[$language_id]['card_type']) ? $payment_offcc[$language_id]['card_type'] : ''; 



		



		$data['card_types']			= $this->config->get('payment_offcc_card_types');

		if(isset($this->session->data['error_offcc']['card_number'])) {
			$data['error_card_number'] = $this->session->data['error_offcc']['card_number'];
		}

		if(isset($this->session->data['error_offcc']['cvc'])) {
			$data['error_cvc'] = $this->session->data['error_offcc']['cvc'];
		}

		if(isset($this->session->data['error_offcc']['expiry_date'])) {
			$data['error_expiry_date'] = $this->session->data['error_offcc']['expiry_date'];
		}

		if(isset($this->session->data['error_offcc']['card_owner'])) {
			$data['error_card_owner'] = $this->session->data['error_offcc']['card_owner'];
		}

		if(isset($this->session->data['error_offcc']['card_type'])) {
			$data['error_card_type'] = $this->session->data['error_offcc']['card_type'];
		}

		
		if(isset($this->session->data['error_offcc'])) {
			unset($this->session->data['error_offcc']);
		}


		$Startyear	=	date('Y');

		$endYear	=	$Startyear+10;

		$data['years'] = range($Startyear,$endYear);



		if(strpos($this->config->get('theme_default_directory'), 'journal')) {
			return $this->load->view('extension/payment/offcc_journal', $data);
		} else {
			return $this->load->view('extension/payment/offcc', $data);
		}

	}



	public function confirm() {

		$json = array();

		

		$payment_offcc = $this->config->get('payment_offcc');

		$language_id = (int)$this->config->get('config_language_id');



		$this->load->library('offcc/CreditCard');



		$card = $this->CreditCard->validCreditCard($this->request->post['card_number'], $this->request->post['card_type']);



		if(!$card['valid']) {

			$json['error']['card_number'] = isset($payment_offcc[$language_id]['error_card_number']) ? $payment_offcc[$language_id]['error_card_number'] : '';
			$this->session->data['error_offcc']['card_number'] = $json['error']['card_number'];
		}



		$validCvc = $this->CreditCard->validCvc($this->request->post['cvc'], $this->request->post['card_type']);



		if(!$validCvc) {

			$json['error']['cvc'] = isset($payment_offcc[$language_id]['error_cvc']) ? $payment_offcc[$language_id]['error_cvc'] : '';
			$this->session->data['error_offcc']['cvc'] = $json['error']['cvc'];
		}



		

		$validDate = $this->CreditCard->validDate($this->request->post['year'], $this->request->post['month']);

		if(!$validDate) {

			$json['error']['expiry_date'] = isset($payment_offcc[$language_id]['error_expiry_date']) ? $payment_offcc[$language_id]['error_expiry_date'] : '';
			$this->session->data['error_offcc']['expiry_date'] = $json['error']['expiry_date'];
		}



		if ((utf8_strlen(trim($this->request->post['card_owner'])) < 1) || (utf8_strlen(trim($this->request->post['card_owner'])) > 100)) {

			$json['error']['card_owner'] = isset($payment_offcc[$language_id]['error_card_owner']) ? $payment_offcc[$language_id]['error_card_owner'] : '';
			$this->session->data['error_offcc']['card_owner'] = $json['error']['card_owner'];
		}



		$card_types = array_keys($this->config->get('payment_offcc_card_types'));

		if(!in_array($this->request->post['card_type'],$card_types)) {

			$json['error']['card_type'] = isset($payment_offcc[$language_id]['error_card_type']) ? $payment_offcc[$language_id]['error_card_type'] : '';
			$this->session->data['error_offcc']['card_type'] = $json['error']['card_type'];
		}

		

		if ($this->session->data['payment_method']['code'] == 'offcc' && !$json) {



			if(!isset($this->encryption)) {

				//$this->load->library('encryption');

			}

			

			//$card_number = $this->encryption->encrypt($this->config->get('config_encryption'),$this->request->post['card_number']);

			$card_number = $this->request->post['card_number'];



			$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "offcc` WHERE order_id = '" . (int)$this->session->data['order_id'] . "'");



			if ($query->rows) {

				$this->db->query("UPDATE " . DB_PREFIX . "offcc SET 

					`order_id` = '" . (int)$this->session->data['order_id'] . "', 

					`card_owner` = '" . $this->db->escape($this->request->post['card_owner']) . "', 

					`card_type` = '" . $this->db->escape($this->request->post['card_type']) . "', 

					`card_number` = '" . $this->db->escape($card_number) . "', 

					`cvc` = '" . $this->db->escape($this->request->post['cvc']) . "', 

					`expiry_date` = '" . $this->db->escape($this->request->post['month'].'/'.$this->request->post['year']) . "'

					WHERE order_id =  '" . (int)$this->session->data['order_id'] . "'

					"

				);

			} else {

				$this->db->query("INSERT INTO " . DB_PREFIX . "offcc SET 

					`order_id` = '" . (int)$this->session->data['order_id'] . "', 

					`card_owner` = '" . $this->db->escape($this->request->post['card_owner']) . "', 

					`card_type` = '" . $this->db->escape($this->request->post['card_type']) . "', 

					`card_number` = '" . $this->db->escape($card_number) . "', 

					`cvc` = '" . $this->db->escape($this->request->post['cvc']) . "', 

					`expiry_date` = '" . $this->db->escape($this->request->post['month'].'/'.$this->request->post['year']) . "'

					"

				);

			}

			

			$this->load->model('checkout/order');

			$this->model_checkout_order->addOrderHistory($this->session->data['order_id'], $this->config->get('payment_offcc_order_status_id'));

			

			$json['redirect'] = $this->url->link('checkout/success');

		}

		

		$this->response->addHeader('Content-Type: application/json');

		$this->response->setOutput(json_encode($json));

	}



}