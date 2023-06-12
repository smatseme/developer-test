<?php
//echo '<h1>Hellso</H1>'

$x;
for ($x = 1; $x <= 100; $x++)
{
   
    if ($x % 15 == 0)
        echo "FizzBuzz" . "  ";
     
    // number divisible by 3? print
    // 'Fizz' in place of the number
    else if (($x % 3) == 0)
        echo "Fizz" . "  ";            
     
    // number divisible by 5, print
    // 'Buzz' in place of the number
    else if (($x % 5) == 0)                
        echo "Buzz" . "  ";            
 
    else // print the number        
        echo $x,"  " ;            
}




?>