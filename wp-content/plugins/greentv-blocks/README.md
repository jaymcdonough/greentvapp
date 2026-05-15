# GreenTV Blocks

WordPress Gutenberg plugin providing two blocks for the GreenTV platform — Forest Signal design system.

## Blocks included

### 1. GreenTV AI Greeter (`greentv/greeter`)
- Full-width hero block with Forest Signal dark green background
- Editable headline, subheading, and AI greeting message
- Interactive interest picker (pills) — user selections are passed to greentv.app as URL parameters
- Amber CTA button linking to greentv.app
- AI message updates dynamically as user picks topics
- All text editable via the block Inspector Controls sidebar

### 2. GreenTV Loop Preview (`greentv/loop-preview`)
- Light parchment card showing today's video loop preview
- Up to 3 video cards with tag, title, duration, and author
- CTA button linking to greentv.app
- All content editable via Inspector Controls

## Installation

1. Upload the `greentv-blocks` folder to `/wp-content/plugins/`
   OR go to Plugins → Add New → Upload Plugin and upload `greentv-blocks.zip`
2. Activate the plugin in Plugins → Installed Plugins
3. Edit any page or post in the Gutenberg editor
4. Search for "GreenTV" in the block inserter (+)
5. Add either block and configure via the sidebar

## Connecting to live data (phase 2)

The video cards in the Loop Preview block currently use static data editable in the sidebar.
To pull live loop data from greentv.app, add a REST API endpoint to your theme's `functions.php`:

```php
add_action('rest_api_init', function(){
  register_rest_route('greentv/v1', '/loop', [
    'methods'  => 'GET',
    'callback' => 'greentv_get_todays_loop',
    'permission_callback' => '__return_true',
  ]);
});
```

Then update `build/loop-preview/render.php` to call `wp_remote_get('https://greentv.app/api/loop')`.

## Customizing colors

All design tokens are in `assets/forest-signal.css` as CSS custom properties.
Override any token in your theme's stylesheet:

```css
:root {
  --gtv-forest:  #your-color;
  --gtv-amber:   #your-color;
}
```

## Requirements
- WordPress 6.0+
- PHP 7.4+
- No build step required — ships pre-built
