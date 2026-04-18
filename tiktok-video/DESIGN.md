# DESIGN — Cristian DUX · TikTok Video

## Style Prompt
Cinematic Maximalist. A cinema-black canvas that detonates with fiery orange energy. Anton condensed headlines slam and rebound at 3× the scale of supporting type — typography IS the motion graphic. Space Grotesk provides the cold, precise counterpoint: labels, numbers, attribution. Shot with a filmmaker's eye, cut for the TikTok scroll-stop. Every frame earns its second.

## Colors
- `#080808` — Cinema black (scene background)
- `#F2EDE4` — Film white (primary foreground text, warm not pure white)
- `#FF5200` — Lens-flare orange (primary accent — headlines, rules, badges)
- `#FFB300` — Amber gold (stat accent, warm pop)
- `#00E676` — Available green (badge availability dot only)

## Typography
- **Anton** — All-caps condensed display. 110–220px for hero type. NOTHING at regular weight. The bomber.
- **Space Grotesk** — Labels, data, service numbers, captions. 26–40px. Weight 400–700. The sniper.

## Motion Rules
- Entrances: `expo.out`, `back.out(1.7)`, `elastic.out(1, 0.5)`. Fast arrivals, hard stops.
- Ambient: `sine.inOut` breathing at 2–2.2s cycle, yoyo, finite repeats only.
- Vary entry directions per scene — no two consecutive scenes enter from the same axis.
- Total stagger per scene ≤ 0.5s regardless of element count.

## What NOT to Do
- No gradient text (`background-clip: text`) — solid fills only
- No equal-weight centered stacks — vary scale 3:1 minimum between display and label type
- No slow floaty animations — everything snaps, pops, or bounces
- No `repeat: -1` on any tween — always calculate finite repeat count
- No two accent colors in the same scene — one dominant per scene, switch across scenes
