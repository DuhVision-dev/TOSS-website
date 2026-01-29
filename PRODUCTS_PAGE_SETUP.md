# Products Page Setup Guide

## ✅ IMPLEMENTATION COMPLETE

A fully functional WooCommerce products page with filtering, pagination, and inquiry form.

---

## 📁 FILES CREATED/MODIFIED

### 1. **Page Template**
- `pages/page-products.php` - Main products page template

### 2. **Styling**
- `assets/css/layout.css` - Products page layout and grid styles

### 3. **JavaScript**
- `assets/js/forms.js` - Sidebar inquiry form integration

---

## 🎯 FEATURES IMPLEMENTED

### LEFT SIDEBAR
✓ **Product Categories Filter**
  - Shows 4 main categories: Routers, CO2 Laser, Fiber Metal Laser, Channel Letter Bending
  - Plus "Other Category" option
  - Click to filter (page reload, not AJAX)
  - Active state styling
  - Preserves category selection during pagination

✓ **Inquiry Form**
  - Reuses existing backend (toss_handle_inquiry_form)
  - All fields included
  - AJAX submission
  - Success/error messages

### RIGHT CONTENT AREA
✓ **Product Grid**
  - 3 columns on desktop
  - 2 columns on tablet
  - 1 column on mobile
  - Each card shows: Product image, Title, "Call Us Now" button
  - Button links to Contact page

✓ **Pagination**
  - Maximum 12 products per page
  - Numbered pagination (1, 2, 3...)
  - Preserves category filter in pagination URLs
  - Previous/Next navigation

---

## ⚙️ SETUP INSTRUCTIONS

### STEP 1: Create Product Categories

In WordPress Admin, go to **Products → Categories** and create these categories with exact slugs:

| Category Name | Slug |
|--------------|------|
| Routers | `routers` |
| CO2 Laser | `co2-laser` |
| Fiber Metal Laser | `fiber-metal-laser` |
| Channel Letter Bending | `channel-letter-bending` |
| Other Category | `other-category` |

**Important:** The slugs must match exactly for the filtering to work.

### STEP 2: Assign Products to Categories

1. Go to **Products** in WordPress admin
2. Edit each product
3. Assign it to the appropriate category
4. Make sure products are Published

### STEP 3: Create the Products Page

1. Go to **Pages → Add New**
2. Title: "Products" (or any title you want)
3. In **Page Attributes → Template**, select **"Products Page"**
4. Set permalink to `/products` (recommended)
5. Click **Publish**

### STEP 4: Test the Page

Visit: `http://yourdomain.com/products`

You should see:
- Left sidebar with category filters
- Product grid (3 columns)
- Pagination if you have more than 12 products

---

## 🔧 HOW IT WORKS

### Category Filtering (Non-AJAX)

When a user clicks a category:
```
URL changes to: /products?product_cat=routers
Page reloads with filtered products
```

The PHP code:
1. Reads `$_GET['product_cat']`
2. Adds it to WooCommerce query tax_query
3. Displays filtered products
4. Preserves filter in pagination links

### Pagination

- Uses WordPress `WP_Query` pagination
- `posts_per_page` set to 12
- `paginate_links()` generates numbered pagination
- Category filter preserved via `add_args` parameter

### Form Submission

- Sidebar form uses same AJAX handler as main contact form
- Submits to `toss_handle_inquiry_form` action
- No duplicate backend code needed

---

## 🎨 CUSTOMIZATION

### Change Products Per Page

Edit `page-products.php` line ~20:
```php
'posts_per_page' => 12, // Change to 9, 15, 18, etc.
```

### Add/Remove Categories

Edit `page-products.php` line ~60:
```php
$category_slugs = array('routers', 'co2-laser', 'fiber-metal-laser', 'channel-letter-bending');
```

### Change Grid Columns

Edit `layout.css` line ~140:
```css
.products-grid {
  grid-template-columns: repeat(3, 1fr); /* Change 3 to 2 or 4 */
}
```

### Customize "Call Us Now" Button Link

Edit `page-products.php` line ~140:
```php
<a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">
```

---

## 📱 RESPONSIVE BEHAVIOR

| Screen Size | Sidebar | Grid Columns |
|------------|---------|--------------|
| Desktop (>1024px) | Sticky left | 3 columns |
| Tablet (768-1024px) | Sticky left | 2 columns |
| Mobile (<768px) | Below content | 2 columns |
| Small Mobile (<480px) | Below content | 1 column |

---

## 🐛 TROUBLESHOOTING

### No Products Showing
**Check:**
- Are products Published? (not Draft)
- Do products have the category assigned?
- Is WooCommerce active?

### Categories Not Working
**Check:**
- Category slugs match exactly (case-sensitive)
- Products are assigned to categories
- WooCommerce is installed

### Pagination Not Working
**Check:**
- Go to Settings → Permalinks and click "Save Changes"
- Make sure you have more than 12 products

### Sidebar Form Not Submitting
**Check:**
- Browser console for JavaScript errors
- forms.js is loaded
- tossAjax variable is defined (check functions.php)

### "Call Us Now" Button Goes to Wrong Page
**Check:**
- Contact page exists at `/contact`
- Update the URL in page-products.php if your contact page slug is different

---

## 💡 TECHNICAL NOTES

### WooCommerce Integration
✓ Uses `WP_Query` with `post_type => 'product'`
✓ Uses `product_cat` taxonomy for filtering
✓ Uses `wc_placeholder_img_src()` for fallback images
✓ Uses `get_permalink()` for product links
✓ No WooCommerce templates overridden

### Query Performance
- Query is cached by WordPress
- Sticky sidebar improves UX
- Image lazy loading recommended (add loading="lazy" to img tags if needed)

### SEO Considerations
- Each category filter creates a new URL
- Search engines can crawl filtered pages
- Add canonical tags if you want to prevent duplicate content issues

---

## 🚀 NEXT STEPS (OPTIONAL)

### Enhancements You Could Add:

1. **Breadcrumbs**
   - Show: Home > Products > [Category Name]

2. **Product Count**
   - Display "Showing X of Y products"

3. **Sort Options**
   - Price: Low to High
   - Price: High to Low
   - Newest First

4. **Search Bar**
   - Add product search in sidebar

5. **Featured Products**
   - Show featured products at top

6. **Quick View**
   - Modal popup with product details

7. **Product Compare**
   - Select and compare products

---

## ✨ SUMMARY

Your WooCommerce products page is fully functional and production-ready.

**Key Features:**
- 2-column layout (sidebar + content)
- Category filtering (page reload)
- 12 products per page
- Numbered pagination
- Inquiry form in sidebar
- Fully responsive
- No AJAX filtering (as requested)
- Clean WooCommerce integration

Just create the product categories and assign products, then you're ready to go!
