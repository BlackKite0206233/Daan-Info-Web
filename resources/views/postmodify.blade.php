@extends('layouts.layout')
@section('content')
    <div class="container">
        <div role="tabpanel">

            <ul class="nav nav-tabs" role="tablist" id="myTab">
                <li role="presentation" class="active"><a href="#bro" aria-controls="bro" role="tab" data-toggle="tab">預覽</a></li>
                <li role="presentation"><a href="#modify1" aria-controls="modify1" role="tab" data-toggle="tab">編輯專題資訊</a></li>
                <li role="presentation"><a href="#modify2" aria-controls="modify2" role="tab" data-toggle="tab">編輯專題內容</a></li>
                <li role="presentation"><a href="#modify3" aria-controls="modify3" role="tab" data-toggle="tab">上傳資料</a></li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="bro">
                @inject('topicPresenters','daan_info_web\Presenters\topicPresenters')
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
                                <td>{{ $topic->topictype }}</td>
                            </tr>
                            <tr>
                                <td>關鍵字</td>
                                <td><span class="label label-info">資訊整合</span>、<span class="label label-info">智慧校園</span>、<span class="label label-info">解決生活問題</span></td>
                            </tr>
                            <tr>
                                <td>組員名單</td>
                                <td>洪偉宸、連永立、陳典佑、陳俊廷</td>
                            </tr>
                            <tr>
                                <td>指導老師</td>
                                <td>張佩琪</td>
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
                                <td>G105C04</td>
                            </tr>
                            <tr>
                                <td>專題名稱</td>
                                <td>木棉手札</td>
                            </tr>
                            <tr>
                                <td>專題類別</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>關鍵字</td>
                                <td><span class="label label-info">資訊整合</span> <span class="label label-info">智慧校園</span> <span class="label label-info">解決生活問題</span></td>
                            </tr>
                            <tr>
                                <td>組員名單</td>
                                <td>洪偉宸、連永立、陳典佑、陳俊廷</td>
                            </tr>
                            <tr>
                                <td>指導老師</td>
                                <td>張佩琪</td>
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
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="margin:5px;">專題動機</h4></div>
                        <div class="panel-body">
                            <p>中華民國各學術機關，大多都有著網頁與時代脫節的問題。如：Flash外掛所產生的資安問題、cookie的加密問題、SSL伺服器憑證過期、舊型的網頁語法（VBscript, JScript）的相容性。而大安高工的「學生獎懲系統」中也有著這類的問題，而在學校臉書的匿名版上經常出現許多對於學校的部分系統一定要用IE登入而抗議。
                                <br>
                                <br> 這原因其實是學校的「學生獎懲系統」中將登入按鈕的型態宣告引入至VBscript，以檢查帳號密碼是否為空值，但其實只要將網頁中的登入按紐的type=”button”改成type=”submit”就可在非IE類的瀏覽器登入網頁。VBscript是微軟在1996年所上市的網頁語言，然而這類程式語言早已被大時代所淘汰，微軟在IE9以後預設已不再支援VBscript。(相容性檢視可支援)
                                <br>
                                <br> 況且大多學校網站為因應各單位的需求，而會不斷的增加公告分類，即使添加了表格來區隔，但最終還是會使得網頁排版變得太過會亂；後來意識到這問題後，又將每個公告資料加以分類，但按照各單位的分法，分類後的公告反而顯得太過繁瑣。即使網頁有再好的內容但版面排列不夠人性化，都使的使用者不願使用。
                                <br>
                                <br> 而近年來，因智慧型手機的崛起，人們越來越少使用電腦，大部分網頁都會製作適合手機觀看的網站或開發成手機應用程式。我們為了要解決系統查詢之不便與達成智慧校園的理想，而開發了這款APP。 </p>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="margin:5px;">遇到的問題與解決辦法</h4></div>
                        <div class="panel-body">
                            （一）、問題：沒有任何人有Android相關開發經驗？
                            <br>
                            <br> 1. 原因：在時間緊迫下，我們必須有做完的把握。
                            <br>
                            <br> 2. 解決辦法：盡可能使用組員熟悉網頁前後端技術，盡可能結合伺服器後端，來解決Android開發的不熟悉，就算最後App做不出來，也可以改走手機網頁結合webview以及網頁開發。
                            <br>
                            <br> （二）、問題：如何多人協作程式碼？
                            <br>
                            <br> 1. 原因：我們有四個人，以前沒受過多人寫程式的教學，也沒有實際合作寫過程式，而我們必須善用每個人的時間，才能完成任務。
                            <br>
                            <br> 2. 解決辦法：學習使用業界常用的git分散式版控系統。
                            <br>
                            <br> （三）、問題：如何將最新資料進行更新？
                            <br>
                            <br> 1. 原因：因為伺服器會定時更新公告數據，而我們要讓伺服器能夠辨識上次資料更新的文章ID，但PHP不適合做一個長時間工作的程式語言，我們還是要將上次的文章ID進行儲存。
                            <br>
                            <br> 2. 解決辦法：我們試著使用伺服器上的資料庫來暫時儲存資料，新增一個資料表並將初始數據輸入，當伺服器擷取完資料時我們會下達SQL的UPDATE指令，該指令是將資料進行複寫，因此我們可以從中得到最新的文章ID，由crontab定時呼叫爬蟲執行。
                            <br>
                            <br> （四）、問題：當學校伺服器掛掉或維修時我們程式的運作情形？
                            <br>
                            <br> 1. 原因：我們所抓取的資料來源是大安高工的學校官網，但其中學校伺服器會有定期維修或斷電之情形，而當使用者遇到這情況，我們的程式要如何去回應這問題。
                            <br>
                            <br> 2. 解決辦法：基於我們的伺服器市架在學校網路系統之下的電腦研究社的伺服器，因此當學校網頁定期維修或斷電之情形發生時，我們的伺服器也將無法運行，因此聯網的程式將不會進行運行，但使用者還是能透過本程式看到離線瀏覽的資料，如有問題也會使用粉專與推播通知使用者。
                            <br>
                            <br> （五）、問題：如何讓手機端看見需IE瀏覽器中的VBscript來操作登入資料？
                            <br>
                            <br> 1. 原因：VBscript已經是一個被時代所拋棄的語言，而這類語言與有IE11前的系列才有支援，但本專題之目的是要提供使用者整合的資訊，為此需解決手機端接收語言的程式碼。
                            <br>
                            <br> 2. 解決辦法：因學校系統的VBscript，都用在不是重點的地方，每個都有簡單不需VBscript的方法可以使用，所以我們可以直接用相關方法直接使用。
                            <br>
                            <br> （六）、問題：如何讓各類型的Android手機面板能正確顯示手機介面？
                            <br>
                            <br> 1. 原因：本程式在測試時能因應手機模擬器之介面，但在正式封裝成APK安裝至手機時介面的圖標有位移之情形，以致於手機用戶端會出現一半的圖標消失之情形。
                            <br>
                            <br> 2. 解決辦法：將Android studio版面配置之相關程式修正，使圖標距離改成依比例放大，讓個使用者的面板不會發生失真之情況。
                            <br>
                            <br> （七）、問題：如何讓程式效能提升？
                            <br>
                            <br> 1. 原因：因php爬蟲速度明顯偏慢，經由分析我們得出:ＰＨＰ端程式運作速度約為30秒傳一份（20份公告684秒）公告資料，間接造成伺服器端運作時間增加，以致於程式效能下降。最主要原因為3個ｆｏｒ迴圈的程式判定與分類。
                            <br>
                            <br> 2. 解決辦法：重新檢視程式架構，並直接模擬程式運作，我們總共進行兩次的PHP後端效能提升。第一次效能提升，經逐行觀測後，將重複執行的函數運算，設置為單一變數，使程式能執行效能增加並讓程式架構精簡化；第一次效能提升，是將第三個for迴圈移除，改以學校網站中搜尋功能將資料直接搜尋對照。
                            <br>
                            <br> （八）、問題：無法公告抓取圖片？
                            <br>
                            <br> 1. 原因：基於目前所觀測到學校網頁公告附件圖片都為jpg圖檔，因此PHP端公告製作者認定學校網站只能上傳jpg圖檔。但在12月25日學校出現了一篇預料外的公告文章，”LTTC英檢師資講堂”內文圖片附件為網頁製作時幾乎不會看到的bmp圖檔。
                            <br>
                            <br> 2. 解決辦法：原程式碼改寫，將程式碼中只支援jpg的程式碼改掉，改為能支援jpg、png、gif、bmp之圖檔。(這年頭還有bmp啊…)
                            <br>
                            <br> （九）、問題：成績查詢之文字位移之問題？
                            <br>
                            <br> 1. 原因：這是一開始無法偵測的問題，當學生段考成績超過100分時，基於字體寬度而被擠到下一行，以致於學生只能看到10分與下一行0的上半部四分一的文字。
                            <br>
                            <br> 2. 解決辦法：我們在程式中加入判斷式，當成績出現3位數時將進行自動字體縮小至預設框限文字的最大範圍。讓使用者的滿分成績能正確顯現。
                            <br>
                            <br> （十）、問題：論壇特殊字元輸入問題？
                            <br>
                            <br> 1. 原因：當我們使用論壇系統時，輸入字串中包含雙引號、單引號、中括號，會造成json格式遭到破壞，使App無法讀取分析。
                            <br>
                            <br> 2. 解決辦法：這問題是出自於字元的問題，我們將所有相關字元做了脫逸的處理。
                            <br>
                            <br> （十一）、問題：上架後伺服器故障？
                            <br>
                            <br> 1. 原因：2015/12/31深夜，程式無法登入與應用功能，就連架在伺服器上的其他網頁也一併無法使用。
                            <br>
                            <br> 2. 解決辦法：這問題主要出自於伺服器端的設定，原本crontab設定的排程計畫，因不明原因失效，從每兩個月執行，變成每幾秒執行，造成伺服器上的不穩，也因更新了憑證，造成App裡的簽章失效，而無法連線，此為當初之設計不良，透過更新0.5.1版解決。
                        </div>
                    </div>

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
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 style="margin:5px;">專題動機</h4></div>
                            <div class="panel-body">
                                <textarea name="editor1">
                                    <p>中華民國各學術機關，大多都有著網頁與時代脫節的問題。如：Flash外掛所產生的資安問題、cookie的加密問題、SSL伺服器憑證過期、舊型的網頁語法（VBscript, JScript）的相容性。而大安高工的「學生獎懲系統」中也有著這類的問題，而在學校臉書的匿名版上經常出現許多對於學校的部分系統一定要用IE登入而抗議。
                                        <br>
                                        <br> 這原因其實是學校的「學生獎懲系統」中將登入按鈕的型態宣告引入至VBscript，以檢查帳號密碼是否為空值，但其實只要將網頁中的登入按紐的type=”button”改成type=”submit”就可在非IE類的瀏覽器登入網頁。VBscript是微軟在1996年所上市的網頁語言，然而這類程式語言早已被大時代所淘汰，微軟在IE9以後預設已不再支援VBscript。(相容性檢視可支援)
                                        <br>
                                        <br> 況且大多學校網站為因應各單位的需求，而會不斷的增加公告分類，即使添加了表格來區隔，但最終還是會使得網頁排版變得太過會亂；後來意識到這問題後，又將每個公告資料加以分類，但按照各單位的分法，分類後的公告反而顯得太過繁瑣。即使網頁有再好的內容但版面排列不夠人性化，都使的使用者不願使用。
                                        <br>
                                        <br> 而近年來，因智慧型手機的崛起，人們越來越少使用電腦，大部分網頁都會製作適合手機觀看的網站或開發成手機應用程式。我們為了要解決系統查詢之不便與達成智慧校園的理想，而開發了這款APP。 </p>
                                </textarea>
                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 style="margin:5px;">遇到的問題與解決辦法</h4></div>
                            <div class="panel-body">
                                <textarea name="editor1">
                                    （一）、問題：沒有任何人有Android相關開發經驗？
                                    <br>
                                    <br> 1. 原因：在時間緊迫下，我們必須有做完的把握。
                                    <br>
                                    <br> 2. 解決辦法：盡可能使用組員熟悉網頁前後端技術，盡可能結合伺服器後端，來解決Android開發的不熟悉，就算最後App做不出來，也可以改走手機網頁結合webview以及網頁開發。
                                    <br>
                                    <br> （二）、問題：如何多人協作程式碼？
                                    <br>
                                    <br> 1. 原因：我們有四個人，以前沒受過多人寫程式的教學，也沒有實際合作寫過程式，而我們必須善用每個人的時間，才能完成任務。
                                    <br>
                                    <br> 2. 解決辦法：學習使用業界常用的git分散式版控系統。
                                    <br>
                                    <br> （三）、問題：如何將最新資料進行更新？
                                    <br>
                                    <br> 1. 原因：因為伺服器會定時更新公告數據，而我們要讓伺服器能夠辨識上次資料更新的文章ID，但PHP不適合做一個長時間工作的程式語言，我們還是要將上次的文章ID進行儲存。
                                    <br>
                                    <br> 2. 解決辦法：我們試著使用伺服器上的資料庫來暫時儲存資料，新增一個資料表並將初始數據輸入，當伺服器擷取完資料時我們會下達SQL的UPDATE指令，該指令是將資料進行複寫，因此我們可以從中得到最新的文章ID，由crontab定時呼叫爬蟲執行。
                                    <br>
                                    <br> （四）、問題：當學校伺服器掛掉或維修時我們程式的運作情形？
                                    <br>
                                    <br> 1. 原因：我們所抓取的資料來源是大安高工的學校官網，但其中學校伺服器會有定期維修或斷電之情形，而當使用者遇到這情況，我們的程式要如何去回應這問題。
                                    <br>
                                    <br> 2. 解決辦法：基於我們的伺服器市架在學校網路系統之下的電腦研究社的伺服器，因此當學校網頁定期維修或斷電之情形發生時，我們的伺服器也將無法運行，因此聯網的程式將不會進行運行，但使用者還是能透過本程式看到離線瀏覽的資料，如有問題也會使用粉專與推播通知使用者。
                                    <br>
                                    <br> （五）、問題：如何讓手機端看見需IE瀏覽器中的VBscript來操作登入資料？
                                    <br>
                                    <br> 1. 原因：VBscript已經是一個被時代所拋棄的語言，而這類語言與有IE11前的系列才有支援，但本專題之目的是要提供使用者整合的資訊，為此需解決手機端接收語言的程式碼。
                                    <br>
                                    <br> 2. 解決辦法：因學校系統的VBscript，都用在不是重點的地方，每個都有簡單不需VBscript的方法可以使用，所以我們可以直接用相關方法直接使用。
                                    <br>
                                    <br> （六）、問題：如何讓各類型的Android手機面板能正確顯示手機介面？
                                    <br>
                                    <br> 1. 原因：本程式在測試時能因應手機模擬器之介面，但在正式封裝成APK安裝至手機時介面的圖標有位移之情形，以致於手機用戶端會出現一半的圖標消失之情形。
                                    <br>
                                    <br> 2. 解決辦法：將Android studio版面配置之相關程式修正，使圖標距離改成依比例放大，讓個使用者的面板不會發生失真之情況。
                                    <br>
                                    <br> （七）、問題：如何讓程式效能提升？
                                    <br>
                                    <br> 1. 原因：因php爬蟲速度明顯偏慢，經由分析我們得出:ＰＨＰ端程式運作速度約為30秒傳一份（20份公告684秒）公告資料，間接造成伺服器端運作時間增加，以致於程式效能下降。最主要原因為3個ｆｏｒ迴圈的程式判定與分類。
                                    <br>
                                    <br> 2. 解決辦法：重新檢視程式架構，並直接模擬程式運作，我們總共進行兩次的PHP後端效能提升。第一次效能提升，經逐行觀測後，將重複執行的函數運算，設置為單一變數，使程式能執行效能增加並讓程式架構精簡化；第一次效能提升，是將第三個for迴圈移除，改以學校網站中搜尋功能將資料直接搜尋對照。
                                    <br>
                                    <br> （八）、問題：無法公告抓取圖片？
                                    <br>
                                    <br> 1. 原因：基於目前所觀測到學校網頁公告附件圖片都為jpg圖檔，因此PHP端公告製作者認定學校網站只能上傳jpg圖檔。但在12月25日學校出現了一篇預料外的公告文章，”LTTC英檢師資講堂”內文圖片附件為網頁製作時幾乎不會看到的bmp圖檔。
                                    <br>
                                    <br> 2. 解決辦法：原程式碼改寫，將程式碼中只支援jpg的程式碼改掉，改為能支援jpg、png、gif、bmp之圖檔。(這年頭還有bmp啊…)
                                    <br>
                                    <br> （九）、問題：成績查詢之文字位移之問題？
                                    <br>
                                    <br> 1. 原因：這是一開始無法偵測的問題，當學生段考成績超過100分時，基於字體寬度而被擠到下一行，以致於學生只能看到10分與下一行0的上半部四分一的文字。
                                    <br>
                                    <br> 2. 解決辦法：我們在程式中加入判斷式，當成績出現3位數時將進行自動字體縮小至預設框限文字的最大範圍。讓使用者的滿分成績能正確顯現。
                                    <br>
                                    <br> （十）、問題：論壇特殊字元輸入問題？
                                    <br>
                                    <br> 1. 原因：當我們使用論壇系統時，輸入字串中包含雙引號、單引號、中括號，會造成json格式遭到破壞，使App無法讀取分析。
                                    <br>
                                    <br> 2. 解決辦法：這問題是出自於字元的問題，我們將所有相關字元做了脫逸的處理。
                                    <br>
                                    <br> （十一）、問題：上架後伺服器故障？
                                    <br>
                                    <br> 1. 原因：2015/12/31深夜，程式無法登入與應用功能，就連架在伺服器上的其他網頁也一併無法使用。
                                    <br>
                                    <br> 2. 解決辦法：這問題主要出自於伺服器端的設定，原本crontab設定的排程計畫，因不明原因失效，從每兩個月執行，變成每幾秒執行，造成伺服器上的不穩，也因更新了憑證，造成App裡的簽章失效，而無法連線，此為當初之設計不良，透過更新0.5.1版解決。
                                </textarea>
                            </div>
                        </div>

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
                    e.preventDefault()
                    $(this).tab('show')
                })
            </script>
        </div>
    </div>

@endsection