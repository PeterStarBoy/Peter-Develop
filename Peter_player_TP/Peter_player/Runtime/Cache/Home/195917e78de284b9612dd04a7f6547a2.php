<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<link  href="/Peter_player_TP/Peter_player/Public/Home/css/intro.css" type="text/css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>视频简介</title>
</head>
<script type="text/javascript" src="/Peter_player_TP/Peter_player/Public/Home/js/discuss_js.js"></script>
<body>
<table width="686" height="394" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td background="/Peter_player_TP/Peter_player/Public/Home/images/个人主页_01.gif"><table width="686" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="26" height="67">&nbsp;</td>
	   
	    <td width="540"></td>
        <td width="120">&nbsp;</td>
      </tr>
      <tr>
        <td height="280">&nbsp;</td>
        <td valign="top"><table width="540" border="0" cellpadding="0" cellspacing="0">
		  	<tr>
				<td width="150" height="200" align="center" valign="middle"><img name="news" src="/Peter_player_TP/Peter_player/Public/Home/images/<?php echo ($data['tb_video_picture']); ?>" width="130" height="150" alt="" border="0"/></td>
				<td width="390" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="25" colspan="2" align="center"><?php echo ($data['tb_video_name']); ?></td>
                  </tr>
                  <tr>
                    <td width="21%" height="25" align="right" valign="middle">类型：</td>
                    <td width="79%"><div><?php echo ($data['tb_type_name']); ?></div></td>
                  </tr>

                  <tr>
                    <td height="25" align="right" valign="middle">时间：</td>
                    <td><?php echo ($data['tb_video_date']); ?></td>
                  </tr>
                  <tr>
                    <td height="25" align="right" valign="middle">播客：</td>
                    <td><?php echo ($data['tb_video_author']); ?></td>
                  </tr>
                  <tr>
                    <td height="25" align="right" valign="middle">评论：</td>
                    <td><?php echo ($data['tb_video_counts']); ?></td>
                  </tr>
                  <tr>
                    <td height="25" align="right" valign="middle">播放次数：</td>
                    <td><?php echo ($data['tb_video_play']); ?></td>
                  </tr>
                  <tr>
                    <td height="25" align="right" valign="middle">下载次数：</td>
                    <td><?php echo ($data['tb_video_down']); ?></td>
                  </tr>
                  <tr>
                    <td height="25" colspan="2" align="center" valign="middle"><a href="/Peter_player_TP/index.php/Home/Index/index/id/<?php echo ($data['tb_video_id']); ?>">播放</a> &nbsp;&nbsp;&nbsp;&nbsp;<a href="/Peter_player_TP/index.php/Home/Hotplay/download/id/<?php echo ($data['tb_video_id']); ?>">下载</a></td>
                  </tr>
              </table></td>
		  	</tr>
		  	<tr>
		  	  <td height="80" colspan="2" align="center" valign="top">

                简介:
              <p><?php echo ($data['tb_video_explain']); ?></p></td>
        </tr>
    </table></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="47">&nbsp;</td>
        <td valign="bottom">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>

    </table></td>
  </tr>
</table>
</body>
</html>