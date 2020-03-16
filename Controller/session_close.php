<?php
session_start();
unset($_SESSION['conductor']);
session_destroy();
header("Location: ../index.html");