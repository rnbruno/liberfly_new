<?php

namespace App\Enums;

enum InativoGeral: int
{
    case Ativado = 0;
    case Desativado = 1;

    public static function fromValue(string $name): string
    {
        foreach (self::cases() as $status) {
            if ($name === $status->name) {
                return $status->value;
            }
        }

        throw new \ValueError("$status is not a valid");
    }
}
