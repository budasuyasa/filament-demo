<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions\Action;

class ViewStudent extends ViewRecord
{
    protected static string $resource = StudentResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Action::make('edit')
                ->url(route('filament.admin.resources.students.edit', ['record' => $this->record['id']])),
            Action::make('delete')
                ->color('danger')
                ->requiresConfirmation()
                ->action(function(){
                    $this->record->delete();
                    return redirect()->route('filament.admin.resources.students.index');
                }),
        ];
    }
}
