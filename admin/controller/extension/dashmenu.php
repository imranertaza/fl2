<?php
class ControllerExtensionDashmenu extends Controller {
	public function index() {
		$this->load->language('extension/dashmenu');

		$data['text_dash'] = $this->language->get('text_dash');
		$data['text_gallery'] = $this->language->get('text_gallery');
		$data['text_photo'] = $this->language->get('text_photo');
		$data['text_sett'] = $this->language->get('text_sett');
		$data['text_addmodule'] = $this->language->get('text_addmodule');
		$data['text_about'] = $this->language->get('text_about');

		$data['user_token'] = $this->session->data['user_token'];
		
		$data['gallerysetting'] = $this->url->link('extension/tmdgallerysetting', 'user_token=' . $this->session->data['user_token'], true);
		$data['galleryphoto'] = $this->url->link('extension/addphotos', 'user_token=' . $this->session->data['user_token'], true);
		$data['dashboard'] = $this->url->link('extension/gallerydashboard', 'user_token=' . $this->session->data['user_token'], true);
		$data['gallery'] = $this->url->link('extension/gallery', 'user_token=' . $this->session->data['user_token'], true);
		$data['addmodule'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true);
		$data['about'] = $this->url->link('extension/about', 'user_token=' . $this->session->data['user_token'], true);
		
		$data['dashboard_menu']=false;
		$data['gallery_menu']=false;
		$data['photo_menu']=false;
		$data['setting_menu']=false;				
		$data['module_menu']=false;				
		$data['about_menu']=false;				
		if(isset($this->request->get['route']) && $this->request->get['route']=='extension/gallerydashboard')
		{
		 $data['dashboard_menu']=true;
		}
		
		if(!isset($this->request->get['route']))
		{
		 $data['dashboard_menu']=true;
		}
		
		if(isset($this->request->get['route']) && $this->request->get['route']=='extension/gallery')
		{
		$data['gallery_menu']=true;
		}
		
		if(isset($this->request->get['route']) && $this->request->get['route']=='extension/about')
		{
		$data['about_menu']=true;
		}
		
		if(isset($this->request->get['route']) && $this->request->get['route']=='extension/addphotos'){
		$data['photo_menu']=true;
		}
		
		if(isset($this->request->get['route']) && $this->request->get['route']=='extension/tmdgallerysetting'){
		$data['setting_menu']=true;
		}
		if(isset($this->request->get['route']) && $this->request->get['route']=='extension/module'){
		$data['module_menu']=true;
		}
		
		return $this->load->view('extension/dashmenu', $data);
	}
}
