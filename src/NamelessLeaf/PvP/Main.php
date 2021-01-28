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
    public function From($player){
        $plugin = $this->getServer()->getPluginManager();
        $formapi = $plugin->getPlugin("FormAPI");
        $form = $formapi->createSimpleForm(function (Player $event, array $args){
            $result = $args[0];
            $player = $event->getPlayer();
            if($result === null){
            }
            switch($result){
                case 0:
                    return;
                case 1:
                    $this->enableForm($player);
                    return;
                case 2:
                    $this->disableForm($player);
                    return;
            }
        });
        $form->setTitle(TF::BOLD . TF::BLACK . "FlyUI Menu");
        $form->setContent(TF::GRAY . "Enable/Disable Fly Mode!");
        $form->addButton(TF::GREEN . "Enable");
        $form->addButton(TF::RED . "Disable");
        $form->addButton(TF::WHITE . "Cancel");
        $form->sendToPlayer($player);
    }  
}
