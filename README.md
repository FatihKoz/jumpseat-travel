# JumpSeat Travel Module (For PhpVms v7)

Module enables JumpSeat Travel for pilots, the frontend is a widget which can be placed anywhere you wish.\
There are no settings for the module itself, no database tables are there either.\
All settings/adjustments are done via widget config.

***** Manual Installation Steps 

S1. Upload contents of the module (or pull via GitHub) to your root/modules/JumpSeat folder.

Go to admin section and enable the module, that's all.\
On some servers, after enabling/disabling modules an app cache cleaning process may be necessary (check admin/maintenance).

***** Usage

S2. Place the widget as described below, anywhere protected with login/auth would be good. (Dashboard or User Profile or any other password protected area 'cause widget will not be visible without login)

    @widget('Modules\JumpSeat\Widgets\JumpSeat')

S3. (Optional) Adjust the options you want to use for JumpSeat Travel.

    @widget('Modules\JumpSeat\Widgets\JumpSeat', ['price' => 'auto', 'base' => 0.20])

['price' => 'free'] (this is the default option) no ticket costs, travel is free of charge.\
['price' => 50] (or any number you wish except 0) ticket will cost 50 $/Eur (currency of your phpvms settings).\
['price' => 'auto'] ticket price will be calculated according to the great circle distance between the airports travelled.\
['price' => 'auto', 'base' => 0.25] this will force the auto price system to use 0.25 cents per nm.

Please be carefull with the base price definition, anything above 0.50 will make your jumpseats really expensive 'cause it gots multiplied by the distance directly.

Real world companies normally offer reduced/discounted prices to "ID Travel" partners (other company workers), though they are mostly lower than their base economy ticket prices and offer services between economy and business class, 0.13 or 0.15 cents per nm are good start/default values to have.

``` @widget('Modules\JumpSeat\Widgets\JumpSeat', ['list' => 'hubs', 'price' => 'auto', 'base' => 0.20]) ```

`['list' => 'hubs']` will list only your hubs as possible destinations ( update 20.APR.21 )

S4. (Optional) If you want to edit views you can copy the blade files to your template as described below.

source : phpvms modules\JumpSeat\Resources\views\*.blade.php (or only the ones you want to edit)\
target : phpvms root\resources\views\layouts\Dispoble_v1_SideBar\modules\JumpSeat\

*****

Thanks to Nabeel and Andreas for their support during the development of this module.

Please check/follow GitHub for possible updates and/or improvements.

Enjoy,\
B.Fatih KOZ\
"Disposable Hero"\
https://github.com/FatihKoz

