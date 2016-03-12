<?php
class MY_Model extends CI_Model
{

	//数据库读写分离
	 public function __construct($group_name = '')
    {
        parent::__construct();
        $this->initDb($group_name);
    }
    private function initDb($group_name = '')
    {
        $db_conn_name = $this->getDbName($group_name);
        $CI = & get_instance();
        if(isset($CI->{$db_conn_name}) && is_object($CI->{$db_conn_name})) {
            $this->db = $CI->{$db_conn_name};
        } else {
            $CI->{$db_conn_name} = $this->db = $this->load->database($group_name, TRUE);
        }
    }
    private function getDbName($group_name = '')
    {
        if($group_name == '') {
            $db_conn_name = 'db';
        } else {
            $db_conn_name = 'db_'.$group_name;
        }
        return $db_conn_name;
    }
}