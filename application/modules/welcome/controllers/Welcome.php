<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
	
        $this->load->model(array('about_model', 'home_model', 'services_model', 'products_model', 'purchases_model', 'contact_us_model'));
    }

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
	public function index()
	{
        $data['about'] = $this->about_model->_datatable_index();
        $data['banners'] =  $this->home_model->_datatable_index();
        $data['services'] = $this->services_model->_datatable_index();
        $data['products'] = $this->products_model->_datatable_index();
       	if (!empty($this->session->userdata('id_admin'))) {
       		$data['users'] = $this->contact_us_model->getdata($this->session->userdata('id_admin'));
       	}else{
       		$data['users'] = '';
       	}
		$this->load->view('welcome_message', $data);
	}

	public function purchase()
	{

		if ($_GET) {
			if(!$this->ion_auth->logged_in())
	        {
				echo '<script>window.alert("Anda harus login untuk melakukan pemesanan");</script>';				
		       	echo "<script>window.location.href = '".base_url()."auth'</script>";				    	

	        }
	        else{
				    $additional_data = array(
	            	'id_cust' => $this->session->userdata('id_admin'),         				    	
                	'nama_depan' => $_GET['fname'],
	                'nama_belakang' => $_GET['lname'],
	                'email' => $_GET['email'],
	                'subyek' => $_GET['subject'],
	                'pesan' => $_GET['pesan'],
	            );            

			    $kirim = $this->purchases_model->_create($additional_data);
			    if($kirim){
		       		echo "<script>window.location.href = '../';</script>";				    	
			    }else{
			    	echo '<script>window.alert("Pesanan anda sudah terkirim, thankyou");</script>';
		       		echo "<script>window.location.href = '".base_url()."';</script>";		       		
		    	
			    }
	        }

		}
		if($_GET){


		}
	}

	public function fanspage()
	{
		$this->load->view('fanspage');
	}

	public function products()
	{
        $data['products'] = $this->products_model->_datatable_index();
		$this->load->view('products', $data);
	}

	public function products_detail($id)
	{
        $data['product'] = $this->products_model->_read($id);

		$this->load->view('product_detail', $data);

	}

	public function contact_us()
	{
		if($_GET){
			if(!$this->ion_auth->logged_in())
	        {
				echo '<script>window.alert("Anda harus login untuk mengirim pesan");</script>';				
		       	echo "<script>window.location.href = '".base_url()."auth'</script>";				    	

	        }else
	        {
	        	$additional_data = array(
	            	'id_cust' => $this->session->userdata('id_admin'),         
	                'fname' => $_GET['fnamec'],
	                'lname' => $_GET['lnamec'],
	                'email' => $_GET['emailc'],
	                'subject' => $_GET['subjectc'],
	                'pesan' => $_GET['messagec'],
	            );

			    $kirim = $this->contact_us_model->_create($additional_data);
			    if($kirim){

				    echo '<script>window.alert("Pesan anda tidak terkirim, cek kembali form");</script>';

		       		echo "<script>window.location.href = '../';</script>";				    	
			    }else{
			    	echo '<script>window.alert("Pesan anda sudah terkirim, thankyou");</script>';
		       		echo "<script>window.location.href = '".base_url()."';</script>";
		    	
			    }
	        }

		}
	}

	public function pesan()
	{
		$data['contact_us'] = $this->contact_us_model->_datatable_index();      
       	if (!empty($this->session->userdata('id_admin'))) {
       		$data['users'] = $this->contact_us_model->getdata($this->session->userdata('id_admin'));
       	}else{
       		$data['users'] = '';
       	}
		$this->load->view('pesan', $data);
	}	

}
