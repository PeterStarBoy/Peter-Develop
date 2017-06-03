<?php if (!defined('THINK_PATH')) exit();?><html>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<head>
<title>图书馆管理系统</title>
<link href="/BookManagement/Public/Admin/css/style.css" rel="stylesheet">
</head>
<script language="javascript">
function check(form){
	if(form.name.value==""){
		alert("请输入读者姓名!");form.name.focus();return false;
	}
	if(form.paperNO.value==""){
		alert("请输入证件号码!");form.paperNO.focus();return false;
	}
}
</script>
<body>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0" class="tableBorder">
  <tr>
    <td>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language='javascript'>
	var path = "/index.php/Admin";
</script>
<script src="/BookManagement/Public/Admin/js/menu.JS"></script>
<div class=menuskin id=popmenu
      onmouseover="clearhidemenu();highlightmenu(event,'on')"
      onmouseout="highlightmenu(event,'off');dynamichide(event)" style="Z-index:100;position:absolute;"></div>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="115" align="right" valign="bottom" background="/BookManagement/Public/Admin/image/banner.gif" bgcolor="#FD9C11"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="26" align="right">当前登录的用户：<?php echo (session('name')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="33" align="right" background="/BookManagement/Public/Admin/image/menu_line1.gif" bgcolor="#FD9C11"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%"></td>
        <td width="23%"><script type=text/javascript>
		document.write("<span id='labtime' width='120px' Font-Size='9pt'></span>")
		setInterval("labtime.innerText=new Date().toLocaleString()",1000)
		</script></td>
        <td width="70%" align="right"><a href="/index.php/Admin/Index/index" class="a1">首页</a> ┊ 
        <?php if($_SESSION['sysset']== 1): ?><a  onmouseover=showmenu(event,sysmenu) onmouseout=delayhidemenu()  style="CURSOR:hand"  class="a1">系统设置</a> ┊<?php endif; if($_SESSION['readerset']== 1): ?><a  onmouseover=showmenu(event,readermenu) onmouseout=delayhidemenu()  style="CURSOR:hand" class="a1">读者管理</a> ┊<?php endif; if($_SESSION['bookset']== 1): ?><a href="/index.php/Admin/Book/index" class="a1">图书档案管理</a> ┊<?php endif; if($_SESSION['borrowback']== 1): ?><a  onmouseover=showmenu(event,borrowmenu) onmouseout=delayhidemenu() style="CURSOR:hand"class="a1" >图书借还</a> ┊<?php endif; if($_SESSION['sysquery']== 1): ?><a  onmouseover=showmenu(event,querymenu) onmouseout=delayhidemenu()  style="CURSOR:hand" class="a1">系统查询</a> ┊<?php endif; ?><a  href="/index.php/Admin/Manage/pwdModify" class="a1">更改口令</a> ┊ <a href="/index.php/Admin/Public/logout" class="a1">注销</a></td>
        <td width="2%">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>

	</td>
	</tr>
	<td>
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><table width="99%" height="510"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tableBorder_gray">
  <tr>
    <td height="510" valign="top" style="padding:5px;"><table width="98%" height="487"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="22" valign="top" class="word_orange">当前位置：读者管理 &gt; 读者档案管理 &gt; 修改读者信息 &gt;&gt;&gt;</td>
      </tr>
      <tr>
        <td align="center" valign="top"><table width="100%" height="493"  border="0" cellpadding="0" cellspacing="0">
  <tr>

    <td align="center" valign="top">	<form name="form1" method="post" action="reader_modifyok.php">
      <table width="600" height="432"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="173" align="center">姓名：</td>
          <td width="427" height="39">
            <input name="name" type="text" value="<?php echo ($info['name']); ?>">
        * 
        <input name="id" type="hidden" id="readerid" value="<?php echo ($info['id']); ?>"></td>
        </tr>
        <tr>
          <td width="173" align="center">性别：</td>
          <td height="35">
		  <input name="sex" type="radio" class="noborder" id="radiobutton"  value="男" <?php if($info['sex'] == '男'): ?>checked<?php endif; ?>>男
          <input name="sex" type="radio" class="noborder" value="女" <?php if($info['sex'] == '女'): ?>checked<?php endif; ?>>女
		</td>
        </tr>
        <tr>
          <td align="center">条形码：</td>
          <td><input name="barcode" type="text" id="barcode" value="<?php echo ($info['barcode']); ?>">
        </td>
        </tr>
        <tr>
          <td align="center">读者类型：</td>
          <td>
            <select name="typeid" class="wenbenkuang" id="typeid">
			<?php if(is_array($typeinfo)): $i = 0; $__LIST__ = $typeinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$valtypeinfo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($valtypeinfo['id']); ?>" <?php if($info['typeid'] == $valtypeinfo['id']): ?>selected<?php endif; ?>><?php echo ($valtypeinfo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
          </td>
        </tr>
        <tr>
          <td align="center">职业：</td>
          <td><input name="vocation" type="text" id="vocation" value="<?php echo ($info['vocation']); ?>"></td>
        </tr>
        <tr>
          <td align="center">出生日期：</td>
          <td><input name="birthday" type="text" id="birthday" value="<?php echo ($info['birthday']); ?>"></td>
        </tr>
        <tr>
          <td align="center">有效证件：</td>
          <td>
		<select name="paperType" class="wenbenkuang" id="paperType">
             <option value="身份证" <?php if($info['papertype'] == '身份证'): ?>selected<?php endif; ?>>身份证</option>
              <option value="学生证" <?php if($info['papertype'] == '学生证'): ?>selected<?php endif; ?>>学生证</option>
              <option value="军官证" <?php if($info['papertype'] == '军官证'): ?>selected<?php endif; ?>>军官证</option>
              <option value="工作证" <?php if($info['papertype'] == '工作证'): ?>selected<?php endif; ?>>工作证</option>
         </select></td>
        </tr>
        <tr>
          <td align="center">证件号码：</td>
          <td><input name="paperNO" type="text" id="paperNO" value="<?php echo ($info['paperno']); ?>">
        * </td>
        </tr>
        <tr>
          <td align="center">电话：</td>
          <td><input name="tel" type="text" id="tel" value="<?php echo ($info['tel']); ?>"></td>
        </tr>
        <tr>
          <td align="center">E-mail：</td>
          <td><input name="email" type="text" id="email" value="<?php echo ($info['email']); ?>" size="50">
                        </td>
        </tr>
        <tr>
          <td align="center">备注：</td>
          <td><textarea name="remark" cols="50" rows="5" class="wenbenkuang" id="remark"><?php echo ($info['remark']); ?></textarea></td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
          <td><input name="Submit" type="submit" class="btn_grey" value="保存" onClick="return check(form1)">
&nbsp;
        <input name="Submit2" type="button" class="btn_grey" value="返回" onClick="history.back()"></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table></td>
      </tr>
    </table>
</td>
  </tr>
</table><table width="776" height="70"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="2" colspan="4"></td>
  </tr>
      <tr>
        <td height="5" colspan="3" background="/BookManagement/Public/Admin/image/line.gif"></td>
      </tr>
      <tr>
        <td width="124">&nbsp;</td>
        <td height="20" align="center">CopyRight &copy; 2007 www.mrbccd.com&nbsp; 吉林***师范大学图书馆</td>
        <td width="141">&nbsp;</td>
      </tr>
      <tr>
        <td height="20"></td>
        <td height="20" align="center">本站请使用IE 6.0或以上版本 1024*768为最佳显示效果</td>
        <td height="20"></td>
      </tr>
    </table>
</td>
  </tr>
</table>
</td>
  </tr>
</table>
</body>
</html>