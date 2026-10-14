# Heal_Bar

Heal_Bar displays a short floating damage and remaining-health readout when an entity takes non-cancelled damage. It waits one tick so the health line reflects the result after the server applies damage, uses the event's final damage value, and hides both particles after one second.

## Compatibility and validation

The manifest requires Axolotl-PM API 5.0.0. PHPStan max and reproducible PHAR builds are checked against pinned API 5.0.0 and 5.49.1 source revisions. Those test points do not prove compatibility with every API 5 release.

CI starts the generated PHAR on an isolated Axolotl-PM server and verifies clean startup and shutdown. It does not test visible particle rendering with a connected Bedrock client.

## Credits and distribution

The manifest retains PTK-KienPham as author and Ghast Noob's edit credit. There is no LICENSE file or verified grant to redistribute a modified build; no license was added and no stable release was published.

For questions about the NhanAZ ecosystem, use [NhanAZ Discord](https://discord.gg/j2X83ujT6c).
