<?php
namespace Home\Controller;
use Think\Controller;

class SearchController extends Controller {


	public function all(){
		$key = trim(I('get.key'));
        if($key!=''){
            $Model = M('');
            $p = I('get.p',1);
            $scenic_count = $show_count = 20;//每页显示页数
            $scenicList = D('Scenic')->search($key,$p,$scenic_count);


            $infomation_query = D('Infomation')->search($key,true,'',$infomation_count);
            $travel_note_query = D('TravelNote')->search($key,true,'',$travel_note_count);
            $topic_query = D('Topic')->search($key,true,'',$topic_count);
            $equipment_query = D('Equipment')->search($key,true,'',$equipment_count);



            $scenic_first_row = ($p-1)*$show_count;//景点查询的第一条
            if($scenic_first_row+$show_count>$scenic_count){
                if($scenic_count>$scenic_first_row&&$scenic_first_row+$show_count>$scenic_count){//如果有景点页有其他
                    $other_first_row  = 0;
                    $other_first_count = $scenic_first_row+$show_count-$scenic_count;
                    
                }else{//如果没有景点
                    $other_page = (int)($scenic_count/$show_count)+1;
                    $other_first_row  = (int)($p-$other_page-1)*$show_count+($show_count-$scenic_count%$show_count);//计算其他搜索第一行
                    $other_first_count = $show_count;
                }
                $searchList = $Model->table("(($infomation_query) union ($travel_note_query) union ($topic_query) union ($equipment_query)) e")
                                ->order('time desc')
                                ->limit("$other_first_row,$other_first_count")
                                ->select();
            }else{//如果只有景点
                
            }
            
            


            $count = $Model->table("(($infomation_query) union ($travel_note_query) union ($topic_query) union ($equipment_query)) e")->count();
            $all_count = $count + $scenic_count;
            $Page       = new \Think\Page($all_count,$show_count);// 实例化分页类 传入总记录数和每页显示的记录数
            $show       = $Page->show();// 分页显示输出
           
            for ($i=0; $i < count($scenicList); $i++) {
                $scenicList[$i]['name'] = str_replace($key, "<span style='color:#f26622'>".$key."</span>", $scenicList[$i]['name']);//关键字高亮
                $scenicList[$i]['desciption'] = str_sub($scenicList[$i]['desciption'],200);
            }
            for ($i=0; $i < count($searchList); $i++) {
                $searchList[$i]['title'] = str_replace($key, "<span style='color:#f26622'>".$key."</span>", $searchList[$i]['title']);//关键字高亮
                $searchList[$i]['content'] = str_sub($searchList[$i]['content'],100);
            }
            $this->assign('all_count',$scenic_count+$infomation_count+$travel_note_count+$topic_count+$equipment_count);
            $this->assign('count',$all_count);
            $this->assign('scenic_count',$scenic_count);
            $this->assign('infomation_count',$infomation_count);
            $this->assign('travel_note_count',$travel_note_count);
            $this->assign('topic_count',$topic_count);
            $this->assign('equipment_count',$equipment_count);
            $this->assign('scenicList',$scenicList);
            $this->assign('page',$show);
            $this->assign('key',$key);
            $this->assign('searchList',$searchList);
            $this->display('Index:search');
        }else{
            $this->error('请输入搜索关键字');
        }
	}


	public function scenic(){
		$key = trim(I('get.key'));
        if($key!=''){
            $Model = M('');
            $p = I('get.p',1);
            $scenicList = D('Scenic')->search($key,$p,$scenic_count);
            $infomation_query = D('Infomation')->search($key,true,'',$infomation_count);
            $travel_note_query = D('TravelNote')->search($key,true,'',$travel_note_count);
            $topic_query = D('Topic')->search($key,true,'',$topic_count);
            $equipment_query = D('Equipment')->search($key,true,'',$equipment_count);


            $scenic_count = $show_count = 20;//每页显示页数
            $scenicList = D('Scenic')->search($key,$p,$scenic_count);

            $all_count  =  $scenic_count;
            $Page       = new \Think\Page($all_count,$show_count);// 实例化分页类 传入总记录数和每页显示的记录数
            $show       = $Page->show();// 分页显示输出
           
            for ($i=0; $i < count($scenicList); $i++) {
                $scenicList[$i]['name'] = str_replace($key, "<span style='color:#f26622'>".$key."</span>", $scenicList[$i]['name']);//关键字高亮
                $scenicList[$i]['desciption'] = str_sub($scenicList[$i]['desciption'],200);
            }

            $this->assign('all_count',$scenic_count+$infomation_count+$travel_note_count+$topic_count+$equipment_count);
            $this->assign('count',$all_count);
            $this->assign('scenic_count',$scenic_count);
            $this->assign('infomation_count',$infomation_count);
            $this->assign('travel_note_count',$travel_note_count);
            $this->assign('topic_count',$topic_count);
            $this->assign('equipment_count',$equipment_count);
            $this->assign('scenicList',$scenicList);
            $this->assign('page',$show);
            $this->assign('key',$key);
            $this->display('Index:search');
        }else{
            $this->error('请输入搜索关键字');
        }
	}



