<?php
/**
 * Created by PhpStorm.
 * User: stu
 * Date: 2016/5/23
 * Time: 下午 01:09
 */

namespace daan_info_web\Presenters;

use daan_info_web\Repositories\userRepositories;
use daan_info_web\Repositories\topictypeRepositories;
use daan_info_web\Repositories\topicpicRepositories;

class topicPresenters {

    protected $userRepositories;
    protected $topictypeRepositories;
    protected $topictpicRepositories;

    public function __construct(userRepositories $userRepositories ,
                              topictypeRepositories $topictypeRepositories ,
                              topicpicRepositories $topicpicRepositories)
    {
        $this->userRepositories = $userRepositories;
        $this->topictypeRepositories = $topictypeRepositories;
        $this->topicpicRepositories = $topicpicRepositories;
    }

    public function getTeacher($acc)
    {
        return $this->userRepositories
                   ->getTeacher($acc);
    }

    public function getTopictype($id)
    {
        return $this->topictypeRepositories
                   ->getTopictype($id);
    }

    public function keyword($keyword,$cellphone)
    {
        $topickeyword = explode("、",$keyword);
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

    public function getContent($content)
    {
        $topicContent = explode("#split#",$content);
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
                        <div class="panel-body">'.$topicContent[1].'
                        </div>
                    </div>';
        return $result;
    }

    public function updateContent($content)
    {
        $topicContent = explode("#split#",$content);
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
                            <textarea name="editor1">'.$topicContent[1].'</textarea>
                        </div>
                    </div>';
        return $result;
    }

    public function getStudentName($groupno)
    {
        $Student = $this->userRepositories
                        ->getStudent($groupno);

        $result = "";
        foreach($Student as $student)
        {
            $result .= $student->name.'、';
        }
        $result = mb_substr($result,0,-1);
        return $result;
    }

    public function getVideo($Video)
    {
        $topicVideo = explode("|",$Video);

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

    public function getPic($groupno,$type)
    {
        $Pic = $this->topicpicRepositories
                    ->getPic($groupno);

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

        $topcipic = explode("|",$picpos);

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

    public function selectTopictype($topictype)
    {

        $Object = $this->topictypeRepositories
                       ->all();


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


} 