<?php

require_once(__DIR__ . '/../../config.php');
require_once($CFG->libdir . '/externallib.php');
require_once($CFG->dirroot . '/user/lib.php');
require_once($CFG->dirroot . '/course/lib.php');

class local_courses_external extends external_api
{

    public static function get_courses_parameters()
    {
        return new external_function_parameters(
            array(
                'page' => new external_value(PARAM_INT, 'Número de página', false, 1),
                'per_page' => new external_value(PARAM_INT, 'Cursos por página', false, 10)
            )
        );
    }

    public static function get_courses($page = 1, $per_page = 10)
    {
        global $DB, $CFG;
        require_once($CFG->dirroot . '/course/lib.php');
        require_once($CFG->libdir . '/filelib.php');

        $offset = ($page - 1) * $per_page;


        $courses = $DB->get_records('course', null, '', '*', $offset, $per_page);

        if (empty($courses)) {
            throw new moodle_exception('no_courses', 'local_courses');
        }

        $total_courses = $DB->count_records('course');

        $result = array(
            'total' => $total_courses,
            'page' => $page,
            'per_page' => $per_page,
            'total_pages' => ceil($total_courses / $per_page),
            'data' => array()
        );

        foreach ($courses as $course) {
            $result['data'][] = array(
                'id' => $course->id,
                'fullname' => $course->fullname,
                'shortname' => $course->shortname,
                'summary' => $course->summary,
                'startdate' => $course->startdate,
                'enddate' => $course->enddate,
                'category' => $course->category
            );
        }

        return $result;
    }


    public static function get_courses_returns()
    {
        return new external_single_structure(
            array(
                'total' => new external_value(PARAM_INT, 'Total de cursos'),
                'page' => new external_value(PARAM_INT, 'Número de página actual'),
                'per_page' => new external_value(PARAM_INT, 'Cursos por página'),
                'total_pages' => new external_value(PARAM_INT, 'Total de páginas disponibles'),
                'data' => new external_multiple_structure(
                    new external_single_structure(
                        array(
                            'id' => new external_value(PARAM_INT, 'Id del curso'),
                            'fullname' => new external_value(PARAM_TEXT, 'Nombre completo del curso'),
                            'shortname' => new external_value(PARAM_TEXT, 'Nombre corto del curso'),
                            'summary' => new external_value(PARAM_TEXT, 'Resumen del curso'),
                            'startdate' => new external_value(PARAM_TEXT, 'Fecha de inicio del curso'),
                            'enddate' => new external_value(PARAM_TEXT, 'Fecha de fin del curso'),
                            'category' => new external_value(PARAM_TEXT, 'Categoría del curso'),
                        )
                    )
                )
            )
        );
    }
}
