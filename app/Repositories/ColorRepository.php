<?php
namespace App\Repositories;

use App\Respositories\RespositoryAbstract;
use App\Models\Color;

/**
 * Class ColorRepository
 *
 * @package App\Repositories
 */
class ColorRepository extends RespositoryAbstract
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
        return Color::class;
    }

    /**
     * Function search get all data with search and pagination
     *
     * @param string $search
     * @return mixed
     */
    public function getData($search = '')
    {
        // get data from config file
        $limit = $this->limit;

        if ($search != self::STRING_DEFAULT) {
            $listColor = $this->model->latest('id')
                ->whereLike(['id', 'name'], $search)
                ->paginate($limit);
            return $listColor;
        }

    	return $this->model->latest('id')->paginate($limit);
    }

}
