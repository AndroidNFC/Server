<h1>Add Events</h1>

<?php
echo $this->Form->create('Event');
echo $this->Form->input('tag_id', array(
                            'options' => $tag_options,
                            'type'    => 'select',
                            'empty'   => '-- Select Tags --',
                            'label'   => 'Tags'));
echo $this->Form->input('type');
echo $this->Form->input('value');
echo $this->Form->end('Save Event');
?>
