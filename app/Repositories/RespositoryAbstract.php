<?php
namespace App\Respositories;

use App\Repositories\RepositoryInterface;

/**
 * Abstract Respository
 *
 * @package App\Repositories
 */
abstract class RespositoryAbstract implements RepositoryInterface
{

    // initial variable model
    protected $model;
    public $limit;

    /**
     * Function construct
     *
     * @param $_model
     */
    public function __construct()
    {
        $this->setModel();
        $this->limit = 20;
    }

    /**
     * get model
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Function all (Retrieve all data)
     *
     * @param array $columns
     * @return mixed
     */
    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    /**
     * Function paginate (Retrieve all data follow paginate)
     *
     * @param number $limit
     * @param array $columns
     * @return mixed
     */
    public function paginate($limit = 20, $columns = ['*'])
    {
        return $this->model->paginate($limit, $columns);
    }

    /**
     * Function findById
     *
     * @param array $attributes (use request->only)
     * @param number $id
     * @return mixed
     */
    public function findById($id, $columns = ['*'])
    {
        $result = $this->model->find($id, $columns);
        return $result;
    }

    /**
     * Find data by field and value
     *
     * @param       $field
     * @param       $value
     * @return mixed
     */
    public function findByField($field, $value)
    {
        return $this->model->where($field, $value)->get();
    }

    /**
     * Function create (add a new data)
     *
     * @param array $attributes (use request->only)
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Function update (update a current data)
     *
     * @param array $attributes (use request->only)
     * @param number $id
     * @return boolean
     */
    public function update(array $attributes, $id)
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->fill($attributes);
            if ($result->save()) {
                return true;
            }
            return false;
        }

        return false;
    }

    /**
     * Delete a entity in repository by id
     *
     * @param $id
     * @return boolean
     */
    public function delete($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->delete();
            return true;
        }

        return false;
    }

    /**
     * Order collection by a given column
     *
     * @param string $field
     * @param string $direction
     * @return $this
     */
    public function orderBy($field, $direction = 'asc')
    {
        return $this->model->orderBy($field, $direction);
    }

    /**
     * Load relations
     *
     * @param string $tableName
     * @return $this
     */
    public function with($tableName)
    {
        return $this->model->with($tableName);
    }

}
