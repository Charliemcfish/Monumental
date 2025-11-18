# Monumental Podcast Page - Implementation Guide

## 📋 Overview

This guide explains how to implement the fully-branded Captivate podcast page for Monumental. The styling automatically loops through all your Captivate episodes and applies consistent Monumental branding to each one.

---

## 🎨 What's Included

### **Branded Styling Features:**

✅ **Episode Cards**: Elegant cards with hover effects and gold accents
✅ **Podcast Players**: Custom-styled players with Monumental branding
✅ **Grid Layout**: Responsive grid that adapts to screen size
✅ **Animations**: Staggered fade-in animations on scroll
✅ **Pagination**: Styled pagination buttons with hover effects
✅ **Mobile Responsive**: Optimized for all device sizes
✅ **Brand Colors**: Gold (#daa520) and dark (#1D1D1D) throughout
✅ **Typography**: Libre Baskerville and Belgrano fonts

---

## 📁 Files Created

### **1. podcast-block-captivate-styled.html**
- **Use for**: HTML/CSS implementation in WordPress
- **Contains**: Complete styling + shortcode placeholder
- **Best for**: Pasting into Elementor HTML widget or custom HTML block

### **2. podcast-block-captivate-styled.php**
- **Use for**: PHP template implementation
- **Contains**: Complete styling + PHP `do_shortcode()` call
- **Best for**: WordPress page templates or PHP widgets

### **3. podcast-block-1-hero.html**
- **Use for**: Podcast page hero section
- **Contains**: Hero with Pete podcast image background
- **Features**: Overlay, pattern, animations

### **4. podcast-block-2-episodes.html/php**
- **Use for**: Original simpler version
- **Contains**: Basic episode styling

### **5. podcast-shortcode-examples.php**
- **Use for**: Reference guide
- **Contains**: 10 different ways to use the shortcode in PHP

---

## 🚀 Quick Start Implementation

### **Option 1: Elementor (Recommended)**

1. **Create a new page** in WordPress
2. **Edit with Elementor**
3. **Add HTML widget** for the hero section:
   - Copy content from `podcast-block-1-hero.html`
   - Paste into HTML widget

4. **Add another HTML widget** for episodes:
   - Copy content from `podcast-block-captivate-styled.html`
   - Replace the shortcode comment with your actual shortcode

5. **Publish!**

### **Option 2: WordPress Custom Page Template**

1. Create a new PHP file in your theme: `template-podcast.php`
2. Add template header:
```php
<?php
/*
Template Name: Podcast Page
*/
get_header();
?>
```

3. Copy content from `podcast-block-1-hero.html`
4. Copy content from `podcast-block-captivate-styled.php`
5. Add footer:
```php
<?php get_footer(); ?>
```

6. Create new page and select "Podcast Page" template

### **Option 3: Gutenberg/Block Editor**

1. **Create new page**
2. **Add Custom HTML block** for hero section
   - Paste content from `podcast-block-1-hero.html`

3. **Add Custom HTML block** for episodes
   - Paste content from `podcast-block-captivate-styled.html`
   - Replace shortcode placeholder with actual shortcode

4. **Publish!**

---

## 🎯 Your Captivate Shortcode

```
[cfm_captivate_episodes show_id="dffe337f-0541-41f3-972d-a64f2c3949cd" episode_id="7965,7966,7967,7969,7970,7971,7972,7973,7974,7975,7976" layout="list" title="show" se_num="default" title_tag="h2" image="above_title" image_size="large" content="excerpt" content_length="55" player="above_content" link="show" link_text="Listen to this episode" order="desc" exclude="no" items="10" pagination="numbers"]
```

---

## 🎨 How The Styling Works

The CSS automatically targets all Captivate-generated elements:

### **Episode Cards** (`.cfm-episode-item`)
- White background with subtle shadow
- Gold border on hover
- Smooth lift animation (8px up)
- Rounded corners (12px)

### **Episode Images** (`.cfm-episode-image img`)
- Fixed height (250px) with cover fit
- Zoom effect on hover (1.08x scale)
- Gold gradient overlay appears on hover

### **Podcast Players** (`.cfm-episode-player`)
- Light gradient background
- Gold accent bar on top
- Rounded corners matching brand
- Highlighted border on card hover

### **Episode Titles** (`h2`, `h3`)
- Libre Baskerville font (brand font)
- Changes to gold on hover
- Clean typography

### **CTA Buttons** (`.cfm-episode-link`)
- Gold border, transparent background
- Fills with gold gradient on hover
- Lifts up on hover
- "Listen to this episode" text

### **Pagination** (`.cfm-pagination`)
- Numbered buttons
- Active page is gold
- Hover effects with lift and shadow

---

## 📱 Responsive Breakpoints

The design automatically adapts:

- **Desktop (1200px+)**: 3-column grid
- **Tablet (768px - 1200px)**: 2-column grid
- **Mobile (< 768px)**: 1-column stack
- **Small Mobile (< 480px)**: Optimized spacing and button sizes

---

## 🎭 Animation Features

### **Staggered Fade-In**
Each episode card fades in with a 0.1s delay between cards:
- Episode 1: 0.1s delay
- Episode 2: 0.2s delay
- Episode 3: 0.3s delay
- etc.

### **Scroll Observer**
Episodes animate in when they scroll into view (80px from bottom of viewport)

### **Hover Animations**
- Cards: Lift 8px + shadow
- Images: Zoom 8% + gold overlay
- Buttons: Color fill + lift + shadow
- Pagination: Gold fill + lift

---

## 🎨 Brand Colors Used

```css
Gold: #daa520
Dark Gray: #1D1D1D
Light Gray: #f8f8f8
Border Gray: #e5e5e5
Text Gray: #555
Meta Gray: #999
```

---

## 🔧 Customization Options

### **Change Grid Columns**
Edit this in the CSS:
```css
.cfm-episodes-list {
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    /* Change 350px to adjust minimum card width */
}
```

### **Change Card Height**
```css
.cfm-episode-image img {
    height: 250px; /* Adjust image height */
}
```

### **Change Excerpt Length**
In your shortcode, modify:
```
content_length="55"  /* Change to desired word count */
```

### **Change Items Per Page**
In your shortcode:
```
items="10"  /* Change to show more/less episodes per page */
```

---

## 🐛 Troubleshooting

### **Shortcode Not Working**
- Ensure Captivate FM plugin is installed and active
- Check that your show_id and episode_ids are correct
- Verify the shortcode is in PHP tags if using .php file

### **Styling Not Applied**
- Make sure the `<style>` tags are included
- Check that your theme doesn't override styles
- Add `!important` if needed to force styles

### **Episodes Not Showing**
- Verify episode IDs in your Captivate account
- Check if episodes are published
- Try removing `episode_id` parameter to show all episodes

### **Mobile Layout Issues**
- Clear browser cache
- Check viewport meta tag is in header
- Test in actual devices, not just browser resize

---

## 💡 Pro Tips

1. **Load Fonts**: Ensure Libre Baskerville and Belgrano are loaded in your theme
2. **Image Optimization**: Optimize episode thumbnails for web (WebP format)
3. **Lazy Loading**: The shortcode includes `loading="lazy"` for images
4. **Pagination**: Enabled by default, shows 10 episodes per page
5. **SEO**: Episode titles use proper H2 tags for SEO

---

## 📞 Support

For issues with:
- **Captivate Plugin**: Contact Captivate FM support
- **WordPress**: Check WordPress.org forums
- **Custom Styling**: Review the CSS in the files

---

## ✅ Checklist

Before going live:

- [ ] Captivate FM plugin installed and configured
- [ ] Fonts (Libre Baskerville, Belgrano) loaded
- [ ] Hero image uploaded and optimized
- [ ] Background pattern image loaded
- [ ] All episode IDs correct in shortcode
- [ ] Test on desktop
- [ ] Test on tablet
- [ ] Test on mobile
- [ ] Check all links work
- [ ] Verify players load correctly
- [ ] Test pagination navigation

---

## 🎉 You're Ready!

Your Monumental podcast page is now fully branded and ready to showcase your powerful conversations with style!

---

*Created for Monumental Global*
*Brand Colors: Gold (#daa520) • Dark (#1D1D1D)*
*Fonts: Libre Baskerville • Belgrano*
