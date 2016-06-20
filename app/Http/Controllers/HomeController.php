<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getQuestBasic()
    {
        function solution($X, $A) {

            $countA = count($A);
            $countItems = 0;
            $compItems = 0;
            $K = 0;

            for ($i = 0; $i < $countA; $i++)
                if ($A[$i] == $X)
                    $countItems++;

            if ($countItems == $countA)
                return $K;

            $countDown = $countA;

            for ($i = 0; $i < $countA; $i++){
                $countDown--;

                if ($A[$i] == $X)
                    $compItems++;

                if ($countDown - ($countItems - $compItems) == $compItems)
                    return ++$i;
            }

            return -1;
        }

        $A = [6,6,1,8,2,3,6];
        $X = 6;
        $result = solution($X, $A);

        print_r($result);
    }

    public function getQuestIterator()
    {
        function solution($X, $A) {

            $countA = count($A);
            $countItems = 0;
            $compItems = 0;
            $K = 0;

            $iter = new ArrayIterator($A);

            foreach ($iter as $key => $value)
                if ($value == $X)
                    $countItems++;

            if ($countA == $countItems)
                return $K;

            $countDown = $countA;
            $iter = new ArrayIterator($A);

            foreach ($iter as $key => $value) {
                $countDown--;

                if ($value == $X)
                    $compItems++;

                if ($countDown - ($countItems - $compItems) == $compItems)
                    return $key++;
            }

            return -1;
        }

        $A = [6,6,1,8,2,3,6];
        $X = 6;
        $result = solution($X, $A);

        print_r($result);
    }
}
