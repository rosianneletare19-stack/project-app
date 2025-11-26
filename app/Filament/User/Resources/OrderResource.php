<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\OrderResource\Pages;
use Filament\Navigation\NavigationItem;
use App\Filament\User\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use App\Models\Product;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $navigationGroup = 'Transaction';

    protected static ?string $navigationLabel = 'Ticket';

    protected static ?string $slug = 'tickets';

    public $snap_token;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->label('Ticket')
                    ->live(onBlur: true)
                    ->options(Product::all()->pluck('product_name', 'id'))
                    ->afterStateUpdated(function (Set $set, $state, $get) {
                        $qty = $get('qty');

                        if ($qty && $state) {
                            $product = Product::find($state);
                            if ($product) {
                                $totalAmount = $product->price * $qty;
                                $set('total_amount', $totalAmount); // Set total_amount
                            } else {
                                $set('total_amount', null); // Jika produk tidak ditemukan
                            }
                        } else {
                            $set('total_amount', null); // Jika qty kosong atau produk belum dipilih
                        }
                    })
                    ->required(),
                Forms\Components\DatePicker::make('date_of_visit')
                    ->required(),
                Forms\Components\TextInput::make('qty')
                    ->label('Qty')
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Set $set, $state, $get) {
                        $product_id = $get('product_id');

                        // Pastikan ada ID produk yang dipilih dan qty yang diisi
                        if ($product_id && $state) {
                            // Cari produk berdasarkan ID
                            $product = Product::find($product_id);
                            if ($product) {
                                // Kalikan harga produk dengan qty
                                $totalAmount = $product->price * $state;
                                $set('total_amount', $totalAmount); // Set total_amount
                            } else {
                                $set('total_amount', null); // Jika produk tidak ditemukan
                            }
                        } else {
                            $set('total_amount', null); // Jika qty kosong atau produk belum dipilih
                        }
                    })
                    ->required(),
                Forms\Components\TextInput::make('total_amount')
                    ->prefix('Rp')
                    ->readOnly()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('invoice_number')
                    ->label('Invoice')
                    ->sortable(),
                Tables\Columns\TextColumn::make('orderItem.product.product_name')
                    ->label('Ticket')
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_of_visit')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('orderItem.quantity')
                    ->label('Qty'),
                Tables\Columns\TextColumn::make('ticket_status')
                    ->label('Ticket Status')
                    ->badge()
                    ->colors([
                        'success' => 'tersedia',
                        'danger' => 'terpakai',
                    ])
                    ->sortable(),
                 Tables\Columns\TextColumn::make('payment_status')
                    ->label('Payment Status')
                    ->badge()
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'success',
                        'danger' => 'canceled',
                    ])
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_amount')
                    ->label('Total')
                    ->money('IDR', true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('bayar')
                ->label('Bayar')
                ->icon('heroicon-o-credit-card')
                ->color('success')
                ->action(function ($record) {
                    return redirect()->route('view-detail-ticket', $record->invoice_number);
                })
                ->visible(fn (Order $record) => $record->payment_status === 'pending'),
                Tables\Actions\Action::make('view')
                ->label('View')
                ->icon('heroicon-o-eye')
                ->color('gray')
                ->action(function ($record) {
                    return redirect()->route('view-detail-ticket', $record->invoice_number);
                })
                ->visible(fn (Order $record) => $record->payment_status === 'success'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

   public static function getNavigationItems(): array
    {
        return [
            NavigationItem::make('Ticket')
                ->url(static::getUrl('index'))
                ->icon('heroicon-o-ticket')
                ->group('Transaction')
                ->isActiveWhen(fn () => request()->is('user/tickets/create'))
                ->label('Ticket'),

            NavigationItem::make('List Order')
                ->url(static::getUrl('list'))
                ->icon('heroicon-o-shopping-cart')
                ->group('Transaction')
                ->isActiveWhen(fn () => request()->is('user/tickets/list-order'))
                ->label('List Orders'),
        ];
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\CreateOrder::route('/create'),
            'list' => Pages\ListOrders::route('/list-order'),
        ];
    }
}