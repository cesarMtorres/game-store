<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Status;
use Illuminate\Support\Str;
use App\Models\User;
class Game extends Model
{
    use HasFactory;
    protected $with = ['author'];

    protected $guarded = [];
    /**
     * @var App\Enums\Status
     */
    public $status; // My table column of type enum.

    public function scopeFilter($query,array $filters)
    {

        // 1 filtro por el name del game
        // http://127.0.0.1:8000/?search=Verna%20Schuppe  <-- donde %20 es el espacio por defecto
        //
        // 2 filtro por slug (descriccion corta)
        // http://127.0.0.1:8000/?search=non-deserunt-et-nobis-consectetur-et-qui-et

        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query
                ->where('name', 'like' , '%' . $search . '%')
                ->orWhere('description', 'like' , '%' . $search . '%')
        );

        //filtro de busqueda por state o estado del juego solo 2 opcciones ONLINE o OFFLINE
        //http://127.0.0.1:8000/?state=ONLINE

        $query->when($filters['state'] ?? false, fn($query, $state) =>
            $query
                ->where('state', 'like' , '%' . $state . '%')
        );

        // busqueda por author(user) <- creador de post
        // http://127.0.0.1:8000/?author=cesar
        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query
                ->whereHas('author', fn ($query) =>
                 $query->where('name', $author))
        );

    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setStatesAttribute($value)
    {
        $this->attributes['state'] = strtoupper($value);
    }
    // mutator

    public function setNameAttribute($value)
    {
        $this->attributes['name']=$value;
    	$this->attributes['slug']=Str::slug($value);
    }
    public function getStatesAttribute()
    {
        return [
            'ONLINE'  => $this->state,
            'OFFLINE' => $this->state,
        ];
    }

    // en ves de usar el id usamos el slug (descriccion mas corta)
    //http://127.0.0.1:8000/games/slug-separada-por-esto

     public function getRouteKeyName()
     {
        return 'slug';
     }

}
