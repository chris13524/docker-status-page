# Docker Status Page

This is a set of scripts to create a "status page" for a single Docker host. Not very enterprise-y, but thought I'd share.

The idea is to have a separate PHP-enabled server that is the "status page" (in my case, this was a Mail-in-a-Box mail server). Then on your Docker host, you subscribe to the container events and relay those to the status page.

Forgive me as I never made this production ready. I just copied all the scripts off an old server before I went to bed one night.

## Setup & Configuration

The /status-page directory is intended to be hosted on a separate "status page" server. The /host directory is intended to be hosted on the Docker host itself.

To configure this for yourself, make the following configuration changes:

 - In /status-page/update_status.php line 2, insert the IP of your Docker host. This ensures that only the Docker host is able to make modifications to the status page.
 - In /docker-host/docker-status.php line 38, insert the host of your status page.
 - In /docker-host/docker-status.service line 8, insert the host of your status page.
 - In /docker-host/docker-status.service line 7, insert the path to the /docker-host/docker-status.sh script.

Then enable the docker-status.service so it will run on boot and all that jazz.
