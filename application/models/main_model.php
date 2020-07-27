<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

	public function insert_product_in_table($product_data)
	{
		$this->db->insert('product_details',$product_data);
		if($this->db->insert_id() > 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function get_products_details($prod_id = 0)
	{
		$query = $this->db->select('*')
						->from('product_details');
						if($prod_id > 0){
							$query = $this->db->where('product_id',$prod_id);
						}
						$query = $this->db->get();

		return $query->result_array();
	}

	public function submit_basic_quotation_details($basic_details)
	{
		$this->db->insert('quotation_log',$basic_details);
		if($this->db->insert_id() > 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function submit_product_quotation_details($product_details)
	{
		$this->db->insert('quotation_product_log',$product_details);
		if($this->db->insert_id() > 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function get_basic_quotation_details($code = 0)
	{
		$query = $this->db->select('*')
						->from('quotation_log');
						if($code > 0){
							$query = $this->db->where('code',$code);
						}
						$query = $this->db->get();

		return $query->result_array();
	}

	public function get_all_quotation_details($code)
	{
		$query = $this->db->select('ql.*,pd.name as pd_name')
						->from('quotation_product_log as ql')
						->join('product_details as pd','ql.name=pd.product_id','left')
						->where('code',$code)
						->get();

		return $query->result_array();
	}

}
