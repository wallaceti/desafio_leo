<?php
namespace App\Models;

class Image extends BaseModel
{
    protected $table = 'images';
    protected $primaryKey = 'hash';

    public function __construct()
    {
        parent::__construct();
    }

    public function create()
    {

        $q = $this->con->prepare('INSERT INTO ' . $this->table . ' (hash, fullpath) VALUES (:hash, :fullpath)');
        
        $q->bindValue(':hash', $this->hash);
        $q->bindValue(':fullpath', $this->fullpath);
        
        $created = $q->execute();
        
        if ($created) {

            $this->id = $this->con->lastInsertId();
        
            return true;
        
        } else {

            return false;
        }
    }

    public function createOrUpdate()
    {
        $image = self::get($this->hash);
        
        if($image){
        
            $image->fullpath = $this->fullpath;
            $image->save();

            return $image;
        
        } else {

            $this->create();
            return $this;
        }
    }

    public function delete()
    {

        $stmt = $this->con->prepare('DELETE FROM ' . $this->table . ' WHERE hash = :hash');
        $stmt->bindParam(':hash', $this->hash); 
        $stmt->execute();
     
        return $stmt->rowCount(); 
    }

    public function save()
    {

        $q = $this->con->prepare('UPDATE ' . $this->table . ' set fullpath=:fullpath where hash=:hash');
        
        $q->bindValue(':fullpath', $this->fullpath);
        $q->bindValue(':hash', $this->hash);
        
        $created = $q->execute();
        
        return $q->rowCount();

    }

}