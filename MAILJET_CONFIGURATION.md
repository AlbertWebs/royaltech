# Mailjet Email Configuration Guide

## Mailjet SMTP Settings

Mailjet provides SMTP access for sending emails. Here are the configuration details:

### SMTP Server Details

- **SMTP Server:** `in-v3.mailjet.com`
- **Port (TLS/STARTTLS):** `587` (Recommended)
- **Port (SSL):** `465` (Alternative)
- **Encryption:** TLS (for port 587) or SSL (for port 465)
- **Authentication:** Required (API Key and Secret Key)

### Getting Your Mailjet Credentials

1. Sign up/Login at [mailjet.com](https://www.mailjet.com)
2. Go to **Account Settings** → **API Keys**
3. You'll find:
   - **API Key** (Public Key) - This is your SMTP username
   - **Secret Key** (Private Key) - This is your SMTP password

### Laravel .env Configuration

Add these lines to your `.env` file:

```env
# Mail Configuration
MAIL_MAILER=smtp
MAIL_HOST=in-v3.mailjet.com
MAIL_PORT=587
MAIL_USERNAME=your_mailjet_api_key_here
MAIL_PASSWORD=your_mailjet_secret_key_here
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@yourdomain.com
MAIL_FROM_NAME="${APP_NAME}"
```

### Example .env Configuration

```env
# Mail Configuration
MAIL_MAILER=smtp
MAIL_HOST=in-v3.mailjet.com
MAIL_PORT=587
MAIL_USERNAME=1234567890abcdef1234567890abcdef
MAIL_PASSWORD=abcdef1234567890abcdef1234567890
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=info@royaltech.co.ke
MAIL_FROM_NAME="Royaltech Computers Limited"
```

### Alternative Configuration (SSL Port 465)

If port 587 doesn't work, try port 465 with SSL:

```env
MAIL_MAILER=smtp
MAIL_HOST=in-v3.mailjet.com
MAIL_PORT=465
MAIL_USERNAME=your_mailjet_api_key_here
MAIL_PASSWORD=your_mailjet_secret_key_here
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=info@royaltech.co.ke
MAIL_FROM_NAME="Royaltech Computers Limited"
```

### Important Notes

1. **Sender Email Verification:**
   - The email address in `MAIL_FROM_ADDRESS` must be verified in your Mailjet account
   - Go to **Account Settings** → **Senders & Domains** to verify your email/domain

2. **API Key vs SMTP:**
   - **API Key** = SMTP Username
   - **Secret Key** = SMTP Password
   - These are different from your Mailjet account login credentials

3. **Free Tier Limits:**
   - Mailjet free tier: 6,000 emails/month
   - 200 emails/day limit

4. **After Configuration:**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   ```

### Testing Your Configuration

1. Use the admin panel test email tool: `/admin/test-email`
2. Check `/admin/sent-messages` to see if emails are being tracked
3. Check Mailjet dashboard → **Statistics** to see sent emails

### Troubleshooting

**Error: "550 No Such User Here"**
- Verify your sender email is verified in Mailjet
- Check that `MAIL_FROM_ADDRESS` matches a verified sender in Mailjet

**Error: "Authentication failed"**
- Double-check your API Key and Secret Key
- Ensure there are no extra spaces in your `.env` file
- Make sure you're using the API Key (not account email) as username

**Error: "Connection timeout"**
- Try port 465 with SSL instead of 587 with TLS
- Check firewall settings
- Verify SMTP host: `in-v3.mailjet.com`

### Mailjet Dashboard Links

- **Dashboard:** https://app.mailjet.com/
- **API Keys:** https://app.mailjet.com/account/apikeys
- **Senders & Domains:** https://app.mailjet.com/account/sender
- **Statistics:** https://app.mailjet.com/statistics
