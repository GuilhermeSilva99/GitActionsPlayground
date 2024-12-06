<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ValidacaoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    public function test_injecao_sql()
    {
        $response = $this->post('/validar', [
            'cpf' => "'; DROP TABLE users; --",
            'email' => "<script>alert('xss')</script>",
            'telefone' => '123456',
            'cep' => '00000-000',
        ]);

        $response->assertSessionHasErrors(['cpf', 'email', 'telefone', 'cep']);
    }
}
