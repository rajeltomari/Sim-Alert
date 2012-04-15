<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once MODPATH.'core/controllers/nova_sim.php';

class Sim extends Nova_sim {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Put your own methods below this...
	 */
	function index()
	{
		/* other data used by the view */
		$data['header'] = ucwords(lang('labels_the') .' '. lang('global_sim'));
		$data['msg_sim'] = $this->msgs->get_message('sim');

		/* load models */
		$this->load->model('alertstatus_model', 'alert');
		$currAlert = $this->alert->get_current_alert();
		$data['alertimg'] = array(
			'src' => Location::asset('images/alerts', $currAlert->alert_image.'-on.png'),
			'alt' => $currAlert->alert_name,
			'id' => 'al'.$currAlert->alert_id
			);
		
		$this->_regions['content'] = Location::view('sim_index', $this->skin, 'main', $data);
		$this->_regions['title'].= $data['header'];
		
		Template::assign($this->_regions);
		
		Template::render();
	}
}