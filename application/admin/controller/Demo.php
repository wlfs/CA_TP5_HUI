<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
class Demo extends Controller
{
	public function page()
	{
		// $ids=[1,2];
		// $map['id']=array('in',$ids);

		// $lis=db("CommonAdmin")->where($map)->select();
		// echo "db():<br/>";
		// var_dump($lis);
		// echo "<br/>Db::name:<br/>";
		// $lis=Db::name("CommonAdmin")->where($map)->select();
		// var_dump($lis);
		echo 'xxxx';
		return 'bbb';
	}
	public function db($value='')
	{
		if(request()->isAjax()){
			config('paginate.var_page','draw');
			$request=request();
			$length=$request->get('length');
			$start=$request->get('start');
			$page=($start/$length)+1;
			$order=$request->get('order/a');
			$columns=$request->get('columns/a');
			$model=model('CommonLoginRecord');
			//处理排序
			if($order){
				$orderArr=array();
				foreach ($order as $key => $value) {
					$orderArr[$columns[$value['column']]['data']]=$value['dir'];
				}
				$model->order($orderArr);
			}
			//处理查询
			$search=$request->get('search/a');
			$val=$search['value'];
			$map['admin_id|id']=array('like',"%$val%");
			$model->where($map);
			//分页数据
			$data=$model->paginate($length,false,[
				'page'=>$page
				]);
			return json($data);
		}
		return view();
	}

}