<?php

namespace App\Factory;

use App\Entity\File;
use App\Entity\Folder;

class FakeDisk
{
    // Used to define the fake dates
    const MIN_YEAR  = 2010;
    const MAX_YEAR  = 2019;
    const MIN_DAY   = 1;
    const MAX_DAY   = 28;
    const MIN_MONTH = self::MIN_DAY;
    const MAX_MONTH = 12;
    const MIN_HOUR  = 0;
    const MAX_HOUR  = 23;
    const MIN_MIN   = self::MIN_HOUR;
    const MAX_MIN   = self::MAX_HOUR;

    /**
     * Create a fake structure and return root folder
     *
     * @return Folder
     * @throws \Exception
     */
    public static function createFakeDisk() : Folder
    {
        $homeFolder         = new Folder('Home', self::generateTime());
        $myProjectFolder    = new Folder('MyProject', self::generateTime());
        $imagesFolder       = new Folder('images', self::generateTime());
        $srcFolder          = new Folder('src', self::generateTime());
        $testsFolder        = new Folder('tests', self::generateTime());
        $mainLogo           = new File('main_logo.png', self::generateTime());
        $logoEmail          = new File('logo_email.png', self::generateTime());
        $icons              = new File('icons.png', self::generateTime());
        $readme             = new File('README.md', self::generateTime());
        $user               = new File('User.php', self::generateTime());
        $homeTest           = new File('HomeTest.php', self::generateTime());

        $imagesFolder->addFile($mainLogo);
        $imagesFolder->addFile($logoEmail);
        $imagesFolder->addFile($icons);
        $testsFolder->addFile($homeTest);
        $srcFolder->addFile($user);
        $myProjectFolder->addFile($readme);
        $myProjectFolder->addFolder($imagesFolder);
        $myProjectFolder->addFolder($srcFolder);
        $myProjectFolder->addFolder($testsFolder);
        $homeFolder->addFolder($myProjectFolder);

        return $homeFolder;
    }

    /**
     * Generate a Fake date format: YYYY-MM-DD HH:mm
     *
     * @return \DateTime
     * @throws \Exception
     */
    public static function generateTime() : \DateTime
    {
        $year   = (string) rand(self::MIN_YEAR, self::MAX_YEAR);
        $month  = self::randomDate(self::MIN_MONTH, self::MAX_MONTH);
        $day    = self::randomDate(self::MIN_DAY, self::MAX_DAY);

        $hour   = self::randomDate(self::MIN_HOUR, self::MAX_HOUR);
        $minute = self::randomDate(self::MIN_MIN, self::MAX_MIN);

        $fullDate = $year.'-'.$month.'-'.$day.' '.$hour.':'.$minute.':00';

        return new \DateTime($fullDate);
    }

    /**
     * Generate a time for days, months, years, hours or minutes
     *
     * @param $min
     * @param $max
     * @return string
     */
    public static function randomDate($min, $max) : string
    {
        $time = (string) rand($min, $max);
        $time = ((int) $time < 10) ? '0'.$time : $time;

        return $time;
    }
}
