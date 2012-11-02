<?php
return array(
	'controllers' => array(
	    'invokables' => array(
	        'Restful\Controller\Restful' => 'Restful\Controller\RestfulController',
	        'Restful\Controller\Client'  => 'Restful\Controller\ClientController',
	    ),
	),
	'router' => array(
		'routes' => array(
			'Restful' => array(
				'type'    => 'Literal',
				'options' => array(
					// Change this to something specific to your module
					'route'    => '/restful',
					'defaults' => array(
						// Change this value to reflect the namespace in which
						// the controllers for your module are found
						'__NAMESPACE__' => 'Restful\Controller',
						'controller'    => 'Restful',
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'client' => array(
						'type'    => 'Segment',
						'options' => array(
							'route'    => '/client[/:action]',
							'constraints' => array(
								'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
							),
							'defaults' => array(
								'controller' => 'Client',
								'action'     => 'index'
							),
						),
					),
				),
			),
		),
	),
);
