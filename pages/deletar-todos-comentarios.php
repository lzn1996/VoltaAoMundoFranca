<?php
require '../model/Commentary.php';

Commentary::deleteAll();
header('Location: ../pages/painel.php');
