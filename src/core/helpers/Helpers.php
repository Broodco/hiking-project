<?php

namespace App\Core\Helpers;
use App\Core\Router;
use App\Core\Session;
use App\Core\App;

class Helpers
{
    public static function dd($data): void
    {
        die('<pre>' . var_dump($data) . '</pre>');
    }

    public static function view(string $name, $data = [])
    {
        extract($data);
        return require "app/views/{$name}.view.php";
    }

    public static function redirect(string $route, $data = [])
    {
        http_response_code(302);
        extract($data);
        App::get('session')->set('redirection_data', $data);
        header("Location: $route");
    }

    public static function minutesToTime($inputMinutes): string
    {
        $minutesInAnHour = 60;
        $minutesInADay = 24 * $minutesInAnHour;

        // Extract days
        $days = floor($inputMinutes / $minutesInADay);

        // Extract hours
        $hourMinutes = $inputMinutes % $minutesInADay;
        $hours = floor($hourMinutes / $minutesInAnHour);

        // Extract the remaining minutes
        $remainingMinutes = $hourMinutes % $minutesInAnHour;
        $minutes = ceil($remainingMinutes);

        // Format and return
        $timeParts = [];
        $sections = [
            'day' => (int)$days,
            'hour' => (int)$hours,
            'minute' => (int)$minutes,
        ];

        foreach ($sections as $name => $value){
            if ($value > 0){
                $timeParts[] = $value. ' '.$name.($value == 1 ? '' : 's');
            }
        }

        return implode(', ', $timeParts);
    }
}