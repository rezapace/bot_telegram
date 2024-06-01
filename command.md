## Contoh Interaksi dengan Bot Telegram Anda

### Langkah-langkah Interaksi

1. **Mulai Bot:**
   - **User:** `/start`
   - **Bot:**
     ```
     Selamat datang di bot pencatat pribadi Anda. Gunakan /help untuk melihat perintah yang tersedia.
     ```

2. **Mendapatkan Bantuan:**
   - **User:** `/help`
   - **Bot:**
     ```
     /view_notes - Melihat semua catatan
     /add_note [Judul]_[Isi] - Menambahkan catatan baru
     ```

3. **Menambahkan Catatan:**
   - **User:** `/add_note Daftar Belanja_Beli susu, telur, dan roti`
   - **Bot:**
     ```
     Catatan berhasil ditambahkan!
     ```

4. **Melihat Catatan:**
   - **User:** `/view_notes`
   - **Bot:**
     ```
     Catatan Anda:
     ID: 1
     Judul: Daftar Belanja
     Isi: Beli susu, telur, dan roti
     ```

5. **Menambahkan Catatan Lain:**
   - **User:** `/add_note Catatan Rapat_Bahas tonggak proyek`
   - **Bot:**
     ```
     Catatan berhasil ditambahkan!
     ```

6. **Melihat Catatan Lagi:**
   - **User:** `/view_notes`
   - **Bot:**
     ```
     Catatan Anda:
     ID: 1
     Judul: Daftar Belanja
     Isi: Beli susu, telur, dan roti

     ID: 2
     Judul: Catatan Rapat
     Isi: Bahas tonggak proyek
     ```
