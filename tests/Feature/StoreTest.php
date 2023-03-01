<?php
 
namespace Tests\Feature;

use App\Models\JsonObject;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
 
class StoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_store(): void
    {
        $user = new User([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => Hash::make('test'),
        ]);
        $user->api_token = '$2y$10$Rmy5Ptn7UlpRg6rnyoSu1./F0XnSzlSFqRmFzAvD.sS2xgyE4nRpq';
        $user->expired_at = strtotime('+ 5 mins');
        $user->save();

        $this->post('http://localhost/api/form/store/submit', [
            'data' => '{"test":"json"}',
            'api_token' => '$2y$10$Rmy5Ptn7UlpRg6rnyoSu1./F0XnSzlSFqRmFzAvD.sS2xgyE4nRpq',
        ]);

        $jsonObject = JsonObject::first();

        $this->assertEquals('{"test":"json"}', $jsonObject?->value);
    }
}