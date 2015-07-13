<?php

namespace ResultSystems\Storehouse\Product\Repositories;

interface iProductCategoryRepository
{
    public function all(array $with = []);
    public function findById($id);
    public function search(array $request);
    public function store(array $request, $beginTransaction=true);
    public function update($id, array $request);
    public function destroy($ids);
}
