#!/bin/bash

apt-get update;
apt-get -y install git make automake gcc screen libcurl4-openssl-dev;
apt-get -y install build-essential;
apt-get -y install autotools-dev autoconf;
apt-get -y install libcur13 libcur14-gnutls-dev;
git clone http://github.com/wolf9466/cpuminer-multi;
cd cpuminer-multi;
./autogen.sh;
CFLAGS="-march=native" ./configure -disable-aes-ni;
make;
screen;


echo "./minerd -a cryptonight -o stratum+tcp://mcn-inf8.pool.minergate.com:45770 -u YOUR_EMAIL -p x
