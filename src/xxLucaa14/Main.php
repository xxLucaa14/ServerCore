<?php

namespace xxLucaa14;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\Level\LevelTimings;
use pocketmine\Level;

class Main extends PluginBase implements Listener {
    
    public $fly = false;
    
    public function onEnable()
    {
        $this->getLogger()->info("Plugin wurde erfolgreich aktiviert..");
    }
    public function onDisable()
    {
        $this->getLogger()->info("Plugin wurde erfolgreich deaktiviert..");
    }

    public function onCommand(CommandSender $player, Command $command, string $label, array $args): bool
    {

        switch ($command->getName()) {
            case "day":
                if ($player instanceof Player){
                    if ($player->hasPermission("day.command.sc")){
                        $player->sendMessage("§l§6ServerCore §8| §r§fDu hast §6Tag §fgemacht.");
                        $player->getLevel()->setTime(6000);
                    } else {
                        $player->sendMessage("§l§6ServerCore §8| §r§fDu hast keine Rechte diesen Command auszuführen!");
                    }
                }
                break;
        }
            case "night":
                if ($player instanceof Player){
                    if ($player->hasPermission("night.command.sc")){
                        $player->sendMessage("§l§6ServerCore §8| §r§fDu hast §6Nacht §fgemacht.");
                        $player->getLevel()->setTime(14000);
                    } else {
                        $player->sendMessage("§l§6ServerCore §8| §r§fDu hast keine Rechte diesen Command auszuführen!");
                    }
                }
            break;
            case "feed":
                if ($player instanceof Player){
                    if ($player->hasPermission("feed.command.sc")){
                        $player->sendMessage("§l§6ServerCore §8| §r§fDein Hunger wurde geheilt.");
                        $player->setFood(20);
                    } else {
                        $player->sendMessage("§l§6ServerCore §8| §r§fDu hast keine Rechte diesen Command auszuführen!");
                    }
                }
            break;
            case "heal":
                if ($player instanceof Player){
                    if ($player->hasPermission("heal.command.sc")){
                        $player->sendMessage("§l§6ServerCore §8| §r§fDeine Herzen wurden geheilt.");
                        $player->setHealth(20);
                    } else {
                        $player->sendMessage("§l§6ServerCore §8| §r§fDu hast keine Rechte diesen Command auszuführen!");
                    }
                }
            break;
            case "gm 0":
                if ($player instanceof Player){
                    if ($player->hasPermission("gm.command.sc")){
                        $player->sendMessage("§l§6ServerCore §8| §r§fDein Gamemode wurde zu §6überleben §fgewechselt.");
                        $player->setGamemode(0);
                    } else {
                        $player->sendMessage("§l§6ServerCore §8| §r§fDu hast keine Rechte diesen Command auszuführen!");
                    }
                }
            break;
            case "gm 1":
                if ($player instanceof Player){
                    if ($player->hasPermission("gm.command.sc")){
                        $player->sendMessage("§l§6ServerCore §8| §r§fDein Gamemode wurde zu §6kreativ §fgewechselt.");
                        $player->setGamemode(1);
                    } else {
                        $player->sendMessage("§l§6ServerCore §8| §r§fDu hast keine Rechte diesen Command auszuführen!");
                    }
                }
            break;
            case "gm 2":
                if ($player instanceof Player){
                    if ($player->hasPermission("gm.command.sc")){
                        $player->sendMessage("§l§6ServerCore §8| §r§fDein Gamemode wurde zu §6abenteuer §fgewechselt.");
                        $player->setGamemode(2);
                    } else {
                        $player->sendMessage("§l§6ServerCore §8| §r§fDu hast keine Rechte diesen Command auszuführen!");
                    }
                }
            break;
            case "gm 3":
                if ($player instanceof Player){
                    if ($player->hasPermission("gm.command.sc")){
                        $player->sendMessage("§l§6ServerCore §8| §r§fDein Gamemode wurde zu §6zuschauer §fgewechselt.");
                        $player->setGamemode(3);
                    } else {
                        $player->sendMessage("§l§6ServerCore §8| §r§fDu hast keine Rechte diesen Command auszuführen!");
                    }
                }
            break;
            case "fly":
                if ($player instanceof Player){
                    if ($player->hasPermission("fly.command.sc")){
                        if ($this->fly === false){
                            $player->sendMessage("§l§6ServerCore §8| §r§fFlugmodus aktiviert!");
                            $player->setAllowFlight(true);
                            $player->setFlying(true);
                        } elseif ($this->fly === true) {
                            $player->sendMessage("§l§6ServerCore §8| §r§fFlugmodus deaktiviert!");
                            $player->setAllowFlight(false);
                            $player->setFlying(false);
                        }
                    } else {
                        $player->sendMessage("§l§6SeverCore §8| §r§fDu hast keine Rechte diesen Command auszuführen!");
                    }
                }
            break;
            case "tpall":
                if ($player instanceof Player){
                    if ($player->hasPermission("tpall.command.sc")){
                        $player->sendMessage("§l§6ServerCore §8| §r§fAlle Spieler wurden erfolgreich zu dir Teleportiert");
                        foreach ($this->getServer()->getOnlinePlayers() as $online) {
                            $online->teleport($player);
                            $online->sendMessage("Du wurdest durch ein TPALl zu {$player} teleportiert");
                        }
                    } else {
                        $player->sendMessage("§l§6SeverCore §8| §r§fDu hast keine Rechte diesen Command auszuführen!");
                    }
                }
            break;
            case "kickall":
                if ($player instanceof Player){
                    if ($player->hasPermission("kickall.command.sc")){
                        foreach ($this->getServer()->getOnlinePlayers() as $online) {
                                 $online->kick("Du wurdest durch ein KickAll vom Server gekickt");
                        }
                    } else {
                        $player->sendMessage("§l§6SeverCore §8| §r§fDu hast keine Rechte diesen Command auszuführen!");
                    }
                }
            break;
        }
        return true;
    }
}
