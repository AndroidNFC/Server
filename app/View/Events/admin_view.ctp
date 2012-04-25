<h1>Event <?php echo h($event['Event']['id']); ?></h1>

<table>
    <tr>
        <th>Id</th>
        <th>Type</th>
        <th>Value</th>
        <th>Created</th>
    </tr>
    <tr>
        <td><?php echo $event['Event']['id']; ?></td>
        <td><?php echo $event['Event']['type']; ?></td>
        <td><?php echo $event['Event']['value']; ?></td>
        <td><?php echo $event['Event']['created']; ?></td>
    </tr>
</table>
