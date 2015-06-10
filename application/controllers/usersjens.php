<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersJens extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome');
	}

	public function Login()
	{
		$this->load->view('login_page');
	}

	public function LoginUser()
	{
		$this->load->model('user');
		if($this->user->validate_login($this->input->post()) == FALSE)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('/login');
		}
		else
		{
			$result = $this->user->find_user($this->input->post());
			$this->session->set_userdata('user_name', $result['first_name']." ".$result['last_name']);
			$this->session->set_userdata('id', $result['id']);
			$this->session->set_userdata('user_level', $result['user_level']);
			redirect('/show/'.$result['id']);
		}
	}

	public function RegisterUser()
	{
		$this->load->model('user');
		if($this->user->validate_reg($this->input->post()) == FALSE)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('/register');
		}
		else
		{
			$this->user->create($this->input->post());
			$result = $this->user->find_user($this->input->post());
			$this->session->set_userdata('user_name', $result['first_name']." ".$result['last_name']);
			$this->session->set_userdata('id', $result['id']);
			$this->session->set_userdata('user_level', $result['user_level']);
			redirect('/show/'.$result['id']);
		}
	}

	public function Register()
	{
		$this->load->view('register');
	}

	public function DashboardAdmin()
	{
		$this->load->model('user');
		$result = $this->user->find_all_users();
		$this->load->view('dashboard_admin', array('users' => $result));
	}

	public function Dashboard()
	{
		$this->load->model('user');
		$result = $this->user->find_all_users();
		$this->load->view('dashboard_user', array('users' => $result));
	}

	public function EditUser($id)
	{
		$this->load->model('user');
		$result = $this->user->find_user_by_id($id);
		$this->load->view('edit_user', array('user' => $result));
	}

	public function EditProfile($id)
	{
		$this->load->model('user');
		$result = $this->user->find_user_by_id($id);
		$this->load->view('edit_profile', array('user' => $result));
	}

	public function EditUserProfile($id)
	{
		$this->load->model('user');
		if($this->user->validate_edit_user($this->input->post()) == FALSE)
		{
			$this->session->set_flashdata('editError', validation_errors());
			redirect('/EditProfile/'.$id);
		}
		$this->user->edit_user($this->input->post(), $id);
		$this->session->set_flashdata('editSuccess', 'Edit was a success');
		redirect('/EditProfile/'.$id);
	}

	public function EditUserInfo($id)
	{
		$this->load->model('user');
		if($this->user->validate_edit_user($this->input->post()) == FALSE)
		{
			$this->session->set_flashdata('editError', validation_errors());
			redirect('/EditUser/'.$id);
		}
		$this->user->edit_user($this->input->post(), $id);
		$this->session->set_flashdata('editSuccess', 'Edit was a success');
		redirect('/EditUser/'.$id);
	}

	public function EditChangePassword($id)
	{
		$this->load->model('user');
		if($this->user->validate_change_password($this->input->post()) == FALSE)
		{
			$this->session->set_flashdata('editError2', validation_errors());
			if($this->session->userdata('user_level')=='Normal')
			{
				redirect('/EditProfile/'.$id);
			}
			else
			{
				redirect('/EditUser/'.$id);
			}
		}
		$this->user->edit_password($this->input->post(), $id);
		$this->session->set_flashdata('editSuccess2', 'Edit was a success');
		if($this->session->userdata('user_level')=='Normal')
			{
				redirect('/EditProfile/'.$id);
			}
			else
			{
				redirect('/EditUser/'.$id);
			}
	}

	public function EditDescription($id)
	{
		$this->load->model('user');
		if($this->user->validate_change_description($this->input->post()) == FALSE)
		{
			$this->session->set_flashdata('editError3', validation_errors());
			redirect('/EditProfile/'.$id);
		}
		else
		{
			$this->user->edit_description($this->input->post(), $id);
			$this->session->set_flashdata('editSuccess3', 'Edit was a success');
			if($this->session->userdata('user_level') == 'Normal')
			{
				redirect('/EditProfile/'.$id);
			}
			else
			{
				redirect('/EditUser/'.$id);
			}
		}
	}

	public function Logout()
	{
		session_destroy();
		redirect('/');
	}
}
