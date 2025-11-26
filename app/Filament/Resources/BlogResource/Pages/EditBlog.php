<?php

namespace App\Filament\Resources\BlogResource\Pages;

use App\Filament\Resources\BlogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlog extends EditRecord
{
    protected static string $resource = BlogResource::class;
    public $categoryId;
    public $userId;
    protected function mutateFormDataBeforeFill(array $data): array
    {
        //syntax memanggil relasi category
        $this->record->loadMissing(relations:['category']);
        if($this->record->category->first())
        {
            $data['category_id']= $this->record->category->first()->category_id;
        }

        $this->record->loadMissing(relations:['user']);
        if($this->record->user->first())
        {
            $data['user_id'] = $this->record->user->first()->user_id;
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->categoryId = $data['category_id'];
        unset($data['category_id']);
        
        $this->userId = $data['user_id'];
        unset($data['user_id']);

        return $data;
    }

    protected function afterSave(): void
    {
        if($this->record->category()->exists())
        {
            $this->record->category()->delete();
        }
        $this->record->category()->create(['category_id' => $this->categoryId]);


        if($this->record->user()->exists())
        {
            $this->record->user()->delete();
        }
        $this->record->user()->create(['user_id' => $this->userId]);
        
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}