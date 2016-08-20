<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class LoginModel extends RelationModel{

	//关联数据
	protected $_link = array(
		'userinfo' => array(
			'mapping_type' =>self::BELONGS_TO,
	        'class_name' => 'User',
	        'foreign_key'=>'user_id',
	    ),
	);

	//自动检验
	protected $_validate = array(
	    
	);


	/**
	 * [getList 获取用户列表]
	 * @param  [string] $order [排序字段]
	 * @param  [integer] $page  [页数]
	 * @param  [integer] $count [每页显示个数]
	 * @return List
	 */
	public function getList($order,$page,$count){
		$List = $this->order($order)->page("$page,$count")->select();
		return $List;
	}
	/**
	 * [search 搜索用户]
	 * @param  [string] $key    [关键字]
	 * @param  [Integer] $page   [页数]
	 * @param  [Integer] &$count [引用，每页显示数量，引用后为总数]
	 * @return [List] 
	 */
	public function search($key,$page,&$count){
		$condition['nickname'] = array('like','%'.$key.'%');
		$condition['tel'] = array('like','%'.$key.'%');
		$condition['_logic'] = 'or';
		$List = $this->order('delete_tag asc,reg_time desc')->where($condition)->page("$page,$count")->select();
		$count = $this->where($condition)->count();
		for ($i=0; $i <count($List) ; $i++) { 
			$List[$i]['nickname'] = str_replace($key, "<span style='color:red'>".$key."</span>", $List[$i]['nickname']);//关键字高亮
			$List[$i]['tel'] = str_replace($key, "<span style='color:red'>".$key."</span>", $List[$i]['tel']);//关键字高亮
		}
		return $List;
	}


	public function checkPower($user_id){
		$power = $this->where(array('id'=>$user_id))->getField('power');
		if((int)$power>0)
			return true;
		else
			return false;
	}
	/**
	 * [setPower 权限切换，若为普通人员，设置为管理员，若为管理员，设置为普通人员]
	 * @param [string] $tel [传入的用户名]
	 * @return [bool] [返回修改成功与否]
	 */
	public function setPower($tel){
		$power = $this->where("tel = '$tel'")->getField('power');
		if($power == '1')
			$data['power'] = '0';
		else if($power == '0')
			$data['power'] = '1';
		$result = $this->where("tel = '$tel'")->save($data);
		if($result!=0)
			return true;
		else
			return false;
	}


	public function getInfoByid($id){
		return $this->where(array('id'=>$id))->field('id,nickname')->find();
	}

	/**
	 * [reg_statistics 通过开始时间和结束时间获取注册统计列表]
	 * @param  [date] $start [开始时间]
	 * @param  [date] $end   [结束时间]
	 * @return [List]        [查询到的列表]
	 */
	public function reg_statistics($start,$end){
		$condition['reg_time']   = array('between',array($start,$end));
		$List = $this->field('DATE_FORMAT(reg_time,"%Y-%m-%d") 日期,count(*) 注册数')
			 ->group('DATE_FORMAT(reg_time,"%Y-%m-%d")')
			 ->where($condition)
			 ->select();
			 return $List;
	}


	/**
	 * [init_days 将无浏览的当月的浏览数设置为0]
	 * @param  [Integer] $days_count  [传入当月的天数]
	 * @param  [Integer] $year  [传入的约]
	 * @param  [Integer] $mouth  [传入的年]
 	 * @param  [List] $List [要初始化的列表]
	 */
	public function init_days($days_count,$year,$mouth,&$List){
		for ($i=0; $i < $days_count; $i++) { //将无浏览的日期的浏览数设置为0
    		if($List[$i]['日期'] != date('Y-m-d',mktime(0,0,0,$mouth,$i+1,$year))){
    			for ($j=count($List)-1; $j >= $i; $j--)
    				$List[$j+1] =$List[$j];
    			$List[$i]['日期']   = date('Y-m-d',mktime(0,0,0,$mouth,$i+1,$year));
    			$List[$i]['注册数'] ='0';
    		}
    	}
	}
}