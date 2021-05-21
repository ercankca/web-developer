<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 28.04.2021
 * Time: 01:46
 */

namespace App\libs\Service;

use App\libs\Wallet\WalletInterface as WalletInterface;
use App\libs\Wallet\WalletServiceInterface as WalletServiceInterface;
use App\Models\Log;
use App\Models\User;
use App\Models\UserWallet;
use Illuminate\Support\Facades\Http;


class WalletService implements WalletServiceInterface
{

    public $wallet;
    private $userId,$walletId;
    public function __construct(WalletInterface $wallet)
    {

        $this->wallet = $wallet;
        $this->userId = $this->wallet->user->id;
        $this->walletId = $this->wallet->walletId;

    }

    public function deposit(float $amount, string $note): bool
    {
        \DB::beginTransaction();
       try
       {
           $userWallet = UserWallet::where("user_id",$this->userId)
               ->where("wallet_id",$this->walletId)->get();



          $update = UserWallet::where("user_id",$this->userId)
              ->where("wallet_id",$this->walletId)
               ->update(["amount"=>$amount+$userWallet[0]["amount"]]);


           \DB::commit();

           if ($update)
           {
               Http::get('http://example.com/users/'.$this->userId);

               $log = new Log();
               $log->user_id = $this->userId;
               $log->wallet_id = $this->walletId;
               $log->log = "deposit işlemi başarılı";
               $log->save();
           }

           return $update?true:false;
       }
       catch (\Exception $exception)
        {

            \DB::rollback();
            return false ; //response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function withdraw(float $amount, string $note): bool
    {
        \DB::beginTransaction();
        try
        {
        $userWallet = UserWallet::where("user_id",$this->userId)
        ->where("wallet_id",$this->walletId)->get();


        $getAmount =$userWallet[0]["amount"];

            $update = UserWallet::where("user_id",$this->userId)
                ->where("wallet_id",$this->walletId)
            ->update(["amount"=>$amount+$getAmount]);
            \DB::commit();

            if ($update)
            {
                Http::get('http://example.com/users/'.$this->userId);

                $log = new Log();
                $log->user_id = $this->userId;
                $log->wallet_id = $this->walletId;
                $log->log = "withdraw işlemi başarılı";
                $log->save();
            }

            return $update?true:false;
        }
        catch (\Exception $exception)
        {
            \DB::rollback();
            return false ; //response()->json(['error' => $exception->getMessage()], 500);
        }

    }
}