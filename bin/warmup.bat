@ECHO OFF
SET BIN_TARGET=%~dp0/../vendor/lisachenko/go-aop-php/bin/warmup
php "%BIN_TARGET%" %*
