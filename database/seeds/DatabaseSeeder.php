<?php

use Illuminate\Database\Seeder;
use App\Rol;
use App\User;
use App\Tipus_vehicle;
use App\Vehicle;
use App\Pece;
use App\Tipus_treball;
use App\Treball;
use App\Tipus_vehicle_pece;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    //Array que conte els unics rols que tindra la taula rol i que volem que afegeixi amb la seed
    private $arrayRols = array(
		array(
			'nom' => 'administrador',
            'permisos' => 
            '- Eliminar, afegir i editar usuaris (treballadors).
            - Eliminar, afegir i editar tasques de la taula de tasques.
            - Eliminar, afegir i editar el inventari.'
		),
		array(
			'nom' => 'oficina',
            'permisos' => 
            '- Eliminar, afegir i editar tasques de la taula de tasques.
            - Eliminar, afegir i editar el inventari.'
		),
		array(
			'nom' => 'treballador',
            'permisos' => 
            '- Eliminar i editar tasques de la taula de tasques.
            - Eliminar i editar el inventari.'
		),
    );

    private $arrayUsuaris = array(
		array(
            'dni' => '41555709e',
            'nom' => 'Joan Pere',
            'cognoms' => 'Gabarre Curbon',
            'telefon' => '677 217 717',
			'email' => 'juanplluisgabarre@gmail.com',
            'password' => '123456gjy1',
            'id_rol' => 1
        ),
        array(
            'dni' => '41555709g',
            'nom' => 'Lluis',
            'cognoms' => 'Gabarre Curbon',
            'telefon' => '677 217 844',
			'email' => 'lluisgabarre@gmail.com',
            'password' => '123456gjy2',
            'id_rol' => 2
        ),
        array(
            'dni' => '41555709c',
            'nom' => 'Josep',
            'cognoms' => 'Gabarre Vazquez',
            'telefon' => '633 947 030',
			'email' => 'josepgabarre@gmail.com',
            'password' => '123456gjy3',
            'id_rol' => 3
		),
    );

    private $arrayTipus_Vehicles = array(
		array(
            'marca' => 'bmw',
            'model' => 'serie 5 berlina (e39) (1996-2003)'
        ),
        array(
            'marca' => 'audi',
            'model' => 'a5 coupe (8t) (2007-2016)'
        ),
        array(
            'marca' => 'ford',
            'model' => 'streetka (ccs) (2003 - 2007)'      
        ),
    );

    private $arrayVehicles = array(
		array(
            'bastidor' => 'VSSZZZ1MZ2R040123',
            'combustible' => 'gasolina',
            'portes' => 4,
            'places' => 5,
            'any_matriculacio' => '1996',
            'id_tipus_vehicle' => 1
        ),
        array(
            'bastidor' => 'VSSZZZ1MZ2R040456',
            'combustible' => 'diesel',
            'portes' => 3,
            'places' => 5,
            'any_matriculacio' => '2008',
            'id_tipus_vehicle' => 2
        ),
        array(
            'bastidor' => 'VSSZZZ1MZ2R040789',
            'combustible' => 'gasolina',
            'portes' => 3,
            'places' => 2,
            'any_matriculacio' => '2005',
            'id_tipus_vehicle' => 3
        ),
    );

    private $arrayPeces = array(
		array(
            'referencia' => '1422028',
            'nom' => 'caixa de cambis',
            'quantitat' => 1,
            'preu' => 250.00,
            'id_vehicle' => 1
        ),
        array(
            'referencia' => '8T0601025M',
            'nom' => 'llantes 18 pulgades',
            'quantitat' => 4,
            'preu' => 96.80,
            'id_vehicle' => 2
        ),
        array(
            'referencia' => '1468149',
            'nom' => 'carter',
            'quantitat' => 1,
            'preu' => 24.99,
            'id_vehicle' => 3
        ),
    );

    private $arrayTipus_Vehicle_Peces = array(
		array(
            'id_tipus_vehicle' => 1,
            'id_pece' => 1
        ),
        array(
            'id_tipus_vehicle' => 2,
            'id_pece' => 2
        ),
        array(
            'id_tipus_vehicle' => 3,
            'id_pece' => 3
        ),
    );

    private $arrayTipus_Treballs = array(
		array(
            'nom' => 'Per fer'       
        ),
        array(
            'nom' => 'Fent'   
        ),
        array(
            'nom' => 'Acabat'   
        ),
    );

    private $arrayTreballs = array(
		array(
            'id_tipus_treball' => 1,
            'id_rol' => 2,
            'resum' => 'Baixa vehicle',
            'descripcio' => "S'ha de donar de baixa el vehicle que va arribar ahir a la tarda.",
            'urgencia' => 2,
        ),
        array(
            'id_tipus_treball' => 2,
            'id_rol' => 3,
            'resum' => 'Desmontar embrague',
            'descripcio' => "S'ha de desmontar l'embrague de la furguneta renault per a un client, per avui a les 5 de la tarda.",
            'urgencia' => 3,
        ),
        array(
            'id_tipus_treball' => 3,
            'id_rol' => 3,
            'resum' => 'Organitzar les rodes',
            'descripcio' => "S'haurien d'organitzar les rodes per poder treure millor les llantes per catalogar-les.",
            'urgencia' => 1,
        ),
    );

    //Funcio la cual crearà el insert a la taula rol
    private function seedRols(){
		DB::table('rols')->delete();
        foreach( $this->arrayRols as $rol ) {
            $c = new Rol;
            $c->nom = $rol['nom'];
            $c->permisos = $rol['permisos'];
			$c->save();
		}
    }
    
    private function seedUsers(){
		DB::table('users')->delete();
        foreach( $this->arrayUsuaris as $user ) {
            $u = new User;
            $u->dni = $user['dni'];
            $u->nom = $user['nom'];
            $u->cognoms = $user['cognoms'];
            $u->telefon = $user['telefon'];
            $u->email = $user['email'];
            $u->password = bcrypt($user['password']);
            $u->id_rol = $user['id_rol'];
			$u->save();
		}
    }

    private function seedTipus_Vehicles(){
		DB::table('tipus_vehicles')->delete();
        foreach( $this->arrayTipus_Vehicles as $tipus_vehicle ) {
            $c = new Tipus_vehicle;
            $c->marca = $tipus_vehicle['marca'];
            $c->model = $tipus_vehicle['model'];
			$c->save();
		}
    }

    private function seedVehicles(){
		DB::table('vehicles')->delete();
        foreach( $this->arrayVehicles as $vehicle ) {
            $u = new Vehicle;
            $u->bastidor = $vehicle['bastidor'];
            $u->combustible = $vehicle['combustible'];
            $u->portes = $vehicle['portes'];
            $u->places = $vehicle['places'];
            $u->any_matriculacio = $vehicle['any_matriculacio'];
            $u->id_tipus_vehicle = $vehicle['id_tipus_vehicle'];
			$u->save();
		}
    }

    private function seedPeces(){
		DB::table('peces')->delete();
        foreach( $this->arrayPeces as $pece ) {
            $u = new Pece;
            $u->referencia = $pece['referencia'];
            $u->nom = $pece['nom'];
            $u->quantitat = $pece['quantitat'];
            $u->preu = $pece['preu'];
            $u->id_vehicle = $pece['id_vehicle'];
			$u->save();
		}
    }

    private function seedTipus_vehicles_peces(){
		DB::table('tipus_vehicles_peces')->delete();
        foreach( $this->arrayTipus_Vehicle_Peces as $tipus_vehicle_pece ) {
            $u = new Tipus_vehicle_pece;
            $u->id_tipus_vehicle = $tipus_vehicle_pece['id_tipus_vehicle'];
            $u->id_pece = $tipus_vehicle_pece['id_pece'];
			$u->save();
		}
    }

    private function seedTipus_Treballs(){
		DB::table('tipus_treballs')->delete();
        foreach( $this->arrayTipus_Treballs as $tipus_treball ) {
            $u = new Tipus_treball;
            $u->nom = $tipus_treball['nom'];
			$u->save();
		}
    }

    private function seedTreballs(){
		DB::table('treballs')->delete();
        foreach( $this->arrayTreballs as $treball ) {
            $u = new Treball;
            $u->id_tipus_treball = $treball['id_tipus_treball'];
            $u->id_rol = $treball['id_rol'];
            $u->resum = $treball['resum'];
            $u->descripcio = $treball['descripcio'];
            $u->urgencia = $treball['urgencia'];
			$u->save();
		}
    }

    public function run()
    {
        // Aqui emplenarem la taula de rols amb els 3 rols que utilitzarem
        self::seedRols();
        $this->command->info('La taula rols ha sigut inicialitzada amb exit!');
        
        self::seedUsers();
        $this->command->info('La taula de usuaris ha sigut inicialitzada amb exit!');

        self::seedTipus_Vehicles();
        $this->command->info('La taula tipus_vehicles ha sigut inicialitzada amb exit!');

        self::seedVehicles();
        $this->command->info('La taula vehicles ha sigut inicialitzada amb exit!');

        self::seedPeces();
        $this->command->info('La taula peces ha sigut inicialitzada amb exit!');

        self::seedTipus_vehicles_peces();
        $this->command->info('La taula tipus_vehicles_peces ha sigut inicialitzada amb exit!');

        self::seedTipus_Treballs();
        $this->command->info('La taula tipus_tasques ha sigut inicialitzada amb exit!');

        self::seedTreballs();
		$this->command->info('La taula tasques ha sigut inicialitzada amb exit!');
    }
}
