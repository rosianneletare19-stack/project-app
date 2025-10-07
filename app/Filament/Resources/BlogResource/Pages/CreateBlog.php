<?php

namespace App\Filament\Resources\BlogResource\Pages;

use App\Filament\Resources\BlogResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlog extends CreateRecord
{
    protected static string $resource = BlogResource::class;

    public $categoryId;
    public $userId;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->categoryId = $data['category_id'];
        unset($data['category_id']);

        $this->userId = $data['user_id'];
        unset($data['user_id']);

        return $data;
    }
    protected function afterCreate():void{
        $this->record->category()->create(['category_id'=>$this->categoryId]);
        $this->record->user()->create(['user_id'=>$this->userId]);
    }
}
