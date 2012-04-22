<h1>Tag <?php echo h($tag['Tag']['id']); ?></h1>

<table>
    <tr>
        <th>Id</th>
        <th>First Tag ID</th>
        <th>Last Tag ID</th>
        <th>Created</th>
    </tr>
    <tr>
        <td><?php echo $tag['Tag']['id']; ?></td>
        <td><?php echo $tag['Tag']['first_tag_id']; ?></td>
        <td><?php echo $tag['Tag']['last_tag_id']; ?></td>
        <td><?php echo $tag['Tag']['created']; ?></td>
    </tr>
</table>
