<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>播放</title>
</head>
<script type="text/javascript" src="/Peter_player_TP/Peter_player/Public/Home/js/discuss_js.js"></script>
<script type="text/javascript" src="/Peter_player_TP/Peter_player/Public/Home/js/jquery.js"></script>
<script>
$(function() {
	$('#comment').on('submit', function () {
		if ($('#user').text() == '')
		{
			alert('请登录后再进行评论！');
			return false;
		} 
		else 
		{
			if ($.trim($('#content').val()) == '')
			{
				alert('评论内容不能为空!');
				return false;
			} 
			else 
			{
				return true;
			}

		}
	});
});
</script>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>明日播客</title>
</head>
<script language='javascript'>
//pass over __MODLUE__ to js file
	var module = "/Peter_player_TP/index.php/Home";
</script>
<script src="/Peter_player_TP/Peter_player/Public/Home/js/chk.js"></script>
<link rel="stylesheet" href="/Peter_player_TP/Peter_player/Public/Home/css/style.css"/>
<link rel="stylesheet" href="/Peter_player_TP/Peter_player/Public/Home/css/reg.css"/>
<body>

<table width="1004" height="72" border="0" cellpadding="0" cellspacing="0" background="/Peter_player_TP/Peter_player/Public/Home/images/首页_01.gif">
   <form name="form1" method="post" action="select_video.php" > 
  <tr>
    <td width="627" height="35">&nbsp;</td>
    <td width="227">&nbsp;</td>
    <td width="150">&nbsp;</td>
  </tr>
  <tr>
    <td rowspan="2" align="right">视频
      <input name="video" type="radio" value="视频" checked> 
      播客
      <input type="radio" name="video" value="播客"></td>
    <td height="5"></td>
    <td rowspan="2"><input type="image" name="imageField" src="/Peter_player_TP/Peter_player/Public/Home/images/首页_01_03.gif" onClick="return chk_select()"></td>
  </tr>
  <tr>
    <td height="32">&nbsp;<input name="select_video_play" type="text" size="29"></td>
    </tr>
  </form>
</table>
<?php if(!empty($_SESSION['name'])): ?><table width="1004" height="36" border="0" cellpadding="0" cellspacing="0" background="/Peter_player_TP/Peter_player/Public/Home/images/登录后_02.gif">
  <tr>
    <td width="237" rowspan="2" align="right">&nbsp;</td>
    <td width="62" height="11"></td>
    <td width="82"></td>
    <td width="102"></td>
    <td width="135"></td>
    <td width="77"></td>
    <td width="78"></td>
    <td width="231" colspan="2"></td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="l_td"><?php echo (session('name')); ?></span></td>
    <td width="82" align="center"><a href="/Peter_player_TP/index.php/Home/Subscribe/subscribe/name/<?php echo (session('name')); ?>" target="_blank">我的订阅</a></td>
    <td width="102" align="center"><span class="l_td"><a href="/Peter_player_TP/index.php/Home/Videouser/modvip/id/<?php echo (session('id')); ?>" target="_blank">修改会员资料</a></span></td>
    <td width="135" align="center"><a href="individualism.php?user_id=<?php echo (session('id')); ?>&&video_user=<?php echo (session('name')); ?>" target="_blank"><?php echo (session('name')); ?>的个人主页</a></td>
    <td width="77" align="center"><a href="my_video_manage.php?video_user=<?php echo (session('name')); ?>" target="_blank">我的视频</a></td>
    <td width="78" align="center"><a href="trans.php" target="_blank">上传文件</a></td>
    <td width="115"><span class="l_td"><a href="#" onClick="return l_chk();">退出登录</a></span></td>
    <td width="116"><a href="historylook.php">[历史浏览]</a></td>
  </tr>
