<?php

require_once 'model/animal.php';

class AnimalController
{
    private $model;

    // El constructor crea una instancia de la clase animal
    public function __construct()
    {
        $this->model = new Animal();
    }

    // Vista principal de Animal
    public function indexAnimal()
    {
        require_once 'view/animal.php';
    }

    // Carga el formulario de animal para crear o editar
    public function showById()
    {
        // Creamos esta instancia para poder editar el animal
        $animal = new Animal();

        if (isset($_REQUEST['id'])) {
            $animal = $this->model->getById($_REQUEST['id']);
        }
        require_once 'view/animal_form.php';
    }

    // Obtener los datos del formulario
    public function save()
    {
        $animal = new Animal();
        $animal->id = $_REQUEST['id'];
        $animal->name = $_REQUEST['name'];
        $animal->specie = $_REQUEST['specie'];
        $animal->breed = $_REQUEST['breed'];
        $animal->gender = $_REQUEST['gender'];
        $animal->color = $_REQUEST['color'];
        $animal->age = $_REQUEST['age'];
        $animal->id > 0 ? $animal->update() : $animal->create();
        header('Location:index.php');
    }

    public function delete()
    {
        $this->model->delete($_REQUEST['id']);
        header('Location:index.php');
    }
}