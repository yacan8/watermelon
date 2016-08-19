<?php
namespace Home\Model;
use Think\Model;
class CommentModel extends Model{

	/**
	 * [getCommentByOtherId 通过ID获取评论信息]
	 * @param  [Integer] $id    [被评论的个体ID]
	 * @param  [Integer] $type  [被评论的类型（1为景点、2为资讯、3为游记）]
	 * @param  [Integer] $page  [加载的页数]
	 * @param  [Integer] $count [每页查询的数目]
	 * @return [List]        [评论列表信息]
	 */
	public function getCommentByOtherId($id,$type,$page,$count){
		$DB_PREFIX = C('DB_PREFIX');/*获取数据库前缀*/
		$M = M('');
		$List = $M->table($DB_PREFIX.'comment c')
				  ->field('c.id id, c.time time,c.content content, s.icon sender_icon, s.nickname sender_nickname , s.id sender_id, r.nickname receiver_nickname , r.id receiver_id')
				  ->join($DB_PREFIX.'login s on s.id = c.sender','left')
				  ->join($DB_PREFIX.'login r on r.id = c.receiver','left')
				  ->where("c.type = $type and c.other_id = $id and c.delete_tag = 0")
				  ->page("$page,$count")
				  ->order('time desc')
				  ->select();
				  // dump($M->getLastSql());
		$Date = new \Org\Util\Date();
		for ($i=0; $i < count($List); $i++) { 
			$List[$i]['time'] = $Date ->timeDiff($List[$i]['time']);/*发布时间人性化转换*/
			// '/u/'为映射的用户个人中心url
			$List[$i]['sender_url'] = U('/u/',array('id'=>$List[$i]['sender_id']));
			$List[$i]['receiver_url'] = U('/u/',array('id'=>$List[$i]['receiver_id']));
		}

		return $List;
	}
}