<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pictures';

    public function deleteCovers()
    {
        if ($this->min && file_exists(public_path($this->min)))
            unlink(public_path($this->min));

        if ($this->origin && file_exists(public_path($this->origin)))
            unlink(public_path($this->origin));

        return true;
    }

    public function delete()
    {
        parent::delete();

        $this->deleteCovers();

        return true;
    }
}
