<?php

require_once(__DIR__ . '/../externallib.php');

class local_courses_external_testcase extends advanced_testcase
{
    public function test_get_courses()
    {
        // Create some test data
        $course1 = $this->getDataGenerator()->create_course();
        $course2 = $this->getDataGenerator()->create_course();
        $course3 = $this->getDataGenerator()->create_course();

        // Call the method being tested
        $result = local_courses_external::get_courses();

        // Assert the expected output
        $this->assertEquals(3, $result['total']);
        $this->assertEquals(1, $result['page']);
        $this->assertEquals(10, $result['per_page']);
        $this->assertEquals(1, $result['total_pages']);

        $this->assertCount(3, $result['data']);

        $this->assertEquals($course1->id, $result['data'][0]['id']);
        $this->assertEquals($course1->fullname, $result['data'][0]['fullname']);
        $this->assertEquals($course1->shortname, $result['data'][0]['shortname']);
        $this->assertEquals($course1->summary, $result['data'][0]['summary']);
        $this->assertEquals($course1->startdate, $result['data'][0]['startdate']);
        $this->assertEquals($course1->enddate, $result['data'][0]['enddate']);
        $this->assertEquals($course1->category, $result['data'][0]['category']);

        $this->assertEquals($course2->id, $result['data'][1]['id']);
        $this->assertEquals($course2->fullname, $result['data'][1]['fullname']);
        $this->assertEquals($course2->shortname, $result['data'][1]['shortname']);
        $this->assertEquals($course2->summary, $result['data'][1]['summary']);
        $this->assertEquals($course2->startdate, $result['data'][1]['startdate']);
        $this->assertEquals($course2->enddate, $result['data'][1]['enddate']);
        $this->assertEquals($course2->category, $result['data'][1]['category']);

        $this->assertEquals($course3->id, $result['data'][2]['id']);
        $this->assertEquals($course3->fullname, $result['data'][2]['fullname']);
        $this->assertEquals($course3->shortname, $result['data'][2]['shortname']);
        $this->assertEquals($course3->summary, $result['data'][2]['summary']);
        $this->assertEquals($course3->startdate, $result['data'][2]['startdate']);
        $this->assertEquals($course3->enddate, $result['data'][2]['enddate']);
        $this->assertEquals($course3->category, $result['data'][2]['category']);
    }
}