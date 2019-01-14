<?php

BeforeInit();	//Plugin hook
Init();
AfterInit();	//Plugin hook

//Initializes the site.
function Init(){
	global $dictionary, $config, $adminLog, $users, $jams, $games, $assets, $loggedInUser, $satisfaction;

	AddActionLog("Init");
	StartTimer("Init");

	$config = LoadConfig();

    RedirectToHttpsIfRequired($config);

	$adminLog = LoadAdminLog();
	$users = LoadUsers();

	IsLoggedIn();	//Sets $loggedInUser

	$jams =  LoadJams();
	$games = LoadGames();

	LoadThemes();
	CheckNextJamSchedule();
	$assets = LoadAssets();
	LoadPolls();
    $satisfaction = LoadSatisfaction($config);
    LoadAdminVotes();
	LoadLoggedInUsersAdminVotes();
	InitStream();
	GetNextJamDateAndTime();

	$dictionary["CONFIG"] = RenderConfig($config);
	$dictionary["adminlog"] = RenderAdminLog($adminLog);
	$dictionary["users"] = RenderUsers($users, $games, $jams, $config);
	$dictionary["jams"] = RenderJams($jams, $config, $games, $users, $satisfaction, $loggedInUser);
	$dictionary["entries"] = RenderGames($games, $jams, $users);


	$dictionary["assets"] = RenderAssets($assets);

	StopTimer("Init");
}

?>