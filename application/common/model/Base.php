<?php
namespace app\common\model;

use think\Model;

class Base extends Model
{
	protected $pageRowsCount=20;
	
	function __construct($data = [])
	{
		parent::__construct($data);
	}

	public function setPageRowsCount($val) {
		$this->pageRowsCount = $val;
	}

	public function exists_fileds($key)
	{
		if(array_key_exists($key, $this->data)){
			return true;
		}
		return false;
	}
	
	public function pushArray($key,&$value)
	{
		if(!array_key_exists($key, $this->data)){
			$this->data[$key]=array();
		}
		$this->data[$key][]=$value;
	}
	
	public function addResult()
	{
		$this->save();
		$id=$this->id;
		if ($id>0) {
			return RD($id);
		}else{
			return RE('失败');
		}
	}

	public function updateResult()
	{
		$c=$this->modify();
		if ($c>0) {
			return RD($c);
		}else{
			return RE('失败');
		}
	}

	public function delResult($id)
	{
		$c=$this->db()->delete($id);
		if ($c>0) {
			return RD($c);
		}else{
			return RE('失败');
		}
	}

	public function delsResult($ids)
	{
		$map['id']=array('in',$ids);
		$c=$this->db()->delete($map);
		if ($c>0) {
			return RD($c);
		}else{
			return RE('失败');
		}
	}

	public function modify($id=0)
	{
		$d=$this->data;
		if($id==0){
			$id=$d['id'];
		}
		$this->data([]);
		return $this->allowField(true)->save($d,['id' =>$id]);
	}
}