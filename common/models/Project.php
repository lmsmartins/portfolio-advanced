<?php

namespace common\models;

use Yii;
use yii\helpers\Html;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $name
 * @property string $tech_stack
 * @property string $description
 * @property string|null $start_date
 * @property string|null $end_date
 *
 * @property ProjectImage[] $images
 * @property Testimonial[] $testimonials
 */
class Project extends \yii\db\ActiveRecord
{

    /**
     * @var UploadedFile
     */
    public $imageFiles;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'tech_stack', 'description'], 'required'],
            [['tech_stack', 'description'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'tech_stack' => Yii::t('app', 'Tech Stack'),
            'description' => Yii::t('app', 'Description'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
        ];
    }

    /**
     * Gets query for [[ProjectImages]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(ProjectImage::class, ['project_id' => 'id']);
    }

    /**
     * Gets query for [[Testimonials]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getTestimonials()
    {
        return $this->hasMany(Testimonial::class, ['project_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ProjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectQuery(get_called_class());
    }

    public function saveImages()
    {
        Yii::$app->db->transaction(function ($db) {
            /**
             * @var $db yii\db\Connection
             */
            foreach ($this->imageFiles as $imageFile) {
                /**
                 * @var $imageFile UploadedFile
                 */
                $file = new File();
                $file->name = uniqid(true) . '.' . $imageFile->extension;
                $file->path_url = Yii::$app->params['uploads']['projects'];
                $file->base_url = Yii::$app->urlManager->createAbsoluteUrl($file->path_url);
                $file->mime_type = mime_content_type($imageFile->tempName);
                $file->save();

                $projectImage = new ProjectImage();
                $projectImage->project_id = $this->id;
                $projectImage->file_id = $file->id;
                $projectImage->save();

                $thumbnail = Image::thumbnail($imageFile->tempName, null, 1080);
                $didSave = $thumbnail->save($file->path_url . '/' . $file->name);
                if (!$didSave) {
                    $db->transaction->rollBack();
                }
            }
        });
    }

    public function hasImages()
    {
        return count($this->images) > 0;
    }

    public function imageAbsoluteUrls()
    {
        $urls = [];
        foreach ($this->images as $image) {
            $urls[] = $image->file->absoluteUrl();
        }
        return $urls;
    }

    public function imageConfigs()
    {
        $configs = [];
        foreach ($this->images as $image) {
            $configs[] = [
                'key' => $image->id,
            ];
        }
        return $configs;
    }

    public function loadUploadedImageFiles()
    {
        $this->imageFiles = UploadedFile::getInstances($this, 'imageFiles');
    }

    public function delete()
    {
        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();
        try {
            foreach ($this->images as $image) {
                $image->file->deleteInternal();
            }
            parent::deleteInternal();
            $transaction->commit();
            return true;
        } catch (\Exception $e) {
            $transaction->rollBack();
            Yii::$app->session->setFlash('danger', Yii::t('app', 'Failed to delete'));
            return false;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            Yii::$app->session->setFlash('danger', Yii::t('app', 'Failed to delete'));
            return false;
        }
    }

    public function carouselImages()
    {
        return array_map(function ($projectImage) {
            return Html::img($projectImage->file->absoluteUrl(), [
                'alt' => $this->name,
                'class' => 'project-view__carousel-image'
            ]);
        }, $this->images);
    }

}
