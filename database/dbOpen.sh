#!/bin/bash
if [[ -z "$1" ]]
  then
    mysql klubaner_manarela -u klubaner_madoanx -p'skrip51@hm4d'
  else
    mysql klubaner_manarela -u klubaner_madoanx -p'skrip51@hm4d' < $1
fi
