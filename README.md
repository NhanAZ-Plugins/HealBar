# Heal_Bar

Heal_Bar is a historical PocketMine-MP plugin that displays floating text for damage and remaining health after an entity is hit.

## Compatibility and status

The manifest declares PocketMine-MP API `2.0.0` and `3.0.0`. The source uses the old `Level`, `FloatingTextParticle` and `PluginTask` APIs. It has not been ported or tested on Axolotl-PM 5. Do not install this source on a current server.

The floating text is scheduled after a damage event and then hidden by a later task. A port needs tests for cancelled events, damage calculation, particle cleanup and server performance before claiming equivalent behavior.

The manifest credits PTK-KienPham and records an edit by Ghast Noob. Preserve both credits. There is no LICENSE file, CI workflow, DevTools PHAR, Axolotl-PM 5 runtime test or verified current release. Resolve redistribution rights with the rights holders before publishing a modified build.

For questions about the NhanAZ ecosystem, use [NhanAZ Discord](https://discord.gg/j2X83ujT6c).
