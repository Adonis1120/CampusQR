<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'admin';
    case STUDENT = 'student';

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Admin (System Administrator)',
            self::STUDENT => 'Student (Regular User)',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function options(): array
    {
        return array_combine(
            self::values(),
            array_map(fn ($role) => $role->label(), self::cases())
        );
    }
}
