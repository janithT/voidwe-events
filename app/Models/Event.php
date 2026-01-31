<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class Event extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'tenant_key',
        'device_uid',
        'event_uid',
        'type',
        'occurred_at',
        'payload',
    ];

    protected $casts = [
        'occurred_at' => 'datetime',
        'payload' => 'array',
    ];

    // create
    public function createEvents(array $data): Event
    {
        return $this->create($data);
    }

    // get with filter
    public function getEvents(array $filters = []): LengthAwarePaginator
    {
        return  $this->query()
                ->tenant($filters['tenant_key'] ?? null)
                ->device($filters['device_uid'] ?? null)
                ->type($filters['type'] ?? null)
                ->orderByDesc('occurred_at')
                ->paginate(15);
    }

    // duplicate
    public function duplicateCheck($tenentKey, $eventUid): Event
    {
        return $this->where('tenant_key', $tenentKey)
                    ->where('event_uid', $eventUid)
                    ->firstOrFail();
    }

    // tenant scope
    public function scopeTenant($query, ?string $tenantKey)
    {
        return $query->when($tenantKey, fn ($q) =>
            $q->where('tenant_key', $tenantKey)
        );
    }

    // device scope
    public function scopeDevice($query, ?string $deviceUid)
    {
        return $query->when($deviceUid, fn ($q) =>
            $q->where('device_uid', $deviceUid)
        );
    }

    // type scope
    public function scopeType($query, ?string $type)
    {
        return $query->when($type, fn ($q) =>
            $q->where('type', $type)
        );
    }
}
