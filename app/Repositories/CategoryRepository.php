<?php
namespace App\Repositories;

use App\Respositories\RespositoryAbstract;
use App\Models\Category;

/**
 * Class CategoryRepository
 *
 * @package App\Repositories
 */
class CategoryRepository extends RespositoryAbstract
{
    // variable
    protected CONST STRING_DEFAULT = "";

    /**
     * Function getModel
     *
     * @return model
     */
    public function getModel()
    {
        return Category::class;
    }

    /**
     * Function search get all data with search and pagination
     *
     * @param string $search
     * @param string $field
     */
    public function getData($search)
    {
        // get data from config file
        $limit = $this->limit;

        if ($search != self::STRING_DEFAULT) {
            $listCategory = $this->model->latest('id')
                ->whereLike(['id', 'name'], $search)
                ->paginate($limit);

            return $listCategory;
        }

    	return $this->model->latest('id')->paginate($limit);
    }


    public function getByParent($parentId) {
        return $this->model->where('parent_id', $parentId)->get();
    }

    function saveCategoryDetail($category, $parentId)
    {
        $categoryId = $category->category->categoryId;
        $cate = new Category();
        $cate->level = $category->categoryTreeNodeLevel;
        $cate->name = $category->category->categoryName;
        $cate->id = $categoryId;
        $cate->parent_id = $parentId;
        $cate->save();

        foreach ($category->childCategoryTreeNodes as $childCategory) {
            $this->saveCategoryDetail($childCategory, $categoryId);
        }
    }

    public function reverseRecursion($categoryId, &$data = [])
    {
        $category = $this->model->find($categoryId);
        $data[] = $category->name;

        if ($category->parent_id > 0) {
            $this->reverseRecursion($category->parent_id, $data);
        }

        return array_reverse($data);
    }

}
