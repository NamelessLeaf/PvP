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
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;


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
          $sender->sendMessage("You Da Pig OO");
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
          $player->sendMessage("Sumo Comming Soon");
        break;
          
        case 1:
         $player->transfer("us1.falixnodes.net", 27198);
        break;
        
        case 2:
          $player->transfer("us1.falixnodes.net", 26473);
        break;
          
        case 3:
          $player->sendMessage("Free For All Not Out Yet")
        break;
      }
    });
    $form->setTitle("Play PvP");
    $form->setContent("Choose A PvP Gamemode");
    $form->addButton("Sumo");
    $form->addButton("1vs1");
    $form->addButton("Teams PvP");
    $form->addButton("FFA");
    $form->addButton("Exit");
    $form->sendToPlayer($player);
    return $form;
  }
}
