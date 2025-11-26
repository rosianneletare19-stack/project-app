<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->label('Gambar')
                    ->directory('blogs') // Direktori di storage/app/public/
                    ->image()
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),

                // SOLUSI: Menggunakan relationship() yang memanfaatkan belongsTo di Model
                Select::make('category_id')
                    ->label('Kategori')
                    // Relasi: 'category', Kolom Tampilan: 'category_name'
                    ->relationship('category', 'category_name') 
                    ->required(),

                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->columnSpanFull(),

                // SOLUSI: Menggunakan relationship() yang memanfaatkan belongsTo di Model
                Select::make('user_id')
                    ->label('Author')
                    // Relasi: 'user', Kolom Tampilan: 'name'
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    // SOLUSI GAMBAR: Mengarahkan ke disk public
                    ->disk('public'), 

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),

                // SOLUSI RELASI KATEGORI: Relasi tunggal 'category'
                Tables\Columns\TextColumn::make('category.category_name') 
                    ->label('Kategori')
                    ->sortable()
                    ->searchable(),

                // SOLUSI RELASI AUTHOR: Relasi tunggal 'user'
                Tables\Columns\TextColumn::make('user.name') 
                    ->label('Author')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(80)
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}