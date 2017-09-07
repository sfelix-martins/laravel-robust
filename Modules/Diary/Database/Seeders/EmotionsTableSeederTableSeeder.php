<?php

namespace Modules\Diary\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class EmotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emotions = [
            [__('Desinibição'), true/*, '2'*/],
            [__('Entusiasmo'), true/*, '2'*/],
            [__('Autoafirmação'), true/*, '2'*/],
            [__('Vaidade'), false/*, '2'*/],
            [__('Instabilidade'), false/*, '2'*/],
            [__('Carência'), false/*, '2'*/],
            [__('Empolgação'), true/*, '2'*/],
            [__('Desconcentração'), false/*, '2'*/],
            [__('Rejeição'), false/*, '2'*/],
            [__('Dispersão'), false/*, '2'*/],
            [__('Bom humor'), true/*, '2'*/],
            [__('Inquietação'), false/*, '2'*/],
            [__('Afetividade'), true/*, '2'*/],
            [__('Simpatia'), true/*, '2'*/],
            [__('Alegria'), true/*, '2'*/],
            [__('Surpresa'), false/*, '2,3'*/],
            [__('Cordialidade'), true/*, '2,3'*/],
            [__('Flexibilidade'), true/*, '2,3'*/],
            [__('Empatia'), true/*, '3'*/],
            [__('Paciência'), true/*, '3'*/],
            [__('Compaixão'), true/*, '3'*/],
            [__('Bondade'), true/*, '3'*/],
            [__('Dependência'), false/*, '3'*/],
            [__('Tolerância'), true/*, '3'*/],
            [__('Serenidade'), true/*, '3'*/],
            [__('Complacência'), true/*, '3'*/],
            [__('Tranquilidade'), true/*, '3'*/],
            [__('Calma'), true/*, '3'*/],
            [__('Aceitação'), true/*, '3'*/],
            [__('Submissão'), false/*, '3'*/],
            [__('Passividade'), false/*, '3'*/],
            [__('Conformismo'), false/*, '3'*/],
            [__('Brandura'), true/*, '3'*/],
            [__('Rancor'), false/*, '3'*/],
            [__('Autoconfiança'), true/*, '1'*/],
            [__('Agitação'), true/*, '1'*/],
            [__('Otimismo'), true/*, '1'*/],
            [__('Coragem'), true/*, '1'*/],
            [__('Competitividade'), true/*, '1'*/],
            [__('Irritação'), false/*, '1'*/],
            [__('Orgulho'), false/*, '1'*/],
            [__('Impaciência'), false/*, '1'*/],
            [__('Pressa'), false/*, '1'*/],
            [__('Raiva'), false/*, '1'*/],
            [__('Vingança'), false/*, '1'*/],
            [__('Superioridade'), false/*, '1'*/],
            [__('Ambição'), true/*, '1'*/],
            [__('Desconfiança'), false/*, '1'*/],
            [__('Inflexibilidade'), false/*, '1,4'*/],
            [__('Preconceito'), false/*, '1,4'*/],
            [__('Desprezo'), false/*, '1,4'*/],
            [__('Solidão'), false/*, '4'*/],
            [__('Medo'), false/*, '4'*/],
            [__('Insegurança'), false/*, '4'*/],
            [__('Dúvida'), false/*, '4'*/],
            [__('Concentração'), true/*, '4'*/],
            [__('Tristeza'), false/*, '4'*/],
            [__('Rejeição'), false/*, '4'*/],
            [__('Desânimo'), false/*, '4'*/],
            [__('Fuga'), false/*, '4'*/],
            [__('Preocupação'), false/*, '4'*/],
            [__('Pessimismo'), false/*, '4'*/],
            [__('Timidez'), false/*, '4'*/],
            [__('Insatisfação'), false/*, '4'*/],
            [__('Frustração'), false/*, '4'*/],
            [__('Perceptividade'), true/*, '4'*/],
            [__('Inferioridade'), false/*, '4'*/],
            [__('Vergonha'), false/*, '4'*/],
        ];
        
        DB::table('emotions')->truncate();
        foreach ($emotions as $emotion) {
            DB::table('emotions')->insert([
                'name' => $emotion[0],
                'positive' => $emotion[1],
            ]);
        }
        // $this->call("OthersTableSeeder");
    }
}
