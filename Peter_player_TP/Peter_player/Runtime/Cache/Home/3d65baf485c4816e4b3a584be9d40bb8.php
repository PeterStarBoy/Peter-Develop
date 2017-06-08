<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>视频</title>
</head>
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
     <a href="#" onclick="javacript:Wopen=open('/Peter_player_TP/index.php/Home/Hotplay/register','用户注册','height=600,width=665,scrollbars=no');"><img src="/Peter_player_TP/Peter_player/Public/Home/images/首页_02_05.gif" width="68" height="22" border="0" /></a>
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
<table width="1004" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td colspan="3"><img src="/Peter_player_TP/Peter_player/Public/Home/images/子页_02.gif" width="1004" height="40"></td>
	</tr>
	<tr>
	<td width="39" background="/Peter_player_TP/Peter_player/Public/Home/images/子页_03.gif">&nbsp;</td>
	<td width="908">
		<table width="900" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td height="36">
				<table width="880" height="36" border="0" cellpadding="0" cellspacing="0" background="/Peter_player_TP/Peter_player/Public/Home/images/子页_08.gif">
					<tr>
						<td width="65">&nbsp;</td>
						<td width="815"><span class="stpe_STYLE1"><span style="color:red; font-size:20px; font-weight:bold;">热播排行</span></span></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table width="100%" height="49%" border="0" align="center" cellpadding="0" cellspacing="0">
					<?php if(empty($data)): ?><tr>
					<td colspan="2" align="center">没有该类视频！</td>
					</tr><?php endif; ?>
					<tr>
					<td colspan="5" height="10"></td>
					</tr>    
					<tr> 
					<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dataval): $mod = ($i % 2 );++$i;?><td colspan="5">
						<table width="300" border="0" cellspacing="0" cellpadding="0" >
							<tr>
								<td width="150" align="center" valign="middle">
								<a href="look.php?video_id=<?php echo ($video[video_id]["tb_video_id"]); ?>&video_name=}" target="_blank">
								<img name="news" src="/Peter_player_TP/Peter_player/Public/Home/images/<?php echo ($dataval['tb_video_picture']); ?>" width="130" height="150" alt="在线观看" border="0"/></a>
								</td>
								<td width="150" align="center" valign="middle">
									<table width="150" border="0" cellspacing="0" cellpadding="0">
										<tr>
										<td height="25" colspan="2"><span style="color:red"><?php echo ($dataval['tb_video_mame']); ?></span></td>
										</tr>
										<tr>
										<td width="40" height="25" align="right" valign="middle">类型：</td>
										<td width="110"><div><?php echo ($dataval['tb_type_name']); ?></div>
										</td>
										</tr>
										<tr>
										<td align="right" valign="middle">简介：</td>
										<td><span style="color:red"><?php echo ($dataval['tb_video_explain']); ?></span></td>
										</tr>
										<tr>
										<td height="25" align="right" valign="middle">播放：</td>
										<td><span style="color:red"><?php echo ($dataval['tb_video_play']); ?></span></td>
										</tr>
										<tr>
										<td height="25" align="right" valign="middle">播客：</td>
										<td><span style="color:red"><?php echo ($dataval['tb_video_author']); ?></span></td>
										</tr>
										<tr>
										<td height="25" colspan="2" align="center" valign="middle"><a href="/Peter_player_TP/index.php/Home/Index/index/id/<?php echo ($dataval['tb_video_id']); ?>" >播放</a> &nbsp;&nbsp;<a href="/Peter_player_TP/index.php/Home/Hotplay/download/id/<?php echo ($dataval['tb_video_id']); ?>">下载</a>

										&nbsp;&nbsp;<a href="#" onClick="javascript:Wopen=open('/Peter_player_TP/index.php/Home/Hotplay/showIntro/id/<?php echo ($dataval['tb_video_id']); ?>','','height=700,width=665,scrollbars=no');">简介</a></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td><?php endforeach; endif; else: echo "" ;endif; ?>
				</tr> 
			</table>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td colspan="2" align="center">
				<?php echo ($show); ?>
				</td>
			</tr>
		</td>
	</tr>
	</table>
</td>
<td width="57" background="/Peter_player_TP/Peter_player/Public/Home/images/子页_05.gif">&nbsp;</td>
</tr>
<tr>
<td colspan="3"><img src="/Peter_player_TP/Peter_player/Public/Home/images/子页_12.gif" width="1004" height="35"></td>
</tr>
</table>
<img src="/Peter_player_TP/Peter_player/Public/Home/images/登录后_11.gif" width="1004" height="85">
</body>
</html>