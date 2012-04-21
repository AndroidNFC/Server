<?php
class Service extends AppModel {

    public $name = 'Service';
    public $hasMany = array(
        'Tag' => array(
            'className'     => 'Tag',
            'foreignKey'    => 'service_id',
            'order'         => 'Tag.created DESC',
            'dependent'     => true
        )
    );

    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'content' => array(
            'rule' => 'notEmpty'
        )
    );

}
