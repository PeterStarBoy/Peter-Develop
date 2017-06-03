<?php if (!defined('THINK_PATH')) exit(); session_start();?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="/BookManagement/Public/Admin/css/style.css" rel="stylesheet">
		<script language="javascript">
		function checkreader(form){
			if(form.barcode.value==""){
				alert("请输入读者条形码!");form.barcode.focus();return;
			}
			form.submit();
		}
		function checkbook(form){
			if(form.barcode.value==""){
				alert("请输入读者条形码!");form.barcode.focus();return;
			}		
			if(form.inputkey.value==""){
				alert("请输入查询关键字!");form.inputkey.focus();return;
			}

			if(form.number.value-form.borrowNumber.value<=0){
				form.inputkey.value = "";
				alert("您不能再借阅其他图书了!");return;
			}
        form.submit();
	   }
		</script>
</head>
<body>
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

<table width="776"  border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><table width="100%" height="509"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tableBorder_gray">
  <tr>
    <td align="left" valign="top" style="padding:5px;"> &nbsp; <span class="word_orange">&nbsp;当前位置：图书借还 &gt; 图书借阅&gt;&gt;&gt; </span>      <table width="100%"  border="0" cellpadding="0" cellspacing="0">
	<!--
	<?php
 include("conn/conn.php"); $sql=mysql_query("select r.*,t.name as typename,t.number from tb_reader r left join tb_readerType t on r.typeid=t.id where r.barcode='".$_POST[barcode]."'"); $info=mysql_fetch_array($sql); ?>
	-->
	<form name="form1" id = 'form1' method="post" action="">
        <tr>
          <td height="72" align="center" valign="top" background="/BookManagement/Public/Admin/image/main_booksort_1.gif" bgcolor="#F8BF73">
          <br>		  
          <table width="96%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#9ECFEE" class="tableBorder_grey">
          <tr>
              <td height="33" valign="top" background="/BookManagement/Public/Admin/image/bookborr.gif">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  
				
                    <tr>
                      <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="33" background="/BookManagement/Public/Admin/image/bookborr.gif">&nbsp;</td>
                        </tr>
                      </table>
                        <table width="100%" height="21" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="24%" height="18" style="padding-left:7px;padding-top:7px;"><img src="/BookManagement/Public/Admin/image/bg_line.gif" width="132" height="20"></td>
                            <td width="76%" style="padding-top:7px;">读者条形码：
                              <input name="barcode" type="text" id="barcode" size="24" value="<?php echo ($data["barcode"]); ?>">
                            &nbsp;
                              <input name="Button" id="btnone" type="button" class="btn_grey" value="确定" onClick="checkreader(form1)"></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="13" align="left" style="padding-left:7px;"><hr width="90%" size="1"></td>
                      </tr>
                    <tr>
                      <td align="center"><table width="96%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="27">姓&nbsp;&nbsp;&nbsp;&nbsp;名：
                              <input name="readername" type="text" id="readername" value="<?php echo ($data["name"]); ?>">
                              <input name="readerid" type="hidden" id="readerid" value=<?php echo ($data["id"]); ?>></td>
                            <td>性&nbsp;&nbsp;&nbsp;&nbsp;别：
                              <input name="sex" type="text" id="sex" value="<?php echo ($data['sex']); ?>"></td>
                            <td>读者类型：
                              <input name="readerType" type="text" id="readerType" value="<?php echo ($data['name']); ?>"></td>
                          </tr>
                          <tr>
                            <td height="27">证件类型：
                              <input name="paperType" type="text" id="paperType" value="<?php echo ($data['papertype']); ?>"></td>
                            <td>证件号码：
                              <input name="paperNo" type="text" id="paperNo" value="<?php echo ($data['paperno']); ?>"></td>
                            <td>可借数量：
                              <input name="number" type="text" id="number" value="<?php echo ($data['number']); ?>" size="17">
                              册
                            &nbsp;</td>
                          </tr>
                      </table></td>
                    </tr>
                </table></td>
            </tr>
                 <tr>
                   <td height="32">&nbsp;添加的依据：
                     <input name="key" type="radio" class="noborder" value="barcode" checked>
                     图书条形码 &nbsp;&nbsp;
                     <input name="key" type="radio" class="noborder" value="bookname">
  图书名称&nbsp;&nbsp;
  <input name="inputkey" type="text" id="inputkey" size="50">
                     <input name="Submit" type="button" class="btn_grey" id="Submit" onClick="checkbook(form1);" value="确定">
                     <input name="operator" type="hidden" id="operator" value="<?php echo (session('name')); ?>">
    <input name="Button2" type="button" class="btn_grey" id="Button2" onClick="window.location.href='/index.php/Admin/Borrow/bookBorrow'" value="完成借阅">                   </td>
                 </tr> 
            <tr>
              <td valign="top" bgcolor="#D2E5F1" style="padding:5px"><table width="99%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9ECFEE" bgcolor="#FFFFFF">
                     <tr align="center" bgcolor="#E2F4F6">
                       <td width="29%" height="25">图书名称</td>
                       <td width="12%">借阅时间</td>
                       <td width="14%">应还时间</td>
                       <td width="17%">出版社</td>
                       <td width="14%">书架</td>
                       <td colspan="2">定价(元)</td>
                     </tr>
