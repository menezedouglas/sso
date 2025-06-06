<?php

namespace App\Models\User;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserSetting
 * @package App\Models\User
 *
 * @property int $id
 * @property int $user_id
 * @property bool $2fa_email_enabled
 * @property bool $2fa_whatsapp_enabled
 * @property bool $2fa_sms_enabled
 * @property string|null $phone_number
 * @property string|null $language
 * @property string|null $timezone
 * @property bool $notifications_enabled
 * @property bool $dark_mode
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 *
 * @property-read User $user
 */
class UserSetting extends Model
{
    use SoftDeletes;

    protected $table = 'user_settings';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        '2fa_email_enabled',
        '2fa_whatsapp_enabled',
        '2fa_sms_enabled',
        'phone_number',
        'language',
        'timezone',
        'notifications_enabled',
        'dark_mode',
    ];

    protected $casts = [
        '2fa_email_enabled' => 'boolean',
        '2fa_whatsapp_enabled' => 'boolean',
        '2fa_sms_enabled' => 'boolean',
        'notifications_enabled' => 'boolean',
        'dark_mode' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
