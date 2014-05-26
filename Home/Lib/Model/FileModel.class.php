<?php
class FileModel extends RelationModel{
    protected $_link = array(
		'Comment'=> array(  
		'mapping_type'=>HAS_MANY,
		'class_name'=>'comment',
		'foreign_key'=>'cid',
		'mapping_name'=>'comment',
		'mapping_fields'=>'content,name',
		)
	);
	
}