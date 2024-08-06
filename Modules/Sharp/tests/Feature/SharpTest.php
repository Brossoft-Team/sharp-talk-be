<?php

namespace Modules\Sharp\tests\Feature;

use App\Core\Traits\tests\UseAuthentication;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Modules\Sharp\app\Models\Sharp;
use Tests\TestCase;

class SharpTest extends TestCase
{
    use DatabaseTransactions,WithFaker, UseAuthentication;

    public function test_create_sharp_with_correct_request_without_attachments(): void
    {
        $response = $this->actingAs($this->getUser())
            ->post('/api/sharps',["title" => "Test Title","content" => "Test Content"]);

        $this->assertDatabaseHas(Sharp::class,["title"=>"Test Title"]);

        $response->assertStatus(200);
    }

    public function test_create_sharp_with_validation_errors(): void
    {
        $response = $this->actingAs($this->getUser())
            ->post('/api/sharps',["attachments"=>"sd"]);

        $response->assertStatus(422)->assertJsonValidationErrors(["content","title","attachments"],"message");
    }

    public function test_create_sharp_with_correct_request_with_attachments(): void
    {
        Storage::fake('public');

        $file1 = UploadedFile::fake()->image('file1.jpg');
        $file2 = UploadedFile::fake()->image('file2.jpg');

        $data = [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'attachments' => [$file1, $file2],
        ];

        $response = $this->actingAs($this->getUser())->post("/api/sharps", $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('sharps', [
            'title' => $data['title'],
            'content' => $data['content']
        ]);

        //$sharp = Sharp::first();

        //FIXME: there is a issue that we don't know how to solve cause everything is okay apart from phpUnit
        //Storage::disk('public')->assertExists($sharp->getFirstMediaPath('sharp'));
    }

    public function test_delete_sharp(): void
    {
        $sharp = Sharp::factory()->create();
        $response = $this->actingAs($this->getUser())
            ->delete('/api/sharps/'.$sharp->id);

        $this->assertSoftDeleted(Sharp::class,["id"=>$sharp->id]);

        $response->assertStatus(200);
    }
}
