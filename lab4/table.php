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
        <?php if($cell): ?>
        <i class="material-icons green-text">done</i>
        <?php else: ?>
          <i class="material-icons red-text">close</i>
          <?php endif; ?>
        <?php else: ?>
          <?= $cell ?>
        <?php endif; ?>
      </td>        
      <?php endforeach; ?>    
      <td>
        <form action="delete.php" method="post">
          <input type="hidden" name="userId" value="<?= $row['userId']; ?>">
          <input type="hidden" name="id" value="<?= $row['id']; ?>">
          <button class="waves-effect waves-light red lighten-4 btn">
            <i class="material-icons red-text">close</i>
          </button>
        </form>
      </td>
    </tr>  
    <?php endforeach; ?>    
  </tbody>
</table>