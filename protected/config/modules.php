<?php
# Override module configuration
return array(
    'modules' => array(
       'gii'=>array(
             'class'=>'system.gii.GiiModule',
             'password'=>'1234',
			 'generatorPaths'=>array(
				'bootstrap.gii',
        	 ),
             'ipFilters'=>array('*.*.*.*')
          )
    )
);
?>
