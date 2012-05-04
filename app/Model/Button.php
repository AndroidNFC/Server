<?php
class Button extends AppModel {

    public $scaffold;
    public $name = 'Button';
    public $belongsTo = array(
        'Tag' => array(
            'className'  => 'Tag',
            'foreignKey' => 'tag_id'
        )
    );

    public $validate = array(
        'type' => array(
            'rule' => 'notEmpty'
        ),
        'value' => array(
            'rule' => 'notEmpty'
        ),
    );
    
}
