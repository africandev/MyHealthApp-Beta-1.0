<?php


    function nBetween($varToCheck, $high, $low) {
        if($varToCheck < $low) return false;
        if($varToCheck > $high) return false;
        return true;
        }


    if(count(Auth::user()->diseases > 0)){
        $ranker = Recipe::where(Auth::user()->diseases()->disease_id, '=', Disease::id)
            ->inRandomOrder()
            ->paginate(15)
            ->get();

        if (nBetween(35, 100, 20)) {
            echo 'The number is in the range!';
            } else {
            echo 'The number is outside the range!';
            }
    }

    elseif(count(Auth::user()->diseases == 0)){


    }

        return view('/recipes')->with('ranker', $ranker);


?>
