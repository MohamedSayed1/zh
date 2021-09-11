<?php


namespace App\Http\Controllers\api;


class HelpApi extends Controller
{

    public function help()
    {
        return [
            'appointment Api ' => [
                'notes' => 'الجزء دا هيكون شامل المعاد و ركوب الاتوبيس (المشرف يركب الطلبه شيك اوت )  وتحصيل الفلوس اليوميه ',
                'prefix' => 'api/appointment/*',
                'requests' => [
                    '1. appointment' => [
                        'name' => 'appointment',
                        'desc' => 'هنا بيجيلك المواعيد اليوميه ( كل يوم بيجيلك المعاد اللي هتكون انهارده - وديه المواعيد الريسيه بمعني معاد انهارده الساعه 5 معاد الساعه 4 وهكذا ',
                        'request_url' => 'api/appointment',
                        'method' => 'post',
                        'required_pramter' => null,
                        'result_example' => [
                            "status" => 200,
                            "message" => "Appointment Day",
                            "data" =>
                                [
                                    "app_id" => 66,
                                    "term_id" => null,
                                    "date" => "2021-09-11",
                                    "time" => "07:00:00",
                                    "status" => 1,
                                    "to_student" => 0,
                                    "created_at" => "2021-08-10T22:46:39.000000Z",
                                    "updated_at" => "2021-08-10T22:46:39.000000Z"
                                ]
                        ],
                        'pramter_brief' => [
                            'app_id' => 'دا اي ديه الريكورد ودا طبعا اهم حاجه هنحتاجه في اكتر من حاجه في اللي جي ',
                            'time' => 'دا يظهر علشان دا الوقت اللي هيتحركوا فيه ( يعني دا معاد الرحله )',
                            'to_student' => 'بيوضح انه يظهر للطلاب ولا لا ( لو 1 واللي فاتح طالب يظهر , لكن لو 0 ميظهرش ((( ودا خاص بالطلابه بس )))'
                        ],
                        'role_Permission' => [
                            'student' => 'to_student == 1',
                            'admin,owner' => 'all , open (( add_item->["الخاصه ب اضافه الاتوبيس"] }}',
                            'super,driver' => 'all',
                        ]
                    ],
                    '2.add item' => [
                        'name' => 'add item',
                        'desc' => '((اضافه اتوبيس للمعاد وهنا المعاد بيكون ليه اكتر من اتوبيس وهنا الادمن اللي بيعملها يكون في علي كل معاد  يكون في زار اضاقه بيدوس عليها بتفتح فورم ليه ',
                        'request_url' => 'api/appointment/item/send/add',
                        'method' => 'post',
                        'required_pramter' => [
                            'app_id' => 'الادي ديه بتاع المعاد نفسه بتاع الركوست رقم 1',
                            'super_id' => 'وهنا دا اي بتاع اليوز علشان دا علشان تجيبه هتبعت ركوست مختلف ',
                            'deriver_id' => 'اي ديه بتاع السواق ودا مش required',
                            'count_bus' => 'دا عدد كراسي الاتوبيس ويبقي int',
                            'numper_bus' => 'اسم الاتوبيس يبقيل اي حاجه ومش required',
                        ],
                        'role_Permission' => [
                            'admin,owner' => 'add ,updated ',
                            'super,driver' => 'updated (( type )) [wait to moved]',
                        ]

                    ],
                    '3.updated_item' => [
                        'name' => 'updated item',
                        'desc' => 'تعديل الركوست 3',
                        'request_url' => 'api/appointment/item/send/updated',
                        'method' => 'post',
                        'required_pramter' => [
                            'id' => 'id reacord updated ',
                            'super_id' => 'وهنا دا اي بتاع اليوز علشان دا علشان تجيبه هتبعت ركوست مختلف ',
                            'deriver_id' => 'اي ديه بتاع السواق ودا مش required',
                            'count_bus' => 'دا عدد كراسي الاتوبيس ويبقي int',
                            'numper_bus' => 'اسم الاتوبيس يبقيل اي حاجه ومش required',
                        ],
                        'role_Permission' => [
                            'admin,owner' => 'updated ',
                        ]
                    ],
                    '4.updated type' => [
                        'name' => 'updated item',
                        'desc' => 'تعديل الركوست 3',
                        'request_url' => 'api/appointment/item/send/updated/type/{{moved_id}}',
                        'method' => 'get',
                        'role_Permission' => [
                            'super,driver' => 'updated ',
                        ]
                    ],
                    '5.get item' => [
                        'name' => 'get itme',
                        'desc' => 'هنا انتا هتبعت اي ديه ركوست رقم 1 ومن خلاله هجبلك الاتوبيسات في المعاد دا هتابع الحركه بتاعت الاتوبيس ',
                        'request_url' => 'appointment/item/{{app_id))',
                        'method' => 'get',
                        'required_pramter' => 'app_id',
                        'result_example' => [
                            "status" => 200,
                            "message" => "Appointment Day",
                            "data" =>
                                [
                                    "move_id" => 2,
                                    "appoint_id" => 66,
                                    "date" => "2021-09-11",
                                    "type" => "wait",
                                    "sper_id" => 15,
                                    "deriver_id" => 5,
                                    "count_bus" => 60,
                                    "numper_bus" => "Bus 1",
                                    "number_pass" => null,
                                ]
                        ],
                        'pramter_brief' => [
                            'move_id' => 'دا اي ديه الريكورد ودا طبعا اهم حاجه هنحتاجه في اكتر من حاجه في اللي جي ',
                            'type' => 'جركه الاتوبيس هو لسه واقف ولا اتحرك',
                            'count_bus' => 'عدد الكراسي في الاتوبيس',
                            'numper_bus' => 'رقم الاتوبيس',
                            'number_pass' => 'عدد الناس اللي ركبت في الاتوبيس لحد دلوقتي ',
                        ],
                        'role_Permission' => [
                            'to all '
                        ]
                    ],
                ],
            ],

        ];
    }

}