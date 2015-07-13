<?php

namespace ResultSystems\Storehouse\Product\Repositories;

interface iProductRepository
{
    public function all(array $with = []);
    public function findById($id);
    public function search(array $request);
    public function store(array $request);
    public function update($id, array $request);
    public function destroy($ids);
}
