<?php

namespace CaptainKenji17;

use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\level\sound\AnvilFallSound;
use pocketmine\Server;
use pocketmine\entity\Effect;

class Main extends PluginBase implements Listener{
	public function onEnable(){
		$this->saveDefaultConfig();
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
        	$this->getServer()->getLogger()->info(TextFormat::BLUE . "Plugin Enabled!");
	}
	public function onHurt(EntityDamageEvent $event){
		if($event instanceof EntityDamageByEntityEvent){
			$damager = $event->getDamager();
			if($damager instanceof Player){
				if($damager->getInventory()->getItemInHand()->getId() === 280){
					$event->setKnockBack($this->getConfig()->get("KnockBack-Power"));
					$event->addEffect(Effect::getEffect(20)->setAmplifier(1)->setDuration(50)->setVisible(true));
                              $level = $damager->getLevel();
                              $damager->$getLevel->addSound(new AnvilFallSound($damager->getLocation()));     
				}
			}
		}
	}
public function onItemHeld(PlayerItemHeldEvent $ev){
if($ev->getPlayer()->getInventory()->getItemInHand()->getId() === 280){
$ev->getPlayer()->sendTip("§bStick§cPower §aEnabled!");
}
}
}
