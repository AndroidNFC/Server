<h1>Manage Events</h1>
<p>
<?php echo $this->Html->link("Add Event", array('action' => 'add')); ?>
</p>

<table>
    <tr>
        <th>Service ID</th>
        <th>Tags</th>
        <th>Type</th>
        <th>Value</th>
        <th>Created</th>
    </tr>

<?php foreach ($events as $event): ?>

    <tr>
        <td><?php echo $event['Tag']['service_id']; ?></td>
        <td>
            <?php echo $event['Tag']['first_tag_id'].'-'.
                       $event['Tag']['last_tag_id']; ?>
        </td>
        <td><?php echo $event['Event']['type']; ?></td>
        <td><?php echo $event['Event']['value']; ?></td>
        <td><?php echo $event['Event']['created']; ?></td>
    </tr>

<?php endforeach; ?>

</table>
