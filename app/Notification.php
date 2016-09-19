<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable   = ['user_id', 'type', 'subject', 'body', 'object_id', 'object_type'];

    public function getDates()
    {
        return ['created_at', 'updated_at'];
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function withSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    public function withBody($body)
    {
        $this->body = $body;
        return $this;
    }

    public function withType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function regarding($object)
    {
        if(is_object($object))
        {
            $this->object_id   = $object->id;
            $this->object_type = get_class($object);
        }
        return $this;
    }

    public function scopeUnread($query)
    {
        return $query->where('is_read', '=', 0);
    }

    public function scopeMessage($query)
    {
        return $query->where('type', '=', 'Message');
    }

    public function deliver()
    {
        $this->save();
        return $this;
    }

    public function markAsRead()
    {
        $this->is_read = true;
        $this->save();
        return $this;
    }

    public function hasValidObject()
    {
        try
        {
            $object = call_user_func_array($this->object_type . '::findOrFail', [$this->object_id]);
        }
        catch(\Exception $e)
        {
            return false;
        }

        $this->relatedObject = $object;

        return true;
    }

    public function getObject()
    {
        if(!$this->relatedObject)
        {
            $hasObject = $this->hasValidObject();

            if(!$hasObject)
            {
                throw new \Exception(sprintf("No valid object (%s with ID %s) associated with this notification.", $this->object_type, $this->object_id));
            }
        }

        return $this->relatedObject;
    }
}
