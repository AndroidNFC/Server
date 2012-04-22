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
        'number_of_tags' => 'Tag.last_tag_id - Tag.first_tag_id + 1'
    );

    public $validate = array(
        'service_id' => array(
            'rule' => 'notEmpty'
        ),
        'number_of_tags' => array(
            'rule' => 'notEmpty'
        )
    );
    
    public function getTagByID($id) {
        return $this->find('first', array(
            'conditions' => array('Tag.id' => $id)
        ));
    }
    
    public function getRecent() {
        $conditions = array(
            'created BETWEEN (curdate() - interval 7 day) and (curdate() - interval 0 day))'
        );
        return $this->find('all', compact('conditions'));
    }

    public function getNumberOfTags($id) {
        $tag = $this->getTagByID($id);
        return $tag['Tag']['number_of_tags'];
    }
    
    public function setNumberOfTags($id, $quantity) {
        
        $current_tag = $this->getTagByID($id);
        $last_tag = $this->getLastTag();
        $old_num_tags = $current_tag['Tag']['number_of_tags'];

        if ($quantity != $old_num_tags) {

            if ($quantity < $old_num_tags ||
                $current_tag['Tag']['id'] == $last_tag['Tag']['id']) {
                $first_tag_id = $current_tag['Tag']['first_tag_id'];
                $last_tag_id =  $first_tag_id + $quantity - 1;
            } else {
                $first_tag_id = $last_tag['Tag']['last_tag_id'] + 1;
                $last_tag_id = $first_tag_id + $quantity - 1;
            }

            $this->set('first_tag_id', $first_tag_id);
            $this->set('last_tag_id', $last_tag_id);
        }
    }
    
    public function getLastTag() {
        return $this->find('first', array(
            'order' => array('Tag.id DESC')
        ));
    }
    
}
