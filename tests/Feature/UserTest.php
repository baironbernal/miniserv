<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class UserTest extends TestCase
{
    protected function setUp() : void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
 
    private $truck = [
        'name' =>'',
        'mark' =>'',
        'license_plate' =>'',
        'type_truck_id' =>'',
        'weight' =>''  
    ];
  

    public function testFailsOnBadRegister()
    {
        $user = factory(User::class)->create();

        $this->truck['name'] = '84635132';
        $response = $this->actingAs($user)
            ->withSession(['errors' => 'OK'])
            ->json('POST', '/truck', $this->truck);

        $response->assertSessionHas('errors');

        $this->truck['mark'] = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, autem dicta dolorum aliquid molestiae accusamus ea, tempore ipsam eligendi impedit? Totam, fuga veritatis! Nam nemo ea culpa debitis ex enim!';
        $response = $this->actingAs($user)
            ->withSession(['errors' => 'OK'])
            ->json('POST', '/truck', $this->truck);

        $response->assertSessionHas('errors');

        $this->truck['license_plate'] = '20181228';
        $response = $this->actingAs($user)
            ->withSession(['errors' => 'OK'])
            ->json('POST', '/truck', $this->truck);

        $response->assertSessionHas('errors');

        $this->truck['type_truck_id'] = 'hola';
        $response = $this->actingAs($user)
            ->withSession(['errors' => 'OK'])
            ->json('POST', '/truck', $this->truck);

        $response->assertSessionHas('errors');

        $this->truck['weight'] = 'hola';
        $response = $this->actingAs($user)
            ->withSession(['errors' => 'OK'])
            ->json('POST', '/truck', $this->truck);

        $response->assertSessionHas('errors');

        $this->truck['user_id'] = 'hola';
        $response = $this->actingAs($user)
            ->withSession(['errors' => 'OK'])
            ->json('POST', '/truck', $this->truck);

        $response->assertSessionHas('errors');
    }

    public function testPassOnGoodRegister()
    {   
        $user = factory(User::class)->create();

        $this->truck['name'] = 'Camion CVR 2005';
        $this->truck['mark'] = 'Chevrolet marca perro';
        $this->truck['license_plate'] = 'ABC-C01';
        $this->truck['type_truck_id'] = '1';
        $this->truck['weight'] = '1';
        $this->truck['user_id'] = $user->id;
      
        $response = $this->actingAs($user)
            ->withSession(['status' => '¡Saved truck!'])
            ->json('POST', '/truck', $this->truck);

        $response->assertSessionHas('status');
        $this->assertDatabaseHas('trucks', $this->truck);

        
    }
}
