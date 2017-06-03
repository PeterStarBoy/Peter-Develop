<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>图书馆管理系统</title>
<link href="/BookManagement/Public/Admin/css/style.css" rel="stylesheet">
</head>
<body>
<script language="javascript">
function history_back(){
window.location.href="/index.php/Admin/Book/index";
}
</script>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" class="tableBorder">
  <tr>
    <td>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
    <td height="510" align="center" valign="top" style="padding:5px;"><table width="98%" height="487"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="22" valign="top" class="word_orange">当前位置：图书档案管理 &gt; 图书详细信息 &gt;&gt;&gt;</td>
      </tr>
      <tr>
        <td align="center" valign="top"><table width="100%" height="493"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top">

	<table width="600" height="432"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td width="173" align="center">条&nbsp;形&nbsp;码：</td>
        <td width="427" height="39">
          <input name="barcode" type="text" id="barcode" value="<?php echo ($data["barcode"]); ?>"></td>
      </tr>
      <tr>
        <td align="center">图书名称：</td>
        <td height="39"><input name="bookName" type="text" id="bookName" value="<?php echo ($data["bookname"]); ?>" size="50"> 
        * </td>
      </tr>
      <tr>
        <td align="center">图书类型：</td>
        <td>
		<input type="text" value="<?php echo ($data["typename"]); ?>">
         </td>
      </tr>
      <tr>
        <td align="center">作&nbsp;&nbsp;者：</td>
        <td><input name="author" type="text" id="author" value="<?php echo ($data["author"]); ?>" size="40"></td>
      </tr>
      <tr>
        <td align="center">译&nbsp;&nbsp;者：</td>
        <td><input name="translator" type="text" id="translator" value="<?php echo ($data["translator"]); ?>" size="40"></td>
      </tr>
      <tr>
        <td align="center">出&nbsp;版&nbsp;社：</td>
        <td>
		<input name="isbn" type="text" class="wenbenkuang" value="<?php echo ($data["pubname"]); ?>">
        </td>
      </tr>
      <tr>
        <td align="center">价&nbsp;&nbsp;格：</td>
        <td><input name="price" type="text" id="price" value="<?php echo ($data["price"]); ?>">
        (元)</td>
      </tr>
      <tr>
        <td align="center">页&nbsp;&nbsp;码：</td>
        <td><input name="page" type="text" id="page" value="<?php echo ($data["page"]); ?>"></td>
      </tr>
      <tr>
        <td align="center">书&nbsp;&nbsp;架：</td>
        <td><input name="bookcaseid" class="wenbenkuang" value="<?php echo ($data["name"]); ?>">
      </tr>
      <tr>
        <td colspan="2" align="center">
			  <input name="Submit2" type="button" class="btn_grey" value="返回" onClick="history_back();"></td>
        </tr>
    </table>
	</td>
  </tr>
</table></td>
      </tr>
    </table></td>
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