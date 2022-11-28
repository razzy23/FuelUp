<?php

session_start();

session_destroy();

header("Location: IndexD.php");
exit;