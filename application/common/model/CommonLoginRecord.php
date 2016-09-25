<?php

namespace app\common\model;

class CommonLoginRecord extends Base
{
    public function addResult()
	{
		$this->created=time();
		return parent::addResult();
	}
	public function pageLis($keyword='',$sdate='',$edate='')
	{
		
		$map=array();
		if(!empty($keyword)){
			$map['a.name']=array('like',"%$keyword%");
		}
		if(!empty($sdate)){
			$sdate=strtotime($sdate);
		}else{
			$sdate=0;
		}
		if(!empty($edate)){
			$edate=(strtotime($edate)+24*60*60);
		}else{
			$edate=time();
		}
		$this->whereTime('m.created', 'between', [$sdate, $edate]);
		$this->alias('m')->join('common_admin a','a.id=m.admin_id')
		->field('m.*,a.name');
		$p=$this->order('m.id desc')->where($map)->paginate();
		return $p;
	}
}
