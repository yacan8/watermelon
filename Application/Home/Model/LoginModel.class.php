<?php
namespace Home\Model;
use Think\Model\RelationModel;
class LoginModel extends RelationModel{

	//关联数据
	protected $_link = array(
		'collection' => array(
		    'mapping_type' =>  self::MANY_TO_MANY,
		    'class_name'=>'News',
		    'foreign_key' =>  'collecting',
		    'relation_foreign_key' => 'collected', 
		    'relation_table' => 'cl_collection', 
		   )
	);

	//自动检验
	protected $_validate = array(
	    array('tel','require','请输入手机号码！'),
	    array('nickname','require','请输入昵称！'),
	    array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
	    array('tel','/^1[34578]\d{9}$/','请输入正确手机号码'),
	    array('password','checkpassword','密码长度必须为6~20',0,'function'),
	    array('nickname','checknickname','昵称长度不能大于15',0,'function'),
	);

	/**
	 * [check_username 检查用户名是否存在]
	 * @param  [string] $username [传入的用户名]
	 * @return [bool]           [检查到用户存在返回true,否则返回false]
	 */
	public function check_username($username){
		$count = $this->where(array('tel'=>$username))->count();
		if($count!=0) return true;
		else return false;
	}
	/**
	 * [login 用户登录]
	 * @param  [array] $data [传入的用户名密码数组]
	 * @return [bool]       [返回登录是否成功]
	 */
	public function login($data){
		$tel = $data['tel'];
		$password = md5($data['password']);
		$info = $this->where(array('tel'=>$tel))->field('id,password,user_id,nickname')->find();
		if($password == $info['password']){
			session('id',$info['id']);
			session('userid',$info['user_id']);
			session('nickname',$info['nickname']);
			return true;
		}
		else return false;
	}

	/**
	 * [getById 通过用户id获取用户登录基本数据]
	 * @param  [Integer] $id [传入的id]
	 * @return [array]      [返回昵称和头像组成的数组]
	 */
	public function getById($id){
		$list = $this->where(array('id'=>$id))->field("id,tel,nickname,icon")->find();
		if($list['icon'] == '')
			$list['icon'] = 'default.jpg';
		return $list;
	}

	/**
	 * [change_icon 修改头像，生成缩略图，删除原本头像]
	 * @param  [string] $tel [传入的手机号码]
	 */
	public function change_icon($tel){
		$config = array(
				'maxSize' => 8145728,// 设置附件上传大小
				'exts' => array('jpg', 'gif', 'png', 'jpeg'),// 设置附件上传类型
				'savePath'=>'login/',// 设置附件上传目录
				'subName' => null,
				'rootPath'=> './Data/'
			);
		$upload = new \Think\Upload($config);// 实例化上传类
		$info = $upload->uploadOne($_FILES['file']);
		if(!$info){
			return $upload->getError();
		}
		$Savename = $info['savename'];
		$SavenameArray = explode('.',$Savename);
		$thumbname = $SavenameArray[0]."_thumb.".$SavenameArray[1];
		$Image = new \Think\Image(\Think\Image::IMAGE_GD);
		$Image->open('./Data/login/'.$Savename);
		$Image->thumb(150, 150)->save('./Data/login_thumb/'.$thumbname);

		unlink('./Data/login/'.$Savename);
		$this->icon = $thumbname;	//图片名字
		$bef = $this->where(array('tel'=>$tel))->getField('icon');
		if($bef!=''){
			unlink('./Data/login_thumb/'.$bef);
		}
		return '';
	}

	/**
	 * [ChangePassword 修改密码]
	 * @param [string] $o_password [原密码]
	 * @param [string] $n_password [新密码]
	 * @return  [string] [<返回修改状态>]
	 */
	public function ChangePassword($o_password,$n_password,$tel){
		$password = $this->where(array('tel'=>$tel))->getField('password');
		if($password==md5($o_password)){
			if($o_password==$n_password){
				return '新密码与原密码相同';
			}else{
				$data['password'] = md5($n_password);
				$result = $this->where(array('tel'=>$tel))->save($data);
				if($result==0)
					return "修改失败";
				else return "修改成功";
			}
		}else{
			return "密码错误";
		}

	}

	/**
	 *	[getLoginInfoById 获取登陆信息]
	 *	@param [Integer] $id 登陆编号
	 *	@return 登陆信息 
	 */
	public function getLoginInfoById($id){
		$condition['id'] = $id;
		$result = $this->where($condition)->find();
		return $result;
	}

	/**
	 * [getNickByUser_Id 获取用户昵称]
	 * @param [Integer] $userid
	 * @return 用户昵称
	 */
	public function getNickByUserId($userid){
		$condition['user_id'] = $userid;
		$result = $this->where($condition)->field('nickname')->find();
		return $result['nickname'];
	}
}