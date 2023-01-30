<?php

/*
 * IT IS NOT FREE, YOU SHOULD BUY / REFISTER A LICENSE AT HTTPS://MMOSolution.COM
 * CONTACT: toan@MMOSOLUTION.COM
 * AUTHOR: MMOSOLUTION TEAM AT VIETNAM
 * All code within this file is copyright MMOSOLUTION.COM TEAM | FOUNDED @2012
 * You can not copy or reuse code within this file without written permission.
*/

class ModelExtensionModuleEditInline extends Model {

    public function getCategories($parent_id = 0) {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.parent_id = '" . (int) $parent_id . "' AND cd.language_id = '" . (int) $this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int) $this->config->get('config_store_id') . "' ORDER BY c.sort_order, LCASE(cd.name)");

        return $query->rows;
    }

    public function checksub($category_id) {
        $query = $this->db->query("SELECT count(*) as total FROM " . DB_PREFIX . "category  WHERE parent_id = '" . (int) $category_id . "'");
        if ($query->row['total'] > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getProduct($category_id, $data) {
        $sql = "SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id)";

        if ($category_id != -1) {
            $sql .= " LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (p.product_id = p2c.product_id)";
        }

        $sql .= " WHERE pd.language_id = '" . (int) $this->config->get('config_language_id') . "'";

        if ($category_id != -1) {
            $sql .= " AND p2c.category_id = '" . (int) $category_id . "'";
        }

        if (!empty($data['filter_product_id'])) {
            $sql .= " AND p.product_id = '" . (int) $data['filter_product_id'] . "'";
        }

        if (!empty($data['filter_name'])) {
            $sql .= " AND pd.name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
        }

        if (!empty($data['filter_model'])) {
            $sql .= " AND p.model LIKE '" . $this->db->escape($data['filter_model']) . "%'";
        }

        if (!empty($data['filter_date_available'])) {
            $sql .= " AND p.date_available = '" . $this->db->escape($data['filter_date_available']) . "'";
        }
        if (isset($data['filter_price']) && !is_null($data['filter_price'])) {
            $price_condit = $this->operator_partse($data['filter_price']);
            $sql .= " AND p.price " . $price_condit . "";
        }

        if (isset($data['filter_quantity']) && !is_null($data['filter_quantity'])) {
            $quantity_condit = $this->operator_partse($data['filter_quantity']);

            $sql .= " AND p.quantity " . $quantity_condit . " ";
        }

        if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
            $sql .= " AND p.status = '" . (int) $data['filter_status'] . "'";
        }

        if (isset($data['filter_shipping']) && !is_null($data['filter_shipping'])) {
            $sql .= " AND p.shipping = '" . (int) $data['filter_shipping'] . "'";
        }

        if (isset($data['filter_stock_status']) && !is_null($data['filter_stock_status'])) {
            $sql .= " AND p.stock_status_id = '" . (int) $data['filter_stock_status'] . "'";
        }

        if (isset($data['filter_tax_class']) && !is_null($data['filter_tax_class'])) {
            $sql .= " AND p.tax_class_id = '" . (int) $data['filter_tax_class'] . "'";
        }
        if (isset($data['filter_manufacturer_id']) && !is_null($data['filter_manufacturer_id'])) {
            $sql .= " AND p.manufacturer_id = '" . (int) $data['filter_manufacturer_id'] . "'";
        }

        $sql .= " ORDER BY " . $data['sort'] . " " . $data['order'];

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
        }

        $query = $this->db->query($sql);

        return $query->rows;
    }

    function operator_partse($str) {
        $str = html_entity_decode($str, ENT_QUOTES, 'UTF-8');
        $operators = array(">=", "<=", "=", ">", "<",);
        $condition = NULL;
        foreach ($operators as $op) {
            $parses = explode($op, $str);
            if (count($parses) > 1) {
                $condition = $op . ' ' . intval($parses[1]);
                break;
            }
        }

        return empty($condition) ? '=' . intval($str) : $condition;
    }

