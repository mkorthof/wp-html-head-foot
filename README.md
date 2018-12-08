# wp-html-head-foot
WordPress Plugin: HTML In Header-Footer

Embed HTML in Header or Footer of Page. Uses the Plugin Editor to make changes.
Uses the Plugin Editor to make changes.

## Configuration:

Use echo to add html to:
- ```function insert_footer()```
- ```function insert_head()```

### Example:
```
echo '<html><!-- html to insert goes here --><br></html>' . "\n";
```

(Un)comment to enable and/or disable Header and/or Footer:
- ```add_action('wp_head', 'insert_head', '1');```
- ```add_action('wp_footer', 'insert_footer', '1');```
