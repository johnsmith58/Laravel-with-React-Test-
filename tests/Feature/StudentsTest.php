<?php

namespace Tests\Feature;

use App\User;
use App\Student;
use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Event::fake();

    }

    /** @test */
    public function only_logged_in_users_can_see_students_list()
    {
        $response = $this->get('/students')->assertRedirect('/login');
    }
    /** @test */
    public function authenticated_users_can_see_the_students_list()
    {
        $this->actingUser();

        $response = $this->get('/students')->assertOk();

    }
    /** @test */
    public function a_user_can_be_added_through_the_form(){

        //show error message
        // $this->withoutExceptionHandling();
        
        $this->actingUser();

        $response = $this->post('/students', $this->data());

        $this->assertCount(1, Student::all());
    }

    public function a_name_is_required()
    {
        
        $this->actingUser();

        $response = $this->post('/students', array_merge($this->data(), ['name' => '']));

        $response->assertSessionHasErrors('name');

        $this->assertCount(0, Student::all());

    }

    public function a_name_is_at_least_3_characters()
    {

        $this->actingUser();

        $response = $this->post('/students', array_merge($this->data(), ['name' => 'a']));

        $response->assertSessionHasErrors('name');

        $this->assertCount(0, Student::all());

    }

    private function actingUser(){
        $this->actingAs(factory(User::class)->create());
    }

    private function data(){
        return [
            'name' => 'TestUser',
            'email' => 'testUser@gmail.com'
        ];
    }
}
