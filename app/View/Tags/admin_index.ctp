<h1>Manage Tags</h1>
<p>
<?php echo $this->Html->link("Add Tag", array('action' => 'add')); ?>
</p>

<table>
    <tr>
        <th>Id</th>
        <th>First Tag ID</th>
        <th>Last Tag ID</th>
        <th>Phone number</th>
        <th>URL</th>
        <th>Action</th>
        <th>Created</th>
    </tr>

<?php foreach ($tags as $tag): ?>

    <tr>
        <td><?php echo $this->Html->link($tag['Tag']['id'], array(
            'action' => 'view', $tag['Tag']['id'])); ?></td>
        <td><?php echo $tag['Tag']['first_tag_id']; ?></td>
        <td><?php echo $tag['Tag']['last_tag_id']; ?></td>
        <td><?php echo $tag['Tag']['phone_number']; ?></td>
        <td><?php echo $tag['Tag']['url']; ?></td>
        <td>
            <?php echo $this->Form->postLink('Delete',
                array('action' => 'delete', $tag['Tag']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array(
                'action' => 'edit', $tag['Tag']['id'])); ?>
        </td>
        <td><?php echo $tag['Tag']['created']; ?></td>
    </tr>

<?php endforeach; ?>

</table>
