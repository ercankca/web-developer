<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 28.04.2021
 * Time: 00:37
 */

namespace App\Http\Controllers;


use App\libs\Wallet\WalletInterface;
use App\Models\User;
use App\Models\Wallet;

class BankWallet implements WalletInterface
{
    public $user,$walletId;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->walletId = $this->getWalletId();
    }

    /**
     *
     * @return int
     */
    public function getWalletId(): int
    {
        $getWallet = Wallet::where("name","BankWallet")->get("id")->first();

        return $getWallet["id"];
    }

    /**
     * @param float $amount
     * @param string $note
     * @return mixed
     */
    public function deposit(float $amount, string $note): bool
    {
        // TODO: Implement deposit() method.
    }

    public function withdraw(float $amount, string $note): bool
    {
        // TODO: Implement withdraw() method.
    }



}