<?php
class ModelExtensionPaymentKkstshop extends Model {
	public function getMethod($address, $total) {
		$this->load->language('extension/payment/kkstshop');

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('payment_kkstshop_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");

		if ($this->config->get('payment_kkstshop_total') > $total) {
			$status = false;
		} elseif (!$this->config->get('payment_kkstshop_geo_zone_id')) {
			$status = true;
		} elseif ($query->num_rows) {
			$status = true;
		} else {
			$status = false;
		}

		$currencies = array(
			'AUD',
			'CAD',
			'EUR',
			'GBP',
			'JPY',
			'USD',
			'NZD',
			'CHF',
			'HKD',
			'SGD',
			'SEK',
			'DKK',
			'PLN',
			'NOK',
			'HUF',
			'CZK',
			'ILS',
			'MXN',
			'MYR',
			'BRL',
			'PHP',
			'TWD',
			'THB',
			'TRY',
			'RUB'
		);

		if (!in_array(strtoupper($this->session->data['currency']), $currencies)) {
			$status = false;
		}

		$method_data = array();

		if ($status) {
			$is_mobile = $this->is_mobile();
			if($is_mobile){
				$method_data = array(
					'code'       => 'kkstshop',
					'title'      => $this->language->get('text_title')."<div><img src='./catalog/view/theme/default/image/dhpay_h5.jpg' style=\"width:90%\"/></div>",
					'terms'      => '',
					'sort_order' => $this->config->get('payment_kkstshop_sort_order')
				);
			}else{
				$method_data = array(
					'code'       => 'kkstshop',
					'title'      => $this->language->get('text_title')."<div><img src='./catalog/view/theme/default/image/dhpay.png'/></div>",
					'terms'      => '',
					'sort_order' => $this->config->get('payment_kkstshop_sort_order')
				);
			}
			
		}

		return $method_data;
	}

	function is_mobile() {
	    if (empty($_SERVER['HTTP_USER_AGENT'])) {
	            $is_mobile = false;
	        } elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false 
	            || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
	            || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
	            || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
	            || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
	            || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
	            || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {
	        $is_mobile = true;
	    }else{
	        $is_mobile = false;
	    }
	    return $is_mobile;
	}
}
