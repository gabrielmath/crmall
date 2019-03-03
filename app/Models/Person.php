<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Person
 *
 * @property int $id
 * @property string $name
 * @property string $birthday
 * @property string $genre
 * @property string|null $postal_code
 * @property string|null $address
 * @property int|null $number
 * @property string|null $complement
 * @property string|null $district
 * @property string|null $state
 * @property string|null $city
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereComplement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereGenre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Person extends Model implements TableInterface
{
    protected $fillable = [
        'name',
        'birthday',
        'genre',
        'postal_code',
        'address',
        'number',
        'complement',
        'district',
        'state',
        'city'
    ];

    public $rules = [
        'name' => 'required',
        'birthday' => 'required|date',
        'genre' => 'required'
    ];

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['Nome', 'Nascimento','Sexo'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Nome':
                return $this->name;
            case 'Nascimento':
                return implode('/',array_reverse(explode('-',$this->birthday)));
            case 'Sexo':
                return $this->genre;
        }
    }
}
