<?php

/*
 * IT IS NOT FREE, YOU SHOULD BUY / REFISTER A LICENSE AT HTTPS://MMOSolution.COM
 * CONTACT: toan@MMOSOLUTION.COM
 * AUTHOR: MMOSOLUTION TEAM AT VIETNAM
 * All code within this file is copyright MMOSOLUTION.COM TEAM | FOUNDED @2012
 * You can not copy or reuse code within this file without written permission.
*/

class ControllerExtensionModuleEditInline extends Controller {

    private $error = array();
    private $default_column = array(
        'model',
        'quantity',
        'price',
        'status',
        'manufacturer_id',
        'seo_keyword',
        'sort_order',
        'minimum',
        'sku',
        'upc',
        'ean',
        'jan',
        'isbn',
        'mpn',
        'location',
        'stock_status_id',
        'shipping',
        'points',
        'tax_class_id',
        'date_available',
        'weight',
        'weight_class_id',
        'length',
        'width',
        'height',
        'length_class_id',
        'subtract'
    );
    private $change_yes_no = array('shipping', 'subtract');
    private $change_enabled_disable = array('status');
    private $selectes_fields = array('stock_status_id', 'manufacturer_id', 'tax_class_id', 'length_class_id', 'weight_class_id');
    private $text_fields = array('price', 'model', 'quantity', 'sku', 'upc', 'ean', 'jan', 'isbn', 'mpn', 'location', 'points', 'length', 'width', 'height', 'weight', 'minimum', 'seo_keyword', 'sort_order', 'date_available');

    public function index() {
        $this->load->language('extension/module/editinline');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->document->addStyle('view/javascript/mmosolution/tree/css/application.css');
        $this->document->addScript('view/javascript/mmosolution/tree/js/jquery-sortable.js');

        $this->load->model('catalog/product');

        $this->load->model('catalog/category');

        $this->load->model('tool/image');

        $this->load->model('extension/module/editinline');

        $this->load->model('setting/setting');

        $data['tab_setting'] = $this->language->get('tab_setting');
        $data['tab_support'] = $this->language->get('tab_support');

        $data['heading_title'] = $this->language->get('heading_title');

        $data['text_edit'] = $this->language->get('text_edit');
        $data['text_show_hide_columns'] = $this->language->get('text_show_hide_columns');
        $data['text_category_edit'] = $this->language->get('text_category_edit');
        $data['text_category_add'] = $this->language->get('text_category_add');
        $data['text_category_delete'] = $this->language->get('text_category_delete');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
        $data['text_yes'] = $this->language->get('text_yes');
        $data['text_no'] = $this->language->get('text_no');
        $data['text_show'] = $this->language->get('text_show');
        $data['text_hide'] = $this->language->get('text_hide');
        $data['text_all_category'] = $this->language->get('text_all_category');
        $data['text_add_product'] = $this->language->get('text_add_product');
        $data['text_copy_product'] = $this->language->get('text_copy_product');
        $data['text_delete_product'] = $this->language->get('text_delete_product');
        $data['text_add_category'] = $this->language->get('text_add_category');
        $data['text_delete_category'] = $this->language->get('text_delete_category');
        $data['text_confirm'] = $this->language->get('text_confirm');
        $data['text_close'] = $this->language->get('text_close');
        $data['text_save'] = $this->language->get('text_save');
        $data['text_loading'] = $this->language->get('text_loading');
        $data['text_cant_sort'] = $this->language->get('text_cant_sort');
        $data['text_enable_all'] = $this->language->get('text_enable_all');
        $data['text_disable_all'] = $this->language->get('text_disable_all');
        $data['text_search_category'] = $this->language->get('text_search_category');
        $data['text_save_template'] = $this->language->get('text_save_template');
        $data['text_quick_choose'] = $this->language->get('text_quick_choose');
        $data['text_name_quick_choose'] = $this->language->get('text_name_quick_choose');
        $data['text_demotype'] = $this->language->get('text_demotype');
        $data['text_demoor'] = $this->language->get('text_demoor');
        $data['text_demourl'] = $this->language->get('text_demourl');
        $data['text_demouser'] = $this->language->get('text_demouser');
        $data['text_demopass'] = $this->language->get('text_demopass');
        $data['text_demosortorder'] = $this->language->get('text_demosortorder');
        $data['text_demotypebellow'] = $this->language->get('text_demotypebellow');
        $data['text_fixed_amount'] = $this->language->get('text_fixed_amount');
        $data['text_percentage'] = $this->language->get('text_percentage');

        $data['entry_no_results'] = $this->language->get('entry_no_results');
        $data['entry_categories'] = $this->language->get('entry_categories');
        $data['entry_products'] = $this->language->get('entry_products');
        $data['entry_current_category'] = $this->language->get('entry_current_category');

        $data['entry_name'] = $this->language->get('entry_name');
        $data['entry_product_id'] = $this->language->get('entry_product_id');
        $data['entry_filter_quantity'] = $this->language->get('entry_filter_quantity');
        $data['entry_quantity'] = $this->language->get('entry_quantity');
        $data['entry_model'] = $this->language->get('entry_model');
        $data['entry_status'] = $this->language->get('entry_status');
        $data['entry_price'] = $this->language->get('entry_price');
        $data['entry_filter_price'] = $this->language->get('entry_filter_price');
        $data['entry_stock_status'] = $this->language->get('entry_stock_status');
        $data['entry_date_available'] = $this->language->get('entry_date_available');
        $data['entry_shipping'] = $this->language->get('entry_shipping');
        $data['entry_tax_class'] = $this->language->get('entry_tax_class');
        $data['entry_priority'] = $this->language->get('entry_priority');
        $data['entry_date_start'] = $this->language->get('entry_date_start');
        $data['entry_date_end'] = $this->language->get('entry_date_end');
        $data['entry_show_limit'] = $this->language->get('entry_show_limit');
        $data['entry_image_addition'] = $this->language->get('entry_image_addition');
        $data['entry_keyword'] = $this->language->get('entry_keyword');
        $data['entry_store'] = $this->language->get('entry_store');

        $data['column_product_id'] = $this->language->get('column_product_id');
        $data['column_name'] = $this->language->get('column_name');
        $data['column_model'] = $this->language->get('column_model');
        $data['column_image'] = $this->language->get('column_image');
        $data['column_price'] = $this->language->get('column_price');
        $data['column_special'] = $this->language->get('column_special');
        $data['column_discount'] = $this->language->get('column_discount');
        $data['column_category'] = $this->language->get('column_category');
        $data['column_quantity'] = $this->language->get('column_quantity');
        $data['column_store'] = $this->language->get('column_store');
        $data['column_reward'] = $this->language->get('column_reward');
        $data['column_status'] = $this->language->get('column_status');
        $data['column_action'] = $this->language->get('column_action');
        $data['column_select'] = $this->language->get('column_select');
        $data['column_sku'] = $this->language->get('column_sku');
        $data['column_upc'] = $this->language->get('column_upc');
        $data['column_ean'] = $this->language->get('column_ean');
        $data['column_jan'] = $this->language->get('column_jan');
        $data['column_isbn'] = $this->language->get('column_isbn');
        $data['column_mpn'] = $this->language->get('column_mpn');
        $data['column_location'] = $this->language->get('column_location');
        $data['column_shipping'] = $this->language->get('column_shipping');
        $data['column_manufacturer_id'] = $this->language->get('column_manufacturer_id');
        $data['column_date_available'] = $this->language->get('column_date_available');
        $data['column_stock_status_id'] = $this->language->get('column_stock_status_id');
        $data['column_tax_class_id'] = $this->language->get('column_tax_class_id');
        $data['column_points'] = $this->language->get('column_points');
        $data['column_subtract'] = $this->language->get('column_subtract');
        $data['column_weight_class_id'] = $this->language->get('column_weight_class_id');
        $data['column_weight'] = $this->language->get('column_weight');
        $data['column_length_class_id'] = $this->language->get('column_length_class_id');
        $data['column_length'] = $this->language->get('column_length');
        $data['column_width'] = $this->language->get('column_width');
        $data['column_height'] = $this->language->get('column_height');
        $data['column_minimum'] = $this->language->get('column_minimum');
        $data['column_seo_keyword'] = $this->language->get('column_seo_keyword');
        $data['column_sort_order'] = $this->language->get('column_sort_order');
        $data['column_drag_drop'] = $this->language->get('column_drag_drop');
        $data['column_image_addition'] = $this->language->get('column_image_addition');
        $data['column_download'] = $this->language->get('column_download');
        $data['column_meta_tag_description'] = $this->language->get('column_meta_tag_description');
        $data['column_meta_tag_keyword'] = $this->language->get('column_meta_tag_keyword');
        $data['column_product_tag'] = $this->language->get('column_product_tag');

        $data['button_cancel'] = $this->language->get('button_cancel');
        $data['button_edit'] = $this->language->get('button_edit');
        $data['button_filter'] = $this->language->get('button_filter');
        $data['button_view'] = $this->language->get('button_view');
        $data['button_remove'] = $this->language->get('button_remove');
        $data['button_update_file'] = $this->language->get('button_update_file');
        $data['button_ultra_add'] = $this->language->get('button_ultra_add');

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL')
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/module/editinline', 'user_token=' . $this->session->data['user_token'], 'SSL')
        );

        $data['MMOS_version'] = '3.0';
        $data['MMOS_code_id'] = 'MMOSOC190';

        $data['cancel'] = $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL');

        $data['default_product_colomn'] = $this->default_column;

        if (isset($this->session->data['current_category'])) {
            $data['current_category'] = $this->session->data['current_category'];
        } else {
            $data['current_category'] = -1;
        }

        $data['edit_breadcrumb'] = '';

        if ($data['current_category'] != -1) {
            $data['edit_breadcrumb'] = $this->model_extension_module_editinline->getbreadcrumb($data['current_category']);
        } else {
            $data['edit_breadcrumb'] = $this->language->get('text_all_category');
        }

        $defaut_show_hide = array(
            'column_image' => true,
            'column_name' => true,
            'column_id' => true,
            'column_model' => true,
            'column_price' => true,
            'column_quantity' => true,
            'column_status' => true,
            'column_manufacturer_id' => true,
            'column_action' => true,
            'column_select' => true,
            'column_drag_drop' => true,
            'showhidetree' => true,
            'left_percent' => 25,
            'right_percent' => 75
        );

        $data['templates'] = array();

        $template_showhides = $this->model_extension_module_editinline->getTemplateShowHide();

        if (empty($template_showhides)) {
            $defaut_show_hide['idtemplate'] = $this->user->getId();
            $defaut_show_hide['nametemplate'] = 'default';
            $this->model_setting_setting->editSetting('editinline_template_show_hide_' . $this->user->getId(), array('editinline_template_show_hide_' . $this->user->getId() => $defaut_show_hide));
            $data['templates'][] = $defaut_show_hide;
        }

        foreach ($template_showhides as $template_showhide) {
            $data['templates'][] = $this->config->get($template_showhide['key']);
        }

        if (isset($this->request->get['template']) && $this->request->get['template']) {
            $data['showhide'] = $this->config->get('editinline_template_show_hide_' . $this->request->get['template']);
        } else {
            $data['showhide'] = $this->config->get('editinline_show_value_' . $this->user->getId());
        }

        if (empty($data['showhide'])) {
            $this->model_setting_setting->editSetting('editinline_show_value_' . $this->user->getId(), array('editinline_show_value_' . $this->user->getId() => $defaut_show_hide));
            $data['showhide'] = $defaut_show_hide;
        }

        if (isset($data['showhide']['showhidetree'])) {
            $data['showhidetree'] = $data['showhide']['showhidetree'];
        } else {
            $data['showhidetree'] = '1';
        }

        if (isset($this->session->data['sort'])) {
            $data['sort'] = $this->session->data['sort'];
        } else {
            $data['sort'] = 'pd.name';
        }

        if (isset($this->session->data['page'])) {
            $data['page'] = $this->session->data['page'];
        } else {
            $data['page'] = 1;
        }

        if (isset($this->session->data['order'])) {
            $data['order'] = $this->session->data['order'];
        } else {
            $data['order'] = 'ASC';
        }

        if (isset($this->session->data['filter_name'])) {
            $data['filter_name'] = $this->session->data['filter_name'];
        } else {
            $data['filter_name'] = null;
        }

        if (isset($this->session->data['filter_date_available'])) {
            $data['filter_date_available'] = $this->session->data['filter_date_available'];
        } else {
            $data['filter_date_available'] = null;
        }

        if (isset($this->session->data['filter_show_limit'])) {
            $data['filter_show_limit'] = $this->session->data['filter_show_limit'];
        } else {
            $data['filter_show_limit'] = $this->config->get('config_limit_admin');
        }

        $limits = array($this->config->get('config_limit_admin'), 5, 15, 25, 50, 75, 100);

        $data['limits'] = array_unique($limits);

        asort($data['limits']);

        $this->session->data['filter_show_limit'] = $data['filter_show_limit'];

        if (isset($this->session->data['filter_model'])) {
            $data['filter_model'] = $this->session->data['filter_model'];
        } else {
            $data['filter_model'] = null;
        }

        if (isset($this->session->data['filter_product_id'])) {
            $data['filter_product_id'] = $this->session->data['filter_product_id'];
        } else {
            $data['filter_product_id'] = '';
        }

        if (isset($this->session->data['filter_price'])) {
            $data['filter_price'] = $this->session->data['filter_price'];
        } else {
            $data['filter_price'] = null;
        }

        if (isset($this->session->data['filter_quantity'])) {
            $data['filter_quantity'] = $this->session->data['filter_quantity'];
        } else {
            $data['filter_quantity'] = null;
        }

        if (isset($this->session->data['filter_status'])) {
            $data['filter_status'] = $this->session->data['filter_status'];
        } else {
            $data['filter_status'] = null;
        }

