#!/bin/sh

USER_ID=$1
GROUP_ID=$2
USER_NAME=$3
GROUP_NAME=$3

echo "${USER_ID}:${GROUP_ID}"

if [ $USER_ID -ne 0 ] && [ $GROUP_ID -ne 0 ]; then
  userdel --force $USER_NAME
  if getent group $GROUP_NAME ; then groupdel $GROUP_NAME; fi
    groupadd --gid $GROUP_ID $GROUP_NAME
    useradd --no-log-init --uid $USER_ID --gid $GROUP_NAME $USER_NAME
    install --directory --mode=0755 --owner=$USER_NAME --group=$GROUP_NAME "/home/${USER_NAME}"
    chown --changes --silent --no-dereference --recursive --from=33:33 $USER_ID:$GROUP_ID \
          /home/www-data
#          /.composer \
#          /var/lib/php/sessions
fi
