<?php
require '../model/Commentary.php';

Commentary::unvalidateAll();
header('Location: ../pages/painel.php');
