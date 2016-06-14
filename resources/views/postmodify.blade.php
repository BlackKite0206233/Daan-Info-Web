@extends('layouts.layout')
@section('content')
    <div class="container">
    @inject('topicPresenters','daan_info_web\Presenters\topicPresenters')
        <div role="tabpanel">

            <ul class="nav nav-tabs" role="tablist" id="myTab">
                <li role="presentation" class="active"><a href="#bro" aria-controls="bro" role="tab" data-toggle="tab">預覽</a></li>
                <li role="presentation"><a href="#modify1" aria-controls="modify1" role="tab" data-toggle="tab">編輯專題資訊</a></li>
                <li role="presentation"><a href="#modify2" aria-controls="modify2" role="tab" data-toggle="tab">編輯專題內容</a></li>
                <li role="presentation"><a href="#modify3" aria-controls="modify3" role="tab" data-toggle="tab">上傳資料</a></li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="bro">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="margin:5px;">專題簡介</h4></div>
                        <table class="table rows table-hover hidden-xs" style="text-align:center;">
                            <tr>
                                <td rowspan="8" width="50%"><img class="img-responsive" src="{{asset('upload/'.substr($topic->groupno,1,3).'/'.$topic->groupno.'/'.$topic->pic)}}"></td>
                                {!! $topicPresenters->outputTopic($topic,0) !!}

                            </tr>
                        </table>

                        <table class="table table-hover visible-xs-block" style="text-align:center;">
                            <tr>
                                <td colspan="2"><img class="img-responsive" src="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data1.png"></td>
                            </tr>
                            <tr>
                                {!! $topicPresenters->outputTopic($topic,1) !!}
                            </tr>
                        </table>
                    </div>
                    {!! $topicPresenters->getContent($topic->topiccontent) !!}

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="margin:5px;">組員照片</h4></div>
                        <div class="panel-body rows">
                            {!! $topicPresenters->getPic($topic->groupno,'memberpic') !!}
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="margin:5px;">系統架構圖</h4></div>
                        <div class="panel-body rows">
                            {!! $topicPresenters->getPic($topic->groupno,'structurepic') !!}
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="margin:5px;">成品照片</h4></div>
                        <div class="panel-body rows">
                            {!! $topicPresenters->getPic($topic->groupno,'productpic') !!}
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="margin:5px;">成品影片</h4></div>
                        <div class="panel-body rows">
                            {!! $topicPresenters->getVideo($topic->video) !!}
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="modify1">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="margin:5px;">編輯專題資訊</h4></div>
                        <form method="post" enctype="multipart/form-data" action="/topic/{{$topic->groupno}}/info">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <table class="table rows table-hover hidden-xs" style="text-align:center;">
                                <tr>
                                    <td rowspan="7" width="50%"><img class="img-responsive blah">
                                        <input type="file" name="pic" onchange="readURL(this);" />
                                    </td>
                                    <td>組別編號</td>
                                    <td>{{$topic->groupno}}</td>
                                </tr>
                                <tr>
                                    <td>報告序號</td>
                                    <td>{{$topic->postnum}}</td>
                                </tr>
                                <tr>
                                    <td>專題名稱</td>
                                    <td>
                                        <input type="text" class="form-control" name="topicname"  value="{{$topic->topictitle}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>專題類別</td>
                                    <td>
                                        <select name="topictype" class="form-control">
                                            {!!$topicPresenters->selectTopictype($topic->topictype)!!}

                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <td>關鍵字
                                        <br>(用、分割)</td>
                                    <td>
                                        <input type="text" name="topickeyword" class="form-control" value="{{$topic->topickeyword}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>組員名單</td>
                                    <td>{{$topicPresenters->getStudentName($topic->groupno)}}</td>
                                </tr>
                                <tr>
                                    <td>指導老師</td>
                                    <td>
                                        {{$topicPresenters->getTeacher($topic->teacher)}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <center>
                                            <button type="submit" class="btn btn-primary btn-lg">送出修改</button>
                                        </center>
                                    </td>
                                </tr>
                            </table>
                        </form>

                        <form method="post"  enctype="multipart/form-data" action="/topic/{{$topic->groupno}}/info">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <table class="table table-hover visible-xs-block" style="text-align:center;">
                                <tr>
                                    <td colspan="2"><img class="img-responsive blah">
                                        <input type="file"  name="pic"  onchange="readURL(this);" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>組別編號</td>
                                    <td>{{$topic->groupno}}</td>
                                </tr>
                                <tr>
                                    <td>報告序號</td>
                                    <td>{{$topic->postnum}}</td>
                                </tr>
                                <tr>
                                    <td>專題名稱</td>
                                    <td>
                                        <input type="text" class="form-control" name="topicname" value="{{$topic->topictitle}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>專題類別</td>
                                    <td>
                                        <select name="topictype" class="form-control">
                                            {!!$topicPresenters->selectTopictype($topic->topictype)!!}

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>關鍵字
                                        <br>(用、分割)</td>
                                    <td>
                                        <input type="text" name="topickeyword" class="form-control" value="{{$topic->topickeyword}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>組員名單</td>
                                    <td>{{$topicPresenters->getStudentName($topic->groupno)}}</td>
                                </tr>
                                <tr>
                                    <td>指導老師</td>
                                    <td>
                                        <td>
                                            {{$topicPresenters->getTeacher($topic->teacher)}}
                                        </td>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <center>
                                            <button type="submit" class="btn btn-primary btn-lg">送出修改</button>
                                        </center>
                                    </td>
                                </tr>
                            </table>
                        </form>

                    </div>

                    <script type="text/javascript">
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('.blah').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                </div>
                <div role="tabpanel" class="tab-pane" id="modify2">
                    <form method="post" enctype="multipart/form-data" class="form-horizontal" action="/topic/{{$topic->groupno}}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        {!! $topicPresenters->updateContent($topic->topiccontent) !!}

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 style="margin:5px;">組員照片</h4>
                                <h5 style="margin:5px;">注意:如無任何改動，請不要更動此處；若修改請注意將會把舊的取代而不是增加。</h5></div>
                            <div class="panel-body rows">
                                <div class="form-group">
                                    <input id="file-1" class="file" name="memPic" type="file" multiple data-preview-file-type="any" data-upload-url="#" data-allowed-file-extensions='["jpg", "png","gif"]' data-min-file-count="1">
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 style="margin:5px;">系統架構圖</h4>
                                <h5 style="margin:5px;">注意:如無任何改動，請不要更動此處；若修改請注意將會把舊的取代而不是增加。</h5></div>
                            <div class="panel-body rows">
                                <div class="form-group">
                                    <input id="file-5" class="file" name="strPic" type="file" multiple data-preview-file-type="any" data-upload-url="#" data-allowed-file-extensions='["jpg", "png","gif"]' data-min-file-count="1">
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 style="margin:5px;">成品照片</h4>
                                <h5 style="margin:5px;">注意:如無任何改動，請不要更動此處；若修改請注意將會把舊的取代而不是增加。</h5></div>
                            <div class="panel-body rows">
                                <div class="form-group">
                                    <input id="file-3" class="file" name="proPic" type="file" multiple data-preview-file-type="any" data-upload-url="#" data-allowed-file-extensions='["jpg", "png","gif"]' data-min-file-count="2">
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 style="margin:5px;">成品影片</h4></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3">影片YOUTUBE ID：</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="video" class="form-control" value="{{$topic->video}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div id="LightGray">
                                        YOUTUBE ID：
                                        <br> 以下例子中，紅色部分就是ＩＤ。
                                        <br> 例：https://www.youtube.com/watch?v=
                                        <span style="color:#F00;">AqajUg85Ax4 </span>
                                        <br> 　　http://youtu.be/
                                        <span style="color:#F00;">AqajUg85Ax4 </span>
                                        <br>
                                        <br> 如果有一個以上的影片，利用" | "做為分隔符號(雙引號內的字符包含空格，打不出來可以用複製的)。
                                        <br> 例：
                                        <span style="color:#F00;">AqajUg85Ax4 | FcRJGHkpm8s</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary btn-lg">送出修改</button>
                        </center>
                    </form>


                    <script>
                        tinymce.init({                                                                                 //文字編輯器
                            selector: 'textarea',
                            language: 'zh_TW',
                            plugins: [
                                      'advlist autolink link lists charmap print preview hr anchor',
                                      'searchreplace visualblocks visualchars fullscreen insertdatetime nonbreaking',
                                      'save table directionality emoticons template paste textcolor autoresize'
                                    ]
                        });
                    </script>
                </div>
                <div role="tabpanel" class="tab-pane" id="modify3">
                    <form method="post" enctype="multipart/form-data" action="{{$topic->groupno}}/upload">
                        {{ csrf_field() }}
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 style="margin:5px;">上傳資料</h4></div>
                            <table class="table table-hover">
                                <tr>
                                    <td width="300px">上傳簡報檔(*.ppt 或 *.pptx 或 *.pps 或 *.ppsx)</td>
                                    <td>
                                        <input id="file-0a" class="file" name="ppt" type="file" data-allowed-file-extensions='["ppt", "pptx","pps","ppsx"]'>
                                    </td>
                                </tr>
                                <tr>
                                    <td>上傳pdf檔(*.pdf)</td>
                                    <td>
                                        <input id="file-1a" class="file" name="pdf" type="file" data-allowed-file-extensions='["pdf"]'>
                                    </td>
                                </tr>
                                <tr>
                                    <td>上傳成品(*.zip/*.rar/*.7z/*.exe/*.apk)
                                        <br><span style="color:#FF0000">※檔案超過上限者，請帶著檔案洽詢主任</span><span style="color:#FF0000">執行檔請用
                <a href="makesfx.exe">makesfx封裝</a></span>
                                    </td>
                                    <td>
                                        <input id="file-2a" class="file" name="data" type="file" data-allowed-file-extensions='["zip","rar","7z","exe","apk"]'>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <center>
                                            <button type="submit" class="btn btn-primary btn-lg">送出修改</button>
                                        </center>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>

            </div>

            <script>
                $('#myTab a').click(function (e) {
                    e.preventDefault();
                    $(this).tab('show');
                })
            </script>
        </div>
    </div>

@endsection