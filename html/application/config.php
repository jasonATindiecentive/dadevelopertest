<?php
/*
 *
 * config.php
 *
 * This contains configuration artifacts. For this (D&A Technologies backend developer test) that means
 * the database endpoint / username / password and the hash used to store passwords
 *
 * In an actual environment we might add API keys, we might place this in 'database.php' instead, and
 * we might be better off leaving this file out of source control and making it part of your deployment / configuration system.
 *
 *
 */

define("DB_ENDPOINT", "jasonruddock.cluster-ckigjsnnaheo.us-east-1.rds.amazonaws.com");
define("DB_USERNAME", "datech");
define("DB_PASSWORD", "supersecrepassword");
define("DB_NAME", "datech");

define("PW_HASH", "2Hf43ozZG8QsjqAMmPloU1RkeC8z0P09rFpww8dGiNtAvASwut");