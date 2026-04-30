# SPMB 2025 - New Student Admission System

A comprehensive web-based New Student Admission System (SPMB - *Sistem Penerimaan Murid Baru*) built with Laravel 12. This system manages the entire student registration workflow from initial data entry, multi-step application wizard, document uploads, parent/guardian information, scoring tabulation, and exportable reports.

---

## Table of Contents

- [System Overview](#system-overview)
- [Technology Stack](#technology-stack)
- [Project Structure](#project-structure)
- [Features](#features)
- [User Roles](#user-roles)
- [Database Schema](#database-schema)
- [Installation](#installation)
- [Configuration](#configuration)
- [Default Credentials](#default-credentials)
- [Application Routes](#application-routes)
- [Registration Wizard](#registration-wizard)
- [Admission Tracks](#admission-tracks)
- [File Uploads](#file-uploads)
- [Tabulation & Export](#tabulation--export)
- [Email Notifications](#email-notifications)
- [Development](#development)
- [Testing](#testing)
- [License](#license)

---

## System Overview

SPMB 2025 is designed to digitize the new student admission process for educational institutions. The system supports:

- **Administrators** who manage student master data, process registrations via a guided wizard, perform scoring tabulation, and generate reports.
- **Students** who can log in to view their registration status and personal dashboard.

The application implements a dual-authentication mechanism where admins authenticate via the standard `User` model, while students authenticate via the `Siswa` (Student) model with automatic user-record bridging.

---

## Technology Stack

| Layer | Technology | Version |
|-------|------------|---------|
| **Backend Framework** | Laravel | ^12.10 |
| **PHP** | PHP | ^8.2 |
| **Frontend Build Tool** | Vite | ^6.2.4 |
| **CSS Framework** | Tailwind CSS | ^4.0.0 |
| **UI Components** | Bootstrap | ^5.2.3 |
| **Database** | MySQL | (configurable) |
| **Testing** | Pest PHP | ^3.8 |
| **Queue** | Database-driven | (default) |
| **Session** | Database | (default) |
| **Cache** | Database | (default) |

Additional Laravel packages:
- `laravel/tinker` - Interactive REPL
- `laravel/ui` - Authentication scaffolding

---

## Project Structure

```
spmb/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/           # Admin controllers
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── PendaftaranController.php
│   │   │   │   ├── SiswaController.php
│   │   │   │   └── TabulasiController.php
│   │   │   ├── Auth/
│   │   │   │   └── AuthController.php
│   │   │   └── Siswa/
│   │   │       └── DashboardController.php
│   │   └── Middleware/          # Custom middleware
│   ├── Mail/                    # Mailable classes
│   ├── Models/
│   │   ├── User.php             # Admin & bridge user model
│   │   ├── Siswa.php            # Student model (authenticatable)
│   │   ├── Pendaftaran.php      # Registration data model
│   │   ├── DetailSiswa.php      # Student detail model
│   │   ├── Tabulasi.php         # Scoring tabulation model
│   │   └── Student.php          # Legacy student seeder model
│   └── Providers/
├── bootstrap/
├── config/                      # Laravel configuration
├── database/
│   ├── factories/
│   ├── migrations/              # Database schema migrations
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── UsersSeeder.php
│       └── StudentSeeder.php
├── public/                      # Web server document root
├── resources/
│   ├── css/
│   ├── js/
│   ├── sass/
│   └── views/                   # Blade templates
│       ├── admin/               # Admin panel views
│       ├── auth/                # Login & register views
│       ├── layouts/             # Base layouts
│       ├── pendaftaran_siswa/   # Registration wizard views
│       └── siswa/               # Student dashboard views
├── routes/
│   ├── web.php                  # Web routes
│   └── console.php
├── storage/
│   └── app/public/pendaftaran/  # Uploaded registration documents
├── tests/                       # Pest PHP test suites
├── .env.example                 # Environment template
├── composer.json
├── package.json
└── vite.config.js
```

---

## Features

### Authentication
- Dual login system supporting both `User` (admin) and `Siswa` (student) models
- Role-based access control with `admin` and `siswa` roles
- Automatic user-record creation when a student logs in
- Standard Laravel registration for new users (defaults to `siswa` role)
- Session regeneration and CSRF protection

### Admin Module
- **Student Master Data Management** - CRUD operations with search and date filters
- **Multi-Step Registration Wizard** - 4-step guided data entry
- **Document Upload Management** - Handle all required admission documents
- **Scoring Tabulation** - Record and manage student final scores
- **Export Reports** - Excel and CSV exports grouped by admission track
- **Email Notifications** - Automated email sent to students when accounts are created

### Student Module
- Personal dashboard displaying registration status
- View uploaded registration data and documents
- Registration number display upon completion

### General
- Responsive UI built with Bootstrap 5 and Tailwind CSS
- Database-driven sessions, cache, and queues
- File storage for admission documents
- Pagination on all list views
- Form validation with localized error messages

---

## User Roles

### Administrator (`role = admin`)
- Full access to admin dashboard
- Manage all student records (`/admin/siswa/*`)
- Process new registrations via wizard (`/admin/siswa/{id}/pendaftaran/*`)
- Manage scoring tabulation (`/admin/tabulasi/*`)
- Export tabulation data to Excel/CSV
- Automatically redirected to `/admin/dashboard`

### Student (`role = siswa`)
- Access to personal dashboard (`/siswa/dashboard`)
- View own registration data and status
- Cannot access admin routes
- Automatically redirected to `/siswa/dashboard`

---

## Database Schema

### Core Tables

#### `users`
Standard Laravel users table with an added `role` column (`admin` | `siswa`).

| Column | Type | Description |
|--------|------|-------------|
| `id` | bigint | Primary key |
| `name` | string | Full name |
| `email` | string | Unique email |
| `password` | string | Hashed password |
| `role` | string | `admin` or `siswa` |
| `remember_token` | string | Laravel remember token |
| `timestamps` | timestamp | Created/updated at |

#### `siswas` (Students)
The student master data table. Students authenticate directly against this table.

| Column | Type | Description |
|--------|------|-------------|
| `id` | bigint | Primary key |
| `nisn` | string(20) | National Student ID (unique) |
| `nik` | string(16) | National ID Card (unique) |
| `nama_lengkap` | string | Full name |
| `email` | string | Email (unique) |
| `nomor_hp` | string(15) | Phone number |
| `password` | string | Hashed password |
| `timestamps` | timestamp | Created/updated at |

#### `pendaftaran` (Registrations)
Stores all registration data collected through the 4-step wizard.

| Section | Columns |
|---------|---------|
| **Student Data** | `siswa_id`, `nisn`, `nik`, `tempat_lahir`, `tanggal_lahir`, `usia`, `no_akta_lahir`, `agama`, `alamat_jalan`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `sekolah_tujuan`, `jurusan`, `asal_sekolah`, `no_hp`, `email`, `jalur_pendaftaran` |
| **General Documents** | `foto`, `ijazah`, `akte_kelahiran`, `kartu_keluarga`, `ktp_ortu`, `nilai` |
| **Afirmasi Track** | `bukti_afirmasi`, `keterangan_afirmasi` |
| **Domisili Track** | `bukti_domisili`, `jarak_rumah` |
| **Prestasi Track** | `jenis_prestasi`, `tingkat_prestasi`, `nama_prestasi`, `tahun_prestasi`, `bukti_prestasi` |
| **Mutasi Track** | `asal_sekolah`, `alasan_mutasi`, `bukti_mutasi` |
| **Father Data** | `nama_ayah`, `nik_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `no_hp_ayah` |
| **Mother Data** | `nama_ibu`, `nik_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `no_hp_ibu` |
| **Guardian Data** | `ada_wali`, `nama_wali`, `nik_wali`, `tahun_lahir_wali`, `pendidikan_wali`, `pekerjaan_wali`, `penghasilan_wali` |
| **Registration Meta** | `status`, `nomor_pendaftaran`, `tanggal_pendaftaran` |

#### `tabulasi` (Scoring Tabulation)
Final score records for admission ranking.

| Column | Type | Description |
|--------|------|-------------|
| `id` | bigint | Primary key |
| `siswa_id` | bigint | FK to `siswas` |
| `nisn` | string | Student NISN |
| `nama_siswa` | string | Student name |
| `jalur` | string | Admission track |
| `jurusan` | string | Major/department |
| `nilai_akhir` | numeric | Final score (0-100) |

#### `detail_siswa` (Student Details)
Extended student detail records.

| Column | Type | Description |
|--------|------|-------------|
| `id` | bigint | Primary key |
| `student_id` | bigint | FK to `students` |
| `tempat_lahir`, `tanggal_lahir`, `no_reg_akta_lahir`, `agama` | various | Birth & religion data |
| `alamat`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi` | various | Address data |
| `bukti_kk`, `jalur_pendaftaran`, `dokumen_pendukung` | string | Documents & track |
| `nama_ayah` ... `no_hp_ayah` | various | Father info |
| `nama_ibu` ... `no_hp_ibu` | various | Mother info |
| `nama_wali` ... `no_hp_wali` | various | Guardian info |
| `status_pendaftaran` | string | Registration status |

---

## Installation

### Prerequisites
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL or MariaDB
- Web server (Apache/Nginx) or use Laravel's built-in server

### Step-by-Step

1. **Clone the repository**
   ```bash
   git clone <repository-url> spmb
   cd spmb
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Create environment file**
   ```bash
   cp .env.example .env
   ```

5. **Generate application key**
   ```bash
   php artisan key:generate
   ```

6. **Configure database** in `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=spmb
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. **Run database migrations**
   ```bash
   php artisan migrate
   ```

8. **Seed default data**
   ```bash
   php artisan db:seed
   ```

9. **Create storage symlink**
   ```bash
   php artisan storage:link
   ```

10. **Build frontend assets**
    ```bash
    npm run build
    ```

11. **Start the application**
    ```bash
    php artisan serve
    ```
    Or use the convenience composer command:
    ```bash
    composer dev
    ```

---

## Configuration

### Environment Variables

| Variable | Default | Description |
|----------|---------|-------------|
| `APP_NAME` | Laravel | Application name |
| `APP_ENV` | local | Application environment |
| `APP_DEBUG` | true | Debug mode |
| `APP_URL` | http://localhost | Base URL |
| `DB_CONNECTION` | mysql | Database driver |
| `DB_DATABASE` | spmb | Database name |
| `SESSION_DRIVER` | database | Session storage |
| `CACHE_STORE` | database | Cache storage |
| `QUEUE_CONNECTION` | database | Queue driver |
| `MAIL_MAILER` | log | Mail driver |

### File Uploads
Uploaded registration documents are stored in `storage/app/public/pendaftaran/` and served via the public disk symlink at `public/storage/`.

Supported formats: `pdf`, `jpg`, `jpeg`, `png`
Maximum file size: `2MB`

---

## Default Credentials

After running seeders, the following accounts are available:

### Admin Account
- **Email:** `admin@admin.com`
- **Password:** `123`
- **Role:** `admin`

### Demo Student Account
- **Email:** `siswa@siswa.com`
- **Password:** `12345`
- **Role:** `siswa`

Additional 10 demo students are seeded from `StudentSeeder` with NIK-based passwords.

---

## Application Routes

### Public Routes
| Method | URI | Name | Description |
|--------|-----|------|-------------|
| GET | `/` | - | Redirects to `/home` |
| GET | `/home` | `home` | Landing page |
| GET | `/login` | `login` | Login form |
| POST | `/login` | - | Login action |
| GET | `/register` | `register` | Registration form |
| POST | `/register` | - | Registration action |

### Authenticated Routes
| Method | URI | Name | Description |
|--------|-----|------|-------------|
| POST | `/logout` | `logout` | Logout |
| GET | `/dashboard` | `dashboard` | Role-based redirect |
| GET | `/admin/dashboard` | `admin.dashboard` | Admin dashboard |
| GET | `/siswa/dashboard` | `siswa.dashboard` | Student dashboard |

### Admin - Student Management
| Method | URI | Name | Description |
|--------|-----|------|-------------|
| GET | `/admin/siswa` | `admin.siswa.index` | Student list (paginated, searchable) |
| GET | `/admin/siswa/create` | `admin.siswa.create` | Create student form |
| POST | `/admin/siswa` | `admin.siswa.store` | Store new student |
| GET | `/admin/siswa/{siswa}/edit` | `admin.siswa.edit` | Edit student form |
| PUT | `/admin/siswa/{siswa}` | `admin.siswa.update` | Update student |
| DELETE | `/admin/siswa/{siswa}` | `admin.siswa.destroy` | Delete student |

### Admin - Registration Wizard
| Method | URI | Name | Description |
|--------|-----|------|-------------|
| GET | `/admin/siswa/{siswa_id}/pendaftaran` | `admin.siswa.pendaftaran.index` | Wizard step view |
| POST | `/admin/siswa/{siswa_id}/pendaftaran/step1` | `admin.siswa.pendaftaran.step1` | Save student data |
| POST | `/admin/siswa/{siswa_id}/pendaftaran/step2` | `admin.siswa.pendaftaran.step2` | Save track & documents |
| POST | `/admin/siswa/{siswa_id}/pendaftaran/step3` | `admin.siswa.pendaftaran.step3` | Save parent/guardian data |
| POST | `/admin/siswa/{siswa_id}/pendaftaran/step4` | `admin.siswa.pendaftaran.step4` | Final confirmation |
| POST | `/admin/siswa/{siswa}/pendaftaran/save-draft` | `admin.siswa.pendaftaran.save-draft` | Save draft |

### Admin - Tabulation
| Method | URI | Name | Description |
|--------|-----|------|-------------|
| GET | `/admin/tabulasi` | `admin.tabulasi.index` | Tabulation list |
| GET | `/admin/tabulasi/create` | `admin.tabulasi.create` | Add score form |
| POST | `/admin/tabulasi` | `admin.tabulasi.store` | Store score |
| GET | `/admin/tabulasi/{id}/edit` | `admin.tabulasi.edit` | Edit score form |
| PUT | `/admin/tabulasi/{id}` | `admin.tabulasi.update` | Update score |
| DELETE | `/admin/tabulasi/{id}` | `admin.tabulasi.destroy` | Delete score |
| GET | `/admin/tabulasi/export/excel` | `admin.tabulasi.export.excel` | Export to Excel |
| GET | `/admin/tabulasi/export/csv` | `admin.tabulasi.export.csv` | Export to CSV |

---

## Registration Wizard

The registration process is implemented as a 4-step wizard:

### Step 1: Student Data
Collects core student information:
- NISN, NIK, place/date of birth, age
- Birth certificate number, religion
- Full address (street, village, district, regency, province)
- Target school, intended major, origin school
- Phone number, email
- Selected admission track

### Step 2: Track & Documents
Uploads required documents based on selected track.

**Common required documents:**
- Photo (`foto`)
- Diploma/Certificate (`ijazah`)
- Birth certificate (`akte_kelahiran`)
- Family card (`kartu_keluarga`)
- Parent ID card (`ktp_ortu`)
- Score (`nilai`)

**Track-specific requirements:**
- **Afirmasi:** Supporting document + description
- **Domisili:** Distance from home + proof of residence
- **Prestasi:** Achievement type, level, name, year + proof
- **Mutasi:** Origin school, reason, transfer proof

### Step 3: Parent / Guardian Data
- Father's name, NIK, education, occupation, phone
- Mother's name, NIK, education, occupation, phone
- Optional guardian data (name, NIK, birth year, education, occupation, income)

### Step 4: Confirmation & Completion
- Student reviews all data
- Confirmation checkbox required
- System generates registration number: `REG-YYYYMM-{SEQUENCE}`
- Status changes to `Selesai` (Complete)

---

## Admission Tracks

The system supports four admission tracks (jalur):

| Track | Code | Description |
|-------|------|-------------|
| **Afirmasi** | `Jalur Afirmasi` | For students from underprivileged backgrounds |
| **Prestasi** | `Jalur Prestasi` | For students with academic/non-academic achievements |
| **Domisili** | `Jalur Domisili` | Proximity-based admission |
| **Mutasi** | `Jalur Mutasi` | For students transferring from another school |

Each track requires specific supporting documents uploaded in Step 2 of the wizard.

---

## File Uploads

All registration documents are stored in `storage/app/public/pendaftaran/` with standardized filenames:

| Document Type | Filename Pattern |
|---------------|-----------------|
| Photo | `foto_{siswa_id}_{timestamp}.{ext}` |
| Diploma | `ijazah_{siswa_id}_{timestamp}.{ext}` |
| Birth Certificate | `akte_{siswa_id}_{timestamp}.{ext}` |
| Family Card | `kk_{siswa_id}_{timestamp}.{ext}` |
| Parent ID | `ktp_{siswa_id}_{timestamp}.{ext}` |
| Afirmasi Proof | `afirmasi_{siswa_id}_{timestamp}.{ext}` |
| Domisili Proof | `domisili_{siswa_id}_{timestamp}.{ext}` |
| Prestasi Proof | `prestasi_{siswa_id}_{timestamp}.{ext}` |
| Mutasi Proof | `mutasi_{siswa_id}_{timestamp}.{ext}` |

When a new file is uploaded for an existing record, the old file is automatically deleted.

---

## Tabulation & Export

### Tabulation Management
Admins can record and manage final scores (`nilai_akhir`, range 0-100) for each student per admission track and intended major. Data is displayed sorted by highest score.

### Export Formats

#### Excel Export (`/admin/tabulasi/export/excel`)
Generates a horizontally laid-out HTML Excel file containing:
- All tracks combined
- Individual track columns: Afirmasi, Prestasi, Domisili, Mutasi
- Each section shows: No, NISN, Student Name, Major, Score

#### CSV Export (`/admin/tabulasi/export/csv`)
Generates a UTF-8 CSV with BOM containing:
- All data summary
- Separate sections per track
- Sorted by track then by score descending

---

## Email Notifications

When an administrator creates a new student record via `/admin/siswa/create`, the system:
1. Generates a random password
2. Creates the `Siswa` record with hashed password
3. Queues an email notification using Laravel's Mail queue
4. Sends account activation details to the student's email

The email is sent via queued jobs (database queue driver) for performance.

---

## Development

### Running in Development Mode
```bash
composer dev
```
This concurrently starts:
- `php artisan serve` (web server)
- `php artisan queue:listen` (queue worker)
- `npm run dev` (Vite dev server with HMR)

### Code Style
The project uses Laravel Pint for PHP code formatting:
```bash
vendor/bin/pint
```

### Frontend Assets
```bash
# Development (with HMR)
npm run dev

# Production build
npm run build
```

---

## Testing

The project uses Pest PHP for testing:

```bash
# Run all tests
php artisan test

# Or using Pest directly
vendor/bin/pest
```

---

## License

This project is built on the [Laravel framework](https://laravel.com), which is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
