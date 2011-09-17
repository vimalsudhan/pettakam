<?php
/*
 * Pettakam, a simple cache library. An alternative when you don't have memcache
 * 
 * http://code.vimalsudhan.com/pettakam
 * 
 * Copyright 2011 Vimal Sudhan
 * Dual licensed - Apache License 2.0, GNU GPL 3.0
 * 
 */

/**
 * Pettakam, a simple cache library
 * 
 * An alternative if you don't have memcache
 * 
 * @author Vimal Sudhan <me@vimalsudhan.com>
 * @package pettakam
 * @copyright 2011 Vimal Sudhan
 * @license Dual-licensed (Apache License 2.0 and GNU GPL 3.0)
 * @version 0.1.2
 *
 */

class Pettakam{
	
	private $repo;
	private $ext="pkm";
	
	function __construct($config)
	{
		$repo="pettakam";
		if(isset($config['repo']))
			$repo=$config['repo'];
		if(isset($config['ext']))
			$this->ext=$config['ext'];
		$repo = str_replace("\\", "/", $repo); 
		if(substr($repo,-1)!="/")
			$repo.="/";
		$this->repo=$repo;
	}
	
	public function get($var)
	{
		$cache_str=@file_get_contents($this->repo.$var."_".$this->ext);
		if(empty($cache_str))
			return false;
		$cache=unserialize($cache_str);
		if(!isset($cache['expires']) || !isset($cache['data']))
			return false;
		if($cache['expires']<time())
		{
			@file_put_contents($this->repo.$var."_".$this->ext,"");
			return false;
		}
		return $cache['data'];
	}
	
	public function store($name,$val,$expires=600,$group="")
	{
		$cache=array("expires"=>time()+$expires,"data"=>$val);
		if($group!="")
			$cache['group']=$group;
		$cache_str=serialize($cache);
		@file_put_contents($this->repo.$name."_".$this->ext,$cache_str);
	}
	
	public function clear($var)
	{
		if(!is_array($var))
			$var=array($var);
		foreach($var as $v)
			file_put_contents($this->repo.$v."_".$this->ext, "");
	}
	
	public function clear_all()
	{
		$ext="_".$this->ext;
		if ($handle = opendir($this->repo)) 
		{
		    while (false !== ($file = readdir($handle))) {
    			if(substr($file, strlen($ext)*-1) === $ext && $file!="." && $file!="..")
		    		file_put_contents($this->repo.$file, "");
		    }
		    closedir($handle);
		}
	}
	
	public function clear_group($group)
	{
		$ext="_".$this->ext;
		if ($handle = opendir($this->repo)) 
		{
		    while (false !== ($file = readdir($handle))) {
    			if(substr($file, strlen($ext)*-1) === $ext && $file!="." && $file!="..")
    			{
    				$cache_str=file_get_contents($this->repo.$file);
    				$cache=unserialize($cache_str);
    				if(!isset($cache['expires']) || !isset($cache['data']) || !isset($cache['group']) || $cache['group']!=$group)
    					continue;
		    		file_put_contents($this->repo.$file, "");
    			}
		    }
		    closedir($handle);
		}
	}
	
}
