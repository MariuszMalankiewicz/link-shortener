<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Link;

class LinkApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_creates_shortened_link()
    {
        $response = $this->postJson('/api/shorten', [
            'original_url' => 'https://www.example.com'
        ]);

        $response->assertStatus(201)
                 ->assertJsonStructure(['short_url']);
        
        $this->assertDatabaseHas('links', [
            'original_url' => 'https://www.example.com'
        ]);
    }

    public function test_redirect_returns_original_url()
    {
        $link = Link::create([
            'original_url' => 'https://www.example.com',
            'short_code' => 'abcdef'
        ]);

        $response = $this->getJson("/api/{$link->short_code}");

        $response->assertStatus(200)
                 ->assertJson([
                     'original_url' => 'https://www.example.com'
                 ]);
    }

    public function test_index_returns_list_of_links()
    {
        // Utwórz kilka przykładowych linków
        Link::factory()->create([
            'original_url' => 'https://www.example1.com',
            'short_code' => 'code1'
        ]);
        Link::factory()->create([
            'original_url' => 'https://www.example2.com',
            'short_code' => 'code2'
        ]);

        $response = $this->getJson('/api/links');

        $response->assertStatus(200)
                 ->assertJsonCount(2)
                 ->assertJsonFragment(['original_url' => 'https://www.example1.com'])
                 ->assertJsonFragment(['original_url' => 'https://www.example2.com']);
    }
}
