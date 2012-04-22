<h1>Add Tags</h1>

<?php
echo $this->Form->create('Tag');
echo $this->Form->input('service_id', array(
                            'options' => $service_options,
                            'type'    => 'select',
                            'empty'   => '-- Select the Service Type --',
                            'label'   => 'Service Type'));
echo $this->Form->input('number_of_tags', array(
                            'label' => 'Quantity of Tags',
                            'type'  => 'number'));
echo $this->Form->end('Save Tag');
?>
