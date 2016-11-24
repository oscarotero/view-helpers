# View Helpers

Collection of useful functions to use in your templates.

## Text

Collection of helpers for text manipulation:

### join

```php
$pieces = ['one', 'two', 'three'];

echo ViewHelpers\Text::join($pieces); // "one, two and three"
echo ViewHelpers\Text::join($pieces, ' | '); // "one | two and three"
echo ViewHelpers\Text::join($pieces, ', ', ' & '); // "one, two & three"
```