<h1>Event <?php echo h($button['Button']['id']); ?></h1>

<table>
    <tr>
        <th>Id</th>
        <th>Type</th>
        <th>Value</th>
        <th>Created</th>
    </tr>
    <tr>
        <td><?php echo $button['Button']['id']; ?></td>
        <td><?php echo $button['Button']['type']; ?></td>
        <td><?php echo $button['Button']['value']; ?></td>
        <td><?php echo $button['Button']['created']; ?></td>
    </tr>
</table>
