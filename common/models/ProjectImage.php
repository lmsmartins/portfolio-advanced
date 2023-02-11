<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project_image".
 *
 * @property int $id
 * @property int $project_id
 * @property int $file_id
 *
 * @property File $file
 * @property Project $project
 */
class ProjectImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'file_id'], 'required'],
            [['project_id', 'file_id'], 'integer'],
            [['file_id'], 'exist', 'skipOnError' => true, 'targetClass' => File::className(), 'targetAttribute' => ['file_id' => 'id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'project_id' => Yii::t('app', 'Project ID'),
            'file_id' => Yii::t('app', 'File ID'),
        ];
    }

    /**
     * Gets query for [[File]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFile()
    {
        return $this->hasOne(File::className(), ['id' => 'file_id']);
    }

    /**
     * Gets query for [[Project]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }
}
