<div class="eav-group-input">
    <?php foreach ($models as $groupId => $model): ?>
    <div class="row">
        <div class="<?= $itemWrapClass ?>">
            <?= $form->field($model, "[{$groupId}]name")->textInput(['maxlength' => true]) ?>
        </div>

        <?php if(array_key_exists($groupId, $fields)): ?>
            <?php foreach ($fields[$groupId] as $field): ?>
                <div class="<?= $itemWrapClass ?>">
                    <?= $field ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>
</div>