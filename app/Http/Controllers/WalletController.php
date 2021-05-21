<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 24.04.2021
 * Time: 23:44
 */

namespace App\Http\Controllers;
use App\Models\User;
use App\libs\Service\WalletService;

class WalletController extends Controller
{
    public function __construct() {
    }
    public function getIndex(){


       try {
           $user = User::find(1);


           $bankWallet = new BankWallet($user);
           $bonusWallet = new BonusWallet($user);

           $bankWalletService = new WalletService($bankWallet);
           $bonusWalletService = new WalletService($bonusWallet);


          $bankWalletService->withdraw(3850.42,"Dell Inspiron 3501 Fb1005f82c I3 1005g1");
           $bonusWalletService->deposit(38.5,"Dell Inspiron 3501 Fb1005f82c I3 1005g1 Bonus");


          // echo "<pre>";
        //  print_r(response()->json(['success' => "İşlemler Başarılı!"], 200));

       } catch (\Exception $exception)
       {
           echo response()->json(['error' => $exception->getMessage()], 500);
       }


    }

}