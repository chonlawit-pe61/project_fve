<?php
foreach ($subjects as  $key => $subject) {
?>
    <tr id="Subject<?php echo $key ?>">

        <td class="text-center">
            <?php echo $key + 1 ?>
            <input type="hidden" name="subject_id" value="<?php echo $subject['id'] ?>">
        </td>
        <td>
            <?php echo $subject['name'] ?>
        </td>
        <td class="text-center">
            <button class="btn btn-danger" onclick="RemoveEl(<?php echo $key ?>)">ลบ</button>
        </td>
    </tr>
<?php
}
?>