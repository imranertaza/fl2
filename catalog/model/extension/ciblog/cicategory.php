<?php
class ModelExtensionCiBlogCiCategory extends Model {
	public function getCiCategory($ciblog_category_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "ciblog_category c LEFT JOIN " . DB_PREFIX . "ciblog_category_description cd ON (c.ciblog_category_id = cd.ciblog_category_id) LEFT JOIN " . DB_PREFIX . "ciblog_category_to_store c2s ON (c.ciblog_category_id = c2s.ciblog_category_id) WHERE c.ciblog_category_id = '" . (int)$ciblog_category_id . "' AND cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND c.status = '1'");

		return $query->row;
	}

	public function getCiCategories($parent_id = 0) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "ciblog_category c LEFT JOIN " . DB_PREFIX . "ciblog_category_description cd ON (c.ciblog_category_id = cd.ciblog_category_id) LEFT JOIN " . DB_PREFIX . "ciblog_category_to_store c2s ON (c.ciblog_category_id = c2s.ciblog_category_id) WHERE c.parent_id = '" . (int)$parent_id . "' AND cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "'  AND c.status = '1' ORDER BY c.sort_order, LCASE(cd.name)");

		return $query->rows;
	}

	public function getCiCategoryFilters($ciblog_category_id) {
		$implode = array();

		$query = $this->db->query("SELECT filter_id FROM " . DB_PREFIX . "ciblog_category_filter WHERE ciblog_category_id = '" . (int)$ciblog_category_id . "'");

		foreach ($query->rows as $result) {
			$implode[] = (int)$result['filter_id'];
		}

		$filter_group_data = array();

		if ($implode) {
			$filter_group_query = $this->db->query("SELECT DISTINCT f.filter_group_id, fgd.name, fg.sort_order FROM " . DB_PREFIX . "filter f LEFT JOIN " . DB_PREFIX . "filter_group fg ON (f.filter_group_id = fg.filter_group_id) LEFT JOIN " . DB_PREFIX . "filter_group_description fgd ON (fg.filter_group_id = fgd.filter_group_id) WHERE f.filter_id IN (" . implode(',', $implode) . ") AND fgd.language_id = '" . (int)$this->config->get('config_language_id') . "' GROUP BY f.filter_group_id ORDER BY fg.sort_order, LCASE(fgd.name)");

			foreach ($filter_group_query->rows as $filter_group) {
				$filter_data = array();

				$filter_query = $this->db->query("SELECT DISTINCT f.filter_id, fd.name FROM " . DB_PREFIX . "filter f LEFT JOIN " . DB_PREFIX . "filter_description fd ON (f.filter_id = fd.filter_id) WHERE f.filter_id IN (" . implode(',', $implode) . ") AND f.filter_group_id = '" . (int)$filter_group['filter_group_id'] . "' AND fd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY f.sort_order, LCASE(fd.name)");

				foreach ($filter_query->rows as $filter) {
					$filter_data[] = array(
						'filter_id' => $filter['filter_id'],
						'name'      => $filter['name']
					);
				}

				if ($filter_data) {
					$filter_group_data[] = array(
						'filter_group_id' => $filter_group['filter_group_id'],
						'name'            => $filter_group['name'],
						'filter'          => $filter_data
					);
				}
			}
		}

		return $filter_group_data;
	}

	public function getCiCategoryLayoutId($ciblog_category_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "ciblog_category_to_layout WHERE ciblog_category_id = '" . (int)$ciblog_category_id . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "'");

		if ($query->num_rows) {
			return $query->row['layout_id'];
		} else {
			return 0;
		}
	}

	public function getTotalCiCategoriesByCiCategoryId($parent_id = 0) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "ciblog_category c LEFT JOIN " . DB_PREFIX . "ciblog_category_to_store c2s ON (c.ciblog_category_id = c2s.ciblog_category_id) WHERE c.parent_id = '" . (int)$parent_id . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND c.status = '1'");

		return $query->row['total'];
	}

	public function getCiBlogPosts($ciblog_category_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "ciblog_post_to_ciblog_category WHERE ciblog_category_id = '" . (int)$ciblog_category_id . "'");

		return $query->rows;
	}
}