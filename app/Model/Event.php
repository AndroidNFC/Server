<?php
class Event extends AppModel {

    public $scaffold;
    public $name = 'Event';
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
