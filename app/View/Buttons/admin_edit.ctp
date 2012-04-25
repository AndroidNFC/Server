<h1>Edit Button</h1>

<?php

    echo $this->Form->create('Button', array('action' => 'edit'));
    echo $this->Form->input('tag_id', array(
                                'options' => $tag_options,
                                'type'    => 'select',
                                'empty'   => '-- Select Tags --',
                                'label'   => 'Tags'));
    echo $this->Form->input('type');
    echo $this->Form->input('value');
    echo $this->Form->input('id', array('type', 'hidden'));
    echo $this->Form->end('Save Button');

?>