</table>
<?php else: ?>
<script src="/Peter_player_TP/Peter_player/Public/Home/js/chk.js"></script>
<script>
</script>
<link rel="stylesheet" href="/Peter_player_TP/Peter_player/Public/Home/css/reg.css"/>
<link rel="stylesheet" href="/Peter_player_TP/Peter_player/Public/Home/css/style.css"/>
<table width="1004" height="36" border="0" cellpadding="0" cellspacing="0" background="/Peter_player_TP/Peter_player/Public/Home/images/首页_02.gif">
 <form name="login" id="login" action="/Peter_player_TP/index.php/Home/Public/checkLogin" method="post">
 <tr>
    <td width="153" rowspan="2">&nbsp;</td>
    <td width="90" rowspan="2">&nbsp;</td>
    <td width="186" height="6"></td>
    <td width="140" height="6"></td>
    <td width="140" align="left" height="6"></td>
    <td width="283" rowspan="2"><a href="#" id="dw" class="b" onclick="javascript:Wopen=open('found_pwd.php?','found_pwd','width=665,height=300,scrollbars=no')">[忘记密码]</a>&nbsp;&nbsp;[<a  class="b" href="historylook.php">历史浏览</a>]</td>
  </tr>
 <tr>
   <td height="30"><input type="text" id="name" name="name" size="18" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''" /></td>
   <td width="146" height="30"><input type="password" id="password" name="password"  size="18" onmouseover="this.style.backgroundColor='#deebef'" onmouseout="this.style.backgroundColor=''"/></td>
   <td width="146" height="30" align="left"><input type="image" id='commit' name="login" src="/Peter_player_TP/Peter_player/Public/Home/images/首页_02_03.gif" />
     <a href="#" onclick="javacript:Wopen=open('/Peter_player_TP/index.php/Home/Public/register','用户注册','height=600,width=665,scrollbars=no');"><img src="/Peter_player_TP/Peter_player/Public/Home/images/首页_02_05.gif" width="68" height="22" border="0" /></a>
    </td>
 </tr>
</form>
</table><?php endif; ?>
 <table width="1004" border="0" cellpadding="0" cellspacing="0" background="/Peter_player_TP/Peter_player/Public/Home/images/首页_03.gif">
   <tr>
     <td width="80" height="35" align="center"><a href="/Peter_player_TP/index.php/Home/Index/index" class="white_STYLE3">首页</a></td>
     <td width="50" align="center"><a href="video.php" target="_blank" class="white_STYLE3">视频</a></td>
     <td width="50" align="center"><a href="play_user.php" target="_blank" class="white_STYLE3">播客</a></td>
     <td width="80" align="center"><a href="/Peter_player_TP/index.php/Home/Hotplay/hotplay" class="white_STYLE3">热播排行</a></td>
     <td width="80" align="center"><a href="new_play.php?video_type=最新推出" target="_blank" class="white_STYLE3">最新推出</a></td>
     <td width="664">
	 <table width="100%" height="30" border="0" cellpadding="0" cellspacing="0">
<tr>
<!--
{section name=type_id loop=$video_type}      
<td height="25" width="80" align="center">
<a href="include.php?video_type=<?php echo ($video_type[type_id]["tb_type_id"]); ?>" target="_blank" class="white_STYLE3"><?php echo ($video_type[type_id]["tb_type_name"]); ?></a></td>
{/section}  
-->
</tr>
</table></td>
   </tr>
 </table>

<body>
<table width="1004" height="450" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="2" width="10">&nbsp;</td></tr>

  <tr>
    <td width="491"><table width="480" height="450" border="0" align="center" cellpadding="0" cellspacing="0">
     <tr>
 
    <td colspan="2" align="center" bgcolor="#FFFFFF">
<!--调用SetFull函数，实现窗口的全屏-->
      <input type="button" onClick="SetFull()" class="buttoncss" value="全屏播放">&nbsp;&nbsp;      
<!--关闭播放器的窗口-->
<input name="button" type="button" class="buttoncss" onClick="javascript:window.close()" value="关闭视窗"></td>
    </tr>
  <tr>
    <td height="340" colspan="4" bgcolor="#ffffff"><div align="center"> 
