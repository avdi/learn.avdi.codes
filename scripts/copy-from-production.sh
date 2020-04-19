#!/bin/sh

# Pull any changes down from prod.

export HOST="avdi.codes"
export PROD_PATH="~/avdi.codes"
export PROD="${HOST}:${PROD_PATH}"

scp -r ${PROD}/wp-content/plugins/avdi-codes/* ./wp-content/plugins/avdi-codes/
scp -r ${PROD}/wp-content/themes/avdidotcodes/* ./wp-content/themes/avdidotcodes/