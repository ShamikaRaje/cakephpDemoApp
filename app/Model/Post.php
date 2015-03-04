<?php
class Post extends AppModel {

	public $validate = array(
        'post-title' => array(
            'rule' => 'notEmpty'
        ),
        'post_desc	' => array(
            'rule' => 'notEmpty'
        )
    );
}
?>