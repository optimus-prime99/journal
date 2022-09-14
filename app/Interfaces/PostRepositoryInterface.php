<?php

namespace App\Interfaces;

interface PostRepositoryInterface
{

    public function all();

    public function store(array $data);

    public function show(int $id);

    public function edit(int $id);

    public function update(array $data, int $id);

    public function delete($id);
}
