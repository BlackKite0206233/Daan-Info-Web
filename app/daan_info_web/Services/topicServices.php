<?php
//處理專題內容的商業邏輯
namespace daan_info_web\Services;

use daan_info_web\Services\uploadFactoryFunction\Upload;
use Validator;
use Response;
use Illuminate\Http\Request;

use daan_info_web\Repositories\topicRepositories;

class topicServices
{
    protected $topicRepositories;

    public function __construct(topicRepositories $topicRepositories)
    {
        $this->topicRepositories = $topicRepositories;
    }



} 