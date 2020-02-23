#!/bin/sh

# Pull any changes down from staging.

export HOST="avdi.codes"
export STAGING_PATH="~/avdicodes.stage.site"
export STAGING="${HOST}:${STAGING_PATH}"

scp -r ${STAGING}/wp-content/plugins/avdi-codes/* ./wp-content/plugins/avdi-codes/
scp -r ${STAGING}/wp-content/themes/avdidotcodes/* ./wp-content/themes/avdidotcodes/