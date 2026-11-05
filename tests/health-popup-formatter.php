<?php

declare(strict_types=1);

require dirname(__DIR__) . "/src/HB/HealthPopupFormatter.php";

use HB\HealthPopupFormatter;

$cases = [
	[HealthPopupFormatter::damage(2.0, 8.0, 20.0), "§a-2 Health\n§e8/20"],
	[HealthPopupFormatter::damage(3.5, 2.5, 20.0), "§e-3.5 Health\n§e2.5/20"],
	[HealthPopupFormatter::damage(7.25, 0.0, 20.0), "§c-7.25 Health\n§e0/20"],
	[HealthPopupFormatter::health(6.5, 20.0), "§c6.5 / 20"],
	[HealthPopupFormatter::health(10.0, 20.0), "§e10 / 20"],
	[HealthPopupFormatter::health(20.0, 20.0), "§a20 / 20"]
];
foreach($cases as [$actual, $expected]){
	if($actual !== $expected){
		throw new RuntimeException("Unexpected health popup: " . $actual);
	}
}

echo "Health popup formatting checks passed.\n";
