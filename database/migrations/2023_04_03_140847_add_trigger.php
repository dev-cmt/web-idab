<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER add_trigger_subscriptions AFTER INSERT ON `subscriptions` FOR EACH ROW
            BEGIN
                set @mydate =(select sub_start_date from subscription_setups);
                set @fees =(select monthly_fee from subscription_setups);
                sET @NUM=NEW.duo_amount / @fees;
                set @i=0, @chk=0;
                set @chk=(select COUNT(*) FROM subscriptions_histories WHERE subscriptions_histories.user_id = NEW.user_id );
                
                -- if (OLD.status = 0 and new.status =  1 ) then  
                    if (@chk < 1 )then
                        while (@i < @NUM) do
                            INSERT INTO subscriptions_histories (sub_month, pay_date, amount, subscriptions_id, user_id)
                            VALUES (@mydate, NEW.start_date, @fees, NEW.id, NEW.user_id);
                            SET @mydate= date_add(@mydate,INTERVAL 1 month);
                            set @i=@i + 1;
                        end while;
                    ELSE	
                        set @mydate =(select sub_month from subscriptions_histories WHERE subscriptions_histories.user_id = NEW.user_id order by sub_month desc LIMIT 1);
                        while (@i < @NUM) do
                            SET @mydate= date_add(@mydate,INTERVAL 1 month);
                            INSERT INTO subscriptions_histories (sub_month, pay_date, amount, subscriptions_id, user_id)
                            VALUES (@mydate, NEW.start_date, @fees, NEW.id, NEW.user_id);
                            
                            set @i=@i + 1;
                        end while;
                    end if;
                -- end if;
            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `add_trigger_subscriptions`');
    }
};
