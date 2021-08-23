<?php


namespace App\Http\Traits;


trait SetupStatic
{

    public  function faculties()
    {
        return [
            'Medicine'=>'Medicine',
            'Oral and Dental Medicine'=>'Oral and Dental Medicine',
            'Clinical Pharmacy'=>'Clinical Pharmacy',
            'Drug Manufacturing Pharmacy'=>'Drug Manufacturing Pharmacy',
            'Physical Therapy'=>'Physical Therapy',
            'Veterinary Medicine'=>'Veterinary Medicine',
            'Biotechnology'=>'Biotechnology',
            'Allied Health Sciences'=>'Allied Health Sciences',
            'Nursing'=>'Nursing',
            'Engineering and Technology'=>'Engineering and Technology',
            'Applied Arts'=>'Applied Arts',
            'Law'=>'Law',
            'Business and Economics'=>'Business and Economics',
            'Linguistics and Translation'=>'Linguistics and Translation',
            'Filmmaking and Performing Arts'=>'Filmmaking and Performing Arts',
            'Political Sciences and International Relations'=>'Political Sciences and International Relations',
            'Social Sciences and Humanities – Media'=>'Social Sciences and Humanities – Media',
            'Social Sciences and Humanities – Psychology'=>'Social Sciences and Humanities – Psychology',
            'Social Sciences and Humanities – Other Majors'=>'Social Sciences and Humanities – Other Majors',
            'computer science'=>'computer science',
            'other'=>'other'
        ];
    }

    public function returnLevel()
    {
        return [
            1=>1,
            2=>2,
            3=>3,
            4=>4,
            5=>5,
            6=>6,
            'intern'=>'intern',
            'other'=>'other'
        ];
    }
}