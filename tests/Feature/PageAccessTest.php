<?php

use App\Models\Post;

use function Pest\Laravel\get;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('Перехід на головну сторінку', function () {
    $response = get(route('main'));

    $response->assertStatus(200)
        ->assertSee('Продаж та покупка');
});

test('Перехід на сторінку статей', function () {
    $response = get(route('post.list'));

    $response->assertStatus(200)
        ->assertSee('Статті та новини');
});

test('Перехід на сторінку відображення статті', function () {
    $post = Post::factory()->create(['is_published' => true]);

    $response = get(route('post.show', $post->slug));

    $response->assertStatus(200)
        ->assertSee($post->name)
        ->assertSee($post->body);
});

test('Перехід на сторінку контактів', function () {
    $response = get(route('contacts'));

    $response->assertStatus(200)
        ->assertSee('Контакти')
        ->assertSee('Зв`язок з нами');
});
