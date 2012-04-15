<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once MODPATH.'core/controllers/nova_ajax.php';

class Ajax extends Nova_ajax {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Put your own methods below this...
	 */
	function change_alertstatus() {
		if (IS_AJAX) {
			/* load the resources */
			$this->load->model('alertstatus_model', 'alert');
			$nID = $this->input->post('tid', TRUE);

			$this->alert->unset_all_alerts();
			$update = $this->alert->set_alert($nID); 

			if ($update > 0) { 
				$al = $this->alert->get_alert($nID);
				echo $al->alert_image; 
			}
			else { echo 'fail'; } 
		}
	}
}
