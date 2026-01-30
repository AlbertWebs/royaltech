<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SentMessage extends Model
{
    protected $fillable = [
        'to_email',
        'to_name',
        'from_email',
        'from_name',
        'subject',
        'message',
        'message_type',
        'related_message_id',
        'sent_by',
        'email_sent',
        'email_error'
    ];

    protected $casts = [
        'email_sent' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sent_by');
    }

    public function relatedMessage()
    {
        return $this->belongsTo(Message::class, 'related_message_id');
    }
}
