<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Model
{

	public function validate_message()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('message', 'Message', 'required|trim');

		if($this->form_validation->run() === FALSE)
			{
				return FALSE;
			}
			else
			{
				return TRUE;
			}
	}

	public function validate_comment()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('comment', 'Comment', 'required|trim');

		if($this->form_validation->run() === FALSE)
			{
				return FALSE;
			}
			else
			{
				return TRUE;
			}
	}


	public function create_message($user_info, $id)
	{
		$query = "INSERT INTO messages (content, user_id, wall_id, created_at) VALUES (?, ?, ?, NOW())";
		$values = array($user_info['message'], $this->session->userdata['id'], $id);
		$this->db->query($query, $values);
	}

	public function create_comment($comment_info, $id)
	{
		$query = "INSERT INTO comments (content, user_id, message_id, created_at) VALUES (?,?,?,NOW())";
		$values = array($comment_info, $this->session->userdata('id'), $id);
		$this->db->query($query, $values);
	}

	public function find_messages($id)
	{
		$query = "SELECT CONCAT_WS(' ',users.first_name,users.last_name) as full_name, DATE_FORMAT(messages.created_at, '%M %D %Y') as created_at, messages.content, messages.id 
					FROM messages 
					LEFT JOIN users ON messages.user_id = users.id
					WHERE messages.wall_id = $id
					ORDER BY messages.id DESC";
		return $this->db->query($query)->result_array();
	}

	public function find_comments($id)
	{
		$query = "SELECT comments.message_id FROM comments
				LEFT JOIN messages ON comments.message_id = messages.id
				LEFT JOIN users ON comments.user_id = users.id
				WHERE wall_id = $id
				GROUP BY comments.message_id
				ORDER BY comments.message_id DESC";
		$array = $this->db->query($query)->result_array();
		
		if(!empty($array))
		{
		foreach ($array as $value) {
			$newquery = "SELECT comments.content, CONCAT_WS(' ',users.first_name,users.last_name) as full_name, DATE_FORMAT(comments.created_at, '%M %D %Y') as created_at FROM comments
			LEFT JOIN messages ON comments.message_id = messages.id
			LEFT JOIN users ON comments.user_id = users.id
			WHERE comments.message_id =".$value['message_id'];

			$dopeArray[] = $this->db->query($newquery)->result_array();
		}
			return ($dopeArray);
		}
	}



}