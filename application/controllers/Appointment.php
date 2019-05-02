<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	function __construct() {
		// Call the Model constructor
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Appointment_model');
		$this->load->model('Constant_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('email');
	}

	
	public function index() {
		$this->load->view('appointment.php');
	}
	
	
	// Make A Appointment;
	public function makeAppointment(){
		$service_id  	= $this->input->post("service");
		$date 			= date("Y-m-d", strtotime($this->input->post("appointment_date")));
		$time 			= $this->input->post("appointment_time");
		$fn 			= $this->input->post("fname");
		$ln 			= $this->input->post("lname");
		$email 			= $this->input->post("email");
		
		$tm 			= date("Y-m-d H:i:s", time());
		
		$converted_time	= date("H:i:s", strtotime($time));
	
		$ins_appointment_data 	= array(
				"service_id"		=>	$service_id,
				"date"				=>	$date,
				"time"				=>	$converted_time,
				"firstname"			=>	$fn,
				"lastname"			=>	$ln,
				"email"				=>	$email,
				"created_datetime"	=>	$tm,
				"status"			=>	"1"	
		);
		$this->Constant_model->InsertData("appointments", $ins_appointment_data);
		
		$this->session->set_flashdata('alert_msg', array('success', 'Make An Appointment', "Thank you for your made An Appointment."));
		redirect(base_url());
	}	
}
