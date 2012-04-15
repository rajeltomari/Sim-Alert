<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once MODPATH.'core/controllers/nova_admin.php';

class Admin extends Nova_admin {

	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Put your own methods below this...
	 */
	function alertstatus() {
		$this->auth->check_access('site/settings', TRUE);
		/* load models */
		$this->load->model('alertstatus_model', 'alert');
		
		$alerts = $this->alert->get_alerts();
		if ($alerts->num_rows() > 0) {
			foreach ($alerts->result() as $alert) {
				$imgstat = 'off';
				if ($alert->alert_active == 'y') { 
					$imgstat = 'on'; 
				}
				$data['alerts'][$alert->alert_id] = array(
					'img' => array(
							'src' => Location::asset('images/alerts', $alert->alert_image.'-'.$imgstat.'.png'),
							'alt' => $alert->alert_name,
							'class' => $imgstat,
							'currStat' => $alert->alert_image,
							'id' => 'al'.$alert->alert_id),
					'name' => $alert->alert_name,
					'desc' => $alert->alert_description,
					'active' => $alert->alert_active,
					'id' => $alert->alert_id,
					'imgbase' => $alert->alert_image
				);
				$data_js['img'][$alert->alert_id] = array(
						'src' => $alert->alert_image.'-hover.png',
						'id' => $alert->alert_id
						);
			}
		}
		
		$data['loading'] = array(
			'src' => Location::asset('images/alerts', 'black-bg-loading.gif'),
			'alt' => '',
			'class' => 'image'
		);

		$data['imglocation'] = base_url().Location::asset('images/alerts', '');
		
		$data['activealert'] = $this->alert->get_current_alert();
		
		$data['header'] = 'Alert Status';
		$data['text']= 'Set the current alert status of your ship by clicking on the proper alert claxon.';

		$this->_regions['content'] = Location::view('admin_alertstatus', $this->skin, 'admin', $data);
		$this->_regions['javascript'] = Location::js('admin_alertstatus_js', $this->skin, 'admin');
		$this->_regions['title'].= $data['header'];
		
		Template::assign($this->_regions);
		
		Template::render();
	}
}
