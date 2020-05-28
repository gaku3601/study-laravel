<?php namespace App\Traits;

trait OptimisticLock
{
    public function getVersionAttribute()
    {
        return $this->version;
    }

    protected static function bootOptimisticLock()
    {
        static::updating(function ($model) {
            if ($model->original['version'] != $model->attributes['version']){
                throw new \Exception("Exclusive Error");
            }
            $model->attributes['version'] = $model->attributes['version'] + 1;
        });
    }
}
