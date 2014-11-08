<?php

return array(
	 'multi' => array(
        'employee' => array(
            'driver' => 'eloquent',
            'model' => 'Employee',
            'table' => 'employees'
        ),
        'customer' => array(
            'driver' => 'database',
            'model' => 'Customer',
            'table' => 'customers'
        )
    ),

	'reminder' => array(

		'email' => 'emails.auth.reminder',

		'table' => 'password_reminders',

		'expire' => 60,

	),

);
