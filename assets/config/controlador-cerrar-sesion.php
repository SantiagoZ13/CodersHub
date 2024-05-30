<?php
session_start();
session_destroy();
header("location: /codershub/login.php");