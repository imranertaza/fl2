<?php    
class ControllerExtensionAbout extends Controller { 
	private $error = array();
  
  	public function index() {
		
		$this->load->language('extension/about');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('extension/about');
		
		$this->getList();
		

  	}	
	
	protected function getList() {

		$data['heading_title'] = $this->language->get('heading_title');
		$data['dashmenu'] = $this->load->controller('extension/dashmenu');
		
		$data['breadcrumbs'] = array();

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('extension/gallerydashboard', 'user_token=' . $this->session->data['user_token'], true),
      		'separator' => false
   		);

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('extension/gallery', 'user_token=' . $this->session->data['user_token'], true),
      		'separator' => ' :: '
   		);
		
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
    	$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/about', $data));
	
	}
}
?>