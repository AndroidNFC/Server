<?php
class Post extends AppModel {

    public $name = 'Page';
    public $belongsTo = 'Tag';

    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'content' => array(
            'rule' => 'notEmpty'
        )
    );

}
