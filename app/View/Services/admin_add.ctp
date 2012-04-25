<h1>Add Service</h1>

<?php
echo $this->Form->create('Service');
echo $this->Form->inputs(array(
    'name' => array(),
    'description' => array('rows' => '3'),
    'provider' => array('rows' => '3'),
    'Tag.number_of_tags' => array(
        'label' => 'Quantity of Tags',
        'type'  => 'number',
    ),
));

?>

<!--
<fieldset>
<legend>Add Buttons</legend>
<?php
echo $this->Form->inputs(array(
    'Button.0.type' => array(),
    'Button.0.value' => array(),
    'legend' => "",
));
?>
</fieldset>

<fieldset>
<legend>Add Events</legend>
<?php
echo $this->Form->inputs(array(
    'Event.0.type' => array(),
    'Event.0.value' => array(),
    'legend' => "",
));
?>
</fieldset>
-->

<?php
echo $this->Form->end('Save Service');

/*
echo $this->Form->input('name');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->input('provider', array('rows' => '3'));
echo $this->Form->input('Tag');
echo $this->Form->input('Button');
echo $this->Form->input('Event');
echo $this->Form->end('Save Service');
*/

?>
