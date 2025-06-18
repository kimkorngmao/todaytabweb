<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Jenssegers\Agent\Agent;

class Visitor extends Model
{
    protected $fillable = [
        'ip_address',
        'user_agent',
        'page_visited'
    ];

    public static function track($page)
    {
        // check if page and ip are already tracked today
        $existingVisit = static::where('ip_address', request()->ip())
            ->where('page_visited', $page)
            ->whereDate('created_at', today())
            ->first();

        if ($existingVisit) {
            return $existingVisit;
        }

        return static::create([
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'page_visited' => $page
        ]);
    }

    // Accessor for browser
    public function getBrowserAttribute()
    {
        $agent = new Agent();
        $agent->setUserAgent($this->user_agent);
        return $agent->browser();
    }

    // Accessor for platform
    public function getPlatformAttribute()
    {
        $agent = new Agent();
        $agent->setUserAgent($this->user_agent);
        return $agent->platform();
    }

    // Accessor for device
    public function getDeviceAttribute()
    {
        $agent = new Agent();
        $agent->setUserAgent($this->user_agent);
        return $agent->device();
    }

    // Accessor for is_robot
    public function getIsRobotAttribute()
    {
        $agent = new Agent();
        $agent->setUserAgent($this->user_agent);
        return $agent->isRobot() ? 'Yes' : 'No';
    }
}
