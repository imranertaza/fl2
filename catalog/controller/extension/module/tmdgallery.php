<?php

class ControllerExtensionModuleTmdgallery extends Controller {



	public function index($setting) {



		if(!empty($setting)){



		$this->language->load('extension/module/tmdgallery');



		$this->load->model('extension/gallery');

		$this->load->model('design/layout');



		$this->load->model('tool/image');



		$this->document->addStyle('catalog/view/theme/default/stylesheet/tmdphotogallery.css');

		$this->document->addStyle('catalog/view/javascript/bootstrap/css/bootstrap.min.css');

		$this->document->addScript('catalog/view/javascript/bootstrap/js/bootstrap.min.js');

		$this->document->addStyle('catalog/view/javascript/jquery/owl-carousel/owl.carousel.css');

		$this->document->addScript('catalog/view/javascript/jquery/owl-carousel/owl.carousel.min.js');



		/* new code */

		$this->document->addStyle('catalog/view/theme/default/stylesheet/tmdphotogallery.css');

	

		$data['select_galleryalbums'] = $setting['album_id'];

		/* new code */

		$data['carousel'] = $setting['carousel'];



		$data['gallerys'] = array();



		$data['heading_title'] = $setting['name'];



		$data['text_viewall'] = $this->language->get('text_viewall');

		$data['button_cart'] = $this->language->get('button_cart');

		$data['text_photos'] = $this->language->get('text_photos');



		if(isset($this->request->get['page'])) {

		$page = $this->request->get['page'];

		} else {

		$page = 1;

		}



		$filter_data = array (

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

				/* new code */

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

				if ($info['image']){

					$popup = $this->model_tool_image->resize($info['image'], $popup_width, $popup_height);

				}else{

					$popup = '';

				}

				/* new code */

				$totalphoto = $this->model_extension_gallery->countImage($info['album_id']);

				$data['gallerys'][]= array(

					'album_id'	=> $info['album_id'],

					'album'	   => $info['name'],

					'description' => utf8_substr(strip_tags(html_entity_decode($info['description'], ENT_QUOTES, 'UTF-8')), 0, 125) . '..',

					'totalphoto' =>$totalphoto,

					'image'	=>$images,

					/* new code */

					'popup'     	=> $popup,

					'multiples_images'     => array(),

					/* new code */

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



				$totalphoto = $this->model_extension_gallery->countImage($album_id);



				$data['gallerys'][]=array(

				'album_id' => $album_id,

				'album'	   => $name,

				'description' => utf8_substr(strip_tags(html_entity_decode($description, ENT_QUOTES, 'UTF-8')), 0, 125) . '..',

				'image'		 =>$image,

				'totalphoto' =>$totalphoto,

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

				'href'	     => $this->url->link('extension/photos' .'&album_id='. $gallery_info['album_id'])

				);

			}



		}



		return $this->load->view('extension/module/tmdgallery', $data);

	}

	}

}

?>

