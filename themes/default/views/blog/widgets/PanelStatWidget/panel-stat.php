<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => Yii::t('BlogModule.blog', 'Blogs'),
        'headerIcon' => 'icon-pencil'
    )
);?>
    <div class="row-fluid">
        <div class="span2">
            <?php
            $this->widget(
                'bootstrap.widgets.TbButton',
                array(
                    'buttonType' => 'link',
                    'type' => 'success',
                    'size' => 'mini',
                    'url' => array('/blog/postBackend/create'),
                    'label' => Yii::t('BlogModule.blog', 'New post')
                )
            ); ?>
        </div>
    </div>

    <div class="row-fluid">

        <div class="span8">

            <?php $this->widget(
                'bootstrap.widgets.TbExtendedGridView',
                array(
                    'id' => 'post-grid',
                    'type' => 'striped condensed',
                    'dataProvider' => $dataProvider,
                    'template' => '{items}',
                    'htmlOptions' => array(
                        'class' => false
                    ),
                    'columns' => array(
                        array(
                            'name' => 'title',
                            'value' => 'CHtml::link($data->title, array("/blog/postBackend/update","id" => $data->id))',
                            'type' => 'html'
                        ),
                        array(
                            'name' => 'status',
                            'value' => '$data->getStatus()',
                        ),
                    ),
                )
            ); ?>

        </div>

        <div class="span4">
            <div class="row-fluid">

                <div class="span6">
                    <div>
                        <?php echo Yii::t('BlogModule.blog', 'Posts (last day / all)'); ?>:
                    </div>
                    <br/>

                    <div>
                        <?php echo Yii::t('BlogModule.blog', 'Comments (last day / all)'); ?>:
                    </div>
                </div>

                <div class="span6 pull-right">
                    <div>
                        <span class="badge badge-success"><?php echo $postsCount; ?></span>
                        <span class="badge badge-info"><?php echo $allPostsCnt; ?></span>
                    </div>
                    <br/>

                    <div>
                        <span class="badge badge-success"><?php echo $commentCount; ?></span>
                        <span class="badge badge-info"><?php echo $allCommentCnt; ?></span>
                    </div>
                </div>

            </div>
        </div>

    </div>
<?php $this->endWidget(); ?>