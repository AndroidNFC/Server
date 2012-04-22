<h1>Manage Services</h1>
<p>
<?php echo $this->Html->link("Add Service", array('action' => 'add')); ?>
</p>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Action</th>
        <th>Description</th>
        <th>Provider</th>
        <th>Created</th>
    </tr>

<?php foreach ($services as $service): ?>

    <tr>
        <td><?php echo $service['Service']['id']; ?></td>
        <td><?php echo $this->Html->link($service['Service']['name'], array(
            'action' => 'view', $service['Service']['id'])); ?></td>
        <td>
            <?php echo $this->Form->postLink('Delete',
                array('action' => 'delete', $service['Service']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array(
                'action' => 'edit', $service['Service']['id'])); ?>
        </td>
        <td><?php echo $service['Service']['description']; ?></td>
        <td><?php echo $service['Service']['provider']; ?></td>
        <td><?php echo $service['Service']['created']; ?></td>
        <td></td>
    </tr>

<?php endforeach; ?>

</table>
