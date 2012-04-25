<h1>Add Buttons</h1>

<?php
echo $this->Form->create('Button');
echo $this->Form->input('tag_id', array(
                            'options' => $tag_options,
                            'type'    => 'select',
                            'empty'   => '-- Select Tags --',
                            'label'   => 'Tags'));
echo $this->Form->input('type');
echo $this->Form->input('value');
echo $this->Form->end('Save Tag');
?>
