<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function index(){
        $data = array(
			'title'		=> 'Users',
		);
		$this->load_page('index',$data);
	}

	public function getUsersList() {
		$limit = $this->input->post('length');
		$offset = $this->input->post('start');
		$search = $this->input->post('search');
		$order = $this->input->post('order');
		$draw = $this->input->post('draw');
		$select = "*";
		$column_order = array('user_id','fullname','birthdate','salary','description');
		$join = array();
		$where = '';
		$list = datatables('ex_users',$column_order, $select, $where, $join, $limit, $offset ,$search, $order);
		$new_array = array();
        foreach ($list['data'] as $key => $value) {
			$value->birthdate = date('m/d/Y', strtotime($value->birthdate));
            $new_array[] = $value;
        }
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $list['count_all'],
			"recordsFiltered" => $list['count'],
			"data" => $new_array,
		);
		echo json_encode($output);
	}

	public function addUser() {
		$respond = array();
        if (isset($_POST)) {
			$ctr = 0;

			unset($_POST['job_description']);

			foreach ($_POST as $key => $value) {
				$name = ucfirst(str_replace('_', ' ', $key));
				$this->form_validation->set_rules($key, $name, 'trim|required', array('required' => '{field} is required'));
				if (!$this->form_validation->run()) {
					if ($value == '') {
						$respond[$key] = form_error($key);
						$ctr += 1;
					}
				}
			}

			if ($ctr == 0) {
				$fullname		= trim($this->input->post('fullname'));
				$birthdate		= trim($this->input->post('birthdate'));
				$salary			= trim($this->input->post('salary'));
				$description	= trim($this->input->post('description'));

				$saveUserData = array(
					'fullname'		=> $fullname,
					'birthdate'		=> date('Y-m-d',strtotime($birthdate)),
					'salary' 		=> $salary,
					'description' 	=> $description,
				);
				if(isset($_FILES['job_description']) && $_FILES['job_description']['error'] == 0){
					if(move_uploaded_file($_FILES['job_description']['tmp_name'], 'assets/uploads/pdf/'.$_FILES['job_description']['name'])){
						$saveUserData['job_description'] = $_FILES['job_description']['name'];
					}
				}
				$insertUser = insert('ex_users',$saveUserData);
				if ($insertUser) {
					$respond['status'] = "success";
					$respond['msg'] = "User added Successfully";
				} else {
					$respond['status'] = "error";
					$respond['msg'] = "Something went wrong";
				}

			} // End of ctr
			json($respond);
		}
	}

	// Fetch User Information
	public function getUserInfo(){
		$user_id = $_POST['user_id'];
		$parameters['select'] = "*";
		$parameters['where'] = array('user_id' => $user_id);
		$data = getrow('ex_users', $parameters, 'row');
		json($data);
	}

	public function updateUser() {
		$respond = array();
        if (isset($_POST)) {
			$ctr = 0;

			unset($_POST['job_description']);

			foreach ($_POST as $key => $value) {
				$name = ucfirst(str_replace('_', ' ', $key));
				$this->form_validation->set_rules($key, $name, 'trim|required', array('required' => '{field} is required'));
				if (!$this->form_validation->run()) {
					if ($value == '') {
						$respond[$key] = form_error($key);
						$ctr += 1;
					}
				}
			}
			if ($ctr == 0) {
				$user_id	= trim($this->input->post('user_id'));
				$fullname	= trim($this->input->post('fullname'));
				$birthdate	= trim($this->input->post('birthdate'));
				$salary		= trim($this->input->post('salary'));
				$description	= trim($this->input->post('description'));
		
				$updateUserData = array(
					'set'	=> array(
						'fullname' 		=> $fullname,
						'birthdate' 	=> date('Y-m-d',strtotime($birthdate)),
						'salary' 		=> $salary,
						'description' 	=> $description,
					),
					'where' => "user_id = '$user_id'",
				);

				if(isset($_FILES['job_description']) && $_FILES['job_description']['error'] == 0){
					if(move_uploaded_file($_FILES['job_description']['tmp_name'], 'assets/uploads/pdf/'.$_FILES['job_description']['name'])){
						$updateUserData['set']['job_description'] = $_FILES['job_description']['name'];
					}
				}

				$updateUser = update('ex_users',$updateUserData['set'],$updateUserData['where']);
				if ($updateUser) {
					$respond['status'] = "success";
					$respond['msg'] = "User updated Successfully";
				} else {
					$respond['status'] = "error";
					$respond['msg'] = "Something went wrong";
				}
			} // End of ctr
			json($respond);
		}
	}

	public function removeUser() {
		$user_id = $_POST['user_id'];
		$data = "user_id = '$user_id'";
		$query = delete('ex_users', $data);
		if ($query) {
			$respond['status'] = "success";
			$respond['msg']    = "User removed Successfully";
		} else {
			$respond['status'] = "error";
			$respond['msg'] = 'Something went wrong.';
		}
		json($respond);
	}

	public function uploadPDF() {
    	$uploadhandler = $this->load->library("UploadHandler");
		print_r($_FILES);
		exit;
	// 	$config['upload_path'] = "assets/uploads/pdf/";
	//    	$config['allowed_types'] = 'pdf';
	// 	$this->upload->initialize($config);
	//    	if($this->upload->do_upload("job_description")) {
	// 		$uploadData = $this->upload->data();
	// 		$filename = $uploadData['file_name'];
	// 		$data = array(
	// 			'material_name' 		=> $title,
	// 			'material_filename' 	=> $filename,
	// 			'status' => 1
	// 		);

	// 		$insert = $this->MY_Model->insert('pcs_materials', $data);

	// 		echo json_encode($insert);
	//    }
	}

	public function exportPDF() {
		$this->load->library('pdf');
		$param['select'] = "*";
		$data = getrow('ex_users',$param,'obj');
		if($data) {
			$output['datas'] = $data;
			$html = $this->load->view('exportpdf',$output,true);
			$this->pdf->createPDF($html,true,'letter','');
		}	
	}

} // End of Class