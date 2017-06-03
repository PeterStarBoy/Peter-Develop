<?php if (!defined('THINK_PATH')) exit();?><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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

<html>
<head>
<title>图书馆管理系统</title>
<link href="/BookManagement/Public/Admin/css/style.css" rel="stylesheet">
</head>
<body>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" class="tableBorder">
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><table width="99%" height="510"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tableBorder_gray">
  <tr>
    <td height="510" valign="top" style="padding:5px;"><table width="98%" height="487"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="22" valign="top" class="word_orange">当前位置：系统设置 &gt; 书架设置 &gt;&gt;&gt;</td>
      </tr>
      <tr>
        <td align="center" valign="top">
	<?php if(empty($case)): ?><table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="36" align="center">暂无书架信息！</td>
            </tr>
          </table>
          <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <a href="#" onClick="window.open('bookcase_add.jsp','','width=292,height=175')">添加书架信息</a> </td>
  </tr>
</table>
	<?php else: ?>
 <table width="91%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="84%">&nbsp;      </td>
<td width="16%" align="right">
      <a href="#" onClick="window.open('/index.php/Admin/Bookcase/caseAdd','','width=292,height=175')">添加书架信息&nbsp;</a> </td>	  
  </tr>
</table>  
  <table width="91%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolordark="#D2E3E6" bordercolorlight="#FFFFFF">
  <tr align="center" bgcolor="#e3F4F7">
    <td width="84%">书架名称</td>
    <td width="16%">删除</td>
  </tr>
	<?php if(is_array($case)): $i = 0; $__LIST__ = $case;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$valcase): $mod = ($i % 2 );++$i;?><tr align = 'center'>
    <td style="padding:5px;"><?php echo ($valcase['name']); ?></td>
    <td align="center"><a href="/index.php/Admin/Bookcase/caseDel/id/<?php echo ($valcase['id']); ?>">删除</a></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
	<tr><td colspan = 2>&nbsp;</td></tr>
	<tr align = 'center'><td colspan = 2><?php echo ($show); ?></td></tr>
</table></td>
      </tr>
    </table>
</td>
  </tr>
</table>
<table width="776" height="70"  border="0" align="center" cellpadding="0" cellspacing="0">
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
</body>
</html>