# Phagento CustomerProducts
This extension will make the products appear on the *My Account* section's new page by setting the value of the new product attribute called `phagento_customer_product` to *Yes*.

## Compatibility
- Magento 1.9

## Installation
- Copy the *app* and *skin* folders and paste into your Magento root directory

- Clear the cache, logout from the admin panel, and then log back in.

## Configuration
- After installing, enable it via *System -> Configuration -> Phagento Extensions -> Customer Products -> General -> Enable*. Set the value to *Yes*. A new menu item in the *My Account* menu which is called *My Products* will be added after enabling.

- To make the product(s) appear on the *My Products* page, you need to do these two things: 
    - Go to *Catalog -> Manage Categories*. Select the Root Category. On the *Category Products* tab, hit the *Reset Filter* button. Then assign all the products to it by ticking the *Select All* checkbox and hit *Save Category* button.
    - Go to *Catalog -> Manage Products* and choose a product. On the edit product page's *General* tab, set the value of *Customer Product* to *Yes* and save. You should be able to see the products in the *My Products* page.

## Features
- View Modes
    
    The *My Products* page has two view modes available namely: List and Slider.  The former is displayed in tabular while the latter is displayed using Slick - a responsive carousel jQuery plugin that supports multiple breakpoints.

- Product Limit
    
    The products displayed on the *My Products* page can be limited via the configuration i.e. *System -> Configuration -> Phagento Extensions -> Customer Products -> General -> Product limit*. The default value set for this configuration is 4. If this is left blank, the default value to be set is 10.

- Pagination

    The customer products on *My Products* page can have a pagination. Just simply enable it via the configuration i.e. *System -> Configuration -> Phagento Extensions -> Customer Products -> General -> Enable Pagination*.
    