<?php
class Tag extends AppModel {

    public $name = 'Tag';
    public $belongsTo = array(
        'Service' => array(
            'className'  => 'Service',
            'foreignKey' => 'service_id'
        )
    );
    //public $hasOne = array(
    //    'Page' => array(
    //        'className' => 'Page',
    //        'dependent' => true
    //    )
    //);

    public $virtualFields = array(
        'number_of_tags' => 'Tag.last_tag_id - Tag.first_tag_id'
    );

    public $validate = array(
        'service_id' => array(
            'rule' => 'notEmpty'
        ),
        'number_of_tags' => array(
            'rule' => 'notEmpty'
        )
    );

}