    public function infomation(){
        $key = trim(I('get.key'));
        $Model = M('');
        $p = I('get.p',1);
        $scenic_count = $show_count = 20;
        $scenicList = D('Scenic')->search($key,'',$scenic_count);
        $travel_note_query = D('TravelNote')->search($key,true,'',$travel_note_count);
        $topic_query = D('Topic')->search($key,true,'',$topic_count);
        $equipment_query = D('Equipment')->search($key,true,'',$equipment_count);
        $searchList = D('Infomation')->search($key,false,$p,$infomation_count);


        $all_count = $infomation_count;
        $Page       = new \Think\Page($all_count,$show_count);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
       

        for ($i=0; $i < count($searchList); $i++) {
            $searchList[$i]['title'] = str_replace($key, "<span style='color:#f26622'>".$key."</span>", $searchList[$i]['title']);//关键字高亮
            $searchList[$i]['content'] = str_sub($searchList[$i]['content'],100);
        }
        $this->assign('all_count',$scenic_count+$infomation_count+$travel_note_count+$topic_count+$equipment_count);
        $this->assign('scenic_count',$scenic_count);
        $this->assign('infomation_count',$infomation_count);
        $this->assign('travel_note_count',$travel_note_count);
        $this->assign('topic_count',$topic_count);
        $this->assign('equipment_count',$equipment_count);
        $this->assign('count',$all_count);
        $this->assign('page',$show);
        $this->assign('key',$key);
        $this->assign('searchList',$searchList);
        $this->display('Index:search');
    }


    public function travel_note(){
        $key = trim(I('get.key'));
        $Model = M('');
        $p = I('get.p',1);
        $travel_note_count = $show_count = 20;
        $scenicList = D('Scenic')->search($key,'',$scenic_count);
        $searchList = D('TravelNote')->search($key,false,$p,$travel_note_count);
        $topic_query = D('Topic')->search($key,true,'',$topic_count);
        $equipment_query = D('Equipment')->search($key,true,'',$equipment_count);
        $infomation_query = D('Infomation')->search($key,true,' ',$infomation_count);


        $all_count = $travel_note_count;
        $Page       = new \Think\Page($all_count,$show_count);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
       

        for ($i=0; $i < count($searchList); $i++) {
            $searchList[$i]['title'] = str_replace($key, "<span style='color:#f26622'>".$key."</span>", $searchList[$i]['title']);//关键字高亮
            $searchList[$i]['content'] = str_sub($searchList[$i]['content'],100);
        }
        $this->assign('all_count',$scenic_count+$infomation_count+$travel_note_count+$topic_count+$equipment_count);
        $this->assign('scenic_count',$scenic_count);
        $this->assign('infomation_count',$infomation_count);
        $this->assign('travel_note_count',$travel_note_count);
        $this->assign('topic_count',$topic_count);
        $this->assign('equipment_count',$equipment_count);
        $this->assign('count',$all_count);
        $this->assign('page',$show);
        $this->assign('key',$key);
        $this->assign('searchList',$searchList);
        $this->display('Index:search');
    }

    public function topic(){
        $key = trim(I('get.key'));
        $Model = M('');
        $p = I('get.p',1);
        $topic_count = $show_count = 20;
        $scenicList = D('Scenic')->search($key,'',$scenic_count);
        $travel_note_query = D('TravelNote')->search($key,true,'',$travel_note_count);
        $searchList = D('Topic')->search($key,false,$p,$topic_count);
        $equipment_query = D('Equipment')->search($key,true,'',$equipment_count);
        $infomation_query = D('Infomation')->search($key,true,' ',$infomation_count);


        $all_count = $topic_count;
        $Page       = new \Think\Page($all_count,$show_count);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
       

        for ($i=0; $i < count($searchList); $i++) {
            $searchList[$i]['title'] = str_replace($key, "<span style='color:#f26622'>".$key."</span>", $searchList[$i]['title']);//关键字高亮
            $searchList[$i]['content'] = str_sub($searchList[$i]['content'],100);
        }
        $this->assign('all_count',$scenic_count+$infomation_count+$travel_note_count+$topic_count+$equipment_count);
        $this->assign('scenic_count',$scenic_count);
        $this->assign('infomation_count',$infomation_count);
        $this->assign('travel_note_count',$travel_note_count);
        $this->assign('topic_count',$topic_count);
        $this->assign('equipment_count',$equipment_count);
        $this->assign('count',$all_count);
        $this->assign('page',$show);
        $this->assign('key',$key);
        $this->assign('searchList',$searchList);
        $this->display('Index:search');
    }


    public function equipment(){
        $key = trim(I('get.key'));
        $Model = M('');
        $p = I('get.p',1);
        $equipment_count = $show_count = 20;
        $scenicList = D('Scenic')->search($key,'',$scenic_count);
        $travel_note_query = D('TravelNote')->search($key,true,'',$travel_note_count);
        $topic_query = D('Topic')->search($key,true,'',$topic_count);
        $searchList = D('Equipment')->search($key,false,$p,$equipment_count);
        $infomation_query = D('Infomation')->search($key,true,' ',$infomation_count);


        $all_count = $equipment_count;
        $Page       = new \Think\Page($all_count,$show_count);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
       

        for ($i=0; $i < count($searchList); $i++) {
            $searchList[$i]['title'] = str_replace($key, "<span style='color:#f26622'>".$key."</span>", $searchList[$i]['title']);//关键字高亮
            $searchList[$i]['content'] = str_sub($searchList[$i]['content'],100);
        }
        $this->assign('all_count',$scenic_count+$infomation_count+$travel_note_count+$topic_count+$equipment_count);
        $this->assign('scenic_count',$scenic_count);
        $this->assign('infomation_count',$infomation_count);
        $this->assign('travel_note_count',$travel_note_count);
        $this->assign('topic_count',$topic_count);
        $this->assign('equipment_count',$equipment_count);
        $this->assign('count',$all_count);
        $this->assign('page',$show);
        $this->assign('key',$key);
        $this->assign('searchList',$searchList);
        $this->display('Index:search');
    }




}