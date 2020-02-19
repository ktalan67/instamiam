<?php

namespace App\DataFixtures\Provider;

use Faker\Provider\Base;

class InstamiamProvider extends Base
{
    protected static $recettes = [
        'Crêpes',
        'Raclette',
        'Burgers',
        'Pizza Margherita',
        'Caipirinha',
        'Rôti de boeuf',
        'Tiramisu',
        'Tarte aux pommes',
    ];

    protected static $genres = [
        'Oriental',
        'Froid',
        'Italie',
        'France',
        'Chaud',
    ];

    protected static $evenements = [
        'Noël',
        'Anniversaire',
        'Saint-Valentin',
        'Famille',
        'Soir',
        'Déjeuner',
        'Rapide',
    ];

    protected static $ingredients = [
        'Tomate',
        'Salade',
        'Crême frâiche',
        'Oeuf',
        'Haricots',
        'Lait',
        'Sucre',
        'Oeuf',
        'Pâte à pizza',
        'Lait',
        'Sucre',
        'Rhum',
        'Gruyère',
        'Pomme',
        'Compote de pommes',
    ];

    protected static $types = [
        'Légume',
        'Viande',
        'Fruit',
        'Alcool',
    ];

    protected static $tps_prepa = [
        '10',
        '15',
        '20',
        '30',
        '50',
        '80',
        '100',
    ];

    protected static $tps_cuisson = [
        '10',
        '15',
        '20',
        '30',
        '50',
        '80',
        '100',
    ];

    protected static $photos = [
        '1.jpg',
        '2.jpg',
        '3.jpg',
        '4.jpg',
        '5.jpg',
    ];

    public static function recetteNom()
    {
        return static::randomElement(static::$recettes);
    }
    public static function genreNom()
    {
        return static::randomElement(static::$genres);
    }
    public static function evenementNom()
    {
        return static::randomElement(static::$evenements);
    }
    public static function ingredientNom()
    {
        return static::randomElement(static::$ingredients);
    }
    public static function tempsTpsPrepa()
    {
        return static::randomElement(static::$tps_prepa);
    }
    public static function tempsTpsCuisson()
    {
        return static::randomElement(static::$tps_cuisson);
    }
    public static function photoLink()
    {
        return static::randomElement(static::$photos);
    }

    public static function ingredientType()
    {
        return static::randomElement(static::$types);
    }
}
