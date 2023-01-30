<?php
class ControllerExtensionTotalAlbum extends Controller {
	public function index() {
		$this->load->language('extension/totalalbum');

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_view'] = $this->language->get('text_view');

		$data['user_token'] = $this->session->data['user_token'];

		// Total Orders
		$this->load->model('extension/addphotos');
		
		$data['totalphoto'] = $this->model_extension_addphotos->getTotaladdphotoss();

		$data['viewphoto'] = $this->url->link('extension/addphotos', 'user_token=' . $this->session->data['user_token'], true);

		return $this->load->view('extension/totalalbum', $data);
	}
}
