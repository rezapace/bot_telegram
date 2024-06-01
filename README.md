# Telegram Bot Setup Guide

This guide will help you set up a Telegram bot using PHP and Ngrok.

## Prerequisites

1. **Create a Bot**: Use [BotFather](https://t.me/botfather) to create a new bot and obtain a token.
2. **Install Composer**: Ensure you have [Composer](https://getcomposer.org/) installed.
3. **Install Ngrok**: Download and install [Ngrok](https://ngrok.com/).
4. **Create a Database**: Set up a database and activate phpMyAdmin.
5. **Install XAMPP**: Download and install [XAMPP](https://www.apachefriends.org/download.html).

## Steps

### 1. Install Dependencies

Run the following command to install the necessary PHP dependencies:

```bash
composer install
```

### 2. Start Ngrok

Start Ngrok to expose your local server to the internet:

```bash
ngrok http 80
```

### 3. Start PHP Server

Start the PHP built-in server:

```bash
php -S localhost:80
```

### 4. Set Up Webhook

Replace `<YOUR_BOT_TOKEN>` with your actual bot token and `<YOUR_NGROK_URL>` with the URL provided by Ngrok. Then, run the following command to set up the webhook:

```bash
curl -d url=https://<YOUR_NGROK_URL>/bot.php -X POST https://api.telegram.org/bot<YOUR_BOT_TOKEN>/setWebhook
```

### Example

If your bot token is `726:AAG22I7DS0JsgY` and your Ngrok URL is `https://c19b-124.ngrok-free.app`, the command would be:

```bash
curl -d url=https://c19b-124.ngrok-free.app/bot.php -X POST https://api.telegram.org/bot726:AAG22I7DS0JsgY/setWebhook
```

## Detailed Steps

1. **Create a Bot**: Visit [BotFather](https://t.me/botfather) and follow the instructions to create a new bot. Save the token provided.
2. **Create a Database**: Set up a database and activate phpMyAdmin.
3. **Install Ngrok**: Visit [Ngrok Api](https://dashboard.ngrok.com/get-started/setup/windows) If you haven't already, install Ngrok using Chocolatey:

    ```bash
    choco install ngrok
    ```
    ```bash
    ngrok config add-authtoken 2h9sy_5pcGjH
    ```

4. **Configure Token**: Open the `private/token.txt` file and insert your bot token.
5. **Run the Bot**: Navigate to your bot directory and start the PHP server:

    ```bash
    cd C:\xampp\htdocs\bot
    php -S localhost:80
    ```

6. **Set Webhook**: Use the curl command to set the webhook as described above.

## Notes

- Ensure your Ngrok session is active whenever you want to run the bot.
- Keep your bot token secure and do not share it publicly.

## Troubleshooting

- If you encounter issues, ensure all dependencies are installed and the Ngrok URL is correctly set.
- Check the PHP server logs for any errors.

Happy coding!
dengan format    curl -d url=https://YOUR_NGROK_URL/bot.php -X POST https://api.telegram.org/botYOUR_TELEGRAM_BOT_TOKEN/setWebhook

## dont forget to change the token.txt with your token and save file at C:\xampp\htdocs\bot

```bash
cd C:\xampp\htdocs\bot
```

```bash
git clone https://github.com/rezapace/bot_telegram
```

## change the token.txt with your token and save file at C:\xampp\htdocs\bot

```bash
cd C:\xampp\htdocs\bot\private\token.txt
```


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
