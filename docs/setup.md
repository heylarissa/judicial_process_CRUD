# Setup

### Usando Apache na WSL

Útil: [Usando systemctl na wsl](https://www.tabnews.com.br/ghostnetrn/corrigindo-o-erro-system-has-not-been-booted-with-systemd-as-init-system)

sudo apt install apache2  
sudo ufw app list  
sudo ufw allow 'Apache'  
sudo ufw status  
sudo service apache2 start  