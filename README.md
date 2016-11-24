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

## Html

Functions to generate html

### element

```php
$element = ViewHelpers\Html::element('div', [
    'id' => 'my-id',
    'class' => ['class1, class2'],
    'hidden' => true
]);

echo $element; // <div id="my-id" class="class1 class2" hidden>
```

### picture

```php
$element = ViewHelpers\Html::picture('default.jpg', [
    '(min-width: 2000px)' => [
        '1x' => 'image_2000.jpg',
        '2x' => 'image_4000.jpg',
    ],
    '(min-width: 1000px)' => 'image_1000.jpg',
    '(min-width: 500px)' => 'image_500.jpg',
],
'Alt text');

echo $element;
/*
<picture>
    <source srcset="image_2000.jpg 1x, image_4000.jpg 2x" media="(min-width: 2000px)">
    <source srcset="image_1000.jpg" media="(min-width: 1000px)">
    <source srcset="image_500.jpg" media="(min-width: 500px)">
    <img srcset="default.jpg" alt="Alt text">
</picture>
```
