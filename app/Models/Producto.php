<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $categoria_id
 * @property $proveedor_id
 * @property $nombre
 * @property $descripcion
 * @property $precio
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Proveedore $proveedore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'categoria_id' => 'required',
		'proveedor_id' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
		'precio' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['categoria_id','proveedor_id','nombre','descripcion','precio'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categoria_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedore()
    {
        return $this->hasOne('App\Models\Proveedore', 'id', 'proveedor_id');
    }
    

}
