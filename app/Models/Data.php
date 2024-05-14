<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Data extends Model
{
    const TYPE_INCOME_ID = 1;
    const TYPE_SPEND_ID = 2;

    const ADDITIONAL_TYPE_CRYPTO_ID = 3;
    const ADDITIONAL_TYPE_SALARY_ID = 4;
    const ADDITIONAL_TYPE_INVEST_ID = 5;
    const ADDITIONAL_TYPE_SCHOLARSHIP_ID = 6;
    const ADDITIONAL_TYPE_GOODS_ID = 7;
    const ADDITIONAL_TYPE_BEAUTY_ID = 8;
    const ADDITIONAL_TYPE_RESTAURANTS_ID = 9;
    const ADDITIONAL_TYPE_DIGIT_FEES_ID = 10;
    const ADDITIONAL_TYPE_RENT_FEES_ID = 11;

    const UAH_ID = 1;
    const USD_ID = 2;
    const EURO_ID = 3;

    const UAH_VALUE = 1;
    const USD_TO_UAH_VALUE = 38;
    const EURO_TO_UAH_VALUE = 40;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type_id',
        'additional_type_id',
        'name',
        'amount',
        'date',
        'currency_id',
        'user_id',
    ];

    public static function types(): array
    {
        return [
            self::TYPE_INCOME_ID => 'income',
            self::TYPE_SPEND_ID => 'spend',
        ];
    }

    public static function additionalTypesList(): array
    {
        return [
            self::ADDITIONAL_TYPE_CRYPTO_ID => 'crypto',
            self::ADDITIONAL_TYPE_SALARY_ID => 'salary',
            self::ADDITIONAL_TYPE_INVEST_ID => 'invest',
            self::ADDITIONAL_TYPE_SCHOLARSHIP_ID => 'scholarship',
            self::ADDITIONAL_TYPE_GOODS_ID => 'goods',
            self::ADDITIONAL_TYPE_BEAUTY_ID => 'beauty',
            self::ADDITIONAL_TYPE_RESTAURANTS_ID => 'restaurants',
            self::ADDITIONAL_TYPE_DIGIT_FEES_ID => 'digit fees',
            self::ADDITIONAL_TYPE_RENT_FEES_ID => 'rent fees',
        ];
    }

    public static function getAdditionalTypesByTypeId (int $typeId)
    {
        return match($typeId) {
            1 => [
                self::ADDITIONAL_TYPE_CRYPTO_ID => 'crypto',
                self::ADDITIONAL_TYPE_SALARY_ID => 'salary',
                self::ADDITIONAL_TYPE_INVEST_ID => 'invest',
                self::ADDITIONAL_TYPE_SCHOLARSHIP_ID => 'scholarship',
            ],
            2 => [
                self::ADDITIONAL_TYPE_GOODS_ID => 'goods',
                self::ADDITIONAL_TYPE_BEAUTY_ID => 'beauty',
                self::ADDITIONAL_TYPE_RESTAURANTS_ID => 'restaurants',
                self::ADDITIONAL_TYPE_DIGIT_FEES_ID => 'digit fees',
                self::ADDITIONAL_TYPE_RENT_FEES_ID => 'rent fees',
            ]
        };
    }

    public static function currencyList(): array
    {
        return [
            self::UAH_ID => 'UAH',
            self::USD_ID => 'USD',
            self::EURO_ID => 'EURO',
        ];
    }

    public static function currencyValues(): array
    {
        return [
            self::UAH_ID => self::UAH_VALUE,
            self::USD_ID => self::USD_TO_UAH_VALUE,
            self::EURO_ID => self::EURO_TO_UAH_VALUE,
        ];
    }

    public static function currencyConvert
    (
        int $currencyId,
        int $amount,
        string $type)
    {
        switch ($currencyId) {
            case self::UAH_ID:
                return $amount;
            case self::USD_ID:
                return $type == 'save'
                    ? $amount * self::USD_TO_UAH_VALUE
                    : $amount / self::USD_TO_UAH_VALUE;
            case self::EURO_ID:
                return $type == 'save'
                    ? $amount * self::EURO_TO_UAH_VALUE
                    : $amount / self::EURO_TO_UAH_VALUE;
            default:
                return 0;
        }
    }
}
