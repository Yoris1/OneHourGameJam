<?php
//This file is the site's entry point, called directly from the main index.php
//All other files in the /php dirrectory are included from here.

include_once("php/install_page.php");
if(!IsDatabaseConfigFilePresent()){
    die("The site database has not yet been configured. Please set it up using the <a href='install.php'>install page</a>");
}

include_once("php/helpers.php");

//Fetch plugins
include_once("plugins/plugins.php");

StartTimer("site.php");
StartTimer("site.php - Include");

//Global variable definition
session_start();

include_once("php/anti-csrf.php");
include_once("php/global.php");
include_once("php/dependencies.php");

//Database Interface
include_once("php/databaseinterfaces/UserDbInterface.php");
include_once("php/databaseinterfaces/SessionDbInterface.php");
include_once("php/databaseinterfaces/ThemeDbInterface.php");
include_once("php/databaseinterfaces/ThemeVoteDbInterface.php");
include_once("php/databaseinterfaces/ThemeIdeaDbInterface.php");
include_once("php/databaseinterfaces/SatisfactionDbInterface.php");

//Models
include_once("php/models/UserModel.php");
include_once("php/models/ThemeModel.php");
include_once("php/models/SiteActionModel.php");
include_once("php/models/SatisfactionModel.php");
include_once("php/models/PollModel.php");
include_once("php/models/MessageModel.php");
include_once("php/models/JamModel.php");
include_once("php/models/GameModel.php");
include_once("php/models/PlatformModel.php");
include_once("php/models/PlatformGameModel.php");
include_once("php/models/CookieModel.php");
include_once("php/models/ConfigModel.php");
include_once("php/models/AssetModel.php");
include_once("php/models/AdminVoteModel.php");
include_once("php/models/AdminLogModel.php");
include_once("php/models/ThemeIdeaModel.php");

//ViewModels
include_once("php/viewmodels/AdminLogViewModel.php");
include_once("php/viewmodels/UserViewModel.php");
include_once("php/viewmodels/ThemeViewModel.php");
include_once("php/viewmodels/AssetViewModel.php");
include_once("php/viewmodels/ConfigurationViewModel.php");
include_once("php/viewmodels/CookieViewModel.php");
include_once("php/viewmodels/GameViewModel.php");
include_once("php/viewmodels/JamViewModel.php");
include_once("php/viewmodels/PollViewModel.php");
include_once("php/viewmodels/StreamViewModel.php");
include_once("php/viewmodels/MessageViewModel.php");
include_once("php/viewmodels/PlatformViewModel.php");

//Presenters
include_once("php/presenters/AdminLogPresenter.php");
include_once("php/presenters/UserPresenter.php");
include_once("php/presenters/ThemePresenter.php");
include_once("php/presenters/AssetPresenter.php");
include_once("php/presenters/ConfigurationPresenter.php");
include_once("php/presenters/CookiePresenter.php");
include_once("php/presenters/GamePresenter.php");
include_once("php/presenters/JamPresenter.php");
include_once("php/presenters/PollPresenter.php");
include_once("php/presenters/StreamPresenter.php");
include_once("php/presenters/MessagePresenter.php");
include_once("php/presenters/PlatformPresenter.php");

//Controllers
include_once("php/controllers/ThemeController.php");
include_once("php/controllers/CookieController.php");
include_once("php/controllers/JamController.php");
include_once("php/controllers/StreamController.php");

//Global functions
include_once("php/sanitize.php");
include_once("php/page.php");
include_once("php/actions.php");
include_once("php/db.php");
include_once("php/authentication.php");
StopTimer("site.php - Include");

//Initialization. This is where configuration is loaded
StartTimer("site.php - Init");
include_once("php/init.php");
StopTimer("site.php - Init");

StopTimer("site.php");

?>