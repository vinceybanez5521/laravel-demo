<?php
namespace App\Repositories;

interface EmployeeRepositoryInterface
{
    public function all();

    public function findById($id);

    public function update($id);

    public function store();

    public function delete($id);
}
