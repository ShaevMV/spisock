<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Shared\Infrastructure\Models\HasUuid;

/**
 * App\Models\Tickets
 *
 * @property int $id
 * @property string $user_id
 * @property string $email
 * @property string $fio
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets whereFio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets whereUserId($value)
 * @mixin \Eloquent
 */
class Ticket extends Model
{
    use HasFactory, HasUuid, SoftDeletes;
}
