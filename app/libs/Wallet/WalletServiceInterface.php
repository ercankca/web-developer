<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 24.04.2021
 * Time: 22:52
 */

namespace App\libs\Wallet;


interface WalletServiceInterface
{
    public function __construct(WalletInterface $wallet);



    public function deposit(float $amount , string $note): bool  ;

    /** @noinspection PhpLanguageLevelInspection */
    public function withdraw(float $amount, string $note): bool ;
}