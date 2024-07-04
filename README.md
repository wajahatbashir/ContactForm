# WB ContactForm Module for Magento 2

## Overview

The WB ContactForm module adds an advanced contact form to your Magento 2 store. The form includes fields such as First Name, Last Name, Email, Phone (with country code dropdown), Subject, City, State, Country, and Message. Submissions are saved in the Magento admin, where they can be viewed and managed. The module also supports email notifications to the admin and various configuration options.

## Features

- Advanced contact form with multiple fields.
- Form submissions saved in the Magento admin grid.
- Email notifications to a configurable email address.
- Module can be enabled or disabled via store configuration.
- Admin can choose which form fields to display on the frontend.
- Compatible with Magento 2.3 and 2.4.

## Configuration
1. Log in to the Magento admin panel.
2. Go to Stores > Configuration > WB ContactForm.
3. Configure the module settings:
    -Enable/Disable the module.
    -Set the notification email address.

## Usage

### Frontend
The contact form is accessible at the /contact-us URL of your Magento store. Users can fill out the form and submit their inquiries.

### Admin
1.  Log in to the Magento admin panel.
2.  Go to Content > Contact Form Enquiries.
3.  View and manage all submitted contact form inquiries.

## Email Template
The module includes a customizable email template for contact form submissions. The template file is located at:

> view/frontend/email/contact_form_email_template.html

## Contributing
Contributions are welcome! Please fork the repository and submit a pull request for any enhancements or bug fixes.

## Installation

### Step 1: Download the Module

Download the module from GitHub and extract it to `app/code/WB/ContactForm`.

### Step 2: Enable the Module

Run the following commands to enable the module:

```sh
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento setup:static-content:deploy -f
bin/magento cache:clean