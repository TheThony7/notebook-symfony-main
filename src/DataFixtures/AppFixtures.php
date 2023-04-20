<?php

namespace App\DataFixtures;

use App\Entity\Note;
use App\Entity\User;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Ajoute un utilisateur Admin à la base de données
        $admin = new User();
        $admin->setEmail('admin@admin.com')
        ->setRoles(["ROLE_ADMIN"])
        ->setPassword('$2y$13$7fN937SZnbxDpxw/55SVPuvJlQY/vTYOmPS0m7L4LLTVK9Kn1y3VW');

        // Ajoute l'utilisateur à la base de données
        $manager->persist($admin);

        // Ajoute des notes à la base de données
        $technos = [
            'PHP', 'Symfony', 'Doctrine', 'Twig', 'MySQL', 'JavaScript', 'React', 'Vue', 'Angular', 'NodeJS', 'HTML', 'CSS', 'Bootstrap', 'Tailwind', 'Sass', 'Less', 'jQuery', 'AJAX', 'JSON', 'XML', 'YAML', 'Markdown', 'Git', 'GitHub', 'GitLab', 'BitBucket', 'Composer', 'NPM', 'Webpack', 'Babel', 'Gulp', 'Grunt', 'Docker', 'Vagrant', 'Laravel', 'CodeIgniter', 'CakePHP', 'Zend', 'Slim', 'Phalcon', 'FuelPHP'
        ];

        // Boucle sur les notes
        for ($i=0; $i < count($technos); $i++) {
            $note = new Note();
            $note->setTitle('Ma note sur ' . $technos[$i])
            ->setDescription('Description de la note sur ' . $technos[$i])
            ->setContent('Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.')
            ->setCreatedAt(new \DateTimeImmutable('yesterday'))
            ->setUpdatedAt(new \DateTimeImmutable('now'))
            ->setAuthor('Jensone');
            
            // Ajoute la note à la base de données
            $manager->persist($note);
        }


        // Ajoute des catégories à la base de données
        $categories = [
            'Frontend', 'Backend', 'Data', 'UX', 'UI', 'Réseaux', 'Cyber', 'Design', 'API', 'Agile'
        ];
        $colors = [
            'red', 'blue', 'green', 'yellow', 'orange', 'purple', 'pink', 'brown', 'black', 'white', 'grey', 'cyan', 'magenta', 'lime', 'olive', 'teal', 'navy', 'maroon', 'aqua', 'fuchsia'
        ];
        
        // Boucle sur les catégories
        for ($i=0; $i < count($categories); $i++) { 
            $cat = new Category();
            $cat->setTitle($categories[$i])
            ->setColor($colors[$i]);
            
            // Ajoute la catégorie à la base de données
            $manager->persist($cat);
        }

       
        // Nettoie le flux de données
        $manager->flush();
    }
}
