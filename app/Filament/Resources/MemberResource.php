<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Member;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MemberResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MemberResource\RelationManagers;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                ->label('Social Media')
                ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('designation')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->minSize(20)
                    ->maxSize(1024)
                    ->label('Memeber Image'),
                    Forms\Components\Select::make('status')
                    ->options([
                        1 => 'Active',
                        0 => 'Block',
                    ])
                ]),

                Group::make()
                ->label('Social Media')
                ->schema([
                Forms\Components\TextInput::make('fb_url')
                    ->maxLength(255)
                    ->url()
                    ->label('Facebook URL')
                    ->placeholder('https://www.facebook.com/username'),
                Forms\Components\TextInput::make('tw_url')
                    ->maxLength(255)
                    ->url()
                    ->label('Twitter URL')
                    ->placeholder('https://www.twitter.com/username'),
                Forms\Components\TextInput::make('in_url')
                    ->maxLength(255)
                    ->url()
                    ->label('Instagram URL')
                    ->placeholder('https://www.instagram.com/username'),

                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('designation')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->width('100px'),
                    Tables\Columns\IconColumn::make('status')
                    ->label('Status')
                    ->boolean(),
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
