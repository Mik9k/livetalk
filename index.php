<?php

include 'config/config.php';

require_once 'libs/database.php';
require_once 'libs/controller.php';
require_once 'libs/model.php';
require_once 'libs/view.php';
require_once 'libs/app.php';

include 'helpers/session.php';
include 'helpers/imageHandler.php';

require_once 'models/usermodel.php';

App::Initialize();

?>