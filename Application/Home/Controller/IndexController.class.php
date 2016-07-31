<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {

    /**
     * 主页view
     */
    public function index(){
        $this->display();
    }


    public function imgChange(){
        
        $model = M('Image');
        $List = $model->field('id,image,time,user_id')->where('id BETWEEN 1725 and 1726')->select();
        for ($i=0; $i < count($List); $i++) {
            $bool  = check_url($List[$i]['image']);
            if($bool){
                $filename=uniqid().'.jpg';
                $date = substr($List[$i]['time'], 0,10);

                $result = getImage($List[$i]['image'],'./Data/Scenic/image/'.$List[$i]['user_id'].'/'.$date.'/',$filename);
                if($result['file_name']!=''){
                    $data['image'] = 'Scenic/image/'.$List[$i]['user_id'].'/'.$date.'/'.$result['file_name'];
                    // $re = $model->where('id ='.$List[$i]['id'])->save($data);
                    dump($re);
                }else{
                    dump($result);
                }
            }
        }
    }





    public function comment(){
        $content = array(
                '希望我的回答能帮到你哈，有问题可以追问，觉得好就点个赞，有用就采纳！',
                '还不错吧，但是既然已经没什么印象，大概属于那种不去会心痒痒，但是去了其实也就那样的地方。',
                '这个说说写的好，平淡中显示出不凡的文学功底，可谓是字字珠玑，句句经典，是我辈应当学习之典范。',
                '头一次评论啊，好紧张啊，该怎么说啊，打多少字才显的有文采啊，这样说好不好啊，会不会成热门啊，我写的这么好会不会太招遥，写的这么深奥别人会不会看不懂啊，怎样才能写出飘逸潇洒的水平呢，半小时写了这么多会不会太快啊，好激动啊！',
                '我来了，既然来了我就得说几句！只说几句而已！如果我不说几句！',
                '看完您的说说后,我的心久久不能平静!这条说说构思新颖,题材独具匠心,段落清晰,情节诡异,跌宕起伏,主线分明,引人入胜,平淡中显示出不凡的文学功底,可谓是字字珠玑,句句经典,是我辈应学习之典范.就小说艺术的角度而言,可能不算太成功,但它的实验意义却远大于成功本身',
                '从文学的角度来讲，选材很是新颖，角度清晰可见，语言平实而不失风采，简洁而富有寓意，堪称现代说说之典范！',
                ' 可能是因为去的那天下雨又是晚上，路上没什么人，个人感觉不是很有趣。3月份去的，风好~~~~大~~~~。想要去那边拍照的MM们，一定要照顾好自己的头发，我在那拍的照片，张张惨不忍睹。灯光很暗。明星们的手印和名字都要很仔细看。我是“宫崎骏主题店”--维多利亚港湾---钟楼---星光大道，这样的路线的。都在一条道上，顺带游玩的心情的话，就还好。',
                '英语四六级能过么？生活规划有了么？大学是让你每天发说说么？',
                '你又在这里发说说，工头到处找你，叫你赶紧回工地去，还有20吨水泥要卸，工头说再不回来你那10天300块钱的工钱一分都别想拿到',
                '我觉得没有想象中的好玩，就为了看看明星的手掌印逛了一逛~很干净，无聊了还可以去星巴克坐一坐，或者看看周边有什么活动',
                '对它的期望很大，不过去了3次，感觉都一般，无论是白天，还是夜晚，除了维港的水比较干净，景色还是魔都的赞。',
                '第一次回复，好紧张啊！有没有潜规则？用不用脱啊？该怎么说啊？打多少字才显的有文采啊？',
                'xx啊，你上次托我帮你问的事情我已经问过了，不能勃起可能是因为手淫过频而引起的，手淫过频容易导致前列腺发炎，可能会引起不孕不育，严重者甚至会阳痿早泄，之前私信给你你没回，所以直接回复了。 ',
                '传说中到此一游的景点~ 可以去看看~ 吹吹风看看手掌散漫地走走停停 时常有展览和各种活动 还是不错滴~',
                '夜景很美，大道上有明星的手印，晚上有灯光表演。很多人慕名而来。',
                '周围的氛围不如洛杉矶有感觉，印有手掌和签名的石材颜色太暗，显不出巨星的星光。当时去的时候还有一个维修的挡板挡住了一个明星的手印，感觉政府对这景点也不是很重视。'
        );
        $recommend_level = array(2,4,6,8,10);
        $m = M('ScenicGrade');
        for ($i=1; $i <= 1000; $i++) { 
            $data['scenic_id'] = rand(196,450);
            $data['user_id'] = rand(1,31);
            $data['time'] = date('Y-m-d H:i:s',mktime(rand(1,23),rand(1,59),rand(1,59),rand(2,3),rand(1,29),2016));
            $data['description'] = $content[rand(0,16)];
            $data['recommend_level'] = $recommend_level[rand(0,4)];
            $data['delete_tag'] = (bool)0;
            // dump($m->add($data));
            // dump($m->where('id='.$i)->save($data));
        }
    }
}