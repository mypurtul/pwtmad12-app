<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get(route('dashboard'))->assertRedirect(route('login'));
    }

    public function test_user_can_login_and_logout(): void
    {
        $user = User::factory()->create(['email' => 'dosen@example.test', 'password' => 'secret-password', 'role' => 'dosen']);
        $this->post(route('login.store'), ['email' => $user->email, 'password' => 'secret-password'])->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($user);
        $this->post(route('logout'))->assertRedirect(route('login'));
        $this->assertGuest();
    }

    public function test_student_cannot_open_user_administration(): void
    {
        $student = User::factory()->create(['role' => 'mahasiswa']);
        $this->actingAs($student)->get(route('users.index'))->assertForbidden();
    }

    public function test_admin_can_open_user_administration(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin)->get(route('users.index'))->assertOk();
    }

    public function test_admin_cannot_delete_their_own_account(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin)->delete(route('users.destroy', $admin))->assertUnprocessable();
        $this->assertDatabaseHas('users', ['id' => $admin->id]);
    }
}
