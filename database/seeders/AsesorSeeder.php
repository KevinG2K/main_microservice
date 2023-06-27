<?php

namespace Database\Seeders;

use App\Models\Asesor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array('nombre' => "Carmen", 'correo' => "carmen@gmail.com", 'telefono' => 78946511, 'codigo' => "001", 'archivo' => "testing_001.csv"),
            array('nombre' => "Pedro", 'correo' => "pedro@gmail.com", 'telefono' => 78946512, 'codigo' => "002", 'archivo' => "testing_002.csv"),
            array('nombre' => "Joaquin", 'correo' => "joaquin@gmail.com", 'telefono' => 78946513, 'codigo' => "003", 'archivo' => "testing_003.csv"),
            array('nombre' => "Jesus", 'correo' => "jesus@gmail.com", 'telefono' => 78946514, 'codigo' => "004", 'archivo' => "testing_004.csv"),
            array('nombre' => "Maria", 'correo' => "maria@gmail.com", 'telefono' => 78946515, 'codigo' => "005", 'archivo' => "testing_005.csv"),
            array('nombre' => "Luisa", 'correo' => "luisa@gmail.com", 'telefono' => 78946516, 'codigo' => "006", 'archivo' => "testing_006.csv"),
            array('nombre' => "Gustavo", 'correo' => "gustavo@gmail.com", 'telefono' => 78946517, 'codigo' => "007", 'archivo' => "testing_007.csv"),
            array('nombre' => "Kevin", 'correo' => "kevin@gmail.com", 'telefono' => 78946518, 'codigo' => "008", 'archivo' => "testing_008.csv"),
            array('nombre' => "Jose", 'correo' => "jose@gmail.com", 'telefono' => 78946519, 'codigo' => "009", 'archivo' => "testing_009.csv"),
            array('nombre' => "Julian", 'correo' => "julian@gmail.com", 'telefono' => 78946520, 'codigo' => "010", 'archivo' => "testing_010.csv"),
            array('nombre' => "Natalia", 'correo' => "natalia@gmail.com", 'telefono' => 78946521, 'codigo' => "011", 'archivo' => "testing_011.csv"),
            array('nombre' => "Mariana", 'correo' => "mariana@gmail.com", 'telefono' => 78946522, 'codigo' => "012", 'archivo' => "testing_012.csv"),
        ];

        Asesor::insert($data);
    }
}
