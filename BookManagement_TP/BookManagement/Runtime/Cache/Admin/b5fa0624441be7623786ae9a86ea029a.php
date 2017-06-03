<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="/BookManagement/Public/Admin/css/style.css" rel="stylesheet">
<style type="text/css">
<!--
.style1 {color: #FF6600}
-->
</style>
</head>
<script language="javascript">
function check(form){
	if(form.barcode.value==""){
		alert("请输入条形码!");form.barcode.focus();return false;
	}
	if(form.bookName.value==""){
		alert("请输入图书姓名!");form.bookName.focus();return false;
	}
	if(form.price.value==""){
		alert("请输入图书定价!");form.price.focus();return false;
	}
form.submit();
}
</script>
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
    <td valign="top" bgcolor="#FFFFFF"><table width="99%" height="475"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tableBorder_gray">
  <tr>
    <td height="473" align="center" valign="top" style="padding:5px;"><table width="98%" height="463"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="22" valign="top" class="word_orange">当前位置：图书档案管理 &gt; 修改图书信息 &gt;&gt;&gt;</td>
      </tr>
      <tr>
        <td height="441" align="center" valign="top"><table width="100%" height="421"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="421" align="center" valign="top">
	<form name="form1" method="post" action="book_modify_ok.php">
    <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
    <table width="600" height="397"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td width="173" align="center">条&nbsp;形&nbsp;码：</td>
        <td width="427" height="33">
          <input name="barcode" type="text" id="barcode" value="<?php echo ($data["barcode"]); ?>"></td>
      </tr>
      <tr>
        <td align="center">图书名称：</td>
        <td height="35"><input name="bookname" type="text" id="bookName" value="<?php echo ($data["bookname"]); ?>" size="50">
          <span class="style1">*</span></td>
      </tr>
      <tr>
        <td height="35" align="center">图书类型：</td>
        <td>
		<select name="typeid" class="wenbenkuang" id="typeId">
		<?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$valtype): $mod = ($i % 2 );++$i;?><option value="<?php echo ($valtype["id"]); ?>" <?php if($data['typeid'] == $valtype['id']): ?>selected<?php endif; ?>><?php echo ($valtype["typename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>		</td>
      </tr>
      <tr>
        <td align="center">作&nbsp;&nbsp;者：</td>
        <td><input name="author" type="text" id="author" value="<?php echo ($data["author"]); ?>" size="40"></td>
      </tr>
      <tr>
        <td height="36" align="center">译&nbsp;&nbsp;者：</td>
        <td><input name="translator" type="text" id="translator" value="<?php echo ($data["translator"]); ?>" size="40"></td>
      </tr>
      <tr>
        <td height="34" align="center">出&nbsp;版&nbsp;社：</td>
        <td>
		<select name="ISBN" class="wenbenkuang">
		<?php if(is_array($pub)): $i = 0; $__LIST__ = $pub;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$valpub): $mod = ($i % 2 );++$i;?><option value="<?php echo ($valpub["isbn"]); ?>" <?php if($data['isbn'] == $valpub['isbn']): ?>selected<?php endif; ?>><?php echo ($valpub["pubname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select>		</td>
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
        <td height="34" align="center">书&nbsp;&nbsp;架：</td>
        <td><select name="bookcase" class="wenbenkuang" id="bookcaseid">
		<?php if(is_array($case)): $i = 0; $__LIST__ = $case;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$valcase): $mod = ($i % 2 );++$i;?><option value="<?php echo ($valcase["id"]); ?>" <?php if( $data['bookcase'] == $valcase['id'] ): ?>selected<?php endif; ?>><?php echo ($valcase["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
          <input name="operator" type="hidden" id="operator" value=""></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input name="Submit" type="submit" class="btn_grey" value="保存" onClick="return check(form1)">&nbsp;
			<input name="Submit2" type="button" class="btn_grey" value="返回" onClick="history.back();"></td>
        </tr>
    </table>
	</form>	</td>
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