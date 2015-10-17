<?php
App::uses('AppModel', 'Model');

class User extends AppModel {
	public $recursive = -1;

	public function getUsersList() {
		$requestData= $_REQUEST;
		$columns = array( 
			0 => 'id',
			1 => 'id',
			2 => 'firstname', 
			3 => 'lastname',
			4 => 'email',
			5 => 'status',
			6 => 'type',
			7 => 'created'
 		);
 		$totalData = $this->find('count'); 
		$totalFiltered = $totalData;
		if( !empty($requestData['search']['value']) ) {   
			$condition = array(
				'OR' => array(
					'User.id LIKE' => '%'.$requestData['search']['value'].'%',
					'User.firstname LIKE' => '%'.$requestData['search']['value'].'%' ,
					'User.lastname LIKE' => '%'.$requestData['search']['value'].'%' ,
					"CONCAT(firstname,' ',lastname) LIKE" => '%'.$requestData['search']['value'].'%' ,
					'User.email LIKE' => '%'.$requestData['search']['value'].'%' ,
					'User.created LIKE' =>  '%'.$requestData['search']['value'].'%'
				)
			);
			
		} else {
			$condition = array('1=1');
		} 
		// getting total number records without any search
		$total_data = $this->find('all',
			array(
				'conditions' => $condition,
				'fields' => array('id','firstname','lastname','email','created','status','type'),
				'order' => $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir'],
				'limit' => $requestData['length'],
				'offset' => $requestData['start']
			)
		);
		
		if( !empty($requestData['search']['value']) ) {
			$totalFiltered = count($total_data);
		}

		$data = array();
		foreach ($total_data as $total_data1) {
			$checkbox = '<input type="checkbox"  class="chk_all" name="chk_all" value="'.$total_data1['User']['id'].'" />';
			$nestedData = array(); 
			$nestedData[] = $checkbox;
			$nestedData[] = $total_data1['User']['id'];
			$nestedData[] = $total_data1['User']['firstname'];
			$nestedData[] = $total_data1['User']['lastname'];
			$nestedData[] = $total_data1['User']['email'];
			$nestedData[] = $this->getUserStatus($total_data1['User']['status']);
			$nestedData[] = $this->getUserType($total_data1['User']['type']);
			$nestedData[] = date('d-m-Y',strtotime($total_data1['User']['created']));
			$data[] = $nestedData;
		}
		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),
			"recordsTotal"    => intval( $totalData ),
			"recordsFiltered" => intval( $totalFiltered ),
			"data"            => $data 
		);
		
		return $json_data; 
	}

	public function getUserStatus($status) {
		return $status == 1? '<span class="label label-success">Active</span>':'<span class="label label-danger">Inactive</span>';
	}

	public function getUserType($type) {
		return $type == 1? 'Owner':'Customer';
	}
}