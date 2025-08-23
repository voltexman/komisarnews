<?php

use App\Filament\Resources\Posts\Pages\CreatePost;
use App\Filament\Resources\Posts\Pages\EditPost;
use App\Filament\Resources\Posts\Pages\ListPosts;
use App\Models\Post;
use App\Models\User;
// use App\Filament\Resources\Posts\Pages\ViewArticle;
use Filament\Actions\DeleteAction;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Livewire\livewire;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

beforeEach(function () {
    actingAs(User::factory()->create());
});

// it('can list articles', function () {
//     $posts = Post::factory()->count(3)->create();

//     livewire(ListPosts::class)
//         ->assertOk()
//         ->assertCanSeeTableRecords($posts);
// });

// it('can search articles by title', function () {
//     $posts = Post::factory()->count(3)->create();

//     livewire(ListPosts::class)
//         ->assertCanSeeTableRecords($posts)
//         ->searchTable($posts->first()->name)
//         ->assertCanSeeTableRecords([$posts->first()])
//         ->assertCanNotSeeTableRecords($posts->skip(1));
// });

// it('can create an article', function () {
//     $postData = Post::factory()->make();

//     livewire(CreatePost::class)
//         ->fillForm([
//             'name' => $postData->name,
//             'slug' => $postData->slug,
//             'category' => $postData->category,
//             'body' => ['html' => $postData->body],
//             'published_at' => $postData->published_at,
//         ])
//         ->call('create')
//         ->assertHasNoErrors()
//         ->assertNotified();

//     assertDatabaseHas(Post::class, [
//         'name' => $postData->name,
//         'slug' => $postData->slug,
//         'category' => $postData->category,
//         'body' => ['html' => $postData->body],
//         'published_at' => $postData->published_at,
//     ]);
// });

// it('can validate article creation form', function (array $data, array $errors) {
//     $postData = Post::factory()->make();

//     livewire(CreatePost::class)
//         ->fillForm([
//             'title' => $postData->title,
//             'content' => $postData->content,
//             ...$data,
//         ])
//         ->call('create')
//         ->assertHasFormErrors($errors)
//         ->assertNotNotified()
//         ->assertNoRedirect();
// })->with([
//     'title is required' => [['title' => null], ['title' => 'required']],
//     'title max 255' => [['title' => str_repeat('a', 256)], ['title' => 'max']],
// ]);

// it('can edit an article', function () {
//     $post = Post::factory()->create();
//     $newData = Post::factory()->make();

//     livewire(EditPost::class, ['record' => $post->id])
//         ->fillForm([
//             'title' => $newData->title,
//             'content' => $newData->content,
//         ])
//         ->call('save')
//         ->assertNotified();

//     assertDatabaseHas(Post::class, [
//         'id' => $post->id,
//         'title' => $newData->title,
//         'content' => $newData->content,
//     ]);
// });

// it('can delete an article', function () {
//     $post = Post::factory()->create();

//     livewire(EditPost::class, ['record' => $post->id])
//         ->callAction(DeleteAction::class)
//         ->assertNotified()
//         ->assertRedirect();

//     assertDatabaseMissing(Post::class, [
//         'id' => $post->id,
//     ]);
// });

// it('can view an article', function () {
//     $post = Post::factory()->create();

//     livewire(ViewPost::class, ['record' => $post->id])
//         ->assertOk()
//         ->assertSchemaStateSet([
//             'title' => $post->title,
//             'content' => $post->content,
//         ]);
// });
