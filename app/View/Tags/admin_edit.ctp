<h1>Edit Tag</h1>

<pre><?php print_r($tag); ?></pre>

<?php

    echo $this->Form->create('Tag', array('action' => 'edit'));
    echo $this->Form->input('service_id', array(
                                'options' => $service_options,
                                'type'    => 'select',
                                'empty'   => '-- Select the Service Type --',
                                'label'   => 'Service Type'));
    echo $this->Form->input('number_of_tags', array(
                                'label' => 'Quantity of Tags',
                                'type'  => 'number'));
    echo $this->Form->input('id', array('type', 'hidden'));
    echo $this->Form->end('Save Tag');

?>
