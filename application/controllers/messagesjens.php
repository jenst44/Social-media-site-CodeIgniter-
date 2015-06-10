<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MessagesJens extends CI_Controller {

	public function Profile($id)
	{
		$this->load->model('user');
		$result = $this->user->find_user_by_id($id);
		$this->load->model('message');
		$result2 = $this->message->find_messages($id);
		$result3 = $this->message->find_comments($id);
		if(!empty($result3)){
		$this->load->view('profile', array('user' => $result, 'messages' => $result2, 'comments' => $result3));
		} else {
			$this->load->view('profile', array('user' => $result, 'messages' => $result2));
		}	
	}

	public function CreateMessage($id)
	{
		$this->load->model('message');

		if($this->message->validate_message($this->input->post()) == FALSE)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('/show/'.$id);

		}
		else
		{
			$this->message->create_message($this->input->post(), $id);
			redirect('/show/'.$id);
		}
	}

	public function CreateComment($id, $message_id)
	{
		$this->load->model('message');

		if($this->message->validate_comment($this->input->post()) == FALSE)
		{
			redirect('/show/'.$id);

		}
		else
		{
			$this->message->create_comment($this->input->post(), $message_id);
			redirect('/show/'.$id);
		}

	}


}