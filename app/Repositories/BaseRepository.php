<?php
namespace  App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface{

    //model muon tuong tac
    protected $model;

    //khoi tao
    public function  __construct(){
        $this->setModel();
    }

    //lay model tuong ung
    abstract public function getModel();

    /*
     * set model
     * */
    public function setModel(){
        $this->model =  app()->make(
            $this->getModel()
        );
    }
    public function store($attributes = [])
    {
        return $this->model->$this->store($attributes = []);

    }
    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

}
