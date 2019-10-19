<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Public_Controller 
{
    // private $data = array();
    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->helper(array('adminlte_helper', 'form'));

        // load ion auth
        $this->load->add_package_path(APPPATH.'third_party/ion_auth/');
        $this->load->library('ion_auth');

        $this->load->library('form_validation');
        $this->load->model(array('auth_models'));

    }

    public function index()
	{   
        if($this->ion_auth->logged_in())
        {
            redirect('admin/dashboard', 'refresh');
        }
        else
        {
            $data['page_title'] = 'Login';
            $data['page_description'] = 'Login';

            $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['email'] = array('name' => 'email',
                'id' => 'email',
                'class' => 'form-control',
                'placeholder' => 'Email',
				'type' => 'email',
				'value' => $this->form_validation->set_value('email'),
			);
			$data['password'] = array('name' => 'password',
                'id' => 'password',
                'class' => 'form-control',
				'type' => 'password',
				'placeholder' => 'Password',
			);
            $this->load->view('login', $data, FALSE);        
        }
    }

    public function login()
    {
        // validate form input
		$this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() === TRUE)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$remember = (bool)$this->input->post('remember');
			$check_id = $this->auth_models->check_auth($email)->result();
			foreach ($check_id as $key => $idadmin) {
				$id_admin = $idadmin->id;
			}


			if ($this->ion_auth->login($email, $password, $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->session->set_userdata('id_admin', $id_admin );
				$this->build_user_session();

				$check = $this->auth_models->check_auth($email)->result();
				foreach ($check as $key => $value) {
					$akses = $value->username;						
				}				
				if ($akses == 'user') {
					redirect('welcome', 'refresh');
					// $this->load->view('login', $data, FALSE);   
				}else
				{
					redirect('admin/dashboard', 'refresh');
					// $this->load->view('login', $data, FALSE);   
				}	
				// redirect('admin/dashboard', 'refresh');
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			// the user is not logging in so display the login page
            // set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data['email'] = array('name' => 'email',
                'id' => 'email',
                'class' => 'form-control',
                'placeholder' => 'Email',
				'type' => 'email',
				'value' => $this->form_validation->set_value('email'),
			);
			$data['password'] = array('name' => 'password',
                'id' => 'password',
                'class' => 'form-control',
				'type' => 'password',
				'placeholder' => 'Passowrd',
			);
			$this->load->view('login', $data, FALSE);   
        }
    }
    
    public function logout()
    {
		// log the user out
		$logout = $this->ion_auth->logout();
		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('auth', 'refresh');
    } 
    
    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); // must enhanced language options
        
        if ($this->form_validation->run() === FALSE)
		{
			$data['type'] = $this->config->item('identity', 'ion_auth');
			// setup the input
			$data['email'] = array('name' => 'email',
                'id' => 'email',
                'class' => 'form-control',
                'placeholder' => 'Email',
				'type' => 'email',
				'value' => $this->form_validation->set_value('email'),
			);

    		$data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
	
			// set any errors and display the form
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->load->view('auth' . DIRECTORY_SEPARATOR . 'forgot_password', $data);
        }
        else
		{
			$identity_column = $this->config->item('identity', 'ion_auth');
			$identity = $this->ion_auth->where($identity_column, $this->input->post('email'))->users()->row();

			if (empty($identity))
			{
    			$this->ion_auth->set_error('forgot_password_email_not_found');

				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				// if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}
		}
        // $this->load->view('forgot_password', $this->data, FALSE);
	}
	
	/**
	 * Reset password - final step for forgotten password
	 *
	 * @param string|null $code The reset code
	 */
	public function reset_password($code = NULL) // on progress
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			// if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() === FALSE)
			{
				// display the form

				// set the flash data error message if there is one
				$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$data['new_password'] = array(
					'name' => 'new',
					'id' => 'new',
					'class' => 'form-control',
					'type' => 'password',
					'pattern' => '^.{' . $data['min_password_length'] . '}.*$',
				);
				$data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id' => 'new_confirm',
					'class' => 'form-control',
					'type' => 'password',
					'pattern' => '^.{' . $data['min_password_length'] . '}.*$',
				);
				$data['user_id'] = array(
					'name' => 'user_id',
					'id' => 'user_id',
					'class' => 'form-control',
					'type' => 'hidden',
					'value' => $user->id,
				);
				$data['csrf'] = $this->_get_csrf_nonce();
				$data['code'] = $code;

				// render
				$this->load->view('auth' . DIRECTORY_SEPARATOR . 'reset_password', $data);
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					// something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						// if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						redirect("auth/login", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			// if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("authx/forgot_password", 'refresh');
		}
	}

	/**
	 * Activate the user
	 *
	 * @param int         $id   The user ID
	 * @param string|bool $code The activation code
	 */
	public function activate($id, $code = FALSE) // on progress
	{
		if ($code !== FALSE)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
		else
		{
			// redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("authx/forgot_password", 'refresh');
		}
	}

	private function build_user_session()
	{
		$this->session->set_userdata($this->ion_auth->user()->row_array());
	}

	/**
	 * @return array A CSRF key-value pair
	 */
	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
    }
    
    /**
	 * @return bool Whether the posted CSRF token matches
	 */
	public function _valid_csrf_nonce(){
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue')){
			return TRUE;
		}
			return FALSE;
	}

    public function register()
    { 
        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $data['form']['identity_column'] = $identity_column;



        // validate form input
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        // if ($identity_column !== 'email')
        // {
        //     $this->form_validation->set_rules('identity', 'Identity', 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
        //     $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        // }
        // else
        // {
        //     $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
        // }
        // $this->form_validation->set_rules('phone', 'Phone', 'trim');
        // $this->form_validation->set_rules('company', 'Company', 'trim');
        // $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        // $this->form_validation->set_rules('password_confirm', 'Password Confirm', 'required');

        if ($this->form_validation->run() === TRUE)
        {
        				$this->load->model(array('auth_models'));
        	            $email = strtolower($this->input->post('email'));
            // $identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');
            // redirect them back to the admin page
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'ip_address' => '',
			    'username' => '',
			    'created_on'  => '',
			    'active'  => 1,
			    'username'  => 'user',
            );
            $this->session->set_userdata('username', 'user');
            	$this->auth_models->_create($data);
				redirect('auth/login', 'refresh');

        }    
        else
        {
            // display the create user form
            // set the flash data error message if there is one
            $data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $data['form']['first_name'] = array(
                'name' => 'first_name',
                'id' => 'input-first-name',
                'class' => 'form-control',
                'type' => 'text',
                'placeholder' => 'First Name',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $data['form']['last_name'] = array(
                'name' => 'last_name',
                'id' => 'input-last-name',
                'class' => 'form-control',
                'type' => 'text',
                'placeholder' => 'Last Name',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $data['form']['identity'] = array(
                'name' => 'identity',
                'id' => 'input-identity',
                'class' => 'form-control',
                'type' => 'text',
                'placeholder' => 'Identity',
                'value' => $this->form_validation->set_value('identity'),
            );
            $data['form']['email'] = array(
                'name' => 'email',
                'id' => 'input-email',
                'class' => 'form-control',
                'type' => 'text',
                'placeholder' => 'Email',
                'value' => $this->form_validation->set_value('email'),
            );
            $data['form']['company'] = array(
                'name' => 'company',
                'id' => 'input-company',
                'class' => 'form-control',
                'type' => 'text',
                'placeholder' => 'Company',
                'value' => $this->form_validation->set_value('company'),
            );
            $data['form']['phone'] = array(
                'name' => 'phone',
                'id' => 'input-phone',
                'class' => 'form-control',
                'type' => 'text',
                'placeholder' => 'Phone',
                'value' => $this->form_validation->set_value('phone'),
            );
            $data['form']['password'] = array(
                'name' => 'password',
                'id' => 'input-password',
                'class' => 'form-control',
                'type' => 'password',
                'placeholder' => 'Password',
                'value' => $this->form_validation->set_value('password'),
            );
            $data['form']['password_confirm'] = array(
                'name' => 'password_confirm',
                'id' => 'input-password-confirm',
                'class' => 'form-control',
                'type' => 'password',
                'placeholder' => 'Password Confirm',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            $data['page_title'] = 'Add User';
            $data['page_description'] = 'Form Add User';
            
			$this->load->view('register', $data, FALSE);   
            // $this->template->_render_admin('register', $data);
        }    
    }
	public function aa()
	{
        // validate form input
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
        if ($this->form_validation->run() === TRUE)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$this->load->model(array('auth_models'));

			$email = strtolower($this->input->post('email'));
			$password = md5($this->input->post('password'));
			$name = $this->input->post('nama');
			$remember = (bool)$this->input->post('remember');

			$data = array(
				'ip_address' => '',
			    'username' => $name,
			    'password'  => $password,
			    'email'  => $email,	
			    // 'created_on'  => '',
			);

			$this->auth_models->_create($data);
			// if ($this->ion_auth->login($email, $password, $remember))
			// {
			// 	//if the login is successful
			// 	//redirect them back to the home page
			// 	$this->session->set_flashdata('message', $this->ion_auth->messages());
			// 	$this->build_user_session();
				// redirect('admin/dashboard', 'refresh');
			// }
			// else
			// {
			// 	// if the login was un-successful
			// 	// redirect 	them back to the login page
			// 	$this->session->set_flashdata('message', $this->ion_auth->errors());
			// 	redirect('auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			// }
		}
		else
		{
			// the user is not logging in so display the login page
            // set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data['email'] = array('name' => 'email',
                'id' => 'email',
                'class' => 'form-control',
                'placeholder' => 'Email',
				'type' => 'email',
				'value' => $this->form_validation->set_value('email'),
			);
			$data['password'] = array('name' => 'password',
                'id' => 'password',
                'class' => 'form-control',
				'type' => 'password',
				'placeholder' => 'Passowrd',
			);			
			$data['password_confirm'] = array('name' => 'password',
                'id' => 'password',
                'class' => 'form-control',
				'type' => 'password',
				'placeholder' => 'Passowrd',
			);
			$data['nama'] = array('name' => 'nama',
                'id' => 'nama',
                'class' => 'form-control',
				'type' => 'text',
				'placeholder' => 'Nama',
			);
			$this->load->view('register', $data, FALSE);   
        }
	}
}
