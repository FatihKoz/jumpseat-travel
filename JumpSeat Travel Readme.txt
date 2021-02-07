JumpSeat Module and Widget for phpVMS v7

Module enables JumpSeat Travel for pilots, the frontend is a widget which can be placed anywhere you wish.
There are no settings for the module itself, no database tables are there either.
All settings/adjustments are done via widget config.

***** Installation Steps 

If you have a non modified installation of phpvms, just unzip the package at your phpvms root folder.
Then only copy the widget blade to your templates widgets folder if you are not using the default template.(Step 3)

S1. Upload the folder in modules folder to your root/modules folder (JumpSeat)
S2. Upload the file in app\Widgets folder to your root/app/Widgets folder (JumpSeat.php)
S3. Upload the file in resources\layouts\views\default\widgets folder to your templates widgets folder (jumpseat.blade.php)

Go to admin section and enable the module, that's all.
On some servers, after enabling/disabling modules an app cache cleaning process may be necessary (check admin/maintenance).

***** Usage

S4. Place the widget like other widgets you use, anywhere protected with login/auth would be good for the widget. 
Like Dashboard or User Profile or any other password protected area you have 'cause the widget will not be visible without login.

S5. Call the widget with the options you want to use for JumpSeat Travel.

['price' => 'free'] (this is the default option) no ticket costs, travel is free of charge.
['price' => 50] (or any number you wish except 0) ticket will cost 50 $/Eur (currency comes from your phpvms settings).
['price' => 'auto'] ticket price will be calculated according to the great circle distance between the airports travelled.

To fine tune the 'auto' option, you can also define the base price per nautical miles if you wish, default value is 0.13 for this.

['price' => 'auto', 'base' => 0.25] will force the auto price to use 0.25 cents per nm.

Please be carefull with the base price definition, anything above 0.50 will make your jumpseats really expensive 'cause it gots multiplied
by the distance directly.

Real world companies normally offer reduced/discounted prices to "ID Travel" partners (other company workers), 
though they are mostly lower than their base economy ticket prices and offer services between economy and business class, 
0.13 or 0.15 cents per nm is a good start/default values to have.

*****

Thanks to Nabeel for his support during the development of this module.

Please check/follow GitHub for possible updates and/or improvements.

Enjoy,
B.Fatih KOZ
"Disposable Hero"
https://github.com/FatihKoz
