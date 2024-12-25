<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_requires_a_title() {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('tasks.store'), []);

        $response->assertSessionHasErrors(['title']);
    }

    public function test_task_title_must_be_at_least_3_characters() {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('tasks.store'), [
            'title' => 'ab',
            'description' => 'Valid description',
        ]);

        $response->assertSessionHasErrors(['title']);
    }

    public function test_can_create_a_task(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/tasks', [
            'title' => 'My first task',
            'description' => 'This is a test task',
        ]);

        $response->assertRedirect('/tasks');
        $this->assertDatabaseHas('tasks', ['title' => 'My first task']);
    }

    public function test_a_user_can_update_their_task() {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        $response = $this->put(route('tasks.update', $task->id), [
            'title' => 'Updated Task Title',
            'description' => 'Updated Task Description',
            'status' =>  $task->status,
        ]);

        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'title' => 'Updated Task Title',
            'description' => 'Updated Task Description',
            'status' => $task->status,
        ]);
    }

    public function test_a_user_can_delete_their_task() {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        $response = $this->delete(route('tasks.destroy', $task->id));

        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    public function test_a_user_cannot_update_someone_elses_task() {
        $user = User::factory()->create();
        $anotherUser = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $anotherUser->id]);

        $this->actingAs($user);

        $response = $this->put(route('tasks.update', $task->id), [
            'title' => 'Unauthorized Update',
        ]);

        $response->assertStatus(403); // Forbidden
        $this->assertDatabaseMissing('tasks', ['title' => 'Unauthorized Update']);
    }

    public function test_a_user_cannot_delete_someone_elses_task() {
        $user = User::factory()->create();
        $anotherUser = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $anotherUser->id]);

        $this->actingAs($user);

        $response = $this->delete(route('tasks.destroy', $task->id));

        $response->assertStatus(403); // Forbidden
        $this->assertDatabaseHas('tasks', ['id' => $task->id]);
    }
}
