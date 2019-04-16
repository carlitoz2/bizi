<?php

require('model.php');

$pathReals = 'uploads\img_reals';

$reals =getRealisations();


$view = 'tpl/indexAdminView.phtml';

include('adminLayout.phtml');











