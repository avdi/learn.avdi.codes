#!/bin/sh

# Push any changes up to production.

export HOST="avdi.codes"
export PROD_PATH="~/avdi.codes"
export PROD="${HOST}:${PROD_PATH}"

scp -r ./wp-content/plugins/avdi-codes/* ${PROD}/wp-content/plugins/avdi-codes/
scp -r ./wp-content/themes/avdidotcodes/* ${PROD}/wp-content/themes/avdidotcodes/