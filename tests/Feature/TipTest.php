<?php

namespace Tests\Feature;

use App\Http\Livewire\Tips\Create;
use App\Http\Livewire\Tips\Update;
use App\Models\Model;
use App\Models\Tip;
use App\Models\Trim;
use App\Models\Type;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TipTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    /** @test */
    function users_can_create_tips()
    {
        $this->actingAs(User::factory()->create());

        $content = 'Testeando com Livewire';

        Livewire::test(Create::class)
            ->set('content', $content)
            ->set('makeFilter', Type::factory()->createOne()->id)
            ->set('typeFilter', Type::factory()->createOne()->id)
            ->set('modelFilter', Model::factory()->createOne()->id)
            ->set('trimFilter', Trim::factory()->createOne()->id)
            ->call('save');

        $this->assertTrue(Tip::where('content', $content)->exists());
    }

    /** @test */
    function tips_must_have_a_content()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(Create::class)
            ->set('content', '')
            ->set('makeFilter', Type::factory()->createOne()->id)
            ->set('typeFilter', Type::factory()->createOne()->id)
            ->set('modelFilter', Model::factory()->createOne()->id)
            ->set('trimFilter', Trim::factory()->createOne()->id)
            ->call('save')
            ->assertHasErrors(['content' => 'required']);
    }

    /** @test */
    function only_authenticated_users_can_create_tips()
    {
        $content = 'Testeando com Livewire';

        Livewire::test(Create::class)
            ->set('content', $content)
            ->set('makeFilter', Type::factory()->createOne()->id)
            ->set('typeFilter', Type::factory()->createOne()->id)
            ->set('modelFilter', Model::factory()->createOne()->id)
            ->set('trimFilter', Trim::factory()->createOne()->id)
            ->call('save')
            ->assertForbidden();
    }

}
