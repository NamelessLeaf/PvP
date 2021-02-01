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
  
  public function onCommand(CommandSender $sender, Command $cmd, String $lable, Array $args) : bool {
    
    switch($cmd->getName()){
      case "playpvp":
        if($sender instanceof Player){
          $this->form($sender);
        }else{
          $sender->sendMessage("YOu Da Pig OO");
        }
    }
    return true;
  }
  
  public function form($player){
    $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
    $form = $api->createSimpleForm(function (Player $player, int $data = null){
      $result = $data;
      if($result === null){
        return true;
      }
      switch($result){
        case 0:
          $player->sendMessage("Bitch");
        break;
          
        case 1:
         $player->transfer($17.1.1.1, $19320);
        break;
      }
    });
    $form->setTitle("Play PvP");
    $form->setContent("Choose A PvP Gamemode");
    $form->addButton("Sumo");
    $form->addButton("1vs1");
    $form->addButton("Exit");
    $form->sendToPlayer($player);
    return $form;
  }
}