        if (isset($this->session->data['filter_shipping'])) {
            $data['filter_shipping'] = $this->session->data['filter_shipping'];
        } else {
            $data['filter_shipping'] = null;
        }

        if (isset($this->session->data['filter_stock_status'])) {
            $data['filter_stock_status'] = $this->session->data['filter_stock_status'];
        } else {
            $data['filter_stock_status'] = null;
        }

        if (isset($this->session->data['filter_tax_class'])) {
            $data['filter_tax_class'] = $this->session->data['filter_tax_class'];
        } else {
            $data['filter_tax_class'] = null;
        }
        if (isset($this->session->data['filter_manufacturer_id'])) {
            $data['filter_manufacturer_id'] = $this->session->data['filter_manufacturer_id'];
        } else {
            $data['filter_manufacturer_id'] = null;
        }

        $this->load->model('localisation/language');

        $data['languages'] = $this->model_localisation_language->getLanguages();

        $this->load->model('localisation/stock_status');

        $data['stock_statuses'] = $this->model_localisation_stock_status->getStockStatuses();

        $this->load->model('localisation/weight_class');

        $data['weight_classes'] = $this->model_localisation_weight_class->getWeightClasses();

        $this->load->model('localisation/length_class');

        $data['length_classes'] = $this->model_localisation_length_class->getLengthClasses();

        $this->load->model('localisation/tax_class');

        $data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();

        $this->load->model('catalog/manufacturer');

        $data['manufacturers'] = $this->model_catalog_manufacturer->getManufacturers();


        if (version_compare(VERSION, '2.0.3.1') > 0) {
            $this->load->model('customer/customer_group');
            $data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();
        } else {
            $this->load->model('sale/customer_group');
            $data['customer_groups'] = $customer_groups = $this->model_sale_customer_group->getCustomerGroups();
        }

        if (version_compare(VERSION, '2.2.0.0') >= 0) {
            $data['opencart_version'] = "greater";
        } else {
            $data['opencart_version'] = "less";
        }

        $data['placeholder'] = $this->model_tool_image->resize('no_image.png', 40, 40);

