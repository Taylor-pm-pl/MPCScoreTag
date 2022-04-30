<?php

namespace davidglitch04\MPCScoreTag;

use davidglitch04\MPCScoreTag\listeners\EventListener;
use davidglitch04\MPCScoreTag\listeners\TagResolveListener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{

	protected function onEnable(): void{
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
		$this->getServer()->getPluginManager()->registerEvents(new TagResolveListener($this), $this);
	}
}