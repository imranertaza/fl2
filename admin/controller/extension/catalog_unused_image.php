<?php 
class ControllerExtensionCatalogUnusedImage extends Controller {
	private $error = array(); 
     
	public function index() {
		$this->load->language('extension/catalog_unused_image');

		$this->document->setTitle($this->language->get('heading_title')); 

		$this->load->model('extension/catalog_unused_image');

		$this->getList();
	}


	public function delete() {
		$this->load->language('extension/catalog_unused_image');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('extension/catalog_unused_image');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $image_name) {
				$this->model_extension_catalog_unused_image->deleteUnusedImage($image_name);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';
			
			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . $this->request->get['filter_name'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
			
			$this->response->redirect($this->url->link('extension/catalog_unused_image', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getList();
	}


	protected function getList() {
		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = null;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . $this->request->get['filter_name'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('extension/catalog_unused_image', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		$data['delete'] = $this->url->link('extension/catalog_unused_image/delete', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['scan'] = $this->url->link('extension/catalog_unused_image/scanImages', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['clear_cache'] = $this->url->link('extension/catalog_unused_image/clearCache', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$data['images'] = array();

		$filter_data = array(
			'filter_name'	  => $filter_name, 
			'sort'            => $sort,
			'order'           => $order,
			'start'           => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'           => $this->config->get('config_limit_admin')
		);
		$image_total = $this->model_extension_catalog_unused_image->getTotalImages($filter_data);
		$results = $this->model_extension_catalog_unused_image->getImages($filter_data);

		foreach ($results as $result) {
			$data['images'][] = array(
				'name'       => $result['name'],
				'selected'   => isset($this->request->post['selected']) && in_array($result['name'], $this->request->post['selected']),
			);
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_list'] = $this->language->get('text_list');
		$data['text_confirm'] = $this->language->get('text_confirm');

		$data['entry_name'] = $this->language->get('entry_name');

		$data['column_image'] = $this->language->get('column_image');
		$data['column_name'] = $this->language->get('column_name');
		$data['column_action'] = $this->language->get('column_action');

		$data['button_delete'] = $this->language->get('button_delete');
		$data['button_scan'] = $this->language->get('button_scan');
		$data['button_clear_cache'] = $this->language->get('button_clear_cache');
		$data['button_filter'] = $this->language->get('button_filter');

		$data['user_token'] = $this->session->data['user_token'];

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
		
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . $this->request->get['filter_name'];
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('extension/catalog_unused_image', 'user_token=' . $this->session->data['user_token'] . '&sort=name' . $url, true);

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . $this->request->get['filter_name'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		$pagination = new Pagination();
		$pagination->total = $image_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('extension/catalog_unused_image', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($image_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($image_total - $this->config->get('config_limit_admin'))) ? $image_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $image_total, ceil($image_total / $this->config->get('config_limit_admin')));

		$data['filter_name'] = $filter_name;
		$data['sort'] = $sort;
		$data['order'] = $order;
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/catalog_unused_image_list', $data));
	}


	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'extension/catalog_unused_image')) {
			$this->error['warning'] = $this->language->get('error_permission');  
		}

		return !$this->error;
	}


	public function autocomplete() {
		$json = array();

		if (isset($this->request->get['filter_name'])) {
			$this->load->model('extension/catalog_unused_image');

			if (isset($this->request->get['filter_name'])) {
				$filter_name = $this->request->get['filter_name'];
			} else {
				$filter_name = '';
			}

			if (isset($this->request->get['limit'])) {
				$limit = $this->request->get['limit'];
			} else {
				$limit = 20;
			}

			$data = array(
				'filter_name'         => $filter_name,
				'start'               => 0,
				'limit'               => $limit
			);

			$results = $this->model_extension_catalog_unused_image->getImages($data);

			foreach ($results as $result) {
				$json[] = array(
					'name'       => html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'),	
				);
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}


	public function clearCache() {
		$this->load->model( 'extension/catalog_unused_image' );
		$this->model_extension_catalog_unused_image->clearCache( DIR_IMAGE . 'cache' );
		$this->load->language( 'extension/catalog_unused_image' );
		$this->session->data['success'] = $this->language->get('text_success2');
		$url = '';
		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . $this->request->get['filter_name'];
		}
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		$this->response->redirect( $this->url->link( 'extension/catalog_unused_image', 'user_token=' . $this->session->data['user_token'] . $url, true) );
	}


	public function scanImages() {
		$this->load->model( 'extension/catalog_unused_image' );
		$this->model_extension_catalog_unused_image->scanImages();
		$this->load->language( 'extension/catalog_unused_image' );
		$this->session->data['success'] = $this->language->get('text_success3');
		$url = '';
		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . $this->request->get['filter_name'];
		}
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		$this->response->redirect( $this->url->link( 'extension/catalog_unused_image', 'user_token=' . $this->session->data['user_token'] . $url, true) );
	}
}
?>