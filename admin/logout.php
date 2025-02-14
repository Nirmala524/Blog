<?php
session_start();
session_unset();
session_destroy();

header('location:http://localhost/Nirmala_php/blog/admin/index.php');

