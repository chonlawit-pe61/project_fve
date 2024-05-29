<?php
foreach ($subjects as  $key => $subject) {
?>
    <tr id="Subject<?php echo $key ?>">

        <td class="text-center">
            <?php echo $key + 1 ?>
            <input type="hidden" name="subject_id[<?php echo $key ?>]" value="<?php echo $subject['id'] ?>">
        </td>
        <td>
            <?php echo $subject['name'] ?>
        </td>
        <td class="text-center">
            <button type="button" class="btn btn-danger" onclick="RemoveEl(<?php echo $key ?>)"><i class="fa fa-trash" aria-hidden="true"></i></button>
        </td>
    </tr>
<?php
}
?>