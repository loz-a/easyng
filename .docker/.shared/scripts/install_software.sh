#!/bin/sh

#apt-get update -yqq && apt-get install -yqq \
apt-get update \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y --force-yes --no-install-recommends \
    curl \
    && rm -rf /var/lib/apt/lists/* \
;