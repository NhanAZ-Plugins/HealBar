<?php

declare(strict_types=1);

namespace HB;

final class HealthPopupFormatter{
	public static function damage(float $damage, float $health, float $maxHealth) : string{
		$color = $damage < 3 ? "§a" : ($damage < 6 ? "§e" : "§c");
		return $color . "-" . self::number($damage) . " Health\n§e" . self::number($health) . "/" . self::number($maxHealth);
	}

	public static function health(float $health, float $maxHealth) : string{
		$color = $health < 7 ? "§c" : ($health < 14 ? "§e" : "§a");
		return $color . self::number($health) . " / " . self::number($maxHealth);
	}

	private static function number(float $value) : string{
		$formatted = rtrim(rtrim(number_format(max(0.0, $value), 2, ".", ""), "0"), ".");
		return $formatted === "" ? "0" : $formatted;
	}
}
