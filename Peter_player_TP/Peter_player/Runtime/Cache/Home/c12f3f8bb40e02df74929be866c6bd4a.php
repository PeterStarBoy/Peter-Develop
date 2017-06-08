<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo (session('name')); ?>订阅的播客</title>
</head>
<script src="/Peter_player_TP/Peter_player/Public/Home/js/channel_conment.js"></script>
<script type="text/javascript" src="/Peter_player_TP/Peter_player/Public/Home/js/delete_video.js"></script>
<body>
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
     <a href="#" onclick="javacript:Wopen=open('/Peter_player_TP/index.php/Home/Subscribe/register','用户注册','height=600,width=665,scrollbars=no');"><img src="/Peter_player_TP/Peter_player/Public/Home/images/首页_02_05.gif" width="68" height="22" border="0" /></a>
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

<table width="1004" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="97">&nbsp;</td>
    <td width="811"><table width="810" height="35" border="0" align="center" cellpadding="0" cellspacing="0" background="/Peter_player_TP/Peter_player/Public/Home/images/首页_03.gif">
  <tr>
<?php if(empty($_SESSION['name'])): ?><td width="113" align="center"><a href="individualism_video.php?user_id=<?php echo ($user_id); ?>&&video_user=<?php echo ($user); ?>" class="white_STYLE3">视频</a></td>
   

 <td width="110" align="center">
 
<a href="subscibe_program.php?user_id=<?php echo ($user_id); ?>&&video_user=<?php echo ($user); ?>" class="white_STYLE3">订阅(<?php echo ($subscibe_counts); ?>)</a></td> 
<?php else: ?>
 <td width="110" align="center"><a href="subscibe/<?php echo ($user_id); ?>.xml" class="white_STYLE3"><img src="/Peter_player_TP/Peter_player/Public/Home/images/2464.jpg" width="16" height="16" border="0"></a></td>


 <td width="166" align="center"><a href="my_video_manage.php?video_user=<?php echo ($name); ?>" class="white_STYLE3">我上传的节目</a></td>
 <td width="168" align="center"><a href="cancel_subscibe.php?video_user=<?php echo ($name); ?>" class="white_STYLE3">我订阅的播客</a></td><?php endif; ?>  </tr>
</table></td>
    <td width="96">&nbsp;</td>
  </tr>
</table>
<table width="1004" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><img src="/Peter_player_TP/Peter_player/Public/Home/images/子页_02.gif" width="1004" height="40"></td>
  </tr>
  <tr>
    <td width="39" background="/Peter_player_TP/Peter_player/Public/Home/images/子页_03.gif">&nbsp;</td>
    <td width="908"><table width="900" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="/Peter_player_TP/Peter_player/Public/Home/images/子页_09.gif" width="880" height="36"></td>
      </tr>
      <tr>
        <td>

	<table width="900" height="208" border="0" cellpadding="0" cellspacing="0">
  <tr><td colspan="5"></td>
  {php}$number=0;{/php}
  {section name=subscibe_id loop=$subscibe}
      {php}if(($number % 4) == 0){ {/php}</tr>      
<tr> {php}
}{/php}

        <td colspan="5">
<table width="225" height="94" border="0" cellpadding="00" cellspacing="0">
{section name=video_user_id loop=$video_user}
{if $video_user[video_user_id].tb_video_user==$subscibe[subscibe_id].tb_video_user}      
	<tr>

   <td width="225" align="center">{section name=subscibe_program_id loop=$subscibe_address}
{if $subscibe_address[subscibe_program_id].tb_video_user==$video_user[video_user_id].tb_video_user}
<a href="my_subscibe_program.php?url=<?php echo ($ip); ?>/MR/21/01/subscibe/<?php echo ($subscibe_address[subscibe_program_id]["tb_subscibe_address"]); ?>&video_user=<?php echo ($video_user[video_user_id]["tb_video_user"]); ?>" target="_blank">
    <img src="head_picture.php?recid=<?php echo ($video_user[video_user_id]["tb_user_id"]); ?>" width="120" height="135" border="0" ></a>
{/if}
{/section}</td>
      </tr>
      <tr>
        <td height="17" align="center">&nbsp;</td>
      </tr>
{section name=video_counts_id loop=$video_counts}
{if $video_counts[video_counts_id].tb_video_user==$video_user[video_user_id].tb_video_user} 
     <tr>
        <td align="center">
节目：&nbsp;<?php echo ($video_counts[video_counts_id]["tb_up_counts"]); ?></td>
      </tr>
{/if}
{/section}
      <tr>
        <td align="center">播客：&nbsp;
{section name=subscibe_program_id loop=$subscibe_address}
{if $subscibe_address[subscibe_program_id].tb_video_user==$video_user[video_user_id].tb_video_user}
<a href="my_subscibe_program.php?url=<?php echo ($ip); ?>/MR/21/01/subscibe/<?php echo ($subscibe_address[subscibe_program_id]["tb_subscibe_address"]); ?>&video_user=<?php echo ($video_user[video_user_id]["tb_video_user"]); ?>" target="_blank">
    <?php echo ($video_user[video_user_id]["tb_video_user"]); ?></a>
{/if}
{/section}
</td>
      </tr>
      <tr>
        <td align="center"><input type="submit" name="Submit" value="取消订阅" onClick="cancel_subscibe('<?php echo ($video_user[video_user_id]["tb_video_user"]); ?>','<?php echo ($name); ?>')"></td>
      </tr>
{/if}{/section}
</table>
		</td>

        {php}if(($number %4) != 0){{/php} 
      {php}

}
      $number++;
      {/php}
      {/section}  </tr> 
</table>

          		</td>
      </tr>
      <tr>
        <td>
		</td>
      </tr>
    </table></td>
    <td width="57" background="/Peter_player_TP/Peter_player/Public/Home/images/子页_05.gif">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><img src="/Peter_player_TP/Peter_player/Public/Home/images/子页_12.gif" width="1004" height="35"></td>
  </tr>
</table>
<img src="/Peter_player_TP/Peter_player/Public/Home/images/登录后_11.gif" width="1004" height="85">
</body>
</html>