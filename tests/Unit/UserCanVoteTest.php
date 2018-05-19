<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Sport;
use Illuminate\Support\Facades\DB;
use App\Votes;

class UserCanVoteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_signin_view_voting_poll()
    {
        $this->signIn();

        $sport = create('App\Sport');

        $response = $this->get('/api/sports')
            ->assertSee('Sports Poll Voting System');
    }

    /** @test */
    public function unauthenticated_user_can_not_view_voting_poll()
    {
        $this->withExceptionHandling();

        $this->get('/api/sports')
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function authenticated_user_can_vote_for_home()
    {
        $this->signIn();

        $sport = create('App\Sport');

        $this->json(
            'POST',
            'api/sports/' . $sport->id,
            [
                'team' => 'home'
            ]
        )->assertStatus(204);
    }

    /** @test */
    public function authenticated_user_can_vote_for_draw()
    {
        $this->signIn();

        $sport = create('App\Sport');

        $this->json(
            'POST',
            'api/sports/' . $sport->id,
            [
                'team' => 'draw'
            ]
        )->assertStatus(204);
    }

    /** @test */
    public function authenticated_user_can_vote_for_away()
    {
        $this->signIn();

        $sport = create('App\Sport');

        $this->json(
            'POST',
            'api/sports/' . $sport->id,
            [
                'team' => 'away'
            ]
        )->assertStatus(204);
    }

    /** @test */
    public function authenticated_user_can_vote_only_once_per_event()
    {
        $this->signIn();

        $sport = create('App\Sport');

        try {
            $this->json(
                'POST',
                'api/sports/' . $sport->id,
                [
                    'team' => 'away'
                ]
            );

            $this->json(
                'POST',
                'api/sports/' . $sport->id,
                [
                    'team' => 'home'
                ]
            );
        } catch (\Exception $e) {
            $this->fail('duplicate');
        }

        $this->assertCount(1, $sport->votes);
    }
}
