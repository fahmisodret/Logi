<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Kelurahan;

class KelurahanControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_stores_data()
    {
        
        //Membuat objek user yang otomatis menambahkannya ke database.
        $user = factory(User::class)->create();
        //Membuat objek category yang otomatis menambahkannya ke database.
        $category = factory(Kelurahan::class)->create();
        //Acting as berfungsi sebagai autentikasi, jika kita menghilangkannya maka akan error.
        $response = $this->actingAs($user)
        //Hit post ke method store, fungsinya ya akan lari ke fungsi store.
        ->post(route('admin.kelurahan.store'), [
            'kelurahan' => $this->faker->randomString(6),
            'kecamatan' => $this->faker->randomString(6),
            'kota' => $this->faker->randomString(6),
        ]);

        //Tuntutan status 302, yang berarti redirect status code.
        $response->assertStatus(302);

        //Tuntutan bahwa abis melakukan POST URL akan dialihkan ke URL product atau routenya adalah product.index
        $response->assertRedirect(route('admin.kelurahan.index'));
    }
}
