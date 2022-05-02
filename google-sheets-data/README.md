# WordPress Google Sheets Plugin

> WordPress plugin that takes data from Google Sheets API

## Table of contents

- [General info](#general-info)
- [Technologies](#technologies)
- [Learnings](#learnings)
- [Setup](#setup)
- [Status](#status)
- [Inspiration](#inspiration)
- [Contact](#contact)

## General info

WordPress plugin that takes data from Google Sheets API and displays a count of rows or columns. It assumes the first row/column is a header and makes the count bold.

## Technologies

- PHP
- JavaScript
- CSS
- Google Sheets API

## Learnings

- Google Sheets API
- Creating WordPress plugins
- Getting data from an API in PHP

## Setup

1. Create a Google Sheet, share it and set it so anyone who has the link can view it.
1. Go to your Google account, create a project, set up a [Google Sheets API](https://developers.google.com/sheets/api) and create a key.
1. In the PHP file add your Google Sheets ID and API Key.
1. Upload the whole folder to your plugins folder.
1. Activate the plugin.
1. Where you want the data to display add the shortcode in the following format:
   [get_sheet_data range="Sheet1!A:B" type="columns"]
   - range tells it which sheet to look at and which columns and rows to use
   - options for type are "columns" and "rows"

## Status

Project is: _finished_

## Inspiration

- https://www.milessebesta.com/web-design/how-to-publish-google-sheets-data-to-a-wordpress-site/?cn-reloaded=1
- https://www.wp-tweaks.com/display-a-single-cell-from-google-sheets-wordpress/

## Contact

Created by [nicm42](https://twitter.com/nicm4242/) - feel free to contact me!

<!--  -->
