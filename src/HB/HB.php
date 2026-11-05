<?php

declare(strict_types=1);

namespace HB;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\ClosureTask;
use pocketmine\utils\TextFormat;
use pocketmine\world\particle\FloatingTextParticle;
use pocketmine\world\World;
use pocketmine\math\Vector3;

final class HB extends PluginBase implements Listener{
	protected function onEnable() : void{
		$this->getLogger()->info("HealBar enabled.");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	/**
	 * @priority MONITOR
	 */
	public function onDamage(EntityDamageEvent $event) : void{
		if($event->isCancelled()){
			return;
		}
		$entity = $event->getEntity();
		$damage = max(0.0, $event->getFinalDamage());
		$this->getScheduler()->scheduleDelayedTask(new ClosureTask(function() use ($entity, $damage) : void{
			if($entity->isClosed()){
				return;
			}
			$position = $entity->getPosition();
			$world = $entity->getWorld();
			$health = max(0.0, $entity->getHealth());
			$maxHealth = (float) $entity->getMaxHealth();

			$this->showForOneSecond(
				$world,
				$position->add(0, 1, 0),
				HealthPopupFormatter::damage($damage, $health, $maxHealth)
			);
			$this->showForOneSecond(
				$world,
				$position->add(0, 2.5, 0),
				HealthPopupFormatter::health($health, $maxHealth)
			);
		}), 1);
	}

	private function showForOneSecond(World $world, Vector3 $position, string $text) : void{
		$particle = new FloatingTextParticle($text);
		$world->addParticle($position, $particle);
		$this->getScheduler()->scheduleDelayedTask(new ClosureTask(function() use ($world, $position, $particle) : void{
			$particle->setInvisible();
			$world->addParticle($position, $particle);
		}), 20);
	}
}
