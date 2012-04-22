<h1>Tags</h1>

<table>
    <tr>
        <th>Id</th>
        <th>First Tag ID</th>
        <th>Last Tag ID</th>
        <th>Created</th>
    </tr>

<?php foreach ($tags as $tag): ?>

    <tr>
        <td><?php echo $tag['Tag']['id']; ?></td>
        <td><?php echo $tag['Tag']['first_tag_id']; ?></td>
        <td><?php echo $tag['Tag']['last_tag_id']; ?></td>
        <td><?php echo $tag['Tag']['created']; ?></td>
    </tr>

<?php endforeach; ?>

</table>
