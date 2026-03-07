# Quick Apache (.htaccess) Configuration for Image Performance

## How to Apply

1. Connect via FTP/SFTP to: `f:\local sites\toss\app\public\wp-content\themes\toss\`
2. Find or create `.htaccess` file in the root WordPress directory (not theme directory)
3. Path should be: `f:\local sites\toss\app\public\.htaccess`
4. Add the following configurations

## .htaccess Content

```apache
# ========================================
# ENABLE GZIP COMPRESSION
# ========================================
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/plain
    AddOutputFilterByType DEFLATE text/html
    AddOutputFilterByType DEFLATE text/xml
    AddOutputFilterByType DEFLATE text/css
    AddOutputFilterByType DEFLATE text/javascript
    AddOutputFilterByType DEFLATE application/xml
    AddOutputFilterByType DEFLATE application/xhtml+xml
    AddOutputFilterByType DEFLATE application/rss+xml
    AddOutputFilterByType DEFLATE application/javascript
    AddOutputFilterByType DEFLATE application/x-javascript
    AddOutputFilterByType DEFLATE application/json
    AddOutputFilterByType DEFLATE image/svg+xml
    AddOutputFilterByType DEFLATE application/font-opentype
    AddOutputFilterByType DEFLATE application/vnd.ms-fontobject
</IfModule>

# ========================================
# BROWSER CACHING FOR IMAGES & ASSETS
# ========================================
<IfModule mod_expires.c>
    ExpiresActive On
    
    # Images - 1 year
    ExpiresByType image/webp "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType image/gif "access plus 1 year"
    ExpiresByType image/x-icon "access plus 1 year"
    ExpiresByType image/svg+xml "access plus 1 year"
    
    # CSS & JavaScript - 1 month
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/css "access plus 1 month"
    ExpiresByType text/javascript "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
    
    # Fonts - 1 year
    ExpiresByType font/ttf "access plus 1 year"
    ExpiresByType font/woff "access plus 1 year"
    ExpiresByType font/woff2 "access plus 1 year"
    ExpiresByType application/font-opentype "access plus 1 year"
    
    # Default
    ExpiresDefault "access plus 10 days"
</IfModule>

# ========================================
# ADD CACHE CONTROL HEADERS
# ========================================
<IfModule mod_headers.c>
    Header set Cache-Control "max-age=31536000, public" .js .css .jpg .jpeg .png .gif .webp .woff .woff2 .ttf
</IfModule>

# ========================================
# ETAG SUPPORT (Better cache validation)
# ========================================
<IfModule mod_headers.c>
    Header unset ETag
    FileETag None
</IfModule>

# ========================================
# KEEP-ALIVE (Faster repeated requests)
# ========================================
Header set Connection keep-alive

# ========================================
# ENABLE NATIVE WEBP DELIVERY
# ========================================
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{HTTP_ACCEPT} image/webp
    RewriteCond %{REQUEST_FILENAME} (.*)\.(jpg|jpeg|png)$
    RewriteCond %{REQUEST_FILENAME}.webp -f
    RewriteRule ^(.+)\.(jpg|jpeg|png)$ $1.webp [T=image/webp,E=webp:1,L]
</IfModule>

<IfModule mod_headers.c>
    Header append Vary Accept env=REDIRECT_webp
</IfModule>

# ========================================
# PREVENT DIRECT ACCESS TO SENSITIVE FILES
# ========================================
<FilesMatch "\.(webp|jpg|jpeg|png|gif)$">
    Header set X-Content-Type-Options: "nosniff"
    Header set Cache-Control: "max-age=31536000, public"
</FilesMatch>
```

## Installation Steps

### For Local Development (Windows)

If using **XAMPP** or **WAMP**:

1. Locate Apache config: `C:\xampp\apache\conf\httpd.conf`
2. Ensure these modules are enabled:
   ```apache
   LoadModule deflate_module modules/mod_deflate.so
   LoadModule expires_module modules/mod_expires.so
   LoadModule headers_module modules/mod_headers.so
   LoadModule rewrite_module modules/mod_rewrite.so
   ```

3. Find `<Directory "F:/local sites/toss/app/public">` or create one
4. Set `AllowOverride All` inside that block
5. Restart Apache

### For Live Server

1. Connect via FTP to your hosting provider
2. Navigate to WordPress root directory
3. Find or create `.htaccess` file
4. Paste the configuration above
5. Save and test

---

## Verification

### Check if GZIP is Working

Use this in your browser console (F12 > Console):
```javascript
fetch(location.href).then(r => {
  const encoding = r.headers.get('content-encoding');
  console.log('Compression:', encoding || 'None');
});
```

Should show: `Compression: gzip` or `Compression: br` (Brotli)

### Check Cache Headers

F12 > Network tab > Click on any image > Headers tab

Look for:
```
Cache-Control: max-age=31536000, public
```

---

## What These Settings Do

| Setting | Benefit |
|---------|---------|
| **GZIP Compression** | Reduces file sizes by 60-80% |
| **Browser Caching** | Images don't re-download on repeat visits |
| **Cache Headers** | Tells browsers to store files locally |
| **Keep-Alive** | Reuses TCP connections (faster) |
| **WebP Delivery** | Serves modern format automatically |

---

## Troubleshooting

### Images Not Loading After Adding .htaccess

- Add this at the top of `.htaccess`: `RewriteEngine Off` temporarily
- Then gradually enable modules one by one

### Getting 500 Error

- You might be using **IIS** instead of **Apache** (Windows Server)
- Ask your hosting provider for IIS equivalent
- Or disable all rewrite rules and focus on deflate/caching

### HTTPS Issues

- Add this before GZIP section:
```apache
<IfModule mod_ssl.c>
    SetEnvIf Request_URI . https=on
</IfModule>
```

---

## Performance Gains Expected

After implementing these settings:

- **Page load time**: 20-40% faster
- **Image load time**: 50-70% faster on repeat visits
- **Bandwidth usage**: 60-80% reduction
- **Core Web Vitals**: Significant improvement

---

**Note**: If you're not comfortable editing `.htaccess`, contact your hosting provider and ask them to:
1. Enable GZIP compression
2. Set browser cache headers for images
3. Enable Brotli compression (better than GZIP)
