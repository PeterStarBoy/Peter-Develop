<?php
/*
	---------------------pritice project PETER_PLAYER-------------------
	working steps:
	(1). recognize the clients' needs.
	(2). convert it to actually coding needs.
	*we assume the html source is ready, we can go direct to programming.
	(3). create project folder, copy the ThinkPHP main files, change the virtual host, and get connect with it.
	(4). establish the project's construction, HOME & ADMIN folder, PUBLIC folder and put css/js/images source into it.
	--------------------THEN WE GET STARTED-----------------------
	(1). the first module is LOGINING MODULE.
	conditon check: 
	TABLE: mp_video_user
	CONTROLLER: Public
	ACTION: checkLogin, logout, index, etc.
	TEMPLET: index.html, login.html, top.html
	LOGICAL TREE:
	a. user action, commit username & password;  
	b. where there is a data commiting, there is a data check. //data type/sql attack/XXS script attack
	c. controller get the data and maybe need to trim it to get off blankspace.
	d. verify username, then password, using logic split.
	e. if verifying successful, store the id & name in session.
	f. if not, use ajax to feedback info.
	(2). the second module is HOTPLAY MODULE.
	conditoin check:
	TABLE: mp_video, mp_video_type
	CONTROLLER: Hotplay
	ACTION: hotplay, download, play
	TEMPLET: hotplay.html
	LOGICAL TREE:
	(hotplay):
	a. select all the verified video join video type order by video_play desc and limit the data to avoid too many videoes.
	b. create page split function.
	c. aasign all the data to templet.
	(download):
	a. get the video id from the url
	b. get the video address via id and check if the target video is qualified, if not, return.
	c. check the target file if exists and not empty, then make download header setting.
	d. outputing buffer stream.