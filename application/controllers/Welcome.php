<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index()
	{
		$this->data['hasil'] = $this->model1->getUser('homework');
		$this->load->view('welcome_message', $this->data);
	}

	public function form_input()
	{
		$this->load->view('form-input');
	}

	public function insert()
	{
		$duedate = $_POST['duedate'];
		$class = $_POST['class'];
		$assignment = $_POST['assignment'];
		$note = $_POST['note'];
		$data = array('due_date' => $duedate, 'class' => $class, 'Assignment' => $assignment, 'Note' => $note);
		$tambah = $this->model1->tambahData('homework', $data);
		if($tambah > 0){
			redirect ('Welcome');
		}else{
			echo 'Failed to save your task';
		}
	}

	public function form_edit($id)
	{
		$this->data['dataEdit'] = $this->model1->dataEdit('homework', $id);
		$this->load->view('form-edit', $this->data);
	}

	public function delete($id)
	{
		$hapus = $this->model1->hapusData('homework', $id);
		if($hapus > 0){
			redirect ('Welcome');
		}else{
			echo 'Failed to delete your task';
		}
	}

	public function update($id)
	{
		$duedate = $_POST['duedate'];
		$class = $_POST['class'];
		$assignment = $_POST['assignment'];
		$note = $_POST['note'];
		$data = array('due_date' => $duedate, 'class' => $class, 'Assignment' => $assignment, 'Note' => $note);
		$edit = $this->model1->editData('homework', $data, $id);
		if($edit > 0){
			redirect ('Welcome');
		}else{
			echo 'Failed to save your story';
		}
	}
}
