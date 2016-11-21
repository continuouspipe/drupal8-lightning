#!/bin/bash

set -ex

/usr/local/share/drupal8/install.sh

/usr/local/bin/supervisor_start
