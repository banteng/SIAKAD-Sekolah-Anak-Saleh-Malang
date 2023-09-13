<?php 
 
class Penilaian{
 
	function section1($benar){
		switch($benar){
            case 0:
                $nilai = 24;
                echo $nilai;die;
                break;
            case 1:
                $nilai = 25;
                break;
            case 2:
                $nilai = 26;
                break;
            case 3:
                $nilai = 27;
                break;
            case 4:
                $nilai = 28;
                break;
            case 5:
                $nilai = 29;
                break;
            case 6:
                $nilai = 30;
                break;
            case 7:
                $nilai = 31;
                break;
            case 8:
                $nilai = 32;
                break;
            case 9:
                $nilai = 32;
                break;
            case 10:
                $nilai = 33;
                break;
        }
	}
}