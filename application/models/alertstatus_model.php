<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alertstatus_model extends CI_Model {

	function Alertstatus_model()
	{
		parent::__construct();
		
		/* load the db utility library */
		$this->load->dbutil();
	}

	function get_alerts() {
		$this->db->from('shipalerts');
		$query = $this->db->get();
		return $query;
	}
	
	function get_current_alert() {
		$query = $this->db->get_where('shipalerts', array('alert_active'=>'y'));
		$row = ($query->num_rows() > 0) ? $query->row() : FALSE;
		return $row;
	}

	function get_alert($id = 0) {
		$query = $this->db->get_where('shipalerts', array('alert_id' => $id));
		$row = ($query->num_rows() > 0) ? $query->row() : FALSE;
		return $row;
	}
	
	function unset_all_alerts() {
		$data = array('alert_active' => 'n');
		$this->db->where('alert_active', 'y');
		$this->db->update('shipalerts', $data);
		$this->dbutil->optimize_table('shipalerts');
	}
	
	function set_alert($id = 0) {
		$data = array('alert_active' => 'y');
		$this->db->where('alert_id', $id);
		$update = $this->db->update('shipalerts', $data);
		$this->dbutil->optimize_table('shipalerts');
		return $update;
	}	
}
?>