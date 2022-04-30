<?php

namespace davidglitch04\MPCScoreTag\listeners;

use davidglitch04\MPCScoreTag\Main;
use Ifera\ScoreHud\event\TagsResolveEvent;
use pocketmine\event\Listener;
use function count;
use function explode;

class TagResolveListener implements Listener{

	protected Main $plugin;

	public function __construct(Main $plugin){
		$this->plugin = $plugin;
	}

	public function onTagResolve(TagsResolveEvent $event){
		$tag = $event->getTag();
		$tags = explode('.', $tag->getName(), 2);
		$value = "";
		if($tags[0] !== 'mpcscore' || count($tags) < 2){
			return;
		}
		switch($tags[1]){
			case "players":
            case "slots":
				$value = $tag->getValue();
				break;
		}
		$tag->setValue((string) $value);
	}
}