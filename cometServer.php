<?php

abstract class Server {
	
	protected $_data = array();
	protected $_response = null;
	protected $_timeout = null;
	protected $_started_at = null;
	
	public function __construct()
	{
		$this->_started_at = time();
	}
	
	public function handleRequest()
	{
	}
	public function _make_Response()
	{
	}
	protected function _sendResponse()
	{
		echo $this->_response();
	}	
}

class COMETServer extends Server {
	
	public function __construct($timeout = 360)
	{
		parent::__construct();
		$this->_timeout = $timeout;
		set_time_limit($timeout + 5);
	}

	public function handleRequest()
	{
		while(time() - $this->_started_at < $this->_timeout)
		{
			$qNewMessages = 
				"SELECT m.*
					FROM `messages` m
					WHERE m.`id` > ". (int)$_GET['id']."
					ORDER BY m.`id`";
			$rNewMessages = mysql_query($qNewMessages) or die(mysql_error());
			
			if (mysql_num_rows($rNewMessages))
			{
				while( $row = mysql_fetch_assoc($rNewMessages))
				{
					$row['date'] = substr($row['posted_at'],0,10);
					$row['time'] = substr($row['posted_at'],11);
					$this->_data[] = $row;
				}
				
				$this->_makeResponse();
				$this->_sendResponse();
			}
			
			sleep(5);
		}
	}
	
	protected function _makeResponse()
	{
		$this->_response = json_encode($this->_data);
		return $this;
	}
	
	protected function _sendResponse()
	{
		// вантуз для пробивки буфферов
		// echo str_pad($this->_response,256,' ',STR_PAD_RIGHT);
		echo $this->_response;
		flush();
		exit;
	}
}