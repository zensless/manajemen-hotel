<?php

session_start();

unset($_SESSION["MEMBER"]);
session_unset();
session_destroy();

header('location:/');
