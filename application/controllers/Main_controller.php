<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controller extends CI_Controller {

	function __construct() {
    parent::__construct();
		$this->load->model('main_model');
	}

	public function add_product_details()
	{
		$this->load->view('add_products');
	}

	public function get_all_products_details()
	{
		$confirmation = $this->main_model->get_products_details();
		$this->load->view('all_products',array('products'=>$confirmation));
	}

	public function insert_product_details()
	{
		$this->form_validation->set_rules('product_name', 'Name', 'required');
		$this->form_validation->set_rules('gst_percentage', 'Gst', 'required|numeric');
		$this->form_validation->set_rules('hsn_code', 'HSN Code', 'required|regex_match[/^[0-9]{6}$/]');
		$this->form_validation->set_rules('product_price', 'Product Price', 'required|numeric');
		if($this->form_validation->run() == FALSE){
			$this->load->view('add_products');
		}
		else{
			$details = array(
				'name'=>$this->input->post('product_name'),
				'gst'=>$this->input->post('gst_percentage'),
				'hsn_code'=>$this->input->post('hsn_code'),
				'price'=>$this->input->post('product_price')
			);

			$confirmation = $this->main_model->insert_product_in_table($details);
			if($confirmation){
			 redirect('all_product_details');
			}
			else{
				echo "Kindly try after some time";
			}
		}
	}
}
