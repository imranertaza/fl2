<?php
class ControllerExtensionTmdwhatsapp extends Controller {
	public function index() {
		$this->load->language('extension/tmdwhatsapp');

		//whatsappchat code start
	$this->load->model('tool/image');
		$data['whatsapp_status']=$this->config->get('module_tmdwhatsapp_status');

		$data['deallayout'] = $this->config->get('module_tmdwhatsapp_themechoose');

		$tmdwhatsappimage = $this->config->get('module_tmdwhatsapp_image');

		if (!empty($this->config->get('module_tmdwhatsapp_width'))) {
			$image_width = $this->config->get('module_tmdwhatsapp_width');
		}else{
			$image_width = 500;
		}

		if (!empty($this->config->get('module_tmdwhatsapp_height'))) {
			$image_height = $this->config->get('module_tmdwhatsapp_height');
		}else{
			$image_height = 500;
		}

		if (is_file(DIR_IMAGE . $tmdwhatsappimage)) {
			$data['whatsappimage'] = $this->model_tool_image->resize($tmdwhatsappimage,$image_width,$image_height);
		} else {
			$data['whatsappimage'] = '';
		}

		$data['placeholder1'] = $this->model_tool_image->resize('placeholder.png',50,50);

		$whatsappheading =$this->config->get('module_tmdwhatsapp_description');
		 $data['whatsapp_heading']      = $whatsappheading[$this->config->get('config_language_id')]['heading'];
		 $data['whatsapp_description']      = $whatsappheading[$this->config->get('config_language_id')]['description'];

		$whatsappsettings_info =$this->config->get('module_tmdwhatsapp_setting');


		$data['whatsapp_settings'] = array();
 if (isset($whatsappsettings_info)){
		 foreach ($whatsappsettings_info as $whatsappsetting) {
			 $whatsappttitle  = $whatsappsetting['tmdwhatsapp_setting_description'][$this->config->get('config_language_id')];

			 if (!empty($this->config->get('module_tmdwhatsapp_pwidth'))) {
	 			$image_pwidth = $this->config->get('module_tmdwhatsapp_pwidth');
	 		}else{
	 			$image_pwidth = 50;
	 		}

	 		if (!empty($this->config->get('module_tmdwhatsapp_pheight'))) {
	 			$image_pheight = $this->config->get('module_tmdwhatsapp_pheight');
	 		}else{
	 			$image_pheight = 50;
	 		}

				if ($whatsappsetting['image']) {
					$profileimage = $this->model_tool_image->resize($whatsappsetting['image'],$image_pwidth,$image_pheight);
				} else {
				  $profileimage = $this->model_tool_image->resize('placeholder.png',$image_pwidth,$image_pheight);
				}

				$bgcolor  = $whatsappsetting['bgcolor'];
				$frontcolor  = $whatsappsetting['frontcolor'];
				$statuscolor  = $whatsappsetting['statuscolor'];

			$data['whatsapp_settings'][] = array(
				'title' => $whatsappttitle['title'],
				'profile_name' => $whatsappttitle['profile_name'],
				'bgcolor' => $bgcolor,
				'frontcolor' => $frontcolor,
				'statuscolor' => $statuscolor,
				'profile_image' => $profileimage,
				'greeting_message' => $whatsappttitle['greeting_message'],
				'whatsapp_number' => $whatsappsetting['number'],
				'online_status' => $whatsappsetting['status']
			);

		 }
		 }

	//design layout
		$data['button_position'] =$this->config->get('module_tmdwhatsapp_position');
		$data['button_layout'] =$this->config->get('module_tmdwhatsapp_button_layout');
		$data['button_color'] =$this->config->get('module_tmdwhatsapp_button_color');
		$data['button_font_color'] =$this->config->get('module_tmdwhatsapp_button_frontcolor');
		$data['headercolor'] =$this->config->get('module_tmdwhatsapp_headercolor');
		$data['btngrident'] =$this->config->get('module_tmdwhatsapp_btngredient');


//whatsappchat code end

		return $this->load->view('extension/tmdwhatsapp', $data);
	}
}
