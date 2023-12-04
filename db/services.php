<?php

defined('MOODLE_INTERNAL') || die();
$functions = array(
    'local_courses_get_courses' => array(
        'classname' => 'local_courses_external',
        'methodname' => 'get_courses',
        'classpath' => 'local/courses_services/externallib.php',
        'description' => 'Obtener cursos con paginación.',
        'type' => 'read',
        'ajax' => true,
    ),
);

$services = array(
    'courses Service' => array(
        'functions' => array('local_courses_get_courses'),
        'restrictedusers' => 0,
        'enabled' => 1,
        'shortname' => 'courses_web_service'
    )
);