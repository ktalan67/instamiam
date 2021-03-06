<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use App\Entity\Genre;
use App\Entity\Recette;
use App\Entity\Ingredient;
use App\Entity\Evenement;
use App\Entity\Temps;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\Provider\InstamiamProvider;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        // On instancie Faker
        $faker = Faker\Factory::create('fr_FR');
        // Le seed permet de "figer" le hasard
        // et donc d'avoir toujours les mêmes données
        $faker->seed('Instamiam');
        // Pour nos mt_rand()
        mt_srand(123456789);
        // Nos providers "Faker"
        $faker->addProvider(new InstamiamProvider($faker));

        // 1. On crée d'abord les entités à relier
        $usersList = [];
        // Les Users
        $admin = new User();
        $admin->setUsername('admin');
        $admin->setEmail('admin@admin.com');
        $admin->setPassword('admin');
        $admin->setRoleId(1);
        $admin->setImageFilename('0001.png');
        $admin->setIsActive(1);
        $usersList[] = $admin;
        $manager->persist($admin);

        $newuser = new User();
        $newuser->setUsername('user');
        $newuser->setEmail('user@user.com');
        $newuser->setPassword('user');
        $newuser->setRoleId(2);
        $newuser->setImageFilename('0002.png');
        $newuser->setIsActive(1);
        $usersList[] = $newuser;
        $manager->persist($newuser);

        $ok = new User();
        $ok->setUsername('ok');
        $ok->setEmail('ok');
        $ok->setPassword('ok');
        $ok->setRoleId(2);
        $ok->setImageFilename('0003.png');
        $ok->setIsActive(1);
        $usersList[] = $ok;
        $manager->persist($ok);


        // Les ingrédients
        // On prépare un tableau pour les stocker
        $ingredientsList = [];
        // Un ingrédient
        for ($i = 0; $i < 10; $i++) {
            // Un ingrédient
            $ingredient = new Ingredient();
            $ingredient->setNom($faker->ingredientNom());
            $ingredient->setType($faker->ingredientType());
            $ingredientsList[] = $ingredient;
            $manager->persist($ingredient);
        }

        // Les evenements
        // On prépare un tableau pour les stocker
        $evenementsList = [];

        for ($i = 0; $i < 10; $i++) {
            // Un evenement
            $evenement = new Evenement();
            $evenement->setNom($faker->evenementNom());
            // On ajoute le tableau à la liste
            $evenementsList[] = $evenement; // Ajoute un élément en fin de tableau
            // On persiste
            $manager->persist($evenement);
        }


        // Les genres
        // On prépare un tableau pour les stocker
        $genresList = []; // $genresList = array();

        for ($i = 0; $i < 10; $i++) {
            // Un genre
            $genre = new Genre();
            $genre->setNom($faker->genreNom());
            // On ajoute le tableau à la liste
            $genresList[] = $genre; // Ajoute un élément en fin de tableau
            // On persiste
            $manager->persist($genre);
        }

        // Les Temps
        // On prépare un tableau pour les stocker
        $tempsList = []; // $genresList = array();

        for ($i = 0; $i < 10; $i++) {
            // Un genre
            $temps = new Temps();
            $temps->setTpsPrepa($faker->tempsTpsPrepa());
            $temps->setTpsCuisson($faker->tempsTpsCuisson());

            // On ajoute le tableau à la liste
            $tempsList[] = $temps; // Ajoute un élément en fin de tableau
            // On persiste
            $manager->persist($temps);
        }
        // Les recettes
        $recettesList = [];

        // Oncrée 20 recettes
        for ($i = 0; $i < 20; $i++) {
            // Une recette
            $recette = new Recette();
            $recette->setNom($faker->recetteNom());
            // Association genres, de 1 à 3
            for ($count = 1; $count <= mt_rand(1, 3); $count++) {
                // Allons chercher un index au hasard entre 0 et la fin du tableau
                $randomGenreIndex = mt_rand(0, count($genresList) - 1);
                $randomIngredientIndex = mt_rand(0, count($ingredientsList) - 1);
                $randomEvenementIndex = mt_rand(0, count($evenementsList) - 1);
                $randomTempsIndex = mt_rand(0, count($tempsList) - 1);
                $randomUserIndex = mt_rand(0, count($usersList) - 1);

                // Associons ce genre à la recette
                $recette->addGenre($genresList[$randomGenreIndex]);
                $recette->addIngredient($ingredientsList[$randomIngredientIndex]);
                $recette->addEvenement($evenementsList[$randomEvenementIndex]);
                $recette->setTemps($tempsList[$randomTempsIndex]);
                $recette->setPhoto($faker->photoLink());
                $recette->setuser($usersList[$randomUserIndex]);
                $recette->setPrix(10);
                $recette->setLikes(mt_rand(1, 10));
                $recette->setNote(mt_rand(1, 20));
            }
            // On ajoute à la liste des films générés
            $recettesList[] = $recette;

            // On persiste
            $manager->persist($recette);
        }
        // On sauve en BDD
        $manager->flush();

    }
}

/*

@micha : pas de doublon sur Movie/Genre

for ($j = 0; $j < mt_rand(1, 5); $j++) {
    $newGenre = $genres[mt_rand(0, 19)];
    $currentGenres = $movie->getGenres()->toArray();
    while (in_array($newGenre, $currentGenres)) {
        $newGenre = $genres[mt_rand(0, 19)];
    }
    $movie->addGenre($newGenre);
}

Alternative au random

shuffle($genresList); // Mélange en random le tableau fourni ($genresList)

for ($r = 3; $r <= 5; $r++) {
    $movie->addGenre($genresList[0]);
    $movie->addGenre($genresList[1]);
    $movie->addGenre($genresList[2]);
}

*/