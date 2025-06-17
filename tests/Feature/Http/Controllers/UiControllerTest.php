<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Ui;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\UiController
 */
final class UiControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $uis = Ui::factory()->count(3)->create();

        $response = $this->get(route('uis.index'));

        $response->assertOk();
        $response->assertViewIs('ui.index');
        $response->assertViewHas('uis');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('uis.create'));

        $response->assertOk();
        $response->assertViewIs('ui.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UiController::class,
            'store',
            \App\Http\Requests\UiStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $title = fake()->sentence(4);
        $description = fake()->text();

        $response = $this->post(route('uis.store'), [
            'title' => $title,
            'description' => $description,
        ]);

        $uis = Ui::query()
            ->where('title', $title)
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $uis);
        $ui = $uis->first();

        $response->assertRedirect(route('uis.index'));
        $response->assertSessionHas('ui.id', $ui->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $ui = Ui::factory()->create();

        $response = $this->get(route('uis.show', $ui));

        $response->assertOk();
        $response->assertViewIs('ui.show');
        $response->assertViewHas('ui');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $ui = Ui::factory()->create();

        $response = $this->get(route('uis.edit', $ui));

        $response->assertOk();
        $response->assertViewIs('ui.edit');
        $response->assertViewHas('ui');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UiController::class,
            'update',
            \App\Http\Requests\UiUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $ui = Ui::factory()->create();
        $title = fake()->sentence(4);
        $description = fake()->text();

        $response = $this->put(route('uis.update', $ui), [
            'title' => $title,
            'description' => $description,
        ]);

        $ui->refresh();

        $response->assertRedirect(route('uis.index'));
        $response->assertSessionHas('ui.id', $ui->id);

        $this->assertEquals($title, $ui->title);
        $this->assertEquals($description, $ui->description);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $ui = Ui::factory()->create();

        $response = $this->delete(route('uis.destroy', $ui));

        $response->assertRedirect(route('uis.index'));

        $this->assertSoftDeleted($ui);
    }
}
