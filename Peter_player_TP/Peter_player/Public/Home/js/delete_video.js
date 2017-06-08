function delete_video(x){
if(window.confirm('您确定要删除该视频吗！')==true){
	window.location.href='delete_video.php?video_id='+x;
}

}
function cancel_subscibe(x,x2){
 if(window.confirm('您确定要取消该订阅吗！')==true){
	window.location.href='cancel_subscibe_ok.php?video_user='+x+'&name='+x2;
}

}

