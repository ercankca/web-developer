<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 24.04.2021
 * Time: 22:51
 */

namespace App\libs\Wallet;


use App\Models\User;

interface WalletInterface
{

    /**
     * WalletInterface constructor.
     * @param User $user
     */
    public function __construct(User $user);

    /**
     *
     * @return int
     */
    public function getWalletId() : int ;

    /**
     * @param float $amount
     * @param string $note
     * @return mixed
     */
    public function deposit(float $amount , string $note) : bool ;

    public function withdraw(float $amount, string $note) : bool ;
}