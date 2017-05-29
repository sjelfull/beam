# Beam plugin for Craft CMS

Generate CSVs and XLS files in your templates

![Screenshot](resources/icon.png)

## Installation

To install Beam, follow these steps:

1. Download & unzip the file and place the `beam` directory into your `craft/plugins` directory
4. Install plugin in the Craft Control Panel under Settings > Plugins
5. The plugin folder should be named `beam` for Craft to see it.

Beam works on Craft 2.4.x and Craft 2.5.x.

## Beam Overview

-Insert text here-

## Using Beam

To generate an CSV:

```twig
{% spaceless %}
{% set options = {
    header: ['Email', 'Name'],
    rows: [
        [ 'test@example.com', 'John Doe' ],
        [ 'another+test@example.com', 'Jane Doe' ],
        [ 'third+test@example.com', 'Trond Johansen' ],
    ]
} %}
{{ craft.beam.csv(options) }}
{% endspaceless %}
```

## Beam Roadmap

- Add XLS support

Brought to you by [Superbig](https://superbig.co)
