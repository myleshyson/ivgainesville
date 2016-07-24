<?php 

namespace App\Http;

/**
* Flash Message
*/
class Flash
{	

	/**
	 * Stores flash_message in session
	 * @param   $title   Title of Alert
	 * @param   $message  Message of Alert
	 * @param 	$level    Type of Alert 	
	 */
	public function create($title, $message, $level, $key = 'flash_message')
	{
		session()->flash($key,
		 [
		 	'title' => $title,
		 	'message' => $message,
		 	'level' => $level
		]);
	}

	/**
	 * Return Info Alert
	 * @param   $title   Title of Alert
	 * @param  $message Message of Alert
	 * @return SweetAlert Instance 
	 */
	public function info($title, $message)
	{
		return $this->create($title, $message, 'info');
	}

	/**
	 * Return Success Alert
	 * @param   $title   Title of Alert
	 * @param  $message Message of Alert
	 * @return SweetAlert Instance 
	 */
	public function success($title, $message)
	{
		return $this->create($title, $message, 'success');
	}

	/**
	 * Return Error Alert
	 * @param   $title   Title of Alert
	 * @param  $message Message of Alert
	 * @return SweetAlert Instance 
	 */
	public function error($title, $message)
	{
		return $this->create($title, $message, 'error');
	}

	public function warning($title, $message)
	{
		return $this->create($title, $message, 'warning', 'flash_warning');
	}
}