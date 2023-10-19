<?php

//Logout
session_start();
session_destroy();
header("Location: https://portal.ubm.br/FrameHTML/web/app/edu/PortalEducacional/#/");
exit();
