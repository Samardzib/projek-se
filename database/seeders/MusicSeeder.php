<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $musicData = [
            [
                'music_name' => '100% Flow Focus Success',
                'music_url' => '100%flowfocussuccess.mp3',
                'music_cover' => '100%flowfocussuccess.jpg'
            ],
            [
                'music_name' => 'AShamaluev Music',
                'music_url' => 'AShamaluevMusic.mp3',
                'music_cover' => 'AShamaluevMusic.jpg'
            ],
            [
                'music_name' => 'Deep Focus',
                'music_url' => 'DeepFocus.mp3',
                'music_cover' => 'DeepFocus.jpg'
            ],
            [
                'music_name' => 'London Jazz Club Vibes',
                'music_url' => 'LondonJazzClubVibes.mp3',
                'music_cover' => 'LondonJazzClubVibes.jpg'
            ],
            [
                'music_name' => 'Night Jazz',
                'music_url' => 'NightJazz.mp3',
                'music_cover' => 'NightJazz.jpg'
            ],
            [
                'music_name' => 'Relax Daily',
                'music_url' => 'RelaxDaily.mp3',
                'music_cover' => 'RelaxDaily.jpg'
            ],
            [
                'music_name' => 'Relax Daily Calm Piano',
                'music_url' => 'relaxdailycalmpiano.mp3',
                'music_cover' => 'relaxdailycalmpiano.jpg'
            ],
            [
                'music_name' => 'Relaxing Angklung',
                'music_url' => 'RelaxingAngklung.mp3',
                'music_cover' => 'RelaxingAngklung.jpg'
            ],
            [
                'music_name' => 'Relaxing Blues Songs',
                'music_url' => 'RelaxingBluesSongs.mp3',
                'music_cover' => 'RelaxingBluesSongs.jpg'
            ],
            [
                'music_name' => 'Relaxing Clarinet',
                'music_url' => 'RelaxingClarinet.mp3',
                'music_cover' => 'RelaxingClarinet.jpg'
            ],
            [
                'music_name' => 'Relaxing Classical Music',
                'music_url' => 'RelaxingClassicalMusic.mp3',
                'music_cover' => 'RelaxingClassicalMusic.jpg'
            ],
            [
                'music_name' => 'Relaxing Guitar',
                'music_url' => 'RelaxingGuitar.mp3',
                'music_cover' => 'RelaxingGuitar.jpg'
            ],
            [
                'music_name' => 'Relaxing Piano',
                'music_url' => 'RelaxingPiano.mp3',
                'music_cover' => 'RelaxingPiano.jpeg'
            ],
            [
                'music_name' => 'Relaxing Saxophone',
                'music_url' => 'RelaxingSaxophone.mp3',
                'music_cover' => 'RelaxingSaxophone.jpg'
            ],
            [
                'music_name' => 'Relaxing Violin',
                'music_url' => 'RelaxingViolin.mp3',
                'music_cover' => 'RelaxingViolin.jpg'
            ],
            [
                'music_name' => 'Study Relax Sleep',
                'music_url' => 'StudyRelaxSleep.mp3',
                'music_cover' => 'StudyRelaxSleep.jpeg'
            ],
            [
                'music_name' => 'Summer Dreams',
                'music_url' => 'SummerDreams.mp3',
                'music_cover' => 'SummerDreams.jpg'
            ],
            [
                'music_name' => 'Work Relaxing Music',
                'music_url' => 'WorkRelaxingMusic.mp3',
                'music_cover' => 'WorkRelaxingMusic.jpg'
            ],
        ];

        DB::table('music')->insert($musicData);
    }
}
