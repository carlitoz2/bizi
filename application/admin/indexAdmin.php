<?php

require('lib/bdd.lib.php');

connexion();


include('adminLayout.phtml');

require('indexView.php');
$view = 'tpl/indexAdminView.phtml';


