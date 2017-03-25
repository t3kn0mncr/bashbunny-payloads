<?php

# BrowserBunny
# 

class BrowserBunny
{
	function __construct() {

		//Define Globals
		$this->root = '/root/udisk/payloads';
		$this->pwd = $this->get_pwd();
		$this->target_dir = $this->get_target_directory($this->pwd);
		$this->payload_names = $this->get_payloads();

	}
	protected function get_pwd() {
		$out = [];
		exec('pwd', $out);
		return $out[0];
	}
	protected function get_target_directory($pwd) {
		if(preg_match("/switch1/", $pwd)) {
			return preg_replace("/^.*switch1/", "switch2", $pwd);
		} else { 
			return preg_replace("/^.*switch2/", "switch1", $pwd);
		}
	}
	protected function get_payloads() {
		$out = [];
		exec('cd '.$this->root.'/library/; ls -d */', $out);
		return preg_replace("/\/$/", "", $out);
	}

	function display_payload_list() {
		$ret = '';
		$ret .= '<div class="btn-group-vertical">'
			.'<button class="target-switch btn btn-primary">Active Payload</button>';
		foreach($this->payload_names as $payload) { 
		    $ret .= '<button class="payload btn btn-primary" id="'.$payload.'">'.$payload.'</button>';
		}
		$ret .= '</div>';
		return $ret;
	}
	function is_valid_payload($payload) {
		$ret = false;
		foreach($this->payload_names as $payload_name) { 
			if($payload_name == $payload) { $ret = true; break; }
		}
		return $ret;
	}

}