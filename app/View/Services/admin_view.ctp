<h1>
<?php echo h($service['Service']['name']); ?>

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
        <th>Created</th>
    </tr>

<?php foreach ($service['Tag'] as $tag): ?>

    <tr>
        <td><?php echo $tag['id']; ?></td>
        <td><?php echo $tag['first_tag_id']; ?></td>
        <td><?php echo $tag['last_tag_id']; ?></td>
        <td><?php echo $tag['created']; ?></td>
    </tr>

<?php endforeach; ?>

</table>
