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
                                <td rowspan="8" width="50%"><img class="img-responsive" src="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data1.png"></td>
                                <td>組別編號</td>
                                <td>{{ $topic->groupno }}</td>
                            </tr>
                            <tr>
                                <td>專題名稱</td>
                                <td>{{ $topic->topictitle }}</td>
                            </tr>
                            <tr>
                                <td>專題類別</td>
                                <td>{{ $topicPresenters->getTopictype($topic->topictype) }}</td>
                            </tr>
                            <tr>
                                <td>關鍵字</td>
                                <td>{!! $topicPresenters->keyword($topic->topickeyword) !!}</td>
                            </tr>
                            <tr>
                                <td>組員名單</td>
                                <td>洪偉宸、連永立、陳典佑、陳俊廷</td>
                            </tr>
                            <tr>
                                <td>指導老師</td>
                                <td>{{$topicPresenters->getTeacher($topic->teacher)}}</td>
                            </tr>
                            <tr>
                                <td colspan="2">下載</td>
                            </tr>
                            <tr>
                                <td colspan="2">

                                    <div class="rows">
                                        <div class="col-md-4 col-xs-4">
                                            <a href="#">
                                                <img class="img-responsive" src="{{asset('img/word.png')}}">
                                                <p>報告下載</p>
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-xs-4">
                                            <a href="#">
                                                <img class="img-responsive" src="{{asset('img/powerpoint.png')}}">
                                                <p>簡報下載</p>
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-xs-4">
                                            <a href="#">
                                                <img class="img-responsive" src="{{asset('img/file.png')}}">
                                                <p>檔案下載</p>
                                            </a>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        </table>

                        <table class="table table-hover visible-xs-block" style="text-align:center;">
                            <tr>
                                <td colspan="2"><img class="img-responsive" src="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data1.png"></td>
                            </tr>
                            <tr>
                                <td>組別編號</td>
                                <td>{{ $topic->groupno }}</td>
                            </tr>
                            <tr>
                                <td>專題名稱</td>
                                <td>{{ $topic->topictype }}</td>
                            </tr>
                            <tr>
                                <td>專題類別</td>
                                <td>{{ $topic->topictype }}</td>
                            </tr>
                            <tr>
                                <td>關鍵字</td>
                                <td>{!! $topic->topickeyword !!}</td>
                            </tr>
                            <tr>
                                <td>組員名單</td>
                                <td>洪偉宸、連永立、陳典佑、陳俊廷</td>
                            </tr>
                            <tr>
                                <td>指導老師</td>
                                <td>{{$topicPresenters->getTeacher($topic->teacher)}}</td>
                            </tr>
                            <tr>
                                <td colspan="2">下載</td>
                            </tr>
                            <tr>
                                <td colspan="2">

                                    <div class="rows">
                                        <div class="col-md-4 col-xs-4">
                                            <a href="#">
                                                <img class="img-responsive" src="{{asset('img/word.png')}}">
                                                <p>報告下載</p>
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-xs-4">
                                            <a href="#">
                                                <img class="img-responsive" src="{{asset('img/powerpoint.png')}}">
                                                <p>簡報下載</p>
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-xs-4">
                                            <a href="#">
                                                <img class="img-responsive" src="{{asset('img/file.png')}}">
                                                <p>檔案下載</p>
                                            </a>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        </table>
                    </div>
                    {!! $topic->topiccontent !!}

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="margin:5px;">組員照片</h4></div>
                        <div class="panel-body rows">
                            <div class="col-md-4 col-sm-6" style="padding:5px;">
                                <a href="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data4.png" rel="lightbox">
                                    <img class="img-responsive img-thumbnail" src="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data4.png"></a>
                            </div>
                            <div class="col-md-4 col-sm-6" style="padding:5px;">
                                <a href="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data4.png" rel="lightbox">
                                    <img class="img-responsive img-thumbnail" src="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data4.png"></a>
                            </div>
                            <div class="col-md-4 col-sm-6" style="padding:5px;">
                                <a href="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data4.png" rel="lightbox">
                                    <img class="img-responsive img-thumbnail" src="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data4.png"></a>
                            </div>
                            <div class="col-md-4 col-sm-6" style="padding:5px;">
                                <a href="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data4.png" rel="lightbox">
                                    <img class="img-responsive img-thumbnail" src="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data4.png"></a>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="margin:5px;">系統架構圖</h4></div>
                        <div class="panel-body rows">
                            <div class="col-md-4 col-sm-6" style="padding:5px;">
                                <a href="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data5.png" rel="lightbox">
                                    <img class="img-responsive img-thumbnail" src="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data5.png"></a>
                            </div>
                            <div class="col-md-4 col-sm-6" style="padding:5px;">
                                <a href="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data5.png" rel="lightbox">
                                    <img class="img-responsive img-thumbnail" src="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data5.png"></a>
                            </div>
                            <div class="col-md-4 col-sm-6" style="padding:5px;">
                                <a href="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data4.png" rel="lightbox">
                                    <img class="img-responsive img-thumbnail" src="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data5.png"></a>
                            </div>
                            <div class="col-md-4 col-sm-6" style="padding:5px;">
                                <a href="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data5.png" rel="lightbox">
                                    <img class="img-responsive img-thumbnail" src="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data5.png"></a>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="margin:5px;">成品照片</h4></div>
                        <div class="panel-body rows">
                            <div class="col-md-4 col-sm-6" style="padding:5px;">
                                <a href="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data6.png" rel="lightbox">
                                    <img class="img-responsive img-thumbnail" src="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data6.png"></a>
                            </div>
                            <div class="col-md-4 col-sm-6" style="padding:5px;">
                                <a href="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data6.png" rel="lightbox">
                                    <img class="img-responsive img-thumbnail" src="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data6.png"></a>
                            </div>
                            <div class="col-md-4 col-sm-6" style="padding:5px;">
                                <a href="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data6.png" rel="lightbox">
                                    <img class="img-responsive img-thumbnail" src="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data6.png"></a>
                            </div>
                            <div class="col-md-4 col-sm-6" style="padding:5px;">
                                <a href="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data6.png" rel="lightbox">
                                    <img class="img-responsive img-thumbnail" src="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data6.png"></a>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="margin:5px;">成品影片</h4></div>
                        <div class="panel-body rows">
                            <div class="col-md-6 col-sm-6" style="padding:5px;">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/thkSiBPVwSM" frameborder="0" allowfullscreen=""></iframe>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6" style="padding:5px;">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/thkSiBPVwSM" frameborder="0" allowfullscreen=""></iframe>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6" style="padding:5px;">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/thkSiBPVwSM" frameborder="0" allowfullscreen=""></iframe>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6" style="padding:5px;">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/thkSiBPVwSM" frameborder="0" allowfullscreen=""></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="modify1">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="margin:5px;">編輯專題資訊</h4></div>
                        <form method="post">
                            <table class="table rows table-hover hidden-xs" style="text-align:center;">
                                <tr>
                                    <td rowspan="7" width="50%"><img class="img-responsive blah">
                                        <input type="file" onchange="readURL(this);" />
                                    </td>
                                    <td>組別編號</td>
                                    <td>G105C04</td>
                                </tr>
                                <tr>
                                    <td>報告序號</td>
                                    <td>7</td>
                                </tr>
                                <tr>
                                    <td>專題名稱</td>
                                    <td>
                                        <input type="text" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>專題類別</td>
                                    <td>
                                        <select name="topictype" class="form-control">
                                            <option value="3">自然環境類</option>
                                            <option selected="selected" value="4">應用實務類</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>關鍵字
                                        <br>(用、分割)</td>
                                    <td>
                                        <input type="text" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>組員名單</td>
                                    <td>洪偉宸、連永立、陳典佑、陳俊廷</td>
                                </tr>
                                <tr>
                                    <td>指導老師</td>
                                    <td>
                                        <select name="teacherno" class="form-control">
                                            <option value="1">楊敏男</option>
                                            <option value="2">王敏男</option>
                                            <option value="3">徐慶堂</option>
                                            <option value="4">黃博原</option>
                                            <option value="5">陳龍昇</option>
                                            <option value="6">沈彥良</option>
                                            <option value="7">侯士東</option>
                                            <option value="8">葉明恭</option>
                                            <option selected="selected" value="9">張佩琪</option>
                                            <option value="10">廖啟良</option>
                                        </select>
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


                        <form method="post">
                            <table class="table table-hover visible-xs-block" style="text-align:center;">
                                <tr>
                                    <td colspan="2"><img class="img-responsive blah">
                                        <input type="file" onchange="readURL(this);" />
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
                                        <input type="text" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>專題類別</td>
                                    <td>
                                        <select name="topictype" class="form-control">
                                            <option value="3">自然環境類</option>
                                            <option selected="selected" value="4">應用實務類</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>關鍵字
                                        <br>(用、分割)</td>
                                    <td>
                                        <input type="text" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>組員名單</td>
                                    <td>洪偉宸、連永立、陳典佑、陳俊廷</td>
                                </tr>
                                <tr>
                                    <td>指導老師</td>
                                    <td>
                                        <select name="teacherno" class="form-control">
                                            <option value="1">楊敏男</option>
                                            <option value="2">王敏男</option>
                                            <option value="3">徐慶堂</option>
                                            <option value="4">黃博原</option>
                                            <option value="5">陳龍昇</option>
                                            <option value="6">沈彥良</option>
                                            <option value="7">侯士東</option>
                                            <option value="8">葉明恭</option>
                                            <option selected="selected" value="9">張佩琪</option>
                                            <option value="10">廖啟良</option>
                                        </select>
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
                    <form method="post" class="form-horizontal">
                        {{$topic->topiccontent}}

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 style="margin:5px;">組員照片</h4>
                                <h5 style="margin:5px;">注意:如無任何改動，請不要更動此處；若修改請注意將會把舊的取代而不是增加。</h5></div>
                            <div class="panel-body rows">
                                <div class="form-group">
                                    <input id="file-1" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="#" data-allowed-file-extensions='["jpg", "png","gif"]' data-min-file-count="1">
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 style="margin:5px;">系統架構圖</h4>
                                <h5 style="margin:5px;">注意:如無任何改動，請不要更動此處；若修改請注意將會把舊的取代而不是增加。</h5></div>
                            <div class="panel-body rows">
                                <div class="form-group">
                                    <input id="file-5" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="#" data-allowed-file-extensions='["jpg", "png","gif"]' data-min-file-count="1">
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 style="margin:5px;">成品照片</h4>
                                <h5 style="margin:5px;">注意:如無任何改動，請不要更動此處；若修改請注意將會把舊的取代而不是增加。</h5></div>
                            <div class="panel-body rows">
                                <div class="form-group">
                                    <input id="file-3" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="#" data-allowed-file-extensions='["jpg", "png","gif"]' data-min-file-count="2">
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
                                        <input type="text" class="form-control">
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
                        tinymce.init({
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
                    <form method="post">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 style="margin:5px;">上傳資料</h4></div>
                            <table class="table table-hover">
                                <tr>
                                    <td width="300px">上傳簡報檔(*.ppt 或 *.pptx 或 *.pps 或 *.ppsx)</td>
                                    <td>
                                        <input id="file-0a" class="file" type="file" data-allowed-file-extensions='["ppt", "pptx","pps","ppsx"]'>
                                    </td>
                                </tr>
                                <tr>
                                    <td>上傳pdf檔(*.pdf)</td>
                                    <td>
                                        <input id="file-1a" class="file" type="file" data-allowed-file-extensions='["pdf"]'>
                                    </td>
                                </tr>
                                <tr>
                                    <td>上傳成品(*.zip/*.rar/*.7z/*.exe/*.apk)
                                        <br><span style="color:#FF0000">※檔案超過上限者，請帶著檔案洽詢主任</span><span style="color:#FF0000">執行檔請用
                <a href="makesfx.exe">makesfx封裝</a></span>
                                    </td>
                                    <td>
                                        <input id="file-2a" class="file" type="file" data-allowed-file-extensions='["zip","rar","7z","exe","apk"]'>
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

                    var url = "";
                    switch(e.href)
                    {
                        case '#bro':
                            url = 'topic/showTopic';
                            break;
                        case '#modify1':
                            url = 'topic/editTopicinfo';
                            break;
                        case '#modify2':
                            url = 'topic/editTopiccontent';
                            break;
                        case '#modify3':
                            url = 'topic/upload';
                            break;
                        default :
                            url = 'topic/showTopic';
                            break;
                    }

                    $.ajax({type:'get',
                            url:url,
                            success:function()
                            {

                            }
                    });

                })
            </script>
        </div>
    </div>

@endsection