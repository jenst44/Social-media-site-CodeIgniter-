<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
	public function validate_reg($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'required|trim|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|alpha');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[confirm_password]|md5');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|md5');

		if($this->form_validation->run() === FALSE)
			{
				return FALSE;
			}
			else
			{
				return TRUE;
			}
	}

	public function validate_login($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|md5');

		if($this->form_validation->run() === FALSE)
			{
				return FALSE;
			}
			else
			{
				return TRUE;
			}
	}

	public function validate_edit_user()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('first_name', 'First Name', 'required|trim|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|alpha');

		if($this->form_validation->run() === FALSE)
			{
				return FALSE;
			}
			else
			{
				return TRUE;
			}
	}

	public function validate_change_password()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[confirm_password]|md5');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|md5');

		if($this->form_validation->run() === FALSE)
			{
				return FALSE;
			}
			else
			{
				return TRUE;
			}
	}

	public function validate_change_description()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('description', 'Description', 'required|trim');

		if($this->form_validation->run() === FALSE)
			{
				return FALSE;
			}
			else
			{
				return TRUE;
			}
	}

	public function find_user($post)
	{
		$query = "SELECT * FROM users WHERE email = ? AND password = ?";
		$values = array($post['email'],$post['password']);
		$result = $this->db->query($query, $values)->row_array();
		return $result;
	}

	public function find_user_by_id($id)
	{
		$query = "SELECT * FROM users WHERE id = ?";
		$result = $this->db->query($query, $id)->row_array();
		return $result;
	}

	public function find_all_users()
	{
		$query = "SELECT * FROM users";
		$result = $this->db->query($query)->result_array();
		return $result;
	}

	public function create($userinfo)
	{
		$query = "INSERT INTO users(first_name, last_name, email, password, created_at, updated_at, user_level) VALUES(?,?,?,?,NOW(),NOW(),'Normal')";
		$values= array($userinfo['first_name'],$userinfo['last_name'],$userinfo['email'],$userinfo['password']);
		$this->db->query($query, $values);
	}

	public function edit_user($userinfo, $id)
	{
		$query = "UPDATE users SET first_name=?, last_name=?, email=?, user_level=?, updated_at=NOW() WHERE id=$id;";
		$values = array($userinfo['first_name'],$userinfo['last_name'],$userinfo['email'],$userinfo['user_Level']);
		$this->db->query($query, $values);
	}

	public function edit_password($userinfo, $id)
	{
		$query = "UPDATE users SET password=?, updated_at=NOW() WHERE id=$id";
		$this->db->query($query, $userinfo['password']);
	}

	public function edit_description($userinfo, $id)
	{
		$query = "UPDATE users SET description=? WHERE id=$id";
		$this->db->query($query, $userinfo['description']);
	}

}