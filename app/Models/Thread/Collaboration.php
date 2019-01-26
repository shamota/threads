<?php

namespace App\Models\Thread;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Thread\Collaboration
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $thread_id
 * @property int $reply_id
 * @property string|null $deleted_at
 * @property-read Reply $reply
 * @property-read Thread $thread
 * @method static Builder|Collaboration newModelQuery()
 * @method static Builder|Collaboration newQuery()
 * @method static Builder|Collaboration query()
 * @method static Builder|Collaboration whereCreatedAt($value)
 * @method static Builder|Collaboration whereDeletedAt($value)
 * @method static Builder|Collaboration whereId($value)
 * @method static Builder|Collaboration whereReplyId($value)
 * @method static Builder|Collaboration whereThreadId($value)
 * @method static Builder|Collaboration whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Collaboration extends Model
{

    use SoftDeletes;
    /**
     * @return BelongsTo
     */
    public function thread(): BelongsTo
    {
        return $this->belongsTo(Thread::class);
    }

    /**
     * @return BelongsTo
     */
    public function reply(): BelongsTo
    {
        return $this->belongsTo(Reply::class);
    }

    /**
     * @return mixed
     */
    public function user()
    {
        return $this->reply->author();
    }
}
