@ECHO OFF
SET BIN_TARGET=%~dp0/../vendor/jakubledl/dissect/bin/dissect
php "%BIN_TARGET%" %*
