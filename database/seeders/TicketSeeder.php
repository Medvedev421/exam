<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'user@test.com')->first();

        if (!$user) {
            return;
        }

        Ticket::firstOrCreate([
            'user_id' => $user->id,
            'subject' => 'Проблема с входом',
        ], [
            'message' => 'Не могу войти в систему',
            'status' => 'new',
        ]);

        Ticket::firstOrCreate([
            'user_id' => $user->id,
            'subject' => 'Ошибка на странице',
        ], [
            'message' => 'При открытии страницы возникает ошибка',
            'status' => 'in_work',
        ]);

        Ticket::firstOrCreate([
            'user_id' => $user->id,
            'subject' => 'Предложение по улучшению',
        ], [
            'message' => 'Добавить уведомления на email',
            'status' => 'done',
        ]);
    }
}
