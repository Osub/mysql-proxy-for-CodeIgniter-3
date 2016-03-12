<?php

/**
 * Base controllers for different purposes
 * 	- MY_Controller: 
 * 	- Admin_Controller: 
 * 	- API_Controller: 
 */
class MY_Controller extends CI_Controller {
	// Constructor
	public function __construct()
	{
		parent::__construct();

		//数据库读写分离
		register_shutdown_function(function(){
            foreach(get_object_vars($this) as $key => $val) {
                if(substr($key, 0, 3) == 'db_' && is_object($this->{$key}) && method_exists($this->{$key}, 'close')) {
                    $this->{$key}->close($key);
                }
                if(substr($key, 0, 5) == 'conn_'  && is_resource($this->{$key})) {
                    $this->db->_close($val);
                    unset($this->{$key});
                }
            }
        });
	}
}