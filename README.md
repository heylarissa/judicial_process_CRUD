# PHP Judicial Process CRUD

### Description:

This repository contains a PHP project that offers a complete CRUD (Create, Read, Update, Delete) system for managing judicial processes. The main goal of the project is to provide an efficient and organized solution for automating the handling of information related to judicial processes in a legal environment.

### Key Features and Functionality:

- Process Creation: Users have the ability to create new judicial processes, entering relevant information such as process number, parties involved, type of action, and other important details.

- Process Viewing: The system allows for a comprehensive view of registered judicial processes, displaying detailed information about each process, including party data, movements, and deadlines.

- Process Updating: Users have the capability to update the information of an existing judicial process, such as changing involved parties, adding new movements, or updating deadlines.

- Process Deletion: In case a judicial process is concluded or canceled, users can remove the corresponding records from the system, keeping the database up to date.

- Search and Filters: The system enables searching and filtering of judicial processes based on specific criteria such as process number, involved parties, status, and others, facilitating the location of relevant information.-

- Access Control: The project implements an authentication and access control system to ensure that only authorized users can perform CRUD operations on judicial processes. Different levels of permissions can be configured for users, ensuring information security.

- User-Friendly Interface: The system features an intuitive and user-friendly interface, making navigation and interaction with the judicial process CRUD functionalities simple and easy to use.

This repository is an excellent foundation for developers interested in building or contributing to judicial process management systems in PHP, utilizing MySQL for database management, HTML and CSS for frontend design, and JavaScript for interactive elements. It enables rapid implementation of a complete CRUD, while being highly customizable and extensible to meet the specific needs of different legal contexts.


# Setup

### Usando Apache na WSL

sudo apt install apache2  
sudo ufw app list  
sudo ufw allow 'Apache'  
sudo ufw status  
sudo service apache2 start  

Úteis:  
[Usando systemctl na wsl](https://www.tabnews.com.br/ghostnetrn/corrigindo-o-erro-system-has-not-been-booted-with-systemd-as-init-system)  

[Como redirecionar o apache para outra pasta](https://www.vivaolinux.com.br/dica/Alterando-pasta-padrao-varwww-para-pasta-no-Apache-2-Debian-8)  