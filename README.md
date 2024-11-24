<h1>PasswordChangeByEmail Module for WHMCS</h1>
<p>
    <strong>Author:</strong> RezaKarimi<br>
    <strong>Version:</strong> 1.2
</p>

<h2>About</h2>
<p>
    PasswordChangeByEmail is a WHMCS module that allows users to reset their password using a verification code sent to their email. This enhances the security and user experience by providing a simple and secure way to recover account access.
</p>

<h2>Features</h2>
<ul>
    <li>Send a unique verification code to the user's email for password reset.</li>
    <li>Admin area to view password reset requests.</li>
    <li>Configurable settings for code validity time and maximum requests per hour.</li>
    <li>Supports multiple languages including English, Persian, Arabic, Turkish, Kurdish, Chinese, Korean, and Russian.</li>
</ul>

<h2>Installation</h2>
<ol>
    <li>Clone or download the repository.</li>
    <li>Upload the <code>PasswordChangeByEmail</code> folder to the <code>/modules/addons</code> directory of your WHMCS installation.</li>
    <li>Go to the WHMCS admin area, navigate to <em>Setup &gt; Addon Modules</em>, and activate <strong>PasswordChangeByEmail</strong>.</li>
    <li>Configure the module settings as per your requirements.</li>
</ol>

<h2>Configuration</h2>
<p>
    The module provides the following configuration options:
</p>
<ul>
    <li><strong>Time Limit for Code (minutes):</strong> Set the validity period for the reset code in minutes.</li>
    <li><strong>Max Requests Per Hour:</strong> Set the maximum number of reset code requests allowed per hour for a user.</li>
</ul>

<h2>Language Support</h2>
<p>
    The module includes support for multiple languages. To add or modify translations, edit the language files located in the <code>lang</code> directory of the module.
</p>

<h2>Usage</h2>
<h3>For Users</h3>
<p>
    Users can request a password reset by providing their email address. A unique verification code will be sent to their email, which they can use to reset their password.
</p>
<h3>For Admins</h3>
<p>
    Admins can view all password reset requests in the admin area. This helps in monitoring and managing the password reset process.
</p>

<h2>Activation and Deactivation</h2>
<h3>Activation</h3>
<p>
    When activating the module, the required database table <code>mod_password_change_by_email</code> will be created automatically.
</p>
<h3>Deactivation</h3>
<p>
    Deactivating the module will remove the database table. Please ensure you have backed up any necessary data before deactivating.
</p>

<h2>Contributing</h2>
<p>
    Contributions are welcome! Please feel free to submit a pull request or report any issues.
</p>

<h2>License</h2>
<p>
    This module is open-source and available under the MIT License. See the LICENSE file for more information.
</p>

<h2>Contact</h2>
<p>
    For any questions or support, please contact <strong>RezaKarimi</strong>.
</p>
