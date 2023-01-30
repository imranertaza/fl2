<?php 
class ControllerExtensiongallery extends Controller{  
	public function index(){ 
		$this->language->load('extension/gallery');
		
		$data['heading_title']= $this->language->get('heading_title');
		$data['error']= $this->language->get('error');
		$this->load->model('extension/gallery');
		$this->document->addStyle('catalog/view/theme/default/stylesheet/tmdphotogallery.css');
		
		$this->load->model('tool/image'); 
		$this->document->setTitle($this->language->get('heading_title'));  
		$data['text_photos'] = $this->language->get('text_photos');
		
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/gallery', '', 'SSL')
		);

	
		$data['text_photos'] = $this->language->get('text_photos');


		$data['gallerys']=array();
		
		if(isset ($this->request->get['album_id']) && !empty($this->request->get['album_id'])){
		
			if(isset($this->request->get['page'])) {
				$page = $this->request->get['page'];
			} else {
				$page = 1;
			}
		
			$url = '';
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/gallery', '&album_id='.$this->request->get['album_id'], 'SSL')
			);

		
			$data = array(
				'start' => ($page - 1) * $this->config->get('config_admin_limit'),
				'limit' => $this->config->get('config_admin_limit'),
				'album_id' => $this->request->get['album_id']
			);
		
			$data['images']=array();
			$photo_count = $this->model_extension_gallery->countImage($data);
			$photo_info = $this->model_extension_gallery->getphotos($data);
		
			foreach($photo_info as $info){
				if($info['images']){
					$images= $this->model_tool_image->resize($info['images'],$this->config->get('gallerysetting_gallery_width'),$this->config->get('gallerysetting_gallery_height'));
				}else{
					$image = $this->model_tool_image->resize('placeholder.png',128,148);
				}
				if ($info['images']){
					$popup = $this->model_tool_image->resize($info['images'], $this->config->get('config_image_popup_width'), $this->config->get('config_image_popup_height'));
				}else{
					$popup = '';
				}
			
				$data['images'][]= array(
					'album_id'	=> $info['album_id'],
					'images'	=>$images,
					'popup'     =>$popup
				);
			}

			$link= $this->request->get['album_id'];

			$pagination = new Pagination();
			$pagination->total = $photo_count;
			$pagination->page = $page;
			$pagination->limit = $this->config->get('config_admin_limit');
			$pagination->text = $this->language->get('text_pagination');
			$pagination->url = $this->url->link('extension/gallery'.'&album_id='. $link.'&page={page}');
			$data['pagination'] = $pagination->render();
			$data['continue'] = $this->url->link('common/home');
			
		} else {

			$data['breadcrumbs'] = array();

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/home')
			);

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/gallery', '', 'SSL')
			);

			$gallery_info = $this->model_extension_gallery->getTmdCategories(0);
			foreach($gallery_info as $gallerys){
				if($gallerys['image']){
					$image = $this->model_tool_image->resize($gallerys['image'],$this->config->get('gallerysetting_gallery_width'),$this->config->get('gallerysetting_gallery_height'));
				} else{
                    $image = $this->model_tool_image->resize('placeholder.png',128,148);
                }
				
			$totalphoto = $this->model_extension_gallery->countImage($gallerys['album_id']);
				
				$data['gallerys'][]=array(
				'album_id' => $gallerys['album_id'],
				'album'	   => $gallerys['name'],
				'description' => utf8_substr(strip_tags(html_entity_decode($gallerys['description'], ENT_QUOTES, 'UTF-8')), 0, 30) . '..',
				'image'		=>$image,
				'totalphoto' =>$totalphoto,
				//'href'	   => $this->url->link('extension/photos' .'&album_id='. $gallerys['album_id'])
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
		
		$gallerylayout =$this->config->get('gallerysetting_gallerylayout');
		
		if($gallerylayout =='layout1'){
		  $this->response->setOutput($this->load->view('extension/gallery1', $data));
		}elseif($gallerylayout =='layout2'){
				$this->response->setOutput($this->load->view('extension/gallery2', $data));
			}elseif($gallerylayout =='layout3'){
				$this->response->setOutput($this->load->view('extension/gallery3', $data));
			} else{
			$this->response->setOutput($this->load->view('extension/gallery', $data));
		}

	}
}
?>