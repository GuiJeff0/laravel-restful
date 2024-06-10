<?php
namespace App\EmployeeRepository;
interface EmployeeInterface
{
    public function store($data);
    public function getallemployee();
    public function updateemployee($id, $data);
    public function deleteemployee($id);
}