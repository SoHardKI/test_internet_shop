<?php

use yii\helpers\Url;

?>
<option
    value="<?= $category['id'] ?>"
    <?php if ($category['id'] == $this->model->catefory_id) echo 'selected' ?>
><?= $tab . $category['name'] ?></option>
<?php if (isset($category['childs'])): ?>
    <ul>
        <?= $this->getMenuhtml($category['childs'], $tab . '-') ?>
    </ul>
<?php endif; ?>
