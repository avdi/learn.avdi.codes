#!/bin/sh

# Push any changes up to staging.

export HOST="avdi.codes"
export STAGING_PATH="~/avdicodes.stage.site"
export STAGING="${HOST}:${STAGING_PATH}"

scp -r ./wp-content/plugins/avdi-codes/* ${STAGING}/wp-content/plugins/avdi-codes/
scp -r ./wp-content/themes/avdidotcodes/* ${STAGING}/wp-content/themes/avdidotcodes/