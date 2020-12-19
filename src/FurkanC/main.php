<?php

namespace FurkanC;

 use pocketmine\command\{CommandSender, Command};
  use pocketmine\plugin\Plugin;
  use pocketmine\plugin\PluginBase;
  use pocketmine\Player;
  use pocketmine\Server; 
  use pocketmine\level\Position;
  use jojoe77777\FormAPI\FormAPI;

class main extends PluginBase{
  
  public function onEnable(){
    $this->getLogger()->info("Plugin aktif");
  }
  public function onDisable(){
    $this->getLogger()->info("Plugin kapalı");
  }
  public function onCommand(CommandSender $sender, Command $komut, string $label, array $args): bool {
    if($komut->getName() === "warp"){
        $this->Form($sender);
    }
    return true;
  }
  public function Form(Player $oyuncu){
    $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
    $form = $api->createSimpleForm(function(Player $oyuncu, $veri){
    if(is_null($veri)){
      return;
    }
    switch($veri){
        case 0:
          //Oyuncu ışınlanınca göndereceği mesaj
        $oyuncu->sendMessage("Bolge-1");
        //oyuncunun ışınlanacağı koordinatlar
        $oyuncu->teleport(new Position(x, y, z, Server::getInstance()->getLevelByName("world")));
        break;
    case 1:
          //Oyuncu ışınlanınca göndereceği mesaj
        $oyuncu->sendMessage("Bolge-2");
        //oyuncunun ışınlanacağı koordinatlar
        $oyuncu->teleport(new Position(x, y, z, Server::getInstance()->getLevelByName("world")));
        break;
      case 2:
          //Oyuncu ışınlanınca göndereceği mesaj
        $oyuncu->sendMessage("Bolge-3");
        //oyuncunun ışınlanacağı koordinatlar
        $oyuncu->teleport(new Position(x, y, z, Server::getInstance()->getLevelByName("world")));
        break;
      
    }
    });
  $form->setTitle("WarpUI");
  $form->addButton("bolge1");
  $form->addButton("bolge2");
  $form->addButton("Sbolge3");
  $form->sendToPlayer($oyuncu);
  }
}



