<?php
require '../model/Commentary.php';

Commentary::validateAll();
header('Location: ../pages/painel.php');
