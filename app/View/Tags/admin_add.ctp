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
echo $this->Form->input('content', array(
                            'label' => 'Content'));
echo $this->Form->input('phone_number', array(
                            'label' => 'Phone',
                            'type'  => 'tel'));
echo $this->Form->input('url', array(
                            'label' => 'URL',
                            'type'  => 'url'));
echo $this->Form->input('buy', array(
                            'label' => 'Buy'));
echo $this->Form->end('Save Tag');
?>