    public function getTotalProduct($category_id, $data) {
        $sql = "SELECT COUNT(*) as total FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id)";

        if ($category_id != -1) {
            $sql .= " LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (p.product_id = p2c.product_id)";
        }

        $sql .= " WHERE pd.language_id = '" . (int) $this->config->get('config_language_id') . "'";

        if ($category_id != -1) {
            $sql .= " AND p2c.category_id = '" . (int) $category_id . "'";
        }

        if (!empty($data['filter_product_id'])) {
            $sql .= " AND p.product_id = '" . (int) $data['filter_product_id'] . "'";
        }
        if (!empty($data['filter_name'])) {
            $sql .= " AND pd.name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
        }

        if (!empty($data['filter_model'])) {
            $sql .= " AND p.model LIKE '" . $this->db->escape($data['filter_model']) . "%'";
        }

        if (!empty($data['filter_date_available'])) {
            $sql .= " AND p.date_available = '" . $this->db->escape($data['filter_date_available']) . "'";
        }

        if (isset($data['filter_price']) && !is_null($data['filter_price'])) {
            $price_condit = $this->operator_partse($data['filter_price']);
            $sql .= " AND p.price " . $price_condit . "";
        }

        if (isset($data['filter_quantity']) && !is_null($data['filter_quantity'])) {
            $quantity_condit = $this->operator_partse($data['filter_quantity']);
            $sql .= " AND p.quantity " . $quantity_condit . " ";
        }

        if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
            $sql .= " AND p.status = '" . (int) $data['filter_status'] . "'";
        }

        if (isset($data['filter_shipping']) && !is_null($data['filter_shipping'])) {
            $sql .= " AND p.shipping = '" . (int) $data['filter_shipping'] . "'";
        }

        if (isset($data['filter_stock_status']) && !is_null($data['filter_stock_status'])) {
            $sql .= " AND p.stock_status_id = '" . (int) $data['filter_stock_status'] . "'";
        }

        if (isset($data['filter_tax_class']) && !is_null($data['filter_tax_class'])) {
            $sql .= " AND p.tax_class_id = '" . (int) $data['filter_tax_class'] . "'";
        }

        if (isset($data['filter_manufacturer_id']) && !is_null($data['filter_manufacturer_id'])) {
            $sql .= " AND p.manufacturer_id = '" . (int) $data['filter_manufacturer_id'] . "'";
        }

        $sql .= " ORDER BY " . $data['sort'] . " " . $data['order'];

        $query = $this->db->query($sql);

