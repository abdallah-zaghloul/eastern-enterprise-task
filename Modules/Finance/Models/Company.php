<?php

namespace Modules\Finance\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use DateTimeInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * Class Company.
 *
 * @package namespace Modules\Finance\Models;
 */
class Company extends Model implements Transformable
{
    use TransformableTrait, HasUuids;

    /**
     * @var string
     */
    protected $table = 'companies';


    /**
     * @var bool
     */
    public $timestamps = true;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'address',
        'logo'
    ];


    /**
     * @return Attribute
     */
    public function logo(): Attribute
    {
        $dir = "finance/companies";
        return new Attribute(
            get: fn(?string $path = null) => @Storage::url($path ?? "$dir/no-image.png"),
            set: function (UploadedFile $file) use($dir){
                $file->storePubliclyAs($dir, $name = Str::orderedUuid().".{$file->getClientOriginalExtension()}");
                return "$dir/$name";
            }
        );
    }


    /**
     * @param DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

}
