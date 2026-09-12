# Changelog

All notable changes to this project are documented here.
Format follows [Keep a Changelog](https://keepachangelog.com/en/1.1.0/).

## [Unreleased]

### Added
- Tab-based layout for the "Data Masjid" form on both `/admin` and `/dkm`
  panels (Informasi Umum, Alamat & Kontak, Deskripsi & Foto), each tab
  saving independently via its own submit button.
- Full-listing public pages for each homepage section (`/schedules`,
  `/activities`, `/announcements`, `/finances`), paginated like the
  existing `/blog` page, plus a "Lihat semua" link on every homepage
  section heading (jadwal, pengumuman, keuangan, kegiatan, artikel)
  linking to its full page.
- Filament's built-in `->profile()` page (Edit profile: name, email,
  password) enabled in the user menu dropdown on both `/admin` and `/dkm`
  panels.

### Removed
- Redundant `AccountWidget` and `FilamentInfoWidget` dashboard cards from
  both `/admin` and `/dkm` panels (name/sign-out already in the topbar
  user menu; Filament version/docs links weren't relevant to end users).

### Fixed
- Homepage "Pengumuman" section now shows only the single latest (or pinned)
  announcement instead of 3, matching the section's minimal-preview intent,
  and dropped its "Muat lebih banyak" button (only ever one item to load
  more of) in favor of the existing "Lihat semua" link.

### Changed
- Public navigation now links to all six public pages (Beranda, Jadwal,
  Kegiatan, Pengumuman, Keuangan, Blog) instead of homepage-only anchors,
  highlights the active page, and switches to a hamburger/slide panel
  (Alpine.js) on mobile instead of a horizontally-scrolling link row.
- Rebranded public UI (title, nav, footer, meta) from "SIMANJADA" to
  "Majada" to match the already-rebranded README, keeping "SIMANJADA" as
  the spelled-out tagline. Added `config('app.version')` (`v2.0.0-free`,
  Majada being the second generation of this app per the README), shown
  in the public footer, and switched the git tag scheme to
  `vMAJOR.MINOR.PATCH-free` per CLAUDE.md's versioning rules.

### Fixed
- Removed an em dash from the public footer tagline (CLAUDE.md's "no em dash
  in UI text" rule).
- Renamed the entire database schema, model classes, Filament resources/
  pages, and Blade view/component files from Indonesian to English to
  match CLAUDE.md's "Database naming" and "Language" rules: `masjids` →
  `mosques`, `jadwals` → `schedules`, `kegiatans` → `activities`,
  `keuangans` → `finances`, `pengumumen` (typo'd table, also fixed) →
  `announcements`, plus their columns (`nama` → `name`, `alamat` →
  `address`, `tanggal` → `date`, etc.) and Indonesian classes/files
  (`Masjid`, `Jadwal`, `Kegiatan`, `Keuangan`, `Pengumuman` and their
  Filament resources/pages) renamed to their English equivalents. UI
  labels shown to users are unchanged.

### Added
- "Muat lebih banyak" (load more) on every list section of the public
  home page (schedules, activities, announcements, finances, articles)
  and the blog index: each starts at 3/9 items and fetches more via
  Alpine.js + a generic `GET /load-more/{section}` AJAX endpoint, reusing
  the existing Blade item markup as shared partials instead of a
  duplicate JS templating layer.
- Icons and semantic colors on the Super Admin dashboard's stat cards, a
  custom widget view so all 5 cards render symmetrically in one row on
  desktop (previously wrapped 3+2), explicit `$sort` on the dashboard
  widgets for a predictable stats → chart → upcoming-schedules order, and
  a more compact finance chart height.
- `UserResource` in the Super Admin panel (`/admin/users`) for managing user
  accounts and roles (super_admin/dkm) from the UI instead of seeder/tinker
  only. Includes a self-lockout guard preventing a Super Admin from
  demoting their own account's role.
- Pengumuman (announcements) and Keuangan (financial transparency) features:
  new `Pengumuman`/`Keuangan` models + migrations, `PengumumanResource` and
  `KeuanganResource` in the DKM panel (scoped to the DKM's own mosque), and
  new public homepage sections showing pinned/recent announcements and a
  saldo summary (total pemasukan/pengeluaran/saldo akhir) with a
  chronological transaction table.
- `JadwalResource` in the DKM panel — jadwal records previously had no
  Filament CRUD despite being shown publicly.
- DKM panel navigation groups: "Jadwal & Kegiatan" (Jadwal, Kegiatan) and
  "Transparansi" (Pengumuman, Keuangan).

### Changed
- Public homepage (`home.blade.php`) refactored from one monolithic file
  into `resources/views/components/public/*` Blade components (hero,
  info-strip, jadwal-list, pengumuman-list, kegiatan-grid,
  keuangan-summary, artikel-grid) for easier maintenance.
- Copywriting pass on public-facing labels and empty states for warmer,
  plainer Bahasa Indonesia (e.g. "Belum ada pengumuman saat ini").
  Public layout nav gained anchor links to the new sections and a meta
  description tag.
- Converted the app to single-mosque: dropped `masjids.status`
  (pending/approved/banned) and `masjids.is_primary` — there is now only
  ever one `Masjid` record system-wide, so per-mosque approve/ban and
  primary-selection no longer apply. `/admin/masjids` (the multi-mosque
  list/CRUD resource) is replaced by a single "Setting Masjid" Filament
  Page (`/admin/masjid-settings`) that edits that one record directly.
  The public homepage now picks the mosque via `Masjid::first()` instead
  of `getPrimaryOrFirstApproved()` (removed), and drops the "Masjid
  Terverifikasi" badge. Seeders reset to 1 super admin + 1 DKM + 1 mosque.
- Auth for `/admin` and `/dkm` now uses Filament's built-in login and
  password reset instead of Laravel Breeze. Breeze's register/login/
  password/verify-email routes, controllers, and views were removed
  along with the `laravel/breeze` dependency — its register flow always
  created `public`-role users, which could never pass
  `canAccessPanel()`, so it wasn't providing working access anyway.

### Added
- DKM panel "Data Masjid" settings page (`/dkm/masjid-settings`, a custom
  Filament Page, not a resource) so the DKM can create/edit their mosque
  record in place. The record is scoped to `auth()->id()`.
- Applied the public homepage design (hero, quick info strip, jadwal,
  kegiatan, and blog cards) to `home.blade.php` and the shared public
  layout, using Lucide icons (`mallardduck/blade-lucide-icons`)
  throughout per the new CLAUDE.md frontend rules. App locale set to
  `id` (`Carbon::setLocale('id')` in `AppServiceProvider`) so all
  public dates render in Indonesian (e.g. "12 September 2026") while
  staying stored as UTC in the database.
- Public-facing homepage, kegiatan (mosque activity), and blog for the
  free (single-mosque) edition: `is_primary` flag on `masjids` selects
  which mosque is shown publicly (falls back to the first `approved`
  mosque, then an empty state); `Kegiatan` model managed by DKM per
  mosque; `Article` blog managed by Super Admin. New public routes
  `/`, `/blog`, `/blog/{article}` and `MasjidResource`/`ArticleResource`
  (`/admin`) and `KegiatanResource` (`/dkm`, scoped to the logged-in
  DKM's own mosque). Multi-mosque directory (`/masjid`) intentionally
  left out of the free edition — deferred to the Pro split.
- Bootstrap Laravel 12 app scaffold alongside the legacy CodeIgniter app:
  Breeze (Blade) auth, Filament panels for `/admin` (Super Admin) and `/dkm`
  (DKM), `users.role` enum + `canAccessPanel()` gating, `masjids`/`jadwals`/
  `dkm_profiles` migrations and seeders ported from `db_masjid.sql`.

### Removed
- `How to use.txt`, CI2 `index.html` placeholder stubs, and the vendored
  `system/` (CodeIgniter framework core) — superseded by CLAUDE.md and no
  longer needed for reference.
- Legacy CodeIgniter 2 app (`application/`, `assets/`, `index.php`,
  `.htaccess`, `db_masjid.sql`) — removed ahead of full Laravel feature
  parity, at the user's explicit request; the Laravel app is now the only
  codebase in this repo.

## [2.2.0-free] - 2026-09-12

### Added
- Dashboard widgets for Admin and DKM panels: stat cards (upcoming
  schedules, activities this month, active announcements, cash balance,
  plus published articles for Admin), a 6-month income/expense bar chart,
  and a table of the 5 nearest upcoming schedules.

## [2.1.0-free] - 2026-09-12

### Added
- `google_maps_url` field on the mosque profile, editable from Mosque
  Settings; the public address now links to it when set.

### Changed
- Rebuilt Mosque Settings (Admin & DKM panels): extracted the duplicated
  form schema into a shared trait, replaced the free-text `type`/
  `land_status` fields with `Select` dropdowns backed by new
  `MosqueType`/`LandStatus` enums, added numeric validation to
  `founding_year`, phone format validation, and a 2MB upload limit on the
  mosque image.
- The mosque's uploaded image is now rendered on the public hero section
  (previously uploaded but never displayed).

## [2.0.2-free] - 2026-09-12

### Changed
- Reordered public homepage sections to lead with transparency-critical info
  (Pengumuman, Jadwal, Keuangan) ahead of the Kegiatan gallery and Artikel
  blog, and fixed the hero CTA label ("Lihat Jadwal Sholat" incorrectly
  implied prayer times; the section is a general activity schedule).
  Capped the schedule list to the 5 nearest upcoming entries, matching the
  existing limits on activities/announcements/finances.

## [2.0.1-free] - 2026-09-12

### Changed
- Aligned `CLAUDE.md` and `PRD.md` with the actual single-mosque app: removed
  stale references to Super Admin approve/ban workflows and DKM
  self-registration, and updated role/entity descriptions to match the
  current models (Schedule, Activity, Finance, Announcement, Article).
