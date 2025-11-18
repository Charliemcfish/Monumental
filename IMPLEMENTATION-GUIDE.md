# Monumental Podcast Email Collection - Implementation Guide

## Overview
This guide will walk you through implementing an email collection section for the Monumental Podcast using Active Campaign.

## What You Have
- **Active Campaign Tag**: "Monumental Podcast Info"
- **Active Campaign List**: "Monumental Podcast"
- **Design**: Matching your existing Monumental brand (Belgrano font, Libre Baskerville, gold #daa520)

## Files Provided
1. `podcast-email-collection.html` - Custom implementation with JavaScript
2. `podcast-email-collection-activecampaign.html` - Active Campaign embed version (RECOMMENDED)

---

## RECOMMENDED METHOD: Using Active Campaign Form Embed

### Step 1: Set Up Your Active Campaign Form

1. **Log into Active Campaign**
   - Go to your Active Campaign dashboard
   - Navigate to **Forms** in the left sidebar

2. **Create a New Form** (or edit existing)
   - Click **"Create a Form"**
   - Choose **"Inline"** form type
   - Name it: "Monumental Podcast Signup"

3. **Configure Form Fields**
   - Add **Email** field (required)
   - Optionally add: First Name, Last Name
   - Set placeholder text: "Enter your email address"

4. **Set Up Form Actions**
   - **Add to List**: Select "Monumental Podcast"
   - **Add Tag**: Add "Monumental Podcast Info"
   - **Confirmation**: Set up a thank you message or redirect

5. **Customize Form Settings**
   - **Success Message**: "Success! You've been added to our podcast list."
   - **Error Message**: Configure error handling
   - **Double Opt-in**: Enable if required by your region (GDPR, etc.)

6. **Get Your Embed Code**
   - Click **"Embed"** or **"Share"** button
   - Choose **"Embed Code"**
   - Copy the provided code snippet (should look like):
   ```html
   <div class="_form_XXX"></div>
   <script src="https://yourcompany.activehosted.com/f/embed.php?id=XXX"></script>
   ```

### Step 2: Implement on Your WordPress Site

#### Option A: Using WordPress Editor (Gutenberg)

1. **Edit Your Page**
   - Go to the page where you want the email collection
   - Click **"Edit Page"**

2. **Add Custom HTML Block**
   - Click **"+"** to add a new block
   - Search for **"Custom HTML"**
   - Add the Custom HTML block

3. **Paste the Code**
   - Open `podcast-email-collection-activecampaign.html`
   - Copy the entire contents
   - Paste into the Custom HTML block

4. **Replace the Active Campaign Embed**
   - Find this section in the code:
   ```html
   <!-- REPLACE THIS SECTION WITH YOUR ACTIVE CAMPAIGN FORM EMBED CODE -->
   <div class="_form_1"></div>
   <script src="https://YOUR_ACCOUNT.activehosted.com/f/embed.php?id=YOUR_FORM_ID"></script>
   ```
   - Replace with YOUR actual Active Campaign embed code from Step 1.6

5. **Update Privacy Policy Link**
   - Find: `<a href="#">Privacy Policy</a>`
   - Replace `#` with your actual privacy policy URL

6. **Save and Preview**
   - Click **"Update"** or **"Publish"**
   - Preview the page to see your new section

#### Option B: Using Elementor or Page Builder

1. **Add HTML Widget**
   - Edit your page in Elementor
   - Drag an **"HTML"** widget to your desired location

2. **Paste Code**
   - Paste the contents of `podcast-email-collection-activecampaign.html`
   - Replace the Active Campaign embed code with yours
   - Update privacy policy link

3. **Adjust Width**
   - Set section width to **"Full Width"** for best appearance
   - Ensure no padding conflicts with the design

#### Option C: Add to Theme Template

1. **Access Theme Editor**
   - Go to **Appearance > Theme Editor**
   - ⚠️ **Warning**: Create a child theme first to prevent losing changes on updates

2. **Edit Template File**
   - Choose the template file (e.g., `page.php`, `single.php`, or custom template)
   - Add the code where you want the section to appear

3. **Save Changes**

### Step 3: Test Your Form

1. **Submit a Test Email**
   - Use your own email address
   - Fill out the form and submit

2. **Verify in Active Campaign**
   - Go to **Contacts** in Active Campaign
   - Search for your test email
   - Verify:
     - Contact exists
     - Added to "Monumental Podcast" list
     - Tagged with "Monumental Podcast Info"

3. **Check Email Confirmation**
   - If you enabled double opt-in, check your inbox
   - Confirm the subscription

4. **Test Error Handling**
   - Try submitting with invalid email
   - Ensure error messages display correctly

---

## ALTERNATIVE METHOD: Custom JavaScript Integration

If you prefer more control, use `podcast-email-collection.html` instead:

### Step 1: Get Active Campaign API Credentials

1. **Get Your Account URL**
   - Found in Active Campaign under **Settings > Developer**
   - Example: `https://yourcompany.activehosted.com`

2. **Find Your Form ID**
   - Go to **Forms** and select your form
   - The ID is in the URL: `/admin/form.php?action=edit&id=123`

3. **Find Your List ID**
   - Go to **Lists** and select "Monumental Podcast"
   - The ID is in the URL

### Step 2: Configure the JavaScript

Open `podcast-email-collection.html` and update:

```javascript
const ACTIVE_CAMPAIGN_CONFIG = {
    accountUrl: 'https://yourcompany.activehosted.com',  // Your actual URL
    formId: '123',         // Your actual form ID
    listId: '456',         // Your "Monumental Podcast" list ID
    tag: 'Monumental Podcast Info'
};
```

### Step 3: Implement on WordPress

Follow the same steps as the recommended method for adding to WordPress.

---

## Styling Customization

The section is designed to match your existing Monumental branding:

- **Fonts**: Belgrano (body), Libre Baskerville (headings)
- **Colors**:
  - Gold: `#daa520`
  - Dark background: `#1a1a1a` to `#0a0a0a` gradient
  - White text with transparency for subtitles
- **Layout**: Centered, max-width 900px
- **Responsive**: Automatically adjusts for mobile

### To Customize:

**Change Colors:**
```css
/* Gold accent color */
#daa520 → your color

/* Background gradient */
background: linear-gradient(135deg, #1a1a1a 0%, #0a0a0a 100%);
```

**Change Text:**
Edit these lines in the HTML:
```html
<h2 class="podcast-email-title">Be the First to Know</h2>
<p class="podcast-email-subtitle">
    Your custom subtitle text here...
</p>
```

**Change Padding:**
```css
.podcast-email-section {
    padding: 80px 20px; /* Adjust top/bottom padding */
}
```

---

## Where to Place This Section

### Suggested Placements:

1. **Homepage** - Below hero section or above footer
2. **About Page** - At the bottom
3. **Podcast Page** - Dedicated podcast landing page
4. **Blog Posts** - End of each post
5. **Footer** - Site-wide footer area

### Best Practice:
Place it where users are most engaged but not intrusive. Common placements:
- After introducing the podcast concept
- Before the footer on main pages
- As a popup (triggered after 30 seconds or on exit intent)

---

## Troubleshooting

### Form Not Submitting
- **Check Active Campaign embed code** - Ensure it's correct
- **Browser console** - Check for JavaScript errors (F12)
- **Network tab** - Verify requests are being sent

### Styling Issues
- **Font not loading** - Ensure Google Fonts link is in page header
- **Colors don't match** - Check CSS specificity; your theme might override
- **Mobile issues** - Clear cache and test in incognito mode

### Active Campaign Issues
- **Contacts not appearing** - Check form automation rules
- **Tag not applying** - Verify tag name matches exactly
- **List not updating** - Ensure list is active and not archived

### WordPress Conflicts
- **Theme conflicts** - Try with a default WordPress theme
- **Plugin conflicts** - Deactivate plugins one by one
- **Caching** - Clear all caches (site, CDN, browser)

---

## Security Considerations

1. **GDPR Compliance**
   - Enable double opt-in in Active Campaign
   - Add clear consent language
   - Link to privacy policy
   - Provide easy unsubscribe option

2. **Spam Protection**
   - Active Campaign has built-in spam filters
   - Consider adding Google reCAPTCHA if needed
   - Monitor for suspicious submissions

3. **Data Protection**
   - Never store passwords or sensitive data
   - Use HTTPS for your site
   - Regular Active Campaign security audits

---

## Automation Suggestions

Once someone subscribes, you can set up Active Campaign automations:

1. **Welcome Email**
   - Send immediately after signup
   - Thank them and set expectations
   - Link to latest episode

2. **New Episode Notifications**
   - Trigger when new podcast published
   - Include episode summary and link
   - CTA to listen/share

3. **Engagement Sequences**
   - Week 1: Welcome + Episode 1
   - Week 2: Behind-the-scenes content
   - Week 3: Exclusive interview snippet
   - Ongoing: New episodes

4. **Segmentation**
   - Tag engaged listeners
   - Create segments based on open rates
   - Send targeted content to super fans

---

## Testing Checklist

- [ ] Form displays correctly on desktop
- [ ] Form displays correctly on mobile
- [ ] Form displays correctly on tablet
- [ ] Email validation works
- [ ] Submit button shows loading state
- [ ] Success message displays
- [ ] Error message displays (test with invalid email)
- [ ] Contact appears in Active Campaign
- [ ] Contact added to "Monumental Podcast" list
- [ ] Contact tagged with "Monumental Podcast Info"
- [ ] Confirmation email received (if double opt-in)
- [ ] Privacy policy link works
- [ ] Form matches site design
- [ ] Fonts load correctly
- [ ] Colors match brand
- [ ] Responsive design works on all devices

---

## Next Steps

1. ✅ Complete Active Campaign form setup
2. ✅ Get embed code
3. ✅ Add to WordPress page
4. ✅ Test thoroughly
5. ✅ Set up welcome automation
6. 📈 Monitor signup rates
7. 📧 Plan email content calendar
8. 🎙️ Promote signup on social media

---

## Support

If you encounter issues:
- **Active Campaign**: Check their [help docs](https://help.activecampaign.com/)
- **WordPress**: Consult WordPress support or your theme documentation
- **Custom Code**: Review browser console for errors

---

## File Reference

- `podcast-email-collection-activecampaign.html` - **RECOMMENDED** - Uses Active Campaign native forms
- `podcast-email-collection.html` - Custom JavaScript implementation
- `IMPLEMENTATION-GUIDE.md` - This file

---

Good luck with your podcast email collection! 🎙️
