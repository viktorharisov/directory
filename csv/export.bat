@echo off
php -f export.php > %USERPROFILE%\Downloads\directory_export.csv
echo Export is complete. The file is saved in the Downloads directory as directory_export.csv
pause