<object onerror="<script>alert('该视频无法播放！')</script>" classid="clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA" name="rp1" width="475" height="375" id="rp1">
			  <param name="_extentx" value="12000">
              <param name="_extenty" value="1500">
              <param name="shuffle" value="0">
              <param name="nolabels" value="0">
              <param name="autostart" value="-1">
              <param name="prefetch" value="0">
              <param name="controls" value="imagewindow">
              <param name="console" value="clip1">
              <param name="loop" value="0">
              <param name="numloop" value="0">
              <param name="center" value="0">
              <param name="maintainaspect" value="0">
              <param name="backgroundcolor" value="#000000">
              <param name="src" value="/Peter_player_TP/Peter_player/Public/Home/Video/one.avi"><!--<?php echo ($video[video_id]["tb_video_address"]); ?>-->
			  <embed src="/Peter_player_TP/Peter_player/Public/Home/Video/<?php echo ($data['tb_video_address']); ?>" type="audio/x-pn-realaudio-plugin" console="Clip1" controls="ImageWindow" height="375" width="475" >
              </embed>
            </object>
        </div></td>
      </tr>
      <tr>
        <td height="60" bgcolor="#000000"><div align="center">
            <object classid="clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA" name="rp2" width="475" height="60" id="rp2">
			  <param name="_extentx" value="12000">
              <param name="_extenty" value="1500">
              <param name="shuffle" value="0">
              <param name="nolabels" value="0">
              <param name="autostart" value="-1">
              <param name="prefetch" value="0">
              <param name="controls" value="controlpanel,statusbar">
              <param name="console" value="clip1">
              <param name="loop" value="0">
              <param name="numloop" value="0">
              <param name="center" value="0">
              <param name="maintainaspect" value="0">
              <param name="backgroundcolor" value="#000000">
		 	 <embed width="475" height="60" controls="ControlPanel" console="Clip1" type="audio/x-pn-realaudio-plugin" >
             </embed>
            </object>
        </div></td>
      </tr>
    </table></td>
	<!--RIGHT BOX SHOWLIST AREA-->
    <td width="513" background="/Peter_player_TP/Peter_player/Public/Home/images/视频_4.jpg">
	<table width="513" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="14">&nbsp;</td>
        <td width="480" height="70">&nbsp;</td>
        <td width="19">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="175" align="center"><table width="475" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="175" height="175" align="right" valign="bottom"><img name="news" src="$video[video_id].tb_video_picture" width="160" height="170" alt="播放视频" border="0"/></td>
            <td width="300"><table width="200" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="25" align="right" valign="bottom">视频：
					<input type = 'hidden' id = 'videoId' value = "<?php echo ($data['tb_video_id']); ?>" />
					</td>
                    <td height="25" align="left" valign="bottom"><?php echo ($data['tb_video_name']); ?></td>
                  </tr>
                  <tr>
                    <td width="100" height="20" align="right" valign="middle">类型：</td>
                    <td width="200"><div><?php echo ($data['tb_type_name']); ?></div></td>
                  </tr>

                  <tr>
                    <td height="20" align="right" valign="middle">时间：</td>
                    <td><?php echo ($data['tb_video_date']); ?></td>
                  </tr>
                  <tr>
                    <td height="20" align="right" valign="middle">播客：</td>
                    <td><?php echo ($data['tb_video_author']); ?></td>
                  </tr>
                  <tr>
                    <td height="20" align="right" valign="middle">评论：</td>
                    <td><?php echo ($data['tb_video_counts']); ?></td>
                  </tr>
                  <tr>
                    <td height="20" align="right" valign="middle">播放：</td>
                    <td><?php echo ($data['tb_video_play']); ?></td>
                  </tr>
                  <tr>
                    <td height="20" align="right" valign="middle">下载：</td>
                    <td><?php echo ($data['tb_video_down']); ?></td>
                  </tr>
                  <tr>
                    <td height="30" colspan="2" align="center" valign="middle"><a href="/Peter_player_TP/index.php/Home/Public/checkLogin/id/<?php echo ($data['tb_video_id']); ?>">播放</a> &nbsp;&nbsp;&nbsp;&nbsp;<a href="/Peter_player_TP/index.php/Home/Hotplay/download/id/<?php echo ($data['tb_video_id']); ?>">下载</a></td>
                  </tr>
                </table></td>
          </tr>
        </table></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="185" align="center"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
          
                <tr>
                  <td width="50%" height="100%" align="left" valign="top">
