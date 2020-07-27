<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotation_controller extends CI_Controller {

	function __construct() {
    parent::__construct();
		$this->load->model('main_model');
	}

	public function make_product_quotation()
	{
		$confirmation = $this->main_model->get_products_details();
		$this->load->view('make_quotation',array('products'=>$confirmation));
	}

	public function get_product_details_by_id()
	{
		$prod_id = $this->input->post('product_id');
		$data = $this->main_model->get_products_details($prod_id);
		echo json_encode($data);
	}

	public function submit_quotation_data()
	{
		$cur_date = strtotime(date('d-m-Y h:i:s')) * 1000;
		$title = $this->input->post('quotation_title');
		$address = $this->input->post('billing_address');
		$grand_total = $this->input->post('grand_total');
		$quotation_basic_details = array(
																		'code'=> 'Q-'.$cur_date,
																		'date'=> date('Y-m-d'),
																		'title'=> $title,
																		'address'=> $address,
																		'total'=> $grand_total
																);
	  $quotation_basic = $this->main_model->submit_basic_quotation_details($quotation_basic_details);
		$quotation_product = 0;
		if($quotation_basic){
			for($i=0;$i<count($this->input->post('product_name'));$i++){
				$quotation_product_details = array(
					'code'=> 'Q-'.$cur_date,
					'name'=> $this->input->post('product_name')[$i],
					'hsn_code'=> $this->input->post('product_hsn')[$i],
					'price'=> $this->input->post('product_price')[$i],
					'quantity'=> $this->input->post('product_quantity')[$i],
					'sub_total'=> $this->input->post('product_sub_total')[$i],
					'gst'=> $this->input->post('product_gst')[$i],
					'main_total'=> $this->input->post('product_main_total')[$i]
				);
				$quotation_product = $this->main_model->submit_product_quotation_details($quotation_product_details);
			}
			if($quotation_product){
				$quotation_product = 1;
			}
		}
		if($quotation_product){
			redirect("all_quotation_details");
		}
		else{
			echo "check the details";
		}
	}

	public function show_all_quotations()
	{
		$data = $this->main_model->get_basic_quotation_details();
		$this->load->view('show_quotations',array('quotataions'=>$data));
	}

	public function show_quotation($code)
	{
		$data['basic_details'] = $this->main_model->get_basic_quotation_details($code);
		$data['main_details'] = $this->main_model->get_all_quotation_details($code);
		$this->load->view('indivdual_quotations',$data);
	}

}
