<?php

use App\Models\User;
use App\Models\FinancialRecord;

test('guest can view home page with financial records', function () {
    FinancialRecord::factory()->count(2)->create(['is_published' => true]);

    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertInertia(fn ($page) => 
        $page->component('welcome')
             ->has('financial_records', 2)
             ->where('user_role', 'guest')
    );
});

test('member can view home page when logged in', function () {
    $user = User::factory()->create(['role' => 'member']);
    FinancialRecord::factory()->count(1)->create(['is_published' => true]);

    $response = $this->actingAs($user)->get('/');

    $response->assertStatus(200);
    $response->assertInertia(fn ($page) => 
        $page->component('welcome')
             ->has('financial_records', 1)
             ->where('user_role', 'member')
    );
});