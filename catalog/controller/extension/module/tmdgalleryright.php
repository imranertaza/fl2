<?php
class ControllerExtensionModuleTmdgalleryRight extends Controller {

	public function index($setting) {

		if(!empty($setting)){
		$this->language->load('extension/module/tmdgalleryright');

		$this->load->model('extension/gallery');
		$this->load->model('design/layout');

		$this->load->model('tool/image');

		$data['gallerys'] = array();

		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_viewall'] = $this->language->get('text_viewall');
		$data['button_cart'] = $this->language->get('button_cart');
		$data['text_photos'] = $this->language->get('text_photos');

			if(isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
			} else {
			$page = 1;
			}

			$filter_data = array(
				'order' => 'DESC',
				'start' => 0,
				'limit' => $setting['limit']
			);

			if (!$setting['limit']) {
			$setting['limit'] = 4;

			}

		if(isset ($setting['album_id']) && !empty($setting['album_id'])){

			if(isset($this->request->get['page'])) {
				$page = $this->request->get['page'];
			} else {
				$page = 1;
			}

			$url = '';
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$filter_data = array(
				'start' => ($page - 1) * $this->config->get('config_admin_limit'),
				'limit' => $setting['limit'],
				'album_id' => $setting['album_id']
			);

			$data['gallerys']=array();
			$photo_count = $this->model_extension_gallery->countImage($data);
			$photo_info = $this->model_extension_gallery->getphotos($filter_data);

			foreach($photo_info as $info){

				if($info['image']){
					$images= $this->model_tool_image->resize($info['image'],$setting['width'], $setting['height']);
				} else {
					$images = false;
				}

				$totalphoto = $this->model_extension_gallery->countImage($info['album_id']);

				$data['gallerys'][]= array(
					'album_id'	=> $info['album_id'],
					'album'	   => $info['name'],
					'description' => utf8_substr(strip_tags(html_entity_decode($info['description'], ENT_QUOTES, 'UTF-8')), 0, 125) . '..',
					'totalphoto' =>$totalphoto,
					'totalview' =>'',
					'image'	=>$images,
					'href'	     => $this->url->link('extension/photos' .'&album_id='. $info['album_id'])
				);
			}
			$link= $setting['album_id'];
			$pagination = new Pagination();
			$pagination->total = $photo_count;
			$pagination->page = $page;
			$pagination->limit = $this->config->get('config_admin_limit');
			$pagination->text = $this->language->get('text_pagination');
			$pagination->url = $this->url->link('extension/gallery'.'&album_id='. $link.'&page={page}');
			$data['pagination'] = $pagination->render();
			$data['continue'] = $this->url->link('common/home');

			} elseif(!empty($setting['gallery_albums'])) {

				$galleries = array_slice($setting['gallery_albums'], 0, (int)$setting['limit']);

			    foreach($galleries as $gallery_id){

				$gallerys = $this->model_extension_gallery->getgalleres($gallery_id);

				if(isset($gallerys['image'])){
					$image = $this->model_tool_image->resize($gallerys['image'],$setting['width'], $setting['height']);
				}else{
					$image = false;
				}

				if(isset($gallerys['album_id'])) {
					$album_id = $gallerys['album_id'];
				} else {
					$album_id = 0;
				}

				$totalphoto = $this->model_extension_gallery->countImage($album_id);

				if(isset($gallerys['name'])) {
					$name = $gallerys['name'];
				} else {
					$name = '';
				}

				if(isset($gallerys['description'])) {
					$description = $gallerys['description'];
				} else {
					$description = '';
				}

				if(isset($gallerys['viewed'])) {
					$viewed = $gallerys['viewed'];
				} else {
					$viewed = '';
				}

				$data['gallerys'][]=array(
				'album_id' => $album_id,
				'album'	   => $name,
				'description' => utf8_substr(strip_tags(html_entity_decode($description, ENT_QUOTES, 'UTF-8')), 0, 125) . '..',
				'image'		 =>$image,
				'totalphoto' =>$totalphoto,
				'totalview' =>$viewed.' '.$this->language->get('text_views'),
				'href'	     => $this->url->link('extension/photos' .'&album_id='. $album_id)
				);
			}

		} else {

			$filter_data = array(
				'start' => ($page - 1) * $this->config->get('config_admin_limit'),
				'limit' => $setting['limit'],

			);

			$data['gallerys']=array();

			$gallery_infos = $this->model_extension_gallery->getgallerys($filter_data);

			 foreach($gallery_infos as $gallery_info){

				if($gallery_info['image']){
					$image = $this->model_tool_image->resize($gallery_info['image'],$setting['width'], $setting['height']);
				}else{
					$image = false;
				}
				$totalphoto = $this->model_extension_gallery->countImage($gallery_info['album_id']);

				$data['gallerys'][]=array(
				'album_id' => $gallery_info['album_id'],
				'album'	   => $gallery_info['name'],
				'description' => utf8_substr(strip_tags(html_entity_decode($gallery_info['description'], ENT_QUOTES, 'UTF-8')), 0, 125) . '..',
				'image'		 =>$image,
				'totalphoto' =>$totalphoto,
				'totalview' =>'',
				'href'	     => $this->url->link('extension/photos' .'&album_id='. $gallery_info['album_id'])
				);
			}

		}
		if(isset($this->request->get['album_id'])){
		$this->model_extension_gallery->countalbumView($this->request->get['album_id']);
		}
		return $this->load->view('extension/module/tmdgalleryright', $data);
	}
	}
}
?>
