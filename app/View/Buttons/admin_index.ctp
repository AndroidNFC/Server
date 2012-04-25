<h1>Manage Buttons</h1>
<p>
<?php echo $this->Html->link("Add Button", array('action' => 'add')); ?>
</p>

<table>
    <tr>
        <th>Service ID</th>
        <th>Tags</th>
        <th>Type</th>
        <th>Value</th>
        <th>Created</th>
    </tr>

<?php foreach ($buttons as $button): ?>

    <tr>
        <td><?php echo $button['Tag']['service_id']; ?></td>
        <td>
            <?php echo $button['Tag']['first_tag_id']; ?>-
            <?php echo $button['Tag']['last_tag_id']; ?>
        </td>
        <td><?php echo $button['Button']['type']; ?></td>
        <td><?php echo $button['Button']['value']; ?></td>
        <td><?php echo $button['Button']['created']; ?></td>
    </tr>

<?php endforeach; ?>

</table>