        return $query->row['total'];
    }

    public function getMultilanguageName($product_id, $language_id) {
        $query = $this->db->query("SELECT name FROM " . DB_PREFIX . "product_description WHERE language_id = '" . (int) $language_id . "' AND product_id = '" . (int) $product_id . "'");

        return $query->row['name'];
    }

    public function getManufacturerName($manufacturer_id) {
        $query = $this->db->query("SELECT name FROM " . DB_PREFIX . "manufacturer WHERE manufacturer_id = '" . (int) $manufacturer_id . "'");

        if (!empty($query->row['name'])) {
            return $query->row['name'];
        }
    }

    public function getWeightClassName($weight_class_id) {
        $query = $this->db->query("SELECT title FROM " . DB_PREFIX . "weight_class_description WHERE weight_class_id = '" . (int) $weight_class_id . "' AND language_id = '" . (int) $this->config->get('config_language_id') . "'");

        if (!empty($query->row['title'])) {
            return $query->row['title'];
        }
    }

    public function getTaxClassName($tax_class_id) {
        $query = $this->db->query("SELECT title FROM " . DB_PREFIX . "tax_class WHERE tax_class_id = '" . (int) $tax_class_id . "'");

        if (!empty($query->row['title'])) {
            return $query->row['title'];
        }
    }

    public function getLenghtClassName($length_class_id) {
        $query = $this->db->query("SELECT title FROM " . DB_PREFIX . "length_class_description WHERE length_class_id = '" . (int) $length_class_id . "' AND language_id = '" . (int) $this->config->get('config_language_id') . "'");

        if (!empty($query->row['title'])) {
            return $query->row['title'];
        }
    }

    public function getStockStatusName($stock_status_id) {
        $query = $this->db->query("SELECT name FROM " . DB_PREFIX . "stock_status WHERE stock_status_id = '" . (int) $stock_status_id . "' AND language_id = '" . (int) $this->config->get('config_language_id') . "'");

        if (!empty($query->row['name'])) {
            return $query->row['name'];
        }
    }

    public function getSeoKeyword($product_id) {
        $query = $this->db->query("SELECT keyword FROM " . DB_PREFIX . "seo_url WHERE query = 'product_id=" . (int) $product_id . "'");

        if (!empty($query->row['keyword'])) {
            return $query->row['keyword'];
        }
    }

    public function getStoreName($store_id) {
        $query = $this->db->query("SELECT name FROM " . DB_PREFIX . "store WHERE store_id = '" . (int) $store_id . "'");

        return $query->row['name'];
    }

    public function getPoint($product_id) {
        $query = $this->db->query("SELECT points FROM " . DB_PREFIX . "product WHERE product_id = '" . (int) $product_id . "'");

        if (!empty($query->row['points'])) {
            return $query->row['points'];
        } else {
            return 0;
        }
    }

    public function checkexistModel($model, $product_id) {
        $query = $this->db->query("SELECT count(product_id) as total FROM " . DB_PREFIX . "product  WHERE model = '" . $this->db->escape($model) . "' AND product_id <> " . (int) $product_id);

        if ($query->row['total'] > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function checkexistSeoKeyword($keyword, $product_id) {
        $query = $this->db->query("SELECT count(*) as total FROM " . DB_PREFIX . "seo_url WHERE LOWER(keyword) = LOWER('" . $this->db->escape($keyword) . "') AND query <> 'product_id=" . $product_id . "'");
        if ($query->row['total'] > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function updateProduct($product_id, $type, $value) {
        if ($type == 'model') {
            $this->db->query("UPDATE " . DB_PREFIX . "product SET " . $type . " = '" . $this->db->escape($value) . "' WHERE product_id = '" . (int) $product_id . "'");
        } elseif (($type == 'sku') || ($type == 'upc') || ($type == 'ean') || ($type == 'jan') || ($type == 'isbn') || ($type == 'mpn') || ($type == 'location') || ($type == 'date_available')) {
            $this->db->query("UPDATE " . DB_PREFIX . "product SET " . $type . " = '" . $this->db->escape($value) . "' WHERE product_id = '" . (int) $product_id . "'");
        } elseif (($type == 'price') || ($type == 'length') || ($type == 'width') || ($type == 'height') || ($type == 'weight')) {
            $this->db->query("UPDATE " . DB_PREFIX . "product SET " . $type . " = '" . (float) $value . "' WHERE product_id = '" . (int) $product_id . "'");
        } elseif (($type == 'quantity') || ($type == 'stock_status_id') || ($type == 'manufacturer_id') || ($type == 'shipping') || ($type == 'points') || ($type == 'tax_class_id') || ($type == 'weight_class_id') || ($type == 'length_class_id') || ($type == 'subtract') || ($type == 'minimum') || ($type == 'sort_order') || ($type == 'status')) {
            $this->db->query("UPDATE " . DB_PREFIX . "product SET " . $type . " = '" . (int) $value . "' WHERE product_id = '" . (int) $product_id . "'");
        } elseif ($type == 'name') {
            foreach ($value as $language_id => $name) {
                $this->db->query("UPDATE " . DB_PREFIX . "product_description SET name = '" . $this->db->escape($name) . "' WHERE language_id = '" . (int) $language_id . "' AND product_id = '" . (int) $product_id . "'");
            }
        } elseif ($type == 'seo_keyword') {
            foreach ($value as $store_id => $language) {
              foreach ($language as $language_id => $keyword) {
                if (!empty($keyword)) {
                  $this->db->query("INSERT INTO " . DB_PREFIX . "seo_url SET store_id = '" . (int)$store_id . "', language_id = '" . (int)$language_id . "', query = 'product_id=" . (int)$product_id . "', keyword = '" . $this->db->escape($keyword) . "'");
                }
              }
            }
        } elseif ($type == 'category') {
            $this->db->query("DELETE FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int) $product_id . "'");

            if (!empty($value)) {
                foreach ($value as $category_id) {
                    $this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET product_id = '" . (int) $product_id . "', category_id = '" . (int) $category_id . "'");
                }
            }
        } elseif ($type == 'download') {
            $this->db->query("DELETE FROM " . DB_PREFIX . "product_to_download WHERE product_id = '" . (int) $product_id . "'");

            if (!empty($value)) {
                foreach ($value as $download_id) {
                    $this->db->query("INSERT INTO " . DB_PREFIX . "product_to_download SET product_id = '" . (int) $product_id . "', download_id = '" . (int) $download_id . "'");
                }
            }
        } elseif ($type == 'meta_tag_description') {
            foreach ($value as $language_id => $meta_description) {
                $this->db->query("UPDATE " . DB_PREFIX . "product_description SET meta_description = '" . $this->db->escape($meta_description['meta_description']) . "' WHERE language_id = '" . (int) $language_id . "' AND product_id = '" . (int) $product_id . "'");
            }
        } elseif ($type == 'meta_tag_keyword') {
            foreach ($value as $language_id => $meta_keyword) {
                $this->db->query("UPDATE " . DB_PREFIX . "product_description SET meta_keyword = '" . $this->db->escape($meta_keyword['meta_keyword']) . "' WHERE language_id = '" . (int) $language_id . "' AND product_id = '" . (int) $product_id . "'");
            }
        } elseif ($type == 'product_tag') {
            foreach ($value as $language_id => $tag) {
                $this->db->query("UPDATE " . DB_PREFIX . "product_description SET tag = '" . $this->db->escape($tag['tag']) . "' WHERE language_id = '" . (int) $language_id . "' AND product_id = '" . (int) $product_id . "'");
            }
        } elseif ($type == 'special') {
            $this->db->query("DELETE FROM " . DB_PREFIX . "product_special WHERE product_id = '" . (int) $product_id . "'");

            if (!empty($value)) {
                foreach ($value as $product_special) {
                    $this->db->query("INSERT INTO " . DB_PREFIX . "product_special SET product_id = '" . (int) $product_id . "', customer_group_id = '" . (int) $product_special['customer_group_id'] . "', priority = '" . (int) $product_special['priority'] . "', price = '" . (float) $product_special['price'] . "', date_start = '" . $this->db->escape($product_special['date_start']) . "', date_end = '" . $this->db->escape($product_special['date_end']) . "'");
                }
            }
        } elseif ($type == 'discount') {
            $this->db->query("DELETE FROM " . DB_PREFIX . "product_discount WHERE product_id = '" . (int) $product_id . "'");

            if (!empty($value)) {
                foreach ($value as $product_discount) {
                    $this->db->query("INSERT INTO " . DB_PREFIX . "product_discount SET product_id = '" . (int) $product_id . "', customer_group_id = '" . (int) $product_discount['customer_group_id'] . "', quantity = '" . (int) $product_discount['quantity'] . "', priority = '" . (int) $product_discount['priority'] . "', price = '" . (float) $product_discount['price'] . "', date_start = '" . $this->db->escape($product_discount['date_start']) . "', date_end = '" . $this->db->escape($product_discount['date_end']) . "'");
                }
            }
        } elseif ($type == 'store') {
            $this->db->query("DELETE FROM " . DB_PREFIX . "product_to_store WHERE product_id = '" . (int) $product_id . "'");

            if (!empty($value)) {
                foreach ($value as $store_id) {
                    $this->db->query("INSERT INTO " . DB_PREFIX . "product_to_store SET product_id = '" . (int) $product_id . "', store_id = '" . (int) $store_id . "'");
                }
            }
        } elseif ($type == 'reward') {
            $this->db->query("UPDATE " . DB_PREFIX . "product SET points = '" . (int) $value['points'] . "' WHERE product_id = '" . (int) $product_id . "'");

            $this->db->query("DELETE FROM " . DB_PREFIX . "product_reward WHERE product_id = '" . (int) $product_id . "'");

            if (isset($value['product_reward'])) {
                foreach ($value['product_reward'] as $customer_group_id => $point) {
                    if ((int) $point['points'] > 0) {
                        $this->db->query("INSERT INTO " . DB_PREFIX . "product_reward SET product_id = '" . (int) $product_id . "', customer_group_id = '" . (int) $customer_group_id . "', points = '" . (int) $point['points'] . "'");
                    }
                }
            }
        } elseif ($type == 'image') {
            $this->db->query("UPDATE " . DB_PREFIX . "product SET image = '" . $this->db->escape($value) . "' WHERE product_id = '" . (int) $product_id . "'");
        } elseif ($type == 'image_addition') {
            $this->db->query("DELETE FROM " . DB_PREFIX . "product_image WHERE product_id = '" . (int) $product_id . "'");

            if (!empty($value)) {
                foreach ($value as $product_image) {
                    $this->db->query("INSERT INTO " . DB_PREFIX . "product_image SET product_id = '" . (int) $product_id . "', image = '" . $this->db->escape($product_image['image']) . "', sort_order = '" . (int) $product_image['sort_order'] . "'");
                }
            }
        }
    }

    public function getbreadcrumb($category_id) {
        $query = $this->db->query("SELECT name FROM " . DB_PREFIX . "category_description WHERE category_id = '" . (int) $category_id . "' AND language_id = '" . (int) $this->config->get('config_language_id') . "'");

        if (!empty($query->row['name'])) {
            return $query->row['name'];
        }
    }

    public function sortableCategory($category_id, $parent_id) {
        $this->db->query("UPDATE " . DB_PREFIX . "category SET parent_id = '" . (int) $parent_id . "' WHERE category_id = '" . (int) $category_id . "'");
    }

    public function updateSortOrderCategory($category_id, $sort_order) {
        $this->db->query("UPDATE " . DB_PREFIX . "category SET sort_order = '" . (int) $sort_order . "' WHERE category_id = '" . (int) $category_id . "'");
    }

    public function updateSortOrderProduct($sort_data) {

        $sql = "SELECT DISTINCT p.product_id, p.sort_order FROM " . DB_PREFIX . "product p, " . DB_PREFIX . "product_to_category p2c WHERE p2c.category_id = '" . (int) $sort_data['category_id'] . "' AND p.product_id = p2c.product_id AND p.product_id !='" . (int) $sort_data['product_id'] . "' ORDER BY p.sort_order";
        $query = $this->db->query($sql);

        $this->changeSortOrderProduct($sort_data['product_id'], $sort_data['sort_order']);

        if ($query->rows) {
            $products_sort_new = array();
            $i = 1;
            foreach ($query->rows as $product) {
                if ($i >= $sort_data['sort_order']) {
                    $this->changeSortOrderProduct($product['product_id'], $i + 1);
                } else {
                    $this->changeSortOrderProduct($product['product_id'], $i - 1);
                }
                $i++;
            }
        }
    }

    public function changeSortOrderProduct($product_id, $sort_order) {
        $this->db->query("UPDATE " . DB_PREFIX . "product SET sort_order = '" . (int) $sort_order . "' WHERE product_id = '" . (int) $product_id . "'");
    }

    public function removeImageAddition($product_id, $image_id) {
        $this->db->query("DELETE FROM " . DB_PREFIX . "product_image WHERE product_id = '" . (int) $product_id . "' AND product_image_id = '" . (int) $image_id . "'");
    }

    public function allStatusChange($product_id, $status) {
        $this->db->query("UPDATE " . DB_PREFIX . "product SET status = '" . (int) $status . "' WHERE product_id = '" . (int) $product_id . "'");
    }

    public function getProducts($data = array()) {
        $sql = "SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) ";


        if (!empty($data['filter_category_id'])) {
            $sql .= ", " . DB_PREFIX . "product_to_category p2c ";
        }

        $sql .= "WHERE pd.language_id = '" . (int) $this->config->get('config_language_id') . "'";

        if (!empty($data['filter_category_id'])) {
            $sql .= " AND p2c.category_id = '" . (int) $data['filter_category_id'] . "' AND p.product_id = p2c.product_id ";
        }
        if (!empty($data['filter_product_id'])) {
            $sql .= " AND p.product_id = '" . (int) $data['filter_product_id'] . "'";
        }
        if (!empty($data['filter_name'])) {
            $sql .= " AND pd.name LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
        }

        if (!empty($data['filter_model'])) {
            $sql .= " AND p.model LIKE '%" . $this->db->escape($data['filter_model']) . "%'";
        }

        if (isset($data['filter_price']) && !is_null($data['filter_price'])) {
            $sql .= " AND p.price LIKE '%" . $this->db->escape($data['filter_price']) . "%'";
        }

        if (isset($data['filter_quantity']) && !is_null($data['filter_quantity'])) {
            $sql .= " AND p.quantity = '%" . (int) $data['filter_quantity'] . "'";
        }

        if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
            $sql .= " AND p.status = '" . (int) $data['filter_status'] . "'";
        }

        $sql .= " GROUP BY p.product_id";

        $sort_data = array(
            'pd.name',
            'p.model',
            'p.price',
            'p.quantity',
            'p.status',
            'p.sort_order'
        );

        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            $sql .= " ORDER BY " . $data['sort'];
        } else {
            $sql .= " ORDER BY pd.name";
        }

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC";
        } else {
            $sql .= " ASC";
        }

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sql .= " LIMIT " . (int) $data['start'] . ", " . (int) $data['limit'];
        }

        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function countTemplateShowHide() {
        $query = $this->db->query("SELECT  `setting_id` FROM " . DB_PREFIX . "setting WHERE  `key` LIKE  '%editinline_template_show_hide_%' ORDER BY  `setting_id` DESC  LIMIT 0 , 1");
        if (!empty($query->row['setting_id'])) {
            return $query->row['setting_id'];
        } else {
            return 1;
        }
    }

    public function getTemplateShowHide() {
        $query = $this->db->query("SELECT `key` FROM " . DB_PREFIX . "setting WHERE  `key` LIKE  '%editinline_template_show_hide_%'  ORDER BY `key` ASC ");
        return $query->rows;
    }

    public function deleteTemplate($template_id) {
        $this->db->query("DELETE FROM " . DB_PREFIX . "setting WHERE `key` = 'editinline_template_show_hide_" . $template_id . "'");
    }

    public function updatedownload($data) {
        $info = array();

        $existed = 0;

        if ($data['download_id'] == '0') {

            $this->db->query("INSERT INTO " . DB_PREFIX . "download SET filename = '" . $this->db->escape($data['filename']) . "', mask = '" . $this->db->escape($data['mask']) . "', date_added = NOW()");

            $download_id = $this->db->getLastId();

            foreach ($data['download_description'] as $language_id => $value) {
                $this->db->query("INSERT INTO " . DB_PREFIX . "download_description SET download_id = '" . (int) $download_id . "', language_id = '" . (int) $language_id . "', name = '" . $this->db->escape($value['name']) . "'");
            }
        } else {

            $download_id = $data['download_id'];

            $this->db->query("UPDATE " . DB_PREFIX . "download SET filename = '" . $this->db->escape($data['filename']) . "', mask = '" . $this->db->escape($data['mask']) . "' WHERE download_id = '" . (int) $download_id . "'");

            $this->db->query("DELETE FROM " . DB_PREFIX . "download_description WHERE download_id = '" . (int) $download_id . "'");

            foreach ($data['download_description'] as $language_id => $value) {
                $this->db->query("INSERT INTO " . DB_PREFIX . "download_description SET download_id = '" . (int) $download_id . "', language_id = '" . (int) $language_id . "', name = '" . $this->db->escape($value['name']) . "'");
            }
            $existed = 1;
        }

        $info = array(
            'download_id' => $download_id,
            'name' => $data['download_description'][$this->config->get('config_language_id')]['name'],
            'existed' => $existed
        );

        return $info;
    }

    public function getMetatagDescription($product_id) {
        $product_description_data = array();

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_description WHERE product_id = '" . (int) $product_id . "'");

        foreach ($query->rows as $result) {
            $product_description_data[$result['language_id']] = array(
                'meta_description' => $result['meta_description']
            );
        }

        return $product_description_data;
    }

    public function getMetatagKeyword($product_id) {
        $product_description_data = array();

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_description WHERE product_id = '" . (int) $product_id . "'");

        foreach ($query->rows as $result) {
            $product_description_data[$result['language_id']] = array(
                'meta_keyword' => $result['meta_keyword']
            );
        }

        return $product_description_data;
    }

    public function getProductTag($product_id) {
        $product_description_data = array();

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_description WHERE product_id = '" . (int) $product_id . "'");

        foreach ($query->rows as $result) {
            $product_description_data[$result['language_id']] = array(
                'tag' => $result['tag']
            );
        }

        return $product_description_data;
    }

    public function bulkproduct($product_id, $data) {
        if ($data['type'] == 'name') {
            foreach ($data['value'] as $language_id => $name) {
                $xname = $this->explorestring($data['type'], $name);
                if (!empty($xname)) {
                    $this->db->query("UPDATE " . DB_PREFIX . "product_description SET name = CONCAT('" . $xname[0] . "',name) WHERE language_id = '" . (int) $language_id . "' AND product_id = '" . (int) $product_id . "'");
                    $this->db->query("UPDATE " . DB_PREFIX . "product_description SET name = CONCAT(name,'" . $xname[1] . "') WHERE language_id = '" . (int) $language_id . "' AND product_id = '" . (int) $product_id . "'");
                }
            }
        } elseif ($data['type'] == 'model') {
            $xmodel = $this->explorestring($data['type'], $data['value']);
            if (!empty($xmodel)) {
                $this->db->query("UPDATE " . DB_PREFIX . "product SET model = CONCAT('" . $xmodel[0] . "',model) WHERE product_id = '" . (int) $product_id . "'");
                $this->db->query("UPDATE " . DB_PREFIX . "product SET model = CONCAT(model,'" . $xmodel[1] . "') WHERE product_id = '" . (int) $product_id . "'");
            }
        } elseif ($data['type'] == 'location') {
            $xlocation = $this->explorestring($data['type'], $data['value']);
            if (!empty($xlocation)) {
                $this->db->query("UPDATE " . DB_PREFIX . "product SET location = CONCAT('" . $xlocation[0] . "',location) WHERE product_id = '" . (int) $product_id . "'");
                $this->db->query("UPDATE " . DB_PREFIX . "product SET location = CONCAT(location,'" . $xlocation[1] . "') WHERE product_id = '" . (int) $product_id . "'");
            }
        } elseif ($data['type'] == 'seo_keyword') {
            $xkeyword = $this->explorestring($data['type'], $data['value']);
            if (!empty($xkeyword)) {
                $this->db->query("UPDATE " . DB_PREFIX . "seo_url SET keyword = CONCAT('" . $xkeyword[0] . "',keyword) WHERE query = 'product_id=" . (int) $product_id . "'");
                $this->db->query("UPDATE " . DB_PREFIX . "seo_url SET keyword = CONCAT(keyword,'" . $xkeyword[1] . "') WHERE query = 'product_id=" . (int) $product_id . "'");
            }
        } elseif ($data['type'] == 'quantity' || $data['type'] == 'price' || $data['type'] == 'sort_order' || $data['type'] == 'minimum' || $data['type'] == 'points' || $data['type'] == 'weight' || $data['type'] == 'length' || $data['type'] == 'width' || $data['type'] == 'height') {
            $sql = '';
            $query_result = $this->db->query("SELECT " . $data['type'] . " FROM " . DB_PREFIX . "product WHERE product_id = '" . (int) $product_id . "'");
            if ($data['calc'] == 'F') {
                $value = $data['value'];
            } else {
                $value = $data['value'] * $query_result->row[$data['type']] / 100;
            }
            if (is_numeric($data['value'])) {
                if ($data['operator'] == '=') {
                    $sql .= $data['type'] . ' = ' . $value;
                } else {
                    $sql .= $data['type'] . ' = ( ' . $data['type'] . $data['operator'] . $value . ')';
                }

                $this->db->query("UPDATE " . DB_PREFIX . "product SET " . $sql . " WHERE product_id = '" . (int) $product_id . "'");
            }
        }
    }

    protected function explorestring($predimension, $string) {
        $dimension = '{' . $predimension . '}';

        $result = explode($dimension, $string);
        return $result;
    }

}
