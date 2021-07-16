<?php

declare(strict_types=1);

namespace xenialdan\xendevtools2;

use pocketmine\event\Listener;
use pocketmine\event\server\DataPacketSendEvent;
use pocketmine\network\mcpe\protocol\StartGamePacket;
use pocketmine\network\mcpe\protocol\types\BoolGameRule;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase implements Listener
{

	public function onEnable(): void
	{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onPacket(DataPacketSendEvent $event): void
	{
		foreach ($event->getPackets() as $packet) {
			if ($packet instanceof StartGamePacket) {
				$packet->gameRules['doweathercycle'] = new BoolGameRule(false, false);
			}
		}
	}
}