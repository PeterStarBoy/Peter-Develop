<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>修改密码</title>
</head>
<script src="js/chk.js"></script>
<link rel="stylesheet" href="/Peter_player_TP/Peter_player/Public/Home/css/reg.css"/>
<link rel="stylesheet" href="/Peter_player_TP/Peter_player/Public/Home/css/style.css"/>
<body>
<table width="686" height="394" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td background="/Peter_player_TP/Peter_player/Public/Home/images/个人主页_04.gif"><table width="686" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="26" height="67">&nbsp;</td>
	   
	    <td width="540"></td>
        <td width="120">&nbsp;</td>
      </tr>
      <tr>
        <td height="280">&nbsp;</td>
        <td valign="middle">
          <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td><table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
 		<form id="reg" name="reg" method="post" action="mod_vip_chk.php">
 			<tr>
   			   <td width="50" rowspan="18" align="center" valign="top">&nbsp;</td>
   			   <td height="20" colspan="2" align="center" valign="top" >&nbsp;</td>
   			   <td width="50" rowspan="18" align="center" valign="top">&nbsp;</td>
  			</tr>
  			<tr>
      			<td width="97" height="20" align="right" valign="middle"  scope="col">用户名：</td>
   			  <td width="303" align="left" valign="middle"  scope="col"><input type="text" name="tb_video_user" id="name" class="usual" value="<?php echo ($data['tb_video_user']); ?>" readonly="readonly" onMouseOver="this.style.backgroundColor='#deebef'" onMouseOut="this.style.backgroundColor=''"/></td>
    		</tr>
    		<tr>
      			<td width="97" height="20" align="right" valign="middle" >密码：</td>
   			  <td align="left" valign="middle" ><input type="password" name="tb_video_pass" id="password" class="usual" onMouseOver="this.style.backgroundColor='#deebef'" onMouseOut="this.style.backgroundColor=''"/><span class="STYLE1"> *</span>(最少3位)</td>
    		</tr>
    		<tr>
      			<td width="97" height="20" align="right" valign="middle" >确认密码：</td>
   			  <td align="left" valign="middle" ><input type="password" name="t_password" id="t_password" class="usual" onMouseOver="this.style.backgroundColor='#deebef'" onMouseOut="this.style.backgroundColor=''" /><span class="STYLE1"> *</span></td>
    		</tr>
    		<tr>
      			<td width="97" height="20" align="right" valign="middle" >E-mail：</td>
      			<td align="left" valign="middle" ><input type="text" name="tb_video_email" id="email" class="usual" value="<?php echo ($data['tb_video_email']); ?>" onMouseOver="this.style.backgroundColor='#deebef'" onMouseOut="this.style.backgroundColor=''"/></td>
    		</tr>
    		<tr>
      			<td width="97" height="20" align="right" valign="middle" >QQ：</td>
      			<td align="left" valign="middle" ><input type="text" name="tb_video_qq" id="qq" class="usual" value="<?php echo ($data['tb_video_qq']); ?>" onMouseOver="this.style.backgroundColor='#deebef'" onMouseOut="this.style.backgroundColor=''" /></td>
    		</tr>
    		<tr>
      			<td height="30" colspan="2" align="center" valign="middle" >
				<input type="hidden" name="tb_user_id" value="<?php echo ($data['tb_user_id']); ?>">
				<input name="regi" type="submit" id="regi" value="修改" onClick="return reg_chk();" />(<span class="STYLE1">*</span>号为必填项)
   			    <input name="reset" type="reset" id="reset" value="重置" /></td>
    		</tr>
</form></table>
	</td></tr></table>
</td>
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