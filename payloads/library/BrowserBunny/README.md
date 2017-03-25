# BrowserBunny

Author: Draxiom
Version: 1.0

## Description

Creates a php web server on the bunny and allows the user to quickly swap out payloads saved in the library folder

## Configuration

Configured for nix by default. Swap RNDIS_ETHERNET with ECM_ETHERNET on Windows

## Requirements

Target must be sharing internet and have git installed.

 1. Run bb.sh (pause at main menu)
 2. Plug in da bunny
 3. Connect (type 'c') 5 seconds after the white light
 4. You can now ssh into the bunny (Run `tail -f /var/log/BrowserBunny.log` to montior progress)

## Status

| LED              | Status                                          |
| ---------------- | ----------------------------------------------- |
| White            | Ready (to share internet connection)            |
| Red              | Failed (no internet)                            |
| Red (blinking)   | Failed (could not mount filesystem)             |
| Amber            | Running                                         |
| Green            | Finished (Web Server Ready: http://172.16.64.1) |