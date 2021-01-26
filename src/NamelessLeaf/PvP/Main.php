<?php

namespace NamelessLeaf\PvP;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use jojoe77777\FormAPI;

class Main extends PluginBase implements Listener {
  
  public function onEnable(){
    $this->getLogger()->info("Enabled");
  }
  
  public function onDisable(){
    $this->getLogger()->info("Disabled");
  }
  
$api = Server::getInstance()->getPluginManager()->getPlugin("FormAPI");
if ($api === null || $api->isDisabled()) {
}
$form = $api->createSimpleForm(function (Player $sender, array $data) {
$result = $data[0];
if ($result === null) {
return true;
}
switch ($result) {
case 0:
Server::getInstance()->dispatchCommand($sender, "command");
break;
case 1:
Server::getInstance()->dispatchCommand($sender, "command");
break;
case 2:
Server::getInstance()->dispatchCommand($sender, "command");
break;
case 3:
Server::getInstance()->dispatchCommand($sender, "command");
break;

}
return false;
});
$form->setTitle("");
$form->setContent("");
$form->addButton("Button1");
$form->addButton("Button2");
$form->addButton("Button3");
$form->addButton("Button4");
$form->sendToPlayer($player);
}
}