<table width="240" height="100%" border="0" cellpadding="0" cellspacing="0">  
                    <tr>
                      <td height="25" colspan="2" align="center"><a href="/Peter_player_TP/index.php/Home/Public/checkLogin/id/<?php echo ($data_pre['tb_video_id']); ?>" >上一节目</a></td>
                    </tr>
                    <tr>
                      <td width="105" height="110" align="center"><div align="right"><img src="$video1[video_id1].tb_video_picture" alt="" name="news" width="100" height="106" hspace="0" vspace="0" border="0" align="middle" /></div></td>
                      <td width="135"><table width="130" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="45" align="right">类型：</td>
                          <td width="90"><?php echo ($data_pre['tb_type_name']); ?></td>
                        </tr>
                        <tr>
                          <td align="right">评论：</td>
                          <td><?php echo ($data_pre['tb_video_counts']); ?></td>
                        </tr>
                        <tr>
                          <td align="right">下载：</td>
                          <td><?php echo ($data_pre['tb_video_down']); ?></td>
                        </tr>
                        <tr>
                          <td align="right">播放：</td>
                          <td><?php echo ($data_pre['tb_video_play']); ?></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center" valign="bottom"><a href="/Peter_player_TP/index.php/Home/Public/checkLogin/id/<?php echo ($data_pre['tb_video_id']); ?>">播放</a>&nbsp;&nbsp;&nbsp;<a href="/Peter_player_TP/index.php/Home/Hotplay/download/id/<?php echo ($data_pre['tb_video_id']); ?>">下载</a></td>
                          </tr>
                      </table>
					  </td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center">视频：<?php echo ($data_pre['tb_video_name']); ?></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center">播客：<?php echo ($data_pre['tb_video_author']); ?></td>
                    </tr>
                  </table></td>
                  <td width="50%" align="left" valign="top"><table width="240" height="100%" border="0" cellpadding="0" cellspacing="0">              
    <tr>
      <td height="25" colspan="2" align="center"><a href="/Peter_player_TP/index.php/Home/Public/checkLogin/id/<?php echo ($data_next['tb_video_id']); ?>">下一节目</a></td>
      </tr>
    <tr>
                      <td width="105" height="110" align="center"><div align="right"><img src="<?php echo ($video[video_id]["tb_video_picture"]); ?>" alt="" name="news" width="100" height="106" hspace="0" vspace="0" border="0" align="middle" /></div></td>
                      <td width="135"><table width="130" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="45" align="right">类型：</td>
                            <td width="90"><?php echo ($data_next['tb_type_name']); ?></td>
                          </tr>
                          <tr>
                            <td align="right">评论：</td>
                            <td><?php echo ($data_next['tb_video_counts']); ?></td>
                          </tr>
                          <tr>
                            <td align="right">下载：</td>
                            <td><?php echo ($data_next['tb_video_down']); ?></td>
                          </tr>
                          <tr>
                            <td align="right">播放：</td>
                            <td><?php echo ($data_next['tb_video_play']); ?></td>
                          </tr>
                          <tr>
                            <td colspan="2" align="center" valign="bottom"><a href="/Peter_player_TP/index.php/Home/Public/checkLogin/id/<?php echo ($data_next['tb_video_id']); ?>">播放</a>&nbsp;&nbsp;&nbsp;<a href="/Peter_player_TP/index.php/Home/Hotplay/download/id/<?php echo ($data_next['tb_video_id']); ?>">下载</a></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center">视频：<?php echo ($data_next['tb_video_name']); ?></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center">播客：<?php echo ($data_next['tb_video_author']); ?></td>
                    </tr>
                  </table></td>
                </tr>
          </table></td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="1004" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="677" align="right" valign="top">
      <table width="673" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div id="discuss_id">
<table width="100%" border="1" cellpadding="1" cellspacing="1" bordercolor="#EFEFF7" bgcolor="#FFFFFF">
<?php if(empty($dis_info)): ?><tr height="35">
    <td  colspan="4"align="center">暂无评论！</td>
  </tr>
<?php else: ?>
  <tr height="35">
    <td  colspan="4"align="center"><img src="/Peter_player_TP/Peter_player/Public/Home/images/视频_9.jpg" width="665" height="36"></td>
  </tr>
  <tr>
    <td colspan="3">
<table width="100%" height="25" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EFEFF7">
            <tr>
              <td width="531"><div align="left">&nbsp;&nbsp;评论&nbsp;<?php echo ($totalrows); ?>&nbsp;条</div></td>
              <td width="317"><div align="right"><?php echo ($show); ?></div></td></tr>
