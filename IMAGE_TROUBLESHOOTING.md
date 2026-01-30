# Image Troubleshooting Guide for hPanel WordPress

## Problem
Images not showing on live hPanel WordPress site despite correct file paths.

## Common Causes & Solutions

### 1. **File Permissions (Most Common)**

hPanel Linux servers need proper permissions for images to be accessible.

**Solution:**
```bash
# Connect via SSH or use hPanel File Manager
# Set folder permissions to 755
chmod 755 -R wp-content/themes/toss/assets/images/

# Set file permissions to 644
find wp-content/themes/toss/assets/images/ -type f -exec chmod 644 {} \;
```

**Via hPanel File Manager:**
1. Go to File Manager
2. Navigate to `wp-content/themes/toss/assets/images/`
3. Select all folders → Right-click → Permissions → Set to 755
4. Select all files → Right-click → Permissions → Set to 644

---

### 2. **Case Sensitivity**

Linux servers are case-sensitive. Windows is not.

**Check these:**
- Folder names: `images` not `Images`
- File names: `arrow.svg` not `Arrow.svg` or `Arrow.SVG`
- Extensions: `.svg` not `.SVG`

**Files to verify on server:**
```
assets/images/icons/dropdown-icon.svg
assets/images/icons/menu.svg
assets/images/icons/arrow.svg
assets/images/icons/categories.svg
assets/images/icons/automobile.svg
assets/images/icons/interior.svg
assets/images/icons/engi.svg
assets/images/icons/manufacturing.svg
assets/images/icons/electronics.svg
assets/images/icons/tooling.svg
```

---

### 3. **Missing Files**

Verify all files were uploaded to the server.

**Required files checklist:**
- [ ] `assets/images/toss_logo.svg`
- [ ] `assets/images/icons/dropdown-icon.svg`
- [ ] `assets/images/icons/menu.svg`
- [ ] `assets/images/icons/arrow.svg`
- [ ] `assets/images/icons/categories.svg`
- [ ] All industry icons
- [ ] All featured product images
- [ ] All why-us icons

---

### 4. **Check File Paths via Browser**

Open browser and try accessing images directly:
```
https://yoursite.com/wp-content/themes/toss/assets/images/icons/arrow.svg
https://yoursite.com/wp-content/themes/toss/assets/images/toss_logo.svg
```

**If you get 404:**
- File doesn't exist or wrong path
- Check spelling and case

**If you get 403:**
- Permission issue
- Fix with chmod (see #1)

**If file downloads or shows:**
- Path is correct
- Issue is in WordPress/theme

---

### 5. **WordPress Media Library**

For product images from WooCommerce, ensure:
- Images are uploaded via WordPress Media Library
- Product images are assigned in Product settings
- File permissions are correct for uploads folder

---

### 6. **Clear All Caches**

Even though you waited 12 hours, clear:
1. **Browser cache** (Ctrl + F5)
2. **WordPress cache** (if using plugin like WP Super Cache)
3. **hPanel cache** (via hPanel control panel)
4. **Cloudflare cache** (if using CDN)

---

### 7. **Check .htaccess**

Ensure `.htaccess` isn't blocking image access:

```apache
# Add to .htaccess if missing
<FilesMatch "\.(jpg|jpeg|png|gif|svg|webp|ico)$">
  Allow from all
</FilesMatch>
```

---

## Quick Fix Commands (via SSH)

```bash
# Navigate to WordPress root
cd public_html  # or wherever WordPress is installed

# Fix permissions
find wp-content/themes/toss/assets/images/ -type d -exec chmod 755 {} \;
find wp-content/themes/toss/assets/images/ -type f -exec chmod 644 {} \;

# Check if files exist
ls -la wp-content/themes/toss/assets/images/icons/

# Test image access
curl -I https://yoursite.com/wp-content/themes/toss/assets/images/icons/arrow.svg
```

---

## Debugging Steps

1. **Right-click broken image** → Inspect Element
2. **Check Console** for 404 or 403 errors
3. **Check Network tab** to see actual requested URL
4. **Copy image URL** and test directly in browser
5. **Compare** requested URL with actual file path on server

---

## Prevention

Going forward:
- Always use lowercase for folders and files
- Set correct permissions immediately after upload
- Use SFTP client (like FileZilla) that preserves permissions
- Test image URLs directly before clearing cache

---

## Still Not Working?

**Check:**
1. PHP memory limit (increase if needed)
2. Server error logs (via hPanel)
3. WordPress debug log (`wp-config.php` → `WP_DEBUG`)
4. Contact hPanel support for server-specific issues
