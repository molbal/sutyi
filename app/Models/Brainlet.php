<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Brainlet
 *
 * @property int $id
 * @property string $name
 * @property string $comment
 * @property string $brainlet
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Brainlet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brainlet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brainlet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brainlet whereBrainlet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brainlet whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brainlet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brainlet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brainlet whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brainlet whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Brainlet extends Model
{

    protected $fillable = ['name','comment','brainlet'];
}
