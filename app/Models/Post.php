<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $table = 'posts';
    // protected $primaryKey = 'id'; //не задавать если оно так по умолчанию
    // protected $keyType = "string"; //позволяет задать другой тип данных для primaryKey (по умолчанию integer)
    // public $increment = false; //если $keyType не типа integer
    // public $timestamps = false;
    // const CREATED_AT = 'created_at'; //если нужно сменить названия данных поляй, тогда нужно переопределить соответственно нужному названию
    // const UPDATED_AT = 'updated_at';
    // const DELETED_AT = 'deleted_at';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'published_at'
    ]; //масив который содержит набор полей подобно "created_at", есть возможность добавления поля для его подальшего функционирования по законам $timestamps

    protected $fillable = [
        'title',
        'status',
        'category_id',
        'user_id',
        'content',
    ]; //нужно для массового заполнение данных, например при вызове функциий save или update, тогда можно передавать все тело запроса а не отдельные поля

    protected $quarded = [
        'votes'
    ]; //защищает поля которые есть в этом масcиве от масcового заполнения (* - если нужно защитить все поля)

    //аксессоры (get)
    public function getTitleAtribute($value){
        return ucfirst($value); //преобразует строку в формат title (Первая буква слова с большой буквы)
    }
    //иммитаторы (set)
    public function setTitleAtribute($value){
        $this->attributes['title'] = strtolower($value); //преобразует строку в формат нижнего регистра
    }

    // public $dateFormat = 'U'; //определение dateFormat для Unix времени

    // public function getDateFormat() //аналогично $dateFormat, только приоритетнее
    // {
    //     return 'U';
    // }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
}
