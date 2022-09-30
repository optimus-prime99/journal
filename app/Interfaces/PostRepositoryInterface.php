<?php

namespace App\Interfaces;
use App\Post;
interface PostRepositoryInterface
{

//    public function all();
//
//    public function store(array $data);
//
//    public function show(int $id);
//
//    public function edit(int $id);
//
//    public function update(array $data, int $id);
//
//    public function delete($id);

    public function all();

    public function store(array $data);

    public function show(int $id);

    public function edit(int $id);

    public function update(array $data, int $id);

    public function delete(int $id);
}
