<?php
//處理專題內容的顯示邏輯
namespace daan_info_web\Presenters;

use daan_info_web\Repositories\userRepositories;
use daan_info_web\Repositories\topictypeRepositories;
use daan_info_web\Repositories\topicpicRepositories;
use daan_info_web\Repositories\teacherlistRepositories;

class topicPresenters {

    protected $userRepositories;
    protected $topictypeRepositories;
    protected $topictpicRepositories;
    protected $teacherlistRepositories;

    public function __construct(userRepositories $userRepositories ,
                              topictypeRepositories $topictypeRepositories ,
                              topicpicRepositories $topicpicRepositories ,
                              teacherlistRepositories $teacherlistRepositories)
    {
        $this->userRepositories = $userRepositories;
        $this->topictypeRepositories = $topictypeRepositories;
        $this->topicpicRepositories = $topicpicRepositories;
        $this->teacherlistRepositories = $teacherlistRepositories;
    }

    //依帳號回傳老師資料
    public function getTeacher($acc)
    {
        return $this->userRepositories
                   ->getTeacher($acc);
    }

    //依編號回傳專題類別
    public function getTopictype($id)
    {
        return $this->topictypeRepositories
                   ->getTopictype($id);
    }

    //回傳關鍵字
    public function keyword($keyword,$cellphone)
    {
        //關鍵字用 "、" 分開
        $topickeyword = explode("、",$keyword);

        //加上HTML標籤
        $result = "";
        for($i = 0;$i < count($topickeyword);$i++)
        {
            if($i != count($topickeyword)-1 && $cellphone == 0)
                $result .= '<span class="label label-info">'.$topickeyword[$i].'</span>、';
            else
                $result .= '<span class="label label-info">'.$topickeyword[$i].'</span> ';
        }
        return $result;
    }

    //回傳專題內容
    public function getContent($content)
    {
        //內容用 "#split#" 分開
        $topicContent = explode("#split#",$content);

        //加上HTML標籤
        $result = '<div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="margin:5px;">專題動機</h4></div>
                        <div class="panel-body">
                            <p>'.$topicContent[0].'</p>
                            </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="margin:5px;">遇到的問題與解決辦法</h4></div>
                        <div class="panel-body">'.$topicContent[1].'</div>
                    </div>';
        return $result;
    }

    //回傳專題內容(加上文字編輯器)
    public function updateContent($content)
    {
        //內容用 "#split#" 分開
        $topicContent = explode("#split#",$content);

        //加上HTML標籤
        $result = '<div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="margin:5px;">專題動機</h4></div>
                        <div class="panel-body">
                            <textarea name="editor1">
                                <p>'.$topicContent[0].'</p>
                            </textarea>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="margin:5px;">遇到的問題與解決辦法</h4></div>
                        <div class="panel-body">
                            <textarea name="editor2">'.$topicContent[1].'</textarea>
                        </div>
                    </div>';
        return $result;
    }

    //依組別編號回傳學生姓名
    public function getStudentName($groupno)
    {
        //依組別編號取得學生
        $Student = $this->userRepositories
                        ->getStudent($groupno);

        //每個學生中間用 "、" 隔開
        $result = "";
        foreach($Student as $student)
        {
            $result .= $student->name.'、';
        }
        $result = mb_substr($result,0,-1);
        return $result;
    }

    //回傳影片
    public function getVideo($Video)
    {
        //影片用 "|" 分開
        $topicVideo = explode("|",$Video);

        //加上HTML標籤
        $result = "";
        foreach($topicVideo as $video)
        {
            $result .= '<div class="col-md-6 col-sm-6" style="padding:5px;">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$video.'" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                </div>';
        }
        return $result;
    }

    //回傳照片
    public function getPic($groupno,$type)
    {
        //依組別編號取得照片
        $Pic = $this->topicpicRepositories
                    ->getPic($groupno);

        //選擇取得合種照片(組員照片、系統架構圖、產品照片)
        $picpos = "";
        switch($type)
        {
            case 'memberpic':
                $picpos = $Pic->memberpic;
                break;
            case 'structurepic':
                $picpos = $Pic->structurepic;
                break;
            case 'productpic':
                $picpos = $Pic->productpic;
                break;
        }

        //每張照片用 "|" 分開
        $topcipic = explode("|",$picpos);

        //加上HTML標籤
        $result = "";
        foreach($topcipic as $pic)
        {

            $result .= '<div class="col-md-4 col-sm-6" style="padding:5px;">
                    <a href="'.asset($pic).'" rel="lightbox">
                        <img class="img-responsive img-thumbnail" src="'.asset($pic).'"></a>
                </div>';
        }
        return $result;
    }

    //回傳編排過後的專題資訊
    public function outputTopic($topic,$cellphone)
    {
        $result = '<td>組別編號</td>
                   <td>'.$topic->groupno.'</td>
                </tr>
                <tr>
                    <td>專題名稱</td>
                    <td>'.$topic->topictitle.'</td>
                </tr>
                <tr>
                    <td>專題類別</td>
                    <td>'.$this->getTopictype($topic->topictype).'</td>
                </tr>
                <tr>
                    <td>關鍵字</td>
                    <td>'.$this->keyword($topic->topickeyword,$cellphone).'</td>
                </tr>
                <tr>
                    <td>組員名單</td>
                    <td>'.$this->getStudentName($topic->groupno).'</td>
                </tr>
                <tr>
                    <td>指導老師</td>
                    <td>'.$this->getTeacher($topic->teacher).'</td>
                </tr>
                <tr>
                    <td colspan="2">下載</td>
                </tr>
                <tr>
                    <td colspan="2">

                        <div class="rows">
                            <div class="col-md-4 col-xs-4">
                                <a href="'.asset($topic->pdf).'">
                                    <img class="img-responsive" src="'.asset('img/word.png').'">
                                    <p>報告下載</p>
                                </a>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <a href="'.asset($topic->ppt).'">
                                    <img class="img-responsive" src="'.asset('img/powerpoint.png').'">
                                    <p>簡報下載</p>
                                </a>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <a href="'.asset($topic->data).'">
                                    <img class="img-responsive" src="'.asset('img/word.png').'">
                                    <p>檔案下載</p>
                                </a>
                            </div>
                        </div>

                    </td>';
        return $result;
    }

    //專題類別選擇欄位
    public function selectTopictype($topictype)
    {
        //取得所有專題類別
        $Object = $this->topictypeRepositories
                       ->all();

        //加上HTML標籤
        $result = "";
        foreach($Object as $object)
        {
            if($topictype == $object->idno)
                $result.= '<option selected="selected" value= "'.$object->idno.'">'.$object->typename.'</option>';
            else
                $result.= '<option value="'.$object->idno.'">'.$object->typename.'</option>';
        }
        return $result;
    }

    //老師選擇欄位
    public function selectTeacher($teacher)
    {
        //取得所有老師
        $Object = $this->teacherlistRepositories
                       ->getTeacher();

        //加上HTML標籤
        $result = "";
        foreach($Object as $object)
        {
            if($teacher == $object->acc)
                $result.= '<option selected="selected" value= "'.$object->acc.'">'.$object->name.'</option>';
            else
                $result.= '<option value="'.$object->acc.'">'.$object->name.'</option>';
        }
        return $result;
    }


} 