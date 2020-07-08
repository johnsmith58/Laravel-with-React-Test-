<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        //Student
        foreach(range(1,500) as $index){
            DB::table('students')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        $studentId = \App\Student::all()->pluck('id')->toArray();
        //Student Phone
        foreach($studentId as $key => $value){
            DB::table('student_phones')->insert([
                'student_id' => $value,
                'phone_number' => $faker->phoneNumber,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        foreach(range(0,12) as $index){
        //Grade
            DB::table('grades')->insert([
                'name' => 'Grade' . $index,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        $gradeId = \App\Grade::all()->pluck('id')->toArray();
        //Student Card
        foreach($gradeId as $key => $value){
            DB::table('student_cards')->insert([
                'year' =>  (strlen($value) == 2) ? ('20' . $value) : ('200' . $value),
                'grade_id' => $value,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        $studentCardId = \App\StudentCard::all()->pluck('id')->toArray();
        foreach($studentCardId as $key => $value){
        //Student Card Number
            DB::table('student_card_numbers')->insert([
                'student_card_id' =>  $value,
                'card_no' => substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,5) . rand(1000,9999) . $value,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        $studentCardNumberID = \App\StudentCardNumber::all()->pluck('id')->toArray();
        //Student info
        foreach($studentId as $key => $value){
            DB::table('student_infos')->insert([
                'student_id' =>  $value,
                'birth' => rand(1900,3000),
                'nrc' => substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,5) . rand(1000,9999) . $value,
                'student_card_number_id' =>  \App\StudentCardNumber::all()->random()->id,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        //Student Address
        foreach($studentId as $key => $value){
            DB::table('student_addresses')->insert([
                'student_id' =>  $value,
                'country' => ($value > 300) ? 'Yangon' : 'Mandalay',
                'township' =>  ($value > 300) ? 'Hledan' : 'Kamayut',
                'quarter' =>  'Quarter',
                'street_name' =>  'Street' . $value,
                'house_no' =>  'House no.' . $value,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        //Student parent info
        foreach($studentId as $key => $value){
            DB::table('parent_infos')->insert([
                'student_id' =>  $value,
                'father_or_mother' => ($value > 300) ? 'father' : 'mother',
                'name' =>  $faker->name,
                'one_year_salary' =>  rand(1000000,9999999),
                'family_total' =>  rand(1,10),
                'phone_number' =>  '09' . rand(1000000,9999999),
                'email' => $faker->unique()->safeEmail,
                'still_alive' =>  ($value > 300) ? 'live' : 'not_live',
                'live_with_student' =>  ($value > 300) ? 'live' : 'not_live',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        //Student parent address
        $parentInfoId = \App\StudentInfo::all()->pluck('id')->toArray();
        foreach($parentInfoId as $key => $value){
            DB::table('parent_addresses')->insert([
                'parent_info_id' =>  $value,
                'country' => ($value > 300) ? 'Yangon' : 'Mandalay',
                'township' =>  ($value > 300) ? 'Hledan' : 'Kamayut',
                'quarter' =>  'Quarter',
                'street_name' =>  'Street' . $value,
                'house_no' =>  'House no.' . $value,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        foreach($parentInfoId as $key => $value){
            DB::table('parent_jobs')->insert([
                'parent_info_id' =>  $value,
                'name' =>  $faker->name,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        foreach($studentId as $key => $value){
            if($value < 300){
                DB::table('teachers')->insert([
                    'name' =>  $faker->name,
                    'id_number' =>  rand(1000,9999) . $value,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime
                ]);
            }
        }
        foreach($studentId as $key => $value){
            DB::table('student_images')->insert([
                'student_id' =>  $value,
                'src_path' =>  'studentProfileImages',
                'src_file_name' =>  $value . '.jpg',
                'grade_id' =>  \App\Grade::all()->random()->id,
                'age' =>  $value,
                'year' =>  rand(1900,3000),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        foreach($gradeId as $key => $value){
            DB::table('class_rooms')->insert([
                'grade_id' =>  $value,
                'name' =>  'Grade' . $value,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        $teacherId = \App\Teacher::all()->pluck('id')->toArray();
        foreach($teacherId as $key => $value){
            DB::table('class_teachers')->insert([
                'teacher_id' =>  $value,
                'class_room_id' =>  \App\ClassRoom::all()->random()->id,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        foreach($studentId as $key => $value){
            DB::table('class_room_students')->insert([
                'student_id' =>  $value,
                'grade_id' =>  \App\Grade::all()->random()->id,
                'year' =>  rand(1900,3000),
                'is_pass' =>  ($value > 300) ? 'pass' : 'not_pass',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        foreach($studentId as $key => $value){
            if($value < 100){
                DB::table('reject_students')->insert([
                    'student_id' =>  $value,
                    'grade_id' =>  \App\Grade::all()->random()->id,
                    'reason' =>  rand(1900,3000),
                    'date_time' => new DateTime,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime
                ]);
            }
        }
        foreach($studentId as $key => $value){
            if($value > 450){
                DB::table('leave_students')->insert([
                    'student_id' =>  $value,
                    'grade_id' =>  \App\Grade::all()->random()->id,
                    'reason' =>  rand(1900,3000),
                    'date_time' => new DateTime,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime
                ]);
            }
        }
        foreach($teacherId as $key => $value){
            DB::table('grade_students')->insert([
                'teacher_id' =>  $value,
                'grade_id' =>  \App\Grade::all()->random()->id,
                'year' =>  rand(1900,3000),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        foreach($studentId as $key => $value){
            if($value < 300){
                DB::table('exercise_names')->insert([
                    'name' => $faker->firstname(),
                    'class_room_id' => \App\ClassRoom::all()->random()->id,
                    'grade_id' =>  \App\Grade::all()->random()->id,
                    'year' =>  rand(1900,3000),
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime
                ]);
            }
        }
        $exerciseNameId = \App\ExerciseName::all()->pluck('id')->toArray();
        foreach($exerciseNameId as $key => $value){
            if($value < 300){
                DB::table('exercise_marks')->insert([
                    'exercise_name_id' => $value,
                    'student_id' => \App\Student::all()->random()->id,
                    'mm' => ($value > 150) ? rand(0,50) : rand(0,100),
                    'eng' => ($value > 150) ? rand(0,50) : rand(0,100),
                    'math' => ($value > 150) ? rand(0,50) : rand(0,100),
                    'physic' => ($value > 150) ? rand(0,50) : rand(0,100),
                    'chemistry' => ($value > 150) ? rand(0,50) : rand(0,100),
                    'is_bio' => ($value > 150) ? 'bio' : 'eco',
                    'last_subject_mark' => ($value > 150) ? rand(0,50) : rand(0,100),
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime
                ]);
            }
        }
        foreach($studentId as $key => $value){
            if($value > 300){
                DB::table('level1_to10s')->insert([
                    'level_number' => rand(0,200),
                    'student_id' => $value,
                    'grade_id' =>  \App\Grade::all()->random()->id,
                    'total_mark' =>  rand(0,300),
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime
                ]);
            }
        }
        foreach($studentId as $key => $value){
            if($value > 300){
                DB::table('activites_teams')->insert([
                    'name' => $faker->lastname(),
                    'student_id' => $value,
                    'description' =>  'This is activites team description ' . $value . $faker->text(),
                    'aim_of_team' =>  rand(0,300),
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime
                ]);
            }
        }
        $activitesTeamId = \App\ActivitesTeam::all()->pluck('id')->toArray();
        foreach($activitesTeamId as $key => $value){
            DB::table('activites')->insert([
                'name' => $faker->lastname(),
                'activites_team_id' => $value,
                'level_number' =>  rand(0,300),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        foreach($activitesTeamId as $key => $value){
            DB::table('donations')->insert([
                'name' => $faker->firstname(),
                'year' => rand(1999,3000),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        $donationId = \App\Donation::all()->pluck('id')->toArray();
        foreach($donationId as $key => $value){
            DB::table('donated_students')->insert([
                'student_id' =>  \App\Student::all()->random()->id,
                'donation_id' =>  $value,
                'is_item' => ($value > 50) ? 'item' : 'no_item',
                'amount' => rand(1000000,9000000),
                'year' => rand(1999,3000),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        foreach($gradeId as $key => $value){
            DB::table('trips')->insert([
                'name' =>  $faker->firstname(),
                'year' => rand(1999,3000),
                'grade_id' => $value,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        $tripId = \App\Trip::all()->pluck('id')->toArray();
        foreach($tripId as $key => $value){
            DB::table('trip_users')->insert([
                'trip_id' =>  $value,
                'student_id' => \App\Student::all()->random()->id,
                'trip_fees' => '9000000',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        foreach(range(0,3) as $index){
            DB::table('lunk_types')->insert([
                'name' => ($index == 1) ? 'Silver' : ($index == 2) ? 'Gold' : 'Diamond',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        foreach($studentId as $key => $value){
            DB::table('lunk_students')->insert([
                'student_id' => \App\Student::all()->random()->id,
                'fees' =>  $value,
                'start_date' => '2019-05-13 16:27:00',
                'end_date' => new DateTime,
                'lunk_type_id' => \App\LunkType::all()->random()->id,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        foreach(range(0,5) as $index){
            DB::table('ferry_types')->insert([
                'name' => 'Type' . $index,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        foreach($studentId as $key => $value){
            DB::table('ferry_students')->insert([
                'student_id' => $value,
                'fees' =>  '800000',
                'start_date' => '2019-05-13 16:27:00',
                'end_date' => new DateTime,
                'ferry_type_id' => \App\FerryType::all()->random()->id,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        foreach(range(0,50) as $index){
            DB::table('ferries')->insert([
                'name' => $faker->firstname(),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        $ferryId = \App\Ferry::all()->pluck('id')->toArray();
        foreach($ferryId as $key => $value){
            DB::table('ferry_owner_infos')->insert([
                'ferry_id' => $value,
                'name' => $faker->firstname(),
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'nrc_no' =>  substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,5) . rand(1000,9999) . $value,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        $ferryOwnerInfoId = \App\FerryOwnerInfo::all()->pluck('id')->toArray();
        foreach($ferryOwnerInfoId as $key => $value){
            DB::table('ferry_owner_addresses')->insert([
                'ferry_owner_info_id' => $value,
                'country' => ($value > 300) ? 'Yangon' : 'Mandalay',
                'township' =>  ($value > 300) ? 'Hledan' : 'Kamayut',
                'quarter' =>  'Quarter' . $value,
                'street' =>  'Street' . $value,
                'house_no' =>  'House no.' . $value,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        foreach($ferryOwnerInfoId as $key => $value){
            DB::table('ferry_cars')->insert([
                'car_no' => substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,2) . $value . rand(11111,99999),
                'ferry_owner_info_id' => $value,
                'car_model' =>  ($value > 100) ? ('AC' . $value . rand(1999,3000)) : ('DC' . $value . rand(1999,3000)),
                'car_year' =>  'Year' . rand(1999,3000),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        $ferryCarId = \App\FerryCar::all()->pluck('id')->toArray();
        foreach($ferryCarId as $key => $value){
            DB::table('ferry_drivers')->insert([
                'ferry_car_id' => $value,
                'ferry_owner_info_id' => \App\FerryOwnerInfo::all()->random()->id,
                'driver_name' =>  $faker->name(),
                'driver_phone' =>  $faker->phoneNumber,
                'driver_email' =>  $faker->unique()->safeEmail,
                'driver_nrc' =>  substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,2) . $value . rand(11111,99999),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        foreach($ferryCarId as $key => $value){
            DB::table('ferry_ways')->insert([
                'name' => $faker->name() . $value,
                'start_point' => $faker->name(),
                'end_point' =>  $faker->name(),
                'way_roads' => 'Way ' . $value,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        $ferryDriverId = \App\FerryDriver::all()->pluck('id')->toArray();
        foreach($ferryDriverId as $key => $value){
            DB::table('ferry_driving_periods')->insert([
                'ferry_driver_id' => $value,
                'start_date' => '2019-05-13 16:27:00',
                'end_date' =>  new DateTime,
                'ferry_way_id' => \App\FerryWay::all()->random()->id,
                'drived_count' =>  rand(5,100),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }

    }
}
