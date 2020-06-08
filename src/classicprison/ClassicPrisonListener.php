<?php

namespace classicprison;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCreationEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerKickEvent;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerQuitEvent;

class ClassicPrisonListener implements Listener {

	/** @var Main */
	private $plugin;

	public function __construct(Main $plugin) {
		$this->plugin = $plugin;
		$plugin->getServer()->getPluginManager()->registerEvents($this, $plugin);
	}

	/**
	 * @return Main
	 */
	public function getPlugin() {
		return $this->plugin;
	}

	/**
	 * @param PlayerCreationEvent $event
	 *
	 * @priority HIGHEST
	 */
	public function onPlayerCreation(PlayerCreationEvent $event) {
		$event->setPlayerClass(ClassicPrisonPlayer::class);
	}

	/**
	 * @param PlayerLoginEvent $event
	 *
	 * @ignoreCancelled
	 *
	 * @priority MONITOR
	 */
	public function onLogin(PlayerLoginEvent $event) {
		$pos = $this->getPlugin()->getServer()->getDefaultLevel()->getSafeSpawn();
		$event->getPlayer()->teleport($pos->add(0.5, 0, 0.5));
	}

}
