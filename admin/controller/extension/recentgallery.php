<?php
class ControllerExtensionRecentgallery extends Controller {
	public function index() {
		$this->load->language('extension/recentgallery');

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_no_results'] = $this->language->get('text_no_results');
		
		$data['column_galleryid'] = $this->language->get('column_galleryid');
		$data['column_galleryname'] = $this->language->get('column_galleryname');
		$data['column_totalalbum'] = $this->language->get('column_totalalbum');
		$data['column_status'] = $this->language->get('column_status');
		$data['column_action'] = $this->language->get('column_action');
		$data['button_view'] = $this->language->get('button_view');

		$data['user_token'] = $this->session->data['user_token'];

		$url='';
		$this->load->model('extension/gallery');
		$data['recentgallerys'] = array();
		
		
		$results = $this->model_extension_gallery->getRecentGallery();
		
		foreach ($results as $result) {
			
			$total=$this->model_extension_gallery->getTotalalbum($result['album_id']);
			
			$data['recentgallerys'][] = array(				
			'album_id' => $result['album_id'],
			'name'   => $result['name'],
			'total'  => $total,
			'status' => $result['status'],
			'href' => $this->url->link('extension/gallery', 'user_token=' . $this->session->data['user_token'] . '&album_id=' . $result['album_id'] . $url, true),
		);
		}

		return $this->load->view('extension/recentgallery', $data);
	}
}
