<?php

namespace App\Models\Thread;

use App\Models\User\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Carbon;

/**
 * App\Models\Thread\Reply
 *
 * @property-read User $author
 * @property-read Thread $thread
 * @method static bool|null forceDelete()
 * @method static Builder|Reply newModelQuery()
 * @method static Builder|Reply newQuery()
 * @method static QueryBuilder|Reply onlyTrashed()
 * @method static Builder|Reply query()
 * @method static bool|null restore()
 * @method static QueryBuilder|Reply withTrashed()
 * @method static QueryBuilder|Reply withoutTrashed()
 * @mixin Eloquent
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $content
 * @property int $user_id
 * @property int $thread_id
 * @property string|null $deleted_at
 * @method static Builder|Reply whereContent($value)
 * @method static Builder|Reply whereCreatedAt($value)
 * @method static Builder|Reply whereDeletedAt($value)
 * @method static Builder|Reply whereId($value)
 * @method static Builder|Reply whereThreadId($value)
 * @method static Builder|Reply whereUpdatedAt($value)
 * @method static Builder|Reply whereUserId($value)
 */
class Reply extends Model
{
    use SoftDeletes;

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function thread(): BelongsTo
    {
        return $this->belongsTo(Thread::class);
    }
}
