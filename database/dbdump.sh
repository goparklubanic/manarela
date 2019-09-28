#!/bin/bash
NOW=$(date +"%Y%m%d")
DFL="manarela-$NOW.sql";
echo $DFL
touch $DFL
mysqldump klubaner_manarela -u klubaner_madoanx -pskrip51@hm4d > manarela-$NOW.sql
