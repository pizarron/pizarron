<?php
class OrgCourseSeeder extends Seeder {
    public function run() {
        Organization::create([
            'name'=>'Universidad Mayor de San Andres',
            'email'=>'pizarron@umsa.edu.bo',
            'website'=>'http://umsa.edu.bo',
            'description'=>'Somos una universidad bien chingona',
            'picture_url'=>'organization.png'
        ]);
        // Create a relation in organization_admin between user 1 and organization 1
        $user = User::find(1);
        $user->organizations()->attach(1);
        $user = User::find(4);
        // Create a relation in organization_admin between user 4 and organization 1
        $user->organizations()->attach(1);
        Course::create([
            'title'=>'Analisis matematico',
            'description'=>'calculus avansadus',
            'about_course'=>'se enseñara todo lo necesario respecto a matematica continua',
            'syllabus'=>'no syllabus',
            'lectures'=>'chungara xD',
            'language'=>'spanish',
            'picture_url'=>'course.png',
            'is_public'=>true,
            'user_id'=>2,
            'organization_id'=>1,
        ]);
        Course::create([
            'title'=>'matematicas con tom&jerry',
            'description'=>'curso de matematicas',
            'about_course'=>'introduccion al algebra',
            'syllabus'=>'contenido por definir',
            'lectures'=>'grimaldi',
            'language'=>'spanish',
            'picture_url'=>'course.png',
            'is_public'=>true,
            'user_id'=>2,
        ]);
        Course::create([
            'title'=>'literatura local',
            'description'=>'todo sobre la literatura local',
            'about_course'=>'varios temas bien cool',
            'syllabus'=>'todo de este pais',
            'lectures'=>'creo que ya es obvio',
            'language'=>'spanish',
            'picture_url'=>'course.png',
            'is_public'=>true,
            'user_id'=>4,
            'organization_id'=>1,
        ]);
        Course::create([
            'title'=>'fisica avanzada',
            'description'=>'un curso de fisica fuera de la universidad',
            'about_course'=>'te dare todo lo que se por nada',
            'syllabus'=>'energia, sinetica, cosas y mas cosas',
            'lectures'=>'libro1, libro2, libro3',
            'language'=>'spanish',
            'picture_url'=>'course.png',
            'is_public'=>true,
            'user_id'=>4,
        ]);
    }
}
