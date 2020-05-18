<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //
        DB::table("identifies")->insert([
            ['identify'=>'Male'],
            ['identify'=>"Female"],
            ['identify'=>'Non-binary'],
            ['identify'=>'Trans M to F'],
            ['identify'=>'Trans F to M'],
            ['identify'=>"intersex"],
        ]);
        DB::table("cuisines")->insert([
            ['cuisine'=>"African"],
            ['cuisine'=>"American"],
            ['cuisine'=>"Chinese"],
            ['cuisine'=>"Cuban"],
            ['cuisine'=>"Caribbean"],
            ['cuisine'=>"French"],
            ['cuisine'=>"Indian"],
            ['cuisine'=>"Italian"],
            ['cuisine'=>"Japanese"],
            ['cuisine'=>"Korean"],
            ['cuisine'=>"Mediterranean"],
            ['cuisine'=>"Mexican"],
            ['cuisine'=>"Peruvian"],
            ['cuisine'=>"Spanish"],
            ['cuisine'=>"Thai"],
            ['cuisine'=>"Vietnamese"],
        ]);

        DB::table("astrologicals")->insert([
            ['astrological'=>"Aries"],
            ['astrological'=>"Taurus"],
            ['astrological'=>"Gemini"],
            ['astrological'=>"Cancer"],
            ['astrological'=>"Leo"],
            ['astrological'=>"Virgo"],
            ['astrological'=>"Libra"],
            ['astrological'=>"Scorpio"],
            ['astrological'=>"Sagittarius"],
            ['astrological'=>"Capricorn"],
            ['astrological'=>"Aquarius"],
            ['astrological'=>"Pisces"],
        ]);
        DB::table("industries")->insert([
            ["industry"=>"Art"],
            ["industry"=>"Business"],
            ["industry"=>"Cinema"],
            ["industry"=>"Engineer"],
            ["industry"=>"Fashion"],
            ["industry"=>"Finance"],
            ["industry"=>"Government"],
            ["industry"=>"Health and Wellness"],
            ["industry"=>"Holistic Medicine"],
            ["industry"=>"Hospitality"],
            ["industry"=>"Investor"],
            ["industry"=>"IT"],
            ["industry"=>"Law"],
            ["industry"=>"Medical Professonal"],
            ["industry"=>"Non-Profit"],
            ["industry"=>"Philanthrophy"],
            ["industry"=>"Real Estate"],
            ["industry"=>"Scientist"],
            ["industry"=>"Trust Fund Baby"],
            ["industry"=>"Other"],
        ]);
        DB::table("conditions")->insert([
            ["name"=>"Casual"],
            ["name"=>"Monogamous"],
            ["name"=>"Marriage"],
            ["name"=>"Serious"],
            ["name"=>"Tantric Partner"],
            ["name"=>"Polyamorous"],
            ["name"=>"Open"],
            ["name"=>"Other"],
        ]);
        DB::table("maritals")->insert([
            ["name"=>"Single, never married"],
            ["name"=>"Divorced"],
            ["name"=>"Separated"],
            ["name"=>"Widowed"],
            ["name"=>"In an open relationship"],
        ]);
        DB::table("spirituals")->insert([
            ["name"=>"Personal Spiritual Path"],
            ["name"=>"Religious"],
            ["name"=>"Other"],
        ]);
        DB::table("alcohols")->insert([
            ["name"=>"I don't drink"],
            ["name"=>"I drink socially"],
            ["name"=>"I drink a lot"],
        ]);
        DB::table("tabaccos")->insert([
            ["name"=>"No"],
            ["name"=>"Yes"],
        ]);
        DB::table("friend420s")->insert([
            ["name"=>"Nope"],
            ["name"=>"Occasionally"],
            ["name"=>"Regularly"],
            ["name"=>"Wake and bake"],
        ]);
        DB::table("havechildrens")->insert([
            ["name"=>"Yes and I want more!"],
            ["name"=>"Yes, but I'v had enough"],
            ["name"=>"No, but I want them!"],
            ["name"=>"No and I don't want any"],
            ["name"=>"Foster"],
        ]);
        DB::table("haveanimals")->insert([
            ["name"=>"No"],
            ["name"=>"Dog"],
            ["name"=>"Cat"],
            ["name"=>"Exotic Animal"],
            ["name"=>"No but looking"],
        ]);
        
    }
}
