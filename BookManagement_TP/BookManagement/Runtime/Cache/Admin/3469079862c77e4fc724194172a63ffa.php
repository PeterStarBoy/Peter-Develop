<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>图书馆管理系统</title>
<link href="/BookManagement/Public/Admin/css/style.css" rel="stylesheet">
</head>
<body>
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
        <td align="center" valign="top">
	      <table width="723" height="37" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td background="/BookManagement/Public/Admin/image/dangan.gif">&nbsp;</td>
            </tr>
          </table>
	      <form  name="form1" method="post" action="">
	        <table width="98%" height="38"  border="1" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#9ECFEE" class="tableBorder_gray">
  <tr>
    <td align="center">
&nbsp;<img src="/BookManagement/Public/Admin/image/search.gif" width="37" height="29"></td>
    <td>&nbsp;&nbsp;请选择查询依据：
      <select name="field" class="wenbenkuang" id="f">
        <option value="barcode">条形码</option>
        <option value="typename">类别</option>
        <option value="bookname" selected>书名</option>
        <option value="author">作者</option>
        <option value="pubname">出版社</option>
        <option value="name">书架</option>
                  </select>
      <input name="value" type="text" id="key1" size="50">
      <input name="Submit" type="submit" class="btn_grey" value="查询"></td>
  </tr>
</table>
</form>
<?php if(empty($book)): ?><table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="36" align="center">暂无图书信息！</td>
            </tr>
          </table>
<?php else: ?>
  <table width="98%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolordark="#D2E3E6" bordercolorlight="#FFFFFF">
  <tr align="center" bgcolor="#D0E9F8">
    <td width="13%">条形码</td>  
    <td width="26%">图书名称</td>
    <td width="15%">图书类型</td>
    <td width="14%">出版社</td>
    <td width="12%">书架</td>
  </tr>
	<?php if(is_array($book)): $i = 0; $__LIST__ = $book;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$valbook): $mod = ($i % 2 );++$i;?><tr>
    <td style="padding:5px;">&nbsp;<?php echo ($valbook['barcode']); ?></td>  
    <td style="padding:5px;"><a href="book_look.php?id=<?php echo $result[id]; ?>"><?php echo ($valbook['bookname']); ?></a></td>
    <td style="padding:5px;">&nbsp;<?php echo ($valbook['typename']); ?></td>  
    <td style="padding:5px;">&nbsp;<?php echo ($valbook['pubname']); ?></td>  
    <td style="padding:5px;">&nbsp;<?php echo ($valbook['name']); ?></td>  
    </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
<tr align = 'center'><td colspan = 5>&nbsp;</td></tr>
<tr align = 'center'><td colspan = 5><?php echo ($show); ?></td></tr>
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