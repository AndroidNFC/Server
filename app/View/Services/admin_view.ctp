<h1>
<?php echo h($service['Service']['name']); ?>

<p><small>Created: <?php echo $service['Service']['created']; ?></small></p>

<p><?php echo h($service['Service']['description']); ?></p>

<?php echo $this->Html->link("Add Tag", array(
                                'controller' => 'tags',
                                'action'     => 'add')); ?>

<p><strong>Tags associated with this service:</strong></p>
<table>
    <tr>
        <th>Id</th>
        <th>First Tag ID</th>
        <th>Last Tag ID</th>
        <th>Phone Number</th>
        <th>URL</th>
        <th>Action</th>
        <th>Created</th>
    </tr>

<?php foreach ($service['Tag'] as $tag): ?>

    <tr>
        <td><?php echo $this->Html->link($tag['id'], array(
            'action' => 'view', $tag['id'])); ?></td>
        <td><?php echo $tag['first_tag_id']; ?></td>
        <td><?php echo $tag['last_tag_id']; ?></td>
        <td><?php echo $tag['phone_number']; ?></td>
        <td><?php echo $tag['url']; ?></td>
        <td>
            <?php echo $this->Form->postLink('Delete',
                array('action' => 'delete', $tag['id']),
                array('confirm' => 'Are you sure?'));
            ?>  
            <?php echo $this->Html->link('Edit', array(
                'action' => 'edit', $tag['id'])); ?>
        </td>
        <td><?php echo $tag['created']; ?></td>
    </tr>

<?php endforeach; ?>

</table>
