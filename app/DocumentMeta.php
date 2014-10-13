<?php

namespace Mobydoc;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class DocumentMeta extends Model
{
	use SoftDeletingTrait;
	
	protected $table = 'document_meta';
	protected $fillable = ['filename', 'path', 'html', 'file_last_changed'];
}
