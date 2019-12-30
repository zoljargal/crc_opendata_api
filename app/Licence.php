<?php

namespace App;

use Date;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(@OA\Xml(name="Licence"))
 */
class Licence extends Model
{
    protected $table = 'licences';
    protected $fillable = ['regnum', 'cusname',
        'servname', 'property', 'province', 'town', 'address',
        'phone', 'email', 'status', 'begindate', 'enddate', 'servtname', 'typename', 'usage_location'];
    /**
     * ID
     * @OA\Property(format="int64")
     * @var int
     */
    public $id;

    /**
     * Зөвшөөрлийн дугаар
     * @OA\Property
     * @var string
     */
    public $regnum;
    /**
     * Эзэмшигчийн нэр
     * @OA\Property
     * @var string
     */
    public $cusname;
    /**
     * Үйлчилгээний нэр
     * @OA\Property
     * @var string
     */
    public $servname;

    /**
     * Тодруулга
     * @OA\Property
     * @var string
     */
    public $property;
    /**
     * Аймаг хот
     * @OA\Property
     * @var string
     */
    public $province;
    /**
     * Сум дүүрэг
     * @OA\Property
     * @var string
     */
    public $town;
    /**
     * Хаяг
     * @OA\Property
     * @var string
     */
    public $address;
    /**
     * Утас
     * @OA\Property
     * @var string
     */
    public $phone;
    /**
     * Цахим шуудангийн хаяг
     * @OA\Property
     * @var string
     */
    public $email;
    /**
     * Зөвшөөрлийн төлөв
     * @OA\Property
     * @var string
     */
    public $status;
    /**
     * Зөвшөөрлийн эхлэх огноо
     * @OA\Property(format="yyyy-MM-dd")
     * @var Date
     */
    public $begindate;
    /**
     * Эзэмшигчийн нэр
     * @OA\Property(format="yyyy-MM-dd")
     * @var Date
     */
    public $enddate;
    /**
     * Үйлчилгээний ангилал
     * @OA\Property
     * @var string
     */
    public $servtname;
    /**
     * Зөвшөөрлийн ангилал
     * @OA\Property
     * @var string
     */
    public $typename;
    /**
     * Хамрах хүрээ
     * @OA\Property
     * @var string
     */
    public $usage_location;
}
