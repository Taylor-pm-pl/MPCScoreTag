<?php

namespace davidglitch04\MPCScoreTag\listeners;

use davidglitch04\MPCScoreTag\Main;
use davidglitch04\MultiPlayerCounter\Event\MaxSlotUpdateEvent;
use davidglitch04\MultiPlayerCounter\Event\PlayerMergedEvent;
use Ifera\ScoreHud\event\ServerTagUpdateEvent;
use Ifera\ScoreHud\scoreboard\ScoreTag;
use pocketmine\event\Listener;

class EventListener implements Listener{

	protected Main $plugin;

	public function __construct(Main $plugin){
		$this->plugin = $plugin;
	}

	public function onMergedPlayer(PlayerMergedEvent $event){
		(new ServerTagUpdateEvent(new ScoreTag("mpcscore.players", (string) $event->getPlayers())));
	}

    public function onUpdateSlot(MaxSlotUpdateEvent $event){
		(new ServerTagUpdateEvent(new ScoreTag("mpcscore.slots", (string) $event->getSlots())));
    }
}