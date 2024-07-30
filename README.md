# VemorKu
Merupakan proyek Tugas Akhir Kerja Praktik di PT. Altrak 1978 Cabang Lampung

Alat :
- XAMPP
  https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.2.12/xampp-windows-x64-8.2.12-0-VS16-installer.exe

- Text Editor (Visual Studio Code)
  https://vscode.download.prss.microsoft.com/dbazure/download/stable/05047486b6df5eb8d44b2ecd70ea3bdf775fd937/VSCodeUserSetup-x64-1.86.0.exe

- Composer
  https://getcomposer.org/Composer-Setup.exe

- Git
  https://github.com/git-for-windows/git/releases/download/v2.46.0.windows.1/Git-2.46.0-64-bit.exe

Download Project :
1. Buka Folder untuk menyimpan Project
2. Klik kanan lalu pilih "Git Bash Here"
3. git clone https://github.com/genshinshare/VemorKu.git
4. git pull origin master
5. git checkout master

Setup Package (melalui terminal Visual Studio Code yang telah membuka folder Project) :
1. npm install
2. composer install

Setup Database :
1. Buka XAMPP, start Apache dan MySQL
2. Buka Command Prompt untuk membuat database, ikuti langkah berikut:
   - cd /
   - cd xampp/mysql/bin
   - mysql -u root -p
   ( nanti akan diminta password tinggal di enter saja )
   - create database altrak1978vemor
3. Buka Folder Project melalui Visual Studio Code
4. Klik terminal, lalu masukkan command berikut
   php artisan migrate:refresh --seed
