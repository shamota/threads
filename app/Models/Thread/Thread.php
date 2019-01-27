<?php

namespace App\Models\Thread;

use App\Events\ThreadCreated;
use App\Models\User\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Carbon;

/**
 * App\Models\Thread\Thread
 *
 * @property-read User $author
 * @property-read Collection|Reply[] $replies
 * @method static bool|null forceDelete()
 * @method static Builder|Thread newModelQuery()
 * @method static Builder|Thread newQuery()
 * @method static QueryBuilder|Thread onlyTrashed()
 * @method static Builder|Thread query()
 * @method static bool|null restore()
 * @method static QueryBuilder|Thread withTrashed()
 * @method static QueryBuilder|Thread withoutTrashed()
 * @mixin Eloquent
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $title
 * @property string|null $content
 * @property int $author_id
 * @property string|null $deleted_at
 * @method static Builder|Thread whereAuthorId($value)
 * @method static Builder|Thread whereContent($value)
 * @method static Builder|Thread whereCreatedAt($value)
 * @method static Builder|Thread whereDeletedAt($value)
 * @method static Builder|Thread whereId($value)
 * @method static Builder|Thread whereTitle($value)
 * @method static Builder|Thread whereUpdatedAt($value)
 * @property-read Collection|Collaboration[] $collaborations
 */
class Thread extends Model
{
    use SoftDeletes;

    /**
     * @var array $dispatchesEvents
     */
    protected $dispatchesEvents = [
        'created'   => ThreadCreated::class
    ];

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * @return HasMany
     */
    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class)->orderByDesc('created_at');
    }

    /**
     * @return HasMany
     */
    public function collaborations(): HasMany
    {
        return $this->hasMany(Collaboration::class);
    }
}
