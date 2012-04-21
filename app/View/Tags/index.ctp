<h1>Tags</h1>
<p>
<?php echo $this->Html->link("Add Tag", array('action' => 'add')); ?>
</p>

<table>
    <tr>
        <th>Id</th>
        <th>First tag id</th>
        <th>Last tag id</th>
        <th>Content</th>
        <th>Phone number</th>
        <th>URL</th>
        <th>Created</th>
    </tr>

<?php foreach ($tags as $tag): ?>

    <tr>
        <td><?php echo $tag['Tag']['id']; ?></td>
        <td><?php echo $this->Html->link($tag['Tag']['name'], array(
            'action' => 'view', $tag['Tag']['id'])); ?></td>
        <td>
            <?php echo $this->Form->postLink('Delete',
                array('action' => 'delete', $tag['Tag']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array(
                'action' => 'edit', $tag['Tag']['id'])); ?>
        </td>
        <td><?php echo $tag['Tag']['description']; ?></td>
        <td><?php echo $tag['Tag']['provider']; ?></td>
        <td><?php echo $tag['Tag']['created']; ?></td>
        <td></td>
    </tr>

<?php endforeach; ?>

</table>
