<?php 
class Layouts
{
	private $CI;
	private $layout_title = null;
	private $layout_description = null;
	private $includes = array();

	public function __construct()
	{
		$this->CI =& get_instance();
	}

	public function set_title($title)
	{
		$this->layout_title = $title;
	}

	public function set_description($description)
	{
		$this->layout_description = $description;
	}

	public function add_include($path, $prepend_base_url = true)
	{
		if($prepend_base_url)
		{
			$this->CI->load->helper('url');
			$this->includes[] = base_url() . $path;
		}
		else
		{
			$this->includes[] = $path;
		}
		return $this;
	}
	
	public function print_includes()
	{
		$final_includes = '';
		foreach($this->includes as $include)
		{
			if (preg_match('/js$/', $include))
			{
				$final_includes .= '<script src="' . $include . '"></script>' . "\n\r";
			}
			elseif (preg_match('/css$/', $include))
			{
				$final_includes .= '<link href="' . $include . '" rel="stylesheet"/>' . "\n\r";
			}
		}
		return $final_includes;
	}
	

	public function view($view_name, $params = array(), $default = 'default', $layouts = array())
	{
		if (is_array($layouts) && count($layouts) >= 1)
		{
			foreach ($layouts as $layout_key => $layout)
			{
				$params[$layout_key] = $this->CI->load->view($layout, $params, true);
			}
			
		}
		
		$params['layout_title'] 			= $this->layout_title;
		$params['layout_description']		= $this->layout_description;
		
		$this->CI->load->view('layouts/'.$default.'/header', $params);
		$this->CI->load->view($view_name, $params);
		$this->CI->load->view('layouts/'.$default.'/footer');
	}
}
?>