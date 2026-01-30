# Email Configuration Guide

## Problem: "550 No Such User Here" Error

This error occurs when your SMTP server tries to validate that the recipient email exists on its own server, but the email is hosted elsewhere.

### Common Causes:

1. **Using Gmail SMTP to send to custom domain emails**
   - Gmail SMTP validates recipients on Gmail's servers
   - `info@royaltech.co.ke` is hosted on your hosting provider's mail server, not Gmail
   - Solution: Use your hosting provider's SMTP server for domain emails

2. **"From" address doesn't match SMTP server domain**
   - If using Gmail SMTP, "from" should be a Gmail address
   - If using hosting SMTP, "from" should match your domain

## Solutions:

### Option 1: Use Your Hosting Provider's SMTP (Recommended)

Update your `.env` file with your hosting provider's SMTP settings:

```env
MAIL_MAILER=smtp
MAIL_HOST=mail.royaltech.co.ke
MAIL_PORT=587
MAIL_USERNAME=info@royaltech.co.ke
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=info@royaltech.co.ke
MAIL_FROM_NAME="Royaltech Company Limited"
```

**Common hosting SMTP settings:**
- **cPanel Hosting**: Usually `mail.yourdomain.com` or `smtp.yourdomain.com`
- **Port**: 587 (TLS) or 465 (SSL)
- **Username**: Your full email address
- **Password**: Your email account password

### Option 2: Use Gmail SMTP (If you must)

If you want to use Gmail SMTP, you need to:

1. **Use Gmail App Password** (not regular password):
   - Go to Google Account → Security → 2-Step Verification → App Passwords
   - Generate an app password for "Mail"

2. **Update .env**:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=royaltechcomputersltd@gmail.com
MAIL_PASSWORD=your_app_password_here
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=royaltechcomputersltd@gmail.com
MAIL_FROM_NAME="Royaltech Company Limited"
```

**Note**: With Gmail SMTP, you can send TO any email address, but the "FROM" should be your Gmail address.

### Option 3: Use a Mail Service (Best for Production)

Services like **Mailgun**, **SendGrid**, or **Amazon SES** don't validate recipients and are more reliable:

**Mailgun Example:**
```env
MAIL_MAILER=mailgun
MAILGUN_DOMAIN=royaltech.co.ke
MAILGUN_SECRET=your_mailgun_secret
MAIL_FROM_ADDRESS=info@royaltech.co.ke
MAIL_FROM_NAME="Royaltech Company Limited"
```

## How to Find Your Hosting SMTP Settings:

1. **Check cPanel** (if you have it):
   - Go to Email Accounts
   - Click "Connect Devices" or "Configure Mail Client"
   - Look for SMTP settings

2. **Contact Your Hosting Provider**:
   - Ask for SMTP server address
   - Usually: `mail.yourdomain.com` or `smtp.yourdomain.com`
   - Port: 587 (TLS) or 465 (SSL)

3. **Check Your Email Client Settings**:
   - If you use Outlook/Thunderbird, check the account settings
   - Copy the SMTP server and port

## Testing:

After updating your `.env` file:

1. Clear config cache:
   ```bash
   php artisan config:clear
   ```

2. Test email using the admin panel:
   - Go to `/admin/test-email`
   - Send a test email
   - Check if it works

3. Check Laravel logs:
   ```bash
   tail -f storage/logs/laravel.log
   ```

## Current Configuration:

The code now uses:
- `MAIL_FROM_ADDRESS` from `.env` (or falls back to site settings)
- Your configured SMTP server from `.env`
- Fallback to Gmail if primary fails

Make sure your `.env` file has the correct SMTP settings for your hosting provider!