        $data['user_token'] = $this->session->data['user_token'];

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/editinline', $data));
    }

    public function categories() {
        $this->load->model('extension/module/editinline');
        $this->load->language('extension/module/editinline');

        if (isset($this->session->data['current_category'])) {
            $current_category = $this->session->data['current_category'];
        } else {
            $current_category = -1;
        }

        $json = array();

        $results = $this->model_extension_module_editinline->getCategories(0);

        if ($current_category == -1) {
            $html = '<li class="parent"><span class="item-ca selected"><a href="javascript: void(0);" data-referent="-1">' . $this->language->get('text_all_category') . '</a><span class="item-ca-option pull-right open"><button type="button" class="btn btn-default btn-xs pull-right add-category" ><i class="fa fa-plus"></i></button></span></span></li>';
        } else {
            $html = '<li class="parent"><span class="item-ca"><a href="javascript: void(0);" data-referent="-1">' . $this->language->get('text_all_category') . '</a><span class="item-ca-option pull-right open"><button type="button" class="btn btn-default btn-xs pull-right add-category" ><i class="fa fa-plus"></i></button></span></span></li>';
        }

        foreach ($results as $result) {

            if ($this->model_extension_module_editinline->checksub($result['category_id'])) {

                $html .= '<li class="parent" data-rel="' . $result['category_id'] . '">';
                if ($current_category == $result['category_id']) {
                    $html .= '<span class="item-ca selected"> <i class="fa fa-arrows"></i> <i class="expan fa fa-chevron-circle-right"></i> ';
                } else {
                    $html .= '<span class="item-ca"> <i class="fa fa-arrows"></i> <i class="expan fa fa-chevron-circle-right"></i> ';
                }
                $html .= '<a href="javascript: void(0);" data-referent="' . $result['category_id'] . '">' . $result['name'] . '</a>';
                $html .= '<span class="item-ca-option pull-right"><button type="button" class="btn btn-default dropdown-toggle btn-xs pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-angle-down"></i></button>';
                $html .= '<ul class="dropdown-menu">';
                $html .= '<li class="edit-category"><a href="javascript: void(0);"><i class="text-primary fa  fa-pencil"></i> ' . $this->language->get('text_category_edit') . '</a></li>';
                $html .= '<li class="add-category"><a href="javascript: void(0);"><i class="text-success fa fa-plus"></i> ' . $this->language->get('text_category_add') . '</a></li>';
                $html .= '<li class="delete-category"><a  href="javascript: void(0);"><i class="text-danger fa fa-times-circle"></i> ' . $this->language->get('text_category_delete') . '</a></li>';
                $html .= '<li role="separator" class="divider-destroy"><i class="fa fa-times"></i></li>';
                $html .= '</ul></span>';
                $html .= '</span>';

                $result_childs = $this->model_extension_module_editinline->getCategories($result['category_id']);

                if ($result_childs) {

                    $html .= '<ul data-parent="' . $result['category_id'] . '">';

                    foreach ($result_childs as $result_child) {

                        if ($this->model_extension_module_editinline->checksub($result_child['category_id'])) {

                            $html .= '<li class="parent" data-rel="' . $result_child['category_id'] . '">';
                            if ($current_category == $result_child['category_id']) {
                                $html .= '<span class="item-ca selected"> <i class="fa fa-arrows"></i> <i class="expan fa fa-chevron-circle-right"></i> ';
                            } else {
                                $html .= '<span class="item-ca"> <i class="fa fa-arrows"></i> <i class="expan fa fa-chevron-circle-right"></i> ';
                            }
                            $html .= '<a href="javascript: void(0);" data-referent="' . $result_child['category_id'] . '">' . $result_child['name'] . '</a>';
                            $html .= '<span class="item-ca-option pull-right"><button type="button" class="btn btn-default dropdown-toggle btn-xs pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-angle-down"></i></button>';
                            $html .= '<ul class="dropdown-menu">';
                            $html .= '<li class="edit-category"><a href="javascript: void(0);"><i class="text-primary fa  fa-pencil"></i> ' . $this->language->get('text_category_edit') . '</a></li>';
                            $html .= '<li class="add-category"><a href="javascript: void(0);"><i class="text-success fa fa-plus"></i> ' . $this->language->get('text_category_add') . '</a></li>';
                            $html .= '<li class="delete-category"><a  href="javascript: void(0);"><i class="text-danger fa fa-times-circle"></i> ' . $this->language->get('text_category_delete') . '</a></li>';
                            $html .= '<li role="separator" class="divider-destroy"><i class="fa fa-times"></i></li>';
                            $html .= '</ul></span>';
                            $html .= '</span>';

                            $result_sub_childs = $this->model_extension_module_editinline->getCategories($result_child['category_id']);

                            if ($result_sub_childs) {

                                $html .= '<ul data-parent="' . $result['category_id'] . '">';

                                foreach ($result_sub_childs as $result_sub_child) {

                                    if ($this->model_extension_module_editinline->checksub($result_sub_child['category_id'])) {

                                        $html .= '<li class="parent" data-rel="' . $result_sub_child['category_id'] . '">';
                                        if ($current_category == $result_sub_child['category_id']) {
                                            $html .= '<span class="item-ca selected"> <i class="fa fa-arrows"></i> <i class="expan fa fa-chevron-circle-right"></i> ';
                                        } else {
                                            $html .= '<span class="item-ca"> <i class="fa fa-arrows"></i> <i class="expan fa fa-chevron-circle-right"></i> ';
                                        }
                                        $html .= '<a href="javascript: void(0);" data-referent="' . $result_sub_child['category_id'] . '">' . $result_sub_child['name'] . '</a>';
                                        $html .= '<span class="item-ca-option pull-right"><button type="button" class="btn btn-default dropdown-toggle btn-xs pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-angle-down"></i></button>';
                                        $html .= '<ul class="dropdown-menu">';
                                        $html .= '<li class="edit-category"><a href="javascript: void(0);"><i class="text-primary fa  fa-pencil"></i> ' . $this->language->get('text_category_edit') . '</a></li>';
                                        $html .= '<li class="add-category"><a href="javascript: void(0);"><i class="text-success fa fa-plus"></i> ' . $this->language->get('text_category_add') . '</a></li>';
                                        $html .= '<li class="delete-category"><a  href="javascript: void(0);"><i class="text-danger fa fa-times-circle"></i> ' . $this->language->get('text_category_delete') . '</a></li>';
                                        $html .= '<li role="separator" class="divider-destroy"><i class="fa fa-times"></i></li>';
                                        $html .= '</ul></span>';
                                        $html .= '</span>';

                                        $result_sub_2s = $this->model_extension_module_editinline->getCategories($result_sub_child['category_id']);

                                        if ($result_sub_2s) {
                                            $html .= '<ul data-parent="' . $result_sub_child['category_id'] . '">';
                                            foreach ($result_sub_2s as $result_sub_2) {
                                                if ($this->model_extension_module_editinline->checksub($result_sub_2['category_id'])) {
                                                    $html .= '<li class="parent" data-rel="' . $result_sub_2['category_id'] . '">';
                                                    if ($current_category == $result_sub_2['category_id']) {
                                                        $html .= '<span class="item-ca selected"> <i class="fa fa-arrows"></i> <i class="expan fa fa-chevron-circle-right"></i> ';
                                                    } else {
                                                        $html .= '<span class="item-ca"> <i class="fa fa-arrows"></i> <i class="expan fa fa-chevron-circle-right"></i> ';
                                                    }
                                                    $html .= '<a href="javascript: void(0);" data-referent="' . $result_sub_2['category_id'] . '">' . $result_sub_2['name'] . '</a>';
                                                    $html .= '<span class="item-ca-option pull-right"><button type="button" class="btn btn-default dropdown-toggle btn-xs pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-angle-down"></i></button>';
                                                    $html .= '<ul class="dropdown-menu">';
                                                    $html .= '<li class="edit-category"><a href="javascript: void(0);"><i class="text-primary fa  fa-pencil"></i> ' . $this->language->get('text_category_edit') . '</a></li>';
                                                    $html .= '<li class="add-category"><a href="javascript: void(0);"><i class="text-success fa fa-plus"></i> ' . $this->language->get('text_category_add') . '</a></li>';
                                                    $html .= '<li class="delete-category"><a  href="javascript: void(0);"><i class="text-danger fa fa-times-circle"></i> ' . $this->language->get('text_category_delete') . '</a></li>';
                                                    $html .= '<li role="separator" class="divider-destroy"><i class="fa fa-times"></i></li>';
                                                    $html .= '</ul></span>';
                                                    $html .= '</span>';

                                                    $result_sub_3s = $this->model_extension_module_editinline->getCategories($result_sub_2['category_id']);
                                                    if ($result_sub_3s) {
                                                        $html .= '<ul data-parent="' . $result_sub_2['category_id'] . '">';
                                                        foreach ($result_sub_3s as $result_sub_3) {
                                                            if ($this->model_extension_module_editinline->checksub($result_sub_3['category_id'])) {
                                                                $html .= '<li class="parent" data-rel="' . $result_sub_3['category_id'] . '">';
                                                                if ($current_category == $result_sub_3['category_id']) {
                                                                    $html .= '<span class="item-ca selected"> <i class="fa fa-arrows"></i> <i class="expan fa fa-chevron-circle-right"></i> ';
                                                                } else {
                                                                    $html .= '<span class="item-ca"> <i class="fa fa-arrows"></i> <i class="expan fa fa-chevron-circle-right"></i> ';
                                                                }
                                                                $html .= '<a href="javascript: void(0);" data-referent="' . $result_sub_3['category_id'] . '">' . $result_sub_3['name'] . '</a>';
                                                                $html .= '<span class="item-ca-option pull-right"><button type="button" class="btn btn-default dropdown-toggle btn-xs pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-angle-down"></i></button>';
                                                                $html .= '<ul class="dropdown-menu">';
                                                                $html .= '<li class="edit-category"><a href="javascript: void(0);"><i class="text-primary fa  fa-pencil"></i> ' . $this->language->get('text_category_edit') . '</a></li>';
                                                                $html .= '<li class="add-category"><a href="javascript: void(0);"><i class="text-success fa fa-plus"></i> ' . $this->language->get('text_category_add') . '</a></li>';
                                                                $html .= '<li class="delete-category"><a  href="javascript: void(0);"><i class="text-danger fa fa-times-circle"></i> ' . $this->language->get('text_category_delete') . '</a></li>';
                                                                $html .= '<li role="separator" class="divider-destroy"><i class="fa fa-times"></i></li>';
                                                                $html .= '</ul></span>';
                                                                $html .= '</span>';

                                                                $result_sub_4s = $this->model_extension_module_editinline->getCategories($result_sub_3['category_id']);
                                                                if ($result_sub_4s) {
                                                                    $html .= '<ul data-parent="' . $result_sub_3['category_id'] . '">';
                                                                    foreach ($result_sub_4s as $result_sub_4) {
                                                                        if ($this->model_extension_module_editinline->checksub($result_sub_4['category_id'])) {
                                                                            $html .= '<li class="parent" data-rel="' . $result_sub_4['category_id'] . '">';
                                                                            if ($current_category == $result_sub_4['category_id']) {
                                                                                $html .= '<span class="item-ca selected"> <i class="fa fa-arrows"></i> <i class="expan fa fa-chevron-circle-right"></i> ';
                                                                            } else {
                                                                                $html .= '<span class="item-ca"> <i class="fa fa-arrows"></i> <i class="expan fa fa-chevron-circle-right"></i> ';
                                                                            }
                                                                            $html .= '<a href="javascript: void(0);" data-referent="' . $result_sub_4['category_id'] . '">' . $result_sub_4['name'] . '</a>';
                                                                            $html .= '<span class="item-ca-option pull-right"><button type="button" class="btn btn-default dropdown-toggle btn-xs pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-angle-down"></i></button>';
                                                                            $html .= '<ul class="dropdown-menu">';
                                                                            $html .= '<li class="edit-category"><a href="javascript: void(0);"><i class="text-primary fa  fa-pencil"></i> ' . $this->language->get('text_category_edit') . '</a></li>';
                                                                            $html .= '<li class="add-category"><a href="javascript: void(0);"><i class="text-success fa fa-plus"></i> ' . $this->language->get('text_category_add') . '</a></li>';
                                                                            $html .= '<li class="delete-category"><a  href="javascript: void(0);"><i class="text-danger fa fa-times-circle"></i> ' . $this->language->get('text_category_delete') . '</a></li>';
                                                                            $html .= '<li role="separator" class="divider-destroy"><i class="fa fa-times"></i></li>';
                                                                            $html .= '</ul></span>';
                                                                            $html .= '</span>';

                                                                            $result_sub_5s = $this->model_extension_module_editinline->getCategories($result_sub_4['category_id']);
                                                                            if ($result_sub_5s) {
                                                                                $html .= '<ul data-parent="' . $result_sub_4['category_id'] . '">';
                                                                                foreach ($result_sub_5s as $result_sub_5) {
                                                                                    $html .= '<li data-rel="' . $result_sub_5['category_id'] . '">';
                                                                                    if ($current_category == $result_sub_5['category_id']) {
                                                                                        $html .= '<span class="item-ca selected"> <i class="fa fa-arrows"></i>';
                                                                                    } else {
                                                                                        $html .= '<span class="item-ca"> <i class="fa fa-arrows"></i>';
                                                                                    }
                                                                                    $html .= '<a href="javascript: void(0);" data-referent="' . $result_sub_5['category_id'] . '">' . $result_sub_5['name'] . '</a>';
                                                                                    $html .= '<span class="item-ca-option pull-right"><button type="button" class="btn btn-default dropdown-toggle btn-xs pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-angle-down"></i></button>';
                                                                                    $html .= '<ul class="dropdown-menu">';
                                                                                    $html .= '<li class="edit-category"><a href="javascript: void(0);"><i class="text-primary fa  fa-pencil"></i> ' . $this->language->get('text_category_edit') . '</a></li>';
                                                                                    $html .= '<li class="add-category"><a href="javascript: void(0);"><i class="text-success fa fa-plus"></i> ' . $this->language->get('text_category_add') . '</a></li>';
                                                                                    $html .= '<li class="delete-category"><a  href="javascript: void(0);"><i class="text-danger fa fa-times-circle"></i> ' . $this->language->get('text_category_delete') . '</a></li>';
                                                                                    $html .= '<li role="separator" class="divider-destroy"><i class="fa fa-times"></i></li>';
                                                                                    $html .= '</ul></span>';
                                                                                    $html .= '</span></li>';
                                                                                }
                                                                                $html .='</ul>';
                                                                            }
                                                                            $html .='</li>';
                                                                        } else {
                                                                            $html .= '<li data-rel="' . $result_sub_4['category_id'] . '">';
                                                                            if ($current_category == $result_sub_4['category_id']) {
                                                                                $html .= '<span class="item-ca selected"> <i class="fa fa-arrows"></i>';
                                                                            } else {
                                                                                $html .= '<span class="item-ca"> <i class="fa fa-arrows"></i>';
                                                                            }
                                                                            $html .= '<a href="javascript: void(0);" data-referent="' . $result_sub_4['category_id'] . '">' . $result_sub_4['name'] . '</a>';
                                                                            $html .= '<span class="item-ca-option pull-right"><button type="button" class="btn btn-default dropdown-toggle btn-xs pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-angle-down"></i></button>';
                                                                            $html .= '<ul class="dropdown-menu">';
                                                                            $html .= '<li class="edit-category"><a href="javascript: void(0);"><i class="text-primary fa  fa-pencil"></i> ' . $this->language->get('text_category_edit') . '</a></li>';
                                                                            $html .= '<li class="add-category"><a href="javascript: void(0);"><i class="text-success fa fa-plus"></i> ' . $this->language->get('text_category_add') . '</a></li>';
                                                                            $html .= '<li class="delete-category"><a  href="javascript: void(0);"><i class="text-danger fa fa-times-circle"></i> ' . $this->language->get('text_category_delete') . '</a></li>';
                                                                            $html .= '<li role="separator" class="divider-destroy"><i class="fa fa-times"></i></li>';
                                                                            $html .= '</ul></span>';
                                                                            $html .= '</span></li>';
                                                                        }
                                                                    }
                                                                    $html .='</ul>';
                                                                }
                                                                $html .='</li>';
                                                            } else {
                                                                $html .= '<li data-rel="' . $result_sub_3['category_id'] . '">';
                                                                if ($current_category == $result_sub_3['category_id']) {
                                                                    $html .= '<span class="item-ca selected"> <i class="fa fa-arrows"></i>';
                                                                } else {
                                                                    $html .= '<span class="item-ca"> <i class="fa fa-arrows"></i>';
                                                                }
                                                                $html .= '<a href="javascript: void(0);" data-referent="' . $result_sub_3['category_id'] . '">' . $result_sub_3['name'] . '</a>';
                                                                $html .= '<span class="item-ca-option pull-right"><button type="button" class="btn btn-default dropdown-toggle btn-xs pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-angle-down"></i></button>';
                                                                $html .= '<ul class="dropdown-menu">';
                                                                $html .= '<li class="edit-category"><a href="javascript: void(0);"><i class="text-primary fa  fa-pencil"></i> ' . $this->language->get('text_category_edit') . '</a></li>';
                                                                $html .= '<li class="add-category"><a href="javascript: void(0);"><i class="text-success fa fa-plus"></i> ' . $this->language->get('text_category_add') . '</a></li>';
                                                                $html .= '<li class="delete-category"><a  href="javascript: void(0);"><i class="text-danger fa fa-times-circle"></i> ' . $this->language->get('text_category_delete') . '</a></li>';
                                                                $html .= '<li role="separator" class="divider-destroy"><i class="fa fa-times"></i></li>';
                                                                $html .= '</ul></span>';
                                                                $html .= '</span></li>';
                                                            }
                                                        }
                                                        $html .='</ul>';
                                                    }
                                                    $html .='</li>';
                                                } else {
                                                    $html .= '<li data-rel="' . $result_sub_2['category_id'] . '">';
                                                    if ($current_category == $result_sub_2['category_id']) {
                                                        $html .= '<span class="item-ca selected"> <i class="fa fa-arrows"></i>';
                                                    } else {
                                                        $html .= '<span class="item-ca"> <i class="fa fa-arrows"></i>';
                                                    }
                                                    $html .= '<a href="javascript: void(0);" data-referent="' . $result_sub_2['category_id'] . '">' . $result_sub_2['name'] . '</a>';
                                                    $html .= '<span class="item-ca-option pull-right"><button type="button" class="btn btn-default dropdown-toggle btn-xs pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-angle-down"></i></button>';
                                                    $html .= '<ul class="dropdown-menu">';
                                                    $html .= '<li class="edit-category"><a href="javascript: void(0);"><i class="text-primary fa  fa-pencil"></i> ' . $this->language->get('text_category_edit') . '</a></li>';
                                                    $html .= '<li class="add-category"><a href="javascript: void(0);"><i class="text-success fa fa-plus"></i> ' . $this->language->get('text_category_add') . '</a></li>';
                                                    $html .= '<li class="delete-category"><a  href="javascript: void(0);"><i class="text-danger fa fa-times-circle"></i> ' . $this->language->get('text_category_delete') . '</a></li>';
                                                    $html .= '<li role="separator" class="divider-destroy"><i class="fa fa-times"></i></li>';
                                                    $html .= '</ul></span>';
                                                    $html .= '</span></li>';
                                                }
                                            }
                                            $html .='</ul>';
                                        }
                                        $html .='</li>';
                                    } else {
                                        $html .= '<li data-rel="' . $result_sub_child['category_id'] . '">';
                                        if ($current_category == $result_sub_child['category_id']) {
                                            $html .= '<span class="item-ca selected"> <i class="fa fa-arrows"></i>';
                                        } else {
                                            $html .= '<span class="item-ca"> <i class="fa fa-arrows"></i>';
                                        }
                                        $html .= '<a href="javascript: void(0);" data-referent="' . $result_sub_child['category_id'] . '">' . $result_sub_child['name'] . '</a>';
                                        $html .= '<span class="item-ca-option pull-right"><button type="button" class="btn btn-default dropdown-toggle btn-xs pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-angle-down"></i></button>';
                                        $html .= '<ul class="dropdown-menu">';
                                        $html .= '<li class="edit-category"><a href="javascript: void(0);"><i class="text-primary fa  fa-pencil"></i> ' . $this->language->get('text_category_edit') . '</a></li>';
                                        $html .= '<li class="add-category"><a href="javascript: void(0);"><i class="text-success fa fa-plus"></i> ' . $this->language->get('text_category_add') . '</a></li>';
                                        $html .= '<li class="delete-category"><a  href="javascript: void(0);"><i class="text-danger fa fa-times-circle"></i> ' . $this->language->get('text_category_delete') . '</a></li>';
                                        $html .= '<li role="separator" class="divider-destroy"><i class="fa fa-times"></i></li>';
                                        $html .= '</ul></span>';
                                        $html .= '</span></li>';
                                    }
                                }
                                $html .= '</ul>';
                            }
                            $html .= '</li>';
                        } else {
                            $html .= '<li data-rel="' . $result_child['category_id'] . '">';
                            if ($current_category == $result_child['category_id']) {
                                $html .= '<span class="item-ca selected"> <i class="fa fa-arrows"></i>';
                            } else {
                                $html .= '<span class="item-ca"> <i class="fa fa-arrows"></i>';
                            }
                            $html .= '<a href="javascript: void(0);" data-referent="' . $result_child['category_id'] . '">' . $result_child['name'] . '</a>';
                            $html .= '<span class="item-ca-option pull-right"><button type="button" class="btn btn-default dropdown-toggle btn-xs pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-angle-down"></i></button>';
                            $html .= '<ul class="dropdown-menu">';
                            $html .= '<li class="edit-category"><a href="javascript: void(0);"><i class="text-primary fa  fa-pencil"></i> ' . $this->language->get('text_category_edit') . '</a></li>';
                            $html .= '<li class="add-category"><a href="javascript: void(0);"><i class="text-success fa fa-plus"></i> ' . $this->language->get('text_category_add') . '</a></li>';
                            $html .= '<li class="delete-category"><a  href="javascript: void(0);"><i class="text-danger fa fa-times-circle"></i> ' . $this->language->get('text_category_delete') . '</a></li>';
                            $html .= '<li role="separator" class="divider-destroy"><i class="fa fa-times"></i></li>';
                            $html .= '</ul></span>';
                            $html .= '</span></li>';
                        }
                    }
                    $html .='</ul>';
                }
                $html .= '</li>';
            } else {

                $html .= '<li data-rel="' . $result['category_id'] . '">';
                if ($current_category == $result['category_id']) {
                    $html .= '<span class="item-ca"> <i class="fa fa-arrows"></i>';
                } else {
                    $html .= '<span class="item-ca"> <i class="fa fa-arrows"></i>';
                }
                $html .= '<a href="javascript: void(0);" data-referent="' . $result['category_id'] . '">' . $result['name'] . '</a>';
                $html .= '<span class="item-ca-option pull-right"><button type="button" class="btn btn-default dropdown-toggle btn-xs pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-angle-down"></i></button>';
                $html .= '<ul class="dropdown-menu">';
                $html .= '<li class="edit-category"><a href="javascript: void(0);"><i class="text-primary fa  fa-pencil"></i> ' . $this->language->get('text_category_edit') . '</a></li>';
                $html .= '<li class="add-category"><a href="javascript: void(0);"><i class="text-success fa fa-plus"></i> ' . $this->language->get('text_category_add') . '</a></li>';
                $html .= '<li class="delete-category"><a  href="javascript: void(0);"><i class="text-danger fa fa-times-circle"></i> ' . $this->language->get('text_category_delete') . '</a></li>';
                $html .= '<li role="separator" class="divider-destroy"><i class="fa fa-times"></i></li>';
                $html .= '</ul></span>';
                $html .= '</span></li>';
            }
        }

        $json['html'] = $html;

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function get_edit_inline() {
        $json = array();
        if (!empty($this->request->get['column'])) {
            $column = $this->request->get['column'];

            if ($column == 'stock_status_id') {
                $this->load->model('localisation/stock_status');
                $json['data'] = $this->model_localisation_stock_status->getStockStatuses();
            } else if ($column == 'manufacturer_id') {
                $this->load->model('catalog/manufacturer');
                $json['data'] = $this->model_catalog_manufacturer->getManufacturers();
            } else if ($column == 'tax_class_id') {
                $this->load->model('localisation/tax_class');

                $json['data'] = $this->model_localisation_tax_class->getTaxClasses();
            } else if ($column == 'weight_class_id') {
                $this->load->model('localisation/weight_class');

                $json['data'] = $this->model_localisation_weight_class->getWeightClasses();
            } else if ($column == 'length_class_id') {
                $this->load->model('localisation/length_class');

                $json['data'] = $this->model_localisation_length_class->getLengthClasses();
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function products() {
        $json = array();

        $this->load->language('extension/module/editinline');

        $this->load->model('extension/module/editinline');

        $this->load->model('tool/image');

        $this->load->model('catalog/product');

        $this->load->model('catalog/category');

        $this->load->model('catalog/download');

        if (isset($this->request->post['filter_product_id'])) {
            $filter_product_id = $this->request->post['filter_product_id'];
        } else {
            $filter_product_id = null;
        }

        $this->session->data['filter_product_id'] = $filter_product_id;


        if (isset($this->request->post['filter_name'])) {
            $filter_name = $this->request->post['filter_name'];
        } else {
            $filter_name = null;
        }

        $this->session->data['filter_name'] = $filter_name;

        if (isset($this->request->post['filter_date_available'])) {
            $filter_date_available = $this->request->post['filter_date_available'];
        } else {
            $filter_date_available = null;
        }

        $this->session->data['filter_date_available'] = $filter_date_available;

        if (isset($this->request->post['filter_model'])) {
            $filter_model = $this->request->post['filter_model'];
        } else {
            $filter_model = null;
        }

        $this->session->data['filter_model'] = $filter_model;

        if (isset($this->request->post['filter_price'])) {
            $filter_price = $this->request->post['filter_price'];
        } else {
            $filter_price = null;
        }

        $this->session->data['filter_price'] = $filter_price;

        if (isset($this->request->post['filter_quantity'])) {
            $filter_quantity = $this->request->post['filter_quantity'];
        } else {
            $filter_quantity = null;
        }

        $this->session->data['filter_quantity'] = $filter_quantity;

        if (isset($this->request->post['filter_status'])) {
            $filter_status = $this->request->post['filter_status'];
        } else {
            $filter_status = null;
        }

        $this->session->data['filter_status'] = $filter_status;

        if (isset($this->request->post['filter_shipping'])) {
            $filter_shipping = $this->request->post['filter_shipping'];
        } else {
            $filter_shipping = null;
        }

        $this->session->data['filter_shipping'] = $filter_shipping;

        if (isset($this->request->post['filter_stock_status'])) {
            $filter_stock_status = $this->request->post['filter_stock_status'];
        } else {
            $filter_stock_status = null;
        }

        $this->session->data['filter_stock_status'] = $filter_stock_status;

        if (isset($this->request->post['filter_tax_class'])) {
            $filter_tax_class = $this->request->post['filter_tax_class'];
        } else {
            $filter_tax_class = null;
        }
        $this->session->data['filter_tax_class'] = $filter_tax_class;

        if (isset($this->request->post['filter_manufacturer_id'])) {
            $filter_manufacturer_id = $this->request->post['filter_manufacturer_id'];
        } else {
            $filter_manufacturer_id = null;
        }

        $this->session->data['filter_manufacturer_id'] = $filter_manufacturer_id;

        if (isset($this->request->post['sort'])) {
            $sort = $this->request->post['sort'];
        } else {
            $sort = 'pd.name';
        }

        $this->session->data['sort'] = $sort;

        if (isset($this->request->post['order'])) {
            $order = $this->request->post['order'];
        } else {
            $order = 'ASC';
        }

        $this->session->data['order'] = $order;

        if (isset($this->request->post['page'])) {
            $page = $this->request->post['page'];
        } else {
            $page = 1;
        }

        if (isset($this->request->post['filter_show_limit'])) {
            $filter_show_limit = $this->request->post['filter_show_limit'];
        } else {
            $filter_show_limit = $this->config->get('config_limit_admin');
        }

        if (isset($this->session->data['filter_show_limit']) && ($this->session->data['filter_show_limit'] != $filter_show_limit )) {
            $page = 1;
        }

        $this->session->data['filter_show_limit'] = $filter_show_limit;

        $this->session->data['page'] = $page;

        $filter_data = array(
            'filter_product_id' => $filter_product_id,
            'filter_name' => $filter_name,
            'filter_date_available' => $filter_date_available,
            'filter_model' => $filter_model,
            'filter_price' => $filter_price,
            'filter_quantity' => $filter_quantity,
            'filter_status' => $filter_status,
            'filter_shipping' => $filter_shipping,
            'filter_stock_status' => $filter_stock_status,
            'filter_tax_class' => $filter_tax_class,
            'filter_manufacturer_id' => $filter_manufacturer_id,
            'sort' => $sort,
            'order' => $order,
            'start' => ($page - 1) * $filter_show_limit,
            'limit' => $filter_show_limit
        );


        $html = '';

        $json['edit_breadcrumb'] = '';

        if ($this->request->post['category_id']) {

            if ($this->request->post['category_id'] != -1) {
                $json['edit_breadcrumb'] = $this->model_extension_module_editinline->getbreadcrumb($this->request->post['category_id']);
            } else {
                $json['edit_breadcrumb'] = $this->language->get('text_all_category');
            }

            $totals = $this->model_extension_module_editinline->getTotalProduct($this->request->post['category_id'], $filter_data);

            $pagination = new Pagination();
            $pagination->total = $totals;
            $pagination->page = $page;
            $pagination->limit = $filter_show_limit;
            $pagination->url = '#mmosolution_page-{page}';
            $json['pagination'] = $pagination->render();
            $json['pagination_text'] = sprintf($this->language->get('text_pagination'), ($totals) ? (($page - 1) * $filter_show_limit) + 1 : 0, ((($page - 1) * $filter_show_limit) > ($totals - $filter_show_limit)) ? $totals : ((($page - 1) * $filter_show_limit) + $filter_show_limit), $totals, ceil($totals / $filter_show_limit));

            $results = $this->model_extension_module_editinline->getProduct($this->request->post['category_id'], $filter_data);

            if ($results) {
                foreach ($results as $result) {
                    if (is_file(DIR_IMAGE . $result['image'])) {
                        $image = $this->model_tool_image->resize($result['image'], 40, 40);
                    } else {
                        $image = $this->model_tool_image->resize('no_image.png', 40, 40);
                    }

                    $placeholder = $this->model_tool_image->resize('no_image.png', 40, 40);

                    $href = ($this->request->server['HTTPS']) ? HTTPS_CATALOG : HTTP_CATALOG ;
					$href .= 'index.php?route=product/product&product_id=' . $result['product_id'];

                    $product_specials = $this->model_catalog_product->getProductSpecials($result['product_id']);

                    $product_discounts = $this->model_catalog_product->getProductDiscounts($result['product_id']);

                    $product_categories = $this->model_catalog_product->getProductCategories($result['product_id']);

                    $product_stores = $this->model_catalog_product->getProductStores($result['product_id']);

                    $product_rewards = $this->model_catalog_product->getProductRewards($result['product_id']);

                    $product_images = $this->model_catalog_product->getProductImages($result['product_id']);

                    $product_downloads = $this->model_catalog_product->getProductDownloads($result['product_id']);

                    $product_meta_descriptions = $this->model_extension_module_editinline->getMetatagDescription($result['product_id']);

                    $product_meta_keywords = $this->model_extension_module_editinline->getMetatagKeyword($result['product_id']);

                    $product_tags = $this->model_extension_module_editinline->getProductTag($result['product_id']);

                    $html .= '<tr data-product="' . $result['product_id'] . '" data-name="' . $result['name'] . '">';
                    $html .= '<td class="text-center column_drag_drop"><i class="fa fa-arrows"></i></td>';
                    $html .= '<td class="text-center column_select"><input type="checkbox" name="selected[]" value="' . $result['product_id'] . '" /></td>';
                    $html .= '<td class="text-left column_product_id" >' . $result['product_id'] . '</td>';
                    $html .= '<td class="text-left column_name"><div onclick="edit_name($(this),\'name\',' . $result['product_id'] . ');">' . $result['name'] . '</div></td>';
                    $html .= '<td class="text-center column_image"><a href="" id="thumb-image-' . $result['product_id'] . '" data-toggle="inlineimage" class="img-thumbnail"><img src="' . $image . '" alt="' . $result['name'] . '" title="" data-placeholder="' . $placeholder . '" /></a><input type="hidden" value="' . $result['product_id'] . '" data-directory="' . $result['image'] . '" id="input-image-' . $result['product_id'] . '"/></td>';
                    $html .= '<td class="text-center column_image_addition" style="position: relative;" onclick="edit_beyond(\'image_addition\', \'' . $result['product_id'] . '\' , \'' . $result['name'] . '\');">';
                    foreach ($product_images as $product_image) {
                        if (is_file(DIR_IMAGE . $product_image['image'])) {
                            $thumb = $product_image['image'];
                        } else {
                            $thumb = 'no_image.png';
                        }
                        $html .= '<a dat-imgid="' . $product_image['product_image_id'] . '" dat-prid="' . $result['product_id'] . '" class="img-thumbnail"><img src="' . $this->model_tool_image->resize($thumb, 40, 40) . '" alt="' . $result['name'] . '" /></a>';
                    }
                    $html .= '</td>';
                    $html .= '<td class="text-left column_download" onclick="edit_beyond(\'download\', ' . $result['product_id'] . ',\'' . $result['name'] . '\');">';
                    foreach ($product_downloads as $download_id) {
                        $download_info = $this->model_catalog_download->getDownload($download_id);

                        if ($download_info) {
                            $time_elapsed = $this->time_elapsed_string($download_info['date_added']);
                            $html .= '<span>' . $download_info['name'] . ' <span class="text-warning">(' . $time_elapsed . ')</span>' . '</span><br>';
                        }
                    }
                    $html .= '<td class="text-left column_meta_tag_description" onclick="edit_beyond(\'meta_tag_description\', ' . $result['product_id'] . ',\'' . $result['name'] . '\');">';
                    foreach ($product_meta_descriptions as $language_id => $product_meta_description) {
                        if ($language_id == $this->config->get('config_language_id')) {
                            $meta_description = '';
                            if ($product_meta_description['meta_description']) {
                                $meta_description = utf8_substr(strip_tags(html_entity_decode($product_meta_description['meta_description'], ENT_QUOTES, 'UTF-8')), 0, 18) . '..';
                            }
                            $html .= '<span class="text-info">' . $meta_description . '</span><br>';
                        }
                    }
                    $html .= '</td>';
                    $html .= '<td class="text-left column_meta_tag_keyword" onclick="edit_beyond(\'meta_tag_keyword\', ' . $result['product_id'] . ',\'' . $result['name'] . '\');">';
                    foreach ($product_meta_keywords as $language_id => $product_meta_keyword) {
                        if ($language_id == $this->config->get('config_language_id')) {
                            $meta_keyword = '';
                            if ($product_meta_keyword['meta_keyword']) {
                                $meta_keyword = utf8_substr(strip_tags(html_entity_decode($product_meta_keyword['meta_keyword'], ENT_QUOTES, 'UTF-8')), 0, 18) . '..';
                            }
                            $html .= '<span class="text-info">' . $meta_keyword . '</span><br>';
                        }
                    }
                    $html .= '</td>';
                    $html .= '<td class="text-left column_product_tag" onclick="edit_beyond(\'product_tag\', ' . $result['product_id'] . ',\'' . $result['name'] . '\');">';
                    foreach ($product_tags as $language_id => $product_tag) {
                        if ($language_id == $this->config->get('config_language_id')) {
                            $tag = '';
                            if ($product_tag['tag']) {
                                $tag = utf8_substr(strip_tags(html_entity_decode($product_tag['tag'], ENT_QUOTES, 'UTF-8')), 0, 18) . '..';
                            }
                            $html .= '<span class="text-info">' . $tag . '</span><br>';
                        }
                    }
                    $html .= '</td>';
                    $html .= '<td class="text-left column_category" onclick="edit_beyond(\'category\', ' . $result['product_id'] . ',\'' . $result['name'] . '\');">';
                    foreach ($product_categories as $category_id) {
                        $category_info = $this->model_catalog_category->getCategory($category_id);

                        if ($category_info) {
                            $category_name = ($category_info['path']) ? $category_info['path'] . ' &gt; ' . $category_info['name'] : $category_info['name'];
                            $html .= '<span>' . $category_name . '</span><br>';
                        }
                    }
                    $html .= '</td>';
                    $html .= '<td class="text-left column_special" onclick="edit_beyond(\'special\', ' . $result['product_id'] . ',\'' . $result['name'] . '\');">';
                    foreach ($product_specials as $product_special) {
                        if (($product_special['date_start'] == '0000-00-00' || strtotime($product_special['date_start']) < time()) && ($product_special['date_end'] == '0000-00-00' || strtotime($product_special['date_end']) > time())) {
                            $html .= '<span>' . $product_special['price'] . '</span><br>';
                        }
                    }
                    $html .= '</td>';
                    $html .= '<td class="text-left column_discount" onclick="edit_beyond(\'discount\', ' . $result['product_id'] . ',\'' . $result['name'] . '\');">';
                    foreach ($product_discounts as $product_discount) {
                        if (($product_discount['date_start'] == '0000-00-00' || strtotime($product_discount['date_start']) < time()) && ($product_discount['date_end'] == '0000-00-00' || strtotime($product_discount['date_end']) > time())) {
                            $html .= '<span>' . $product_discount['price'] . '</span><br>';
                        }
                    }
                    $html .= '</td>';
                    foreach ($this->default_column as $key => $value) {

                        if ($value == 'manufacturer_id') {
                            $view = $this->model_extension_module_editinline->getManufacturerName($result['manufacturer_id']);
                        } elseif ($value == 'tax_class_id') {
                            $view = $this->model_extension_module_editinline->getTaxClassName($result['tax_class_id']);
                        } elseif ($value == 'weight_class_id') {
                            $view = $this->model_extension_module_editinline->getWeightClassName($result['weight_class_id']);
                        } elseif ($value == 'length_class_id') {
                            $view = $this->model_extension_module_editinline->getLenghtClassName($result['length_class_id']);
                        } elseif ($value == 'stock_status_id') {
                            $view = $this->model_extension_module_editinline->getStockStatusName($result['stock_status_id']);
                        } elseif ($value == 'seo_keyword') {
                            $view = $this->model_extension_module_editinline->getSeoKeyword($result['product_id']);
                        } else {
                            $view = $result[$value];
                        }
                        if ($view == '') {

                            $view = '<i class="btn btn-info btn-xs fa fa-plus-circle"></i>';
                        }

                        if (in_array($value, $this->change_yes_no)) {
                            $html .= '<td data-column-type="' . $value . '" class="text-center column_' . $value . '" >' . $this->switchbuttons($result[$value], $value) . '</td>';
                        } elseif (in_array($value, $this->change_enabled_disable)) {
                            $html .= '<td data-column-type="' . $value . '" class="text-center column_' . $value . '" >' . $this->switchbuttons($result[$value], $value) . '</td>';
                        } elseif (in_array($value, $this->selectes_fields)) {
                            $html .= '<td class="text-left column_' . $value . '"> <div onclick="edit_inline_select($(this),\'' . $value . '\',' . $result['product_id'] . ',\'' . $result['name'] . '\');">' . $view . '</div></td>';
                        } elseif (in_array($value, $this->text_fields)) {
							if($value == 'seo_keyword'){
                                $html .= '<td class="text-left column_seo_keyword"> <div onclick="edit_beyond(\'seo_keyword\',' . $result['product_id'] . ',\'' . $result['name'] . '\');">';
                                $html .= '<div class="table-responsive seo-keyword-mmos">
                                  <table class="table table-bordered table-hover">
                                    <thead>
                                      <tr>
                                      <td class="text-left">' . $this->language->get('entry_store') . '</td>
                                      <td class="text-left">' . $this->language->get('entry_keyword') . '</td>
                                      </tr>
                                    </thead>
                                    <tbody>';
									$this->load->model('localisation/language');

									$this->load->model('setting/store');

									$data['stores'] = array();

									$data['stores'][] = array(
										'store_id' => 0,
										'name'     => $this->language->get('text_default')
									);

									$stores = $this->model_setting_store->getStores();

									foreach ($stores as $store) {
										$data['stores'][] = array(
											'store_id' => $store['store_id'],
											'name'     => $store['name']
										);
									}

									$languages = $this->model_localisation_language->getLanguages();

									$product_seo_url = $this->model_catalog_product->getProductSeoUrls($result['product_id']);

                    foreach ($data['stores'] as $store) {
                    $html .= '<tr>
                      <td class="text-left">' . $store['name'] . ' </td>
                      <td class="text-left">';
                      foreach ($languages as $language) {
                        $html .= '<div class="input-group"><span class="input-group-addon"><img src="language/' . $language['code'] . '/' . $language['code'] . '.png" title="' . $language['name'] . '" /></span>
                          <input type="text" name="product_seo_url[' . $store['store_id'] . '][' . $language['language_id'] . ']" value="';
                           if(isset($product_seo_url[$store['store_id']][$language['language_id']])) {
                               $html .= $product_seo_url[$store['store_id']][$language['language_id']];
                             }
                           $html .= '" placeholder="' . $this->language->get('entry_keyword') . '" class="form-control" />
                        </div>';
                        //if ($error_keyword[$store['store_id']][$language['language_id']]) {
                            //$html .= '<div class="text-danger">' . $error_keyword[$store['store_id']][$language['language_id']] . '</div>';
                        //}
                      }
                          $html .= '</td>
                        </tr>';
                    }
                    $html .= '</tbody>

                  </table>
                </div>';
                $html .= '</div></td>';
							}else{
								$html .= '<td class="text-left column_' . $value . '"> <div onclick="edit_inline_text($(this),\'' . $value . '\',' . $result['product_id'] . ',\'' . $result['name'] . '\');">' . $view . '</div></td>';
							}
                            //$html .= '<td class="text-left column_' . $value . '"> <div onclick="edit_inline_text($(this),\'' . $value . '\',' . $result['product_id'] . ',\'' . $result['name'] . '\');">' . $view . '</div></td>';
                        }
                    }

                    $html .= '<td class="text-left column_store" onclick="edit_beyond(\'store\', ' . $result['product_id'] . ',\'' . $result['name'] . '\');">';
                    foreach ($product_stores as $store_id) {
                        if ($store_id == 0) {
                            $html .= '<span>' . $this->language->get('text_default') . '</span><br>';
                        } else {
                            $html .= '<span>' . $this->model_extension_module_editinline->getStoreName($store_id) . '</span><br>';
                        }
                    }
                    $html .= '</td>';

                    $html .= '<td class="text-left column_reward" onclick="edit_beyond(\'reward\', ' . $result['product_id'] . ',\'' . $result['name'] . '\');">';
                    foreach ($product_rewards as $reward) {
                        $html .= '<span>' . $reward['points'] . '</span><br>';
                    }
                    $html .= '</td>';
                    $html .= '<td class="text-center column_action"><a href="' . $href . '" target="_blank" data-toggle="tooltip" title="' . $this->language->get('button_view') . '" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a> <button type="button" onclick="edit_catalog(' . $result['product_id'] . ',\'product\');" class="btn btn-primary btn-sm" data-toggle="tooltip" title="' . $this->language->get('button_edit') . '"><i class="fa fa-pencil"></i></button></td>';
                    $html .= '</tr>';
                }

                $json['html'] = $html;
            } else {
                $html .= '<tr>';
                $html .= '<td class="text-center" colspan="30">' . $this->language->get('entry_no_results') . '</td>';
                $html .= '</tr>';
                $json['html'] = $html;
            }

            $this->session->data['current_category'] = $this->request->post['category_id'];
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function switchbuttons($current_status, $action_type) {
// type 1: yes - no ; 2: enabled- disabled

        if (in_array($action_type, $this->change_yes_no)) {
            $language_yes = '<i class="fa fa-arrow-up"></i> ' . $this->language->get('text_yes');
            $language_no = '<i class="fa fa-arrow-down"></i> ' . $this->language->get('text_no');
        } elseif (in_array($action_type, $this->change_enabled_disable)) {
            $language_yes = '<i class="fa fa-eye"></i> ' . $this->language->get('text_enabled');
            $language_no = '<i class="fa fa-eye-slash"></i> ' . $this->language->get('text_disabled');
        }

        if ($current_status) {
            $button = '<button data-new-status="0" title="' . $this->language->get('text_click_change') . '" data-type="' . $action_type . '" class="btn btn-success  btn-sm action_yes_no">' . $language_yes . '<botton>';
        } else {
            $button = '<button data-new-status="1" title="' . $this->language->get('text_click_change') . '" data-type="' . $action_type . '" class="btn btn-default  btn-sm action_yes_no">' . $language_no . '<botton>';
        }
        return $button;
    }

    public function switchbuttons_revert($new_status, $action_type) {
// type 1: yes - no ; 2: enabled- disabled

        if (in_array($action_type, $this->change_yes_no)) {
            $language_yes = '<i class="fa fa-arrow-up"></i> ' . $this->language->get('text_yes');
            $language_no = '<i class="fa fa-arrow-down"></i> ' . $this->language->get('text_no');
        } elseif (in_array($action_type, $this->change_enabled_disable)) {
            $language_yes = '<i class="fa fa-eye"></i> ' . $this->language->get('text_enabled');
            $language_no = '<i class="fa fa-eye-slash"></i> ' . $this->language->get('text_disabled');
        }

        if ($new_status) {
            $button = '<button title="' . $this->language->get('text_click_change') . '" data-new-status="0" data-type="' . $action_type . '" class="btn btn-success  btn-sm action_yes_no">' . $language_yes . '<botton>';
        } else {
            $button = '<button data-new-status="1" title="' . $this->language->get('text_click_change') . '" data-type="' . $action_type . '" class="btn btn-default  btn-sm action_yes_no">' . $language_no . '<botton>';
        }
        return $button;
    }

    public function UpdateProduct() {
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateproduct()) {
            $json = array();
            if (!empty($this->request->post['product_id'])) {

                $this->load->language('extension/module/editinline');

                $this->load->model('extension/module/editinline');

                if ($this->request->post['type'] == 'model') {
                    if (!$this->model_extension_module_editinline->checkexistModel($this->request->post['value'], $this->request->post['product_id'])) {
                        $json['warning'] = sprintf($this->language->get('text_model_existed'), $this->request->post['value']);
                    } elseif ($this->request->post['value'] == '') {
                        $json['warning'] = $this->language->get('error_warning');
                    } else {
                        $this->model_extension_module_editinline->updateProduct($this->request->post['product_id'], $this->request->post['type'], $this->request->post['value']);
                        $json['newValue'] = $this->request->post['value'];
                        $json['success'] = $this->language->get('text_success') . ' ' . $this->language->get('column_' . $this->request->post['type']);
                    }
                } elseif (($this->request->post['type'] == 'sku') || ($this->request->post['type'] == 'upc') || ($this->request->post['type'] == 'ean') || ($this->request->post['type'] == 'jan') || ($this->request->post['type'] == 'isbn') || ($this->request->post['type'] == 'mpn') || ($this->request->post['type'] == 'location') || ($this->request->post['type'] == 'date_available')) {
                    $this->model_extension_module_editinline->updateProduct($this->request->post['product_id'], $this->request->post['type'], $this->request->post['value']);
                    $json['newValue'] = $this->request->post['value'];
                    $json['success'] = $this->language->get('text_success') . ' ' . $this->language->get('column_' . $this->request->post['type']);
                } elseif (($this->request->post['type'] == 'price') || ($this->request->post['type'] == 'length') || ($this->request->post['type'] == 'width') || ($this->request->post['type'] == 'height') || ($this->request->post['type'] == 'weight')) {
                    if (is_numeric($this->request->post['value'])) {
                        $this->model_extension_module_editinline->updateProduct($this->request->post['product_id'], $this->request->post['type'], $this->request->post['value']);
                        if ($this->request->post['type'] == 'price') {
                            $json['newValue'] = number_format($this->request->post['value'], 4, '.', '');
                        } else {
                            $json['newValue'] = number_format($this->request->post['value'], 8, '.', '');
                        }
                        $json['success'] = $this->language->get('text_success') . ' ' . $this->language->get('column_' . $this->request->post['type']);
                    } else {
                        $json['warning'] = $this->language->get('text_is_numeric');
                    }
                } elseif (($this->request->post['type'] == 'quantity') || ($this->request->post['type'] == 'stock_status_id') || ($this->request->post['type'] == 'manufacturer_id') || ($this->request->post['type'] == 'shipping') || ($this->request->post['type'] == 'points') || ($this->request->post['type'] == 'tax_class_id') || ($this->request->post['type'] == 'weight_class_id') || ($this->request->post['type'] == 'length_class_id') || ($this->request->post['type'] == 'subtract') || ($this->request->post['type'] == 'minimum') || ($this->request->post['type'] == 'sort_order') || ($this->request->post['type'] == 'status')) {
                    if (is_numeric($this->request->post['value'])) {
                        $this->model_extension_module_editinline->updateProduct($this->request->post['product_id'], $this->request->post['type'], $this->request->post['value']);
                        $json['newValue'] = $this->request->post['value'];

                        if (in_array($this->request->post['type'], $this->change_yes_no) || in_array($this->request->post['type'], $this->change_enabled_disable)) {
                            $json['newValue'] = $this->switchbuttons_revert($this->request->post['value'], $this->request->post['type']);
                        } elseif (($this->request->post['type'] == 'shipping') || ($this->request->post['type'] == 'subtract')) {
                            $json['newValue'] = ($this->request->post['value']) ? $this->language->get('text_yes') : $this->language->get('text_no');
                        } elseif ($this->request->post['type'] == 'stock_status_id') {
                            $json['newValue'] = $this->model_extension_module_editinline->getStockStatusName($this->request->post['value']);
                        } elseif ($this->request->post['type'] == 'manufacturer_id') {
                            $json['newValue'] = $this->model_extension_module_editinline->getManufacturerName($this->request->post['value']);
                        } elseif ($this->request->post['type'] == 'tax_class_id') {
                            $json['newValue'] = $this->model_extension_module_editinline->getTaxClassName($this->request->post['value']);
                        } elseif ($this->request->post['type'] == 'weight_class_id') {
                            $json['newValue'] = $this->model_extension_module_editinline->getWeightClassName($this->request->post['value']);
                        } elseif ($this->request->post['type'] == 'length_class_id') {
                            $json['newValue'] = $this->model_extension_module_editinline->getLenghtClassName($this->request->post['value']);
                        } else {
                            $json['newValue'] = $this->request->post['value'];
                        }
                        $json['success'] = $this->language->get('text_success') . ' ' . $this->language->get('column_' . $this->request->post['type']);
                    } else {
                        $json['warning'] = $this->language->get('text_is_numeric');
                    }
                } elseif ($this->request->post['type'] == 'name') {
                    foreach ($this->request->post['value'] as $language => $name) {
                        if (empty($name)) {
                            $json['warning'] = $this->language->get('error_warning');
                        }
                    }
                    if (!$json) {
                        $this->model_extension_module_editinline->updateProduct($this->request->post['product_id'], $this->request->post['type'], $this->request->post['value']);
                        $json['newValue'] = html_entity_decode($this->request->post['value'][$this->config->get('config_language_id')]);
                        $json['success'] = ($this->language->get('text_success') . ' ' . $this->language->get('column_' . $this->request->post['type']) . ' ' . $this->request->post['value'][$this->config->get('config_language_id')]);
                    }
                } elseif ($this->request->post['type'] == 'seo_keyword') {
                  if ($this->request->post['product_seo_url']) {
                    $this->load->model('design/seo_url');

                    foreach ($this->request->post['product_seo_url'] as $store_id => $language) {
                      foreach ($language as $language_id => $keyword) {
                        if (!empty($keyword)) {
                          if (count(array_keys($language, $keyword)) > 1) {
                            $json['warning'] = $this->language->get('error_unique');
                          }

                          $seo_urls = $this->model_design_seo_url->getSeoUrlsByKeyword($keyword);

                          foreach ($seo_urls as $seo_url) {
                            if (($seo_url['store_id'] == $store_id) && (!isset($this->request->post['product_id']) || (($seo_url['query'] != 'product_id=' . $this->request->post['product_id'])))) {
                              $json['warning'] = $this->language->get('error_keyword');
                            }
                          }
                        }
                      }
                    }
                  }

                  if(!isset($json['warning'])){
                    $this->model_extension_module_editinline->updateProduct($this->request->post['product_id'], $this->request->post['type'], $this->request->post['product_seo_url']);
                    $json['newValue'] = $this->request->post['product_seo_url'];
                    $json['success'] = $this->language->get('text_success') . ' ' . $this->language->get('column_' . $this->request->post['type']);
                  }
                } elseif ($this->request->post['type'] == 'category') {
                    if (isset($this->request->post['product_category'])) {
                        $value = $this->request->post['product_category'];
                    } else {
                        $value = array();
                    }
                    $this->model_extension_module_editinline->updateProduct($this->request->post['product_id'], $this->request->post['type'], $value);
                    $json['success'] = $this->language->get('text_success') . ' ' . $this->language->get('column_' . $this->request->post['type']);
                } elseif ($this->request->post['type'] == 'download') {
                    if (isset($this->request->post['product_download'])) {
                        $value = $this->request->post['product_download'];
                    } else {
                        $value = array();
                    }
                    $this->model_extension_module_editinline->updateProduct($this->request->post['product_id'], $this->request->post['type'], $value);
                    $json['success'] = $this->language->get('text_success') . ' ' . $this->language->get('column_' . $this->request->post['type']);
                } elseif ($this->request->post['type'] == 'meta_tag_description') {
                    if (isset($this->request->post['product_meta_description'])) {
                        $value = $this->request->post['product_meta_description'];
                    } else {
                        $value = array();
                    }
                    $this->model_extension_module_editinline->updateProduct($this->request->post['product_id'], $this->request->post['type'], $value);
                    $json['success'] = $this->language->get('text_success') . ' ' . $this->language->get('column_' . $this->request->post['type']);
                } elseif ($this->request->post['type'] == 'meta_tag_keyword') {
                    if (isset($this->request->post['product_meta_keyword'])) {
                        $value = $this->request->post['product_meta_keyword'];
                    } else {
                        $value = array();
                    }
                    $this->model_extension_module_editinline->updateProduct($this->request->post['product_id'], $this->request->post['type'], $value);
                    $json['success'] = $this->language->get('text_success') . ' ' . $this->language->get('column_' . $this->request->post['type']);
                } elseif ($this->request->post['type'] == 'product_tag') {
                    if (isset($this->request->post['product_tag'])) {
                        $value = $this->request->post['product_tag'];
                    } else {
                        $value = array();
                    }
                    $this->model_extension_module_editinline->updateProduct($this->request->post['product_id'], $this->request->post['type'], $value);
                    $json['success'] = $this->language->get('text_success') . ' ' . $this->language->get('column_' . $this->request->post['type']);
                } elseif ($this->request->post['type'] == 'special') {
                    if (isset($this->request->post['product_special'])) {
                        $value = $this->request->post['product_special'];
                    } else {
                        $value = array();
                    }
                    $this->model_extension_module_editinline->updateProduct($this->request->post['product_id'], $this->request->post['type'], $value);
                    $json['success'] = $this->language->get('text_success') . ' ' . $this->language->get('column_' . $this->request->post['type']);
                } elseif ($this->request->post['type'] == 'discount') {
                    if (isset($this->request->post['product_discount'])) {
                        $value = $this->request->post['product_discount'];
                    } else {
                        $value = array();
                    }
                    $this->model_extension_module_editinline->updateProduct($this->request->post['product_id'], $this->request->post['type'], $value);
                    $json['success'] = $this->language->get('text_success') . ' ' . $this->language->get('column_' . $this->request->post['type']);
                } elseif ($this->request->post['type'] == 'store') {
                    if (isset($this->request->post['product_store'])) {
                        $value = $this->request->post['product_store'];
                    } else {
                        $value = array();
                    }
                    $this->model_extension_module_editinline->updateProduct($this->request->post['product_id'], $this->request->post['type'], $value);
                    $json['success'] = $this->language->get('text_success') . ' ' . $this->language->get('column_' . $this->request->post['type']);
                } elseif ($this->request->post['type'] == 'reward') {
                    $value = array(
                        'points' => $this->request->post['points'],
                        'product_reward' => $this->request->post['product_reward']
                    );

                    $this->model_extension_module_editinline->updateProduct($this->request->post['product_id'], $this->request->post['type'], $value);
                    $json['success'] = $this->language->get('text_success') . ' ' . $this->language->get('column_' . $this->request->post['type']);
                } elseif ($this->request->post['type'] == 'image') {
                    $this->model_extension_module_editinline->updateProduct($this->request->post['product_id'], $this->request->post['type'], $this->request->post['value']);
                    $json['success'] = $this->language->get('text_success') . ' ' . $this->language->get('column_' . $this->request->post['type']);
                    $this->load->model('tool/image');
                    $json['image'] = $this->model_tool_image->resize($this->request->post['value'], 40, 40);
                } elseif ($this->request->post['type'] == 'image_addition') {
                    if (isset($this->request->post['product_image'])) {
                        $value = $this->request->post['product_image'];
                    } else {
                        $value = array();
                    }
                    $this->model_extension_module_editinline->updateProduct($this->request->post['product_id'], $this->request->post['type'], $value);
                    $json['success'] = $this->language->get('text_success') . ' ' . $this->language->get('column_' . $this->request->post['type']);
                }
            }
        } else {
            $json['warning'] = $this->error['warning'];
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function getMultiName() {
        $json = array();

        $this->load->model('extension/module/editinline');

        $this->load->model('localisation/language');

        $languages = $this->model_localisation_language->getLanguages();

        foreach ($languages as $language) {
            $json['multi_name'][$language['language_id']] = $this->model_extension_module_editinline->getMultilanguageName($this->request->post['product_id'], $language['language_id']);
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function ContentCatalog() {
        $json = array();

        if ($this->request->post['type'] == 'product') {
            if ($this->request->post['catalog_id']) {
                $json['url'] = $this->url->link('catalog/product/edit', 'user_token=' . $this->session->data['user_token'] . '&product_id=' . $this->request->post['catalog_id'], 'SSL');
            } else {
                $json['url'] = $this->url->link('catalog/product/add', 'user_token=' . $this->session->data['user_token'], 'SSL');
            }
        } elseif ($this->request->post['type'] == 'category') {
            if ($this->request->post['catalog_id']) {
                $json['url'] = $this->url->link('catalog/category/edit', 'user_token=' . $this->session->data['user_token'] . '&category_id=' . $this->request->post['catalog_id'], 'SSL');
            } else {
                if (isset($this->request->post['parent_id'])) {
                    $json['url'] = $this->url->link('catalog/category/add', 'user_token=' . $this->session->data['user_token'] . '&parent_id=' . $this->request->post['parent_id'], 'SSL');
                } else {
                    $json['url'] = $this->url->link('catalog/category/add', 'user_token=' . $this->session->data['user_token'], 'SSL');
                }
            }
        }
        if (isset($json['url'])) {
            $json['url'] = html_entity_decode($json['url'] . '&editinline=true');
        }
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function CopyDeleteCatalog() {
        $this->load->language('extension/module/editinline');

        $this->load->model('catalog/product');

        $this->load->model('catalog/category');

        $json = array();
        if ($this->request->get['type'] == 'product') {
            if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateproduct()) {
                if (isset($this->request->post['selected'])) {
                    if ($this->request->get['action'] == 'copy') {
                        foreach ($this->request->post['selected'] as $product_id) {
                            $this->model_catalog_product->copyProduct($product_id);
                        }
                    } elseif ($this->request->get['action'] == 'delete') {
                        foreach ($this->request->post['selected'] as $product_id) {
                            $this->model_catalog_product->deleteProduct($product_id);
                        }
                    }
                    $json['success'] = sprintf($this->language->get('text_success_catalog'), ucfirst($this->request->get['action']), ucfirst($this->request->get['type']));
                } else {
                    $json['warning'] = $this->language->get('text_warning_catalog');
                }
            } else {
                $json['warning'] = $this->error['warning'];
            }
        } elseif ($this->request->get['type'] == 'category') {
            if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validatecategory()) {
                if ($this->request->post['category_id'] == '-1') {
                    $json['warning'] = $this->language->get('text_warning_catalog_category');
                } else {
                    $this->model_catalog_category->deleteCategory($this->request->post['category_id']);
                    $this->session->data['current_category'] = -1;
                    $json['success'] = sprintf($this->language->get('text_success_catalog'), ucfirst($this->request->get['action']), ucfirst($this->request->get['type']));
                }
            } else {
                $json['warning'] = $this->error['warning'];
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function BeyondProduct() {
        $json = array();

        $this->load->language('extension/module/editinline');
        $this->load->model('extension/module/editinline');
        $this->load->model('catalog/product');
        $this->load->model('catalog/category');
        $this->load->model('catalog/download');

        if ($this->request->post['type'] == 'category') {
            $html = '';
            $html .= '<div class="form-group"><div class="col-sm-12">';
            $html .= '<input type="text" name = "category" value = "" placeholder = "" class="form-control"/>';
            $html .= '<div id = "product-category" class="well well-sm" style = "height: 150px; overflow: auto;">';
            $categories = $this->model_catalog_product->getProductCategories($this->request->post['product_id']);
            foreach ($categories as $category_id) {
                $category_info = $this->model_catalog_category->getCategory($category_id);

                if ($category_info) {
                    $name = ($category_info['path']) ? $category_info['path'] . ' & gt;
        ' . $category_info['name'] : $category_info['name'];
                    $html .= '<div id = "product-category' . $category_info['category_id'] . '"><i class="fa fa-minus-circle"></i> ' . $name;
                    $html .= '<input type="hidden" name = "product_category[]" value = "' . $category_info['category_id'] . '" /></div>';
                }
            }
            $html .= '</div></div></div>';

            $json['html'] = $html;
        } elseif ($this->request->post['type'] == 'special') {


#CUSTOMER GROUPS.
            if (version_compare(VERSION, '2.0.3.1') > 0) {
                $this->load->model('customer/customer_group');
                $customer_groups = $this->model_customer_customer_group->getCustomerGroups();
            } else {
                $this->load->model('sale/customer_group');
                $customer_groups = $customer_groups = $this->model_sale_customer_group->getCustomerGroups();
            }


            $html = '';
            $html .= '<table id = "special" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
        <td class="text-left">' . $this->language->get('entry_customer_group') . '</td>
        <td class="text-right">' . $this->language->get('entry_priority') . '</td>
        <td class="text-right">' . $this->language->get('entry_price') . '</td>
        <td class="text-left">' . $this->language->get('entry_date_start') . '</td>
        <td class="text-left">' . $this->language->get('entry_date_end') . '</td>
        <td></td>
        </tr>
        </thead>
        <tbody>';

            $specials = $this->model_catalog_product->getProductSpecials($this->request->post['product_id']);
            $row = 0;
            foreach ($specials as $special) {
                $date_start = ($special['date_start'] != '0000-00-00') ? $special['date_start'] : '';
                $date_end = ($special['date_end'] != '0000-00-00') ? $special['date_end'] : '';
                $html .= '<tr id = "special-row' . $row . '">';
                $html .= '<td class="text-left"><select name = "product_special[' . $row . '][customer_group_id]" class="form-control">';
                foreach ($customer_groups as $customer_group) {
                    if ($customer_group['customer_group_id'] == $special['customer_group_id']) {
                        $html .= '<option value = "' . $customer_group['customer_group_id'] . '" selected = "selected">' . $customer_group['name'] . '</option>';
                    } else {
                        $html .= '<option value = "' . $customer_group['customer_group_id'] . '">' . $customer_group['name'] . '</option>';
                    }
                }
                $html .= '</select></td>';
                $html .= '<td class="text-right"><input type="text" name = "product_special[' . $row . '][priority]" value = "' . $special['priority'] . '" placeholder = "' . $this->language->get('entry_priority') . '" class="form-control" /></td>';
                $html .= '<td class="text-right"><input type="text" name = "product_special[' . $row . '][price]" value = "' . $special['price'] . '" placeholder = "' . $this->language->get('entry_price') . '" class="form-control" /></td>';
                $html .= '<td class="text-left" style = "width: 20%;"><div class="input-group date">
        <input type="text" name = "product_special[' . $row . '][date_start]" value = "' . $date_start . '" placeholder = "' . $this->language->get('entry_date_start') . '" data-date-format = "YYYY-MM-DD" class="form-control" />
        <span class="input-group-btn">
        <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
        </span></div></td>';
                $html .= '<td class="text-left" style = "width: 20%;"><div class="input-group date">
        <input type="text" name = "product_special[' . $row . '][date_end]" value = "' . $date_end . '" placeholder = "' . $this->language->get('entry_date_end') . '" data-date-format = "YYYY-MM-DD" class="form-control" />
        <span class="input-group-btn">
        <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
        </span></div></td>';
                $html .= '<td class="text-left"><button type="button" onclick = "$(\'#special-row' . $row . '\').remove();" data-toggle = "tooltip" title = "' . $this->language->get('button_remove') . '" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
                $row++;
            }
            $html .= '</tbody>
        <tfoot>
        <tr>
        <td colspan = "5"></td>
        <td class="text-left"><button type="button" onclick = "addSpecial();" data-toggle = "tooltip" title = "' . $this->language->get('button_special_add') . '" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
        </tr>
        </tfoot>
        </table>';

            $json['html'] = $html;
            $json['special_row'] = $row;
        } elseif ($this->request->post['type'] == 'discount') {

#CUSTOMER GROUPS.
            if (version_compare(VERSION, '2.0.3.1') > 0) {
                $this->load->model('customer/customer_group');
                $customer_groups = $this->model_customer_customer_group->getCustomerGroups();
            } else {
                $this->load->model('sale/customer_group');
                $customer_groups = $customer_groups = $this->model_sale_customer_group->getCustomerGroups();
            }

            $html = '';
            $html .= '<table id = "discount" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
        <td class="text-left">' . $this->language->get('entry_customer_group') . '</td>
        <td class="text-left">' . $this->language->get('entry_quantity') . '</td>
        <td class="text-right">' . $this->language->get('entry_priority') . '</td>
        <td class="text-right">' . $this->language->get('entry_price') . '</td>
        <td class="text-left">' . $this->language->get('entry_date_start') . '</td>
        <td class="text-left">' . $this->language->get('entry_date_end') . '</td>
        <td></td>
        </tr>
        </thead>
        <tbody>';

            $discounts = $this->model_catalog_product->getProductDiscounts($this->request->post['product_id']);
            $row = 0;
            foreach ($discounts as $discount) {
                $date_start = ($discount['date_start'] != '0000-00-00') ? $discount['date_start'] : '';
                $date_end = ($discount['date_end'] != '0000-00-00') ? $discount['date_end'] : '';
                $html .= '<tr id = "discount-row' . $row . '">';
                $html .= '<td class="text-left"><select name = "product_discount[' . $row . '][customer_group_id]" class="form-control">';
                foreach ($customer_groups as $customer_group) {
                    if ($customer_group['customer_group_id'] == $discount['customer_group_id']) {
                        $html .= '<option value = "' . $customer_group['customer_group_id'] . '" selected = "selected">' . $customer_group['name'] . '</option>';
                    } else {
                        $html .= '<option value = "' . $customer_group['customer_group_id'] . '">' . $customer_group['name'] . '</option>';
                    }
                }
                $html .= '</select></td>';
                $html .= '<td class="text-right"><input type="text" name = "product_discount[' . $row . '][quantity]" value = "' . $discount['quantity'] . '" placeholder = "' . $this->language->get('entry_quantity') . '" class="form-control" /></td>';
                $html .= '<td class="text-right"><input type="text" name = "product_discount[' . $row . '][priority]" value = "' . $discount['priority'] . '" placeholder = "' . $this->language->get('entry_priority') . '" class="form-control" /></td>';
                $html .= '<td class="text-right"><input type="text" name = "product_discount[' . $row . '][price]" value = "' . $discount['price'] . '" placeholder = "' . $this->language->get('entry_price') . '" class="form-control" /></td>';
                $html .= '<td class="text-left" style = "width: 20%;"><div class="input-group date">
        <input type="text" name = "product_discount[' . $row . '][date_start]" value = "' . $date_start . '" placeholder = "' . $this->language->get('entry_date_start') . '" data-date-format = "YYYY-MM-DD" class="form-control" />
        <span class="input-group-btn">
        <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
        </span></div></td>';
                $html .= '<td class="text-left" style = "width: 20%;"><div class="input-group date">
        <input type="text" name = "product_discount[' . $row . '][date_end]" value = "' . $date_end . '" placeholder = "' . $this->language->get('entry_date_end') . '" data-date-format = "YYYY-MM-DD" class="form-control" />
        <span class="input-group-btn">
        <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
        </span></div></td>';
                $html .= '<td class="text-left"><button type="button" onclick = "$(\'#discount-row' . $row . '\').remove();" data-toggle = "tooltip" title = "' . $this->language->get('button_remove') . '" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
                $row++;
            }
            $html .= '</tbody>
        <tfoot>
        <tr>
        <td colspan = "6"></td>
        <td class="text-left"><button type="button" onclick = "addDiscount();" data-toggle = "tooltip" title = "' . $this->language->get('button_discount_add') . '" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
        </tr>
        </tfoot>
        </table>';

            $json['html'] = $html;
            $json['discount_row'] = $row;
        } elseif ($this->request->post['type'] == 'store') {

            $this->load->model('setting/store');

            $stores = $this->model_setting_store->getStores();

            $product_stores = $this->model_catalog_product->getProductStores($this->request->post['product_id']);

            $html = '';
            $html .= '<div class="form-group">
        <div class="col-sm-12">
        <div class="well well-sm" style = "height: 150px; overflow: auto;">
        <div class="checkbox">
        <label>';
            if (in_array(0, $product_stores)) {
                $html .= '<input type="checkbox" name = "product_store[]" value = "0" checked = "checked" />' . $this->language->get('text_default');
            } else {
                $html .= '<input type="checkbox" name = "product_store[]" value = "0" />' . $this->language->get('text_default');
            }
            $html .= '</label></div>';

            foreach ($stores as $store) {
                $html .= '<div class="checkbox">
        <label>';
                if (in_array($store['store_id'], $product_stores)) {
                    $html .= '<input type="checkbox" name = "product_store[]" value = "' . $store['store_id'] . '" checked = "checked" />' . $store['name'];
                } else {
                    $html .= '<input type="checkbox" name = "product_store[]" value = "' . $store['store_id'] . '"/>' . $store['name'];
                }
                $html .= '</label></div>';
            }
            $html .= '</div>
        </div>
        </div>';
            $json['html'] = $html;

		} elseif ($this->request->post['type'] == 'seo_keyword') {
            $this->load->model('setting/store');
            $data['stores'] = array();

            $data['stores'][] = array(
              'store_id' => 0,
              'name'     => $this->language->get('text_default')
            );

            $stores = $this->model_setting_store->getStores();

            foreach ($stores as $store) {
              $data['stores'][] = array(
                'store_id' => $store['store_id'],
                'name'     => $store['name']
              );
            }

              $this->load->model('localisation/language');

              $languages = $this->model_localisation_language->getLanguages();

              $product_stores = $this->model_catalog_product->getProductStores($this->request->post['product_id']);

              $product_seo_url = $this->model_catalog_product->getProductSeoUrls($this->request->post['product_id']);

              $html = '';
              $html .= '<div class="form-group">
          <div class="col-sm-12">
          <div class="well well-sm" style = "overflow: auto;">
          <div class="checkbox">';


          $html .= '<div class="table-responsive seo-keyword-mmos">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                <td class="text-left">' . $this->language->get('entry_store') . '</td>
                <td class="text-left">' . $this->language->get('entry_keyword') . '</td>
                </tr>
              </thead>
              <tbody>';
              foreach ($data['stores'] as $store) {
              $html .= '<tr>
                <td class="text-left">' . $store['name'] . ' </td>
                <td class="text-left">';
                foreach ($languages as $language) {
                  $html .= '<div class="input-group"><span class="input-group-addon"><img src="language/' . $language['code'] . '/' . $language['code'] . '.png" title="' . $language['name'] . '" /></span>
                    <input type="text" name="product_seo_url[' . $store['store_id'] . '][' . $language['language_id'] . ']" value="';
                     if(isset($product_seo_url[$store['store_id']][$language['language_id']])) {
                         $html .= $product_seo_url[$store['store_id']][$language['language_id']];
                       }
                     $html .= '" placeholder="' . $this->language->get('entry_keyword') . '" class="form-control" />
                  </div>';
                  //if ($error_keyword[$store['store_id']][$language['language_id']]) {
                      //$html .= '<div class="text-danger">' . $error_keyword[$store['store_id']][$language['language_id']] . '</div>';
                  //}
                }
                    $html .= '</td>
                  </tr>';
              }
              $html .= '</tbody>

            </table>
          </div>';
          $html .= '</div>
          </div>
          </div>
          </div>
          </div>';
          $json['html'] = $html;

        } elseif ($this->request->post['type'] == 'reward') {
#CUSTOMER GROUPS.
            if (version_compare(VERSION, '2.0.3.1') > 0) {
                $this->load->model('customer/customer_group');
                $customer_groups = $this->model_customer_customer_group->getCustomerGroups();
            } else {
                $this->load->model('sale/customer_group');
                $customer_groups = $customer_groups = $this->model_sale_customer_group->getCustomerGroups();
            }

            $product_reward = $this->model_catalog_product->getProductRewards($this->request->post['product_id']);

            $html = '';
            $html .= '<div class="form-group">
        <label class="col-lg-2 control-label" for = "input-points"><span data-toggle = "tooltip" title = "' . $this->language->get('help_points') . '">' . $this->language->get('column_reward') . '</span></label>
        <div class="col-lg-10">
        <input type="text" name = "points" value = "' . $this->model_extension_module_editinline->getPoint($this->request->post['product_id']) . '" placeholder = "' . $this->language->get('column_reward') . '" id = "input-points" class="form-control" />
        </div>
        </div>';

            $html .= '<div style = "margin-top: 50px;"><table class="table table-bordered table-hover">
        <thead>
        <tr>
        <td class="text-left">' . $this->language->get('entry_customer_group') . '</td>
        <td class="text-right">' . $this->language->get('column_reward') . '</td>
        </tr>
        </thead>
        <tbody>';
            foreach ($customer_groups as $customer_group) {
                $point = isset($product_reward[$customer_group['customer_group_id']]) ? $product_reward[$customer_group['customer_group_id']]['points'] : '';
                $html .= '<tr><td class="text-left">' . $customer_group['name'] . '</td>';
                $html .= '<td class="text-right"><input type="text" name = "product_reward[' . $customer_group['customer_group_id'] . '][points]" value = "' . $point . '" class="form-control" /></td></tr>';
            }

            $html .= '</tbody></table></div>';
            $json['html'] = $html;
        } elseif ($this->request->post['type'] == 'image_addition') {
            $images = $this->model_catalog_product->getProductImages($this->request->post['product_id']);

            $this->load->model('tool/image');
            $html = '';
            $row = 0;
            $html .= '<table id = "images" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
        <td class="text-left">' . $this->language->get('column_image') . '</td>
        <td class="text-right">' . $this->language->get('column_sort_order') . '</td>
        <td></td>
        </tr>
        </thead>
        <tbody>';

            foreach ($images as $image) {
                if (is_file(DIR_IMAGE . $image['image'])) {
                    $value = $image['image'];
                    $src = $image['image'];
                } else {
                    $value = '';
                    $src = 'no_image.png';
                }

                $html .='<tr id = "image-row' . $row . '">';
                $html .='<td class="text-left"><a href = "" id = "thumb-image' . $row . '" data-toggle = "inlineimage_addition" class="img-thumbnail"><img src = "' . $this->model_tool_image->resize($src, 40, 40) . '" alt = "" title = "" data-placeholder = "' . $this->model_tool_image->resize('no_image.png', 40, 40) . '" /></a><input type="hidden" name = "product_image[' . $row . '][image]" value = "' . $value . '" id = "input-image' . $row . '" /></td>';
                $html .='<td class="text-right"><input type="text" name = "product_image[' . $row . '][sort_order]" value = "' . $image['sort_order'] . '" placeholder = "' . $this->language->get('column_sort_order') . '" class="form-control" /></td>';
                $html .='<td class="text-left"><button type="button" onclick = "$(\'#image-row' . $row . '\').remove();" data-toggle = "tooltip" title = "' . $this->language->get('button_remove') . '" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
                $html .='</tr>';
                $row++;
            }

            $html .= '</tbody>
        <tfoot>
        <tr>
        <td colspan = "2"></td>
        <td class="text-left"><button type="button" onclick = "addImage();" data-toggle = "tooltip" title = "' . $this->language->get('button_image_add') . '" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
        </tr>
        </tfoot>
        </table>';

            $json['html'] = $html;
            $json['image_row'] = $row;
        } elseif ($this->request->post['type'] == 'download') {
            $html = '';
            $html .= '<div class="form-group"><div class="col-sm-12">';
            $html .= '<input type="text" name = "download" value = "" placeholder = "" class="form-control"/>';
            $html .= '<div id = "product-download" class="well well-sm" style = "height: 150px; overflow: auto;">';
            $downloads = $this->model_catalog_product->getProductDownloads($this->request->post['product_id']);
            foreach ($downloads as $download_id) {
                $download_info = $this->model_catalog_download->getDownload($download_id);

                if ($download_info) {
                    $html .= '<div id = "product-download' . $download_info['download_id'] . '"><i class="fa fa-minus-circle"></i> ' . $download_info['name'];
                    $html .= '<button type="button" id="button-update-' . $download_info['download_id'] . '" class="btn btn-warning btn-sm btn-upload" style="margin: 0 5px 0 15px;"><i class="fa fa-refresh"></i> ' . $this->language->get('button_update_file') . '</button>';
                    $html .= '<input type="hidden" name="product_download[]" value="' . $download_info['download_id'] . '" /></div>';
                }
            }
            $html .= '</div>';
            $html .= '<button type="button" id="button-add-download" class="btn btn-primary"><i class="fa fa-plus-square"></i>  ' . $this->language->get('button_add_download') . '</button>';
            $html .= '</div></div>';

            $json['html'] = $html;
        } elseif ($this->request->post['type'] == 'meta_tag_description') {
            $this->load->model('localisation/language');

            $languages = $this->model_localisation_language->getLanguages();

            $product_meta_descriptions = $this->model_extension_module_editinline->getMetatagDescription($this->request->post['product_id']);

            $html = '';
            $html .= '<ul class="nav nav-tabs" id="languagemetatagdescription">';
            foreach ($languages as $language) {
                $html .= '<li><a href="#languagemetatagdescription' . $language['language_id'] . '" data-toggle="tab"><img src="' . $this->compareflag($language) . '" title="' . $language['name'] . '" /> ' . $language['name'] . '</a></li>';
            }
            $html .= '</ul>';
            $html .= '<div class="tab-content">';
            foreach ($languages as $language) {
                $html .= '<div class="tab-pane" id="languagemetatagdescription' . $language['language_id'] . '"> ';
                $html .= '<div class="form-group">';
                $html .= '<div class="col-sm-12">';
                $html .= '<textarea rows="5" name="product_meta_description[' . $language['language_id'] . '][meta_description]" class="form-control">' . (isset($product_meta_descriptions[$language['language_id']]) ? $product_meta_descriptions[$language['language_id']]['meta_description'] : '') . '</textarea>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';
            }
            $html .= '</div>';

            $json['html'] = $html;
        } elseif ($this->request->post['type'] == 'meta_tag_keyword') {
            $this->load->model('localisation/language');

            $languages = $this->model_localisation_language->getLanguages();

            $product_meta_keywords = $this->model_extension_module_editinline->getMetatagKeyword($this->request->post['product_id']);

            $html = '';
            $html .= '<ul class="nav nav-tabs" id="languagemetatagkeyword">';
            foreach ($languages as $language) {
                $html .= '<li><a href="#languagemetatagkeyword' . $language['language_id'] . '" data-toggle="tab"><img src="' . $this->compareflag($language) . '" title="' . $language['name'] . '" /> ' . $language['name'] . '</a></li>';
            }
            $html .= '</ul>';
            $html .= '<div class="tab-content">';
            foreach ($languages as $language) {
                $html .= '<div class="tab-pane" id="languagemetatagkeyword' . $language['language_id'] . '"> ';
                $html .= '<div class="form-group">';
                $html .= '<div class="col-sm-12">';
                $html .= '<textarea rows="5" name="product_meta_keyword[' . $language['language_id'] . '][meta_keyword]" class="form-control">' . (isset($product_meta_keywords[$language['language_id']]) ? $product_meta_keywords[$language['language_id']]['meta_keyword'] : '') . '</textarea>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';
            }
            $html .= '</div>';

            $json['html'] = $html;
        } elseif ($this->request->post['type'] == 'product_tag') {
            $this->load->model('localisation/language');

            $languages = $this->model_localisation_language->getLanguages();

            $product_tags = $this->model_extension_module_editinline->getProductTag($this->request->post['product_id']);

            $html = '';
            $html .= '<ul class="nav nav-tabs" id="languageproducttag">';
            foreach ($languages as $language) {
                $html .= '<li><a href="#languageproducttag' . $language['language_id'] . '" data-toggle="tab"><img src="' . $this->compareflag($language) . '" title="' . $language['name'] . '" /> ' . $language['name'] . '</a></li>';
            }
            $html .= '</ul>';
            $html .= '<div class="tab-content">';
            foreach ($languages as $language) {
                $html .= '<div class="tab-pane" id="languageproducttag' . $language['language_id'] . '"> ';
                $html .= '<div class="form-group">';
                $html .= '<div class="col-sm-12">';
                $html .= '<input type="text" name="product_tag[' . $language['language_id'] . '][tag]" value="' . (isset($product_tags[$language['language_id']]) ? $product_tags[$language['language_id']]['tag'] : '') . '" class="form-control" />';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';
            }
            $html .= '</div>';

            $json['html'] = $html;
        }

        $json['type'] = $this->request->post['type'];
        $json['name'] = $this->request->post['name'];
        $json['product_id'] = $this->request->post['product_id'];

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function sortablecategory() {
        $json = array();

        $this->load->model('extension/module/editinline');

        if ($this->request->post['category_id']) {
            $i = 0;
            $j = 0;
            $k = 0;
            $this->model_extension_module_editinline->sortableCategory($this->request->post['category_id'], $this->request->post['parent_id']);

            $sortables = json_decode(html_entity_decode($this->request->post['sortables']), true);
            $sortables = $sortables[0];
            foreach ($sortables as $sortable) {
                if (!empty($sortable)) {
                    $this->model_extension_module_editinline->updateSortOrderCategory($sortable['rel'], $i);
                    $childrens = $sortable['children'][0];
                    foreach ($childrens as $children) {
                        if (!empty($children)) {
                            $this->model_extension_module_editinline->updateSortOrderCategory($children['rel'], $j);
                            $subs = $children['children'][0];
                            foreach ($subs as $sub) {
                                if (!empty($sub)) {
                                    $this->model_extension_module_editinline->updateSortOrderCategory($sub['rel'], $k);
                                }
                                $k++;
                            }
                        }
                        $j++;
                    }
                    $i++;
                }
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function sortableproduct() {

        $json = array();

        $this->load->model('extension/module/editinline');

        if (isset($this->request->get['product_id']) && isset($this->request->get['category_id'])) {

            $sort_data = array(
                'product_id' => $this->request->get['product_id'],
                'category_id' => $this->request->get['category_id'],
                'sort_order' => $this->request->get['sort_order']
            );
            $this->model_extension_module_editinline->updateSortOrderProduct($sort_data);
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function setShowHide() {
        $json = array();
        $old_config_show = $this->config->get('editinline_show_value_' . $this->user->getId());
        if (!isset($this->request->post['column'])) {
            if ($this->request->post['value'] == 'false') {
                unset($old_config_show[$this->request->post['key']]);
            } else {
                $old_config_show[$this->request->post['key']] = true;
            }
        } else {
            $total_width = (int) $this->request->post['left'] + (int) $this->request->post['right'];
            $old_config_show['left_percent'] = intval(((int) $this->request->post['left'] / $total_width) * 100);
            if ($old_config_show['left_percent'] < 7) {

                $old_config_show['left_percent'] = 7;
            }
            $old_config_show['right_percent'] = 100 - $old_config_show['left_percent'];
        }

        $this->load->model('setting/setting');
        $this->model_setting_setting->editSetting('editinline_show_value_' . $this->user->getId(), array('editinline_show_value_' . $this->user->getId() => $old_config_show));

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function savetemplateShowHide() {
        $this->load->language('extension/module/editinline');
        $this->load->model('extension/module/editinline');
        $this->load->model('setting/setting');
        $json = array();
        $get_template_id = $this->model_extension_module_editinline->countTemplateShowHide();
        $current_config_show = $this->config->get('editinline_show_value_' . $this->user->getId());
        $current_config_show['idtemplate'] = $get_template_id;
        if (isset($this->request->post['nametemplate']) && $this->request->post['nametemplate'] != '') {
            $json['success'] = $this->language->get('text_save_template');
            $current_config_show['nametemplate'] = $this->request->post['nametemplate'];
            $this->model_setting_setting->editSetting('editinline_template_show_hide_' . $get_template_id, array('editinline_template_show_hide_' . $get_template_id => $current_config_show));
        } else {
            $json['error'] = $this->language->get('text_save_template_error');
        }


        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function gettemplateshowhide() {
        $this->load->language('extension/module/editinline');
        $this->load->model('extension/module/editinline');
        $template_showhides = $this->model_extension_module_editinline->getTemplateShowHide();
        $html = '';
        foreach ($template_showhides as $template_showhide) {
            $template = $this->config->get($template_showhide['key']);
            if ($template['idtemplate'] == 1) {
                $html .= '<li class = "list-group-item"><a href = "index.php?route=extension/module/editinline&user_token=' . $this->session->data['user_token'] . '&template=' . $template['idtemplate'] . '">' . $template['nametemplate'] . '</a></span></li>';
            } else {
                $html .= '<li class = "list-group-item"><a href = "index.php?route=extension/module/editinline&user_token=' . $this->session->data['user_token'] . '&template=' . $template['idtemplate'] . '">' . $template['nametemplate'] . '</a><span onclick="delete_template($(this), ' . $template['idtemplate'] . ')" class = "pull-right"><i class = "text-danger fa fa-trash" aria-hidden = "true"></i></span></li>';
            }
        }
        $json['html'] = $html;
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function deletetemplate() {
        $this->load->language('extension/module/editinline');
        $this->load->model('extension/module/editinline');
        $json = array();
        $this->model_extension_module_editinline->deleteTemplate($this->request->post['template_id']);
        $json['success'] = $this->language->get('text_delete_template');
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function setShowHideTree() {
        $json = array();

        $old_config_show = $this->config->get('editinline_show_value_' . $this->user->getId());

        $old_config_show['showhidetree'] = (int) $this->request->post['attribute'];

        $this->load->model('setting/setting');
        $this->model_setting_setting->editSetting('editinline_show_value_' . $this->user->getId(), array('editinline_show_value_' . $this->user->getId() => $old_config_show));

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function removeImageAddition() {
        $json = array();

        $this->load->model('extension/module/editinline');

        if ($this->request->post['image_id']) {
            $this->model_extension_module_editinline->removeImageAddition($this->request->post['product_id'], $this->request->post['image_id']);
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function AllStatusChange() {
        $this->load->language('extension/module/editinline');

        $this->load->model('extension/module/editinline');

        $json = array();

        if (isset($this->request->post['selected'])) {

            foreach ($this->request->post['selected'] as $product_id) {
                $this->model_extension_module_editinline->allStatusChange($product_id, $this->request->get['type']);
            }

            $json['success'] = $this->language->get('text_all_status_changed');
        } else {
            $json['warning'] = $this->language->get('text_warning_select');
        }


        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function success() {
        $this->load->language('extension/module/editinline');

        $data['success'] = $this->session->data['success'];

        if ($this->request->server['HTTPS']) {
            $data['base'] = HTTPS_SERVER;
        } else {
            $data['base'] = HTTP_SERVER;
        }
		$data['url'] = $this->url->link('extension/module/editinline', 'user_token=' . $this->session->data['user_token'], 'SSL');

        $this->response->setOutput($this->load->view('extension/module/editinline_success', $data));
    }

    public function autocomplete() {
        $json = array();

        if (isset($this->request->get['filter_name']) || isset($this->request->get['filter_model'])) {
            $this->load->model('catalog/product');
            $this->load->model('extension/module/editinline');
            $this->load->model('catalog/option');

            if (isset($this->request->get['filter_name'])) {
                $filter_name = $this->request->get['filter_name'];
            } else {
                $filter_name = '';
            }

            if (isset($this->request->get['filter_model'])) {
                $filter_model = $this->request->get['filter_model'];
            } else {
                $filter_model = '';
            }
            if (isset($this->request->get['filter_category_id']) && $this->request->get['filter_category_id'] != -1) {
                $filter_category_id = $this->request->get['filter_category_id'];
            } else {
                $filter_category_id = '';
            }

            if (isset($this->request->get['limit'])) {
                $limit = $this->request->get['limit'];
            } else {
                $limit = 5;
            }

            $filter_data = array(
                'filter_name' => $filter_name,
                'filter_model' => $filter_model,
                'filter_category_id' => $filter_category_id,
                'start' => 0,
                'limit' => $limit
            );

            $results = $this->model_extension_module_editinline->getProducts($filter_data);

            foreach ($results as $result) {
                $option_data = array();

                $product_options = $this->model_catalog_product->getProductOptions($result['product_id']);

                foreach ($product_options as $product_option) {
                    $option_info = $this->model_catalog_option->getOption($product_option['option_id']);

                    if ($option_info) {
                        $product_option_value_data = array();

                        foreach ($product_option['product_option_value'] as $product_option_value) {
                            $option_value_info = $this->model_catalog_option->getOptionValue($product_option_value['option_value_id']);

                            if ($option_value_info) {
                                $product_option_value_data[] = array(
                                    'product_option_value_id' => $product_option_value['product_option_value_id'],
                                    'option_value_id' => $product_option_value['option_value_id'],
                                    'name' => $option_value_info['name'],
                                    'price' => (float) $product_option_value['price'] ? $this->currency->format($product_option_value['price'], $this->config->get('config_currency')) : false,
                                    'price_prefix' => $product_option_value['price_prefix']
                                );
                            }
                        }

                        $option_data[] = array(
                            'product_option_id' => $product_option['product_option_id'],
                            'product_option_value' => $product_option_value_data,
                            'option_id' => $product_option['option_id'],
                            'name' => $option_info['name'],
                            'type' => $option_info['type'],
                            'value' => $product_option['value'],
                            'required' => $product_option['required']
                        );
                    }
                }

                $json[] = array(
                    'product_id' => $result['product_id'],
                    'name' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')),
                    'model' => $result['model'],
                    'option' => $option_data,
                    'price' => $result['price']
                );
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function updatedownload() {

        $json = array();

        $this->language->load('extension/module/editinline');

        foreach ($this->request->post['download_description'] as $download_description) {
            if ((utf8_strlen($download_description['name']) < 3) || (utf8_strlen($download_description['name']) > 64)) {
                $json['error']['name'] = $this->language->get('error_name_upload');
            }
        }

        if ((utf8_strlen($this->request->post['filename']) < 3) || (utf8_strlen($this->request->post['filename']) > 128)) {
            $json['error']['filename'] = $this->language->get('error_filename');
        }

        if (!is_file(DIR_DOWNLOAD . $this->request->post['filename'])) {
            $json['error']['filename'] = $this->language->get('error_exists');
        }

        if ((utf8_strlen($this->request->post['mask']) < 3) || (utf8_strlen($this->request->post['mask']) > 128)) {
            $json['error']['mask'] = $this->language->get('error_mask');
        }

        if (!$json) {
            $this->load->model('extension/module/editinline');

            $info = $this->model_extension_module_editinline->updatedownload($this->request->post);

            if ($info) {
                $json['info'] = $info;
                $json['success'] = $this->language->get('text_update_success');
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function bulkproduct() {

        $json = array();

        $this->language->load('extension/module/editinline');

        $this->load->model('extension/module/editinline');

        if (isset($this->request->post['selected'])) {
            foreach ($this->request->post['selected'] as $product_id) {
                $this->model_extension_module_editinline->bulkproduct($product_id, $this->request->post);
            }
            $json['success'] = sprintf($this->language->get('text_success_bulk'), ucfirst(str_replace('_', ' ', $this->request->post['type'])));
        } else {
            $json['warning'] = $this->language->get('text_warning_select');
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    protected function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
        if (!$full) {
            $string = array_slice($string, 0, 1);
        }
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    protected function validateproduct() {
        $this->load->language('extension/module/editinline');
        if (!$this->user->hasPermission('modify', 'catalog/product')) {
            $this->error['warning'] = $this->language->get('error_permission_product');
        }
        return !$this->error;
    }

    protected function validatecategory() {
        $this->load->language('extension/module/editinline');
        if (!$this->user->hasPermission('modify', 'catalog/category')) {
            $this->error['warning'] = $this->language->get('error_permission_category');
        }
        return !$this->error;
    }

    protected function compareflag($language) {
        if (version_compare(VERSION, '2.2.0.0') >= 0) {
            return 'language/' . $language['code'] . '/' . $language['code'] . '.png';
        } else {
            return 'view/image/flags/' . $language['image'];
        }
    }


}
