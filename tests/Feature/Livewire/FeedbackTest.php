<?php

use App\Models\Feedback;
use App\Notifications\FeedbackSent;
use Illuminate\Support\Facades\Notification;
use Livewire\Livewire;

use function Pest\Laravel\assertDatabaseHas;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('validates feedback fields', function ($field, $value, $expectedError) {
    Notification::fake();

    Livewire::test('feedback')
        ->set($field, $value)
        ->call('send')
        ->assertHasErrors([$field => $expectedError]);
})->with([
    ['name', 'A', 'min'],
    ['name', str_repeat('A', 50), 'max'],
    ['contact', '1234', 'min'],
    ['contact', str_repeat('1', 70), 'max'],
    ['message', '', 'required'],
    ['message', 'Too short', 'min'],
    ['message', str_repeat('A', 1600), 'max'],
]);

test('sends feedback successfully', function () {
    Notification::fake();

    $feedback = Feedback::factory()->make()->toArray();

    Livewire::test('feedback')
        ->set($feedback)
        ->call('send')
        ->assertHasNoErrors()
        ->assertSee('Лист успішно надісланий');

    assertDatabaseHas('feedbacks', $feedback);
    Notification::assertSentOnDemand(FeedbackSent::class);
});