<!--<?php
$readerid=$info[id]; $sql1=mysql_query("select r.*,borr.borrowTime,borr.backTime,book.bookname,book.price,pub.pubname,bc.name as bookcase from tb_borrow as borr join tb_bookinfo as book on book.id=borr.bookid join tb_publishing as pub on book.ISBN=pub.ISBN  join tb_bookcase as bc on book.bookcase=bc.id join tb_reader as r on borr.readerid=r.id  where borr.readerid='$readerid' and borr.ifback=0"); $info1=mysql_fetch_array($sql1); $borrowNumber=mysql_num_rows($sql1); do{ ?>
-->
					<?php if(is_array($book)): $i = 0; $__LIST__ = $book;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$valbook): $mod = ($i % 2 );++$i;?><tr>
                       <td height="25" style="padding:5px;">&nbsp;<?php echo ($valbook['bookname']); ?></td>
                       <td style="padding:5px;">&nbsp;<?php echo ($valbook['borrowtime']); ?></td>
                       <td style="padding:5px;">&nbsp;<?php echo ($valbook['backtime']); ?></td>
                       <td align="center">&nbsp;<?php echo ($valbook['pubname']); ?></td>
                       <td align="center">&nbsp;<?php echo ($valbook['name']); ?></td>
                       <td width="14%" align="center">&nbsp;<?php echo ($valbook['price']); ?></td>
                     </tr><?php endforeach; endif; else: echo "" ;endif; ?>
<!--
<?php  }while($info1=mysql_fetch_array($sql1)); ?>
-->
   <input name="borrowNumber" type="hidden" id="borrowNumber" value="<?php echo ($num['borrowed']); ?>">

                   </table>			</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="19" background="/BookManagement/Public/Admin/image/main_booksort_2.gif">&nbsp;</td>
        </tr>
	   </form>
	   <!--
<?php
if($_POST["inputkey"]!=""){ $f=$_POST["f"]; $inputkey=trim($_POST["inputkey"]); $barcode=$_POST["barcode"]; $readerid=$_POST["readerid"]; $borrowTime=date('Y-m-d'); $backTime=date("Y-m-d",(time()+3600*24*30)); $query=mysql_query("select * from tb_bookinfo where $f='$inputkey'"); $result=mysql_fetch_array($query); if($result==false){ echo "<script language='javascript'>alert('该图书不存在！');window.location.href='bookBorrow.php?barcode=$barcode';</script>"; } else{ $query1=mysql_query("select r.*,borr.borrowTime,borr.backTime,book.bookname,book.price,pub.pubname,bc.name as bookcase from tb_borrow as borr join tb_reader as r on borr.readerid=r.id join tb_bookinfo as book on book.id=borr.bookid join tb_publishing as pub on book.ISBN=pub.ISBN  join tb_bookcase as bc on book.bookcase=bc.id  where borr.bookid=$result[id] and borr.readerid=$readerid and ifback=0"); $result1=mysql_fetch_array($query1); if($result1==true){ echo "<script language='javascript'>alert('该图书已经借阅！');window.location.href='bookBorrow.php?barcode=$barcode';</script>"; } else{ $bookid=$result[id]; mysql_query("insert into tb_borrow(readerid,bookid,borrowTime,backTime,operator,ifback)values('$readerid','$bookid','$borrowTime','$backTime','$_SESSION[admin_name]',0)"); echo "<script language='javascript'>alert('图书借阅操作成功！');window.location.href='bookBorrow.php?barcode=$barcode';</script>"; } } } ?>
-->
    </table></td>
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