<?php
class ControllerExtensionTotalgallery extends Controller {
		public function index() {
		$this->load->language('extension/totalgallery');

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_view'] = $this->language->get('text_view');

		$data['user_token'] = $this->session->data['user_token'];

		// Total Orders
		$this->load->model('extension/gallery');
		
		$data['totalgallery'] = $this->model_extension_gallery->getTotalgallaries();

		$data['viewgallery'] = $this->url->link('extension/gallery', 'user_token=' . $this->session->data['user_token'], true);

		return $this->load->view('extension/totalgallery', $data);
	}
}
