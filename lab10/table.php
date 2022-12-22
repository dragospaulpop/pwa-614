<?php
  require_once('./secure.php');
?>
<?php
  if (isset($loggedIn) && $loggedIn):
?>
<table>
  <thead>
    <tr>
      <?php foreach($keys as $key): ?>
        <th><?= $key; ?></th>
      <?php endforeach; ?>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($toDos as $row): ?>
    <tr>
      <?php foreach($row as $key=>$cell): ?>
      <td>
        <?php if($key==="completed"): ?>
          <form action="toggleCompleted.php" method="post" style="display: inline-block">
            <input type="hidden" name="id" value="<?= $row['id']; ?>">
            <button class="waves-effect waves-light btn btn-flat">
              <?php if($cell): ?>
                <i class="material-icons green-text">done</i>
              <?php else: ?>
                <i class="material-icons red-text">close</i>
              <?php endif; ?>
            </button>
          </form>
        <?php else: ?>
          <?= $cell ?>
        <?php endif; ?>
      </td>
      <?php endforeach; ?>
      <td>
        <form action="delete.php" method="post" style="display: inline-block">
          <input type="hidden" name="id_user" value="<?= $row['id_user']; ?>">
          <input type="hidden" name="id" value="<?= $row['id']; ?>">
          <button class="waves-effect waves-light red lighten-4 btn">
            <i class="material-icons red-text">delete</i>
          </button>
        </form>
        <form action="editForm.php" method="get" style="display: inline-block">
          <input type="hidden" name="id_user" value="<?= $row['id_user']; ?>">
          <input type="hidden" name="id" value="<?= $row['id']; ?>">
          <button class="waves-effect waves-light blue lighten-4 btn">
            <i class="material-icons blue-text">edit</i>
          </button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>