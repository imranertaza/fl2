<?php
class ModelExtensionPaymentOffcc extends Model {
	public function getMethod($address, $total) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('payment_offcc_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");

		if ($this->config->get('payment_offcc_total') > 0 && $total >= $this->config->get('payment_offcc_total')) {
			$status = true;
		} elseif (!$this->config->get('payment_offcc_geo_zone_id')) {
			$status = true;
		} elseif ($query->num_rows) {
			$status = true;
		} else {
			$status = false;
		}
	
		$title = '';
		$language_id = (int)$this->config->get('config_language_id');

		if($this->config->get('payment_offcc')) {
			$payment_offcc = $this->config->get('payment_offcc');
			if (isset($payment_offcc[$language_id]['heading'] )) {
				$title = $payment_offcc[$language_id]['heading'];
			}
		}

		
		$method_data = array();

		if ($status) {
			$method_data = array(
				'code'       => 'offcc',
				'title'      => $title,
				'terms'      => '',
				'sort_order' => $this->config->get('payment_offcc_sort_order')
			);
		}

		return $method_data;
	}
}