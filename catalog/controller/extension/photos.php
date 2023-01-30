<?php
class ControllerExtensionphotos extends Controller {

	public function index() {
	
		$this->load->language('extension/photos');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->document->addStyle('catalog/view/theme/default/stylesheet/tmdphotogallery.css');
		$this->document->addScript('catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js');
		$this->document->addStyle('catalog/view/javascript/jquery/magnific/magnific-popup.css');
		$this->load->model('extension/gallery');
		$this->load->model('tool/image'); 
		
		$data['text_photos'] = $this->language->get('text_photos');
		$url = '';
		$path = '';
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}	

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}	

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}
			
			$data['albumna']= array();
			
			$album_id = $this->request->get['album_id'];
			$albumname = $this->model_extension_gallery->getgallery($album_id);
			
			$data['album_name'] = $albumname[0]['name']; 
			$data['album_description'] = html_entity_decode($albumname[0]['description']);
			
			
			foreach($albumname as $gallerys){
			
				$data['albumna'][]=array(
				'album_id' => $gallerys['album_id'],
				'album'	   => $gallerys['name'],
				
				);
			}
		
		
		$this->load->model('tool/image');

		if(isset ($this->request->get['album_id']) && !empty($this->request->get['album_id'])){
		
		
			if(isset($this->request->get['page'])) {
				$page = $this->request->get['page'];
			} else {
				$page = 1;
			}
			
			if (isset($this->request->get['limit'])) {
			$limit = $this->request->get['limit'];
		} else {
			$limit = $this->config->get('gallerysetting_limtofgallery');
		}
		
		$url = '';
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		if (isset($this->request->get['limit'])) {
			$url .= '&limit=' . $this->request->get['limit'];
		}
		$filter_data = array(
			'start' => ($page - 1) * $this->config->get('gallerysetting_limtofgallery'),
			'limit' => $this->config->get('gallerysetting_limtofgallery'),
			'album_id' => $this->request->get['album_id']
		);
			
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home'),
			'separator' => false
		);
		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_gallery'),
			'href'      => $this->url->link('extension/gallery')
		);
		
		if(isset($this->request->get['album_id'])) {

			$path1='';
			$photo_part = explode('_',$this->request->get['album_id']);

			
			$i=0;

			foreach ($photo_part as $pathid) {
				
				if ($i==0) {
					$path1=(int)$pathid;
				} else {
					$path1 .= '_' . (int)$pathid;
				}

				$gallery_info = $this->model_extension_gallery->getgalleres($pathid);

				if ($gallery_info) {
					$data['breadcrumbs'][] = array(
						'text' => $gallery_info['name'],
						'href' => $this->url->link('extension/photos', 'album_id=' . $path1 . $url)
					);
				
				}
				
				$i++;
			}
			$album_id = (int)array_pop($photo_part);

			$data['albumna']= array();
			
			$albumname = $this->model_extension_gallery->getgallery($album_id);
			
			$data['album_name'] = $albumname[0]['name']; 
			$data['album_description'] = html_entity_decode($albumname[0]['description']);
			
			
			foreach($albumname as $gallerys){
				$data['albumna'][]=array(
					'album_id' => $gallerys['album_id'],
					'album'	   => $gallerys['name'],
				);
			}
			
		} else {
			$album_id=0;
		}	

		$filter1=array(
				'start'      	=> ($page - 1) * $limit,
				'limit'      	=> $limit
			);	

			$data['heading_title']=$gallerys['name'];
			$data['images']=array();
			$photo_count = $this->model_extension_gallery->countImage($album_id);
			
			$photo_info = $this->model_extension_gallery->getPTS($filter1,$album_id);
			
    	  foreach($photo_info as $info){
			
				if($this->config->get('gallerysetting_thumb_width')){
					$thumb_width = $this->config->get('gallerysetting_thumb_width'); 
				}else{
					$thumb_width = 180;					
				}
				
				if($this->config->get('gallerysetting_thumb_height')){
					$thumb_height = $this->config->get('gallerysetting_thumb_height'); 
				}else{
					$thumb_height = 240;
				}
				
				if($this->config->get('gallerysetting_popup_width')){
					$popup_width = $this->config->get('gallerysetting_popup_width'); 
				}else{
					$popup_width = 900;
				}
				
				if($this->config->get('gallerysetting_popup_height')){
					$popup_height = $this->config->get('gallerysetting_popup_height'); 
				}else{
					$popup_height = 1200;
				}
				
				if($info['image']) {
					$images= $this->model_tool_image->resize($info['image'],$thumb_width,$thumb_height);
				}else{
					$images = $this->model_tool_image->resize('placeholder.png',$thumb_width,$thumb_height);
				}
				if ($info['image']){
					$popup = $this->model_tool_image->resize($info['image'], $popup_width, $popup_height);
				}else{
					$popup = $this->model_tool_image->resize('placeholder.png',$thumb_width,$thumb_height);
				}
		
				$data['images'][]= array(
					'album_photos_id'	=> $info['album_photos_id'],
					'album_id'		=> $info['album_id'],
					'images'			=> $images,
					'name'				=> html_entity_decode($info['name']),
					'description'	=> html_entity_decode($info['description']),
					'popup'     	=> $popup,
					'multiples_images'     => array()
				);
			}
			$link= $this->request->get['album_id'];


			$parentresults = $this->model_extension_gallery->getTmdCategories($album_id);

			foreach($parentresults as $gallerys){

				if($gallerys['image']){
				 	$image = $this->model_tool_image->resize($gallerys['image'],$this->config->get('gallerysetting_gallery_width'),$this->config->get('gallerysetting_gallery_height'));
				} else{
					$image = $this->model_tool_image->resize('placeholder.png',128,148);
				}
				
				$totalphoto = $this->model_extension_gallery->countImage($gallerys['album_id']);
				
				$data['gallerys'][]=array(
					'parent_id' 	=> $gallerys['parent_id'],
					'album_id'  	=> $gallerys['album_id'],
					'thumb'     	=> $image,
					'totalphoto' 	=> $totalphoto,
					'name' 			=> $gallerys['name'],
					'description' 	=> utf8_substr(strip_tags(html_entity_decode($gallerys['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('config_product_description_length')) . '..',
					'href'	   		=> $this->url->link('extension/photos' ,'album_id=' . $this->request->get['album_id'] . '_' . $gallerys['album_id'] . $url),
				);
			}
			
			
			
			$pagination = new Pagination();
			$pagination->total = $photo_count;
			$pagination->page = $page;
			$pagination->limit = $this->config->get('gallerysetting_limtofgallery');
			$pagination->text = $this->language->get('text_pagination');
			$pagination->url = $this->url->link('extension/photos'.'&album_id='. $link.'&page={page}');
			$data['pagination'] = $pagination->render();
			$data['continue'] = $this->url->link('common/home');
			
			$data['results'] = sprintf($this->language->get('text_pagination'), ($photo_count) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($photo_count - $limit)) ? $photo_count : ((($page - 1) * $limit) + $limit), $photo_count, ceil($photo_count / $limit));
			
		}
		else
		{
			
			$data['gallerys']=array();
			$gallery_info = $this->model_extension_gallery->getgallery();
			foreach($gallery_info as $gallerys){
				if($gallerys['image']){
					$image = $this->model_tool_image->resize($gallerys['image'],$this->config->get('config_image_album_width'),$this->config->get('config_image_album_height'));
				}else{
					$image = $this->model_tool_image->resize('placeholder.png',128,148);
				}
				$data['gallerys'][]=array(
				'album_id' => $gallerys['album_id'],
				'album'	   => $gallerys['name'],
				'image'		=>$image,
				'href'	   => $this->url->link('extension/photos' .'&album_id='. $gallerys['album_id'])
				);
			}
		}
		
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
        
        $this->response->setOutput($this->load->view('extension/photos', $data));
	}
}
