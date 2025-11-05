# SIPNS - Sistem Informasi Kepegawaian

A **modern employee management system** built with **Laravel 12** and **Bootstrap**, designed to help organizations efficiently **manage employee data, positions, and units of work**. This system supports **CRUD operations, data filtering by units of work**, and **PDF report generation** using **Barryvdh DomPDF**.

## Screenshots

**Login**  

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/676c4647-9c60-43aa-8a18-60bbfe2e0245" /><br>

**Dashboard**  

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/7fc73a36-1f77-4411-b814-527de115b8d8" /><br>

**Daftar Pegawai**

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/1fb87c65-cc5b-4e79-a18b-2129f5abcac3" /><br>

**Tambah Pegawai**  

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/3e42ed75-988f-40c3-9d52-9092d6ea4143" /><br>

**Edit Pegawai**  

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/8b33d260-70b2-4d24-bcbd-522000bd122f" /><br>

**Cetak Data Pegawai (Export PDF)**  

<img width="1280" height="712" alt="image" src="https://github.com/user-attachments/assets/43888cd2-80f0-4349-b587-682fec93c11f" />
<br> 

## Features

- CRUD Data Pegawai  
- CRUD Agama, Golongan, Eselon, Jabatan, Unit Kerja, dan Tempat Tugas  
- Filter Pegawai berdasarkan Unit Kerja 
- Upload dan tampilkan foto pegawai
- Cetak daftar pegawai ke format PDF
  
## Tech Stack

- **Backend:** Laravel 12  
- **Frontend:** Blade Templates + Bootstrap  
- **Database:** MySQL
- **PDF Export:** Barryvdh DomPDF 
- **Version Control:** GitHub  

## Quick Start

```bash
# Clone repository
git clone https://github.com/fahrilhadi/sipns.git
cd sipns

# Install dependencies
composer install
npm install
npm run dev

# Setup environment
cp .env.example .env
php artisan key:generate

# Run migrations with seeder
php artisan migrate:fresh --seed

# Link storage (for photo uploads)
php artisan storage:link

# Serve application
php artisan serve