</table>	</td>
    </tr>
<?php if(is_array($dis_info)): $i = 0; $__LIST__ = $dis_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dis_infoval): $mod = ($i % 2 );++$i;?><tr>
    <td width="137" height="37" align="right">评论人：</td>
    <td width="273" bgcolor="#FAFAFC">&nbsp;<?php echo ($dis_infoval['tb_discuss_user']); ?></td>
    <td width="478">评论时间：<?php echo ($dis_infoval['tb_discuss_date']); ?></td>
  </tr>
  <tr>
    <td height="35" colspan="3">&nbsp;<?php echo ($dis_infoval['tb_discuss_content']); ?></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
</table>
</div><table width="100%" height="167" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#ECECF8">
      <form name="form1_discuss" id='comment' method='post' action='/Peter_player_TP/index.php/Home/Comment/commentProcess'>
      <tr>
        <td width="15%" align="right" bgcolor="#FAFAFC">评论内容：</td>
        <td colspan="2" bgcolor="#FAFAFC"><textarea id = 'content' name="tb_discuss_content" cols="50" rows="8" id="tb_discuss_content"></textarea>
          <input type="hidden" name="tb_video_id" id="tb_video_id" value="<?php echo ($data['tb_video_id']); ?>">
		  <input type='hidden' name='tb_discuss_user' value="<?php echo (session('name')); ?>" />
        </td>
        </tr>
      <tr>
        <td align="right" bgcolor="#FAFAFC">评论人：</td>
        <td width="59%" bgcolor="#FAFAFC">
          <span id='user'><?php echo (session('name')); ?></span>
		</td>
        <td width="26%" bgcolor="#FAFAFC">
          <input type="image" name="Submit" id='btn' value="发表"  src="/Peter_player_TP/Peter_player/Public/Home/images/视频_13.jpg"></td>
      </tr>
</form>
    </table></td>
        </tr>
      </table></td>
    <td width="327" valign="top"><table width="327" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="3"><img src="/Peter_player_TP/Peter_player/Public/Home/images/视频_10_1.jpg" width="327" height="41"></td>
        </tr>
      <tr>
        <td width="15" background="/Peter_player_TP/Peter_player/Public/Home/images/视频_10_2.jpg">&nbsp;</td>
        <td width="289" height="150"><table width="285" height="160" border="0" cellpadding="0" cellspacing="0">
<!--loopstart-->
<tr>
    <td width="135" height="160" align="center" valign="middle"><img name="news" src="$videos[video_ids].tb_video_picture" width="130" height="150" alt="" border="0"/></td>
    <td width="150" align="center" valign="top"><table width="154" height="160" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="20" colspan="2" align="center">12321321</td>
      </tr>
      <tr>
        <td width="54" height="20" align="right" valign="middle">类型：</td>
        <td width="96"><div>
<!--loopstart show types-->循环显示类型
</div></td>
      </tr>
      <tr>
        <td height="20" align="right" valign="middle">时间：</td>
        <td>safdas12321</td>
      </tr>
      <tr>
        <td height="20" align="right" valign="middle">播客：</td>
        <td>12321312</td>
      </tr>
      <tr>
        <td height="20" align="right" valign="middle">评论：</td>
        <td>123213312</td>
      </tr>
      <tr>
        <td height="20" align="right" valign="middle">播放：</td>
        <td>1232132</td>
      </tr>
      <tr>
        <td height="20" colspan="2" align="center" valign="middle"><a href="look.php?video_id=$videos[video_ids].tb_video_id&video_name=$videos[video_ids].tb_video_name|escape:"url"">
播放</a> &nbsp;&nbsp;&nbsp;&nbsp;<a href="download.php?id=$videos[video_ids].tb_video_id">下载</a></td>
      </tr>
    </table></td>
  </tr>
</table></td>
        <td width="23" background="/Peter_player_TP/Peter_player/Public/Home/images/视频_10_4.jpg">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3"><img src="/Peter_player_TP/Peter_player/Public/Home/images/视频_10_6.jpg" width="327" height="35"></td>
        </tr>
    </table></td>
  </tr>
</table>
<img src="/Peter_player_TP/Peter_player/Public/Home/images/登录后_11.gif" width="1004" height="85">
</body>
</html>