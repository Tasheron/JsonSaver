<?php
 
namespace Tests\Feature;

use App\Models\JsonObject;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
 
class DeleteTest extends TestCase
{
    use RefreshDatabase;

    public function test_store(): void
    {
        $jsonObject = new JsonObject([
            'value' => '{"test":"bar"}',
            'author_id' => 0,
        ]);
        $jsonObject->save();

        $this->post("http://localhost/api/json/delete/$jsonObject->id");

        $jsonObject = JsonObject::first();

        $this->assertNull($jsonObject);
    }
}