<h1>Services</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Provider</th>
        <th>Created</th>
    </tr>

<?php foreach ($services as $service): ?>

    <tr>
        <td><?php echo $service['Service']['id']; ?></td>
        <td><?php echo $service['Service']['name']; ?></td>
        <td><?php echo $service['Service']['description']; ?></td>
        <td><?php echo $service['Service']['provider']; ?></td>
        <td><?php echo $service['Service']['created']; ?></td>
    </tr>

<?php endforeach; ?>

</table>
