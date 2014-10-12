<?php

namespace Mobydoc;

use Illuminate\Database\Eloquent\Model;

class DocumentMeta extends Model
{
	protected $fillable = ['filename', 'path', 'html', 'file_last_changed'];
}
