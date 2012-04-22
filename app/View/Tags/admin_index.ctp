<h1>Manage Tags</h1>
<p>
<?php echo $this->Html->link("Add Tags", array('action' => 'add')); ?>
</p>

<table>
    <tr>
        <th>Id</th>
        <th>Service</th>
        <th>First Tag ID</th>
        <th>Last Tag ID</th>
        <th>Action</th>
        <th>Created</th>
    </tr>

<?php foreach ($tags as $tag): ?>

    <tr>
        <td><?php echo $tag['Tag']['id']; ?></td>
        <td><?php echo $tag['Service']['name']; ?></td>
        <td><?php echo $tag['Tag']['first_tag_id']; ?></td>
        <td><?php echo $tag['Tag']['last_tag_id']; ?></td>
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
