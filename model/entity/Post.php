<?php


namespace app\model\entity;


use app\core\orm\DBModel;

class Post extends DBModel
{
    public ?int $id;

    public string $headline = '';

    public string $content_url = '';

    public ?int $user_id;

    public ?int $catalog_id;

    public string $created_date;

    public string $updated_date;

   public static function tableName(): string
   {
       return 'post';
   }

    public function attributes()
    {
        return ['headline', 'catalog_id', 'content_url', 'created_date', 'updated_date', 'user_id'];
    }

}