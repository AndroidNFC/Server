<h1>Add Service</h1>

<?php
echo $this->Form->create('Service');
echo $this->Form->input('name');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->input('provider', array('rows' => '3'));
echo $this->Form->end('Save Service');
?>
